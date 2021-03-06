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
	public $uploadedCover;
	
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
			array('page_title, published, type, body, pub_date', 'required'),
			array('user_id, published, vote', 'numerical', 'integerOnly'=>true),
			array('picture1, picture2, picture3', 'length', 'max'=>100),
			array('uploadedCover', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true, 'safe'=>true),
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
			'categories' => array(self::MANY_MANY, 'Tag',
							'tbl_tag_content(content_id, tag_id)'),
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
			'cover' => 'Cover',
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
		$criteria->compare('cover',$this->cover,true);
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
	protected function instantiate($attributes)
	{
		switch($attributes['type']){
			case 'content':
				$class = get_class($this);;
				break;
			default:
				$class = 'Review';
		}
		$model = new $class(null);
		return $model;
	}
	
	/* removed to allow reviews on home page
	function defaultScope(){
		return array(
			'condition'=>"type='content'",
		);
	}
	*/
	
	public function scopes()
	{
		return array(
			'sitemap'=>array('condition'=>'pub_date <= NOW()', 'order'=>'created_on DESC'),
		);
	}
	
	public function addComment($comment)
	{
		$comment->content_id=$this->id;
		return $comment->save();
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave()) {
			if ($this->isNewRecord)
				$this->created_on = new CDbExpression('NOW()');
			else
				$this->updated_on = new CDbExpression('NOW()');
			
			$this->user_id = 1;
		
			if (is_object($this->uploadedCover) && get_class($this->uploadedCover)==='CUploadedFile')
				$this->cover = $this->uploadedCover->getName();
		
			return true;
		}
		
		return false;
	}
	
	public function behaviors()
	{
		return array( 'CAdvancedArBehavior' => array(
				'class' => 'application.extensions.CAdvancedArBehavior'));
	}
	
	public function urlifyTitle() 
	{
    	$result = $this->page_title;
    	$result = strtolower($result);
    	$result = preg_replace('/[^\w\d_ ]/si', '', $result);
    	$result = preg_replace('/\s+/', '-', $result);
    	return $result;
    }
    
    public function getUrlifiedTitle()
    {
    	return $this->urlifyTitle();
    }
        
    public function getUrl($absolute=false) {
    	if ($absolute) {
    		if ($this->type == 'content')
    			return Yii::app()->createAbsoluteUrl('content/view', array('id' => $this->id, 'title'=>$this->urlifyTitle()));
    		else
    			return Yii::app()->createAbsoluteUrl('review/view', array('id' => $this->id, 'title'=>$this->urlifyTitle()));
    	} else {
	    	if ($this->type == 'content')
	    		return Yii::app()->createUrl('content/view', array('id' => $this->id, 'title'=>$this->urlifyTitle()));
	    	else
	    		return Yii::app()->createUrl('review/view', array('id' => $this->id, 'title'=>$this->urlifyTitle()));
    	}
    }
    
    /**
     *  @TODO: remove '/20mins on production'
     */
    public function getCoverUrl()
    {
    	return '/20mins' . Yii::app()->params['coversPath'] . (is_null($this->cover) ? 'default.jpg' : $this->cover);
    }
    
    public function getTeaser($chars, $trailing = '[...]') 
    {
    	$text = $this->body;
    	if (strlen($this->body) > $chars) {
    		$text = strip_tags($this->body);
    		$text = substr($text, 0, $chars);
    		$text = substr($text, 0, strrpos($text," "));
    		$text = str_replace('<p>', '', $text);
    		$text = str_replace('</p>', '', $text);
    		$text = '<p>' . $text . ' ' . $trailing . '</p>';
    	}
    	return $text;
    }
    
    public function getCategory()
    {
    	return 'Blog';
    }
}