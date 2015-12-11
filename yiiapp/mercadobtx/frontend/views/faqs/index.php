<?php
/* @var $this FaqsController */

$this->breadcrumbs=array(
	'Faqs',
);
?>

<Section class="page-top">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <ul class="breadcrumb">
                                        <li><a href="<?php echo Yii::app()->baseUrl . '/'?>"><span id="containerId"><?php echo Yii::t('translation', 'inicio');?></span></a></li>
                                        <li class="active" id="titleId"><?php echo Yii::t('translation', 'faqs_top_title_lower');?></li>
                                </ul>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-10" id="rowId">
                                <?php echo Yii::t('translation', 'faqs_top_title');?>
		</div>
                <div class="col-md-2">
			<a href="<?php echo Yii::app()->baseUrl . '/'. Yii::t('urls','registro'); ?>" class="btn btn-lg btn-primary"><?php echo Yii::t('translation', 'buy_now_sr'); ?></a>
	        </div>
        </div>
</section>
<div class="container">

	<div class="row ">

	<div class="bs-docs-section">
	  <h4><?php echo Yii::t('translation', 'faq_question_1'); ?></h4>
	  <ul>
	    <li><?php echo Yii::t('translation', 'faq_question_1_answer'); ?></li>
	  </ul>
	  <h4><?php echo Yii::t('translation', 'faq_question_2'); ?></h4>
	  <ul>
	    <li><?php echo Yii::t('translation', 'faq_question_2_answer'); ?></li>
	  </ul>
	  <h4><?php echo Yii::t('translation', 'faq_question_3'); ?></h4>
	  <ul>
	    <li><?php echo Yii::t('translation', 'faq_question_3_answer'); ?></li>
	  </ul>
	  <h4><?php echo Yii::t('translation', 'faq_question_4'); ?></h4>
	  <ul>
	    <li><?php echo Yii::t('translation', 'faq_question_4_answer'); ?></li>
	  </ul>
	</div>
	</div>
</div>
