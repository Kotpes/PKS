<?php if(is_single()): ?>

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
              <div class="article_color" style="background-color: #E89F22;"></div>            
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
                      <li><p>KATSOTTU <span id="views">(203)</span></p></li>
                      <li><p>TYKKÄÄ <span id="likes">(88)</span></p></li> 
                      <li><p>KOMMENTIT <span id="comments">(88)</span></p></li>
                      </ul>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                      <ul>
                      <li><img id="eye" src="icons/watched_icon.svg"></li>
                      <li><img id="like" src="icons/like_icon.svg"></li> 
                      <li><i class="fa fa-comment"></i></li>
                      </ul>
                      <table>
                        <tr>
                          <th><img id="eye" src="icons/watched_icon.svg"></th>
                          <th><img id="like" src="icons/like_icon.svg"></th>
                          <th><i class="fa fa-comment"></i></th>
                        </tr>
                        <tr>
                          <td><span id="views">(203)</span></td>
                          <td><span id="likes">(88)</span></td>
                          <td><span id="comments">(88)</span></td>
                        </tr>
                      </table>
                  </div>
                </div>                
              </div>
            </div>
            <div class="article_content">
              <?php the_field("kiinnostu"); ?>

             

              <?php the_content(); ?>
            </div>
            <div class="article_comments">
              <h2>Kommentit</h2>
            </div>    
          </div>
        <!-- SIDEBAR -->
          <div class="side_article col-lg-2 col-md-2">
            <div class="share">
                <h3>JAA IDEA</h3>
                <ul class="social">
                  <li><i class="fa fa-facebook"></i></li>
                  <li><i class="fa fa-twitter"></i></li>
                  <li><i class="fa fa-linkedin"></i></li>
                </ul>
            </div>
            <div class="tags">
              <h3>AIHESANAT</h3>
              <ul>
                <li>Animaatio</li>
                <li>Stop-motion</li>
                <li>Lorem</li>
                <li>Ipsum</li>
                <li>Dolor</li>
                <li>Consectur</li>
                <li>Amisept</li>
              </ul>
            </div>
            <div class="student_comments">
              <h3>OPPILAIDEN KOMMENTTEJA</h3>
              <div class="comment">
                <p>
                  “Elit consequat ipsum, nec
                  sagittis sem nibh id elit.
                  Duis sed odio sit amet nibh
                  vulputate cursus a sit”
                </p>
                <span><p>- Juuso, 5.lk</p></span>
                <div class="quote_tail">
                  <span style="display: inline-block; width: 10px; height: 20px"><span style="position: relative; display: inline-block; width: 10px; height: 20px"><i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border:5px solid transparent;border-left:5px solid #12203f;border-top:5px solid #12203f;left:0px;top:0px"></i></span></span>
                </div>
              </div>
              <div class="comment">
                <p>
                  “Elit consequat ipsum, nec
                  sagittis sem nibh id elit.
                  Duis sed odio sit amet nibh
                  vulputate cursus a sit”
                </p>
                <span><p>- Juuso, 5.lk</p></span>
                <div class="quote_tail">
                  <span style="display: inline-block; width: 10px; height: 20px"><span style="position: relative; display: inline-block; width: 10px; height: 20px"><i style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border:5px solid transparent;border-left:5px solid #12203f;border-top:5px solid #12203f;left:0px;top:0px"></i></span></span>
                </div>
              </div>            
            </div>
            <div class="licensing">
              <h3>KÄYTÄ MITEN HALUAT</h3>
              <img src="img/cc.png">
            </div>
            <div class="related_articles">
              <h3>MUUT KATEGORIASSA ANIMAATIO</h3>
              <div class="article">
                  <div class="article_image" style="background-image: url(img/kids1.jpg);"><i class="fa fa-star-o"></i></div>
                  <h3>PROIN GRAVIDA</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="bottom">
                  <ul>
                    <li><p id="views"><i class="fa fa-eye"></i> 42</p></li>
                    <li><p id="likes"><i class="fa fa-thumbs-up"></i> 207</p></li>
                    <li><p id="comments"><i class="fa fa-comment"></i> 16</p></li>
                  </ul>       
                </div>
                <div class="article_color" style="background-color: #9F2FF0;"></div>  
              </div>
              <div class="article">
                <div class="article_image" style="background-image: url(img/kids1.jpg);"><i class="fa fa-star-o"></i></div>
                <h3>PROIN GRAVIDA</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="bottom">
                  <ul>
                    <li><p id="views"><i class="fa fa-eye"></i> 42</p></li>
                    <li><p id="likes"><i class="fa fa-thumbs-up"></i> 207</p></li>
                    <li><p id="comments"><i class="fa fa-comment"></i> 16</p></li>
                  </ul>       
                </div>
                <div class="article_color" style="background-color: #9F2FF0;"></div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  

<?php endif; ?>
  

<?php else: ?>
  <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
          <div class="article">
            <div class="article_image" style="background-image: url('<?php echo $image[0]; ?>')">
              <i class="fa fa-star article_favourite"></i>
            </div>
            <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="article_subheading_wrapper">
              <p>           
                <?php the_field("subheading"); ?>
              </p>
            </div>
          <div class="bottom">
              <ul>
                <li><p id="views"><i class="fa fa-eye"></i> <?php echo_views(get_the_ID()); ?></p></li>
                <li><p id="likes"><i class="fa fa-thumbs-up"></i> 207</p></li>
                <li><p id="comments"><i class="fa fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></p></li>
              </ul>       
            </div>
            <?php
              global $post;
              $terms = get_term_by($post->ID, 'category');
              $term_id = $terms[0]->term_id;              
              $color_field = get_tax_meta($term_id,'ba_color_field_id');
              echo '<p>'. $color_field . '</p>';
            ?>
            <div class="article_color" style="background-color: #9F2FF0;"></div>  
          </div>

  <?php endif; ?>
<?php endif; ?>