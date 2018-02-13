<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wp_bootstrap_starter_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
        if ( is_single() ) :
			the_content();?>

			<h2><?php // the_field('titre'); ?></h2> 
			<h6><?php the_field('description'); ?></h6>
			<?php if( get_field('image') ): ?>
	    <img src="<?php the_field('image'); ?>" />
		<h2>Technologies utilisees : <?php the_field('technologies_utilisees'); ?></h2>
		<h2><a href="<?php the_field('lien'); ?>">Lien Github</a></h2>

<?php endif; ?>


			<?php
        else :
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
			?>
			<h2><?php // the_field('titre'); ?></h2>
				<?php if( get_field('image') ): ?>

				<img src="<?php the_field('image'); ?>" />

			<?php endif; ?> <br>
			
		
			
			
			
			<?php  endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
