<?php
/**
 * The template for displaying Author pages
 *
 */
get_header(); ?>
	<div id="primary" class="author-<?=get_queried_object_id();?> author site-content">
		<div class="container">
			<div class="row" role="main">
				<div class="col-md-8">
				
					<?php if ( have_posts() ) { ?>
					<?php
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop
						 * properly with a call to rewind_posts().
						 */
						the_post();
					?>
					<header class="archive-header">
						<h1 class="archive-title"><?php printf( __( 'Author Archives: %s', 'twentytwelve' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
					</header><!-- .archive-header -->
					<?php
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();
					// If a user has filled out their description, show a bio on their entries.
					if ( get_the_author_meta( 'description' ) ) { ?>
						<div class="author-info"> 
							<div class="author-avatar">
								<?php
								$author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );
								echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
								?>
							</div><!-- .author-avatar -->
							<div class="author-description">
								<h2><?php printf( __( 'About %s', 'rocket' ), get_the_author() ); ?></h2>
								<p><?php the_author_meta( 'description' ); ?></p>
							</div><!-- .author-description	-->
						</div><!-- .author-info -->
					<?php } ?>
					<?php 
						while ( have_posts() ) {
							the_post(); 
							?>
								<div class="author-list">
									<div class="row">
										<div class="col-md-3">
											<?php if(has_post_thumbnail()){?>
												<?php echo '<img title="'.get_the_title().'" alt="'.get_the_title().'" class="wp-post-image" src="'.wp_get_attachment_url( get_post_thumbnail_id() ).'" width="100%" height="auto" />';?>
											<?php }else{
												echo '<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTU5NmFlOGYzZTQgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTk2YWU4ZjNlNCI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI2MSIgeT0iOTQuNSI+MTcxeDE4MDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" draggable="false" alt="No Image" title="No Image" />';
											} ?>
										</div>
											<div class="col-md-9">
												<h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
												<span class="date-posted"><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo get_the_date(); ?></span>
												<br/>
												<p><?php echo substr(get_the_excerpt(), 0,200) ;?>...</p>
												<div class="archieve-action">
													<a class="btn btn-primary" href="<?php echo get_the_permalink(); ?>"><span class="glyphicon glyphicon-search"></span> Read more</a>
												</div>
											</div>
									</div>
								</div>
							<?php
						}
						wp_reset_query();
						echo '<div class="pagination">'.rocketPage().'</div>';
					?>
					<?php }else{ // end of the condition. ?>
						<h3>No posts to show.</h3>
					<?php } // end of the else. ?>
				</div><!-- .col-md-8 -->
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div><!-- .col-md-4 -->
			</div><!--.row -->
		</div><!-- .container-->
	</div><!-- .primary -->
<?php get_footer(); ?> 