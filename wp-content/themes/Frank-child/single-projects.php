<?php
/**
 * @package Frank
 */
?>
<?php get_header(); ?>
<div id="content" class="page fullspread">
	<div class="row">
		<main id="content-primary" role="main">
			<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article class="post" id="p<?php the_ID(); ?>">
                <section class="post-content">
                <div class="row"><?php
                	echo(types_render_field( "feature-image", array( "alt" => "Image representing project","proportional" => "true", "style" => "width: 100%" ) ));
                	?>
                </div>
                
                	
                <div class="row">
			    <div class="four_fifth">
			    	<header class="post-header">
                	<h1><?php the_title(); ?></h1>
                	<h3>
                     <?php
                     echo(types_render_field("description-one-line", array()));
                     ?>
                     </h3>
                </header>
                     <?php the_content()?>
                     <hr/>
                     <?php
					// Find connected pages
					$connected = new WP_Query( array(
					  'connected_type' => 'press_to_projects',
					  'connected_items' => get_queried_object(),
					  'nopaging' => true,
					  'meta_key' => 'wpcf-publish-date',
					  'orderby' => 'meta_value_num'
					) );
					
					// Display connected pages
					if ( $connected->have_posts() ) :
					?>
					<h1>In the Press</h3>
					
					<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
						<div class='row press'>
						<div class="two_third">
						<h3><?php echo(types_render_field("clipping-url", array("title"=> get_the_title(), "target" => "_blank")))?></h3>
						<span class="publish-date"><?php echo(types_render_field("publish-date", array()));?></span>
						<?php the_content()?>
						</div>
						<div class="one_third last_column">
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
						</div>
					<?php endwhile; ?>
					
					
					<?php 
					// Prevent weirdness
					wp_reset_postdata();
					
					endif;
					?>
				</div><!--/four-fifth column-->
				<div class="one_fifth last_column">
					<?php echo(types_render_field("project-url", array("class" => "projectbutton1", "title" => "Visit Website", "target" => "_blank")));?>
						<?php if(types_render_field("launch-date", array()) !== ""):?>
						<h3 class="info-title">Launched</h3>
						<p><?php
                     echo(types_render_field("launch-date", array()));
                     ?></p>
                     <?php endif;?>
                     <?php if(types_render_field("city-partners", array()) !== ""):?>
                     	<h3 class="info-title">City Partners</h3>
                     	<p><?php
                     echo(types_render_field("city-partners", array()));
                     ?></p>
                     <?php endif; ?>
                     <?php if(types_render_field("external-partners", array()) !== ""): ?>
                     <h3 class="info-title">External Partners</h3>
                     <p><?php
                     echo(types_render_field("external-partners", array()));
                     ?></p>
                     <?php endif; ?>
					
				</div><!--/one-fifth column-->
				<div class="clear_column"></div>
				</div>	
				</section>
			</article>
			<?php endwhile; ?>
		</main>
	</div>
</div>
<?php get_footer(); ?>