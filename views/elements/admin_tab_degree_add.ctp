<div id="node-degrees">
<?php
    echo $form->input('Degree.node_id', array('type'=>'hidden', 'value'=>$html->value('Node.id')));
    echo $form->input('Degree.degree_date');
    echo $form->input('Degree.school_name');
    echo $form->input('Degree.school_city');
    echo $form->input('Degree.school_state');
?>
</div>