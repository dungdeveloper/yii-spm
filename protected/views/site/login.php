<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
    'htmlOptions'=>array('class'=>'well','style'=>'width: 440px; margin: 0 auto;'),
)); ?>

<div class="container">
    <div class="row">
        <legend class="span6" style="text-align: center;">SPM - Login</legend>

        <div class="span6" style="clear: both;">
            <?php echo $form->textFieldRow($model, 'email', array('class'=>'span3')); ?>
        </div>
        <div class="span6" style="clear: both;">
            <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
        </div>
        <div class="span6" style="clear: both;">
            <?php echo $form->checkboxRow($model, 'rememberMe'); ?>
        </div>
        <div class="span6" style="clear: both;text-align: center;">
            <?php $this->widget('bootstrap.widgets.BootButton', array('buttonType'=>'submit', 'icon'=>'ok', 'label'=>'Submit')); ?>
        </div>

    </div>
</div>
    <?php $this->endWidget(); ?>
