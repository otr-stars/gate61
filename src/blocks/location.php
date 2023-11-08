<div id="location" class="location tabs">
    <h2 class="location-title"><?php _e('lokalizacja i udogodnienia', 'gate') ?></h2>
    <div class="location-wrapper">
        <div class="location-text">
            <p>
                <?php _e('Gate 61 znajduje się w dynamicznym punkcie miasta, blisko lotniska, gdzie krzyżują się główne szlaki komunikacyjne, tj, Aleja Krakowska i południowa obwodnica Warszawy S2. Wielopasmowa ulica oraz przebiegająca nieopodal trasa WKD pozwalają szybko i sprawnie dojechać do biura z podwarszawskich miejscowości.', 'gate') ?>
            </p>
            <p>
                <?php _e('W bezpośrednim sąsiedztwie budynku znajdują się wszystkie punty usługowe i handlowe, których możesz potrzebować Ty i Twoi pracownicy.', 'gate') ?>
            </p>
        </div>
        <nav class="location-nav tabs-nav js-tab">
            <button class="btn btn-outline--red tabs-item active" data-target="location_map"><?php _e('mapa', 'gate') ?></button>
            <button class="btn btn-outline--red tabs-item" data-target="facilities"><?php _e('udogodnienia', 'gate') ?></button>
        </nav>
        <div class="location-map">
            <div id="location_map" class="location-item zoom-container panzoom active">
                <div class="map" data-x="0" data-y="0" data-zoom_start="1" data-zoom_max="4">
                    <div class="map-wrapper">
                        <div class="map-layer">
                            <img src="<?= wp_get_attachment_image_src(93, 'full')[0] ?>" class="map-img">
                        </div>
                    </div>
                </div>
                <div class="location-buttons">
                    <button class="btn btn-primary zoom-in"><i class="icon icon-plus"></i></button>
                    <button class="btn btn-primary zoom-out"><i class="icon icon-minus"></i></button>
                </div>
            </div>
            <div id="facilities" class="location-item zoom-container panzoom">
                <div class="map" data-x="0" data-y="0" data-zoom_start="1" data-zoom_max="4">
                    <div class="map-wrapper">
                        <div class="map-layer">
                            <img src="<?= wp_get_attachment_image_src(94, 'full')[0] ?>" class="map-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>