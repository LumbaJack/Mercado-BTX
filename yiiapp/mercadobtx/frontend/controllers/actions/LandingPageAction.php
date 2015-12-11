<?php
/**
 * Most basic landing page rendering action possible.
 *
 * @package YiiBoilerplate\Frontend\Actions
 */
class LandingPageAction extends CAction {
	/**
	 * What to do when this action will be called.
	 *
	 * Just render the `index` view file from current controller.
	 */
	public function run() {
		if (Yii::app ()->user->isGuest) {
			$this->controller->layout = '//layouts/landing';
			$this->controller->render ( 'landing' );
		} else {
			$this->controller->layout = '//layouts/main';
			$user = Yii::app()->user->data ();
			$balance = Balance::model ()->findAllByAttributes(array('id_user' => $user->id));
			$transactions = Transaction::model ()->findAllByAttributes(array('id_user' => $user->id), new CDbCriteria(array('order' => 'create_time DESC',  'limit'=>10)));
			
			$this->controller->render ( 'home', array (
					'transactions' => $transactions,
					'balance' => $balance 
			) );
		}
	}
} 
