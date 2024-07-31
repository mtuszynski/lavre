<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>

	<?php do_action('lavre_theme_site_before'); ?>

	<div id="page" class="min-h-screen flex flex-col">

		<?php do_action('lavre_theme_header'); ?>

		<header id="header" class="transition-all duration-300 z-20 border-b border-secondary">
			<div class="xlg:flex justify-between xlg:items-center py-3 gap-0 xlg:gap-4 px-2 xl:px-12 relative">
				<div class="flex justify-between items-center flex-wrap sm:flex-nowrap">
					<?php get_template_part('template-parts/header/header', 'brand'); ?>
					<?php
					wp_nav_menu(
						array(
							'container_id' => 'icon-menu',
							'container_class' => 'sm:order-1 sm:order-2 order-1 w-full sm:w-auto flex xlg:hidden justify-center',
							'menu_class' => 'flex xl:gap-5 gap-2 items-center',
							'theme_location' => 'icon',
							'li_class' => '',
							'fallback_cb' => false,
						)
					); ?>
					<div class="xlg:hidden xlg:order-3 order-3">
						<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
							<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
									<g id="icon-shape">
										<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z" id="Combined-Shape"></path>
									</g>
								</g>
							</svg>
						</a>
					</div>
				</div>
				<div id="menu-nav" class="hidden xlg:flex justify-normal xlg:justify-end bg-light xlg:bg-transparent xl:gap-28 gap-5 w-full items-center absolute xlg:relative left-0 right-0 py-5 px-5 xlg:py-0 xlg:px-0">
					<?php
					wp_nav_menu(
						array(
							'container_id'    => 'primary-menu',
							'container_class' => '',
							'menu_class'      => 'xlg:flex xl:gap-5 gap-2',
							'theme_location'  => 'primary',
							'li_class'        => 'text-sm uppercase hover:text-primary',
							'fallback_cb'     => false,
						)
					);
					wp_nav_menu(
						array(
							'container_id'    => 'language-menu',
							'container_class' => '',
							'menu_class'      => 'xlg:flex xl:gap-4 gap-2',
							'theme_location'  => 'language',
							'li_class'        => 'xlg:mx-4 text-sm',
							'fallback_cb'     => false,
						)
					);
					wp_nav_menu(
						array(
							'container_id'    => 'icon-menu',
							'container_class' => '',
							'menu_class'      => 'hidden xl:gap-5 gap-2 items-center xlg:flex',
							'theme_location'  => 'icon',
							'li_class'        => '',
							'fallback_cb'     => false,
						)
					);
					?>
				</div>
			</div>
		</header>

		<div id="content" class="site-content flex-grow">
			<?php do_action('lavre_theme_content_start'); ?>
			<?php get_template_part('template-parts/header/header', 'social-bar');
			?>
			<main>