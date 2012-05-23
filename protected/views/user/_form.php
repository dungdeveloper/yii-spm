<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('class' => 'well', 'enctype' => 'multipart/form-data'),
)); ?>


	<?php echo $form->errorSummary($model); ?>

    <?php if($model->isNewRecord)
                echo $form->textFieldRow($model,'user_name',array('class'=>'span5','maxlength'=>64));
    ?>

	<?php echo $form->textFieldRow($model,'user_first_name',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'user_last_name',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'user_full_name',array('class'=>'span5','maxlength'=>128)); ?>

	<?php if($model->isNewRecord)
                echo $form->textFieldRow($model,'user_email',array('class'=>'span5','maxlength'=>128));
    ?>

	<?php if($model->isNewRecord)
                echo $form->passwordFieldRow($model,'user_password',array('class'=>'span5','maxlength'=>128));
    ?>

    <?php if($model->isNewRecord)
        echo $form->passwordFieldRow($model,'user_password_repeat',array('class'=>'span5','maxlength'=>128));
    ?>

    <div class="controls">
        <select id="dropdown" name="User[user_role]">
            <option>admin</option>
            <option>client</option>
            <option>lead</option>
        </select>
    </div>
    <?php //echo $form->textFieldRow($model,'user_lastvisit',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'user_created_date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
    or <?php echo CHtml::link('Cancel', array('user/admin')); ?>
    </div>

<?php $this->endWidget(); ?>
