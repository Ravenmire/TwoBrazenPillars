<?php // $file='open-db.php'
 /**********************************************************************
  • PDO function documentation is at: http://www.php.net/manual/en/class.pdo.php
  • http://www.php.net/manual/en/pdo.construct.php
  • 2012-02-24 Added MySQL (MariaDB) open.
  • 2016-08-21 Removed MySQL (MariaDB) open.
  • 2016-08-24 Changed to persistent connection.
 **********************************************************************/

 function really_open_db($caller, $db_host, $db_port, $db_user, $db_pass, $db_name, $db_moto) {
	//$rc = session_start();
	$file = 'really_open_db';
	include('ec.php');
	require_once('informational-message.php');
	require_once('debug-message.php');
	require_once('good-message.php');
	require_once('bad-message.php');

	$rc_OK = 0;
	$rc_TERMINATE = 24;
	//echo($file.__LINE__.'] Entered '.$file.$ec.$NL);

	$message =
		$file.'['.__LINE__.'] Entered function'. $lec.$file.      $rec.$NL.
		$file.'['.__LINE__.'] $caller='.         $lec.$caller.    $rec.$NL.
		$file.'['.__LINE__.'] $db_host='.        $lec.$db_host.   $rec.$NL.
		$file.'['.__LINE__.'] $db_port='.        $lec.$db_port.   $rec.$NL.
		$file.'['.__LINE__.'] $db_user='.        $lec.$db_user.   $rec.$NL.
		$file.'['.__LINE__.'] $db_pass='.        $lec.$db_pass.   $rec.$NL.
		$file.'['.__LINE__.'] $db_name='.        $lec.$db_name.   $rec.$NL.
		$file.'['.__LINE__.'] $db_moto="'.       $lec.$db_moto.   $rec.$NL;
	//debug_message($message, FALSE, TRUE);

	//echo($file.__LINE__.'] Really opening the "'.$db_moto.'" database "'.$db_name.'".'.$ec.$NL);
	// See http://www.php.net/manual/en/pdo.construct.php
	//$dsn = 'pgsql:name='.$db_name.';host='.$host.';user='.$db_user.';password='.$db_pass;
	//$dsn = 'pgsql:host=$host;port=5432;db_name=$db_name;user=$db_user;password=$db_pass';
	//$dsn = 'pgsql:db_name=lit;host=localhost';
	//$dsn = 'pgsql:db_name='.$db_name.';host=localhost'; // Works.
	$dsn = 'pgsql:host='.$db_host.';port='.$db_port.';dbname='.$db_name;

	try {
		$driver_options = array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		);               
		$dbh = new PDO($dsn, $db_user, $db_pass, $driver_options);

		$rc = $rc_OK;
		return(array($rc, $dbh));
	} catch (PDOException $e) {
		$message =
			//$file.'['.__LINE__.'] Connection failed: '.$lec.$e->getMessage().$rec.$NL.
			$file.'['.__LINE__.'] dsn = '.             $lec.$dsn.       $rec.$NL.
			$file.'['.__LINE__.'] Entered function '.  $lec.$file.      $rec.$NL.
			$file.'['.__LINE__.'] $caller='.           $lec.$caller.    $rec.$NL.
			$file.'['.__LINE__.'] $db_host='.          $lec.$db_host.   $rec.$NL.
			$file.'['.__LINE__.'] $db_port='.          $lec.$db_port.   $rec.$NL.
			$file.'['.__LINE__.'] $db_user='.          $lec.$db_user.   $rec.$NL.
			$file.'['.__LINE__.'] $db_pass='.          $lec.$db_pass.   $rec.$NL.
			$file.'['.__LINE__.'] $db_name='.          $lec.$db_name.   $rec.$NL.
			$file.'['.__LINE__.'] $db_moto="'.         $lec.$db_moto.   $rec.$NL;
		bad_message($message);
		$rc = $rc_TERMINATE;
	}
 } // End of function really_open_db.

 function open_db($caller, $db_host, $db_port, $db_user, $db_pass, $db_name, $db_moto) {
	$file = 'open-db.php';
	include('ec.php');
	require_once('informational-message.php');
	require_once('debug-message.php');
	require_once('good-message.php');
	require_once('bad-message.php');

	$message =
		$file.'['.__LINE__.'] Entered function'. $lec.$file.      $rec.$NL.
		$file.'['.__LINE__.'] $caller='.         $lec.$caller.    $rec.$NL.
		$file.'['.__LINE__.'] $db_host='.        $lec.$db_host.   $rec.$NL.
		$file.'['.__LINE__.'] $db_port='.        $lec.$db_port.   $rec.$NL.
		$file.'['.__LINE__.'] $db_user='.        $lec.$db_user.   $rec.$NL.
		$file.'['.__LINE__.'] $db_pass='.        $lec.$db_pass.   $rec.$NL.
		$file.'['.__LINE__.'] $db_name='.        $lec.$db_name.   $rec.$NL.
		$file.'['.__LINE__.'] $db_moto="'.       $lec.$db_moto.   $rec.$NL;
	//debug_message($message, FALSE, TRUE);

	$rc_OK = 0;
	$rc_TERMINATE = 24;
	
	if ($db_moto == 'PostgreSQL') {
		list($rc, $dbh) = really_open_db($caller, $db_host, $db_port, $db_user, $db_pass, $db_name, $db_moto);
	} else {  //  Not PostgreSQL
		$bad_message =
			$file.__LINE__.'] Unsupported $db_moto "'.$db_moto.'".'.$ec.$NL;
		$rc = bad_message($bad_message);
		$rc = $rc_TERMINATE;
	} // Not PostgreSQL

	return(array($rc, $dbh));

 } //  End of function open_db.

?>
