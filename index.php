<?php
get_header();
?>

<main>
    <h1 class="page-title"><?php _e('Strona główna Gate 61 Offices', 'gate') ?></h1>
    <?php include get_theme_file_path().'/src/blocks/met.php'; ?>
    <?php include get_theme_file_path().'/src/blocks/adventages.php'; ?>
    <?php include get_theme_file_path().'/src/blocks/modernization.php'; ?>
    <?php include get_theme_file_path().'/src/blocks/patio.php'; ?>
    <?php include get_theme_file_path().'/src/blocks/numbers.php'; ?>
    <?php include get_theme_file_path().'/src/blocks/gallery.php'; ?>
</main>

<?php
get_footer();
?>