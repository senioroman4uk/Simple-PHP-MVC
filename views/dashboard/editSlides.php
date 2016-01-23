<?php echo self::getFlash('message') ?>
    <div class="clearfix"></div>
    <form class="form-inline" method="post" action="/slides">
        <label>Title<input class="form-control" type="text" name="title"></label>
        <label>Path inside assets/img directory<input class="form-control" type="text" name="image"></label>
        <label>the page on web-site<input class="form-control" type="text" name="link"></label>
        <button class="btn btn-primary" type="submit" href="/dashboard/slides/create">Додати</button>
    </form>
<table class="table">
    <thead>
    <tr>
        <th>id</th>
        <th>image</th>
        <th>title</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    <?php
    /** @var \models\Slide[] $slides */
    foreach($slides as $slide):?>
        <tr>
            <td><?php echo $slide->getId()?></td>
            <td><?php echo $slide->getTitle()?> </td>
            <td><img class="img-thumbnail img-responsive width-200" src="/assets/img<?php echo $slide->getImage()?>"></td>
            <td>
                <a href="/dashboard/slides/<?php echo $slide->getId()?>/edit" class="btn btn-sm btn-primary">
                    <em class="glyphicon glyphicon-pencil"></em>
                </a>
                <a href="/dashboard/slides/<?php echo $slide->getId()?>/delete" class="btn btn-sm btn-danger">
                    <em class="glyphicon glyphicon-erase"></em>
                </a>
            </td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>

<?php self::paginate($page, 10, $count, '/dashboard/slides?page'); ?>