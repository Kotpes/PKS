<?php if(is_single()): ?>
  
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
     
    <?php the_content(); ?>
  
  
 
 
<?php else: ?>
  <?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  
        <?php the_content('<i class="icon-eye-open" data-toggle="tooltip" data-pacement="top" title="Продолжить чтение"></i>', true); ?>       
      </div>
    </div>    
  <?php endif; ?>
<?php endif; ?>