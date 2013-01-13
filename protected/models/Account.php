<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property integer $id
 * @property string $login
 * @property string $login
 *
 * The followings are the available model relations:
 * @property Advcomp[] $advcomps
 */
class Account extends CActiveRecord
{
    
        const ROLE_BANNED = 10;
        const SCENARIO_SIGNUP = 'signup';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Account the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login', 'length', 'max'=>30),
                        array ('mail, password', 'safe', 'on' => 'signup'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, login', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'advcomps' => array(self::HAS_MANY, 'Advcomp', 'owner'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
                        'mail' => "e-mail",
                        'password' => 'Пароль',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('login',$this->login,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord && $this->scenario==Account::SCENARIO_SIGNUP)
			{

				// Адрес электронной почты - приводим  нижнему регистру
						$this->mail = strtolower($this->mail);
						
						// Логин
						//$mass = explode("@", $this->mail);
						//$this->login = 
						//$this->setLogin($mass[0]);
						
						// Время регистрации
						$this->register_date = date('Y-m-d H:i:s');
						
						// Пароль - хэшируем
						$pass = $this->password;
						$salt = $this->mail . $this->register_date;
						//$commonSalt = Yii::app()->params['commonSalt'];
						//$this->password = $this->hashPassword( md5($pass) . md5($salt) . md5($commonSalt) );
                                                
						$this->password = md5($pass);
						
						// Статус - присваиваем статус пользователя - не активированный
						$this->status_id = 0;
						
						// Активационный код
						//$this->activate_key = md5(time().$this->mail);

			}
	
			return true;
		}
		return false;
	}
        
        public function validatePassword ($password, $bf_hash)
        {
            //return crypt($password, $bf_hash) === $bf_hash;
            return md5($password) === $bf_hash;
        }
}