<?php
Yii::setPathOfAlias('CurrencyInput' , dirname(__FILE__));


class CurrencyInput extends CWidget {
	public $form;
	public $model;
	public $attribute;
	public $htmlOptions;
	public $currency;
	public $supported_currencies;


	public function init() {
		parent::init();
	}
	public function run() {
		if ( ! $this->supported_currencies ) {
			$this->supported_currencies = array($this->currency);
		}
		
		$this->render ( 'index', array (
				'form' => $this->form,
				'model' => $this->model,
				'attribute' => $this->attribute,
				'htmlOptions' => $this->htmlOptions,
				'currency' => $this->currency,
				'supported_currencies' => $this->supported_currencies
		) );
	}
}

?>