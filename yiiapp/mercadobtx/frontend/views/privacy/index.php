<?php
/* @var $this FaqsController */

$this->breadcrumbs=array(
	'Privacy',
);
?>

<Section class="page-top">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <ul class="breadcrumb">
                                        <li><a href="<?php echo Yii::app()->baseUrl . '/'?>"><span id="containerId"><?php echo Yii::t('translation', 'inicio');?></span></a></li>
                                        <li class="active" id="titleId"><?php echo Yii::t('translation', 'privacy_top_normal');?></li>
                                </ul>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-10" id="rowId">
                                <?php echo Yii::t('translation', 'privacy_top_banner');?>
		</div>
        </div>
</section>
<div class="container">

	<div class="row ">

	<div class="bs-docs-section">
		<center><h1><?php echo Yii::t('translation', 'privacy_top_title'); ?></h1></center>
	<div class="content-wrap">
	<p style="text-align: justify;">
	        <?php echo Yii::t('translation', 'privacy_section_1'); ?>
		<br />
	        <br />
	        <strong><?php echo Yii::t('translation', 'privacy_section_2_title'); ?></strong>
	        <br />
		<br />
		<?php echo Yii::t('translation', 'privacy_section_2'); ?>
		<br />
	        <br />
	        <strong><?php echo Yii::t('translation', 'privacy_section_3_title'); ?></strong>
	        <br />
		<br />
		<?php echo Yii::t('translation', 'privacy_section_3'); ?>
		<br />
	        <br />
	        <strong><?php echo Yii::t('translation', 'privacy_section_4_title'); ?></strong>
	        <br />
		<br />
		<?php echo Yii::t('translation', 'privacy_section_4'); ?>
		<br />
	        <br />
	        <strong><?php echo Yii::t('translation', 'privacy_section_5_title'); ?></strong>
	        <br />
		<br />
		<?php echo Yii::t('translation', 'privacy_section_5'); ?>
		<br />
	        <br />
	        <strong><?php echo Yii::t('translation', 'privacy_section_6_title'); ?></strong>
	        <br />
		<br />
		<?php echo Yii::t('translation', 'privacy_section_6'); ?>
		<br />
	        <br />
	        <strong><?php echo Yii::t('translation', 'privacy_section_7_title'); ?></strong>
	        <br />
		<br />
		<?php echo Yii::t('translation', 'privacy_section_7'); ?>
		<br />
	        <br />
		<?php echo Yii::t('translation', 'privacy_revision_section'); ?>
		<br />
	</p>
	</div>
	</div>
</div>
