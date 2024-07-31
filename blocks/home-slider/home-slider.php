<?php

/**
 * Home slider Block template.
 *
 * @param array $block The block settings and attributes.
 */

$sign = get_field('sign');
// Support custom "anchor" values.
$id = 'home-slider-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'home-slider';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
$slides = get_field('slides'); ?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> relative mt-0">
    <div class="swiper mySwiper lg:max-h-[631px] max-h-[960px] sm:h-svh h-auto">
        <div class="swiper-wrapper">
            <?php
            foreach ($slides as $slide) : ?>
                <div class="swiper-slide w-full flex lg:flex-row flex-col gap-2 lg:gap-0 overflow-hidden justify-normal sm:justify-between items-center">
                    <div class="w-full h-auto lg:h-full lg:w-6/12 flex justify-end items-center">
                        <div class="w-full xlg:w-10/12 ml-4 xlg:ml-0">
                            <div class="lg:text-headingFont text-4xl font-bold relative z-10"><?php echo $slide['title'] ?></div>
                            <p class="text-3xl font-light"><?php echo $slide['text'] ?></p>
                            <a href="<?php echo $slide['link']['url'] ?>" class="btn btn-primary"><?php echo $slide['link']['title'] ?></a>
                        </div>
                    </div>
                    <div class="w-full h-full lg:w-6/12 relative">
                        <span class="hidden lg:block before:content-[''] before:bg-light before:absolute before:h-full before:w-32 before:top-0 before:bottom-0 before:-left-32 -z-[1]"></span>
                        <? echo wp_get_attachment_image(
                            $slide['image'],
                            'full',
                            false,
                            array('class' => 'slide-img object-cover h-full w-full')
                        ); ?>
                    </div>
                </div>
            <?php
            endforeach ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="autoplay-progress absolute bottom-10 lg:bottom-4 right-7 z-10 w-12 h-12 flex items-center justify-center font-bold text-white">
            <svg style="position: absolute; left: 0; top: 0; z-index: 10; width: 100%; height: 100%; stroke-width: 4px; stroke: white; fill: none; stroke-dashoffset: calc(125.6px * (1 - var(--progress))); stroke-dasharray: 125.6; transform: rotate(-90deg);" viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div>
    </div>
    <img src="<?php echo $sign; ?>" alt="" class="absolute -bottom-28 right-60 z-10 hidden lg:block">
</section>

</div>