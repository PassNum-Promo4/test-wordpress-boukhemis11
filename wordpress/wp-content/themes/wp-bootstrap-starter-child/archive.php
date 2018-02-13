<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-12">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1>Mes Projet</h1>
				<?php
				//	the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
  
			<?php
		$columns_num = 3; // The number of columns we want to display our posts
		$i = 0; //Counter for .row divs
		
		echo '<div class="row">';
		
			/* Start the Loop */
			while ( have_posts() ) : the_post();
		
				echo '<div class="single-product-archive col-xl-' . 12 / $columns_num . '">';
					get_template_part( 'content', get_post_format() );
				echo '</div>';
		
				if($i % $columns_num == $columns_num - 1 ) {  
					echo '</div> <div class="row">';
				}
		
				$i++;
		
			endwhile;
		
		echo '</div>';
			the_posts_navigation();

		else :
			echo '<div class="single-product-archive col-xl-' . 12 / $columns_num . '">';
			get_template_part( 'content', 'none' );
			echo '</div>';
			if($i % $columns_num == $columns_num - 1 ) {  
				echo '</div> <div class="row">';
			}
	
			$i++;
			
			
		endif; ?>
</div></div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
