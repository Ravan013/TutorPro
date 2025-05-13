<?php
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email && $password) {
        // Check credentials
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->execute([$email, md5($password)]);  // ⚠ Replace md5() with password_hash() in production
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Start session and save user data
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role_id' => $user['role_id']
            ];
            header("Location: ../pages/dashboard.php");
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Please fill in both fields.";
    }
}
?>

<section class="py-16 bg-white">
    <div class="max-w-md mx-auto px-4">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-8">Login</h1>

        <?php if ($error): ?>
            <div class="text-red-600 font-semibold text-center mb-4"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="login.php" class="bg-gray-50 p-6 rounded shadow-md">
            <div class="mb-4">
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-6">
                <label class="block font-semibold mb-1">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
        </form>

        <p class="text-center mt-4 text-sm text-gray-600">
            Don't have an account?
            <a href="register.php" class="text-blue-600 hover:underline">Register here</a>
        </p>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
