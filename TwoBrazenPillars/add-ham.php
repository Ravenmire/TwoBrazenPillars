<?php $file='add-ham.php';
/***********************************************************************
***********************************************************************/
	include('ec.php');
	require_once('informational-message.php');
	require_once('debug-message.php');
	require_once('good-message.php');
	require_once('bad-message.php'); 
	if (empty($_POST) == FALSE) {
		//$previous_page = $_SERVER['HTTP_REFERER'];
		$previous_page = 'http://TwoBrazenPillars.org/HamRadio.php';
		$message =
			$file.'['.__LINE__.'] $_SERVER[\'HTTP_REFERER\']: '.print_r($_SERVER['HTTP_REFERER'],TRUE);
		//debug_message($message, FALSE, TRUE);
		$message =
			$file.'['.__LINE__.'] $_POST: '.print_r($_POST,TRUE);
		//debug_message($message, FALSE, TRUE);

		$call_sign = $_POST['Call_sign'];
		$handle    = $_POST['Handle'];
		$location  = $_POST['Location'];
		$comment   = $_POST['Comment'];
	
		require_once('open-db.php');
	
		$db_host = 'localhost';
		$db_port = '5432';
		//$db_user = 'httpd';
		//$db_user = 'ted';
		$db_user = 'postgres';
		$db_pass = '';
		$db_name = 'masonry';
		$db_moto = 'PostgreSQL';
		list($rc, $dbh) = open_db($file, $db_host, $db_port, $db_user, $db_pass, $db_name, $db_moto);
	
		if ($dbh == NULL) {
			$message =
				$file.'['.__LINE__.']: '.$db_moto.' database '.$lec.$db_name.$rec.' open failure!'.$nl;
			bad_message($message, FALSE, TRUE);
		} else {
			// Normal path.
			$message =
				$file.'['.__LINE__.']: '.$db_moto.' '.$lec.$db_name.$rec.' database opened successfully.'.$nl;
			//informational_message($message, FALSE, TRUE);
			$dlm = '\', \'';
			$SQL =
				'INSERT INTO hams (call_sign, handle, location, comment)'.$nl.
				 'VALUES (\''.
				 $call_sign.$dlm.
				 $handle.   $dlm.
				 $location. $dlm.
				 $comment. '\') RETURNING *;'.$nl;
			$message =
				$file.'['.__LINE__.'] $SQL = '.$SQL;
			informational_message($message, FALSE, TRUE);
			$dbh->beginTransaction();
			$sth = $dbh->prepare($SQL);
			$sth->execute();
			$hams = $sth->fetchAll(PDO::FETCH_ASSOC);
			$k = count($hams);
			$s = ($k == 1) ? '' : 's';
	
			if ($k == 1) {
				$message =
					$file.'['.__LINE__.'] Perfect. Inserted '.$k.' ham'.$s.'.'.$nl;
				//informational_message($message, FALSE, TRUE);
				//$dbh->rollBack();
				$dbh->commit();
				header('Location: '.$previous_page);
			} else {
				$message =
					$file.'['.__LINE__.'] Uh, oh. Inserted '.$k.' ham'.$s.'.'.$nl;
				bad_message($message, FALSE, TRUE);
				$dbh->rollBack();
			}
		}
	} else {
		$message =
			$file.'['.__LINE__.'] Uh, oh. Empty $_POST variable. We’re done.';
		//bad_message($message, FALSE, TRUE);
		header('Location: '.$previous_page);
	}

