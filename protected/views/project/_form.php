<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id'=>'project-form',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

    <?php echo $form->dropDownListRow($model,'request_id', $model->getRequestArray()); ?>
    <?php echo $form->textFieldRow($model,'name',array('class'=>'span10')); ?>
    <?php echo $form->textAreaRow($model,'description',array('class'=>'span10')); ?>
    <?php echo $form->textFieldRow($model,'estimate_time',array('class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model,'sourcers',array('class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model,'sourcer_time',array('class'=>'span3')); ?>
    
    <br />
    <?php $this->widget('bootstrap.widgets.BootButton', array('buttonType'=>'submit', 'icon'=>'ok', 'label'=>'Submit')); ?>

<?php $this->endWidget(); ?>
