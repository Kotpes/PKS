<?php get_header(); ?>

    <!-- FEATURED SHIPS START-->
	    <?php 
		   $args = array(
		   	'category_name'  => 'featured',
		   	'post_type' => 'post',	   	
		   	'posts_per_page' => -1	   		       	
		   );

		   $the_query = new WP_Query($args);
		?>
	    
		 <?php if ( have_posts() ) : while ( $the_query->have_posts()) : $the_query->the_post();  ?>

			<?php get_template_part('content', 'featured'); ?>

		<?php endwhile; endif; ?>
    </div>

    <div class="w-container teplohody">
	    <h3>Теплоходы</h3>
	    <div class="w-row">
		    <?php 
			    $args = array(
				   'category_name'  => 'teplohody',
				   'post_type' => 'post',	   	
				   'posts_per_page' => -1			       	
			    );
			    $the_query = new WP_Query($args);
			?>
		     
			<?php if ( have_posts() ) : while ( $the_query->have_posts()) : $the_query->the_post();  ?>

				<?php get_template_part('content', 'teplohody'); ?>

			<?php endwhile; endif; ?>

    <!-- TEPLOHODY SECTION END-->

    <!-- KATERA SECTION START-->

		    <?php 
			    $args = array(
				   'category_name'  => 'katera',
				   'post_type' => 'post',	   	
				   'posts_per_page' => -1			       	
			    );
			    $the_query = new WP_Query($args);
			?>
		     
			<?php if ( have_posts() ) : while ( $the_query->have_posts()) : $the_query->the_post();  ?>

				<?php get_template_part('content', 'katera'); ?>

			<?php endwhile; endif; ?>

    <!-- KATERA SECTION END-->

<?php get_footer(); ?>