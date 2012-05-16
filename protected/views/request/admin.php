<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('request-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('bootstrap.widgets.BootAlert'); ?>
<h1>Manage Requests</h1>

<?php $this->widget('bootstrap.widgets.BootButton', array(
    'label'=>'Create Request',
    'url'=>array('create'),
    'type'=>'primary',
    'size'=>'large',
    'htmlOptions'=>array(        
        'style'=>'float:right; margin-top: -25px;'
    ),
)); ?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BootGridView', array(
    'id'=>'request-grid',
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'template'=>"{items} {pager}",
    'columns'=>array(
		array(
            'name' => 'subject',
            'htmlOptions' => array('width'=>200),
        ),
		array(
            'name' => 'description',
            'htmlOptions' => array('width'=>400),
            'sortable' => FALSE,
        ),        
		array(
            'header' => 'Files',
            'value' => '$data->showFiles("admin")',
            'type' => 'html',
        ),                
		array(
            'header' => 'Latest update',
            'name' => 'update_time',
            'value' => '$data->showUpdateTime()',
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
