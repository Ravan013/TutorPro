<?php
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 2) {
    header("Location: ../auth/login.php");
    exit();
}
?>

<section class="py-16 bg-white text-center">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-blue-700 mb-6">Site Settings</h1>
        <p class="text-gray-600">This section is under development. You'll soon be able to update global settings from here.</p>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
