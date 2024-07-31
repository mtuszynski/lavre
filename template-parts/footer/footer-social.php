<?php
// Footer social icon

$footer = get_field('footer', 'option');
?>
<div class="flex gap-2">
    <?php foreach ($footer['footer_socials'] as $social) : ?>
        <a href="<?php echo $social['link']; ?>" target="_blank">
            <img src="<?php echo $social['icon']; ?>" class="h-8 w-8 fill-white hover:scale-110"></img>
        </a>
    <?php endforeach ?>
</div>