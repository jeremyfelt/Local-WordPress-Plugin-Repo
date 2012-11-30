<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
	            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	                <header class="entry-header">
						<?php the_post_thumbnail(); ?>
	                    <h1 class="entry-title"><?php the_title(); ?></h1>
						<?php if ( comments_open() ) : ?>
	                    <div class="comments-link">
							<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
	                    </div><!-- .comments-link -->
						<?php endif; // comments_open() ?>
	                </header><!-- .entry-header -->

	                <div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
	                </div><!-- .entry-content -->

	                <footer class="entry-meta">
                        Download Count: <?php echo lwpr_get_download_count(); ?><br>
                        Latest Version: <?php echo lwpr_get_plugin_version(); ?><br>
		                <?php $support_items = lwpr_get_support_items(); ?>
		                <?php if ( ! empty( $support_items ) ) : ?>
		                <br><strong>Support Threads:</strong>
                        <ul>
			                <?php $support_items = lwpr_get_support_items();
			                foreach ( $support_items as $item ) {
				                echo '<li>' . date( 'm/d/Y H:i', $item['last_date'] ) . ' - <a href="' . esc_url( $item['link'] ) . '">' . esc_html( $item['subject'] ) . '</a> - ' . esc_html( $item['last_author'] ) . '</li>';
			                }
			                ?>
                        </ul><br>
						<?php endif; ?>
		                <?php $donate_code = lwpr_get_donate_code(); ?>
		                <?php if ( ! empty( $donate_code ) ) echo $donate_code; ?>
						<?php twentytwelve_entry_meta(); ?>
						<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
						<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
	                    <div class="author-info">
	                        <div class="author-avatar">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
	                        </div><!-- .author-avatar -->
	                        <div class="author-description">
	                            <h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
	                            <p><?php the_author_meta( 'description' ); ?></p>
	                            <div class="author-link">
	                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
										<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
	                                </a>
	                            </div><!-- .author-link	-->
	                        </div><!-- .author-description -->
	                    </div><!-- .author-info -->
						<?php endif; ?>
	                </footer><!-- .entry-meta -->
	            </article><!-- #post -->
				<div class="support-threads">
				</div>
				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>