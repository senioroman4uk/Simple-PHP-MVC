<div class="carousel">
    <div class="inner">
        <?php /** @var \models\Slide[] $slides */
        foreach ($slides as $slide):?>
            <div <?php echo $slides[0] == $slide ? 'class="slide active"' : 'class="slide"' ?> >
                <div class="carousel-caption">
                    <h3><?php echo $slide->getTitle() ?></h3>
                </div>
                <img src="/assets/img/<?php echo trim($slide->getImage(), '/') ?>" alt="<?php $slide->getTitle() ?>">
            </div>
        <?php endforeach ?>
    </div>
    <div class="arrow arrow-left"></div>
    <div class="arrow arrow-right"></div>
</div>
<script type="text/javascript">
    $(function() {
        $('.carousel').Carousel();
    })
</script>
<p id="home">
 <img style="float:left; width:304px;height:215px;" src="/assets/img/home.jpeg">
 Добро пожаловать на сайт!<br>
 Здесь вы сможете найти информацию про фенечки-это плетёные браслеты которые являются символом дружбы и
 просто симпатичными браслетами.<br>
 
 </p>