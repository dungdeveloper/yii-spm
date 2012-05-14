<?php

class UserIdentity extends CUserIdentity
{
	private $_id;
    public $email;

    public function __construct($email,$password)
    {
        $this->email=$email;
        $this->password=$password;
    }

	public function authenticate()
	{
        $email = strtolower($this->email);
		$user = User::model()->findByAttributes(array('user_email'=>$email));
		if($user === null)
        {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        else
        {
            if($user->user_password !== $user->encrypt($this->password))
            {
                //CVarDumper::dump($user->encrypt($this->password)); die;
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            }
            else
            {
                $this->_id = $user->user_id;
                if($user->user_lastvisit === null)
                {
                    $lastlogin = time();
                }
                else
                {
                    $lastlogin = strtotime($user->user_lastvisit);
                }
                $this->setState('lastLoginTime', $lastlogin);
                $this->setState('fullName', $user->getFullName());
                $this->setState('role', $user->getRoleOfUser());
                $this->errorCode = self::ERROR_NONE;
            }
        }
        return !$this->errorCode;
	}

    /*
     *
     */
    public function getId()
    {
        return $this->_id;
    }
}