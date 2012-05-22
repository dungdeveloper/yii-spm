<?php $this->widget('bootstrap.widgets.BootAlert'); ?>

<h1>View User #<?php echo $model->user_id; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
        'user_name',
        'user_first_name',
        'user_last_name',
        'user_full_name',
        'user_email',
        array('label' => $model->getAttributeLabel('role'),
            'value' => $model->getRoleName()
        ),
        array('name'=>'user_created_date',
            'value'=>$model->getCreatedDate()
        )
	),
)); ?>

<p>&nbsp;</p>
<p><?php echo CHtml::link('&laquo; Back', Yii::app()->request->getUrlReferrer()); ?></p>