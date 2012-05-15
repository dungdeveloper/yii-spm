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

<h1>Manage Requests</h1>

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
    'template'=>"{items}",
    'columns'=>array(
		array(
            'header' => 'Subject',
            'name' => 'subject',
        ),
		array(
            'header' => 'Latest update',
            'name' => 'update_time',
        ),
        array(
            'class'=>'bootstrap.widgets.BootButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>
