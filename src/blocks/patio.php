<?php
$fields = get_fields();
?>

<?php if(empty($fields['slider']) === false) { ?>
    <div id="patio" class="patio">
        <div class="patio-container">
            <?php if(empty($fields['title']) === false || empty($fields['text']) === false) { ?>
                <div class="patio-content">
                    <?php if(empty($fields['title']) === false) { ?>
                        <h2 class="patio-title"><?= $fields['title'] ?></h2>
                    <?php } ?>
                    <?php if(empty($fields['text']) === false) { ?>
                        <?= $fields['text'] ?>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="patio-swiper swiper swiper--patio">
                <div class="swiper-wrapper">
                    <?php foreach($fields['slider'] as $item) { ?>
                        <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src($item, 'full')[0] ?>')"></div>
                    <?php } ?>
                </div>
                <div class="swiper-prev icon icon-circle_arrow_left"></div>
                <div class="swiper-next icon icon-circle_arrow_right"></div>
            </div>
        </div>
    </div>
<?php } ?>