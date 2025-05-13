<?php
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 2) {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $img = $_POST['image_path'];

    $pdo->prepare("INSERT INTO courses (title, description, image_path) VALUES (?, ?, ?)")
        ->execute([$title, $desc, $img]);
    header("Location: manage_courses.php");
    exit();
}

if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM courses WHERE id = ?")->execute([$_GET['delete']]);
    header("Location: manage_courses.php");
    exit();
}

$courses = $pdo->query("SELECT * FROM courses")->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="py-10 px-4 max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-green-700">Manage Courses</h1>

    <form method="POST" class="mb-8 bg-gray-50 p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Add New Course</h2>
        <input name="title" placeholder="Course Title" required class="w-full p-2 mb-2 border rounded">
        <input name="image_path" placeholder="Image Path (e.g. assets/images/math.jpg)" required class="w-full p-2 mb-2 border rounded">
        <textarea name="description" placeholder="Course Description" required class="w-full p-2 mb-4 border rounded"></textarea>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Add Course</button>
    </form>

    <table class="min-w-full bg-white border rounded shadow text-left">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="p-3">Title</th>
                <th class="p-3">Image</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?= htmlspecialchars($course['title']) ?></td>
                <td class="p-3"><?= $course['image_path'] ?></td>
                <td class="p-3">
                    <a href="?delete=<?= $course['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Delete this course?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php require_once '../includes/footer.php'; ?>
