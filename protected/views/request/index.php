<?php
$this->breadcrumbs=array(
	'Requests',
);

$this->menu=array(
	array('label'=>'Create Request', 'url'=>array('create')),
	array('label'=>'Manage Request', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
