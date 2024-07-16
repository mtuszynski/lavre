<?php
//Footer menu

$footer = get_field('footer', 'option');
$menus = $footer['menus'];

if (is_array($menus)) {
    foreach ($menus as $menu) :
        if (is_array($menu['links'])) {
            $menu_links = $menu['links'];
        } else {
            $menu_links = array(); // or handle the case when $menu_links is not an array
        }
?>
        <div class="col-span-1">
            <h4 class="text-white font-bold uppercase pb-4"><?php echo $menu['title'] ?></h4>
            <ul>
                <?php foreach ($menu_links as $menu_item) : ?>
                    <li>
                        <a href="<?php echo $menu_item['link']['url'] ?>" class="text-light uppercase text-menu font-bold opacity-60"><?php echo $menu_item['link']['title'] ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
<?php endforeach;
}
?>