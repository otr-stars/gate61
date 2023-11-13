<?php
$fields = get_fields();
?>

<?php if(empty($fields['banner']) === false) { ?>
    <div id="met" class="met">
        <div class="met-banner">
            <div class="met-img">
                <?php if(empty($fields['banner']['img']) === false) { ?>
                    <img data-src="<?= wp_get_attachment_image_src($fields['banner']['img'], 'full')[0] ?>" width="1570" height="823">
                <?php } ?>
            </div>
            <div class="met-text">
                <?php if(empty($fields['banner']['title']) === false) { ?>
                    <h2><?= $fields['banner']['title'] ?></h2>
                <?php } ?>
                <?php if(empty($fields['banner']['text']) === false) { ?>
                    <p><?= $fields['banner']['text'] ?></p>
                <?php } ?>
            </div>
        </div>
        <?php if(empty($fields['content']) === false) { ?>
            <div class="met-content">
                <?php if(empty($fields['content']['text']) === false) { ?>
                    <?= $fields['content']['text'] ?>
                <?php } ?>
                <?php if(empty($fields['content']['contact']) === false) { ?>
                    <a href="#contact" class="met-contact btn btn-primary--red"><?= $fields['content']['contact'] ?></a>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>