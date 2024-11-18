<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection & functions
require '../includes/dbConnection.php';
require_once '../includes/functions.php';

// Take data ID with $_GET method
$taskId = $_GET["id"];

// Condition to show whether the deletion succeed or failure
if (deleteTask($taskId) > 0)
{
    echo " 
            <script>
                alert('Task successfully deleted!');
                document.location.href = '../index.php';
            </script>
        ";
} else {
    echo "
           <script>
                alert('Failed to delete task!');
           </script>     
        ";
}

