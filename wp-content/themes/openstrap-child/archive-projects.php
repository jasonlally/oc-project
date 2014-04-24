<?php
/**
 * @package Frank-child
 */
?>
<?php get_header(); ?>
<div id="content" class="page fullspread project-index">
	<main id="content-primary" role="main">

		<?php $i = 1; ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if ($i == 1 || ($i % 4 == 0)):?>
		<div class="row projects-row <?php echo $i == 1 ? 'first-row' : 'other-row'?>">
			<?php endif;?>
			
				<div class="col-md-4 project-col">
					<div class="project-block">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php echo(types_render_field( "feature-image", array( "alt" => "Image representing project","proportional" => "true", "style" => "width: 100%" ) ));?>
					<header class="project-header">
						<h1 class="project-title"><?php the_title(); ?></h1>
					</header>
					<div class="project-description">
						<p>
							Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI. Efficiently unleash cross-media information without cross-media value.
							<?php //echo(types_render_field("description-one-line", array()))?>
						</p>
					</div>
					</a>
				</div>
				</div>
			
			<?php if ($i > 2 & $i % 3 == 0):?>
		</div><!--/row-->
		<?php endif;?>
		<?php $i++; ?>
		<?php endwhile; endif; ?>
	</main>
</div>
<?php get_footer(); ?>