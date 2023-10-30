    <?php wp_footer(); ?>
    <div class="footer">
        <img src="<?= wp_get_attachment_image_src(22, 'full')[0] ?>" alt="Gate 61 Offices logo" class="footer-logo">
        <?php wp_nav_menu(array(
            'menu' => 'Menu',
            'menu_id' => 'menu',
            'container' => 'div',
            'container_class' => 'footer-menu menu',
            'items_wrap' => '<ul id="%1$s">%3$s</ul>',
        )); ?>
        <div class="footer-copyrights">
            <span><?php _e('2023 All rights reserved', 'gate'); ?></span>
            <span><?php _e('Designed by E1 Collective', 'gate'); ?></span>
        </div>
    </div>
</body>
</html>