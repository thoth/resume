<div id="node-jobs">
<?php
	//debug($this); exit();

    echo $form->input('Job.id');
    echo $form->input('Job.node_id', array('type'=>'hidden', 'value'=>$this->data['Node']['id']));
    echo $form->input('Job.start_date');
    echo $form->input('Job.end_date');
    echo $form->input('Job.is_current');
    echo $form->input('Job.employer_name');
    echo $form->input('Job.url');
    echo $form->input('Job.supervisor_name');
    echo $form->input('Job.supervisor_contact');
    echo $form->input('Job.bullet_points');
?>
</div>