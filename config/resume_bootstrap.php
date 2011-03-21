<?php
/**
 * Routes
 *
 * example_routes.php will be loaded in main app/config/routes.php file.
 */
    Croogo::hookRoutes('Resume');
/**
 * Behavior
 *
 * This plugin's Example behavior will be attached whenever Node model is loaded.
 */
//    Croogo::hookBehavior('Node', 'Example.Example', array());
/**
 * Component
 *
 * This plugin's Example component will be loaded in ALL controllers.
 */
    Croogo::hookComponent('Nodes', 'Resume.Resume');
/**
 * Helper
 *
 * This plugin's Example helper will be loaded via NodesController.
 */
//    Croogo::hookHelper('Nodes', 'Example.Example');
/**
 * Admin menu (navigation)
 *
 * This plugin's admin_menu element will be rendered in admin panel under Extensions menu.
 */
    Croogo::hookAdminMenu('Resume');
/**
 * Admin row action
 *
 * When browsing the content list in admin panel (Content > List),
 * an extra link called 'Example' will be placed under 'Actions' column.
 */
//    Croogo::hookAdminRowAction('Nodes/admin_index', 'Event', 'plugin:event/controller:event/action:index/:id');
/**
 * Admin tab
 *
 * When adding/editing Content (Nodes),
 * an extra tab with title 'Example' will be shown with markup generated from the plugin's admin_tab_node element.
 *
 * Useful for adding form extra form fields if necessary.
 */
 	
/*
    Croogo::hookAdminTab('Nodes/admin_add', 'Job Details (optional)', 'resume.admin_tab_job_add');
    Croogo::hookAdminTab('Nodes/admin_edit', 'Job Details (optional)', 'resume.admin_tab_job');

    Croogo::hookAdminTab('Nodes/admin_add', 'Cert Details (optional)', 'resume.admin_tab_cert_add');
    Croogo::hookAdminTab('Nodes/admin_edit', 'Cert Details (optional)', 'resume.admin_tab_cert');

    Croogo::hookAdminTab('Nodes/admin_add', 'Degree Details (optional)', 'resume.admin_tab_degree_add');
    Croogo::hookAdminTab('Nodes/admin_edit', 'Degree Details (optional)', 'resume.admin_tab_degree');
*/
?>