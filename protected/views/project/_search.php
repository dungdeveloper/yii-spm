<?php

/** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
    'htmlOptions' => array('class' => 'well'),
        ));
?>

<?php echo $form->textFieldRow($model, 'name', array('class'=>'span10')); ?>
<?php echo $form->dropDownListRow($model, 'request_id', $model->getRequestArray(), array(
    'prompt' => '',
)); ?>
<br />
<?php $this->widget('bootstrap.widgets.BootButton', array('buttonType'=>'submit', 'icon'=>'search', 'label'=>'Search')); ?>

<?php $this->endWidget(); ?>
