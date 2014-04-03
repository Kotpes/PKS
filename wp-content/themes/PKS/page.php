<?php get_header(); ?>

	<div id="basic-page" class="content">
		<div class="container">
			<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content();?>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?> 
