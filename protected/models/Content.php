<?php

/**
 * This is the model class for table "tbl_content".
 *
 * The followings are the available columns in table 'tbl_content':
 * @property integer $id
 * @property string $page_title
 * @property integer $user_id
 * @property integer $published
 * @property string $type
 * @property string $body
 * @property string $picture1
 * @property string $picture2
 * @property string $picture3
 * @property string $pub_date
 * @property string $created_on
 * @property string $updated_on
 */
class Content extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Content the static model class
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
		return '{{content}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_title, user_id, published, type, body, pub_date, created_on, updated_on', 'required'),
			array('user_id, published, vote', 'numerical', 'integerOnly'=>true),
			array('picture1, picture2, picture3', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, page_title, user_id, published, type, body, pub_date, created_on, updated_on', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comment', 'content_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'tags' => array(self::MANY_MANY, 'Tag',
							'tbl_content_tag(content_id, tag_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'page_title' => 'Page Title',
			'user_id' => 'User',
			'published' => 'Published',
			'type' => 'Type',
			'body' => 'Body',
			'picture1' => 'Picture1',
			'picture2' => 'Picture2',
			'picture3' => 'Picture3',
			'pub_date' => 'Pub Date',
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
		$criteria->compare('page_title',$this->page_title,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('published',$this->published);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('pub_date',$this->pub_date,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * We're overriding this method to fill findAll() and similar method result
	 * with proper models.
	 *
	 * @param array $attributes
	 * @return Content
	 */
	protected function instantiate($attributes){
		switch($attributes['type']){
			case 'content':
				$class='Content';
				break;
			default:
				$class='Review';
		}
		$model=new $class(null);
		return $model;
	}
	
	function defaultScope(){
		return array(
				'condition'=>"type='content'",
		);
	}
}