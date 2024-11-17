<?php
// Database connection configuration
require 'includes/dbConnection.php';

// Call the header template
require 'templates/header.php';
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
            <input type="text" name="keyword" placeholder="Find your task" autocomplete="off" autofocus>
            <button type="submit" name="search">Find</button>
        </form>
    </div>

    <div class="floating-button">
        <button onclick="document.location='/views/createTask.php'">Add Task</button>
    </div>

    <div>
        <table>
            <tr>
                <td id="table-task">Take a bath!</td>
                <td>
                    <button onclick="document.location='...'">Edit</button>
                </td>
                <td>
                    <button onclick="document.location='...'">Complete</button>
                </td>
            </tr>
            <tr>
                <td id="table-task">Take a groceries store todayyyyyyyyyyyyy</td>
                <td>
                    <button onclick="document.location='...'">Edit</button>
                </td>
                <td>
                    <button onclick="document.location='...'">Complete</button>
                </td>
            </tr>
            <tr>
                <td id="table-task">Do some homework!</td>
                <td>
                    <button onclick="document.location='...'">Edit</button>
                </td>
                <td>
                    <button onclick="document.location='...'">Complete</button>
                </td>
            </tr>
        </table>
    </div>
</main>

<?php
    // Call the footer template
    require 'templates/footer.php'
?>
