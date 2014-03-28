<?php
// Left menu
?>

<aside id="submenu" role="complementary" class="span3">


  <nav>

    <h3><?php the_title(); ?></h3>
    <?php
    if($post->post_parent)
      $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
    else
      $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
      // Add icon html before the LI with link_before -
      // $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&link_before=<i class="icon-something"></i>');
    if ($children) { ?>
    <ul class="submenu-children">
      <?php echo $children; ?>
    </ul>
    <?php } ?>
  </nav>


</aside>
