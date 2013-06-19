<?php

/**
 * This is the model class for table "{{content}}".
 *
 * The followings are the available columns in table '{{content}}':
 * @property integer $id
 * @property string $page_title
 * @property integer $user_id
 * @property integer $published
 * @property string $type
 * @property string $body
 * @property string $cover
 * @property string $picture1
 * @property string $picture2
 * @property string $picture3
 * @property string $italian_title
 * @property string $italian_subtitle
 * @property string $original_title
 * @property string $original_subtitle
 * @property string $year
 * @property integer $vote
 * @property integer $author_id
 * @property string $actors
 * @property string $nation
 * @property string $pages
 * @property string $editor
 * @property string $language
 * @property string $seasons
 * @property string $pub_date
 * @property string $created_on
 * @property string $updated_on
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property User $user
 * @property Author $author
 * @property Quote[] $quotes
 * @property TagContent[] $tagContents
 */
class Review extends Content
{
	//public $uploadedCover;
	
	static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		$fromParent = parent::rules();
		unset($fromParent[0]);
		
		$fromChild = array(
			array('published, type, body, pub_date, original_title, vote, author_id', 'required'),
			array('author_id', 'numerical', 'integerOnly'=>true),
			array('page_title, italian_title, italian_subtitle, original_title, original_subtitle, seasons', 'length', 'max'=>200),
			array('type, editor', 'length', 'max'=>50),
			array('cover, picture1, picture2, picture3', 'length', 'max'=>100),
			array('uploadedCover', 'file', 'types'=>'jpg, jpeg, gif, png', 'allowEmpty'=>true, 'safe'=>true),
			array('year', 'length', 'max'=>4),
			array('nation', 'length', 'max'=>30),
			array('pages', 'length', 'max'=>5),
			array('language', 'length', 'max'=>20),
			array('actors', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('italian_title, italian_subtitle, original_title, original_subtitle, year, vote, author_id, actors, nation, editor, language, seasons', 'safe', 'on'=>'search'),
		);
		
		return array_merge($fromParent, $fromChild);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		$fromParent = parent::relations();
		
		$fromChild = array(
			'author' => array(self::BELONGS_TO, 'Author', 'author_id'),
			'quote' => array(self::HAS_MANY, 'Quote', 'content_id'),
		);
		
		return array_merge($fromParent, $fromChild);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		$fromParent = parent::rules();
		
		$fromChild = array(
			'cover' => 'Cover (800x296)',
			'picture1' => 'Picture1',
			'picture2' => 'Picture2',
			'picture3' => 'Picture3',
			'italian_title' => 'Italian Title',
			'italian_subtitle' => 'Italian Subtitle',
			'original_title' => 'Original Title',
			'original_subtitle' => 'Original Subtitle',
			'year' => 'Year',
			'vote' => 'Vote',
			'author_id' => 'Author',
			'actors' => 'Actors',
			'nation' => 'Nation',
			'pages' => 'Pages',
			'editor' => 'Editor',
			'language' => 'Language',
			'seasons' => 'Seasons',
		);
		
		return array_merge($fromParent, $fromChild);
	}
	
	function defaultScope(){
		return array(
			'condition'=>"type='book' || type='tv' || type='movie'",
		);
	}
	
	public function getFull_title() 
	{
		return (empty($this->italian_title)) ? $this->original_title : $this->italian_title;
	}
	
	public function beforeSave(){
		if(parent::beforeSave()) {
			$this->page_title = $this->full_title;
			return true;
		}
		return false;
	}
	
	public function behaviors()
	{
		return parent::behaviors(); 
	}
	
	public function afterSave() {
		if (is_object($this->uploadedCover) && get_class($this->uploadedCover))
			$this->uploadedCover->saveAs(Yii::getPathOfAlias('webroot').Yii::app()->params['coversPath'].$this->uploadedCover);
	
		return parent::afterSave();
	}
	
	public function getCategory()
    {	
    	switch ($this->type) {
    		case 'tv':
    			$category = 'serie tv';
    			break;
    		
    		case 'book':
    			$category = 'libro';
    			break;
    			
    		case 'movie':
    			$category = 'film';
    			break;
    			
    		default:
    			$category = '';
    	}
    	return "Recensione $category";
    }
}