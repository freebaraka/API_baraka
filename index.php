<?php
require_once 'classes.php';
require_once 'forms.php';

//create instance of MyClass
$instance = new MyClass();
$formsInstance = new user_forms();

//calling the method for myMethod
$instance->myMethod();
$instance->heading();
$instance->footer();

//calling the method for signup_form
$formsInstance->signup_form();
$instance->footer();
?>