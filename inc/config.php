<?php
session_start();
// For Database Connection: You can change this to fit your database location, username, password and database name
$conn = mysqli_connect("localhost", "root", "Skkelewu0098*", "bincom_test");

if (!$conn) {
	die("Error connecting to database: " . mysqli_connect_error());
}
// Global Constants: You can change this too to fit your needs
// define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"] . "/");
// define('BASE_URL', '/');

define('ROOT_PATH', realpath(dirname("http://localhost/bincom_test/")));
define('BASE_URL', 'http://localhost/bincom_test/');
