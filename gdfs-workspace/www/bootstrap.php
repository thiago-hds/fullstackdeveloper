<?php 

require_once('utils.php');
require_once('repository.php');

$db = createDbConnection();
$repository = new Repository($db);