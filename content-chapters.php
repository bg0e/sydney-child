<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Sydney
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="title-post entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( ! is_user_logged_in() ) : ?>
		<div class="login-register">
			<p><a href="/wp-admin" title="Login">Login</a> or <a href="/register" title="Register">register</a> to join a chapter.</p>
		</div>
	<?php endif; ?>

	<?php if ( bp_has_groups() ) : ?>

		<div class="groups-list-pagination">

			<div class="pag-count" id="group-dir-count">
				<?php bp_groups_pagination_count() ?>
			</div>

			<div class="pagination-links" id="group-dir-pag">
				<?php bp_groups_pagination_links() ?>
			</div>

		</div>

		<ul id="groups-list" class="item-list">
			<?php while ( bp_groups() ) : bp_the_group(); ?>

				<li <?php bp_group_class(); ?>>

					<div class="row">
						<div class="item-avatar col-xs-12 col-sm-2">
							<a href="<?php bp_group_permalink() ?>"><?php bp_group_avatar( 'type=thumb&width=50&height=50' ) ?></a>
						</div>

						<div class="item col-xs-7 col-sm-6">
							<div class="item-title"><a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a></div>
							<div class="item-meta">
								<?php bp_group_type() ?> / <?php bp_group_member_count() ?>
							</div>
							<div class="item-desc"><?php bp_group_description_excerpt() ?></div>
							<div class="activity-meta"><span class="activity"><?php printf( __( 'active %s ago', 'buddypress' ), bp_get_group_last_active() ) ?></span></div>
							<?php do_action( 'bp_directory_groups_item' ) ?>
						</div>

						<div class="action col-xs-5 col-sm-4">
							<?php do_action( 'bp_directory_groups_actions' ) ?>
						</div>
					</div>

				</li>

			<?php endwhile; ?>
		</ul>

		<?php do_action( 'bp_after_groups_loop' ) ?>

	<?php else: ?>

		<div id="message" class="info">
			<p><?php _e( 'There were no groups found.', 'buddypress' ) ?></p>
		</div>

	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'sydney' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'sydney' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
