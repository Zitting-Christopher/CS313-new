<?php
define('WP_USE_THEMES', false);
require('./wp-blog-header.php');

$num = $_GET["numberposts"] ?: '10';
$cat = $_GET["catid"];
$postID = $_GET["postid"];
$type = $_GET["type"];

switch ($type){
   case "singlePost":
      $posts = get_posts('p='.$postID.'&numberposts=1');
      break;
   case "catFeed":
      $posts = get_posts('category='.$cat.'&numberposts='.$num.'&order=ASC');
      break;
   default:
      $posts = get_posts('numberposts='.$num.'&order=ASC');
}
?>
<!DOCTYPE html>
<html>
<body>
      <?php foreach ($posts as $post) : start_wp();?>
          <h4></h4><a href="<?php the_permalink_rss() ?>"><?php the_title();?></a>
		  <h5><?php the_author();?></h5>
            <?php the_date();?>
            <?php the_excerpt();?>
            <?php if($type == "singlePost"){
               the_content();
            }
			
			endforeach; ?>
</body>
</html>