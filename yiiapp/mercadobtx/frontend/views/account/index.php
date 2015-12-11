<?php
/*
 * @var $this AccountController @var $model AccountForm
 */
$this->breadcrumbs = array (
		'Account' 
);
?>

<div class="row">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#"><?php echo Yii::t('translation', 'account_top_tab_1'); ?></a></li>
		<li><a href="/<?php echo Yii::t('translation', 'wallets'); ?>"><?php echo Yii::t('translation', 'account_top_tab_2'); ?></a></li>
		<li><a href="/<?php echo Yii::t('translation', 'security'); ?>"><?php echo Yii::t('translation', 'account_top_tab_3'); ?></a></li>
	</ul>
</div>
<br>
<br>
<h4 class="" style="text-transform: uppercase; font-size: 1.8em;"><?php echo Yii::t('translation', 'account_lower_title'); ?></h4>
<?php

$form = $this->beginWidget ( 'yiistrap.widgets.TbActiveForm', array () );

?>

<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-4">
		<div class="row">
			<div class="span4">

				<?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'form-control', 'size' => '30')); ?>
				
				<?php echo $form->textFieldControlGroup($model, 'line1', array('class' => 'form-control')); ?>

				<?php echo $form->textFieldControlGroup($model, 'line2', array('class' => 'form-control')); ?>
				
				<?php echo $form->textFieldControlGroup($model, 'email', array('class' => 'form-control', 'size' => '255', 'readonly' => 'readonly')); ?>

				<?php
				$fiat_opts = array (
						'' => array (
								'style' => 'display: none' 
						) 
				);
				if ($model->fiatcode) {
					$fiat_opts [$model->fiatcode] = array (
							'selected' => true 
					);
				}
				
				echo $form->dropDownListControlGroup ( $model, 'fiatcode', array_merge ( array (
						'' => Yii::t('translation', 'select_currency') 
				), MbtxData::fiat_currencies () ), array (
						'class' => 'form-control',
						'multiple' => false,
						'options' => $fiat_opts 
				) );
				?>

				

			</div>
		</div>
		<div class="" style="padding-top: 20px; margin-left: -10px;">
              <?php
														
														$this->widget ( 'bootstrap.widgets.TbButton', array (
																'buttonType' => 'submit',
																'type' => 'primary',
																'label' => Yii::t ( 'translation', 'account_save_button' ),
																'icon' => 'ok' 
														) );
														?>
            </div>
	</div>


	<div class="col-md-4">
		<?php
		$country_opts = array (
				'' => array (
						'style' => 'display: none' 
				) 
		);
		if ($model->countrycode) {
			$country_opts [$model->countrycode] = array (
					'selected' => true 
			);
		}
		
		echo $form->dropDownListControlGroup ( $model, 'countrycode', array_merge ( array (
				'' => Yii::t('translation', 'select_country') 
		), MbtxData::countries () ), array (
				'class' => 'form-control',
				'multiple' => false,
				'options' => $country_opts 
		) );
		?>
				
		<?php echo $form->textFieldControlGroup($model, 'city', array('class' => 'form-control', 'size' => '30')); ?>

		<?php echo $form->textFieldControlGroup($model, 'postcode', array('class' => 'form-control', 'size' => '6', 'maxlength' => '5')); ?>
			
		<?php
		$tz_opts = array (
				'' => array (
						'style' => 'display: none' 
				) 
		);
		if ($model->timezone) {
			$tz_opts [$model->timezone] = array (
					'selected' => true 
			);
		}
		
		echo $form->dropDownListControlGroup ( $model, 'timezone', array_merge ( array (
				'' => Yii::t('translation', 'select_timezone') 
		), MbtxData::timezones () ), array (
				'class' => 'form-control',
				'multiple' => false,
				'options' => $tz_opts 
		) );
		?>

		<?php echo $form->checkBoxControlGroup($model, 'company', array('class' => '')); ?>
		
		</div>
</div>
</div>

<?php $this->endWidget(); ?>
</div>
</div>
</div>

