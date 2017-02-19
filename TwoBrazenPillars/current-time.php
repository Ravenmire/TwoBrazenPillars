<?php // current-time.php

 /**********************************************************************
  • 
  • Returns the current time to microsecond precision as a string.
  • 
  • Change log:
  • 2016-08-27 Made sure that values were 6 digits of precision.
  • 
 **********************************************************************/

 /*
  • NOTE: This function fakes UTC.
  • By default, microtime() returns a string in the form "msec sec",
    where sec is the number of seconds since the Unix epoch
    (0:00:00 January 1,1970 GMT), and msec measures microseconds
    that have elapsed since sec and is also expressed in seconds.
  */

 function current_time($tz='UTC') {

     $file = 'current-time.php';
     $eye_catcher = '+';
     $nl = "\n";
     $NL = $nl.'<br>';
     
     $mt = explode(' ',microtime(FALSE));
     $usec = $mt[0];
     $usec = substr($usec.'0000000', 1, 7); // 1 removes the leading '0' and preserves the '.'
     //fwrite(STDERR,$eye_catcher.$file.'['.__LINE__.'] $usec = '.$usec.$nl);
     $sec  = $mt[1];
     $current_time = gmdate('Y-m-d\TH:i:s'.$usec).$tz; // Works
     //fwrite(STDERR,$eye_catcher.$file.'['.__LINE__.'] $current_time = '.$current_time.$nl);
     //fwrite(STDERR,$eye_catcher.$file.'['.__LINE__.'] $current_time = ');var_dump($current_time);

     return($current_time);

 } // End of current-time.php
?>
