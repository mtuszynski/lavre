<?php
// Footer baner info template 
$info = get_field('info_baner', 'option'); ?>
<div class="bg-light">
    <div class="container mx-auto">
        <div class="grid grid-cols-2 gap-4 py-10 items-center">
            <div class="col-span-1 flex gap-x-5">
                <img src="<?php echo $info['icon_first']; ?>" alt="">
                <div class="flex flex-col">
                    <div><?php echo $info['title']; ?></div>
                    <div><?php echo $info['phone']; ?></div>
                    <div><?php echo $info['email']; ?></div>
                    <div><?php echo $info['open_time']; ?></div>
                </div>
            </div>
            <div class="col-span-1 grid grid-cols-2 gap-4">
                <!-- First sub-column -->
                <div class="col-span-1 flex gap-x-5">
                    <img src="<?php echo $info['icon_second']; ?>" alt="">
                    <div class="">
                        <?php echo $info['text_second']; ?>
                    </div>
                </div>
                <div class="col-span-1 flex gap-x-5">
                    <img src="<?php echo $info['icon_third']; ?>" alt="">
                    <div class="">
                        <?php echo $info['text_third']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>