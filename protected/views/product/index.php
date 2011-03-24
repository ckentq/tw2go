<?php
$this->breadcrumbs=array(
	'Product',
);

$this->menu=array(
	array('label'=>'管理產品', 'url'=>array('admin')),
	array('label'=>'新增產品', 'url'=>array('create')),
);
$this->widget('zii.widgets.CMenu',array(
			'items'=>$this->menu
		));
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
