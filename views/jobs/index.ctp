<?php
	$this->Html->css('/resume/css/resume_theme', null, array('inline'=>false));
?>

<div class="grid_16">
	<div class="grid_11">
<?php

	foreach($jobs as $job){
?>
		<?php  $layout->setNode($job); ?>
		<div id="node-<?php echo $layout->node('id'); ?>" class="node node-type-<?php echo $layout->node('type'); ?>">
			
		    <h2><?php echo $layout->node('title'); ?></h2>
		    <h3 class="employer">at <?php echo (strlen($job['Job']['url'])>0)?$this->Html->link($job['Job']['employer_name'], $job['Job']['url']):$job['Job']['employer_name'] ?></h3>
		    <h3 class="employment-dates">from <?php echo date('F j, Y', strtotime($job['Job']['start_date'])).' to '.(($job['Job']['is_current']==1)?'present':date('F j, Y', strtotime($job['Job']['end_date']))) ?></h3>
		    <?php
		    	
		        echo $layout->nodeInfo();
		        if ($layout->node('type') == 'blog') {
		        	echo $layout->nodeExcerpt();
		        }
		        echo $layout->nodeBody();
		        echo $layout->nodeMoreInfo();
		    ?>
		</div>

<?php	
	}
?>


	</div>

	<div id="sidebar" class="grid_5">
		<?php echo $this->Layout->blocks('right'); ?>
	</div>
</div>