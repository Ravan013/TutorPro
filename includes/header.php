<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TutorPro</title>
    <!-- Bootstrap 5 CDN -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="/TutorPro/assets/css/output.css" rel="stylesheet" />

    <!-- Custom Styles (optional) -->
    <link href="/TutorPro/assets/css/style.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">
