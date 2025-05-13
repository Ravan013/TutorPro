<?php
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

// Fake course DB – replace with real query later
$courses = [
  1 => ['title' => 'Intro to AI', 'desc' => 'A complete beginner-friendly introduction to Artificial Intelligence, Machine Learning, and real-world applications.', 'img' => '../assets/images/ai.jpg'],
  2 => ['title' => 'Data Structures', 'desc' => 'Learn to organize data efficiently using arrays, linked lists, trees, and graphs with real coding examples.', 'img' => '../assets/images/dsa.jpg'],
  3 => ['title' => 'English Basics', 'desc' => 'Improve your English language skills for daily life and career success.', 'img' => '../assets/images/english.jpg'],
  4 => ['title' => 'Mathematics 101', 'desc' => 'Master arithmetic, algebra, and basic problem-solving skills.', 'img' => '../assets/images/math.jpg'],
  5 => ['title' => 'Web Development', 'desc' => 'Build beautiful websites using HTML, CSS, JavaScript, and Bootstrap.', 'img' => '../assets/images/web.jpg'],
  6 => ['title' => 'Cybersecurity Basics', 'desc' => 'Understand network threats, ethical hacking, and how to protect data online.', 'img' => '../assets/images/security.jpg'],
];

$id = $_GET['id'] ?? 0;

if (!isset($courses[$id])) {
  echo '<div class="container py-5 text-center"><h2 class="text-danger">Course not found.</h2></div>';
  require_once '../includes/footer.php';
  exit();
}

$course = $courses[$id];
?>

<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-5">
      <!-- Main Content -->
      <div class="col-md-8">
        <img src="<?= $course['img'] ?>" class="img-fluid rounded mb-4" style="height: 300px; width: 100%; object-fit: cover;" alt="<?= $course['title'] ?>">
        <h1 class="fw-bold mb-3"><?= $course['title'] ?></h1>
        <p class="lead"><?= $course['desc'] ?></p>

        <form method="post">
          <?php if (!isset($_SESSION['user'])): ?>
            <a href="/TutorPro/auth/login.php" class="btn btn-success btn-lg mt-4">Login to Enroll</a>
          <?php else: ?>
            <button type="submit" name="enroll" class="btn btn-success btn-lg mt-4">Enroll Now</button>
          <?php endif; ?>
        </form>
      </div>

      <!-- Sidebar Info -->
      <div class="col-md-4">
        <div class="bg-white shadow-sm rounded p-4">
          <h5>Course Details</h5>
          <ul class="list-unstyled mt-3">
            <li><strong>Instructor:</strong> John Doe</li>
            <li><strong>Level:</strong> Beginner</li>
            <li><strong>Duration:</strong> 6 Weeks</li>
            <li><strong>Language:</strong> English</li>
            <li><strong>Certificate:</strong> Yes</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
// Simulate enroll POST (just for UI)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enroll'])) {
  echo "<script>alert('You have been enrolled successfully!'); window.location.href='dashboard.php';</script>";
}
?>

<?php require_once '../includes/footer.php'; ?>
