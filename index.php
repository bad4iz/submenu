<?php

header("Content-Type:text/html;charset=UTF8");

include 'config.php';
include 'functions/functions.php';

$db = new Db(DB);

print_r( $db->get_cat());

function my_func() {

}