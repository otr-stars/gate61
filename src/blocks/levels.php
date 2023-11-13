<?php
$fields = get_fields();
?>

<?php if(empty($fields['tab']) === false) { ?>
    <div id="levels" class="levels tabs">
        <?php if(empty($fields['title']) === false) { ?>
            <h2 class="levels-title"><?= $fields['title'] ?></h2>
        <?php } ?>

        <nav class="levels-nav tabs-nav js-tab">
            <?php foreach($fields['tab']  as $key => $item) { ?>
                <button class="btn btn-outline tabs-item <?php if ($key === array_key_first($fields['tab'])) { echo ' active'; } ?>" data-target="level_<?= $key?>"><?= $item['title'] ?></button>
            <?php } ?>
        </nav>

        <div class="levels-wrapper">
            <?php foreach($fields['tab']  as $key => $item) { ?>
                <div id="level_<?= $key?>" class="levels-item panzoom <?php if ($key === array_key_first($fields['tab'])) { echo ' active'; } ?>">
                    <div class="levels-header">
                        <h3><?= $item['title'] ?></h3>
                        <ul>
                            <li>
                                <?php _e('Powierzchnia netto: ', 'gate') ?>
                                <span><?= $item['netto'] ?></span>
                            </li>
                            <li>
                                <?php _e('Powierzchnia brutto: ', 'gate') ?>
                                <span><?= $item['brutto'] ?></span>
                            </li>
                            <li>
                                <?php _e('Dostępna powierzchnia: ', 'gate') ?>
                                <span><?= $item['available'] ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="level-container ">
                        <div>
                            <div class="map" data-x="0" data-y="0" data-zoom_start="1" data-zoom_max="4">
                                <div class="map-wrapper">
                                    <div class="map-layer">
                                        <img src="<?= wp_get_attachment_image_src($item['img'], 'full')[0] ?>" class="map-img" width="1633" height="510">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="location-buttons buttons">
                        <button class="btn btn-primary zoom-in"><i class="icon icon-plus"></i></button>
                        <button class="btn btn-primary zoom-out"><i class="icon icon-minus"></i></button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>