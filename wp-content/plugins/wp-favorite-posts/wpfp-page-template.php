<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
   
<?php
    $wpfp_before = "";
    echo "<div class='wpfp-span'>";
    if (!empty($user)) {
        if (wpfp_is_user_favlist_public($user)) {
            $wpfp_before = "$user's Favorite Posts.";
        } else {
            $wpfp_before = "$user's list is not public.";
        }
    }

    if ($wpfp_before):
        echo '<div class="wpfp-page-before">'.$wpfp_before.'</div>';
    endif;

    echo "<ul>";
    if ($favorite_post_ids) {
		$favorite_post_ids = array_reverse($favorite_post_ids);
        $post_per_page = wpfp_get_option("post_per_page");
        $page = intval(get_query_var('paged'));

        $qry = array('post__in' => $favorite_post_ids, 'posts_per_page'=> $post_per_page, 'orderby' => 'post__in', 'paged' => $page);
        // custom post type support can easily be added with a line of code like below.
        // $qry['post_type'] = array('post','page');
        query_posts($qry);

        while ( have_posts() ) : the_post();?>
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
			  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			          <div class="article">
			            <div class="article_image" style="background-image: url('<?php echo $image[0]; ?>')">
			              <i class="fa article_favourite"><?php wpfp_link() ?> </i>
			            </div>
			            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
			            <div class="article_subheading_wrapper">
			              <p> 
			               <!--Cut the long text -->          
			                <?php                  
			                  $string = substr(get_field("subheading"), 0, 100);
			                  echo $string."… "; 
			                ?>
			              </p>
			            </div>
			          <div class="bottom">
			              <ul>
			                <li><p id="views"><i class="fa fa-eye"></i> <?php echo_views(get_the_ID()); ?></p></li>
			                <li><p id="likes"><i class="fa"></i><?php
							if(function_exists('like_counter_p')) { like_counter_p('&#xf164;'); }
							?></p></li>
			                <li><p id="comments"><i class="fa fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></p></li>
			              </ul>       
			          </div>

			            <!--Color of the category -->

			          <?php 
			            $term_slug = get_query_var( 'term' );
			            $taxonomyName = get_query_var( 'taxonomy' );
			            $current_term = get_term_by( 'slug', $term_slug, $taxonomyName );
			            $term_id = $current_term->term_id;          
			            $color_field = get_tax_meta($term_id,'ba_color_field_id');
			            echo '<div class="category_color" style="background-color:'. $color_field .';"></div>'
			          ?>
			        </div>
			  <?php endif; ?>
		<?php
        endwhile;
/*
        echo '<div class="navigation">';
            if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
            <div class="alignleft"><?php next_posts_link( __( '&larr; Previous Entries', 'buddypress' ) ) ?></div>
            <div class="alignright"><?php previous_posts_link( __( 'Next Entries &rarr;', 'buddypress' ) ) ?></div>
            <?php }
        echo '</div>';
*/
        wp_reset_query();
    } else {
        $wpfp_options = wpfp_get_options();
        echo "<li>";
        echo $wpfp_options['favorites_empty'];
        echo "</li>";
    }
    echo "</ul>";

    echo '<p>'.wpfp_clear_list_link().'</p>';
    echo "</div>";
    wpfp_cookie_warning();
