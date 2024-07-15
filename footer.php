</main>

<?php do_action('lavre_theme_content_end'); ?>

</div>

<?php do_action('lavre_theme_content_after'); ?>
<?php get_template_part('template-parts/footer/footer', 'baner'); ?>
<footer id="colophon" class="site-footer bg-gray-50 py-12" role="contentinfo">
	<?php do_action('lavre_theme_footer'); ?>

	<div class="container mx-auto text-center text-gray-500">
		<div class="grid grid-cols-custom gap-4">
			<!-- First column (1.5fr) -->
			<div class="col-span-1">
				<!-- Content for first column -->
			</div>

			<!-- Second column (1fr) -->
			<div class="col-span-1">
				<!-- Content for second column -->
			</div>

			<!-- Third column (1fr) -->
			<div class="col-span-1">
				<!-- Content for third column -->
			</div>

			<!-- Fourth column (1fr) -->
			<div class="col-span-1">
				<!-- Content for fourth column -->
			</div>

			<!-- Fifth column (1fr) -->
			<div class="col-span-1">
				<!-- Content for fifth column -->
			</div>
		</div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>