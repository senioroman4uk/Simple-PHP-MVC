<form action="/pages/" method="post">
    <input type="hidden" name="id" value="<?php /** @var models\Page $page */
    echo $page->getId()?>">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="<?php echo $page->getName()?>">
    </div>
    <div class="form-group">
        <label for="access">Access</label>
        <input type="text" name="access" class="form-control" id="access" value="<?php echo $page->getAccess()?>">
    </div>
    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" name="link" class="form-control" id="link" value="<?php echo $page->getLink()?>">
    </div>
    <div class="form-group">
        <label for="route">Route</label>
        <input type="text" name="route" class="form-control" id="route" value="<?php echo $page->getRoute()?>">
    </div>
    <div class="form-group">
        <label for="order">Order</label>
        <input type="text" name="order" class="form-control" id="order" value="<?php echo $page->getOrder()?>">
    </div>
    <div class="form-group">
        <label for="show">Show</label>
        <input type="text" name="show" class="form-control" id="show" value="<?php echo $page->getShow()?>">
    </div>
    <div>
        <label for="system">Sytem</label>
        <input type="text" name="system" class="form-control" id="system" value="<?php echo $page->getSystem()?>">
    </div>
    <div>
        <label for="menuOrder">Order in menu</label>
        <input type="text" name="menuOrder" class="form-control" id="menuOrder" value="<?php echo $page->getMenuOrder()?>">
    </div>
    <label for="content">Content</label>
    <textarea class="form-control" name="content" id="content"><?php echo $page->getContent()?></textarea>
    <label for="date">Date</label>
    <input class="form-control" type="date" id="date" name="date" value="<?php echo $page->getDate()?>">

    <button type="submit" class="btn btn-lg btn-primary">Save</button>
</form>