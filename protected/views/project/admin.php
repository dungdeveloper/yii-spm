<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('project-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Projects</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BootGridView', array(
    'id'=>'project-grid',
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'template'=>"{items}",
    'columns'=>array(
		'name',
		array(
            'header' => 'Time (hours)',
            'name' => 'estimate_time',
        ),
		array(
            'header' => 'Sourcers',
            'name' => 'sourcers',
        ),
		array(
            'header' => 'Time per sourcer',
            'name' => 'sourcer_time',
        ),
		array(
            'header' => 'Latest update',
            'name' => 'update_time',
        ),
		'request_id',
        array(
            'class'=>'bootstrap.widgets.BootButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>
