<?php

class ReviewController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'list', 'listTag'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','tag'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','tag'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->layout='//layouts/subtract/column2';
		$model=$this->loadModel($id);
    	$comment=$this->newComment($model);

		$this->render('view',array(
			'model'=>$model,
			'comment'=>$comment,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Review;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Review']))
		{
			$model->attributes=$_POST['Review'];
			$model->uploadedCover = CUploadedFile::getInstance($model, 'uploadedCover');
			$model->categories = (array_key_exists('categories', $_POST['Review'])) ? $_POST['Review']['categories'] : array();
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Review']))
		{
			$model->attributes=$_POST['Review'];
			$model->uploadedCover = CUploadedFile::getInstance($model, 'uploadedCover');
			$model->categories = (array_key_exists('categories', $_POST['Review'])) ? $_POST['Review']['categories'] : array();
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Get a list of review accordig to parameters.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param string $type the type of reviews to look for
	 * @param string $tag the tag of the reviews to look for
	 * @param string $vote the vote of the reviews to look for
	 * @param string $order the order to display the reviews
	 * @param int $author ID of the author associated to the reviews to display
	 * @param string $tagId the id of the given tag
	 */
	public function actionList($tagId=null, $type=null, $author=null, $vote=null, $order='vote DESC')
	{
		$this->layout='//layouts/subtract/column2';
		
		// Setting page title
		if (is_numeric($tagId))
			$title='Recensioni della categoria '.Tag::model()->findByPk($tagId)->name;
		elseif (in_array($type, array('book', 'tv', 'movie')))
			$title='Recensioni di '.getReviewType($type, true);
		elseif (is_numeric($author))
			$title='Recensioni dell\'autore '.Author::model()->findByPk($author)->getFullName(false);
		elseif (is_numeric($vote))
			$title='Recensioni votate '.getHtmlVote($vote);
		else
			$title='Elenco recensioni';
		
		// Setting search condition
		$condition = 'published=1 and pub_date<=NOW()';
		if (in_array($type, array('book', 'tv', 'movie')))
			$condition.=' and type=\'' . $type.'\'';
		if (is_numeric($author))
			$condition.=' and author_id='.$author;
		if (is_numeric($vote))
			$condition.=' and vote='.$vote;
		if (is_numeric($tagId))
			$condition.=' and tag_id='.$tagId;
		
		$dataProvider = new CActiveDataProvider('Review', array(
    		'criteria' => array(
        		'with' => array('categories'),
        		'condition' => $condition, 
    			'together' => true, 
    		),
    		'pagination' => array(
        		'pageSize' => 50,
    		),
		));
		
		$this->render('list',array(
			'dataProvider'=>$dataProvider,
			'title'=>$title,
		));
	}
	
	/**
	 * Updates tags for a review.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the content to be tagged
	 */
	public function actionTag($id)
	{
		$model=$this->loadModel($id);
	
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);
	
		if(isset($_POST['Review']))
		{
			$model->categories = (array_key_exists('categories', $_POST['Review'])) ? $_POST['Review']['categories'] : array();
			if($model->save())
				$this->redirect(array('admin'));
		}
	
		$this->render('tag',array(
				'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Review');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Review('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Review']))
			$model->attributes=$_GET['Review'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Review the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Review::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Review $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='review-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	protected function newComment($post)
	{
		$comment=new Comment;
	
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
	
		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($post->addComment($comment))
			{
				Yii::app()->user->setFlash('commentSubmitted','Il tuo commento &egrave; stato inviato correttamente. Grazie :-)');
				$this->refresh();
			}
		}
		return $comment;
	}
}
