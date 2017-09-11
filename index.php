<?php

header("Content-Type:text/html;charset=UTF8");

include 'functions/functions.php';

$db = new Db(DB);

$db->view_cat( $db->get_cat());

