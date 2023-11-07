<div id="levels" class="levels tabs">
    <h2 class="levels-title"><?php _e('rzuty pięter', 'gate') ?></h2>
    <nav class="levels-nav tabs-nav js-tab">
        <button class="btn btn-outline tabs-item active" data-target="level_3_1"><?php _e('Piętro 3', 'gate') ?></button>
        <button class="btn btn-outline tabs-item" data-target="level_3_2"><?php _e('Piętro 3', 'gate') ?></button>
        <button class="btn btn-outline tabs-item" data-target="level_5"><?php _e('Piętro 5', 'gate') ?></button>
    </nav>
    <div class="levels-wrapper">
        <div id="level_3_1" class="levels-item active">
            <div class="levels-header">
                <h3><?php _e('piętro 3', 'gate') ?></h3>
                <ul>
                    <li>
                        <?php _e('Powierzchnia netto: ', 'gate') ?>
                        <span><?php _e('5654,45 m²', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('Powierzchnia brutto: ', 'gate') ?>
                        <span><?php _e('5915.88 m²', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('Dostępna powierzchnia: ', 'gate') ?>
                        <span><?php _e('', 'gate') ?></span>
                    </li>
                </ul>
            </div>
            <div class="map">
                <img src="<?= wp_get_attachment_image_src(68, 'full')[0] ?>"></img>
            </div>
            <div class="buttons">
                <button class="btn btn-primary"><i class="icon icon-plus"></i></button>
                <button class="btn btn-primary"><i class="icon icon-minus"></i></button>
            </div>
        </div>

        <div id="level_3_2" class="levels-item">
            <div class="levels-header">
                <h3><?php _e('piętro 3', 'gate') ?></h3>
                <ul>
                    <li>
                        <?php _e('Powierzchnia netto: ', 'gate') ?>
                        <span><?php _e('5654,45 m²', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('Powierzchnia brutto: ', 'gate') ?>
                        <span><?php _e('5915.88 m²', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('Dostępna powierzchnia: ', 'gate') ?>
                        <span><?php _e('', 'gate') ?></span>
                    </li>
                </ul>
            </div>
            <div class="map">
                <img src="<?= wp_get_attachment_image_src(70, 'full')[0] ?>"></img>
            </div>
            <div class="buttons">
                <button class="btn btn-primary"><i class="icon icon-plus"></i></button>
                <button class="btn btn-primary"><i class="icon icon-minus"></i></button>
            </div>
        </div>

        <div id="level_5" class="levels-item">
            <div class="levels-header">
                <h3><?php _e('piętro 5', 'gate') ?></h3>
                <ul>
                    <li>
                        <?php _e('Powierzchnia netto: ', 'gate') ?>
                        <span><?php _e('3893,53 m²', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('Powierzchnia brutto: ', 'gate') ?>
                        <span><?php _e('4248.21 m²', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('Dostępna powierzchnia: ', 'gate') ?>
                        <span><?php _e('', 'gate') ?></span>
                    </li>
                </ul>
            </div>
            <div class="map">
                <img src="<?= wp_get_attachment_image_src(66, 'full')[0] ?>"></img>
            </div>
            <div class="buttons">
                <button class="btn btn-primary"><i class="icon icon-plus"></i></button>
                <button class="btn btn-primary"><i class="icon icon-minus"></i></button>
            </div>
        </div>
    </div>
</div>