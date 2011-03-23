<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
?><h2><?php echo UserModule::t('Your profile'); ?></h2>
<?php echo $this->renderPartial('menu'); ?>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('帳戶名稱')); ?>
</th>
    <td><?php echo CHtml::encode($model->username); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
</th>
    <td><?php echo CHtml::encode($model->email);?>
</td>
</tr>
<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
				if(!$profile->getAttribute("owner") && $field->required!=4){//如果不是商家 而且欄位不等於4才能印
			?>
<tr>
	<th class="label"><?php echo CHtml::encode(UserModule::t($field->title));?>
</th>
    <td><?php if($field->widgetView($profile)){
                  echo $field->widgetView($profile);
              }else{
                  $return_str;
                  if($field->range){
                      $return_str = Profile::range($field->range,$profile->getAttribute($field->varname));
                  }else{
                      $return_str = $profile->getAttribute($field->varname);
                  }
                  echo CHtml::encode($return_str);
              }
	//(($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname))));
	
	 ?>
</td>
</tr>
			<?php
				}elseif($profile->getAttribute("owner")){//如果是商家 都印出來
			?>
<tr>
	<th class="label"><?php echo CHtml::encode(UserModule::t($field->title));?>
</th>
    <td><?php if($field->widgetView($profile)){
                  echo $field->widgetView($profile);
              }else{
                  $return_str;
                  if($field->range){
                      $return_str = Profile::range($field->range,$profile->getAttribute($field->varname));
                  }else{
                      $return_str = $profile->getAttribute($field->varname);
                  }
                  echo CHtml::encode($return_str);
              } 
			  ?>
</td>
</tr>
			<?php		
				}
			}
		}
?>

<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('註冊時間')); ?>
</th>
    <td><?php echo date("d.m.Y H:i:s",$model->createtime); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('最後一次訪問')); ?>
</th>
    <td><?php echo date("d.m.Y H:i:s",$model->lastvisit); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('狀態')); ?>
</th>
    <td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status));
    ?>
</td>
</tr>
</table>
