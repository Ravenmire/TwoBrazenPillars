<?php $file='index.php';
	$server_name = $_SERVER['SERVER_NAME'];
	include('ec.php');
	include('preamble.php');
	print('<TITLE>2BP</TITLE>'.$nl);
	print(
'<STYLE>
</STYLE>'.$nl);
	print('</HEAD>'.$nl);
	//phpinfo();
	include('ec.php');
	// echo($file.': '.__LINE__.$nl);
	include('bad-message.php');
	include('good-message.php');
	include('debug-message.php');
	include('informational-message.php');
	include('init.php');
	include('open-db.php');

	$site = getenv('site');

	if (empty($site) == FALSE) {
		// We have a site key; do everything.
	} else {
		// We don’t have a site key; fake it.
		$site = 'twobrazenpillars.org';
		$message =
			$file.'['.__LINE__.'] No environment variable '.
				$lec.'site'.$rec.'; set to '.
				$lec.$site.$rec.'.';
		//informational_message($message, FALSE, TRUE);
	}
	$message =
		$file.'['.__LINE__.'] site = '.$lec.$site.$rec;
	//informational_message($message, FALSE, TRUE);

	$db_port = '5432';
	$db_host = 'localhost';
	//$db_user = 'httpd';
	//$db_user = 'postgres';
	$db_user = 'ted';
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
		/* */
		$message =
			$file.'['.__LINE__.']: '.$db_moto.' '.
				$lec.$db_name.$rec.
				' database opened successfully.'.$NL.
			'$db_moto = '.$lec.$db_moto.$rec.$NL.
			'$db_host = '.$lec.$db_host.$rec.$NL.
			'$db_name = '.$lec.$db_name.$rec.$NL.
			'$db_user = '.$lec.$db_user.$rec.$NL.
			'$db_pass = '.$lec.$db_pass.$rec.$NL;
		//informational_message($message, FALSE, TRUE);

		$SQL =
			'SELECT *'.$nl.
			'FROM utility'.$nl.
			' WHERE key=\''.$site.'\';';
		$message =
			$file.'['.__LINE__.']: $SQL: '.$SQL.$NL;
		//informational_message($message, FALSE, TRUE);

		$sth = $dbh->prepare($SQL);
		$sth->execute();
		$utilities = $sth->fetchAll(PDO::FETCH_ASSOC);
		$json_raw = json_encode($utilities);
		$utility = htmlentities($json_raw);
		$k = count($utilities);
		$s = ($k == 1) ? '' : 's';
			if ($k == 1) {
				// Normal path.
				$message =
					$file.'['.__LINE__.']: Perfect. read '.$k.' record'.$s.
						' from the \'utilities\' table.
						This is A Good Thing™.'.$NL;
				//good_message($message, FALSE, TRUE);
				foreach ($utilities AS $utility) {
					//print_r($utility);
					$json_raw = json_encode($utility);
					$json_cooked = htmlentities($json_raw);
					$message =
						$file.'['.__LINE__.']: $utility:'.$json_cooked.$NL;
					//informational_message($message, FALSE, TRUE);
				}
				$bg     = $utility['bgcolor'];
				$fg     = $utility['fgcolor'];
				$title  = $utility['title'];
				$slogan = $utility['slogan'];
				$music  = '/Chris Fleischer, Pipe Organ- Children Of The Heavenly King-PE4q90u7rz0.mkv';

				print('<H1>'.$title.'</H1>'.$nl);
				print('<H3>'.$slogan.'</H3>'.$nl);
/*
				print(
'<VIDEO HEIGHT="240" WIDTH="320" AUTOPLAY>
		<SOURCE SRC="'.$music.'" TYPE="video/mp4">'.$nl.
		'Your browser doesn’t support the VIDEO tag'.
'</VIDEO>'.$nl);
 */
				print('<IMG SRC="images/HuhColumns.jpg" ALT="Huh? Columns">'.$nl);
				print('<FIELDSET>'.$nl);
				print('<LEGEND>| Fun things to know and do and tell 😀 |</LEGEND>'.$nl);
				if (TRUE) {
					$i = 0;
					print('<FORM ACTION="Library.php" METHOD="POST">'.$nl);
					print(++$i.'.    <INPUT TYPE="SUBMIT" NAME="Title"   VALUE="Library">'.$nl);
					print('</FORM>'.$nl);

					print('<FORM ACTION="HamRadio.php" METHOD="POST">'.$nl);
					print(++$i.'.    <INPUT TYPE="SUBMIT" NAME="Title"   VALUE="Ham Radio">'.$nl);
					print('</FORM>'.$nl);

					print('<FORM ACTION="VLC-hotkeys.php" METHOD="POST">'.$nl);
					print(++$i.'.    <INPUT TYPE="SUBMIT" NAME="Title"   VALUE="VLC Hotkeys">'.$nl);
					print('</FORM>'.$nl);

					print('<FORM ACTION="HTTP-status-codes.php" METHOD="POST">'.$nl);
					print(++$i.'.    <INPUT TYPE="SUBMIT" NAME="Title"   VALUE="HTTP Status Codes">'.$nl);
					print('</FORM>'.$nl);

				} else {
					print('<FORM ACTION="DoForm.php" METHOD="POST">'.$nl);
					print('<SELECT NAME="Option">'.$nl);
					print('    <OPTION VALUE="Library">Library</OPTION>'.$nl);
					print('</SELECT>'.$nl);
					print('</FORM>'.$nl);
				}
				print('</FIELDSET>'.$nl);
			} else {
				$message =
					$file.'['.__LINE__.']: Uh, oh. Read '.$k.
					' record'.$s.' from the utility table'.$NL;
				bad_message($message, FALSE, TRUE);
			}
		}

		print($NL.'<A href="https://validator.w3.org/nu/?doc=http%3A%2F%2F'.
			$server_name.'%2F'.$file.'">Validate this page.</A>'.$NL);

		$stat  = stat($file);
		$mtime = $stat['mtime'];
		setlocale(LC_TIME, "C");
		print($lec.$file.$rec.' was last modified on '.
			strftime('%A, %B %e, %Y at %H:%M:%S%Z',$mtime).$NL);
		//include('term.php');
?>
</HTML>
