<?php
/**
 * Model class for address form at
 *
 * This form is almost default implementation of the login from the Yii tutorials.
 * Captcha was added and the code to limit max number of failed login attempts.
 *
 * @package YiiBoilerplate\Frontend
 */
class AccountForm extends CFormModel
{
	/**
	 * User's name
	 *
	 * @var string
	 */
	public $name;

	/**
	 * User's email
	 *
	 * @var string
	 */
	public $email;
	
	/**
	 * Address Line1
	 *
	 * @var string
	 */
	public $line1;

	/**
	 * Address Line2
	 *
	 * @var string
	 */
	public $line2;

	/**
	 * City
	 *
	 * @var string
	 */
	public $city;
	
	/**
	 * Region
	 *
	 * @var string
	 */
	public $region;
	
	/**
	 * Postal code
	 *
	 * @var string
	 */
	public $postcode;

	/**
	 * Country code
	 *
	 * @var string
	 */
	public $countrycode;

	/**
	 * Timezone
	 *
	 * @var string
	 */
	public $timezone;
	
	/**
	 * Fiatcode -- prefered Fiat currency
	 * @var unknown
	 */

	public $fiatcode;

	/**
	 * company -- is this a company account
	 * @var unknown
	 */
	public $company;
      /**
     * Validation rules
     *
     * @see CModel::rules()
     *
     * @return array
     */
    public function rules()
    {
    	$rules = parent::rules();
    	$rules[] = array('email', 'email');
    	$rules[] = array('email', 'unique');
		return $rules;
    }
    
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		$address = new Address();
		return array_merge(
			$address->attributeLabels(),
			array(
				'name' => Yii::t('translation', 'Nombre(s) y Apellidos'),
				'email' => Yii::t('translation', 'Email'),
				'company' => Yii::t('translation', 'Company')
			)
		); 
	}
}
