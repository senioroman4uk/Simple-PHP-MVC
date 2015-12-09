<td width="580" height="320" bgcolor="#4F4F4F" valign="top">
    <form action="/signup" method="post">
        <label>Name</label>
        <input name="name" value="">
        <br>
        <label>Email</label>
        <input name="email" type="email" value="<?php echo isset($user) ? $user->getEmail() : '' ?>">
        <br>
        <label>Password</label>
        <input name="password" type="password">
        <br>
        <label>Repeat password</label>
        <input name="repeatPassword" type="password">
        <br>
        <input type="submit">
    </form>
    <?php if (!empty($errors))
        foreach ($errors as $key => $message) {
            echo $key . ':' . $message;
        }
    ?>
</td>