<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estimate_time')); ?>:</b>
	<?php echo CHtml::encode($data->estimate_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sourcers')); ?>:</b>
	<?php echo CHtml::encode($data->sourcers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sourcer_time')); ?>:</b>
	<?php echo CHtml::encode($data->sourcer_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lead_id')); ?>:</b>
	<?php echo CHtml::encode($data->lead_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_id')); ?>:</b>
	<?php echo CHtml::encode($data->request_id); ?>
	<br />

	*/ ?>

</div>