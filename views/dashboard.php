<!DOCTYPE html>
<html lang="ru">
<head>	<meta charset="utf-8">
    <!--STYLES-->
    <link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.css">
    <style>
        .width-200 {
            width: 200px;
        }
    </style>
    <!--STYLES END-->

    <script src="/assets/js/jquery-1.11.3.min.js"></script>
    <script src="/bootstrap/dist/js/bootstrap.js"></script>
    <script src="/assets/js/pager.js"></script>
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <div class="row delimiter">
            <div class="col-md-6">
                <h4 class="uppercase">Dashboard</h4>
            </div>
            <div class="col-sm-6 hidden-xs text-right">
                <ol class="breadcrumb">
                    <li>
                        <a href="/index.html">Home</a>
                    </li>
                    <li>Dashboard</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <!-- Left column -->
                <a href="/dashboard"><strong><i class="glyphicon glyphicon-wrench"></i> Tools</strong></a>
                <hr>

                <ul class="nav nav-stacked">
                    <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">Settings <i class="glyphicon glyphicon-chevron-down"></i></a>
                        <ul class="nav nav-stacked collapse in" id="userMenu">
                            <li><a href="/dashboard/messages"><i class="glyphicon glyphicon-envelope"></i> Messages</a></li>
                            <li><a href="/dashboard/pages"><i class="glyphicon glyphicon-bookmark"></i> Pages</a></li>
                            <li><a href="/dashboard/slides"><i class=""></i> Slides</a></li>
                            <!--<li><a href="#"><i class="glyphicon glyphicon-user"></i> Users</a></li>-->
                        </ul>
                    </li>
                </ul>

            </div>
            <div class="col-md-9">
                <?php echo self::getFlash('message') ?>
                <?php include(PROJECT_DIR . "/views/$viewName.php")?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
