<?php
$serverName = "Elax\SQLEXPRESS";
$connectionOptions = [
    "Database" => "LIB_test_v2",
    "Uid" => "",
    "PWD" => ""
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    echo "Không kết nối được";
    die(print_r(sqlsrv_errors(), true));
}
