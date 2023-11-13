<?php
$fields = get_fields();
?>

<?php if (empty($fields['slide'] === false)) { ?>
    <div id="adventages" class="adventages">
        <?php if(empty($fields['title'] === false)) { ?>
            <h2 class="adventages-title"><?= $fields['title'] ?></h2>
        <?php } ?>

        <div class="swiper swiper--adventages">
            <div class="swiper-wrapper">
                <?php foreach($fields['slide'] as $item) { ?>
                    <?php if (empty($item['img']) === false) { ?>
                        <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src($item['img'], 'full')[0] ?>')">
                            <div class="content">
                                <?php if (empty($item['title']) === false) { ?>
                                    <h3><?= $item['title'] ?></h3>
                                <?php } ?>
                                <?php if (empty($item['img']) === false) { ?>
                                    <p><?= $item['text'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="swiper-prev icon icon-circle_arrow_left"></div>
            <div class="swiper-next icon icon-circle_arrow_right"></div>
        </div>
    </div>
<?php } ?>