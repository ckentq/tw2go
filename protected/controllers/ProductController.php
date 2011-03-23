<?php

class ProductController extends Controller
{
	public $defaultAction = 'admin';
	private $_model;
	
	public function actionIndex()
	{
		$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'accessControl',
			/*'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
			*/
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','fetch','share','search'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','star'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionAdmin()
	{
		$model = $this->loadUser();
		
		//$model = $user->with('owner')->findAll();
		//$this->render('admin');
		$this->render('admin',array(
	    	'model'=>$model,
			'profile'=>$model->product,
	    ));
	}
	public function actionView()
	{
		$model = new Product;
		//$this->render('admin');
		$this->render('view',array(
			'model'=>$model,
		));
	}
	
	public function actionCreate()
	{
		$model = new Product;
		//$this->render('admin');
		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	
	public function loadUser()
	{
		if($this->_model===null)
		{
			if(Yii::app()->user->id)
				$this->_model=Yii::app()->controller->module->user();
			if($this->_model===null)
				$this->redirect(Yii::app()->controller->module->loginUrl);
		}
		return $this->_model;
	}
}