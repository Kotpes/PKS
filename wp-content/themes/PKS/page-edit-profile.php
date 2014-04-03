<?php
/*
Template Name: Edit profile
*/
get_header(); ?>

	<div id="basic-page" class="content profile">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<h2 class="align-left">Profiili</h2>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content();?>
					<?php endwhile; // end of the loop. ?>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<p class="fav-title">Omat Suoskit</p>
					<?php wpfp_list_favorite_posts(); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>