<?php
$fields = get_fields();
?>

<?php if(empty($fields['text']) === false && empty($fields['location']) === false || empty($fields['comforts']) === false) { ?>
    <div id="location" class="location tabs">
        <?php if(empty($fields['title']) === false) { ?>
            <h2 class="location-title"><?= $fields['title'] ?></h2>
        <?php } ?>

        <div class="location-wrapper">
            <?php if(empty($fields['text']) === false) { ?>
                <div class="location-text"><?= $fields['text'] ?></div>
            <?php } ?>

            <?php if(empty($fields['location']) === false || empty($fields['comforts']) === false) { ?>
                <nav class="location-nav tabs-nav js-tab">
                    <?php if(empty($fields['location']) === false) { ?>
                        <button class="btn btn-outline--red tabs-item active" data-target="location_map"><?= $fields['location']['text'] ?></button>
                    <?php } ?>
                    <?php if(empty($fields['comforts']) === false) { ?>
                        <button class="btn btn-outline--red tabs-item" data-target="facilities"><?= $fields['comforts']['text'] ?></button>
                    <?php } ?>
                </nav>
            <?php } ?>

            <?php if(empty($fields['location']) === false || empty($fields['comforts']) === false) { ?>
                <div class="location-map">
                    <?php if(empty($fields['location']) === false) { ?>
                        <div id="location_map" class="location-item zoom-container panzoom active">
                            <div class="map" data-x="0" data-y="0" data-zoom_start="1" data-zoom_max="4">
                                <div class="map-wrapper">
                                    <div class="map-layer">
                                        <img src="<?= wp_get_attachment_image_src($fields['location']['img'], 'full')[0] ?>" class="map-img" width="1233" height="794"> 
                                    </div>
                                </div>
                            </div>
                            <div class="location-buttons">
                                <button class="btn btn-primary zoom-in"><i class="icon icon-plus"></i></button>
                                <button class="btn btn-primary zoom-out"><i class="icon icon-minus"></i></button>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(empty($fields['comforts']) === false) { ?>
                        <div id="facilities" class="location-item zoom-container panzoom">
                            <div class="map" data-x="0" data-y="0" data-zoom_start="1" data-zoom_max="4">
                                <div class="map-wrapper">
                                    <div class="map-layer">
                                        <img src="<?= wp_get_attachment_image_src($fields['comforts']['img'], 'full')[0] ?>" class="map-img" width="1233" height="794">
                                    </div>
                                </div>
                            </div>
                            <div class="location-buttons">
                                <button class="btn btn-primary zoom-in"><i class="icon icon-plus"></i></button>
                                <button class="btn btn-primary zoom-out"><i class="icon icon-minus"></i></button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>