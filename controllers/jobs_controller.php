<?php
/**
 * Jobs Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Thomas Rader <thomas.rader@tigerclawtech.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.tigerclawtech.com/croogo
 */
class JobsController extends ResumeAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
    public $name = 'Jobs';
    public $helpers = array(
    	'Javascript'
    );
    
    public function beforeFilter(){
    	parent::beforeFilter();
    }

    public function index() {
        $this->set('title_for_layout', __('Jobs', true));
        
        //get a list of jobs
        $jobs = $this->Job->find('all', array('conditions'=>array('Node.status'=>1), 'order'=>'Job.is_current DESC, Job.start_date DESC'));
        $this->set('jobs', $jobs);
    }
    
}
?>