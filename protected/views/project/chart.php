<div class="span12" style="text-align: center;">
    <?php
        $this->widget('ext.widgets.google.XGoogleChart',array(
            'type'=>'bar-vertical',
            'title'=>'Browser market January  2008',
            'data'=>array('IE7'=>22,'IE6'=>30.7,'IE5'=>1.7,'Firefox'=>36.5,'Mozilla'=>1.1,'Safari'=>2,'Opera'=>1.4),
            'size'=>array(600,300),
            'barsSize'=>array('a'), // automatically resize bars to fit the space available
            'color'=>array('3285ce'),
            'axes'=>array(
                'x'=>array(0,2,4,6,8),
                'y'=>array(0,2,4,6,8),
            ), // axes to show
        ));
    ?>
</div>


