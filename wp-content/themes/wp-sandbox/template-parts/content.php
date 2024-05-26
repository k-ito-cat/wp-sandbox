<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp-sandbox
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div>
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) :
		?>
		<?php endif; ?>
	</div>
	<?php
	// 投稿のカテゴリーを取得
	$categories = get_the_category();
	if (!empty($categories)) {
		echo '<ul class="post-categories">';
		foreach ($categories as $category) {
			// カテゴリー名とリンクをリストで表示
			echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
		}
		echo '</ul>';
	} else {
		echo 'カテゴリーがありません';
	}
	?>
	<div>
	</div>

	<?php wp_sandbox_post_thumbnail(); ?>
</article><!-- #post-<?php the_ID(); ?> -->