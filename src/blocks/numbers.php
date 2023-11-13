<?php
$fields = get_fields();
?>

<?php if(empty($fields['tiles']) === false) { ?>
    <div id="numbers" class="numbers">
        <div class="numbers-tiles">
            <?php foreach($fields['tiles'] as $item) {
                if($item['type'] === 'half') { ?>
                    <div class="numbers-tile numbers-tile--half">
                        <?php foreach($item['halfs'] as $half) { ?>
                            <div class="numbers-tile numbers-tile--<?= $item['color'] ?>">
                                <?php if(empty($half['title']) === false) { ?>
                                    <div class="title"><?= $half['title'] ?></div>
                                <?php } ?>
                                <?php if(empty($half['text']) === false) { ?>
                                    <span><?= $half['text'] ?></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="numbers-tile numbers-tile--<?= $item['color'] ?>">
                        <?php if(empty($item['title']) === false) { ?>
                            <div class="title <?php if($item['extended'] === 'text') { echo ' title--extended'; } ?>">
                                <?= $item['title'] ?> <?php if($item['extended'] === 'unit') {?> <small><?= $item['extended_title'] ?></small> <?php } ?>
                                <?php if($item['extended'] === 'text') { ?>
                                    <span><?= $item['extended_title'] ?></span> 
                                <?php } ?>
                            </div>
                        <?php } ?>    
                        <?php if(empty($item['text']) === false) { ?>
                            <span><?= $item['text'] ?></span>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="numbers-content">
            <?php if(empty($fields['title']) === false) { ?>
                <h2><?= $fields['title'] ?></h2>
            <?php } ?>
        </div>
    </div>
<?php } ?>