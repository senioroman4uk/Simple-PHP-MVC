<form action="/slides" method="post">
    <input type="hidden" name="id" value="<?php /** @var \models\Slide $slide */
    echo $slide->getId()?>">

    <div class="form-group">
        <label for="image">Image(path on server)</label>
        <input type="text" name="image" class="form-control" id="image" value="<?php echo $slide->getImage()?>">
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title"
               value="<?php echo $slide->getTitle()?>">
    </div>

    <div class="form-group">
        <label for="link">Link to page</label>
        <input type="text" name="link" class="form-control" id="link" value="<?php echo $slide->getLink()?>">
    </div>

    <button type="submit" class="btn btn-lg btn-primary">Save</button>
</form>