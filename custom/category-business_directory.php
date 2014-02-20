<?php 
/**
 * The template for displaying Category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div id="main" class="container container--main">

    <div class="grid">
		<div class="grid__item  two-thirds  palm-one-whole">
			<?php if (wpgrade::option('blog_archive_show_cat_billboard')) get_template_part('theme-partials/post-templates/header-category'); ?>
            <?php if (have_posts()): ?>
                <div class="heading  heading--main">
                    <h2 class="hN"><?php echo single_cat_title( '', false ); ?></h2><span class="archive__side-title beta"><?php _e( 'Articles', wpgrade::textdomain() ); ?></span>
                </div>
				
				<?php if ( category_description() ) : // Show an optional category description ?>
				    <div class="archive-meta"><?php echo category_description(); ?></div>
				<?php endif; 
	 /*           if(wpgrade::option('blog_layout') == 'masonry') {
		            $grid_class= 'class="grid  masonry" data-columns';
	            } else {*/
		            $grid_class = 'class="classic"';
	             ?>

	            <div <?php echo $grid_class;?>>
                 <?php while (have_posts()): the_post(); ?>
                			<?php the_post_thumbnail( 'thumbnail' ); ?> 
                			<div class="article__title  article--thumb__title">
												<a href="<?php the_permalink(); ?>"><h3 class="hN"><?php the_title(); ?></h3></a>
											</div>
                			<div class="article--grid__body">
	        							<div class="article__content">
	            						<?php  the_excerpt(); ?>
                          Employees: <?php echo get_post_meta( get_the_ID(), 'number_of_employees', true ) ?>
	        							</div>
	    								</div>                
                 <?php endwhile; ?>
                </div>
                <?php echo wpgrade::pagination();
	        else: get_template_part( 'no-results', 'index' ); endif; ?>
        </div><!--
     --><div class="grid__item  one-third  palm-one-whole  sidebar">
            <?php get_sidebar(); ?>
        </div>

    </div>
</div>
    
<?php get_footer(); ?>