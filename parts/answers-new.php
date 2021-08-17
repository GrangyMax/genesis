<?php

if(isset($_POST['question'])){
	$q = $_POST['question'];
	
}

$answer_id = false;
if ($q['name'] && $q['email'] && $q['question']) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

        // Build POST request:
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = GOG_API;
        $recaptcha_response = $_POST['recaptcha_response'];
  
        // Make and decode POST request:
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha);
  
        // Take action based on the score returned:
        if ($recaptcha->score >= 0.5 || !GOG_API) {
    $new_answer = array(
        'post_title' => "* Новый вопрос ({$q['name']}, {$q['email']})",
        'post_content' => $q['question'],
        'post_type' => 'answers'
    );
    $answer_id = wp_insert_post($new_answer);
	$multiple_to_recipients = array('klinikagenesis@yandex.ru'		
										);
    if ($answer_id) {
        update_post_meta($answer_id, 'name', $q['name']);
        update_post_meta($answer_id, 'email', $q['email']);
        add_filter('wp_mail_from',create_function('', 'return "'.get_option('admin_email').'";'));
        add_filter('wp_mail_from_name',create_function('', 'return "Клиника Genesis";'));                              
        $mTitle = "* Новый вопрос ({$q[name]}, {$q[email]})";
        $mLink = get_damn_edit_post_link($answer_id);   
        $siteurl = get_site_url();
        $mBody = $q['question']. "\n\n\n".  "Чтобы ответить на этот вопрос - перейдите по следующей ссылке: {$siteurl}{$mLink}";				
		wp_mail($multiple_to_recipients, $mTitle, $mBody); 
      // wp_mail('klinikagenesis@yandex.ru', $mTitle, $mBody);  
        //wp_mail((get_option('admin_email')?get_option('admin_email'):'wgnss@mailinator.com'), $mTitle, $mBody, $headers);
		}      
	}     
}            
}    
?>
<?php if (!$answer_id) { ?>
<form class="nobottommargin" id="template-contactform" name="template-contactform" action="<?=site_url().'/answers/'?>" method="POST" novalidate="novalidate">
    <div class="form-process"></div>
    <?php /*<div class="form-group ">
        <select name="question[type]" id="inputState " class="form-control valid">
            <option selected="" disabled>Клиника</option>
            <option>Онкологя</option>
            <option>Многопрофильный центр</option>
            <option>Центр зрения</option>
            <option>Детская клиника</option>
            <option>Севастопольская клиника</option>
        </select>
    </div>  */ ?>
    <div class="col_half">
        <label for="template-contactform-name">Имя <small>*</small></label>
        <input type="text" id="template-contactform-name" name="question[name]" value="" class="sm-form-control required valid">
    </div>
    <div class="col_half col_last">
        <label for="template-contactform-email">Почта <small>*</small></label>
        <input type="email" id="template-contactform-email" name="question[email]" value="" class="required email sm-form-control valid">
		<p id="result"></p>
    </div>
    <div class="clear"></div>
    <div class="col_full">
        <label for="template-contactform-message">вопрос <small>*</small></label>
        <textarea class="required sm-form-control" id="template-contactform-message" name="question[question]" rows="6" cols="30"></textarea>
    </div>
    <div class="col_full hidden">
        <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control">
    </div>
    <div class="col_full">
        <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin bgorange">Оставить вопрос</button>
    </div>
    <input type="hidden" name="prefix" value="template-contactform-">
    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
</form>
<script>

	function validateEmail(email) {
	  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}
	
	function validate() {
	  const $result = $("#result");
	  const email = $("#template-contactform-email").val();
	  $result.text("");

	  if (!validateEmail(email)) {		
		$result.text("Неверный формат email");
		$result.css("color", "red");
	  }
	  return false;
	}
	$("#template-contactform-email").on("blur", validate);

</script>

<?php } else { ?>
<p>Ваш вопрос поступил в обработку.</p>                        
<?php } ?>