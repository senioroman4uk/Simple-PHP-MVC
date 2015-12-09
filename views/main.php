<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!--    <link rel="stylesheet" type="text/css" href="/assets/css/css.css">-->
    <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/js/pager.js"></script>
    <title>News</title>
</head>
<body style="width: 100%; height: 768px;  background: url(/img/111.jpg); background-size: cover;">
<table border="0" cellpadding="0" cellspacing="0" align="center">
    <?php include('header.php') ?>

    <tr>
        <td id="content" width="580" height="320" bgcolor="#4F4F4F" valign="top">
            <?php include("$viewName.php") ?>
        </td>
    </tr>

    <?php include("footer.php") ?>
</table>
</body>
</html>