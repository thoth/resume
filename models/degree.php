<?php
class Degree extends ResumeAppModel{
	var $name = 'Degree';
	
	var $belongsTo = array(
		'Node'
	);
}
?>
