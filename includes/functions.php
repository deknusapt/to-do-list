<?php
// Function to read .env file
/**
 * @throws Exception
 */
function loadEnv($filePath): array
{
    // Condition to check the file existence
    if (!file_exists($filePath)) {
        throw new Exception("File .env cannot be found!");
    }

    // Read the .env file on every single lines
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $envVariables = [];

    // Proceed every lines inside .env file
    foreach ($lines as $line) {
        // Condition to ignore comment lines
        if (str_starts_with(trim($line), '#')) {
            continue;
        }

        // Split the key and value based on '=' sign
        list($key, $value) = explode('=', $line, 2);

        // Stored key and it values into an array
        $envVariables[trim($key)] = trim($value);
    }

    // Returns an array containing environment variables
    return $envVariables;
}



// Query functions to fetch DB data into array
function queryData($querySyntax): array
{
    global $conn;

    $result = mysqli_query($conn, $querySyntax);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }
    return $rows;
}


// Function to create new task and inserting to database
function addTask($newTask): int|string
{
    global $conn;

    $task_name = htmlspecialchars($newTask['task-name']);
    $task_desc = htmlspecialchars($newTask['task-desc']);

    $newTaskQuery = "INSERT INTO task(task_name, description) VALUES('$task_name','$task_desc')";

    try {
        mysqli_query($conn, $newTaskQuery);
        return mysqli_affected_rows($conn);
    } catch (Exception $e){
        return -1;
    }
}


// Function to update available task on database
function updateTask($newDataTask): int|string
{
    global $conn, $id;

    $task_name = htmlspecialchars($newDataTask['task-name']);
    $task_desc = htmlspecialchars($newDataTask['task-desc']);

    $newTaskQuery = "UPDATE task SET 
                    task_name = '$task_name', 
                    description = '$task_desc'
                    WHERE id = $id";

    try {
        mysqli_query($conn, $newTaskQuery);
        return mysqli_affected_rows($conn);
    } catch (Exception $e){
        return -1;
    }
}


// Functions for updating task status into 'completed'
function setTaskStatus($taskId): int|string
{
    global $conn;

    if (is_array($taskId)) {
        $id = intval($taskId["id"]);
    } else {
        $id = intval($taskId);
    }

    $setStatusTaskQuery = "UPDATE task SET status = 'completed' WHERE id = $id";

    try {
        mysqli_query($conn, $setStatusTaskQuery);
        return mysqli_affected_rows($conn);
    } catch (Exception $e){
        return -1;
    }
}


// Function for removing task from database
function deleteTask($taskId): int|string
{
    global $conn;

    if (is_array($taskId)) {
        $id = intval($taskId["id"]);
    } else {
        $id = intval($taskId);
    }

    mysqli_query($conn, "DELETE FROM task WHERE id = $id");
    return mysqli_affected_rows($conn);
}


// Function for task search
function searchTask($keyword): array
{
    $searchQuery = "SELECT * FROM task WHERE task_name LIKE '%$keyword%'";

    return queryData($searchQuery);
}







