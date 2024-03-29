<?php

/**
 * This is the model class for table "node_tag".
 *
 * The followings are the available columns in table 'node_tag':
 * @property integer $id
 * @property integer $node_id
 * @property integer $tag_id
 *
 * The followings are the available model relations:
 * @property Tag $tag
 * @property Node $node
 */
class NodeTag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NodeTag the static model class
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
		return 'node_tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('node_id, tag_id', 'required'),
			array('node_id, tag_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, node_id, tag_id', 'safe', 'on'=>'search'),
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
			'tag' => array(self::BELONGS_TO, 'Tag', 'tag_id'),
			'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'node_id' => 'Node',
			'tag_id' => 'Tag',
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
		$criteria->compare('node_id',$this->node_id);
		$criteria->compare('tag_id',$this->tag_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}