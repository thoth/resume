<?php
/**
 * ExampleHook Component
 *
 * An example hook component for demonstrating hook system.
 *
 * @category Component
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class ResumeComponent extends Object {
   
    public function initialize(&$controller, $settings = array()){
    	
    	$controller->Node->bindModel(
        	array('hasOne'=>array('Job','Certification','Degree')),
        	false
       	);
    }
   
    public function beforeRender(&$controller){
       	
//       	debug($controller); exit();
       	if($controller->name == 'Nodes'){
       		$type = '';
       		if($controller->action == 'admin_edit'){
       			$type = $controller->data['Node']['type'];
       		} elseif ($controller->action == 'admin_add'){
       			$type = $controller->params['pass'][0];
       		}
       		switch($type){
       			case 'job':
				    Croogo::hookAdminTab('Nodes/admin_add', 'Job Details (optional)', 'resume.admin_tab_job_add');
				    Croogo::hookAdminTab('Nodes/admin_edit', 'Job Details (optional)', 'resume.admin_tab_job');
       			break;
       			case 'cert':
				    Croogo::hookAdminTab('Nodes/admin_add', 'Cert Details (optional)', 'resume.admin_tab_cert_add');
				    Croogo::hookAdminTab('Nodes/admin_edit', 'Cert Details (optional)', 'resume.admin_tab_cert');
       			break;
       			case 'degree':
				    Croogo::hookAdminTab('Nodes/admin_add', 'Degree Details (optional)', 'resume.admin_tab_degree_add');
				    Croogo::hookAdminTab('Nodes/admin_edit', 'Degree Details (optional)', 'resume.admin_tab_degree');
       			break;
       		}
				
				
    	}     	
    }
        
}
?>