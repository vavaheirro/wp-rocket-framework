<?php
/**
 * The template for displaying all pages
 *
 */
get_header(); ?>
	<div id="primary" class="innerpage site-content">
		<div class="container">
			<div class="row" role="main">
				<div class="col-md-8">
				<?php 
					while (have_posts()){ 
						the_post(); 
						get_template_part( 'content', 'page' ); 
					} 
				?>
				</div><!-- .col-md-8 -->
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div><!-- .col-md-4 -->
			</div><!--.row -->
		</div><!-- .container-fluid -->
	</div><!-- .primary -->
<?php get_footer(); ?>