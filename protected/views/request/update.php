<?php $this->widget('bootstrap.widgets.BootAlert'); ?>

<h1>Update Request <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>