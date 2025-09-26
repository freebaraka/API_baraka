<?php
require_once 'ClassAutoLoad.php';

// Instantiate the layouts object if not already done
if (!isset($ObjLayouts)) {
    $ObjLayouts = new layouts();
}

// Make sure $conf is defined (add your config array if needed)
if (!isset($conf)) {
    $conf = []; // Or load your configuration here
}

// Use the objects from ClassAutoLoad.php
$ObjLayouts->header($conf);
$ObjLayouts->navbar($conf);
$ObjLayouts->banner($conf);
$ObjLayouts->content($conf);
$ObjLayouts->footer($conf);