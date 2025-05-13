<?php 
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';
?>

<!-- Hero Section -->
<section class="bg-primary text-white py-5">
  <div class="container text-center">
    <h1 class="display-4 fw-bold">Welcome to TutorPro</h1>
    <p class="lead">Learn smarter. Grow faster. Explore expert-curated courses.</p>
    <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mt-4">
      <a href="courses.php" class="btn btn-success btn-lg">Explore Courses</a>
      <a href="contact.php" class="btn btn-warning btn-lg text-dark">Contact Us</a>
      <a href="/TutorPro/auth/register.php" class="btn btn-danger btn-lg">Register Now</a>
    </div>
  </div>
</section>

<!-- Courses Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold">Popular Courses</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">

      <?php
      $courses = [
        ['id' => 1, 'title' => 'Intro to AI', 'desc' => 'Learn the fundamentals of Artificial Intelligence.', 'img' => '../assets/images/ai.jpg'],
        ['id' => 2, 'title' => 'Data Structures', 'desc' => 'Organize and access data efficiently.', 'img' => '../assets/images/dsa.jpg'],
        ['id' => 3, 'title' => 'English Basics', 'desc' => 'Improve communication and fluency.', 'img' => '../assets/images/english.jpg'],
        ['id' => 4, 'title' => 'Mathematics 101', 'desc' => 'From arithmetic to algebra.', 'img' => '../assets/images/math.jpg']
      ];

      foreach ($courses as $c): ?>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <a href="course.php?id=<?= $c['id'] ?>">
              <img src="<?= $c['img'] ?>" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="<?= $c['title'] ?>">
            </a>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= $c['title'] ?></h5>
              <p class="card-text text-muted"><?= $c['desc'] ?></p>
              <a href="course.php?id=<?= $c['id'] ?>" class="btn btn-outline-primary mt-auto">View Course</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- Reviews Section -->
<section class="py-5 bg-white">
  <div class="container">
    <h2 class="text-center fw-bold mb-5">What Our Students Say</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 text-center">

      <?php
      $reviews = [
        ['img' => '../assets/images/student1.jpg', 'name' => 'Maya Sharma', 'quote' => 'TutorPro helped me get my dream internship in just 3 months!'],
        ['img' => '../assets/images/student2.jpg', 'name' => 'Liam Tanaka', 'quote' => 'The AI course was top-notch. I finally understand machine learning!'],
        ['img' => '../assets/images/student3.jpg', 'name' => 'Zara Ahmed', 'quote' => 'Friendly instructors and beautifully structured lessons. Loved it!']
      ];

      foreach ($reviews as $r): ?>
        <div class="col">
          <div class="card border-0 shadow-sm h-100 p-3">
            <img src="<?= $r['img'] ?>" class="rounded-circle mx-auto mb-3" alt="<?= $r['name'] ?>" style="width: 80px; height: 80px; object-fit: cover;">
            <h6 class="fw-bold"><?= $r['name'] ?></h6>
            <p class="text-muted fst-italic">"<?= $r['quote'] ?>"</p>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<!-- Call to Action -->
<section class="bg-dark text-white py-5 text-center">
  <div class="container">
    <h2 class="mb-3">Ready to start your learning journey?</h2>
    <a href="/TutorPro/auth/register.php" class="btn btn-light btn-lg">Sign Up Now</a>
  </div>
</section>

<?php require_once '../includes/footer.php'; ?>