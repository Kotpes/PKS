<?php get_header(); ?>

<?php 
$args = array ( 'category' => ID, 'posts_per_page' => 5);
$myposts = get_posts( $args );
foreach( $myposts as $post ) :  setup_postdata($post); ?>
  <?php get_template_part('content', 'article'); ?>
<?php endforeach; ?>


<?php get_footer(); ?>





