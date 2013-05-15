<?php

/**
 * This is the model class for table "tbl_quote".
 *
 * The followings are the available columns in table 'tbl_quote':
 * @property integer $id
 * @property string $body
 * @property string $source
 * @property integer $content_id
 * @property integer $random
 * @property string $created_on
 * @property string $updated_on
 */
class Quote extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Quote the static model class
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
		return '{{quote}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('body, content_id, random, created_on, updated_on', 'required'),
			array('content_id, random', 'numerical', 'integerOnly'=>true),
			array('source', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, body, source, content_id, random, created_on, updated_on', 'safe', 'on'=>'search'),
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
			'content'=>array(self::BELONGS_TO, 'Conent', 'content_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'body' => 'Body',
			'source' => 'Source',
			'content_id' => 'Content',
			'random' => 'Random',
			'created_on' => 'Created On',
			'updated_on' => 'Updated On',
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
		$criteria->compare('body',$this->body,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('content_id',$this->content_id);
		$criteria->compare('random',$this->random);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}