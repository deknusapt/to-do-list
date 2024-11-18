<?php
// Database connection & functions
require 'includes/dbConnection.php';
require_once 'includes/functions.php';

// Call the header template
require 'templates/header.php';

// Collect all queried data from queryData()
$allData = queryData("SELECT * FROM task WHERE status = 'pending'");

// Search condition to check inputted keywords
if (isset($_POST["search"]))
{
    $allData = searchTask($_POST["keyword"]);
}

// Condition for completed task by ID
if (isset($_POST["complete_task_btn"]))
{
    $taskId = $_POST['id'];
    $result = setTaskStatus($taskId);

    if ($result > 0)
    {
        echo "
            <script>
                alert('Task completed!');
                document.location.href = 'index.php';
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

<header>
    <h1>

        To-Do List
        <span>Apps</span>
    </h1>
</header>
<main>
    <div class="search-form">
        <form action="" method="post">
            <input
                    class="search-bar"
                    type="text"
                    name="keyword"
                    placeholder="Find your task"
                    autocomplete="off" autofocus>
            <button type="submit" name="search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>

    <div class="floating-button">
        <button onclick="document.location='./views/createTask.php'">
            <i class="fa-solid fa-plus"></i> Add Task
        </button>
    </div>

    <table class="todo-table">
        <?php foreach ($allData as $row): ?>
        <tr>
            <td class="todo-row-table">
                <a href="./views/taskDetails.php?id=<?= $row["id"]; ?>" class="todo-link-table"><?= $row["task_name"]; ?></a>
            </td>
            <td class="todo-button-table">
                <button onclick="window.location.href='views/editTask.php?id=<?= $row["id"]; ?>'" class="todo-btn-edit">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                    <button name="complete_task_btn" class="todo-btn-complete">
                        Complete
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php
    // Call the footer template
    require 'templates/footer.php'
?>
