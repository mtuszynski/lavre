<?php
// Logo icon

$header = get_field('header', 'option');
$logo = $header['logo']['url']; ?>
<div>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center">
        <img src="<?php echo $logo; ?>" alt="Logo">
    </a>
</div>