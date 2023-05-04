<html lang="en" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="generator" content="Hugo 0.111.3">
        <meta name="theme-color" content="#712cf9">

        <title><?php echo $pageTitle; ?></title>

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="icon" href="/assets/img/favicons/favicon.ico">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="d-flex flex-column h-100">
        
        <!--  navbar  -->
        <?php include APP_ROOT.'/views/layouts/navbar.php' ?>

        <?php include $content ?>

        <!--  footer  -->
        <?php include APP_ROOT.'/views/layouts/footer.php' ?>

        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/js/style.js"></script>
        <script src="assets/js/forms.js"></script>
    </body>
</html>