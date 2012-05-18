<div class="content">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/gantt/codebase/dhtmlxgantt.css">
    <script type="text/javascript" language="JavaScript" src="<?php echo Yii::app()->baseUrl; ?>/gantt/codebase/dhtmlxcommon.js"></script>
    <script type="text/javascript" language="JavaScript" src="<?php echo Yii::app()->baseUrl; ?>/gantt/codebase/dhtmlxgantt.js"></script>

    <script type="text/javascript" language="JavaScript">
        /*<![CDATA[*/
        function createChartControl(htmlDiv1)
        {
            // Create Gantt control
            var ganttChartControl = new GanttChart();
            // Setup paths and behavior
            ganttChartControl.setImagePath("<?php echo Yii::app()->baseUrl; ?>/gantt/codebase/imgs/");
            ganttChartControl.setEditable(false);
            ganttChartControl.showTreePanel(false);
            ganttChartControl.showContextMenu(false);
            ganttChartControl.showDescTask(true,'n,s-f');
            ganttChartControl.showDescProject(true,'n,d');

            //project 2
            <?php foreach ($requests as $r): ?>
                var project<?php echo $r->id ?> = new GanttProjectInfo(<?php echo $r->id ?>, "<?php echo $r->subject ?>", new Date(<?php echo date('Y', $r->create_time) ?>, <?php echo date('n', $r->create_time)-1 ?>, <?php echo date('j', $r->create_time) ?>));
                
                // Load data structure		
                ganttChartControl.addProject(project<?php echo $r->id ?>);         
            <?php endforeach; ?>
                
            <?php foreach ($projects as $p): ?>      
              <?php
              $progress = 0;
              foreach ($p->reports as $r) {
                  $progress += $r->progress;
              }
              ?>
              var task<?php echo $p->id ?> = new GanttTaskInfo(<?php echo $p->id ?>, "<?php echo $p->name ?>", new Date(<?php echo date('Y', $p->create_time) ?>, <?php echo date('n', $p->create_time)-1 ?>, <?php echo date('j', $p->create_time) ?>), <?php echo $p->estimate_time ?>, <?php echo $progress ?>, "");
              project<?php echo $p->request_id ?>.addTask(task<?php echo $p->id ?>);
            <?php endforeach; ?>
                
                // Build control on the page
                ganttChartControl.create(htmlDiv1);
        }
        /*]]>*/
    </script>

    <div style="width:950px; height:610px; position:relative" id="GanttDiv"></div>

    Mouse-hover some task to see the description.


</div>

<style>
    table {
        max-width: none;
    }
</style>        