<?php
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role_id'] != 2) {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $pdo->prepare("INSERT INTO users (name, email, password, role_id) VALUES (?, ?, ?, 2)")
        ->execute([$name, $email, $password]);
    header("Location: manage_admins.php");
    exit();
}

if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM users WHERE id = ? AND role_id = 2")->execute([$_GET['delete']]);
    header("Location: manage_admins.php");
    exit();
}

$admins = $pdo->query("SELECT * FROM users WHERE role_id = 2")->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="py-10 px-4 max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-yellow-700">Manage Admins</h1>

    <form method="POST" class="mb-8 bg-gray-50 p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-2">Add New Admin</h2>
        <input name="name" placeholder="Admin Name" required class="w-full p-2 mb-2 border rounded">
        <input name="email" placeholder="Email" required class="w-full p-2 mb-2 border rounded">
        <input name="password" type="password" placeholder="Password" required class="w-full p-2 mb-4 border rounded">
        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded">Add Admin</button>
    </form>

    <table class="min-w-full bg-white border rounded shadow text-left">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="p-3">Name</th>
                <th class="p-3">Email</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin): ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3"><?= htmlspecialchars($admin['name']) ?></td>
                <td class="p-3"><?= htmlspecialchars($admin['email']) ?></td>
                <td class="p-3">
                    <a href="?delete=<?= $admin['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Delete this admin?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php require_once '../includes/footer.php'; ?>
