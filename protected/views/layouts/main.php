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
    'brand'=>'SPM',
    'brandUrl'=>'#',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.BootMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>'#', 'active'=>true),
                array('label'=>'Project', 'url'=>'#', 'items'=>array(
                    array('label'=>'Add Project', 'url'=>'#'),
                    array('label'=>'Manage Project', 'url'=>'#'),
                )),
                array('label'=>'Request', 'url'=>'#', 'items'=>array(
                    array('label'=>'Add Request', 'url'=>'#'),
                    array('label'=>'Manage Request', 'url'=>'#'),
                )),                
            ),
        ),
        '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
        array(
            'class'=>'bootstrap.widgets.BootMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>Yii::app()->user->getState('fullName'), 'url'=>'#', 'items'=>array(
                    array('label'=>'Logout', 'url'=>'#'),
                )),
            ),
        ),
    ),
)); ?>    

<div class="container">
	<?php echo $content; ?>
	<div class="clear"></div>

    <hr />
	<footer>        
        <p class="copy">&copy; Glandore Systems <?php echo date('Y'); ?></p>
        <p class="powered">Powered by Yii PHP framework & Bootstrap</p>
	</footer>
</div>

</body>
</html>
