<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <!--    <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/dist/css/bootstrap.css">-->
    <script type="text/javascript" src="/assets/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/assets/js/modernizr.js"></script>
    <script type="text/javascript" src="/assets/js/pager.js"></script>
    <script type="text/javascript" src="/assets/js/mycarousel.js"></script>
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
    <style>
        .carousel {
            width: 100%;
            position: relative;
            padding-top:0;
            height: 500px;
            overflow: hidden;
        }

        .inner {
            width: 100%;
            height: 50%;
            position: absolute;
            top: 0;
            left: 0;
        }

        /**
         * ==========================
         * Animation styles
         *
         * Notes:
         * 1. We use z-index to position active slides in-front
         * of non-active slides
         * 2. We set right:0 and left:0 on .slide to provide us with
         * a default positioning on both sides of the slide. This allows
         * us to trigger JS and CSS3 animations easily
         *
         */
        .slide {
            /*width: 100%;*/
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1;
            opacity: 0;
            height: 500px;
        }

        .slide img {
            display: block;
            margin: 0 auto;
            z-index: 5;
        }

        .carousel-caption {
            position: absolute;
            left: 15%;
            right: 15%;
            bottom: 20px;
            z-index: 10;
            padding-top: 20px;
            padding-bottom: 20px;
            color: #fff;
            text-align: center;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
        }

        .slide.active,
        .slide.left,
        .slide.right {
            z-index: 2;
            opacity: 1;
        }

        /**
         * ==========================
         * JS animation styles
         *
         * We use jQuery.animate to control the sliding animations
         * when CSS3 animations are not available. In order for
         * the next slide to slide in from the right, we need
         * to change the left:0 property of the slide to left:auto
         *
         */

        .js-reset-left {
            left: auto
        }

        /**
         * ==========================
         * CSS animation styles
         *
         * .slide.left and .slide.right set-up
         * the to-be-animated slide so that it can slide
         * into view. For example, a slide that is about
         * to slide in from the right will:
         * 1. Be positioned to the right of the viewport (right:-100%)
         * 2. Slide in when the style is superseded with a more specific style (right:0%)
         *
         */
        .slide.left {
            left: -100%;
            right: 0;
        }

        .slide.right {
            right: -100%;
            left: auto;
        }

        .transition .slide.left {
            left: 0
        }

        .transition .slide.right {
            right: 0
        }

        /**
         * The following classes slide the previously active
         * slide out of view before positioning behind the
         * currently active slide
         *
         */
        .transition .slide.shift-right {
            right: 100%;
            left: auto
        }

        .transition .slide.shift-left {
            left: 100%;
            right: auto
        }

        /**
         * This sets the CSS properties that will animate. We set the
         * transition-duration property dynamically via JS.
         * We use the browser's default transition-timing-function
         * for simplicity's sake
         *
         * It is important to note that we are using CodePen's inbuilt
         * CSS3 property prefixer. For your own projects, you will need
         * to prefix the transition and transform properties here to ensure
         * reliable support across browsers
         *
         */
        .transition .slide {
            transition-property: right, left, margin;
        }

        /**
         * ==========================
         * Indicators
         *
         */
        .indicators {
            width: 100%;
            position: absolute;
            bottom: 0;
            z-index: 4;
            padding: 0;
            text-align: center;
        }

        .indicators li {
            width: 13px;
            height: 13px;
            display: inline-block;
            margin: 5px;
            background: #fff;
            list-style-type: none;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s ease-out;
        }

        .indicators li.active {
            background: #93278f
        }

        .indicators li:hover {
            background-color: #2b2b2b
        }

        /**
         * ==========================
         * Arrows
         *
         */
        .arrow {
            width: 20px;
            height: 20px;
            position: absolute;
            top: 50%;
            z-index: 5;
            border-top: 3px solid #fff;
            border-right: 3px solid #fff;
            cursor: pointer;
            transition: border-color 0.3s ease-out;
        }

        .arrow:hover {
            border-color: #93278f
        }

        .arrow-left {
            left: 20px;
            transform: rotate(225deg);
        }

        .arrow-right {
            right: 20px;
            transform: rotate(45deg);
        }
    </style>
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