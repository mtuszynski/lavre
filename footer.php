</main>

<?php do_action('lavre_theme_content_end'); ?>

</div>

<?php do_action('lavre_theme_content_after'); ?>
<?php get_template_part('template-parts/footer/footer', 'baner'); ?>
<footer id="colophon" class="site-footer bg-primary pt-20 pb-10" role="contentinfo">
	<?php do_action('lavre_theme_footer'); ?>

	<div class="container mx-auto">
		<div class="grid grid-cols-1 sm:grid-cols-footer-md lg:grid-cols-footer gap-4 pb-6 border-b border-border-dark">
			<div class="col-span-1 md:col-span-2 lg:col-span-1">
				<?php get_template_part('template-parts/footer/footer', 'brand'); ?>
				<?php get_template_part('template-parts/footer/footer', 'social'); ?>
			</div>
			<?php get_template_part('template-parts/footer/footer', 'menu'); ?>
		</div>
		<div class="flex justify-between pt-10 items-center flex-col md:flex-row gap-3 md:gap-0">
			<div class="text-base text-light font-light opacity-60">© 2021 All rights reserved.</div>
			<div class="flex items-center gap-2 flex-col md:flex-row">
				<span class="text-sm text-light font-light opacity-60">Akceptowane płatności:</span>
				<img src="<?php echo get_template_directory_uri(); ?>/img/platnosci_footer.png" alt="">
			</div>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>