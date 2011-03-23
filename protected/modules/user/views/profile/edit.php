<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile")=>array('profile'),
	UserModule::t("Edit"),
);
?><h2><?php echo UserModule::t('Edit profile'); ?></h2>
<?php echo $this->renderPartial('menu'); ?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<div class="form">

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo CHtml::errorSummary($model);
		  echo CHtml::errorSummary($profile); ?>
    <div class="row">
		<?php echo CHtml::activeLabelEx($model,'username'); ?>
		<?php echo CHtml::activeTextField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo CHtml::error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'email'); ?>
		<?php echo CHtml::activeTextField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo CHtml::error($model,'email'); ?>
	</div>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
//------------------------------------------------------------------如果不是商家 而且欄位不等於4才能印  基本欄位
				if(!$profile->getAttribute("owner") && $field->required!=4){
			?>
            
	<div class="row">
		<?php echo CHtml::activeLabelEx($profile,$field->varname);
		
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo CHtml::activeDropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo CHtml::activeTextField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		echo CHtml::error($profile,$field->varname); ?>
	</div>	
    
			<?php
			  }//end if
			}//end of foreach
//------------------------------------------------------------------如果是商家
            foreach($profileFields as $field) { 
				if($profile->getAttribute("owner") && $field->required!=4){//印 基本欄
			?>
            
	<div class="row">
		<?php echo CHtml::activeLabelEx($profile,$field->varname);
		
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo CHtml::activeDropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo CHtml::activeTextField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		echo CHtml::error($profile,$field->varname); ?>
	</div>	
    
			<?php
				}
			}//end of foreach
			if($profile->getAttribute("owner")){
			?>
    <div class="row">
        商家資料
    </div>        
            <?php }
//------------------------------------------------------------------如果是商家 印出商家欄位					
			 foreach($profileFields as $field) { 	
				if($profile->getAttribute("owner") && $field->required==4){
		?>			
	<div class="row">
		<?php echo CHtml::activeLabelEx($profile,$field->varname);
		
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo CHtml::activeDropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo CHtml::activeTextField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		echo CHtml::error($profile,$field->varname); ?>
	</div>							
		<?php			
				}
			}
		}
?>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->
