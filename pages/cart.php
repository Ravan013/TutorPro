<?php
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

$cart = $_SESSION['cart'] ?? [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    if (!isset($_SESSION['user'])) {
        header("Location: ../auth/login.php");
        exit();
    } else {
        header("Location: checkout.php");
        exit();
    }
}
?>

<section class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6 text-blue-700">Your Cart</h1>

        <?php if (empty($cart)): ?>
            <p class="text-gray-600">Your cart is empty.</p>
        <?php else: ?>
            <ul class="mb-6">
                <?php foreach ($cart as $item): ?>
                    <li class="mb-3 p-4 border rounded shadow">
                        <h3 class="font-semibold text-xl"><?= htmlspecialchars($item['title']) ?></h3>
                        <p class="text-sm text-gray-600"><?= htmlspecialchars($item['description']) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
            <form method="POST">
                <button name="checkout" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Proceed to Checkout</button>
            </form>
        <?php endif; ?>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>