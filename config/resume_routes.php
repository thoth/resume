<?php
    CroogoRouter::connect('/resume/pdf/*', array('plugin' => 'resume', 'controller' => 'resume', 'action' => 'export_pdf'));
    CroogoRouter::connect('/resume', array('plugin' => 'resume', 'controller' => 'resume', 'action' => 'index'));
    CroogoRouter::connect('/resume/jobs', array('plugin' => 'resume', 'controller' => 'jobs', 'action' => 'index'));
    CroogoRouter::connect('/resume/degrees', array('plugin' => 'resume', 'controller' => 'degrees', 'action' => 'index'));
    CroogoRouter::connect('/resume/certs', array('plugin' => 'resume', 'controller' => 'certifications', 'action' => 'index'));
?>