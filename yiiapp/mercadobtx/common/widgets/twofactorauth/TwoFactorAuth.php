<?php
Yii::setPathOfAlias('TwoFactorAuth' , dirname(__FILE__));


class TwoFactorAuth extends CWidget {
	public $form;
	public $label;
	public $icon;
	public $deliveras;
	public $sms_input_id;
	public $name;

	public function init() {
		parent::init();
	}
	public function run() {
		$gamodel = new GoogleAuthForm ();
		$smsmodel = new SmsAuthForm();
		if ( !$this->name ) {
			$this->name = $this->id;
		}
		$this->render ( 'index', array (
				'form' => $this->form,
				'name' => $this->name,
				'gamodel' => $gamodel,
				'smsmodel' => $smsmodel,
				'deliveras' => $this->deliveras,
				'icon' => $this->icon,
				'label' => $this->label,
				'sms_input_id' => $this->sms_input_id
		) );
	}
}

?>