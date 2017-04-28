<?php if (!isset($_SESSION)): ?>
    <?php session_start(); ?>
<?php endif; ?>

<?php if (!isset($_SESSION['username'])): ?>
    <?php header("Location: ../index.php"); ?>
<?php endif; ?>
