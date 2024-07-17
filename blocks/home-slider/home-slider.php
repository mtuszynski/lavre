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

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> relative">
    <div class="swiper mySwiper max-h-[631px] h-auto">
        <div class="swiper-wrapper">
            <?php
            foreach ($slides as $slide) : ?>
                <div class="swiper-slide w-full flex">
                    <div class="w-6/12 flex justify-center items-center">
                        <div>
                            <h2 class="text-6xl font-bold"><?php echo $slide['title'] ?></h2>
                            <p><?php echo $slide['text'] ?></p>
                            <a href="<?php echo $slide['link']['url'] ?>" class="btn btn-primary"><?php echo $slide['link']['title'] ?></a>
                        </div>
                    </div>
                    <div class="w-6/12 relative">
                        <span class="before:content-[''] before:bg-light before:absolute before:h-full before:w-32 before:top-0 before:bottom-0 before:-left-32"></span>
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
        <div class="autoplay-progress absolute bottom-4 right-4 z-10 w-12 h-12 flex items-center justify-center font-bold text-white">
            <svg style="position: absolute; left: 0; top: 0; z-index: 10; width: 100%; height: 100%; stroke-width: 4px; stroke: white; fill: none; stroke-dashoffset: calc(125.6px * (1 - var(--progress))); stroke-dasharray: 125.6; transform: rotate(-90deg);" viewBox="0 0 48 48">
                <circle cx="24" cy="24" r="20"></circle>
            </svg>
            <span></span>
        </div>
    </div>
    <img src="<?php echo $sign; ?>" alt="" class="absolute -bottom-28 right-60 z-10">
</section>

</div>