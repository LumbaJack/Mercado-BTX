<?php
/**
 *
 * @package YiiBoilerplate\Frontend
 */
class CreateInvoiceForm extends CFormModel {
	
	/**
	 * $subject -- Aumount
	 *
	 * @var $amount 
	 */
	public $amount;

	/**
	 * $id_bank -- Name of the bank
	 *
	 * @var $id_bank
	 */
	public $id_bank;
	
	/**
	 * Validation rules
	 *
	 * @see CModel::rules()
	 *
	 * @return array
	 */
	public function rules() {
		$rules = parent::rules();
		$rules[] = array('amount', 'in','range'=>range(0,10000));
		$rules[] = array('id_bank', 'safe');
		return $rules;
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
			'amount' => Yii::t ( 'translation', 'amount' ),
			'id_bank' => Yii::t ( 'translation', 'id_bank' ),
		);
	}
}
