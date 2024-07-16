<?php
// sections with logo and descriptions
$footer = get_field('footer', 'option'); ?>

<img src="<?php echo $footer['footer_logo'] ?>" alt="">
<div class="text-left pt-5 pb-10 text-white text-sm"><?php echo wp_kses_post($footer['footer_description']) ?></div>