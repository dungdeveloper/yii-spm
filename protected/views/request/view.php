<h1>View <i><?php echo $model->subject; ?></i></h1>

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
