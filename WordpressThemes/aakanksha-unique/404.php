<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package aakanksha
 */

get_header(); ?>
<div id="content" class="page-wrap">
		<div class="container content-wrapper">
			<div class="row">
	<div id="primary" class="content-area fullwidth">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'aakanksha' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'aakanksha' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
            	</div>
    	</div>
<?php get_footer(); ?>
                	
