<?php
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit();
}

$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    echo "<div class='text-center py-16 text-red-600 font-bold'>Your cart is empty.</div>";
    require_once '../includes/footer.php';
    exit();
}

// Enroll user
$user_id = $_SESSION['user']['id'];
foreach ($cart as $id => $course) {
    $check = $pdo->prepare("SELECT * FROM enrollments WHERE user_id = ? AND course_id = ?");
    $check->execute([$user_id, $id]);
    if (!$check->fetch()) {
        $pdo->prepare("INSERT INTO enrollments (user_id, course_id) VALUES (?, ?)")->execute([$user_id, $id]);
    }
}

// Clear cart
unset($_SESSION['cart']);
?>

<section class="py-16 bg-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-green-700 mb-4">🎉 Enrollment Successful!</h1>
        <p class="text-gray-700 mb-6">You have been enrolled in all the selected courses.</p>
        <a href="dashboard.php" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Go to Dashboard</a>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>