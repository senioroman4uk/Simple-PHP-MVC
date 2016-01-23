<head>
    <title>FLRaces</title>
    <meta charset="cp1251"/>
</head>
<body style="width: 100%; height: 768px;  background: url(img/111.jpg); background-size: cover;">
<table border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td colspan="2" width="987" height="120"
            background="img/header1.jpg">
        </td>
    </tr>

    <tr>
        <td colspan="2" width="987" height="53"
            background="img/menu1.jpg">
            <table border="0" cellpadding="5" cellspacing="0">
                <tr>
                    <td>
                        <font color="#CFCFCF" size="5">
                            <a href="./">
                                <font color="#CFCFCF" size="5">
                                    HOME
                                </font></a> ||
                            <a href="/index.php?page=about">
                                <font color="#CFCFCF" size="5">
                                    ABOUT
                                </font></a> ||
                            <a href="/index.php?page=events">
                                <font color="#CFCFCF" size="5">
                                    EVENTS
                                </font></a> ||
                            <a href="/index.php?page=calendar">
                                <font color="#CFCFCF" size="5">
                                    CALENDAR
                                </font></a> ||
                            <a href="/index.php?page=media">
                                <font color="#CFCFCF" size="5">
                                    MEDIA
                                </font></a> ||
                            <a href="/index.php?page=partners">
                                <font color="#CFCFCF" size="5">
                                    PARTNERS
                                </font></a> ||
                            <a href="/index.php?page=contact">
                                <font color="#CFCFCF" size="5">
                                    CONTACT
                                </font></a> ||
                            <a href="/index.php?page=store">
                                <font color="#CFCFCF" size="5">
                                    STORE
                                </font></a> ||
                        </font>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="2" width="780" height="33"
            bgcolor="#1C1C1C">
            <table border="0" cellpadding="5" cellspacing="0">
                <tr>
                    <td>
                        <font color="#CFCFCF" size="5">
                            NEWS
                        </font>
                    </td>
                </tr>
            </table>
        </td>
    </tr>


    <?php include('header.php'); ?>
    <?php include('sidebar.php'); ?>
    <?php include('/page/' . $page . '.php'); ?>
<?php include('footer.php'); ?>