<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package resortica-lite
 */

get_header(); ?>
<div class="sec-content archive-content">


    <div class="container">
        <div class="row">
			

				<?php if ( have_posts() ) :
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/contents/content', get_post_format() );
								

							endwhile;
			

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/contents/content', 'none' );

					endif; ?>
        </div>
    </div>
</div>
<?php get_footer();
