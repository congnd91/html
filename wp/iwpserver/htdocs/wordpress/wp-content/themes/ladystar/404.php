<?php get_header(); ?>

    <!-- Posts List -->
    <div class="container blog-entry blog-standart">
        <div class="blog-entry-wr" style="margin-top:90px;">
            <div class="devon-not-found">
                <h1>Oops! That page can't be found.</h1>
                <h4>It looks like nothing was found at this location. Maybe try a search?</h4>
                <center>
                    <div class="smart-search-form devon-404">
                        <?php get_search_form(); ?>
                    </div>
                </center>
                <h4>Or</h4>
                <a class="btn btn-primary" href="<?php echo pll_home_url() ?>" style="text-decoration: none">Go Home</a>
            </div>
        </div>
    </div>
    <!-- End Post List -->

<?php get_footer(); ?>