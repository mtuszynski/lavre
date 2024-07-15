<?php

/**
 * Social bar.
 */
$socials = get_field('socials', 'option');
?>
<div class="fixed top-32 right-6 hidden md:block z-10">
    <ul class="flex flex-col gap-2.5">
        <?php
        if (have_rows('socials', 'option')) :
            while (have_rows('socials', 'option')) : the_row();
                $icon = get_sub_field('icon');
                $url = get_sub_field('link'); ?>
                <li>
                    <a href="<?php echo $url ?>" class="block border border-white rounded-full hover:scale-110 bg-white"><img src="<?php echo $icon['url'] ?>" alt=""></a>
                </li>

        <?php
            endwhile;
        endif;
        ?>
    </ul>
</div>