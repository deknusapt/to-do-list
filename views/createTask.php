<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection configuration
require '../includes/dbConnection.php';

// Call the header template
require '../templates/header.php';
?>

<main>
        <form action="" method="post">
            <div class="create-form">
                <input type="text"
                       name="task-name"
                       class="task-title-form"
                       placeholder="Task name"
                       autocomplete="off">
                <textarea
                        name="task-desc"
                        class="task-desc-form"
                        autocomplete="off"
                        placeholder="Write your description here..."></textarea>
            </div>
            <div class="create-button-form">
                <button type="submit" class="save-btn">Save Task</button>
                <button type="button" class="discard-btn">Discard</button>
            </div>
        </form>
</main>

<?php
// Call the footer template
require '../templates/footer.php'
?>
