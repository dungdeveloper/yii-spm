<?php
$this->breadcrumbs=array(
	'Reports'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Report', 'url'=>array('index')),
	array('label'=>'Create Report', 'url'=>array('create')),
	array('label'=>'View Report', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Report', 'url'=>array('admin')),
);
?>

<h1>Update Report <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>