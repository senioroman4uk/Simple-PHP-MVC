<tr class="login-partial">
    <td colspan="2" width="780" height="33"
        bgcolor="#1C1C1C">
        <table border="0" cellpadding="5" cellspacing="0">
            <tr>
                <td>
                    <font color="#CFCFCF" size="5">
                        NEWS
                    </font>
                </td>
                <td>
                    <?php if (!$user) : ?>
                        <form action="/login" method="post" name="sessionForm">
                            <label>Name</label>
                            <input type="text" name="name">
                            <label>Password</label>
                            <input type="password" name="password">
                            <input type="submit">
                            <a style="color :#CFCFCF" href="/signup.html">Register</a>
                        </form>
                    <?php else:
                        echo 'Hello, ' . $user->getName() . '  <a class="logoutButton" href="/signout.html">Sign out</a>';
                    endif ?>
                </td>
            </tr>
        </table>
    </td>
</tr>