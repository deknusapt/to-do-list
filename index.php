<?php
require 'includes/dbConnection.php';

// Memanggil template untuk header
require 'templates/header.php';

?>

<h1>To-Do List Now!</h1>

<main>
    <form action="" method="post">
        <input type="text" name="keyword" placeholder="Find your task" autocomplete="off" autofocus>
        <button type="submit" name="search">Find</button>
    </form>

    <a href="views/create.php">Add your task</a>

</main>
