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

<h1>View Request #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'subject',
        'description',
        'create_time',
        'update_time',
        'client_id',
    ),
));
?>

<!-- Files -->
<?php
$folder = Yii::app()->baseUrl . '/files/' . $model->id;
foreach ($files as $f) {
    echo CHtml::link($f->filename, $folder . '/' . $f->filename);
    echo '<br />';
}
?>

<?php
echo '<br />Add more files';

echo CHtml::form('','post',array('enctype'=>'multipart/form-data'));
$this->widget('CMultiFileUpload', array(
    'name' => 'files',
    //'accept' => 'xls|doc|docx',
    //'denied' => 'Invalid file type',
    'duplicate' => 'Duplicate file!',
));
echo CHtml::submitButton();
echo CHtml::endForm();
?>
<!-- End Files -->
