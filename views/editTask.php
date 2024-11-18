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
if (isset($_POST["submit"]))
{
    if (updateTask($_POST) > 0)
    {
        echo "
            <script>
                alert('Task successfully edited!');
                document.location.href = '../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to edit task!');
            </script>
        ";
    }
}
?>

<main>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $taskDataById["id"]; ?>">
        <div class="create-form">
            <input type="text"
                   name="task-name"
                   id="task-name"
                   class="task-title-form"
                   autocomplete="off"
                   value="<?= $taskDataById["task_name"]; ?>"
                   required>
            <textarea
                name="task-desc"
                id="task-desc"
                class="task-desc-form"
                autocomplete="off"
                maxlength="300"
                required><?= $taskDataById["description"]; ?></textarea>
        </div>
        <div class="create-button-form">
            <button type="submit" name="submit" class="save-btn">Save Task</button>
            <button type="button" name="delete" class="delete-btn"
                    onclick="window.location.href='deleteTask.php?id=<?= $taskDataById["id"] ?>'">Delete</button>
        </div>
    </form>
</main>

<?php
// Call the footer template
require '../templates/footer.php'
?>