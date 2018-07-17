<?php get_header(); ?>




<!--middle-->
<div class="middle">
    <div class="container">
        <div class="row">


            <div class="col-lg-9 col-sm-12">
                <div class="list-post">
                    <div class="row">
                        <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                get_template_part( 'loop/content', get_post_format() );
                endwhile; ?>
                    </div>
                </div>
                <?php
                echo  greeky_pagination();  
            ?>
            </div>
            <div class="col-lg-3 col-sm-12">
                <?php get_sidebar(); ?>

            </div>


        </div>





    </div>
</div>
<?php
get_footer();
