<?php
$fields = get_fields();
?>

<?php if(empty($fields['feature']) === false) { ?>
    <div id="standard" class="standard">
        <?php if(empty($fields['title']) === false) { ?>
            <h2 class="standard-title"><?= $fields['title'] ?></h2>
        <?php } ?>

        <div class="standard-wrapper">
            <div class="standard-img"  data-bg-multi="url('<?= wp_get_attachment_image_src($fields['img'], 'full')[0] ?>')"></div>
            <ul class="standard-list">
                <?php foreach($fields['feature'] as $item) { ?>
                    <li class="standard-item standard-item--<?= $item['icon'] ?>">
                        <div class="icon icon-<?= $item['icon'] ?>"></div>
                        <?php if(empty($item['text']) === false) { ?>
                            <div class="description"><?= $item['text'] ?></div>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
<?php } ?>
