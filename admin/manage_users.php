<?php
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 2) {
    header("Location: ../auth/login.php");
    exit();
}

// Delete user if requested
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $pdo->prepare("DELETE FROM users WHERE id = ? AND role_id = 1")->execute([$id]);
    header("Location: manage_users.php");
    exit();
}

$users = $pdo->query("SELECT * FROM users WHERE role_id = 1")->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="py-10 px-4 max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-blue-700">Manage Students</h1>

    <table class="min-w-full bg-white border rounded shadow text-left">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="p-3">ID</th>
                <th class="p-3">Name</th>
                <th class="p-3">Email</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?= $user['id'] ?></td>
                <td class="p-3"><?= htmlspecialchars($user['name']) ?></td>
                <td class="p-3"><?= htmlspecialchars($user['email']) ?></td>
                <td class="p-3">
                    <a href="?delete=<?= $user['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Delete this user?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php require_once '../includes/footer.php'; ?>
