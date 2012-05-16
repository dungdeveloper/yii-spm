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
    'dataProvider'=>$model->with('request')->search(),
    'template'=>"{items}",
    'columns'=>array(
		array(
            'name' => 'name',
            'htmlOptions' => array('width'=>150),
        ),
        array(
            'name' => 'description',
            'sortable' => FALSE,
            'htmlOptions' => array('width'=>300),
        ),
		array(
            'header' => 'Time (hours)',
            'name' => 'estimate_time',
        ),
		array(
            'header' => 'No of Sourcers',
            'name' => 'sourcers',
        ),
		array(
            'header' => 'Each sourcer (hours)',
            'name' => 'sourcer_time',
        ),
		array(
            'header' => 'Latest update',
            'name' => 'update_time',
            'value' => '$data->showUpdateTime()',
            'htmlOptions' => array('width'=>100),
        ),
		array(
            'name' => 'request_id',
            'value' => '$data->showRequest()',
            'type' => 'html',
            'htmlOptions' => array('width'=>100),
        ),
        array(
            'header' => 'Actions',
            'class'=>'bootstrap.widgets.BootButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
            'template' => '{update} {delete}',
            'afterDelete'=>'function(link,success,data){ if(success) alert("Delete completed successfuly"); }',            
        ),
    ),
)); ?>
