<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
    /**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $username = strtolower($this->username);
		$user = User::model()->findByAttributes(array('user_name'=>$username));
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