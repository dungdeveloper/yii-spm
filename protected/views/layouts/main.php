<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php $this->widget('bootstrap.widgets.BootNavbar', array(
    'fixed'=>false,
    'brand'=>'Sourcing PM',
    'brandUrl'=>$this->createUrl('site/index'),
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.BootMenu',
            'items'=>array(
                array('label'=>'Request', 'url'=>'#', 'visible'=>(Yii::app()->user->role != 'lead'), 
                    'items'=>array(
                    array('label'=>'Create Request', 'url'=>array('request/create')),
                    array('label'=>'Manage Requests', 'url'=>array('request/admin')),
                )),                                
                array('label'=>'Project', 'url'=>'#', 'visible'=>(Yii::app()->user->role != 'client'), 
                    'items'=>array(
                    array('label'=>'Create Project', 'url'=>array('project/create')),
                    array('label'=>'Manage Projects', 'url'=>array('project/admin')),
                )),
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.BootMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>Yii::app()->user->getState('fullName'), 'url'=>'#', 'items'=>array(
                    array('label'=>'Logout', 'url'=>array('site/logout')),
                )),
            ),
        ),
    ),
)); ?>    

<div class="container">
	<?php echo $content; ?>
	<div class="clear"></div>

    <hr />
	<footer style="text-align: center;">        
        <p class="copy">&copy; Glandore Systems <?php echo date('Y'); ?></p>
        <p class="powered">Powered by Yii PHP framework & Bootstrap</p>
	</footer>
</div>

</body>
</html>
