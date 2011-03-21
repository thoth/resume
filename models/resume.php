<?php
class Resume extends ResumeAppModel{
	var $name = 'Resume';
	
	var $belongsTo = array(
		'Node'
	);
}
?>
