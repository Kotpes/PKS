<?php get_header(); ?>


	<?php if ( have_posts() ) : while ( have_posts()) : the_post();  ?>

		<p>THIS IS SINGLE.PHP</p>

		<?php get_template_part('content', 'articles'); ?>


	<?php endwhile; else : ?>

	    <p>There are no posts</p>

	<?php endif; ?>


<?php get_footer(); ?>