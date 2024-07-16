</main>

<?php do_action('lavre_theme_content_end'); ?>

</div>

<?php do_action('lavre_theme_content_after'); ?>
<?php get_template_part('template-parts/footer/footer', 'baner'); ?>
<footer id="colophon" class="site-footer bg-secondary pt-20 pb-10" role="contentinfo">
	<?php do_action('lavre_theme_footer'); ?>

	<div class="container mx-auto">
		<div class="grid grid-cols-footer gap-4 border-b border-border-dark">
			<div class="col-span-1">
				<?php get_template_part('template-parts/footer/footer', 'brand'); ?>
				<?php get_template_part('template-parts/footer/footer', 'social'); ?>
			</div>
			<?php get_template_part('template-parts/footer/footer', 'menu'); ?>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>