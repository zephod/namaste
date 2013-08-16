<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
  <script type="text/javascript">
    <?php
      $banner_url = '';
      if ( has_post_thumbnail()) {
       $banner_url = wp_get_attachment_image_src( get_post_thumbnail_id());
       $banner_url = $banner_url[0];
      }
    ?>
    window.forrest_banner = '<?php echo $banner_url;?>';
  </script>
<?php endwhile; ?>
