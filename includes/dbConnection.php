<?php
// To activate the debugging and error reporting feature
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load the required files
require 'functions.php';

// Load variables from .env file, with try-catch
try {
    $envVariables = loadEnv('.env');
} catch (Exception $e) {
    echo "Error to load the configuration: " . $e -> getMessage();
    die ("Apps terminated.");
}

// Variables to store the environment value
$hostname = $envVariables['DB_HOST'] ?? 'localhost';
$username = $envVariables['DB_USERNAME'] ?? 'root';
$password = $envVariables['DB_PASSWORD'] ?? ' ';
$dbname = $envVariables['DB_NAME'] ?? 'database_name';

// Connection into database
$conn = mysqli_connect("$hostname", "$username", "$password", "$dbname");
// Condition to validate if the connection was successful created
if (!$conn){
    die("Connection failed! " . mysqli_connect_error());
}