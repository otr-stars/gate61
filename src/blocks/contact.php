<?php
$fields = get_fields();
?>

<div class="contact">
    <?php if(empty($fields['contact_person']) === false) { ?>
        <div class="contact-wrapper">
            <div class="contact-title">
                <?php if(empty($fields['title']) === false) { ?>
                    <h2><?= $fields['title'] ?></h2>
                <?php } ?>
                <?php if(empty($fields['logo']) === false) { ?>
                    <img data-src="<?= wp_get_attachment_image_src($fields['logo'], 'full')[0] ?>" width="154" height="86">
                <?php } ?>
            </div>
            <?php if(empty($fields['contact_person']) === false) { ?>
                <div class="contact-list">
                    <?php foreach($fields['contact_person'] as $item) { ?>
                        <div class="contact-person">
                            <?php if(empty($item['img']) === false) { ?>
                                <div class="img"  data-bg-multi="url('<?= wp_get_attachment_image_src($item['img'], 'full')[0] ?>')"></div>
                            <?php } ?>
                            <div class="content">
                                <?php if(empty($item['fullname']) === false) { ?>
                                    <h3 class="name"><?= $item['fullname'] ?></h3>
                                <?php } ?>
                                <?php if(empty($item['position']) === false) { ?>
                                    <p class="position"><?= $item['position'] ?></p>
                                <?php } ?>
                                <?php if(empty($item['phone']) === false) { ?>
                                    <a href="tel:<?= $item['phone'] ?>" class="phone"><?= $item['phone'] ?></a>
                                <?php } ?>
                                <?php if(empty($item['mail']) === false) { ?>
                                    <a href="mailto:<?= $item['mail'] ?>" class="mail"><?= $item['mail'] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if(empty($fields['landlord']) === false || empty($fields['management']) === false) { ?>
        <div class="contact-info">
            <?php if(empty($fields['landlord']) === false) { ?>
                <div class="contact-landlord">
                    <?php if(empty($fields['landlord']['title']) === false) { ?>
                        <h3 class="title"><?= $fields['landlord']['title'] ?></h3>
                    <?php } ?>
                    <?php if(empty($fields['landlord']['address']) === false) { ?>
                        <p class="address"><?= $fields['landlord']['address'] ?></p>
                    <?php } ?>
                    <?php if(empty($fields['landlord']['text']) === false) { ?>
                        <p class="text"><?= $fields['landlord']['text'] ?></p>
                    <?php } ?>
                    <?php if(empty($fields['landlord']['link']) === false) { ?>
                        <a class="link" href="<?= $fields['landlord']['link']['url'] ?>" target="<?= $fields['landlord']['link']['target'] ?>"><?= $fields['landlord']['link']['title'] ?></a>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if(empty($fields['management']) === false) { ?>
                <div class="contact-management">
                    <?php if(empty($fields['management']['title']) === false) { ?>
                        <h3 class="title"><?= $fields['management']['title'] ?></h3>
                    <?php } ?>
                    <?php if(empty($fields['management']['address']) === false) { ?>
                        <p class="address"><?= $fields['management']['address'] ?></p>
                    <?php } ?>
                    <?php if(empty($fields['management']['mail_title']) === false) { ?>
                        <span class="link-title"><?= $fields['management']['mail_title'] ?></span>
                    <?php } ?>
                    <?php if(empty($fields['management']['mail']) === false) { ?>
                        <a class="link" href="mailto:<?= $fields['management']['mail'] ?>"><?= $fields['management']['mail'] ?></a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <div class="contact-form" id="contact" >
        <?php if(empty($fields['form_title']) === false) { ?>
            <h2 class="title"><?= $fields['form_title'] ?></h2>
        <?php } ?>
        <?php if(empty($fields['form_code']) === false) { ?>
            <?= do_shortcode($fields['form_code']) ?>
        <?php } ?>
    </div>
</div>