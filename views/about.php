<?php
// Call the header template
require '../templates/header.php';
?>

<main>
    <div class="about-container">
        <h1 class="about-title">
            About project
        </h1>
        <p class="about-desc">
            A simple to-do list app project made with HTML, CSS, JS and PHP (Native).
            This project was intended for <a href="https://github.com/deknusapt" style="color: #0056b3">me</a> to learn basic concepts of CRUD's and how it works on web application.
            Several features have been created to support those core basic concept, like
            <i><strong>viewing, adding, editing,</strong></i> and <i><strong>deleting</strong></i> task while stored on database.
        </p>
        <img class="img-about" src="../assets/img/system-flow.png" width="700" alt="system flow">
    </div>
</main>

<?php
// Call the footer template
require '../templates/footer.php';
?>
