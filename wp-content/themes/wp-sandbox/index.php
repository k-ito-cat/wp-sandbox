<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-sandbox
 */
get_header();
?>
<main id="primary" class="site-main">
	<h2 class="main-title">投稿一覧</h2>
	<?php
	if (have_posts()) :

		if (is_home() && !is_front_page()) :
	?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
	<?php
		endif;
		/* Start the Loop */
		while (have_posts()) :
			the_post();
			get_template_part('template-parts/content', get_post_type());
		endwhile;
		the_posts_navigation();
	else :
		get_template_part('template-parts/content', 'none');
	endif;
	?>

	<h2>カテゴリごと投稿</h2>
	<?php wp_list_categories(); ?>

	<h2>カスタム投稿１</h2>
	<?php
	$args = array(
		'post_type' => 'custom-post',
	);

	$my_query = new WP_Query($args);
	?>

	<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

		<p><?php the_time(get_option('date_format')); ?></p>
		<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>


	<h2>カスタム投稿２</h2>
	<?php
	$args = array(
		'post_type' => 'custom-post-2',
	);

	$my_query = new WP_Query($args);
	?>

	<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

		<p><?php the_time(get_option('date_format')); ?></p>
		<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
