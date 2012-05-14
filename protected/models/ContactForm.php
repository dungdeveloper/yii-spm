<?php

class ContactForm extends CFormModel {

    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    public function rules() {
        return array(
            array('name, email, subject, body', 'required'),
            array('email', 'email'),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
        );
    }

    public function attributeLabels() {
        return array(
            'verifyCode' => 'Verification Code',
        );
    }
    
    /**
     * Send message to admin 
     */
    public function send() {
        $to = Yii::app()->params['adminEmail'];
        $subject = $this->subject;
        $message = $this->body;
        @mail($to, $subject, $message);
    }

}