<?php
$serverName = "Elax\SQLEXPRESS";
$connectionOptions = [
    "Database" => "LIB_test_v2",
    "Uid" => "",
    "PWD" => ""
];
$conn = sqlsrv_connect($serverName, $connectionOptions);


?>