<?php
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <main>
        <h1 class="page-title"><?php _e('Strona główna Gate 61 Offices', 'gate') ?></h1>
        <?php the_content(); ?>
    </main>
<?php endwhile;
endif; ?>

<?php
get_footer();
?>