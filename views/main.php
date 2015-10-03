<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!--    <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/dist/css/bootstrap.css">-->
    <!--    <script type="text/javascript" src="/assets/vendor/jquery/dist/jquery.js"></script>-->
    <!--    <script type="text/javascript" src="/assets/vendor/bootstrap/dist/js/bootstrap.js"></script>-->
    <link rel="stylesheet" type="text/css" href="/assets/css/css.css">
    <title>News</title>
</head>
<body>
<div class="container">
    <?php include('header.php') ?>
</div>
<div id="content" class="middle"><?php include("/views/$viewName.php") ?></div>
<div id="right" class="middle">
    <div class="container">
        <?php include('footer.php') ?>
    </div>
</div>
</body>
</html>