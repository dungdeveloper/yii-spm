<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'request_id'); ?>
		<?php echo $form->dropDownList($model,'request_id', $model->getRequestArray()); ?>
		<?php echo $form->error($model,'request_id'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>    

	<div class="row">
		<?php echo $form->labelEx($model,'estimate_time'); ?>
		<?php echo $form->textField($model,'estimate_time'); ?>
		<?php echo $form->error($model,'estimate_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sourcers'); ?>
		<?php echo $form->textField($model,'sourcers'); ?>
		<?php echo $form->error($model,'sourcers'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sourcer_time'); ?>
		<?php echo $form->textField($model,'sourcer_time'); ?>
		<?php echo $form->error($model,'sourcer_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->