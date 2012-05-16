<?php
$this->breadcrumbs = array(
    'Requests' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Request', 'url' => array('index')),
    array('label' => 'Create Request', 'url' => array('create')),
    array('label' => 'Update Request', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Request', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Request', 'url' => array('admin')),
);
?>

<h1>View <?php echo $model->subject; ?></h1>

<?php
$this->widget('bootstrap.widgets.BootDetailView', array(
    'data' => $model,
    'attributes' => array(
        'description',
        array(
            'name' => 'update_time',
            'value' => $model->showUpdateTime(),
        ),
        array(
            'name' => 'client_id',
            'value' => $model->client->user_name,
        ),
    ),
));
?>

<!-- Files -->
<h1>Files</h1>
<?php
$folder = Yii::app()->baseUrl . '/files/' . $model->id;
foreach ($files as $f) {
    echo CHtml::link($f->filename, $folder . '/' . $f->filename);
    echo '<br />';
}
?>
<!-- End Files -->

<p>&nbsp;</p>
<p><?php echo CHtml::link('&laquo; Back', Yii::app()->request->getUrlReferrer()); ?></p>
