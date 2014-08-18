<?php
//VAR SETUP
$sliderCat = get_option('themolitor_slider_category');
$sliderNumber = get_theme_mod('themolitor_customizer_slider_number');
$todaysdate = getdate();
$slider_q_args = array(
   'showposts' => $sliderNumber,
   'cat' => $sliderCat,
   'orderby' => 'date',
   'order' => 'ASC',
   'date_query' => array( 
   		array(
   			'after' => 'today',
   			'inclusive' => true,
		),
	),
);
?>

<!--SLIDER-->
<div id="slider">
	<ul class="slides">
		<?php $showPostsInCategory = new WP_Query(); $showPostsInCategory->query( $slider_q_args );  ?>
		<?php if ($showPostsInCategory->have_posts()) :?>
		<?php while ($showPostsInCategory->have_posts()) : ?>
		<?php $showPostsInCategory->the_post(); ?>
		<li>
			<div class="sliderInfo">
				<div class="sliderDate"><?php echo get_the_time('m.d.Y'); ?></div> <br>
				<a class="sliderTitle" href="<?php the_permalink();?>"><?php the_title();?></a><br />
				
			</div>
			<a id="sliderphotolink" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('slider'); ?>
			</a>

		</li>
		<?php endwhile; endif; ?>
	</ul>
</div>