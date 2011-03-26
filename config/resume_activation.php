<?php
/**
 * Resume Activation
 *
 * Activation class for Resume plugin.
 *
 * @package  Croogo
 * @author   Thomas Rader <thomas.rader@tigerclawtech.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.tigerclawtech.com/portfolio/croogo-resume-plugin
 */
class ResumeActivation {
/**
 * onActivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
    public function beforeActivation(&$controller) {
        return true;
    }
/**
 * Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
    public function onActivation(&$controller) {
        // ACL: set ACOs with permissions
        $controller->Croogo->addAco('Resume'); // ExampleController
        $controller->Croogo->addAco('Resume/admin_index'); // ExampleController::admin_index()
        $controller->Croogo->addAco('Resume/index', array('registered', 'public')); // ExampleController::index()
        $controller->Croogo->addAco('Resume/export_pdf', array('registered', 'public')); // ExampleController::index()
        $controller->Croogo->addAco('Jobs'); // ExampleController
        $controller->Croogo->addAco('Jobs/admin_index'); // ExampleController::admin_index()
        $controller->Croogo->addAco('Jobs/index', array('registered', 'public')); // ExampleController::index()
        $controller->Croogo->addAco('Degrees'); // ExampleController
        $controller->Croogo->addAco('Degrees/admin_index'); // ExampleController::admin_index()
        $controller->Croogo->addAco('Degrees/index', array('registered', 'public')); // ExampleController::index()
        $controller->Croogo->addAco('Certifications'); // ExampleController
        $controller->Croogo->addAco('Certifications/admin_index'); // ExampleController::admin_index()
        $controller->Croogo->addAco('Certifications/index', array('registered', 'public')); // ExampleController::index()

		$controller->Setting->write('Resume.name', '', array('editable' => 1, 'title' => 'Name'));
		$controller->Setting->write('Resume.phone_number', '', array('editable' => 1, 'title' => 'Phone Number'));
		$controller->Setting->write('Resume.email', '', array('editable' => 1, 'title' => 'Email'));
		$controller->Setting->write('Resume.website', '', array('editable' => 1, 'title' => 'Website'));
		$controller->Setting->write('Resume.address_1', '', array('editable' => 1, 'title' => 'Address'));
		$controller->Setting->write('Resume.address_2', '', array('editable' => 1, 'title' => ''));
		$controller->Setting->write('Resume.city', '', array('editable' => 1, 'title' => 'City'));
		$controller->Setting->write('Resume.state', '', array('editable' => 1, 'title' => 'State'));
		$controller->Setting->write('Resume.postal_code', '', array('editable' => 1, 'title' => 'Postal Code'));
		$controller->Setting->write('Resume.country', '', array('editable' => 1, 'title' => 'Country'));
		

		$version  = $controller->Setting->read('Resume.version');
		swtich($version){
			default:
		        // Add a table to the DB
		        App::import('Core', 'File');
		        App::import('Model', 'CakeSchema', false);
				App::import('Model', 'ConnectionManager');
		
				$db = ConnectionManager::getDataSource('default');
				if(!$db->isConnected()) {
					$this->Session->setFlash(__('Could not connect to database.', true));
				} else {
					$schema =& new CakeSchema(array('plugin'=>'resume','name'=>'resume'));
					$schema = $schema->load();
					foreach($schema->tables as $table => $fields) {
						$create = $db->createSchema($schema, $table);
						$db->execute($create);
					} 
				} 
				
				App::import('Model', 'Type');
				$type = new Type();
		        $type->saveAll(array(
			        array(
			        	'Type'=>array(
				            'title' => 'Jobs',
				            'alias' => 'job',
				            'comment_status' => 0,
				            'format_show_author'=>0,
				            'format_show_date'=>0,
				            'description'=>'Jobs you have done.'
			            ),
			            'Vocabulary'=>array('Vocabulary'=>array(1,2))
			        ),
			        array(
			            'Type'=>array(
				            'title' => 'Certifications',
				            'alias' => 'cert',
				            'comment_status' => 0,
				            'format_show_author'=>0,
				            'format_show_date'=>0,
				            'description'=>'Certifications you have acquired.'
			            ),
			            'Vocabulary'=>array('Vocabulary'=>array(1,2))
			        
		        	),
		        	array(
			            'Type'=>array(
				            'title' => 'Degrees',
				            'alias' => 'degree',
				            'comment_status' => 0,
				            'format_show_author'=>0,
				            'format_show_date'=>0,
				            'description'=>'Degrees you have obtained.'
			            ),
			            'Vocabulary'=>array('Vocabulary'=>array(1,2))
			        
			        )
				));
			break;
		}
		$controller->Setting->write('Resume.version', '1.0', array('editable' => 0, 'title' => 'Version'));
     
    }
/**
 * onDeactivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
    public function beforeDeactivation(&$controller) {
        return true;
    }
/**
 * Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
    public function onDeactivation(&$controller) {
        // ACL: remove ACOs with permissions
        $controller->Croogo->removeAco('Resume'); // ExampleController ACO and it's actions will be removed
        $controller->Croogo->removeAco('Jobs'); // ExampleController ACO and it's actions will be removed
        $controller->Croogo->removeAco('Certifications'); // ExampleController ACO and it's actions will be removed

    }
}
?>