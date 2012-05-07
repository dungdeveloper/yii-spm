<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'request-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'subject'); ?>
        <?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 256)); ?>
        <?php echo $form->error($model, 'subject'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 16, 'cols' => 80)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row">
        <?php echo '<b>Upload files</b>'; ?>
        <?php
        $this->widget('CMultiFileUpload', array(
            'name' => 'files',
            //'accept' => 'xls|doc|docx',
            //'denied' => 'Invalid file type',
            'duplicate' => 'Duplicate file!',
        ));
        ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->