<?php 
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="TutorPro is a modern online education platform offering expert-led courses in AI, Mathematics, and English. Enroll today.">
  <meta name="keywords" content="TutorPro, Online Courses, AI Learning, Math Basics, English Communication, Education Platform">
  <meta name="author" content="TutorPro Team">
  <title>Welcome to TutorPro | Learn AI, Math & English</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<?php 
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>

<!-- Contact Us Section -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-4xl font-bold text-blue-700 text-center mb-6">Contact Us</h1>
        <p class="text-center text-gray-700 mb-10">Have questions or feedback? Fill out the form below and we'll get back to you shortly.</p>

        <form action="contact.php" method="POST" class="bg-gray-50 shadow-md rounded px-8 py-6">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'] ?? '';
                $email = $_POST['email'] ?? '';
                $subject = $_POST['subject'] ?? '';
                $message = $_POST['message'] ?? '';

                if ($name && $email && $subject && $message) {
                    $stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$name, $email, $subject, $message]);
                    echo '<div class="text-green-600 font-semibold mb-4">Message sent successfully!</div>';
                } else {
                    echo '<div class="text-red-600 font-semibold mb-4">Please fill out all fields.</div>';
                }
            }
            ?>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="name">Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="w-full px-4 py-2 border rounded" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2" for="message">Message</label>
                <textarea name="message" id="message" rows="5" class="w-full px-4 py-2 border rounded" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Send Message</button>
            </div>
        </form>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
</body>
</html>
