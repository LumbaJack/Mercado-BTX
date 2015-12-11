<?php
class SupportController extends BackendController {
	public function actionIndex() {
		if (Yii::app ()->user->isGuest) {
			$this->redirect ( '/' );
		}

		$criteria = new CDbCriteria ();
		$criteria->order = 'update_time DESC';
		
		$item_count = SupportTicket::model ()->count ( $criteria );
		
		$pages = new CPagination ( $item_count );
		$pages->setPageSize ( Yii::app ()->params ['defaultListPerPage'] );
		$pages->applyLimit ( $criteria ); // the trick is here!
		
		$this->render ( 'index', array (
				'model' => SupportTicket::model ()->findAll ( $criteria ),
				'item_count' => $item_count,
				'page_size' => Yii::app ()->params ['defaultListPerPage'],
				'items_count' => $item_count,
				'pages' => $pages 
		) );
	}
	
	public function actionTicket() {
		if (Yii::app ()->user->isGuest) {
			$this->redirect ( '/' );
		}
		
		$request = Yii::app ()->request;
		$ticketid = $request->getParam ( 'id' );
		if (! $ticketid) {
			$this->redirect ( '/' );
		}
		$user = Yii::app ()->user->data ();
		$model = new UpdateTicketForm ();
		$formData = $request->getPost ( get_class ( $model ), false );
		if ($formData) {
			$model->attributes = $formData;
			if (! $model->hasErrors ()) {
				$newticket_message = new SupportTicketMessage ();
				$newticket_message->body = $model->body;
				if (! Yii::app ()->user->isGuest) {
					$newticket_message->id_ticket = $ticketid;
					$newticket_message->id_user = $user->id;
				}
				if (! $newticket_message->save ()) {
					Yii::app ()->user->setFlash ( 'error', Yii::t ( 'translation', 'Unable to create ticket' ) );
				}
				Yii::app ()->user->setFlash ( 'success', Yii::t ( 'translation', 'Ticket #{ticket_id} Updated', array (
				'{ticket_id}' => $ticketid
				) ) );
			}
		}
		
		$messages = SupportTicketMessage::model ()->findAllByAttributes ( array (
				'id_ticket' => $ticketid 
		) );
		$this->render ( 'ticket', array (
				'model' => SupportTicket::model ()->findByPk ( $ticketid ),
				'updatemodel' => $model,
				'user' => $user,
				'messages' => $messages 
		) );
	}
	
	// Uncomment the following methods and override them if needed
	/*
	 * public function filters() { // return the filter configuration for this controller, e.g.: return array( 'inlineFilterName', array( 'class'=>'path.to.FilterClass', 'propertyName'=>'propertyValue', ), ); } public function actions() { // return external action classes, e.g.: return array( 'action1'=>'path.to.ActionClass', 'action2'=>array( 'class'=>'path.to.AnotherActionClass', 'propertyName'=>'propertyValue', ), ); }
	 */
}