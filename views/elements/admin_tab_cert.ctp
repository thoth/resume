<div id="node-certs">
<?php
    echo $form->input('Certification.id', array('type'=>'hidden'));
	echo $form->input('Certification.node_id', array('type'=>'hidden', 'value'=>$this->data['Node']['id']));
   	echo $form->input('Certification.organization');
   	echo $form->input('Certification.location');
   	echo $form->input('Certification.cert_date');
?>
</div>