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
		return 'tbl_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_title, user_id, published, type, body, author_id, pub_date, created_on, updated_on', 'required'),
			array('user_id, published, vote, author_id', 'numerical', 'integerOnly'=>true),
			array('page_title, italian_title, italian_subtitle, original_title, original_subtitle, seasons', 'length', 'max'=>200),
			array('type, editor', 'length', 'max'=>50),
			array('cover, picture1, picture2, picture3', 'length', 'max'=>100),
			array('year', 'length', 'max'=>4),
			array('nation', 'length', 'max'=>30),
			array('pages', 'length', 'max'=>5),
			array('language', 'length', 'max'=>20),
			array('actors', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, page_title, user_id, published, type, body, cover, picture1, picture2, picture3, italian_title, italian_subtitle, original_title, original_subtitle, year, vote, author_id, actors, nation, pages, editor, language, seasons, pub_date, created_on, updated_on', 'safe', 'on'=>'search'),
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
		$criteria->compare('picture1',$this->picture1,true);
		$criteria->compare('picture2',$this->picture2,true);
		$criteria->compare('picture3',$this->picture3,true);
		$criteria->compare('italian_title',$this->italian_title,true);
		$criteria->compare('italian_subtitle',$this->italian_subtitle,true);
		$criteria->compare('original_title',$this->original_title,true);
		$criteria->compare('original_subtitle',$this->original_subtitle,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('vote',$this->vote);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('actors',$this->actors,true);
		$criteria->compare('nation',$this->nation,true);
		$criteria->compare('pages',$this->pages,true);
		$criteria->compare('editor',$this->editor,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('seasons',$this->seasons,true);
		$criteria->compare('pub_date',$this->pub_date,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}