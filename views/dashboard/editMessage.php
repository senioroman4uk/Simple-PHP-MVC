<form action="/messages/" method="post">
    <input type="hidden" name="id" value="<?php echo $message->getId()?>">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="<?php echo $message->getName()?>">
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <input type="text" name="message" class="form-control" id="message"
               value="<?php echo $message->getMessage()?>">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" id="email" value="<?php echo $message->getEmail()?>"/>
    </div>
    <div class="form-group">
        <label for="ip">ip</label>
        <input type="text" name="ip" class="form-control" id="ip"  value="<?php echo $message->getIp()?>">
    </div>
    <div class="form-group">
        <label for="answer">Answer</label>
        <input class="form-control" type="text" id="answer" name="answer"  value="<?php echo $message->getAnswer()?>">
    </div>
    <button type="submit" class="btn btn-lg btn-primary">Save</button>
</form>