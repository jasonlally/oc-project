<?php
/**
 * @package Frank-child
 */
?>
<?php get_header(); ?>
<div id="content" class="page fullspread">
	<div class="row">
	<main id="content-primary" role="main">
		<?php $i = 1; ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if ($i == 1 || ($i > 3 && $i % 2 == 0)):?>
		<div class="row <?php echo $i == 1 ? 'first_row' : 'other_row'?>">
		<?php endif;?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><div class="<?php echo $i < 4 ? 'one_third' : 'one_half'?> <?php if($i == 3 || ($i > 3 && $i % 2 != 0)) echo 'last_column'?>">
			<div class="project-block">
				<header class="project-header">
					<h1 class="project-title"><?php the_title(); ?></h1>
				</header>
			<p><?php echo(types_render_field("description-one-line", array()))?></p>
			</div>
		</div></a>
		<?php if ($i == 3 || ($i > 3 && $i % 2 != 0)):?>
		</div><!--/row-->
		<?php endif;?>
		<?php $i++; ?>
		<?php endwhile; endif; ?>
	</main>
	</div>
</div>
<?php get_footer(); ?>