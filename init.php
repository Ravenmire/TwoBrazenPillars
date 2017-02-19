<?php //  init.php
 /************************** Disable code *****************************
 *************************** Enable  code ****************************/
 //$fun='<strong>Character set test:</strong><br>• ‘’“” …τπøÞɞɷ☯✿(✿◠‿◠)✿✿¸¸.•*´¯`⊰✿˜”*°•.˜”*°•.˜”*°•.*°•.★★.•°*.•°*”˜.•°*”˜.•°*”˜<br>Arabic:ټ ; Armenian :Ֆ; Bengali: আ; Ogham: ᚁᚂᚘᚖᚙ ; Old Italic: 𐌎𐌏<br>';

   $start_time = microtime(TRUE); //TRUE: get microtime as float.

   //Notice: A session had already been started - ignoring session_start() in init.php on line 7
   //session_start();  // Not here...only where needed.  Remove above Notice.

   // The hashing algorithm can be anything from hash_algos();
   // However, PostgreSQL supports MD5.
   // Testing entries can be entered with psql if MD5 is used.

   $TZ = 'America/New_York';

   $rc_inital = 0;
   $rc_increment = 4;

   $indent = ' ';          // Start in column 2.
   $indent_incr = '    ';  // Indent by 4 more columns.

            $rc = $rc_OK = $rc_inital;
        $rc = $rc_NOTICE = $rc + $rc_increment;
       $rc = $rc_WARNING = $rc + $rc_increment;
         $rc = $rc_ERROR = $rc + $rc_increment;
        $rc = $rc_SEVERE = $rc + $rc_increment;
     $rc = $rc_TERMINATE = $rc + $rc_increment;
                  $FATAL = 'FATAL PROGRAMMING ERROR!';

   //  Code stage prefix and suffixes.
       $ldl = ' >>>---> ';
       $rdl = ' <---<<< ';

   //  Extract program name from URL.
   $filename = $_SERVER['SCRIPT_FILENAME'];

   //  Create base URL for destination screens.  
   $host = $_SERVER["HTTP_HOST"];
   $uri = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
   $URI = $uri.'/';
   $path = explode('/',$filename);
   $pgm = end($path);

   // Add $next to this variable to form the place to go.
   $URI = 'Location: '.$URI;

   $tf = 'H:i:s';  //  Set time stamp format.

   // Keep track of when the file changed.
   $filemtime = filemtime($filename);
   $fileinfo = $pgm.' modified'.
       ' '.date(DATE_ATOM,$filemtime).$NL;

   //  Create the first part of the transfer URL.
   //  
     $host  = $_SERVER['HTTP_HOST'];
     $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
     $header = 'Location: http://'.$host.$uri.'/\'';

 $server = $_SERVER['SERVER_ADDR'];

 switch ($server) {

     case '127.0.0.1':
         $server = 'localhost';
         break;

     case '192.168.0.100':
         $server = 'blue';
         break;

     case '192.168.0.102':
         $server = 'timesoak';
         break;

     default:
         break;
 }

 //  End of init.php.
 ?>
