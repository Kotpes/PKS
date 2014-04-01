<?php if(is_single()): ?>
      <script type="text/javascript">
      $(document).ready(function(){
        $('span#expand').click(function() {
          $(this).parent('.expand').removeClass('expand').addClass('expanded');
          $(this).remove();
        });
      });
    </script>

  <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
 
  <h3><?php the_title(); ?></h3>
  <div class="main_article">
      <div class="container">
      <div id="back_to_article_search"><a href="#" ><i class="fa fa-chevron-left"></i> OPASHAKU</a></div>
        <div class="row">
        <!-- ARTICLE -->

          <div class="main col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="article_image" style="background-image: url('<?php echo $image[0]; ?>')">
            
            <!-- CATEGORY COLOR BOTTOM -->
            <?php 
              $term_slug = get_query_var( 'term' );
              $taxonomyName = get_query_var( 'taxonomy' );
              $current_term = get_term_by( 'slug', $term_slug, $taxonomyName );
              $term_id = $current_term->term_id;          
              $color_field = get_tax_meta($term_id,'ba_color_field_id');
              echo '<div class="article_color" style="background-color:'. $color_field .';"></div>'
            ?>
                        
            </div>
            <div class="row">
              <div class="heading col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><?php the_title(); ?></h2>
                <span class="article_authors">
                  <p>Kirjoittajat:</p>
                  <?php
                  if ( function_exists( 'coauthors_posts_links' ) ) {
                      coauthors_posts_links();
                  } else {
                      the_author_posts_link();
                  }
                  ;?>
                </span>
                <p class="subtitle">
                  <?php the_field("subheading"); ?>
                </p>                
              </div>
              <div class="user_tools col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <ul>
                      <li><p>KATSOTTU <span id="views">(<?php echo_views(get_the_ID()); ?>)</span></p></li>
                      <li><p>TYKKÄÄ <span id="likes">(88)</span></p></li> 
                      <li><p>KOMMENTIT <span id="comments">(<?php comments_number( '0', '1', '%' ); ?>)</span></p></li>
                      </ul>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <ul>
                      <li><img id="eye" src="<?php bloginfo('template_directory'); ?>/icons/watched_icon.svg"></li>
                      <li><img id="like" src="<?php bloginfo('template_directory'); ?>/icons/like_icon.svg"></li> 
                      <li><i class="fa fa-comment"></i></li>
                      </ul>
                      <table>
                        <tr>
                          <th><img id="eye" src="<?php bloginfo('template_directory'); ?>/icons/watched_icon.svg"></th>
                          <th><img id="like" src="<?php bloginfo('template_directory'); ?>/icons/like_icon.svg"></th>
                          <th><i class="fa fa-comment"></i></th>
                        </tr>
                        <tr>
                          <td><span id="views">(<?php echo_views(get_the_ID()); ?>)</span></td>
                          <td><span id="likes">(88)</span></td>
                          <td><span id="comments">(<?php comments_number( '0', '1', '%' ); ?>)</span></td>
                        </tr>
                      </table>
                  </div>
                </div>                
              </div>
            </div>
            <div class="article_content">
              <?php the_field("kiinnostu"); ?>

             <!-- SLIDER -->
             <?php // image gallery content 
                if( has_shortcode( $post->post_content, 'gallery' ) ) {                     
                    $gallery = get_post_gallery_images( $post->ID );


                    $image_list = '<div class="slider"> ';                       
                    foreach( $gallery as $image ) {// Loop through each image in each gallery
                        $image_list .= '
                        <div class="slide">
                          <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                              <div class="article_slider_image" style="background-image: url(' . str_replace('-150x150','',$image) . ')"; /></div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                              <div class="wp-caption-text">
                                <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                                </p>
                              </div>
                            </div>
                          </div>                        
                        </div>';
                    }
                    $image_list .= '</div>';                     
                    echo $image_list;                       
                }                         
              ?> 

              <!-- Main content -->
              <?php the_field("main_content"); ?>

              
            </div>

            <div class="article_comments">
              <h2>Kommentit</h2>
              <?php comments_template(); ?>
            </div>    
          </div>
        <!-- SIDEBAR -->
          <div class="side_article col-lg-2 col-md-2">
            <div class="share">
                <h3>JAA IDEA</h3>
                <ul class="social">
                  <li><a class="facebook link" href="https://www.facebook.com/sharer/sharer.php?u=<?php bloginfo('url'); ?>" target="_blank" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter link" href="http://twitter.com/share?url=%20&amp;text=PKS OSAAVA <?php bloginfo('url'); ?>" target="_blank" title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php the_title(); ?>&summary=<?php the_field("subheading"); ?>&source=<?php bloginfo('url'); ?>
" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="tags">
              <h3>AIHESANAT</h3>
              <?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
            </div>
            <div class="student_comments">
              <h3>OPPILAIDEN KOMMENTTEJA</h3>
              <div class="comment">
                <p>
                  <?php the_field("first_comment_on_article"); ?>
                </p>
                <span><p>- <?php the_field("first_commenters_name"); ?></p></span>
                <div class="quote_tail">
                  <span style="display: inline-block; width: 10px; height: 20px"><span style="position: relative; display: inline-block; width: 10px; height: 20px"><i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border:5px solid transparent;border-left:5px solid #12203f;border-top:5px solid #12203f;left:0px;top:0px"></i></span></span>
                </div>
              </div>

              <div class="comment">
                <p>
                  <?php the_field("second_comment_on_article"); ?>
                </p>
                <span><p>- <?php the_field("second_commenters_name"); ?></p></span>
                <div class="quote_tail">
                  <span style="display: inline-block; width: 10px; height: 20px"><span style="position: relative; display: inline-block; width: 10px; height: 20px"><i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border:5px solid transparent;border-left:5px solid #12203f;border-top:5px solid #12203f;left:0px;top:0px"></i></span></span>
                </div>
              </div>
                         
            </div>
            <div class="licensing">
              <h3>KÄYTÄ MITEN HALUAT</h3>
              <img src="<?php bloginfo('template_directory'); ?>/img/cc.png">
            </div>
            <div class="related_articles">            
              <h3>MUUT KATEGORIASSA ANIMAATIO</h3>
              <?php
              $categories = get_the_category();
              $category_id = $categories[0]->cat_ID;              
                query_posts('cat='.$category_id.'&posts_per_page=2');
                while (have_posts()) : the_post();
                  get_template_part('content', 'article');
                endwhile;
              ?>              
            </div>
          </div>
        </div>
      </div>
    </div>

    

<?php endif; ?>
  


<?php endif; ?>