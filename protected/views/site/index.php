<?php $this->pageTitle=Yii::app()->name; ?>

<?php $this->widget('bootstrap.widgets.BootAlert'); ?>

<?php $this->beginWidget('bootstrap.widgets.BootHero', array(
    'heading'=>'Sourcing PM!',
)); ?>
 
    <p>Welcome to Sourcing Project Management!</p>
    
    <p>
    <?php if (Yii::app()->user->role != 'lead'): ?>
        <?php $this->widget('bootstrap.widgets.BootButton', array(
            'type'=>'primary',
            'size'=>'large',
            'label'=>'Manage Request',
            'url'=>array('request/admin'),
        )); ?>
    <?php endif; ?>
    <?php if (Yii::app()->user->role != 'client'): ?>
        <?php $this->widget('bootstrap.widgets.BootButton', array(
            'type'=>'primary',
            'size'=>'large',
            'label'=>'Manage Project',
            'url'=>array('project/admin'),
        )); ?>
    <?php endif; ?>
    </p>    
 
<?php $this->endWidget(); ?>
