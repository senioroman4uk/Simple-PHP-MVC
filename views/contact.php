<!--<td width="580" height="320" bgcolor="#4F4F4F" valign="top">-->
<script type="text/javascript">
    $(document).ready(function () {
        var pager = new Pager();
        $(document).on('click', 'a', pager.linkClickHandler);
    })
</script>
<table border="0" cellpadding="15" cellspacing="50" align="center">
    <tr>
        <td align="centr">
            <font color="#ff0000">
                <h1>Contacts</h1>
            </font>

            <form method="post" action="/contact">
                Name:<br/>
                <input type="text" name="name" value="<?php echo isset($user) ? $user->getName() : '' ?>"/><br/><br/>
                Mail:<br/>
                <input type="email" name="email" value="<?php echo isset($user) ? $user->getEmail() : '' ?>"/><br/><br/>
                Text:<br/>
                <input type="text" name="message" value=""/><br/><br/>
                <input type="submit" value="submit"/>
                <br/><br/>
                <?php if (!empty($errors))
                    foreach ($errors as $name => $message)
                        echo "$name : $message<br>";
                else if (!empty($name))
                    echo "We will see you soon, $name";
                ?>
        </td>
    </tr>
</table>
<!--</td>-->
