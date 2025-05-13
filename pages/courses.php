<?php
require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/navbar.php';

$courses = [
  ['id' => 1, 'title' => 'Intro to AI', 'desc' => 'Learn the fundamentals of Artificial Intelligence.', 'img' => '../assets/images/ai.jpg'],
  ['id' => 2, 'title' => 'Data Structures', 'desc' => 'Organize and access data efficiently.', 'img' => '../assets/images/dsa.jpg'],
  ['id' => 3, 'title' => 'English Basics', 'desc' => 'Improve communication and fluency.', 'img' => '../assets/images/english.jpg'],
  ['id' => 4, 'title' => 'Mathematics 101', 'desc' => 'From arithmetic to algebra.', 'img' => '../assets/images/math.jpg'],
  ['id' => 5, 'title' => 'Web Development', 'desc' => 'Build websites with HTML, CSS, JS.', 'img' => '../assets/images/web.jpg'],
  ['id' => 6, 'title' => 'Cybersecurity Basics', 'desc' => 'Understand threats and security principles.', 'img' => '../assets/images/security.jpg'],
];
?>

<section class="py-5 bg-light">
  <div class="container">
    <h1 class="text-center fw-bold mb-4">All Courses</h1>

    <!-- Search bar -->
    <div class="row justify-content-center mb-4">
      <div class="col-md-6">
        <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="Search courses...">
      </div>
    </div>

    <!-- Course cards -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="courseContainer">
      <?php foreach ($courses as $c): ?>
        <div class="col course-card">
          <div class="card h-100 shadow-sm">
            <a href="course.php?id=<?= $c['id'] ?>">
              <img src="<?= $c['img'] ?>" class="card-img-top img-fluid" style="height: 200px; object-fit: cover;" alt="<?= $c['title'] ?>">
            </a>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= $c['title'] ?></h5>
              <p class="card-text text-muted"><?= $c['desc'] ?></p>
              <a href="course.php?id=<?= $c['id'] ?>" class="btn btn-primary mt-auto">View Course</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script>
  // Live Search Filtering
  const searchInput = document.getElementById('searchInput');
  const cards = document.querySelectorAll('.course-card');

  searchInput.addEventListener('input', function () {
    const query = this.value.toLowerCase();

    cards.forEach(card => {
      const title = card.querySelector('.card-title').textContent.toLowerCase();
      const desc = card.querySelector('.card-text').textContent.toLowerCase();
      if (title.includes(query) || desc.includes(query)) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  });
</script>

<?php require_once '../includes/footer.php'; ?>