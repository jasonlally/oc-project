<?php
/**
 * @package Frank-child
 */
?>
<?php get_header(); ?>
<div id="content" class="page fullspread press">
	<div class="row">
		<main id="content-primary" role="main">
		<?php global $query_string;
		 query_posts($query_string . '&meta_key=wpcf-publish-date&orderby=meta_value_num'); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="post-content">
		<div class="three_fourth">
		<header>
			<h1 class="post-title">
				<?php echo(types_render_field("clipping-url", array("title"=> get_the_title(), "target" => "_blank")))?>
			</h1>
		</header>
		<span class="publish-date"><?php echo(types_render_field("publish-date", array()));?></span>
		<?php the_content()?>
		</div>
		<div class="one_fourth last_column">
		<?php echo apply_filters( 'taxonomy-images-list-the-terms', '', array(
							    'after'        => '</div>',
							    'after_image'  => '</span>',
							    'before'       => '<div class="press-outlet-logo">',
							    'before_image' => '<span>',
							    'image_size'   => 'medium',
							    'post_id'      => get_the_ID(),
							    'taxonomy'     => 'press-outlets',
							    ) ); ?>
		</div>
		<div class="clear_column"></div>
		<p></p>
		</section>
		<?php endwhile; endif; ?>
		</main>
	</div>
</div>
<?php get_footer(); ?>