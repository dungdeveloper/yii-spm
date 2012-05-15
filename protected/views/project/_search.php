<?php

/** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
    'htmlOptions' => array('class' => 'well'),
        ));
?>

<?php echo $form->textFieldRow($model, 'name'); ?>
<?php echo $form->textFieldRow($model, 'request_id'); ?>
<br />
<?php $this->widget('bootstrap.widgets.BootButton', array('buttonType'=>'submit', 'icon'=>'search', 'label'=>'Search')); ?>

<?php $this->endWidget(); ?>
