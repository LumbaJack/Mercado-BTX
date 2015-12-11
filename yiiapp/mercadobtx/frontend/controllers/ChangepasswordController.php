<?php
class Changepasswordcontroller extends LoginRequiredController {
	public $leftmenu = 'account';
	public function actionIndex() {
		$user = Yii::app ()->user->data ();
		$model = new ChangePasswordForm ();
		
		$request = Yii::app ()->request;
		$formData = $request->getPost ( get_class ( $model ), false );
		if ($formData)
		{
			$model->attributes = $formData;
			if ($model->validate(array('password', 'newPassword', 'passwordConfirm'))){

				//Yii::app()->user->setFlash('danger', '<strong>Error!</strong> Ingresa los datos de accesso correctamente.');
				$user->password = $model->newPassword;
				
				if (! $user->save ()) {
					Yii::log ( $this->dump_to_string ( $newdetail->errors ), 'error' );
					Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Save failed' ));
				}
				else {
					Yii::app ()->user->setFlash ( 'success', Yii::t ( 'translation', 'Password Changed' ));
				}
			}
		}
		
		$this->render ( 'index', array (
				'user' => $user,
				'model' => $model 
		) );
	}
	
	// Uncomment the following methods and override them if needed
	/*
	 * public function filters() { // return the filter configuration for this controller, e.g.: return array( 'inlineFilterName', array( 'class'=>'path.to.FilterClass', 'propertyName'=>'propertyValue', ), ); } public function actions() { // return external action classes, e.g.: return array( 'action1'=>'path.to.ActionClass', 'action2'=>array( 'class'=>'path.to.AnotherActionClass', 'propertyName'=>'propertyValue', ), ); }
	 */
}
