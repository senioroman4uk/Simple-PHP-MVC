<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <!--    <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/dist/css/bootstrap.css">-->
    <script type="text/javascript" src="/assets/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/assets/js/pager.js"></script>
    <script type="text/javascript">
            $(document).ready(function () {
                var pager = new Pager();
                $(document).on('click', 'a:not(.logoutButton)', pager.linkClickHandler);
                $(document).on('click', 'a.logoutButton', pager.logoutHandler);
            })
    </script>
    <!--        <script type="text/javascript" src="/assets/bootstrap/dist/js/bootstrap.js"></script>-->
    <!--    <link rel="stylesheet" type="text/css" href="/assets/bootstrap/dist/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="/assets/css/css.css">
    <title>Fenechka</title>
</head>
<body>
<?php include('header.php') ?>
<div class="clearfix"></div>
<div id="content" class="middle">
    <?php include(PROJECT_DIR. "/views/$viewName.php") ?>
    <div id="hFooter"></div>
</div>
<div id="footer">
    <?php include('footer.php') ?>
</div>
</body>
</html>