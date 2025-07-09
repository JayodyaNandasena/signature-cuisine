<?php
$page_css = isset($page_css) ? $page_css : 'default';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Signature Cuisine</title>
    <meta name="description" content="Delicious food and restaurant services in your city.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/signature-cuisine/assets/css/animate/animate.css">
    <link rel="stylesheet" href="/signature-cuisine/assets/css/plugins.css">
    <link rel="stylesheet" href="/signature-cuisine/assets/css/responsive.css">
    <link rel="stylesheet" href="/signature-cuisine/assets/css/base.css">
    <link rel="stylesheet" href="/signature-cuisine/assets/css/partials/form.css">
    <link rel="stylesheet" href="/signature-cuisine/assets/css/partials/nav.css">
    <link rel="stylesheet" href="/signature-cuisine/assets/css/partials/footer.css">

    <?php if (isset($page_css) && $page_css === 'form'): ?>
    <link rel="stylesheet" href="/signature-cuisine/assets/css/partials/form-page.css">
    <?php elseif ($page_css === 'details'): ?>
    <link rel="stylesheet" href="/signature-cuisine/assets/css/partials/details-page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
          crossorigin="anonymous"/>
    <?php else: ?>
        <!-- Default CSS -->
    <link rel="stylesheet" href="/signature-cuisine/assets/css/style.css">
    <?php endif; ?>

    <link rel="icon" href="/signature-cuisine/assets/images/favicon.ico" type="image/x-icon">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/signature-cuisine/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js" defer></script>
</head>

<body>
<div class="preloader" aria-hidden="true">
    <div class="loaded" aria-label="Loading">&nbsp;</div>
</div>
