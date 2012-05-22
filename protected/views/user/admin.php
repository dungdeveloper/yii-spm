<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('bootstrap.widgets.BootAlert'); ?>
<h1>Manage Users</h1>

<?php $this->widget('bootstrap.widgets.BootButton', array(
    'label'=>'Create User',
    'url'=>array('create'),
    'type'=>'primary',
    'size'=>'large',
    'htmlOptions'=>array(
        'style'=>'float:right; margin-top: -25px;'
    ),
)); ?>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'user-grid',
    'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
    'template'=>"{items} {pager}",
	//'filter'=>$model,
	'columns'=>array(
		//'user_id',
		'user_name',
		'user_first_name',
		'user_last_name',
		'user_full_name',
		'user_email',
		/*
		'user_password',
		'user_lastvisit',
		'user_created_date',
		*/
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
		),
	),
)); ?>
