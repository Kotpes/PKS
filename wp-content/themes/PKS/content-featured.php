<?php if(is_single()): ?>

  <div class="faded_bg">
    <div class="order_form">
    <i class="fa fa-times exit"></i>
      <form role="form" class="form" action="../send.php" method="POST" name="form" id="form">
      <legend><h4><?php the_title(); ?></h4></legend>
        <div class="form-group">        
          <input type="text" class="form-control input-lg" name="name" id="name" placeholder="Ваше имя" required>
        </div>
        <div class="form-group">        
          <input type="tel" class="form-control input-lg" name="phone" id="phone" placeholder="Номер телефона" required>
        </div>
        <div class="form-group">
          <input type="email" class="form-control input-lg" name="email" id="email" placeholder="Ваш email" required>
        </div>
        <div class="form-group">        
          <textarea class="form-control input-lg" rows="3" name="message" placeholder="Ваши пожелания" id="message"></textarea>
        </div>
        <button type="submit" class="btn btn-default btn-block btn-lg">Отправить</button>
      </form>
    </div>
  </div>
  
<div class="featured_description">
  <div class="w-row">
    <div class="w-col w-col-9 name_n_info">
      <h3 class="featured_name"><?php the_title(); ?></h3>
      <p>- <?php the_field("description_1"); ?></p>
      <p>- <?php the_field("description_2"); ?></p>
      <p>- <?php the_field("description_3"); ?></p>
      <p>- <?php the_field("pax_amount"); ?></p>
    </div>
    <div class="w-col w-col-3 w-clearfix price_n_order">
      <h3 class="price"><?php the_field("pice"); ?> <i class="fa fa-rub"></i></h3>
      <a class="btn btn-outline-inverse btn-lg order" href="#">ЗАКАЗАТЬ</a>            
    </div>
  </div>
</div>
  
<?php // image gallery content 
  if( has_shortcode( $post->post_content, 'gallery' ) ) {                     
      $gallery = get_post_gallery_images( $post->ID );


      $image_list = '<div class="bxslider"> ';                       
      foreach( $gallery as $image ) {// Loop through each image in each gallery
          $image_list .= '<div class="featured_slider" style="background-image: url(' . str_replace('-150x150','',$image) . ')"; />
          <div class="featured_slider_gradient"></div>
          </div>';
      }
      $image_list .= '</div>';                     
      echo $image_list;                       
  }                         
?> 
  <div class="w-container description">
    <div>
      <i class="fa fa-info-circle"></i>     
      <p>
        <?php the_field("full_description"); ?>
      </p>      
    </div>
  </div>


  <div class="w-container docs">
    <div class="w-row">
     <div class="w-col w-col-3 w-clearfix doc">
        <a href='<?php the_field("doc_1_file"); ?>' target="_blank" class="link"><i class="fa fa-file-text-o"></i></a>
        <p><?php the_field("doc_1"); ?></p>
     </div>
     <div class="w-col w-col-3 w-clearfix doc">
        <a href='<?php the_field("doc_2_file"); ?>' target="_blank" class="link"><i class="fa fa-file-text-o"></i></a>
        <p><?php the_field("doc_2"); ?></p>
     </div>
     <div class="w-col w-col-3 w-clearfix doc">
        <a href='<?php the_field("doc_3_file"); ?>' target="_blank" class="link"><i class="fa fa-file-text-o"></i></a>
        <p><?php the_field("doc_3"); ?></p>
     </div>
     <div class="w-col w-col-3 w-clearfix doc">
        <a href='<?php the_field("doc_4_file"); ?>' target="_blank" class="link"><i class="fa fa-file-text-o"></i></a>
        <p><?php the_field("doc_4"); ?></p>
     </div>
    </div> 
  </div>





  <div class="w-container prices">
    <div>
      <i class="fa fa-calendar"></i>
        <?php the_field("price_table"); ?>
    </div>
  </div>
  



<?php else: ?>
  <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

  <div class="featured_slider" style="background-image: url('<?php echo $image[0]; ?>')">
      <div class="featured_slider_gradient"></div>
      <div class="featured_description">
        <div class="w-row">
          <div class="w-col w-col-9 name_n_info">
            <h3 class="featured_name"><?php the_title(); ?></h3>
            <p>- <?php the_field("description_1"); ?></p>
            <p>- <?php the_field("description_2"); ?></p>
            <p>- <?php the_field("description_3"); ?></p>
            <p>- <?php the_field("pax_amount"); ?></p>
          </div>
          <div class="w-col w-col-3 w-clearfix price_n_order">
            <h3 class="price"><?php the_field("pice"); ?> <i class="fa fa-rub"></i></h3>
            <a class="btn btn-outline-inverse btn-lg order" href="<?php the_permalink(); ?>">ПОДРОБНЕЕ</a>            
          </div>
        </div>
      </div>
    </div>  

    <!-- CLICKABLE LINK TO SHIPS PAGE
    <a href="<?php echo get_permalink(); ?>" class="link">
    -->
  <?php endif; ?>
<?php endif; ?>