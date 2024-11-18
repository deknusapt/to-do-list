<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection & functions
require '../includes/dbConnection.php';
require_once '../includes/functions.php';

// Call the header template
require '../templates/header.php';

// Validation to check if submit button have pressed
if (isset($_POST["submit"]))
{
    if (addTask($_POST) > 0)
    {
        echo "
            <script>
                alert('Task successfully created!');
                document.location.href = '../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Failed to add task!');
            </script>
        ";
    }
}
?>

<main>
    <form action="" method="post">
        <div class="create-form">
            <input type="text"
                   name="task-name"
                   id="task-name"
                   class="task-title-form"
                   placeholder="Task name"
                   autocomplete="off"
                   required>
            <textarea
                    name="task-desc"
                    id="task-desc"
                    class="task-desc-form"
                    autocomplete="off"
                    maxlength="300"
                    placeholder="Write your description here..."
                    required></textarea>
        </div>
        <div class="create-button-form">
            <button type="submit" name="submit" class="save-btn">Save Task</button>
            <button type="button" name="delete" class="delete-btn"
                    onclick="window.location.href='../index.php'">Discard</button>
        </div>
    </form>
</main>

<?php
// Call the footer template
require '../templates/footer.php'
?>
