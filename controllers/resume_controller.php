<?php
/**
 * Example Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class ResumeController extends ResumeAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
    public $name = 'Resume';
    public $helpers = array(
    	'Javascript'
    );
/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
        
    public $uses = array('Job', 'Certification', 'Degree', 'Node');
    
    public function beforeFilter(){
    	parent::beforeFilter();
    	
    	$this->Node->bindModel(
        	array('hasOne'=>array('Job', 'Certification', 'Degree')),
        	false
       	);
       	
    }
    
    public function admin_index() {
    	$this->layout = 'admin';
        $this->set('title_for_layout', __('Event', true));
    }

    public function index() {
		//get a list of all nodes that match the types
		$jobs = $this->Node->find('all', array('conditions'=>array('Node.type'=>'job', 'Node.terms LIKE'=>'%'.$terms.'%'), 'order'=>'Job.is_current DESC, Job.start_date DESC'));
		$certs = $this->Node->find('all', array('conditions'=>array('Node.type'=>'cert', 'Node.terms LIKE'=>'%'.$terms.'%'), 'order'=>'Certification.cert_date DESC, Node.title ASC'));
		$degrees = $this->Node->find('all', array('conditions'=>array('Node.type'=>'degree', 'Node.terms LIKE'=>'%'.$terms.'%'), 'order'=>'Degree.degree_date DESC'));

		$this->set(compact('jobs', 'certs', 'degrees'));
    }

    public function export_pdf($terms = ''){
        Configure::write('debug', 0); // Otherwise we cannot use this method while developing 

		//get a list of all nodes that match the types
		$jobs = $this->Node->find('all', array('conditions'=>array('Node.type'=>'job', 'Node.terms LIKE'=>'%'.$terms.'%'), 'order'=>'Job.is_current DESC, Job.start_date DESC'));
		$certs = $this->Node->find('all', array('conditions'=>array('Node.type'=>'cert', 'Node.terms LIKE'=>'%'.$terms.'%'), 'order'=>'Certification.cert_date DESC, Node.title ASC'));
		$degrees = $this->Node->find('all', array('conditions'=>array('Node.type'=>'degree', 'Node.terms LIKE'=>'%'.$terms.'%'), 'order'=>'Degree.degree_date DESC'));
//debug($terms); exit();
		$this->set(compact('jobs', 'certs', 'degrees'));

        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
    }
    
}
?>