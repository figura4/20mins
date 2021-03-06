<?php

/**
 * This is the model class for table "tbl_author".
 *
 * The followings are the available columns in table 'tbl_author':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $bio
 * @property string $bio_url
 * @property string $picture
 * @property string $created_on
 * @property string $updated_on
 */
class Author extends CActiveRecord
{
	public $uploadedPicture;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Author the static model class
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
		return '{{author}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name', 'required'),
			array('first_name, last_name', 'length', 'max'=>50),
			array('bio_url', 'length', 'max'=>200),
			array('picture', 'length', 'max'=>255),
			array('bio', 'safe'),
			array('uploadedPicture', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true, 'safe'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, bio, created_on, updated_on', 'safe', 'on'=>'search'),
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
				'reviews'=>array(self::HAS_MANY, 'Content', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'bio' => 'Bio',
			'bio_url' => 'Bio Url',
			'uploadedPicture' => 'Picture',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('bio',$this->bio,true);
		$criteria->compare('bio_url',$this->bio_url,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getFullName($forOrdering =  true)
	{
		if ($forOrdering)
			return ucfirst($this->last_name) . ", " . ucfirst($this->first_name);
		
		return ucfirst($this->first_name) . " " . ucfirst($this->last_name); 
	}
	
	/**
	 *  @TODO: remove '/20mins on production'
	 */
	public function getPictureUrl()
	{
		return '/20mins' . Yii::app()->params['authorPicsPath'] . (is_null($this->picture) ? 'default.png' : $this->picture);
	}
	
	public function beforeSave(){
		if ($this->isNewRecord)
			$this->created_on = new CDbExpression('NOW()');
		else
			$this->updated_on = new CDbExpression('NOW()');
	
		if (is_object($this->uploadedPicture) && get_class($this->uploadedPicture)==='CUploadedFile') 
			$this->picture = $this->uploadedPicture->getName();
		
		return parent::beforeSave();
	}
	
	public function afterSave() {
		if (is_object($this->uploadedPicture) && get_class($this->uploadedPicture))
			$this->uploadedPicture->saveAs(Yii::getPathOfAlias('webroot').Yii::app()->params['authorPicsPath'].$this->uploadedPicture);
		
		return parent::afterSave();
	}
}