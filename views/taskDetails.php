<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection & functions
require '../includes/dbConnection.php';
require_once '../includes/functions.php';

// Call the header template
require '../templates/header.php';

// Take data ID with $_GET method
$id = $_GET["id"];

// A query to get data from database on its own ID
$taskDataById = queryData("SELECT * FROM task WHERE id = $id")[0];

// Validation to check if submit button have pressed
if (isset($_POST["complete_task_btn"]))
{
    $taskId = $_POST['id'];
    $result = setTaskStatus($taskId);

    if ($result > 0)
    {
        echo "
            <script>
                alert('Task completed!');
                document.location.href = '../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to set task status!');
            </script>
        ";
    }
}
?>

<main>
    <form action="" method="post">
        <div class="create-form">
            <input type="hidden" name="id" value="<?= $taskDataById["id"]; ?>">
            <input value="<?= $taskDataById["task_name"]; ?>"
                   class="task-title-form"
                   readonly="">
            <textarea class="task-desc-form" maxlength="300" readonly=""><?= $taskDataById["description"]; ?></textarea>
        </div>
        <div class="create-button-form">
            <button type="submit" name="complete_task_btn" class="save-btn">Complete</button>
            <button type="submit" name="delete_task_btn" class="delete-btn">Delete</button>
        </div>
    </form>
</main>

<?php
// Call the footer template
require '../templates/footer.php'
?>
