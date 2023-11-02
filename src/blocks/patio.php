<div class="patio">
    <div class="patio-container">
        <div class="patio-content">
            <h2><?php _e('Zielone patio', 'gate') ?></h2>
            <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet rhoncus justo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin sit amet dignissim tellus.', 'gate') ?></p>
        </div>
        <div class="patio-swiper swiper swiper--patio">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url('<?= wp_get_attachment_image_src(49, 'full')[0] ?>');"></div>
                <div class="swiper-slide" style="background-image: url('<?= wp_get_attachment_image_src(48, 'full')[0] ?>');"></div>
                <div class="swiper-slide" style="background-image: url('<?= wp_get_attachment_image_src(47, 'full')[0] ?>');"></div>
                <div class="swiper-slide" style="background-image: url('<?= wp_get_attachment_image_src(50, 'full')[0] ?>');"></div>
            </div>
        </div>
    </div>
</div>