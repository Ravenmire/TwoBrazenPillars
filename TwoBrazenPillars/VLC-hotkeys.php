<?php $file='VLC_hotkeys.php';
/***********************************************************************
***********************************************************************/
	require_once('ec.php');
	include('preamble.php');
	print('<SCRIPT SRC="sorttable.js"></SCRIPT>'.$nl);
print('<STYLE>
.catalog {
	display: inline-block;
	  width: 30%;
}
.vlc_hotkeys {
    display: inline-block;
	  width: 30%;
}
H1 {
	  width: 30%;
}
SECTION {
	display: inline-block;
	  /*width: 30%;*/
}
.bad-message {
	background-color: hsla(  0, 100%,  50%, 1.00);
			   color: hsla(  0,   0%, 100%, 1.00);
		 font-family: "Courier New", Courier, monospace;
		  font-style: normal;
		       width: 90%;
}
BODY {
	 /*                      h    s     l      a     */
	background-color: hsla(207,  52%,  23%, 0.90);
		 font-family: "Linux Biolinum", arial, sans-serif;
		   font-size: 100%; /* Works in all browsers. Use em to change in each element. */
		  text-align: center;
			   width: 100%;
}
.debug-message {
	background-color: hsla( 60, 100%,  75%, 1.00);
		border-color: hsla(  0,   0%,  80%, 1.00);
		border-style: solid;
	   border-radius: 3.0mm;
		border-width: 1.5mm;
			   color: hsla( 60,   0%,   0%, 1.00);
	       color: hsla( 60,   0%, 100%, 1.00);
		 font-family: "Courier New", Courier, monospace;
		  font-style: normal;
		       width: 90%;
}
FIELDSET {
			 display: inline-block;
		  text-align: left;
			   width: 90%;
}
.good-message {
	 /*                      h    s     l      a     */
	background-color: hsla(148,  52%,  64%, 1.00);
		border-color: hsla(  0,   0%,  50%, 1.00);
		border-style: solid;
	   border-radius: 3.0mm;
	    border-width: 1.5mm;
			   color: hsla( 60,   5%,   0%, 1.00);
		 font-family: "Linux Biolinum", monospace;
		  font-style: normal; /* Like laid-back. */
		       width: 90%;
}
H1 {
	 /*                      h    s     l      a     */
	background-color: hsla( 60,  99%,  80%, 0.99);
			   color: hsla(  0,   0%,   0%, 0.99);
		   font-size: 6ex;
		  font-width: 6em;
	     margin-left: auto;
	    margin-right: auto;
		  text-align: center;
			   width: 95%;
}
HTML {
	 /*                      h    s     l      a     */
	background-color: hsla( 60,   0%,  32%, 1.00);
		 font-family: "Linux Biolinum", "Courier", serif;
}
.informational-message {
	 /*                      h    s     l      a     */
	background-color: hsla(190,  52%,  54%, 1.00);
        border-color: hsla(  0,   0%,  80%, 1.00);
        border-style: solid;
       border-radius: 3.0mm;
        border-width: 1.5mm;
               color: hsla( 60,   0%,   0%, 1.00);
         font-family: "Linux Biolinum", Courier, monospace;
          font-style: oblique; /* Like laid-back. */
		       width: 90%;
}
/* Sortable tables */
TABLE.sortable THEAD {
/*                           h     s     l     a */
	background-color: hsla(180, 100%,  94%, 1.00);
	           color: hsla(180, 100%,   0%, 1.00);
	     font-weight: bold;
              cursor: default;
}
TR {
/*                           h     s     l     a */
	background-color: hsla( 60, 100%,  90%, 1.00);
	           color: hsla( 60, 100%,   0%, 1.00);
	     font-weight: bold;
              cursor: default;
}
.header {
/*                           h     s     l     a */
	background-color: hsla(180, 100%,  77%, 1.00);
	           color: hsla(180, 100%,   0%, 1.00);
	     font-weight: bold;
              cursor: default;
}
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
		$db_name = 'ted';
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
				'  FROM vlc_hotkeys'.$nl.
				' ORDER BY ix;'.$nl;
			$message =
				$file.'['.__LINE__.'] $SQL = '.$lec.$SQL.$rec;
			//debug_message($message, FALSE, TRUE);
			$sth = $dbh->prepare($SQL);
			$sth->execute();
			$vlc_hotkeys = $sth->fetchAll(PDO::FETCH_ASSOC);
			$message =
					$file.'['.__LINE__.'] $vlc_hotkeys: '.print_r($vlc_hotkeys,TRUE);

			// VLC information.
			print(
				'<SPAN STYLE="color: hsla(  0,   0%, 100%, 1.00);">
					VLC (VideoLan Controller) is an advanced audio/video player.'.$NL.
					'It has to be experienced to see its value.'.$NL.
					'Check it out at <a href="http://www.videolan.org/vlc/">http://www.videolan.org/vlc/</a>'.$NL.
					'VLC is open-source; it’s free, both as in beer and as in speech.'.$NL.
					'The hot keys give an example of its versatility.'.$NL.
				'</SPAN>'.$nl);

			//informational_message($message, FALSE, TRUE);
			$k = count($vlc_hotkeys);
			$s = ($k == 1) ? '' : 's';
			print('<SECTION>'.$nl);
			print('<H1>'.'The '.$k.' VLC Hotkey'.$s.'.</H1>'.$nl);
			$message =
				$file.'['.__LINE__.'] Retrieved '.$k.' vlc_hotkey'.$s;
			//informational_message($message, FALSE, TRUE);
			$message =
				'Click on a <SPAN STYLE="sortable">column heading</SPAN> to sort.';
			informational_message($message, FALSE, TRUE);
			print('<TABLE CLASS="sortable">'.$nl);
            print('<THEAD>'.$nl);
			print('<TR CLASS="header">'.     $nl);
			print('    <TD>ix</TD>'.      $nl);
			print('    <TD>Action</TD>'.  $nl);
			print('    <TD>Hot key</TD>'. $nl);
			print('</TR>'.$nl);
            print('</THEAD>'.$nl);
			$dlm = '/';
			foreach($vlc_hotkeys AS $vlc_hotkey) {
				$message =
					$file.'['.__LINE__.'] $vlc_hotkey: '.print_r($vlc_hotkey,TRUE);
				//informational_message($message, FALSE, TRUE);
				$ix       = $vlc_hotkey['ix'];
				$action   = $vlc_hotkey['action'];
				$hot_key  = $vlc_hotkey['hot_key'];
				print('<TR>'.$nl);
				print('    <TD>'.$ix.'</TD>'.$nl);
				print('    <TD>'.$action.   '</TD>'.$nl);
				print('    <TD>'.$hot_key. '</TD>'.$nl);
				print('</TR>'.$nl);
			}
			print('</TABLE>'.$nl);
			print('</SECTION>'.$nl);
/*
			print('<SECTION CLASS="catalog">'.$nl);
			print('<H1>Add a vlc_hotkey</H1>'.$nl);
			print('<FORM ACTION="add-vlc_hotkey.php" METHOD="POST">'.$nl);
			print('   <INPUT TYPE="TEXT"     REQUIRED      NAME="Action"    PLACEHOLDER="Action">'.    $NL);
			print('   <INPUT TYPE="TEXT"     REQUIRED      NAME="Hot_key"   PLACEHOLDER="Hotkey">'.    $NL);
			print('   <INPUT TYPE="SUBMIT"   VALUE="Add!">'.                                           $NL);
			print('</FORM>'.$nl);
			print('</SECTION>'.$nl);
*/

			print($NL.'<A href="https://validator.w3.org/nu/?doc=http%3A%2F%2Ftwobrazenpillars.org%2FVLC_hotkeys.php">Validate this page.</A>'.$NL);

			print('</HTML>'.$nl);
		}
	} else {
		$message =
			$file.'['.__LINE__.'] Empty $_POST variable. We’re done.';
		bad_message($message, FALSE, TRUE);
		header('Location: '.$previous_page);
	}
?>
