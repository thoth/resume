<?php
/**
 * Degrees Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Thomas Rader <thomas.rader@tigerclawtech.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.tigerclawtech.com
 */
class DegreesController extends ResumeAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
    public $name = 'Degrees';
    public $helpers = array(
    	'Javascript'
    );
    
    public function beforeFilter(){
    	parent::beforeFilter();
    	
    	$this->Degree->bindModel(
        	array('belongsTo'=>array('Node')),
        	false
       	);
    	       	
    }
    
    public function index() {
        $this->set('title_for_layout', __('Certifications', true));
        
        //get a list of certs
		$degrees = $this->Degree->find('all', array('conditions'=>array('Node.type'=>'degree'), 'order'=>'Degree.degree_date DESC'));
        $this->set('degrees', $degrees);
    }
    
}
?>