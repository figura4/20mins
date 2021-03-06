<?php

class ContentController extends Controller
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
				'actions'=>array('index','view', 'list'),
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
	public function actionView($id, $title)
	{
		$this->layout='//layouts/subtract/column2';
		$model=$this->loadModel($id);
    	$comment=$this->newComment($model);
	
    	if ($title != $model->urlifyTitle())
    		throw new CHttpException(404,'Pagina non trovata. L\'indirizzo non � corretto');
    		//$this->redirect(Yii::app()->createUrl('content/view', array('id'=>$id, 'title'=>$model->urlifyTitle())));
    	
		$this->render('view',array(
			'model'=>$model,
			'comment'=>$comment,
		));
	}
	
	/**
	 * Get a list of contents accordig to parameters.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param string $order the order to display the reviews
	 * @param string $tagId the id of the given tag
	 */
	public function actionList($tagId=null, $tag=null, $order='pub_date DESC')
	{
		$this->layout='//layouts/subtract/column2';
		
		// Setting page title
		if (is_numeric($tagId)) {
			$tagModel=Tag::model()->findByPk($tagId);
			if (is_null($tagModel) || $tag != $tagModel->urlifyTagName())
				throw new CHttpException(404,'Pagina non trovata. L\'indirizzo non � corretto');
			$this->title='Post nella categoria '.Tag::model()->findByPk($tagId)->name;
		} else
			$this->title='Blog';
		
		// Setting search condition
		$condition = 'type=\'content\' and published=1 and pub_date<=NOW()';
		if (is_numeric($tagId))
			$condition.=' and tag_id='.$tagId;
		
		$criteria=new CDbCriteria();
		$criteria->with=array('categories');
		$criteria->condition=$condition;
		$criteria->together=true;
		$criteria->order = $order;
		$count=Content::model()->count($criteria);
		$pages=new CPagination($count);
		
		// results per page
		$pages->setPageSize(Yii::app()->params['pageSize']);
		$pages->applyLimit($criteria);
		$contents=Content::model()->findAll($criteria);
		
		$this->render('list',array(
			'contents'=>$contents,
			'pages'=>$pages,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Content;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Content']))
		{
			$model->attributes=$_POST['Content'];
			$model->uploadedCover = CUploadedFile::getInstance($model, 'uploadedCover');
			if($model->save())
				$this->redirect(array('admin','id'=>$model->id));
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

		if(isset($_POST['Content']))
		{
			$model->attributes=$_POST['Content'];
			$model->uploadedCover = CUploadedFile::getInstance($model, 'uploadedCover');
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Updates tags for a content.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the content to be tagged
	 */
	public function actionTag($id)
	{
		$model=$this->loadModel($id);
	
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);
	
		if(isset($_POST['Content']))
		{
			$model->categories = (array_key_exists('categories', $_POST['Content'])) ? $_POST['Content']['categories'] : array();
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
		$dataProvider=new CActiveDataProvider('Content');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Content('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Content']))
			$model->attributes=$_GET['Content'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Content the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Content::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Content $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='content-form')
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
