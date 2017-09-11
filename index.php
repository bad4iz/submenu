<?php

header("Content-Type:text/html;charset=UTF8");

include 'config.php';
include 'functions/functions.php';

$db = new Db(DB);

$db->view_cat( $db->get_cat());

