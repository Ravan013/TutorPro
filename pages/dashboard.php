<?php
require_once '../includes/config.php';
require_once '../includes/auth_check.php'; // Redirects if not logged in
require_once '../includes/header.php';
require_once '../includes/navbar.php';

// Get logged-in user ID from session
$user_id = $_SESSION['user']['id'];

// Fetch user info
$stmt = $pdo->prepare("SELECT name FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch enrolled courses
$stmt = $pdo->prepare("
    SELECT courses.title, courses.description, courses.image_path
    FROM enrollments
    JOIN courses ON enrollments.course_id = courses.id
    WHERE enrollments.user_id = ?
");
$stmt->execute([$user_id]);
$enrolled_courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Dashboard Section -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-blue-700 mb-4">Welcome, <?= htmlspecialchars($user['name']) ?>!</h1>
        <p class="text-gray-700 mb-8">Here's a quick look at your enrolled courses:</p>

        <?php if (count($enrolled_courses) > 0): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($enrolled_courses as $course): ?>
                    <div class="bg-gray-100 rounded-lg overflow-hidden shadow hover:shadow-lg">
                        <img src="../<?= htmlspecialchars($course['image_path']) ?>" alt="<?= htmlspecialchars($course['title']) ?>" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-1"><?= htmlspecialchars($course['title']) ?></h3>
                            <p class="text-sm text-gray-600"><?= htmlspecialchars($course['description']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center text-gray-600 mt-10">
                <p>You haven’t enrolled in any courses yet.</p>
                <a href="courses.php" class="text-blue-600 hover:underline mt-2 inline-block">Browse available courses</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
