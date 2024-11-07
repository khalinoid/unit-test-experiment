<?php
/**
 * Template for displaying author profile
 */

get_header();

// Get the author object that was set in the main plugin file
$author = get_query_var('author');
?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Author Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex items-start space-x-6">
                <div class="flex-shrink-0">
                    <?php echo get_avatar($author->ID, 150, '', '', array('class' => 'rounded-full')); ?>
                </div>
                
                <div class="flex-1">
                    <h1 class="text-3xl font-bold mb-2">
                        <?php echo esc_html($author->display_name); ?>
                    </h1>
                    
                    <?php if ($author->description): ?>
                        <div class="text-gray-600 mb-4">
                            <?php echo wp_kses_post($author->description); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="text-sm text-gray-500">
                        <p>Member since: <?php echo date('F Y', strtotime($author->user_registered)); ?></p>
                        <p>Posts published: <?php echo count_user_posts($author->ID); ?></p>
                        <?php 
                            $website = get_the_author_meta('user_url', $author->ID);
                            if ($website): 
                        ?>
                            <p>Website: <a href="<?php echo esc_url($website); ?>" class="text-blue-500 hover:underline"><?php echo esc_html($website); ?></a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Author Posts -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6">Latest Posts</h2>
            
            <?php
            $author_posts = new WP_Query(array(
                'author' => $author->ID,
                'posts_per_page' => 5,
                'post_type' => 'post',
                'post_status' => 'publish'
            ));

            if ($author_posts->have_posts()):
                while ($author_posts->have_posts()): $author_posts->the_post();
            ?>
                <article class="mb-6 pb-6 border-b border-gray-200 last:border-0">
                    <h3 class="text-xl font-semibold mb-2">
                        <a href="<?php the_permalink(); ?>" class="text-blue-600 hover:underline">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    
                    <div class="text-sm text-gray-500 mb-2">
                        <?php echo get_the_date(); ?> | 
                        <?php echo get_the_category_list(', '); ?>
                    </div>
                    
                    <div class="text-gray-600">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
            ?>
                <p class="text-gray-600">No posts found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>