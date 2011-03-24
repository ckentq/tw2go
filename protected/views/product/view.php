<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'產品清單', 'url'=>array('index')),
	array('label'=>'新增產品', 'url'=>array('create')),
	array('label'=>'更新產品', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'刪除產品', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);

$this->widget('zii.widgets.CMenu',array(
			'items'=>$this->menu
		));
?>

<h1>View Product #<?php echo $model->id; ?></h1>
<?php
        echo $model->name;
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'category',
		'cover',
		'active',
	),
)); ?>
