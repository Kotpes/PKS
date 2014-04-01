<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts()) : the_post();  ?>
		<?php get_template_part('content', 'articles'); ?>
	<?php endwhile; else : ?>

	    <H1>There are no posts</H1>

	<?php endif; ?>


<?php get_footer(); ?>


