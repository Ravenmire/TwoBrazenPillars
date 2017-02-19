<?php $file='HamRadio.php';
/***********************************************************************
***********************************************************************/
	require_once('ec.php');
	include('preamble.php');
	print('<SCRIPT SRC="sorttable.js"></SCRIPT>'.$nl);
print('<STYLE>
</STYLE>'.$nl);
	require_once('informational-message.php');
	require_once('debug-message.php');
	require_once('good-message.php');
	require_once('bad-message.php');

	$message =
		$file.'['.__LINE__.'] $_POST: '.print_r($_POST,TRUE);
	//informational_message($message, FALSE, TRUE);

	//$previous_page = $_SERVER['HTTP_REFERER'];
	$previous_page = 'http://TwoBrazenPillars.org/';

	if (empty($_POST) == FALSE) {
	    // Normal path.
		$title = $_POST['Title'];
		require_once('open-db.php');
?>
<?php
		print('</HEAD>'.$nl);
	
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
				$file.'['.__LINE__.']: '.$db_moto.' database '.$lec.$db_name.$rec.' opened successfully.'.$nl;
			//informational_message($message, FALSE, TRUE);

			$SQL =
				'SELECT *'.$nl.
				'  FROM hams'.$nl.
				' ORDER BY call_sign;'.$nl;
			$message =
				$file.'['.__LINE__.'] $SQL = '.$lec.$SQL.$rec;
			//debug_message($message, FALSE, TRUE);
			$sth = $dbh->prepare($SQL);
			$sth->execute();
			$hams = $sth->fetchAll(PDO::FETCH_ASSOC);
			$message =
				$file.'['.__LINE__.'] $hams: '.print_r($hams,TRUE);
			//informational_message($message, FALSE, TRUE);
			$k = count($hams);
			$s = ($k == 1) ? '' : 's';
			print('<SECTION>'.$nl);
			print('<H1>'.$k.' ham'.$s.'.</H1>'.$nl);
			$message =
				$file.'['.__LINE__.'] Retrieved '.$k.' ham'.$s;
			//informational_message($message, FALSE, TRUE);
			$message =
				'Click on a <SPAN STYLE="sortable">column heading</SPAN> to sort.';
			informational_message($message, FALSE, TRUE);
			print('<TABLE CLASS="sortable">'.$nl);
            print('<THEAD>'.$nl);
			print('<TR CLASS="header">'.     $nl);
			print('    <TD>ix</TD>'.         $nl);
			print('    <TD>Call sign</TD>'.  $nl);
			print('    <TD>Handle</TD>'.     $nl);
			print('    <TD>Location</TD>'.   $nl);
			print('    <TD>Comments</TD>'.   $nl);
			print('</TR>'.$nl);
            print('</THEAD>'.$nl);
			$dlm = '/';
			foreach($hams AS $ham) {
				$message =
					$file.'['.__LINE__.'] $ham: '.print_r($ham,TRUE);
				//informational_message($message, FALSE, TRUE);
				$ix        = $ham['ix'];
				$call_sign = $ham['call_sign'];
				$handle    = $ham['handle'];
				$location  = $ham['location'];
				$comments  = $ham['comment'];
				print('<TR>'.$nl);
				print('    <TD>'.$ix.       '</TD>'.$nl);
				print('    <TD>'.$call_sign.'</TD>'.$nl);
				print('    <TD>'.$handle.   '</TD>'.$nl);
				print('    <TD>'.$location. '</TD>'.$nl);
				print('    <TD>'.$comments. '</TD>'.$nl);
				print('</TR>'.$nl);
			}
			print('</TABLE>'.$nl);
			print('</SECTION>'.$nl);

			print('<SECTION CLASS="catalog">'.$nl);
			print('<H1>Add a ham</H1>'.$nl);
			print('<FORM ACTION="add-ham.php" METHOD="POST">'.$nl);
			print('   <INPUT TYPE="TEXT"     REQUIRED      NAME="Call_sign" PLACEHOLDER="Call sign">'. $NL);
			print('   <INPUT TYPE="TEXT"     REQUIRED      NAME="Handle"    PLACEHOLDER="Handle">'.    $NL);
			print('   <INPUT TYPE="TEXT"     REQUIRED      NAME="Location"  PLACEHOLDER="Location">'.  $NL);
			print('   <TEXTAREA ROWS="10" COLS="50"        NAME="Comment"   PLACEHOLDER="Notes/Comments"></TEXTAREA>'.$NL);
			print('   <INPUT TYPE="SUBMIT"   VALUE="Add!">'.                                           $NL);
			print('</FORM>'.$nl);
			print('</SECTION>'.$nl);

			print($NL.'<A href="https://validator.w3.org/nu/?doc=http%3A%2F%2Ftwobrazenpillars.org%2FHamRadio.php">Validate this page.</A>'.$NL);

			print('</HTML>'.$nl);
		}
	} else {
		$message =
			$file.'['.__LINE__.'] Empty $_POST variable. We’re done.';
		bad_message($message, FALSE, TRUE);
		header('Location: '.$previous_page);
	}
?>
