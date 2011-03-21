<?php
class Job extends ResumeAppModel{
	var $name = 'Job';
	
	var $belongsTo = array(
		'Node'
	);
}
?>
