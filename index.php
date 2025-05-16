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

<!-- Hero Section -->
<section class="bg-blue-50 py-16">
    <div class="max-w-6xl mx-auto text-center px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-blue-800 mb-4">Welcome to TutorPro</h1>
        <p class="text-lg md:text-xl text-gray-700 mb-8">
            Unlock your potential with expert-led online courses in AI, Data Structures, Math, and more.
        </p>
        <a href="courses.php" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">
            Browse Courses
        </a>
    </div>
</section>

<!-- Featured Courses -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Popular Courses</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Course Card 1 -->
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow hover:shadow-lg">
                <img src="../assets/images/ai.jpg" alt="AI" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Intro to AI</h3>
                    <p class="text-sm text-gray-600">Learn the basics of Artificial Intelligence.</p>
                </div>
            </div>
            <!-- Course Card 2 -->
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow hover:shadow-lg">
                <img src="../assets/images/dsa.jpg" alt="DSA" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Data Structures</h3>
                    <p class="text-sm text-gray-600">Master common data structures in programming.</p>
                </div>
            </div>
            <!-- Course Card 3 -->
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow hover:shadow-lg">
                <img src="../assets/images/english.jpg" alt="English" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">English for Beginners</h3>
                    <p class="text-sm text-gray-600">Improve your English speaking and writing skills.</p>
                </div>
            </div>
            <!-- Course Card 4 -->
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow hover:shadow-lg">
                <img src="../assets/images/math.jpg" alt="Math" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">Mathematics 101</h3>
                    <p class="text-sm text-gray-600">From basic arithmetic to intermediate algebra.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="bg-blue-600 text-white py-12 mt-12">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-semibold mb-4">Ready to Get Started?</h2>
        <p class="mb-6">Join TutorPro and begin your learning journey today!</p>
        <a href="/TutorPro/auth/register.php" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded hover:bg-gray-100">
            Sign Up Now
        </a>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
</body>
</html>
