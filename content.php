<?php
/*
The default template for displaying content. Used for both single and index/page/archive/search.
*/
?>

<?php if(is_singular()): // Display Excerpts for Single/Page ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<?php if(is_single()): // Only Display Excerpts for Single ?>
		<footer class="entry-meta">
			<span class="postdate" datetime="<?php echo get_the_time('Y-m-d') ?>"><?php echo get_post_time( get_option( 'date_format' ) ); ?></span>
			<span class="icon author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
		</footer>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
			'before'		=> '<div class="page-links">' . __( 'Pages:', 'birdsnap' ),
			'after'			=> '</div>',
			'link_before'	=> '<span>',
			'link_after'	=> '</span>'
			) ); ?>
	</div>

	<?php if(is_single()): // Only Display Excerpts for Single ?>
		<footer class="entry-meta">
			<div class="category"><?php the_category(' ') ?></div>
			<?php the_tags('<div class="tag">', ' ', '</div>') ?>
		</footer>
	<?php endif; ?>

<?php else: // Display Excerpts for Home, Search, Archive ?>
	<?php $birdsnap_no_thumbnail = '';
			if(!has_post_thumbnail()):
				$birdsnap_no_thumbnail = 'no-eyecatch' ?>
	<?php endif; ?>

	<li id="post-<?php the_ID(); ?>" <?php post_class($birdsnap_no_thumbnail); ?>>
	
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdsnap' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header>

	<?php if('post' == get_post_type()): ?>
		<footer class="entry-meta">
			<span class="postdate" datetime="<?php echo get_the_time('Y-m-d') ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdsnap' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo get_post_time( get_option( 'date_format' ) ); ?></a></span>
			<span class="icon author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
			<?php if ( comments_open() ) : ?>
				<span class="icon comment"><?php comments_number('0', '1', '%'); ?></span>
			<?php endif; ?>
		</footer>
	<?php endif; ?>

	<?php if('' == $birdsnap_no_thumbnail): ?>
		<div class="entry-eyecatch">
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdsnap' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php the_post_thumbnail( 'large' ); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php if(is_home()): ?>
				<?php the_content( __( 'Continue reading', 'birdsnap' ) ); ?>
			<?php wp_link_pages( array(
				'before'		=> '<div class="page-links">' . __( 'Pages:', 'birdsnap' ),
				'after'			=> '</div>',
				'link_before'	=> '<span>',
				'link_after'	=> '</span>'
				) ); ?>
		<?php else: ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>
	</div>

	</li>
<?php endif; ?>
