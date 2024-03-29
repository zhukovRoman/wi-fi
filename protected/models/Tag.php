<?php

/**
 * This is the model class for table "tag".
 *
 * The followings are the available columns in table 'tag':
 * @property integer $id
 * @property string $text
 *
 * The followings are the available model relations:
 * @property NodeTag[] $nodeTags
 */
class Tag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tag the static model class
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
		return 'tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, text', 'safe', 'on'=>'search'),
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
			'nodeTags' => array(self::HAS_MANY, 'NodeTag', 'tag_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'text' => 'Text',
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
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
//        public function getAllOption ()
//        {
//            $tags = Tag::model()->findAll();
//            $res = "";
//            foreach ($tags as $t)
//            {
//                $res .= "<option value='$t->id'>".$t->text."</option>";
//            }
//            return $res;
//        }
//        
//        public function getSelectedOption($id)
//        {
//           $criteria=new CDbCriteria;
//	    $criteria->condition = 'nodeTags.node_id=:node';
//	    $criteria->params = array(':node'=>$id);
//	    $criteria->with = array('nodeTags'=>array('together'=>true));
//	   
//            $tags = Tag::model()->findAll($criteria);
//            return $tags;
//
//        }
        
        public static function checkTag($tag, $nodeId)
        {
            if (NodeTag::model()->find('tag_id=:tag AND node_id=:node',
                                    array ('node'=>$nodeId, 'tag'=>$tag->id)))
            return true;
            else 
                return false;
        }
}