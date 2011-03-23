<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("會員註冊");
$this->breadcrumbs=array(
	UserModule::t("會員註冊"),
);
?>

<h1><?php echo UserModule::t("會員註冊"); ?></h1>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

	<p class="note"><?php echo UserModule::t('<span class="required">*</span>為必填欄位'); ?></p>
	
	<?php echo CHtml::errorSummary($form); ?>
	<?php echo CHtml::errorSummary($profile); ?>
	
	<div class="row">
	<?php echo CHtml::activeLabelEx($form,'會員帳號'); ?>
	<?php echo CHtml::activeTextField($form,'username'); ?>
	</div>
	
	<div class="row">
	<?php echo CHtml::activeLabelEx($form,'會員密碼'); ?>
	<?php echo CHtml::activePasswordField($form,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("最少四位數字或字母"); ?>
	</p>
	</div>
	
	<div class="row">
	<?php echo CHtml::activeLabelEx($form,'再次輸入密碼'); ?>
	<?php echo CHtml::activePasswordField($form,'verifyPassword'); ?>
	</div>
	
	<div class="row">
	<?php echo CHtml::activeLabelEx($form,'email'); ?>
	<?php echo CHtml::activeTextField($form,'email'); ?>
	</div>
	
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
		<?php echo CHtml::activeLabelEx($profile,$field->varname); ?>
		<?php 
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo CHtml::activeDropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo CHtml::activeTextField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo CHtml::error($profile,$field->varname); ?>
	</div>	
			<?php
			}
		}
?>
	<?php if (UserModule::doCaptcha('registration')): ?>
	<div class="row">
		<?php echo CHtml::activeLabelEx($form,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo CHtml::activeTextField($form,'verifyCode'); ?>
		</div>
		<p class="hint"><?php echo UserModule::t("請輸入上方圖片顯示的文字"); ?>
		<br/><?php echo UserModule::t("不區分大小寫"); ?></p>
	</div>
	<?php endif; ?>
	
	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("註冊")); ?>
	</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php endif; ?>