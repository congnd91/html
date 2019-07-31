<?php get_header(); ?>
    <!-- Posts List -->
    <div class="container blog-entry blog-standart">
        <div class="row blog-entry-wr">
            <?php
            
            if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'post');
                endwhile;
                ?>
                <?php the_posts_pagination(); ?>
            <?php
            else :
                get_template_part('template-parts/post/content', 'none');
            endif;
            
            ?>
        </div>
    </div>
    <!-- End Post List -->

<?php get_footer(); ?>