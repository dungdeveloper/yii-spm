<?php $this->widget('bootstrap.widgets.BootAlert'); ?>
<h1>View <i><?php echo $model->name; ?></i></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'description',
		'estimate_time',
		'sourcers',
		'sourcer_time',
		array(
            'name' => 'update_time',
            'value' => $model->showUpdateTime(),
        ),
		array(
            'name' => 'request_id',
            'value' => $model->showRequest(),
            'type' => 'html',
        ),
	),
)); ?>

<!-- Report -->
<?php $this->widget('bootstrap.widgets.BootThumbnails', array(
    'dataProvider'=>$dataProvider,
    'template'=>"{items}\n{pager}",
    'itemView'=>'../report/_view',
)); ?>

<h1>Report</h1>
<?php echo $this->renderPartial('../report/_form', array('model'=>$modelReport)); ?>
<!-- End Report -->
