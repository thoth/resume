<?php 
/* SVN FILE: $Id$ */
/* App schema generated on: 2010-06-06 02:06:57 : 1275792417*/
class ResumeSchema extends CakeSchema {
	var $name = 'Resume';

	function before($resume = array()) {
		return true;
	}

	function after($resume = array()) {
	}

	var	$jobs = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'node_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'start_date' => array('type' => 'date', 'null' => true),
		'end_date' => array('type' => 'date', 'null' => true),
		'is_current' => array('type' => 'boolean', 'default' => 0, 'length'=>1),
		'employer_name' => array('type' => 'string', 'length'=>255, 'null' => true),
		'url' => array('type' => 'string', 'length'=>255, 'null' => true),
		'supervisor_name' => array('type' => 'string', 'length'=>75, 'null' => true),
		'supervisor_contact' => array('type' => 'string', 'length'=>100, 'null' => true),
		'bullet_points' => array('type' => 'text', 'null' => true),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	); 

	var	$certifications = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'node_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'organization' => array('type' => 'string', 'length' => 255),
		'location' => array('type' => 'string', 'length' => 255),
		'cert_date' => array('type' => 'date', 'null' => true),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	); 

	var	$degrees = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'node_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'degree_date' => array('type' => 'date', 'null' => true),
		'school_name' => array('type' => 'string', 'length'=>255, 'null' => true),
		'school_city' => array('type' => 'string', 'length'=>255, 'null' => true),
		'school_state' => array('type' => 'string', 'length'=>50, 'null' => true),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	); 
}
?>