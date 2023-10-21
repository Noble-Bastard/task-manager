<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Your App Title</title>
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Bootstrap JS from CDN (Optional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    /* Adjust the size of the previous and next arrow buttons */
    .page-item.prev .page-link,
    .page-item.next .page-link {
        font-size: 18px; /* Adjust the font size to your preference */
    }

</style>
    <!-- Add your styles and scripts here -->
</head>
<body>
<header>
    <!-- Your header content -->
</header>

<div class="container">
    @yield('content') <!-- This is a placeholder for page content -->
</div>

<footer>
    <!-- Your footer content -->
</footer>
</body>
</html>
