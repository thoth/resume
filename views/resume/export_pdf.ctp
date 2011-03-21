<style>
	div, p, h3, h2 {margin-top: 0px; padding-top: 0px; margin-bottom: 0px; padding-bottom: 0px;}
	table, tr, td {border:none}
	h1 {font-size: 2em}
	h2 {font-size: 1.4em; font-weight: bold;}
	h3.employer, h3.employment-dates {font-style: italic; font-weight: normal; font-size: .8em; margin-top: 4px}
	/*.block {border-bottom: 0.5px solid black;}*/
	.right {text-align: right;}
	table.header {background-color: #cccccc; border: 1px solid black; padding: 6px;}
	td {margin: 6px;}
	table.body { padding: 6px;}
	td.category {background-color: #333333; border: 1px solid #333333;color: #ffffff; font-size: 1.6em; font-weight: bold; }
</style>

<table class="header">
	<tr>
		<td><h1><?php echo Configure::read('Resume.name'); ?></h1></td>
		<td class="right">
			<?php 
				echo (strlen(Configure::read('Resume.address_1'))>0)?Configure::read('Resume.address_1').'<br />':''; 
				echo (strlen(Configure::read('Resume.address_2'))>0)?Configure::read('Resume.address_2').'<br />':''; 
				echo (strlen(Configure::read('Resume.city'))>0)?Configure::read('Resume.city').', ':''; 
				echo (strlen(Configure::read('Resume.state'))>0)?Configure::read('Resume.state').' ':''; 
				echo (strlen(Configure::read('Resume.postal_code'))>0)?Configure::read('Resume.postal_code').' ':''; 
				echo (strlen(Configure::read('Resume.country'))>0)?Configure::read('Resume.country').'<br />':''; 
				echo '<br />';
				echo (strlen(Configure::read('Resume.email'))>0)?$this->Html->link(Configure::read('Resume.email'), 'mailto:'.Configure::read('Resume.email')).'<br />':''; 
				echo (strlen(Configure::read('Resume.phone_number'))>0)?Configure::read('Resume.phone_number'):''; 				 
			?>
		</td>
	</tr>
</table>
<br />
<table class="body">
	<tr>
		<td class="category">
	    	Work History
		</td>
	</tr>
<?php
	foreach($jobs as $job){
		$layout->setNode($job); 
?>
	<tr>
		<td>
	    <h2><?php echo $layout->node('title'); ?></h2>
	    <h3 class="employer">at <?php echo (strlen($job['Job']['url'])>0)?$this->Html->link($job['Job']['employer_name'], $job['Job']['url']):$job['Job']['employer_name'] ?></h3>
	    <h3 class="employment-dates">from <?php echo date('F j, Y', strtotime($job['Job']['start_date'])).' to '.(($job['Job']['is_current']==1)?'present':date('F j, Y', strtotime($job['Job']['end_date']))) ?></h3>
	    <?php
	        echo $layout->node('body');
	        //echo $layout->nodeMoreInfo();
	    ?>
		</td>
	</tr>
<?php	
	}
?>
</table>
<?php
	if(!empty($degrees)){
?>
<br />
<table class="body">
	<tr>
		<td class="category">
	    	Education
		</td>
	</tr>
<?php
	foreach($degrees as $degree){
		$layout->setNode($degree); 
?>
	<tr>
		<td>
	    	<h2><?php echo $layout->node('title'); ?></h2>
	    	<h3 class="employment-dates"><?php echo date('m/d/Y', strtotime($degree['Degree']['degree_date'])) ?> at <?php echo $degree['Degree']['school_name'] ?>, <?php echo $degree['Degree']['school_city'] ?>, <?php echo $degree['Degree']['school_state'] ?>
	    	</h3>
	    </td>
	</tr>
<?php	
	}
?>
</table>
<?php	
	}
	if(!empty($certs)){
?>
<br />
<table class="body">
	<tr>
		<td class="category">
	    	Certifications
		</td>
	</tr>
<?php
	foreach($certs as $cert){
		$layout->setNode($cert); 
?>
	<tr>
		<td>
			<?php 
	    		echo $layout->node('title'); ?>, <?php echo $cert['Certification']['location'] ?>, <?php echo date('F Y', strtotime($cert['Certification']['cert_date'])) ?>, <?php echo $cert['Certification']['location'] ?>
	   </td>
	</tr>
<?php	
	}
?>
</table>
<?php	
	}
?>
