<?php
$fields = get_fields();
?>

<?php if(empty($fields['gallery']) === false) { ?>
    <div id="gallery" class="gallery">
        <?php if(empty($fields['title']) === false) { ?>
            <h2 class="gallery-title"><?= $fields['title'] ?></h2>
        <?php } ?>

        <div class="gallery-swiper swiper swiper--gallery">
            <div class="swiper-wrapper">
                <?php foreach($fields['gallery'] as $item) { ?>
                    <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src($item, 'full')[0] ?>')"></div>
                <?php } ?>
            </div>
            <div class="swiper-prev icon icon-circle_arrow_left"></div>
            <div class="swiper-next icon icon-circle_arrow_right"></div>
        </div>
    </div>
<?php } ?>