<?php
	$this->Html->css('/resume/css/resume_theme', null, array('inline'=>false));
?>

<div class="grid_16">
	<div class="grid_11">
<?php

	foreach($degrees as $degree){
?>
		<?php  $layout->setNode($degree); ?>
		<div id="node-<?php echo $layout->node('id'); ?>" class="node node-type-<?php echo $layout->node('type'); ?>">
			
	    	<h2><?php echo $layout->node('title'); ?></h2>
	    	<h3 class="employment-dates"><?php echo date('m/d/Y', strtotime($degree['Degree']['degree_date'])) ?> at <?php echo $degree['Degree']['school_name'] ?>, <?php echo $degree['Degree']['school_city'] ?>, <?php echo $degree['Degree']['school_state'] ?>
	    	</h3>
		</div>

<?php	
	}
?>


	</div>

	<div id="sidebar" class="grid_5">
		<?php echo $this->Layout->blocks('right'); ?>
	</div>
</div>