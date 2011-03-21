<?php
	$this->Html->css('/resume/css/resume_theme', null, array('inline'=>false));
?>

<div class="grid_16">
	<div class="grid_11">
<?php

	foreach($certs as $cert){
?>
		<?php  $layout->setNode($cert); ?>
		<div id="node-<?php echo $layout->node('id'); ?>" class="node node-type-<?php echo $layout->node('type'); ?>">
			<p>
	    	<?php 
	    		echo $layout->node('title'); ?>, <?php echo $cert['Certification']['organization'] ?>, <?php echo date('F Y', strtotime($cert['Certification']['cert_date'])) ?>, <?php echo $cert['Certification']['location'] ?>
	    	</p>
		</div>

<?php	
	}
?>


	</div>

	<div id="sidebar" class="grid_5">
		<?php echo $this->Layout->blocks('right'); ?>
	</div>
</div>