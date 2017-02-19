<?php
/*
 *
 * bad-message.php
 *
 * Display a bad, probably error, message in a nice box. Maybe.
 *
 */

function bad_message($message,$mail_it=TRUE,$print_it=TRUE,$print_diag=TRUE) {

    //$message = wordwrap($message, 70, $CRLF, FALSE);

    $file = 'bad-message.php';
    include('ec.php');
    require_once('current-time.php');
    $timestamp = current_time();

    $cr = "\r";
    $lf = "\n";
    $CRLF = $cr.$lf;
    $nl = $lf;
    $NL = '<BR>'.$nl;
    $rc_OK = 0;

    if ($print_diag == TRUE) {
        $diagnostics =
            '$_POST:'.    $CRLF.json_encode($_POST).    $CRLF.$CRLF.
            '$_COOKIE:'.  $CRLF.json_encode($_COOKIE).  $CRLF.$CRLF.
            '$_REQUEST:'. $CRLF.json_encode($_REQUEST). $CRLF.$CRLF.
            '$_SERVER:'.  $CRLF.json_encode($_SERVER).  $CRLF.$CRLF;
    } else {
        $diagnostics = '';
    }

    //$diagnostics = wordwrap($diagnostics, 70, $CRLF, FALSE;

    //echo($EC.__LINE__.'] $print_it=');var_dump($print_it);echo($nl);
    if ($print_it == FALSE) {
        // Don’t print it.
    } else {
        print('<FIELDSET CLASS="bad-message">'.$nl);
        print('    <LEGEND> <B><I>Bad message</I></B> </LEGEND>'.$nl);
        //echo($EC.__LINE__.'] $print_it=');var_dump($print_it);echo($NL);
        //echo($EC.__LINE__.'] $cookie_file = /tmp/sess_'.session_id().$NL);
        //print($diagnostics);
        print($message);
        //print($diagnostics);
        print('</FIELDSET><BR>'.$nl);
    }

    //echo($EC.__LINE__.'] $mail_it=');var_dump($mail_it);echo($nl);
    if ($mail_it == FALSE) {
        // Don’t mail it.
    } else {

        $rc = mail(
            'stercor@gmail.com',          // Parameter 1: To.
            'Error '.$timestamp,          // Parameter 2: Subject.
            '$_SERVER[\'$REMOTE_ADDR\']: '.$_SERVER['REMOTE_ADDR'].$NL.   // Parameter 3: Message.
            $message.$nl.'timestamp: '.$timestamp.$nl.$nl.$diagnostics
            );

        if ($rc == FALSE) {
            print('$_SERVER[\'$REMOTE_ADDR\']: '.$_SERVER['REMOTE_ADDR'].$NL);
            print('<BR><B>Good message <I>not</I> sent at '.$timestamp.'</B>.<BR>'.$nl);
        } else {
            //print('$_SERVER[\'$REMOTE_ADDR\']: '.$_SERVER['REMOTE_ADDR'].$NL);
            //echo('<BR>Good message sent at '.$timestamp.'.<BR>'.$nl);
        }
    }

    return($rc_OK);

 } // End of bad_message function.
?>
