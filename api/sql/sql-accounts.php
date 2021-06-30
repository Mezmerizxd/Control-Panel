<?php

$sname= "localhost";
$unmae= "";
$password = "";

$db_name = "control-panel-accounts";

$connect_sql_accounts = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$connect_sql_accounts) {
	echo "Connection failed!";
}
