<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <a href="/TutorPro/pages/index.php" class="text-xl font-bold text-blue-600">TutorPro</a>
        <div class="space-x-4">
            <a href="/TutorPro/pages/about.php" class="hover:text-blue-600">About</a>
            <a href="/TutorPro/pages/courses.php" class="hover:text-blue-600">Courses</a>
            <a href="/TutorPro/pages/contact.php" class="hover:text-blue-600">Contact</a>

            <?php if (isset($_SESSION['user'])): ?>
                <a href="/TutorPro/pages/dashboard.php" class="hover:text-blue-600">Dashboard</a>
                <a href="/TutorPro/auth/logout.php" class="text-red-600 hover:underline">Logout</a>
				
            <?php else: ?>
                <a href="/TutorPro/auth/login.php" class="text-blue-600 hover:underline">Login</a>
                <a href="/TutorPro/auth/register.php" class="text-blue-600 hover:underline">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
