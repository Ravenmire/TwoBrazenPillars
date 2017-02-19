<?php $file='Library.php';
//phpinfo();
$server_name = $_SERVER['SERVER_NAME'];
//	echo($file.'['.__LINE__.'] HERE!<BR>');
/***********************************************************************
 ***********************************************************************/
	// Extract all the $_POST variables.
	$title = $_POST['Title'];

	include('ec.php');
	require_once('informational-message.php');
	require_once('debug-message.php');
	require_once('good-message.php');
	require_once('bad-message.php');
	require_once('open-db.php');
	include('preamble.php');

	print('    <TITLE>2BP '.$title.'</TITLE>'.$nl);

	print('<SCRIPT>'.$nl);
?>
function MyFunction() {
    var x = document.getElementById("filter");
    x.value = x.value.toUpperCase();
}
<?php
	print('</SCRIPT>'.$nl);

	print('<STYLE>'.$nl.
		'</STYLE>'.$nl);

	print('</HEAD>'.$nl);

	print('<H1>Library Page</H1>'.$nl);

	$message =
		$file.'['.__LINE__.'] $_POST: '.print_r($_POST,TRUE);
	//informational_message($message, FALSE, TRUE);

	$db_host = 'localhost';
	$db_port = '5432';
	//$db_user = 'httpd';
	//$db_user = 'ted';
	$db_user = 'postgres';
	$db_pass = '';
	$db_name = 'library';
	$db_moto = 'PostgreSQL';

	list($rc, $dbh) = open_db($file, $db_host, $db_port, $db_user, $db_pass, $db_name, $db_moto);

	if ($dbh == NULL) {
		$message =
			$file.'['.__LINE__.']: '.$db_moto.' database '.$lec.$db_name.$rec.' open failure!'.$nl;
		bad_message($message, FALSE, TRUE);
	} else {
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

		// Set up subject heading boxes.
		$SQL =
			'SELECT *'.$nl.
			'  FROM boyden_bish'.$nl.
			' WHERE key ILIKE \'___\''.$nl.
			' ORDER BY classification;'.$nl;;
		$message =
			$file.'['.__LINE__.'] $SQL:'.$NL.$SQL;
		//informational_message($message, FALSE, TRUE);
		$sth = $dbh->prepare($SQL);
		$sth->execute();
		$keys = $sth->fetchAll(PDO::FETCH_ASSOC);
		$message =
			$file.'['.__LINE__.'] $keys:'.$NL.
			print_r($keys,TRUE).'.'.$NL;
		//debug_message($message, FALSE, TRUE);
		$k = count($keys);
		$s = ($k == 1) ? '' : 's';
		$message =
			$file.'['.__LINE__.'] '.$k.' key'.$s.'.';
		//informational_message($message, FALSE, TRUE);
		print('<SECTION>'.$nl);
		print('<H2>Boyden-Bish</H2>'.$nl);
		print('<FIELDSET>'.$nl);
		print('    <LEGEND>'.$k.' classification'.$s.
			' in Boyden-Bish</LEGEND>'.$nl);

		print('Filter: <INPUT TYPE="TEXT" ID="filter" onkeyup="MyFunction">'.$nl);

		print('<SELECT SIZE="12" NAME="key">'.$nl);
		$i = 0;
		foreach($keys AS $key) {
			$random_key     = $key['random_key'];
			$classification = $key['classification'];
			$key            = $key['key'];
			if (FALSE && stristr($classification,$filter) === FALSE) {
				// String is not in classification.
			} else {
				$message =
					$file.'['.__LINE__.'] $key '.++$i.':'.
					print_r($key,TRUE);
				print('<OPTION VALUE="'.$random_key.'">'.
					$i.'. '.
					$key.'|'.
					$classification.
					//' '.$message.
					'</OPTION>'.$nl);
			}
		}
		print('</SELECT>'.$nl);
		print('</FIELDSET>'.$nl);
		print('</SECTION>'.$nl);

		// Get library sites.
		$SQL =
			'SELECT *'.
			'  FROM library_associations;';
		$sth = $dbh->prepare($SQL);
		$sth->execute();
		$sites = $sth->fetchAll(PDO::FETCH_ASSOC);
		$k = count($sites);
		$s = ($k == 1) ? '' : '?';

		print('<SECTION CLASS="catalog">'.$nl);
		print('<H2>Enter a book</H2>'.$nl);
		print('<FORM ACTION="add-book.php" METHOD="POST">'.$nl);
		// Strange. TYPE="TEXT" causes errors, but only on
		// this page. It needs "TYPE="text";
		// VLC_hotkeys.php and HamRadio.php
		// are OK with TYPE="TEXT".
		print('   <INPUT TYPE="text" NAME="Title"     REQUIRED PLACEHOLDER="Title">'.         $NL);
		print('   <INPUT TYPE="text" NAME="Author"    REQUIRED PLACEHOLDER="Author">'.        $NL);
		print('   <INPUT TYPE="text" NAME="Copyright" REQUIRED PLACEHOLDER="Copyright date">'.$NL);
		print('   <INPUT TYPE="SUBMIT" VALUE="Add this book!">'.$NL);
		print('</FORM>'.$nl);
		print('</SECTION>'.$nl);

		$SQL =
			'SELECT *'.$nl.
			'  FROM books'.$nl.
			' ORDER BY short_title,author,copyright_date DESC;'.$nl;
		$message =
			$file.'['.__LINE__.'] $SQL = '.$lec.$SQL.$rec;
		//debug_message($message, FALSE, TRUE);
		$sth = $dbh->prepare($SQL);
		$sth->execute();
		$books = $sth->fetchAll(PDO::FETCH_ASSOC);
		$message =
			$file.'['.__LINE__.'] $books: '.print_r($books,TRUE);
		//informational_message($message, FALSE, TRUE);
		$k = count($books);
		$s = ($k == 1) ? '' : 's';
		print('<SECTION>'.$nl);
		print('<H2>Holdings ('.$k.')</H2>'.$nl);
		$message =
			$file.'['.__LINE__.'] Retrieved '.$k.' book'.$s;
		//informational_message($message, FALSE, TRUE);
		print('<SELECT CLASS="holdings" SIZE="10">'.$nl);
		$dlm = '/';
		foreach($books AS $book) {
			$message =
				$file.'['.__LINE__.'] $book: '.print_r($book,TRUE);
			//informational_message($message, FALSE, TRUE);
			$copyright_date = $book['copyright_date'];
			$short_title    = $book['short_title'];
			$author         = $book['author'];
			print('    <OPTION VALUE="'.$short_title.'">'.$short_title.$dlm.$author.$dlm.$copyright_date.'</OPTION>'.$nl);
		}
		print('</SELECT>'.$nl);
		print('</SECTION>'.$nl);

		print('<SECTION>'.$nl);
		print('<H2>Library Associations</H2>'.$nl);
		$SQL =
			'SELECT *'.
			'  FROM library_associations;'.$nl;
		$message =
			$file.'['.__LINE__.'] $SQL: '.$SQL;
		informational_message($message, FALSE, TRUE);
		$sth = $dbh->prepare($SQL);
		$sth->execute();
		$sites = $sth->fetchAll(PDO::FETCH_ASSOC);
		$k = count($sites);
		$s = ($k == 1) ? '' : 's';

		print('<FORM ACTION="goto-resource.php" METHOD="POST">'.$nl);
		print('<FIELDSET>'.$nl);
		print('<LEGEND>'.$k.' resource'.$s.'</LEGEND>'.$nl);
		print('<SELECT NAME="site" SIZE="10">'.$nl);
		foreach($sites AS $site) {
			$id   = $site['id'];
			$name = $site['name'];
			$url  = $site['url'];
			print('<OPTION VALUE="'.$url.'">'.$name.'</OPTION>'.$nl);
		}
		print('</SELECT>'.$nl);
		print('<INPUT TYPE="SUBMIT" NAME="Submit" VALUE="Go to the resource’s site.">'.$nl);
		print('</FIELDSET>'.$nl);
		print('</FORM>'.$nl);
		print('</SECTION>'.$nl);

		print($NL.'<A href="https://validator.w3.org/nu/?doc=http%3A%2F%2F'.
			$server_name.'%2F'.$file.'">Validate this page.</A>'.$NL);

		$stat  = stat($file);
		$mtime = $stat['mtime'];
		setlocale(LC_TIME, "C");
		print($lec.$file.$rec.' was last modified on '.
			strftime('%A, %B %e, %Y at %H:%M:%S%Z',$mtime).$NL);
		//include('term.php');

		print('</HTML>'.$nl);
	}
?>
