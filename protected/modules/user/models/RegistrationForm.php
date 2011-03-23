<?php
/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * user registration form data. It is used by the 'registration' action of 'UserController'.
 */
class RegistrationForm extends User {
	public $verifyPassword;
	public $verifyCode;
	
	public function rules() {
		return array(
			array('username, password, verifyPassword, email', 'required'),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Incorrect username (length between 3 and 20 characters).")),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => UserModule::t("Incorrect password (minimal length 4 symbols).")),
			array('email', 'email'),
			array('username', 'unique', 'message' => UserModule::t("用戶已經存在")),
			array('email', 'unique', 'message' => UserModule::t("EMAIL已經存在")),
			array('password', 'compare', 'compareAttribute'=>'verifyPassword', 'message' => UserModule::t("密碼不符合，請再次輸入")),
			array('verifyCode', 'captcha', 'allowEmpty'=>!UserModule::doCaptcha('registration')),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9\s,]+$/u','message' => UserModule::t("Incorrect symbols (A-z0-9).")),
		);
	}
	
}