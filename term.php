 <?php $file = 'term.php';
 $saved_file_name = $file;
 include('ec.php');
 //echo('<!-- '.$EC.__LINE__.'] Here. -->'.$nl);
 $end_time = microtime(TRUE);
 require_once('ts.php');
 print('Copyright © 2014-'.strftime('%Y').' None… :-)'.$NL);
 print(ts($file,__LINE__).'$_SERVER[\'REMOTE_ADDR\']  = '.$_SERVER['REMOTE_ADDR'].$NL);
 print(ts($file,__LINE__).'http_response_code = '.http_response_code().$NL);
 $fun =
 '<SPAN CLASS="character-set-test">Character set test:</SPAN><BR>
 • ‘’“” …τπøÞɞɷ☯<BR>
 ✿(✿◠‿◠)✿✿¸¸.•*´¯`⊰✿˜”*°•.˜”*°•.˜”*°•.<BR>
 *°•.★★.•°*.•°*”˜.•°*”˜.•°*”˜<BR>
 <SPAN CLASS="Languages">
Languages:
</SPAN><BR>
   Arabic: ټ<BR>
   Armenian: Ֆ<BR>
   Bengali: আ;<BR>
   Ogham: ᚁᚂᚘᚖᚙ <BR>
   Old Italic: 𐌎 𐌏 𐌏<BR>
   <SPAN CLASS="Yorùbá">
	 Yorùbá:<BR>
		 ÀèÌòÙÁéÍóÚ<BR>
		 ẸẹỌọṢṣẸ̀Ẹ̀ẹ̀Ọ̀ọ̀Ẹ́ ẹ́Ọ́ọ́<BR>
		 Ññ<BR>
		 (1) Àrà-Keñgé<BR>
		 (2) ÀrÀ-KeÑgÉ<BR>
   </SPAN>';
 print($NL.$fun.$NL);
 print('<SPAN CLASS="my_IP">'.$EC.__LINE__.'] $my_IP=“'.$my_IP.'”;</SPAN>'.$NL);
 print('DATE_ATOM: '.date(DATE_ATOM).':'.$NL);
 $current_time = current_time();
 print($EC.__LINE__.'] $current_time: '.$current_time.$NL);
 print($EC.__LINE__.'] session_id(): “'.session_id().'”.'.$NL);

 $duration = $end_time - $start_time;
 $clearance_level = isset($_SESSION['clearance_level']) == TRUE
   ? $_SESSION['clearance_level']
   : '';
 print($EC.__LINE__.'] Page generated in '.round($duration,4).$clearance_level.' seconds.<br>'."\n");
 print('<SPAN CLASS="session-information">
	Session information:<BR>
</SPAN>');
 print('$_SERVER[\'REMOTE_ADDR:PORT\']: '.$_SERVER['REMOTE_ADDR'].':'.$_SERVER['REMOTE_PORT'].$NL);

 //phpinfo();
 print('$_SERVER[\'SERVER_NAME\']: “'.$_SERVER['SERVER_NAME'].'”'.$NL);
 print('$_SERVER[\'SERVER_ADDR:PORT\']: '.$_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_PORT'].$NL);

 ?>
 <!-- -->
 <SCRIPT type="text/javascript">
	 document.write('Browser is running in ');
	 document.write((document.compatMode=='CSS1Compat')?
		 'Standards':
		 'Quirks');
	 document.write(' mode.<br>\n');
 </SCRIPT>
 <!-- -->

 <?php
 $i = 2;
 print('Uptime '.$i.':'.$nl);
 switch($i) {

	 case 1:
		 uptime();
		 break;

	 case 2:
		 system('uptime');
		 print($NL.$nl);
		 break;

	 default:
		 print ('<script language="JavaScript">'.$nl);
		 print ('TargetDate = "2015-02-17T08:16:31-0000";'.$nl);
		 print ('BackColor = "palegreen";'.$nl);
		 print ('ForeColor = "navy";'.$nl);
		 print ('CountActive = true;'.$nl);
		 print ('CountStepper = 1;'.$nl);
		 print ('LeadingZero = true;'.$nl);
		 print ('DisplayFormat = "%%D%% days, %%H%%:%%M%%:%%S%%";'.$nl);
		 print ('FinishMessage = "It is finally here!";'.$nl);
		 print ('</script>'.$nl);
		 print ('<script language="JavaScript" src="countdown.js"></script>'.$NL);
		 print ('<br>Thanks to <a href="http://www.hashemian.com/tools/">Robert Hashemian</a> for the cool uptime counter.'.$NL);
		 break;

 }
 $file = $saved_file_name;
?>