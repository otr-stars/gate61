<?php
$fields = get_fields();
?>

<?php if(empty($fields['slider']) === false) { ?>
    <div id="modernization" class="modernization">
        <?php if(empty($fields['title']) === false) { ?>
            <h2 class="modernization-title"><?= $fields['title'] ?></h2>
        <?php } ?>

        <div class="modernization-container">
            <?php if(empty($fields['subtitle']) === false || empty($fields['text']) === false) { ?>
                <div class="modernization-content">
                    <?php if(empty($fields['subtitle']) === false) { ?>
                        <h3><?= $fields['subtitle'] ?></h3>
                    <?php } ?>
                    <?php if(empty($fields['text']) === false) { ?>
                        <?= $fields['text'] ?>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="modernization-swiper swiper swiper--modernization">
                <div class="swiper-wrapper">
                    <?php foreach($fields['slider'] as $item) { ?>
                        <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src($item['img'], 'full')[0] ?>')">
                            <span><?= $item['text'] ?></span>
                        </div>
                    <?php } ?>
                </div>
                <div class="swiper-prev icon icon-circle_arrow_left"></div>
                <div class="swiper-next icon icon-circle_arrow_right"></div>
            </div>
        </div>
    </div>
<?php } ?>