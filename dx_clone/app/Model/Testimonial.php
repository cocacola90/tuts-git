<?php 
App::uses('AppModel','Model');
class Testimonial extends AppModel{
	# ================= captcha ==================#
	function matchCaptcha($inputValue)	{
		return $inputValue['captcha']==$this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
	}

	function setCaptcha($value)	{
		$this->captcha = $value;
	}

	function getCaptcha()	{
		return $this->captcha;
	}
}
?>