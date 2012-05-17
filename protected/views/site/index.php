<?php $this->pageTitle=Yii::app()->name; ?>

<?php $this->widget('bootstrap.widgets.BootAlert'); ?>

<?php $this->beginWidget('bootstrap.widgets.BootHero', array(
    'heading'=>'Sourcing PM!',
)); ?>
 
    <p>Welcome to Sourcing Project Management!</p>
    <p><?php $this->widget('bootstrap.widgets.BootButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Manage Request',
        'url'=>array('request/admin'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.BootButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Manage Project',
        'url'=>array('project/admin'),
    )); ?></p>    
 
<?php $this->endWidget(); ?>
