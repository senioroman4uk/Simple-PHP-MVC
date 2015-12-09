<script type="text/javascript">
    $(document).ready(function () {
        var pager = new Pager();
        $(document).on('click', 'a', pager.linkClickHandler);
    })
</script>

<?php
/**
 * Created by PhpStorm.
 * User: Vladyslav
 * Date: 25.11.2015
 * Time: 23:18
 */
echo $content;
?>