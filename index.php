<?php
class MyClass {
    public function heading() {
        echo "Welcome to BBIT DevOps!";
    }
    public function myMethod(){
        echo "<p>This is a new semester.</p>";
    }

    public function footer() {
        echo "<footer>Contact us at <a href='mailto:info@bbit.edu'>info@bbit.edu</a></footer>";
    }
}

//create instance of MyClass
$instance = new MyClass();

//calling the methods
$instance->myMethod();
$instance->heading();
$instance->footer();