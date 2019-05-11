<?php

$framework_files_detection = '../';

include_once( $framework_files_detection."app/controllers/initapp.php");

include_once( $framework_files_detection."app/controllers/initaddmeal.php");


$framework_route::goDirect2Index();