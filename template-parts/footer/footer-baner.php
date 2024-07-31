<?php
// Footer baner info template 
$info = get_field('info_baner', 'option'); ?>
<div class="bg-light alignfull">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-2 items-center">
            <div class="col-span-1 flex flex-col sm:flex-row items-center gap-5 justify-center md:justify-normal border-r-none md:border-r md:border-borderdashed py-8">
                <img src="<?php echo $info['icon_first']; ?>" alt="">
                <div class="flex flex-col">
                    <div class="text-primary text-sm md:text-base lg:text-lg font-extrabold pb-2"><?php echo $info['title']; ?></div>
                    <a href="tel:<?php echo $info['phone']; ?>" class="text-2xl lg:text-[41px] leading-10 text-primary font-extrabold"><?php echo $info['phone']; ?></a>
                    <a href="mailto:<?php echo $info['email']; ?>" class="text-2xl text-primary font-extrabold pb-4"><?php echo $info['email']; ?></a>
                    <div class="text-2xl font-light text-small"><?php echo $info['open_time']; ?></div>
                </div>
            </div>
            <div class="col-span-1 grid grid-cols-1 md:grid-cols-2 gap-4 h-full items-center">
                <!-- First sub-column -->
                <div class="col-span-1 flex gap-5 flex-col sm:flex-row items-center justify-center md:justify-normal h-full border-r-none md:border-r md:border-borderdashed">
                    <img src="<?php echo $info['icon_second']; ?>" alt="">
                    <div class="text-xl flex flex-row md:flex-col gap-1 md:gap-0">
                        <div class="font-bold">Wysyłka:</div>
                        <div class="">w 24h</div>
                    </div>
                </div>
                <div class="col-span-1 flex flex-col sm:flex-row items-center gap-5 justify-center md:justify-normal h-full">
                    <img src="<?php echo $info['icon_third']; ?>" alt="">
                    <div class="text-xl flex flex-row md:flex-col gap-1 md:gap-0">
                        <div class="font-bold">Darmowa wysyłka</div>
                        <div class="">już od 1000 zł</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>