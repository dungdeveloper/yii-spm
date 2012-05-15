<?php
/** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id' => 'request-form',
    'htmlOptions' => array('class' => 'well', 'enctype' => 'multipart/form-data'),
        ));
?>

<?php echo $form->textFieldRow($model, 'subject', array('class'=>'span10')); ?>
<?php echo $form->textAreaRow($model, 'description', array('class'=>'span10')); ?>

<?php echo '<br />Upload files'; ?>
<?php
$this->widget('CMultiFileUpload', array(
    'name' => 'files',
    //'accept' => 'xls|doc|docx',
    //'denied' => 'Invalid file type',
    'duplicate' => 'Duplicate file!',
));
?>
<?php $this->widget('bootstrap.widgets.BootButton', array('buttonType'=>'submit', 'icon'=>'ok', 'label'=>'Submit')); ?>

<?php $this->endWidget(); ?>