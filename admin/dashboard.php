<?php
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

// Ensure only admins can access
if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 2) {
    header("Location: ../auth/login.php");
    exit();
}
?>

<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-blue-700 mb-8">Admin Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <a href="manage_users.php" class="bg-blue-100 p-6 rounded shadow hover:bg-blue-200 transition">
                <h2 class="text-xl font-semibold text-blue-700">Manage Users</h2>
            </a>
            <a href="manage_courses.php" class="bg-green-100 p-6 rounded shadow hover:bg-green-200 transition">
                <h2 class="text-xl font-semibold text-green-700">Manage Subjects</h2>
            </a>
            <a href="manage_admins.php" class="bg-yellow-100 p-6 rounded shadow hover:bg-yellow-200 transition">
                <h2 class="text-xl font-semibold text-yellow-700">Manage Admins</h2>
            </a>
        </div>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
