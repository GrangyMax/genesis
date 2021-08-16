<?php
//Вызываем функцию для перехвата данных
add_action( 'wpcf7_mail_sent', 'your_wpcf7_mail_sent_function' );
function your_wpcf7_mail_sent_function( $contact_form ) {

//подключение к серверу CRM
define('CRM_HOST', 'klinikagenesis.bitrix24.ru'); // Ваш домен CRM системы
define('CRM_PORT', '443'); // Порт сервера CRM. Установлен по умолчанию
define('CRM_PATH', '/crm/configs/import/lead.php'); // Путь к компоненту lead.rest

//авторизация в CRM
define('CRM_LOGIN', 'klinikagenesis@ya.ru'); // Логин пользователя Вашей CRM по управлению лидами
define('CRM_PASSWORD', 'G3yZIR2X4V'); // Пароль пользователя Вашей CRM по управлению лидами

//перехват данных из формы Задать вопрос(Главная)
$title = $contact_form->title;
$posted_data = $contact_form->posted_data;


//====================начало формы Задать вопрос(Главная) ==============================//
if ('Задать вопрос(Главная)' == $title ): { //Вместо "Контактная форма 1" необходимо указать название Вашей контактной формы
	$submission = WPCF7_Submission::get_instance();
	$posted_data = $submission->get_posted_data();

	//далее мы перехватывает введенные данные в Contact Form 7
	$firstName = $posted_data['your-name']; //перехватываем поле [your-name]
	$emailmessage = $posted_data['your-email']; //перехватываем поле [your-message]
	$phoneNumbers = $posted_data['your-tel'];
	$TextArea = $posted_data['textarea-982'];

	//сопостановление полей Bitrix24 с полученными данными из Contact Form 7
	$postData = array(
	'TITLE' => 'Вопрос со страницы(ГЛАВНАЯ)', // Установить значение свое значение
	'NAME' => $firstName,
	'EMAIL_WORK' => $emailmessage,
	'PHONE_MOBILE' => $phoneNumbers,
	'COMMENTS' => $TextArea,
	);

	//передача данных из Contact Form 7 в Bitrix24
	if (defined('CRM_AUTH')) {
		$postData['AUTH'] = CRM_AUTH;
	} else {
		$postData['LOGIN'] = CRM_LOGIN;
		$postData['PASSWORD'] = CRM_PASSWORD;
	}

	$fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
	if ($fp) {
		$strPostData = '';
	foreach ($postData as $key => $value)
		$strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

		$str = "POST ".CRM_PATH." HTTP/1.0\r\n";
		$str .= "Host: ".CRM_HOST."\r\n";
		$str .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$str .= "Content-Length: ".strlen($strPostData)."\r\n";
		$str .= "Connection: close\r\n\r\n";
		$str .= $strPostData;

	fwrite($fp, $str);
	$result = '';

	while (!feof($fp))
	{
		$result .= fgets($fp, 128);
	}
		fclose($fp);

	$response = explode("\r\n\r\n", $result);

	$output = '
	.print_r($response[1], 1).
	';
	} else {
	echo 'Connection Failed! '.$errstr.' ('.$errno.')';}
};
//========================Конец формы Задать вопрос(Главная)===================//



//========================Начало формы Обратный звонок(Главная)==================================//

elseif('Обратный звонок(Главная)' == $title ): { //Вместо "Контактная форма 2" необходимо указать название Вашей контактной формы
	$submission = WPCF7_Submission::get_instance();
	$posted_data = $submission->get_posted_data();

	//далее мы перехватывает введенные данные в Contact Form 7
	$firstName = $posted_data['your-name']; //перехватываем поле [your-name]
	$phoneNumbers = $posted_data['your-tel']; //перехватываем поле [your-tel]

	//сопостановление полей Bitrix24 с полученными данными из Contact Form 7
	$postData = array(
	'TITLE' => 'Обратный звонок(Главная)', // Установить значение свое значение
	'NAME' => $firstName,
	'PHONE_MOBILE' => $phoneNumbers,
	);

	//передача данных из Contact Form 7 в Bitrix24
	if (defined('CRM_AUTH')) {
	$postData['AUTH'] = CRM_AUTH;
	} else {
	$postData['LOGIN'] = CRM_LOGIN;
	$postData['PASSWORD'] = CRM_PASSWORD;
	}

	$fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
	if ($fp) {
	$strPostData = '';
	foreach ($postData as $key => $value)
	$strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

	$str = "POST ".CRM_PATH." HTTP/1.0\r\n";
	$str .= "Host: ".CRM_HOST."\r\n";
	$str .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$str .= "Content-Length: ".strlen($strPostData)."\r\n";
	$str .= "Connection: close\r\n\r\n";

	$str .= $strPostData;

	fwrite($fp, $str);

	$result = '';
	while (!feof($fp))
	{
	$result .= fgets($fp, 128);
	}
	fclose($fp);

	$response = explode("\r\n\r\n", $result);

	$output = print_r($response[1], 1);
	} else {
	echo 'Connection Failed! '.$errstr.' ('.$errno.')';
	}
}; 

//====================Конец формы Обратный звонок(Главная)===================================//



//================Начало формы Запись на прием(Главная)================//


elseif('Запись на прием(Главная)' == $title ): { //Вместо "НОВАЯ КОНТАКТНАЯ ФОРМА" необходимо указать название Вашей контактной формы
   $submission = WPCF7_Submission::get_instance();
   $posted_data = $submission->get_posted_data();
   
   //далее мы перехватывает введенные данные в Contact Form 7
   $firstName = $posted_data['your-name']; //перехватываем поле [your-name]
   $emailmessage = $posted_data['your-email']; //перехватываем поле [your-message]
   $phoneNumbers = $posted_data['your-tel']; //перехватываем поле [your-name]
   $cities = $posted_data['your-city']; //перехватываем поле [your-city]
   $datel = $posted_data['your-date']; //перехватываем поле [your-date]   
   
   //сопостановление полей Bitrix24 с полученными данными из Contact Form 7
   $postData = array(
   'TITLE' => 'Запись на приём!', // Установить значение свое значение
   'NAME' => $firstName,
   'COMMENTS' => $cities,
   'EMAIL_WORK' => $emailmessage,
   'PHONE_MOBILE' => $phoneNumbers, 
   'UF_CRM_1591101977' => $datel,  
   );
   
   //передача данных из Contact Form 7 в Bitrix24
   if (defined('CRM_AUTH')) {
	   $postData['AUTH'] = CRM_AUTH;
	   } else {
	   $postData['LOGIN'] = CRM_LOGIN;
	   $postData['PASSWORD'] = CRM_PASSWORD;
   }
   
   $fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
   if ($fp) {
		$strPostData = '';
   foreach ($postData as $key => $value)
   $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);
   
	   $str = "POST ".CRM_PATH." HTTP/1.0\r\n";
	   $str .= "Host: ".CRM_HOST."\r\n";
	   $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
	   $str .= "Content-Length: ".strlen($strPostData)."\r\n";
	   $str .= "Connection: close\r\n\r\n";
   
   $str .= $strPostData;
   
   fwrite($fp, $str);
   
	$result = '';
   while (!feof($fp))
   {
	$result .= fgets($fp, 128);
   }
   fclose($fp);
   
   $response = explode("\r\n\r\n", $result);
   
   $output = print_r($response[1], 1);
   } else {
   echo 'Connection Failed! '.$errstr.' ('.$errno.')';
   }
   }; 
   
 //===================Конец формы Запись на прием(Главная)==================================
 
 
 
 //===================Запись на прием(Клиника)==================================
   
   
//Начало Новой формы формы
elseif('Запись на прием(Клиника)' == $title ): { //Вместо "НОВАЯ КОНТАКТНАЯ ФОРМА" необходимо указать название Вашей контактной формы
   $submission = WPCF7_Submission::get_instance();
   $posted_data = $submission->get_posted_data();
   
   //далее мы перехватывает введенные данные в Contact Form 7
   $firstName = $posted_data['your-name']; //перехватываем поле [your-name]
   $emailmessage = $posted_data['your-email']; //перехватываем поле [your-message]
   $phoneNumbers = $posted_data['your-tel']; //перехватываем поле [your-name]    
   $direction = $posted_data['direction']; //перехватываем поле [direction]
   $clinic = $posted_data['clinic']; //перехватываем поле [clinic]   
   $message = $posted_data['textarea-672']; //перехватываем поле [message]  
   $chapter = $posted_data['chapter']; //перехватываем поле [chapter]    
   $datel = $posted_data['your-date']; //перехватываем поле [your-name] 
   //сопостановление полей Bitrix24 с полученными данными из Contact Form 7
   $postData = array(
	   'TITLE' => $chapter, // Установить значение свое значение
	   'NAME' => $firstName,
	   'COMMENTS' => $message,
	   'EMAIL_WORK' => $emailmessage,
	   'PHONE_MOBILE' => $phoneNumbers, 
	   'UF_CRM_1591101977' => $datel, 
	   'UF_CRM_1628756578' => $clinic,	   
	   'UF_CRM_1628757067' => $direction  
   );
   
   //передача данных из Contact Form 7 в Bitrix24
   if (defined('CRM_AUTH')) {
   $postData['AUTH'] = CRM_AUTH;
   } else {
   $postData['LOGIN'] = CRM_LOGIN;
   $postData['PASSWORD'] = CRM_PASSWORD;
   }
   
   $fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
   if ($fp) {
   $strPostData = '';
   foreach ($postData as $key => $value)
   $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);
   
   $str = "POST ".CRM_PATH." HTTP/1.0\r\n";
   $str .= "Host: ".CRM_HOST."\r\n";
   $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
   $str .= "Content-Length: ".strlen($strPostData)."\r\n";
   $str .= "Connection: close\r\n\r\n";
   
   $str .= $strPostData;
   
   fwrite($fp, $str);
   
   $result = '';
   while (!feof($fp))
   {
   $result .= fgets($fp, 128);
   }
   fclose($fp);
   
   $response = explode("\r\n\r\n", $result);
   
   $output = print_r($response[1], 1);
   } else {
   echo 'Connection Failed! '.$errstr.' ('.$errno.')';
   }
   }; 
    
 //===================Конец формы Запись на прием(Клиника)==================================
   
   
   
//===================Запись на прием(Услуга)==================================
      
//Начало Новой формы формы
elseif('Запись на прием(Услуга)' == $title ): { //Вместо "НОВАЯ КОНТАКТНАЯ ФОРМА" необходимо указать название Вашей контактной формы
   $submission = WPCF7_Submission::get_instance();
   $posted_data = $submission->get_posted_data();
   
   //далее мы перехватывает введенные данные в Contact Form 7
   $firstName = $posted_data['your-name']; //перехватываем поле [your-name]
   $emailmessage = $posted_data['your-email']; //перехватываем поле [your-message]
   $phoneNumbers = $posted_data['your-tel']; //перехватываем поле [your-name]  
   $clinic = $posted_data['clinic']; //перехватываем поле [clinic]   
   $message = $posted_data['textarea-672']; //перехватываем поле [message] 
   $datel = $posted_data['your-date']; //перехватываем поле [your-name] 
   //сопостановление полей Bitrix24 с полученными данными из Contact Form 7
   $postData = array(
	   'TITLE' => "Клиника Генезис 'Запись на прием(Услуга)'", // Установить значение свое значение
	   'NAME' => $firstName,
	   'COMMENTS' => $message,
	   'EMAIL_WORK' => $emailmessage,
	   'PHONE_MOBILE' => $phoneNumbers, 
	   'UF_CRM_1591101977' => $datel, 
	   'UF_CRM_1628756578' => $clinic  
	
   );
   
   //передача данных из Contact Form 7 в Bitrix24
   if (defined('CRM_AUTH')) {
   $postData['AUTH'] = CRM_AUTH;
   } else {
   $postData['LOGIN'] = CRM_LOGIN;
   $postData['PASSWORD'] = CRM_PASSWORD;
   }
   
   $fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
   if ($fp) {
   $strPostData = '';
   foreach ($postData as $key => $value)
   $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);
   
   $str = "POST ".CRM_PATH." HTTP/1.0\r\n";
   $str .= "Host: ".CRM_HOST."\r\n";
   $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
   $str .= "Content-Length: ".strlen($strPostData)."\r\n";
   $str .= "Connection: close\r\n\r\n";
   
   $str .= $strPostData;
   
   fwrite($fp, $str);
   
   $result = '';
   while (!feof($fp))
   {
   $result .= fgets($fp, 128);
   }
   fclose($fp);
   
   $response = explode("\r\n\r\n", $result);
   
   $output = print_r($response[1], 1);
   } else {
   echo 'Connection Failed! '.$errstr.' ('.$errno.')';
   }
   }; 
    
 //===================Конец Запись на прием(Услуга)==================================

 
 
//===================Форма Записи на прием со страницы Контакты ==================================
      
//Начало Новой формы формы
elseif('Запись на прием(Контакты)' == $title ): { //Вместо "НОВАЯ КОНТАКТНАЯ ФОРМА" необходимо указать название Вашей контактной формы
   $submission = WPCF7_Submission::get_instance();
   $posted_data = $submission->get_posted_data();
   
   //далее мы перехватывает введенные данные в Contact Form 7
   $firstName = $posted_data['your-name']; //перехватываем поле [your-name]
   $emailmessage = $posted_data['your-email']; //перехватываем поле [your-message]
   $phoneNumbers = $posted_data['your-tel']; //перехватываем поле [your-name]  
   $clinic = $posted_data['clinic']; //перехватываем поле [clinic]   
   $message = $posted_data['textarea-672']; //перехватываем поле [message] 
   $datel = $posted_data['your-date']; //перехватываем поле [your-name] 
   //сопостановление полей Bitrix24 с полученными данными из Contact Form 7
   $postData = array(
	   'TITLE' => "Клиника Генезис 'Запись на прием(Контакты)'", // Установить значение свое значение
	   'NAME' => $firstName,
	   'COMMENTS' => $message,
	   'EMAIL_WORK' => $emailmessage,
	   'PHONE_MOBILE' => $phoneNumbers, 
	   'UF_CRM_1591101977' => $datel, 
	   'UF_CRM_1628756578' => $clinic  
	
   );
   
   //передача данных из Contact Form 7 в Bitrix24
   if (defined('CRM_AUTH')) {
   $postData['AUTH'] = CRM_AUTH;
   } else {
   $postData['LOGIN'] = CRM_LOGIN;
   $postData['PASSWORD'] = CRM_PASSWORD;
   }
   
   $fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
   if ($fp) {
   $strPostData = '';
   foreach ($postData as $key => $value)
   $strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);
   
   $str = "POST ".CRM_PATH." HTTP/1.0\r\n";
   $str .= "Host: ".CRM_HOST."\r\n";
   $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
   $str .= "Content-Length: ".strlen($strPostData)."\r\n";
   $str .= "Connection: close\r\n\r\n";
   
   $str .= $strPostData;
   
   fwrite($fp, $str);
   
   $result = '';
   while (!feof($fp))
   {
   $result .= fgets($fp, 128);
   }
   fclose($fp);
   
   $response = explode("\r\n\r\n", $result);
   
   $output = print_r($response[1], 1);
   } else {
   echo 'Connection Failed! '.$errstr.' ('.$errno.')';
   }
   }; 
    
	
 //=================== Конец формы Записи на прием со страницы Контакты  ==================================
 
  
  
  
  
   
   
 endif; 
}
?>