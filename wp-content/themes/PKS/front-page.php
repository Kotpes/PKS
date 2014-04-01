<?php get_header(); ?>
	<!--  HEADER -->
	<div class="header">
	  	<div class="container">
	  	    <div class="row">
	  			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	  			    <div class="header_image" style="background: url(<?php bloginfo('template_directory'); ?>/img/header.png) 50%;">				   
		  				<h2>Uusia ideoita opetukseen</h2>
		  				<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
	  				</div>  				
	  			</div>
	  		</div>
	  		<div class="row">
		  		<div class="service_description">
		  			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		  				<div class="permanent_info">
		  					<div class="head"><h3>KIINNOSTU <i class="fa fa-angle-down"></i></h3></div>
		  					<div class="head_info invisible">
			  					<p>
			  						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			  						tempor incididunt ut labore et dolore magna aliqua.
			  					</p>
		  					</div>
		  				</div>
		  			</div>
		  			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		  				<div class="permanent_info">
		  					<div class="head"><h3>TUTUSTU <i class="fa fa-angle-down"></i></h3></div>
		  					<div class="head_info  invisible">
			  					<p>
			  						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			  						tempor incididunt ut labore et dolore magna aliqua.
			  					</p>
			  				</div>
		  				</div>
		  			</div>
		  			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		  				<div class="permanent_info">
		  					<div class="head"><h3>SYVENNY <i class="fa fa-angle-down"></i></h3></div>
		  					<div class="head_info  invisible">
			  					<p>
			  						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			  						tempor incididunt ut labore et dolore magna aliqua.
			  					</p>
		  					</div>
		  				</div>
		  			</div>
		  		</div>
	  		</div>
	  	</div>
	</div>

	<!-- CONTENT -->

	<!-- Categories -->
	<div class="content">
		  <div class="container">
		  	<h2 id="ideat">Ota haltuun!</h2>
		  	<p class="subheading">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		  	tempor incididunt ut labore et dolore magna aliqua.</p>
		  	<!-- CATEGORIES -->
		  	<div class="row">
	  	<?php
		$args = array(
		  'orderby' => 'name',
		  'order' => 'ASC',
		  'hide_empty'  => 0,
		  );
		$categories = get_categories($args);
		    foreach($categories as $category) { 
		    echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
  					<div class="category">';
  					//Icon of the category   
  					$term_id = $category->term_id; 	  					
					$text_field = get_tax_meta($term_id,'ba_text_field_id');
					echo '<div class="icon">' .stripslashes($text_field). '</div>'; 				

	  				echo'<h3><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' .  '>' . $category->name.'</a></h3>';
	  			    echo '<p>' . $category->description . '</p>';
	  			//Color of the category    
	  			$term_id = $category->term_id; 	  					
				$color_field = get_tax_meta($term_id,'ba_color_field_id');
	  			echo '<div class="category_color" style="background-color:'. $color_field .';"></div>	  				
  				    </div>
  		        </div>'; 
  		       
  		    }
		?>
			</div>			
		  </div>
	</div>
	<div class="articles container">
	  	<h2>Oppaat opetukseen</h2>
	  	<p class="subheading">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  	tempor incididunt ut labore et dolore magna aliqua.</p>
	   	<div class="center_article col-lg-12 col-md-12 col-sm-12 col-xs-12">

	  	  	<div class="article_slider">
	  	  	    <?php 
			    $args = array(
			       'orderby' => 'post_date',
				   'post_type' => 'post',	   	
				   'posts_per_page' => -1			       	
			    );
			    $the_query = new WP_Query($args);
				?>
			     
				<?php if ( have_posts() ) : while ( $the_query->have_posts()) : $the_query->the_post();  ?>

					<?php get_template_part('content', 'article'); ?>

				<?php endwhile; endif; ?>			    
		  	</div>
		  	<div class="center">
		  		<a href="#" class="btn btn-primary btn-lg btn-block" role="button">SELAA OPPAITA</a>
		  	</div>
		</div>
	</div>
	<div class="footer">
	  	<h2 id="tietoa">Tietoa palvelusta</h2>
	  	<p class="subheading">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  	tempor incididunt ut labore et dolore magna aliqua.</p>
	  	<div class="container">
	  		<div class="row">
	  			<div class="footer_info col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  				<h3>MITEN OSAAVA AUTTAA?</h3>
	  				<p>
	  					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	  					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	  					consequat.
	  				</p>
	  				<a href="#" class="btn btn-primary btn-lg" role="button">OPASHAKU</a>
	  			</div>
	  			<div class="footer_info col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  				<h3>YHTEISTYÖ?</h3>
	  				<p>
	  					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	  					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	  					consequat.
	  				</p>
	  				<a href="#" class="btn btn-primary btn-lg " role="button">OTA YHTEYTTÄ</a>
	  			</div>
	  			<div class="footer_info col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  				<h3>OSALLISTU?</h3>
	  				<p>
	  					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	  					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	  					consequat.
	  				</p>
	  				<a href="#" class="btn btn-primary btn-lg" role="button">LUO TUNNUS</a>
	  			</div>
	  			<div class="footer_info col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  				<h3>KÄYTÄ MITEN HALUAT</h3>
	                <img src="<?php bloginfo('template_directory'); ?>/img/cc.png">
	  				<p>
	  					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	  					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	  					consequat.
	  				</p> 				
	  			</div>
	  		</div>
	  	</div>
	</div>




 <?php get_footer(); ?> 
