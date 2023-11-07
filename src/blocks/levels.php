<div id="levels" class="levels tabs">
    <h2 class="levels-title"><?php _e('Rzuty pięter', 'gate') ?></h2>
    <nav class="levels-nav tabs-nav js-tab">
        <button class="btn btn-outline tabs-item active" data-target="level_3_1"><?php _e('Piętro 3', 'gate') ?></button>
        <button class="btn btn-outline tabs-item" data-target="level_3_2"><?php _e('Piętro 3', 'gate') ?></button>
        <button class="btn btn-outline tabs-item" data-target="level_5"><?php _e('Piętro 5', 'gate') ?></button>
    </nav>
    <div class="levels-wrapper">
        <div id="level_3_1" class="levels-item zoom-container active">
            <div class="levels-header">
                <h3><?php _e('Piętro 3', 'gate') ?></h3>
                <ul>
                    <li>
                        <?php _e('powierzchnia netto: ', 'gate') ?>
                        <span><?php _e('5654,45 sqm', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('powierzchnia brutto: ', 'gate') ?>
                        <span><?php _e('6095,48 sqm', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('Dostępna powierzchnia: ', 'gate') ?>
                        <span><?php _e('6095,48 sqm', 'gate') ?></span>
                    </li>
                </ul>
            </div>
            <div class="map">
                <div class="zoom-wrapper">
                    <img src="<?= wp_get_attachment_image_src(68, 'full')[0] ?>" class="zoom-img" data-x="0" data-y="0" data-zoom_start="1" data-zoom_max="4">
                </div>
            </div>
            <div class="buttons">
                <button class="btn btn-primary zoom-in"><i class="icon icon-plus"></i></button>
                <button class="btn btn-primary zoom-out"><i class="icon icon-minus"></i></button>
            </div>
        </div>

        <div id="level_3_2" class="levels-item zoom-container">
            <div class="levels-header">
                <h3><?php _e('Piętro 3', 'gate') ?></h3>
                <ul>
                    <li>
                        <?php _e('powierzchnia netto: ', 'gate') ?>
                        <span><?php _e('5654,45 sqm', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('powierzchnia brutto: ', 'gate') ?>
                        <span><?php _e('6095,48 sqm', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('Dostępna powierzchnia: ', 'gate') ?>
                        <span><?php _e('6095,48 sqm', 'gate') ?></span>
                    </li>
                </ul>
            </div>
            <div class="map">
                <div class="zoom-wrapper">
                    <img src="<?= wp_get_attachment_image_src(67, 'full')[0] ?>" class="zoom-img" data-x="0" data-y="0" data-zoom_start="1" data-zoom_max="4">
                </div>
            </div>
            <div class="buttons">
                <button class="btn btn-primary zoom-in"><i class="icon icon-plus"></i></button>
                <button class="btn btn-primary zoom-out"><i class="icon icon-minus"></i></button>
            </div>
        </div>

        <div id="level_5" class="levels-item zoom-container">
            <div class="levels-header">
                <h3><?php _e('Piętro 5', 'gate') ?></h3>
                <ul>
                    <li>
                        <?php _e('powierzchnia netto: ', 'gate') ?>
                        <span><?php _e('5654,45 sqm', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('powierzchnia brutto: ', 'gate') ?>
                        <span><?php _e('6095,48 sqm', 'gate') ?></span>
                    </li>
                    <li>
                        <?php _e('Dostępna powierzchnia: ', 'gate') ?>
                        <span><?php _e('6095,48 sqm', 'gate') ?></span>
                    </li>
                </ul>
            </div>
            <div class="map">
                <div class="zoom-wrapper">
                    <img src="<?= wp_get_attachment_image_src(66, 'full')[0] ?>" class="zoom-img" data-x="0" data-y="0" data-zoom_start="1" data-zoom_max="4">
                </div>
            </div>
            <div class="buttons">
                <button class="btn btn-primary zoom-in"><i class="icon icon-plus"></i></button>
                <button class="btn btn-primary zoom-out"><i class="icon icon-minus"></i></button>
            </div>
        </div>
    </div>
</div>