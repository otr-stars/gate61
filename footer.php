<div class="footer">
    <?php cwt_the_logo('footer_logo_setting', 'footer-logo'); ?>
    <?php
    wp_nav_menu(array(
        'menu' => 'Menu',
        'menu_id' => 'menu',
        'container' => 'div',
        'container_class' => 'footer-menu menu',
        'items_wrap' => '<ul id="%1$s">%3$s</ul>',
    )); 
    ?>
    <div class="footer-copyrights">
        <span><?php _e('2023 All rights reserved', 'gate'); ?></span>
        <span><?php _e('Designed by E1 Collective', 'gate'); ?></span>
    </div>
</div>
<?php wp_footer(); ?>

</body>

</html>