<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

    <fieldset style="margin: 0 auto; width: 470px; border-radius: 4px; border: solid thick whiteSmoke; padding: 20px; border-top: 0;">

	<?php echo $form->errorSummary($model); ?>

	<?php if($model->isNewRecord): ?>
        <div class="row" style="clear:both;float: left;">
            <?php echo $form->labelEx($model,'user_name'); ?>
            <?php echo $form->textField($model,'user_name',array('placeholder'=>'Username','style'=>'width:100%','maxlength'=>64)); ?>
            <?php echo $form->error($model,'user_name'); ?>
        </div>
    <?php else: ?>
        <div class="row" style="clear:both;float: left;">
            <?php echo $model->user_name; ?>
        </div>
    <?php endif; ?>
	<div class="row" style="clear:both;float: left;">
		<?php echo $form->labelEx($model,'user_first_name'); ?>
		<?php echo $form->textField($model,'user_first_name',array('placeholder'=>'First Name','style'=>'width:100%','maxlength'=>128)); ?>
		<?php echo $form->error($model,'user_first_name'); ?>
	</div>

	<div class="row" style="clear:both;float: left;">
		<?php echo $form->labelEx($model,'user_last_name'); ?>
		<?php echo $form->textField($model,'user_last_name',array('placeholder'=>'Last Name','style'=>'width:100%','maxlength'=>128)); ?>
		<?php echo $form->error($model,'user_last_name'); ?>
	</div>

	<div class="row" style="clear:both;float: left;">
		<?php echo $form->labelEx($model,'user_full_name'); ?>
		<?php echo $form->textField($model,'user_full_name',array('placeholder'=>'Full Name','style'=>'width:100%','maxlength'=>128)); ?>
		<?php echo $form->error($model,'user_full_name'); ?>
	</div>

    <?php if($model->isNewRecord): ?>
	<div class="row" style="clear:both;float: left;">
		<?php echo $form->labelEx($model,'user_email'); ?>
		<?php echo $form->textField($model,'user_email',array('placeholder'=>'Email','style'=>'width:100%','maxlength'=>128)); ?>
		<?php echo $form->error($model,'user_email'); ?>
	</div>
    <?php else: ?>
    <div class="row" style="clear:both;float: left;">
        <?php echo $model->user_email; ?>
    </div>
    <?php endif; ?>

    <?php if($model->isNewRecord):?>
        <div class="row" style="clear:both;float: left;">
            <?php echo $form->labelEx($model,'user_password'); ?>
            <?php echo $form->passwordField($model,'user_password',array('placeholder'=>'Password','style'=>'width:100%','maxlength'=>128)); ?>
            <?php echo $form->error($model,'user_password'); ?>
        </div>

        <div class="row" style="clear:both;float: left;">
            <?php echo $form->labelEx($model,'user_password_repeat'); ?>
            <?php echo $form->passwordField($model,'user_password_repeat',array('placeholder'=>'Repeat Password','style'=>'width:100%','maxlength'=>128)); ?>
            <?php echo $form->error($model,'user_password_repeat'); ?>
        </div>
    <?php endif; ?>

    <div class="row" style="clear:both;float: left;">
        <?php echo $form->labelEx($model,'user_role'); ?>
        <?php echo $form->dropDownList($model,'user_role',$model->getRoleOptions(),array('placeholder'=>'Password','style'=>'width:100%','maxlength'=>128)); ?>
        <?php echo $form->error($model,'user_role'); ?>
    </div>
	<div class="row buttons" style="clear:both;float: left;">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
    </fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->