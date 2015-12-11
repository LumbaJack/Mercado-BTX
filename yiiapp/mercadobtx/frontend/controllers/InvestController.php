<?php

class InvestController extends FrontendController
{
	public $mainmenu = 'invest';
	public function actionIndex()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->layout = '//layouts/landing';
			$this->render('index');
		}
		else
			$this->render('index-activated');
			
			
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
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
	*/
}
