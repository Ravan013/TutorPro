<?php
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    if ($name && $email && $password && $confirm) {
        if ($password !== $confirm) {
            $error = "Passwords do not match.";
        } else {
            $hashed = md5($password); // NOTE: For production use bcrypt or password_hash
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            try {
                $stmt->execute([$name, $email, $hashed]);
                $success = true;
            } catch (PDOException $e) {
                $error = "Email already exists or invalid input.";
            }
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<section class="py-16 bg-white">
    <div class="max-w-xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-8">Register</h1>

        <?php if ($success): ?>
            <div class="text-green-600 font-semibold text-center mb-4">Registration successful! <a href="login.php" class="text-blue-600 underline">Login here</a></div>
        <?php elseif ($error): ?>
            <div class="text-red-600 font-semibold text-center mb-4"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="register.php" class="bg-gray-50 p-6 rounded shadow-md">
            <div class="mb-4">
                <label class="block font-semibold mb-1">Full Name</label>
                <input type="text" name="name" required class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border rounded">
            </div>
            <div class="mb-6">
                <label class="block font-semibold mb-1">Confirm Password</label>
                <input type="password" name="confirm" required class="w-full px-4 py-2 border rounded">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Register</button>
        </form>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
