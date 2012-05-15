<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
    'htmlOptions'=>array('class'=>'well'),
)); ?>
<legend style="margin-left: 250px;">Sourcing Project Management System Login</legend>
    <div class="left"><?php echo $form->textFieldRow($model, 'email', array('class'=>'span4')); ?></div>
    <div class="left"><?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span4')); ?></div>
    <div class="left"><?php echo $form->checkboxRow($model, 'rememberMe'); ?></div>
    <div class="submit">
        <?php $this->widget('bootstrap.widgets.BootButton', array('buttonType'=>'submit', 'icon'=>'ok', 'label'=>'Submit')); ?>
        <?php $this->endWidget(); ?>
    </div>
<style type="text/css">
    .left {margin-left: 150px;}
    .submit {margin-left: 420px;}
</style>