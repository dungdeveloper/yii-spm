<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_id),array('view','id'=>$data->user_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_first_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_last_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_full_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_full_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_email')); ?>:</b>
	<?php echo CHtml::encode($data->user_email); ?>
	<br />

    <?php /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('user_password')); ?>:</b>
	<?php echo CHtml::encode($data->user_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_lastvisit')); ?>:</b>
	<?php echo CHtml::encode($data->user_lastvisit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->user_created_date); ?>
	<br />

	*/ ?>
    <br />

</div>