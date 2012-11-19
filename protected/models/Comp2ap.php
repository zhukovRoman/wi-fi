<?php

/**
 * This is the model class for table "comp2ap".
 *
 * The followings are the available columns in table 'comp2ap':
 * @property integer $id
 * @property integer $id_comp
 * @property integer $id_ap
 *
 * The followings are the available model relations:
 * @property Node $idAp
 * @property Advcomp $idComp
 */
class Comp2ap extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comp2ap the static model class
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
		return 'comp2ap';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_comp, id_ap', 'required'),
			array('id_comp, id_ap', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_comp, id_ap', 'safe', 'on'=>'search'),
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
			'idAp' => array(self::BELONGS_TO, 'Node', 'id_ap'),
			'idComp' => array(self::BELONGS_TO, 'Advcomp', 'id_comp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_comp' => 'Id Comp',
			'id_ap' => 'Id Ap',
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
		$criteria->compare('id_comp',$this->id_comp);
		$criteria->compare('id_ap',$this->id_ap);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}