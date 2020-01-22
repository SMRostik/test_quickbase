<?php
require_once('libs/quickbase/qbFunc.php');

ini_set('display_errors',1);
error_reporting(E_ALL);

$update = $qb->DoQuery("bp9hkyvvu", "{'6'.EX.'Product1'}");
echo("<pre>");
print_r($update);
echo("</pre>");