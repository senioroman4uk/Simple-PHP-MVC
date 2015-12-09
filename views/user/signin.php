<td width="580" height="320" bgcolor="#4F4F4F" valign="top">

    <?php if (!empty($errors))
        foreach ($errors as $key => $message) {
            echo $key . ':' . $message;
        }
    ?>
</td>