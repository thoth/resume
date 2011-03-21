<?php
/**
 * Certificates Controller
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
class CertificationsController extends ResumeAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
    public $name = 'Certifications';
    public $helpers = array(
    	'Javascript'
    );
    
    public function beforeFilter(){
    	parent::beforeFilter();
    }

    public function index() {
        $this->set('title_for_layout', __('Certifications', true));
        
        //get a list of certs
        $certs = $this->Certification->find('all', array('conditions'=>array('Node.status'=>1), 'order'=>'Certification.cert_date DESC, Node.title ASC'));
        $this->set('certs', $certs);
    }
    
}
?>