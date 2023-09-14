<?php 

/* @author Tim Daniëls
 *
 * Require autoload.php
*/

require_once "classes/autoload.php";
require_once "database/Database.php";

$db = new Database();
$db->connect();