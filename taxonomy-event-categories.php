<?php
/**
* This template can be used as a boilerplate template for the event category. To use this, follow these steps:
*
* Ensure that you have set 'Override with Formats' to 'No' in Events > Settings > Pages > Event Categories
* Name this file taxonomy-event-categories.php and put it in your theme folder.
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Twenty_Twelve
*/

get_header();
//get the taxonomy object and convert it to EM_Category for output
$taxonomy = get_queried_object();
$EM_Category = em_get_category($taxonomy->term_id);
?>
<?php get_header(); ?>

<section id="main-content" class="span8">

  <?php
//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

  $taxonomy     = 'event';
  $orderby      = 'name';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title
  );
  ?>

  <ul>
    <?php wp_list_categories( $args ); ?>
  </ul>

  <article>
    <header class="entry-header">
      <h1 class="entry-title">
        <?php echo $EM_Category->output(get_option('dbem_category_page_title_format')); ?>
      </h1>
    </header>

    <div class="entry-content">


      <?php echo $EM_Category->output_single(); ?>





    </div><!-- .entry-content -->
  </article><!-- #post -->

</section><!-- #main-content -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
