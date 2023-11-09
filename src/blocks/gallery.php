<div id="gallery" class="gallery">
    <h2 class="gallery-title"><?php _e('galeria zdjęć', 'gate') ?></h2>

    <div class="gallery-swiper swiper swiper--gallery">
        <div class="swiper-wrapper">
            <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src(90, 'full')[0] ?>')"></div>
            <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src(89, 'full')[0] ?>')"></div>
            <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src(88, 'full')[0] ?>')"></div>
            <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src(87, 'full')[0] ?>')"></div>
            <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src(86, 'full')[0] ?>')"></div>
            <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src(79, 'full')[0] ?>')"></div>
            <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src(78, 'full')[0] ?>')"></div>
            <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src(77, 'full')[0] ?>')"></div>
            <div class="swiper-slide"  data-bg-multi="url('<?= wp_get_attachment_image_src(76, 'full')[0] ?>')"></div>
        </div>
        <div class="swiper-prev icon icon-circle_arrow_left"></div>
        <div class="swiper-next icon icon-circle_arrow_right"></div>
    </div>
</div>