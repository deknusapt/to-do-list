<?php
require 'includes/dbConnection.php';

// Memanggil template untuk header
require 'templates/header.php';

?>

<main>
    <div class="search-form">
        <form action="" method="post">
            <input type="text" name="keyword" placeholder="Find your task" autocomplete="off" autofocus>
            <button type="submit" name="search">Find</button>
        </form>
    </div>

    <div class="floating-button">
        <button>Add Task</button>
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
    require 'templates/footer.php'
?>
