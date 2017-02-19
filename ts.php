<?php // ts.php
 //  Returns a time-stamp.

 require_once('current-time.php');

 function ts($file) {

     //$nl = "\n";
     //$NL = $nl.'<br>';
     //$file = 'ts.php';

     //echo($file.'['.__LINE__.']'.$NL);
     $ts = current_time().' '.$file;
     //echo($file.'['.__LINE__.'] $ts = '.$ts.'.'.$NL);

     return($ts);
 }
?>
