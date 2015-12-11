<?php

class TransactionsController extends ActivationRequiredController
{
	public $leftmenu = 'transactions';
	public function actionIndex()
	{
		
		if (Yii::app()->user->isGuest)
			 $this->render('index');
		else
		{
		$user = Yii::app()->user->data();
		$criteria=new CDbCriteria();
		$criteria->condition = 'id_user = :id';
		$criteria->order = 'update_time DESC, create_time DESC';
		$criteria->params = array (
			':id' => $user->id
			);

		$count=Transaction::model()->count($criteria);
		$pages = new CPagination ( $count );
                $pages->setPageSize ( Yii::app ()->params ['defaultListPerPage'] );
		$pages->applyLimit ( $criteria ); // the trick is here!
		$transactions = Transaction::model()->findAll($criteria);
		$this->render('transactions', array(
			'transactions' => $transactions,
			'pages' => $pages ));
		}
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
