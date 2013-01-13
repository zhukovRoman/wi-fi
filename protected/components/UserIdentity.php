<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
	private $_id;
	private $_mail;
	const ERROR_EMAIL_INVALID=3;
	const ERROR_STATUS_NOTACTIVATED=4;
	const ERROR_STATUS_BANNED=5;
	
	
	
	public function authenticate()
	{
		
		// Если пользователь заходит по e-mail, приводим к нижнему регистру
		$username = strtolower($this->username); 
	
		$account = Account::model()->find('mail=:username', array(':username'=>$username));
		$this->errorCode = 0;
		if ($account===null)
		{
			$this->errorCode=self::ERROR_EMAIL_INVALID; 
		}
		else 
		{
			//if (!$account->validatePassword(
			//		md5($account->password) . md5($account->mail . $account->register_date) . md5(Yii::app()->params['commonSalt'])
			//))
				
			if ( !$account->validatePassword ( $this->password , $account->password ))
			{
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			}
			else
			{
					if ($account->status_id  == Account::ROLE_BANNED)
					{
						$this->errorCode=self::ERROR_STATUS_BANNED;
					}
					else 
					{
						$this->_id=$account->id;
                                                $this->_mail=$account->mail;
						$this->errorCode=self::ERROR_NONE;
						
						$account->last_login = date('Y-m-d H:i:s');
						$account->save(false);
					}
				
			}	
		}
		return !$this->errorCode;
	}
	
//	public function authenticateByActivationCode()
//	{
//		$account = Account::model()->findByAttributes(array('mail'=>$this->username));
//		
//		if ($account===null)
//		{
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		}
//		else 
//		{
//			if ($account->activate_key !== $this->password)//(!$account->validatePassword($this->password))
//			{
//				$this->errorCode=self::ERROR_PASSWORD_INVALID;
//			}
//			else
//			{
//				$this->_id = $account->id;
//				$this->errorCode=self::ERROR_NONE;
//			}
//		}
//		return $this->errorCode==self::ERROR_NONE;
//	}
	
	public function getId()
	{
		return $this->_id;
	}
}