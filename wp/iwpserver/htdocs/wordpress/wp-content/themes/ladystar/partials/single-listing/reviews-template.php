<?php 
// Reviews Template to be set later
?>

<div class="widget widget-box box-container widget-property-reviews">

    <section class="widget-reviews" id="form_review">
        <h3 class="section-title lines">Recent Reviews</h3>
        <div class="rewiew-section">
            <div class="all-review list-reviews m15">
                <article class="blog-comment">
                    <div class="author-photo-wr">
                        <a href="http://www.ladystar.eu/agent-profile/ketysprings">
                            <img src="https://www.gravatar.com/avatar/4d0532edb04e2bb17f372f279c2b24f8?s=75&amp;d=mm&amp;r=g" alt="Kety Springs">
                        </a>
                    </div>
                    <div class="author-content">
                        <header class="comment-header">
                            <h3 class="author-name">Kety Springs</h3>
                            <p class="rating">
                                <i class="fa fa-star active" aria-hidden="true"></i>
                                <i class="fa fa-star active" aria-hidden="true"></i>
                                <i class="fa fa-star active" aria-hidden="true"></i>
                                <i class="fa fa-star active" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </p>
                            <p class="publish">20 January, 2019</p>
                        </header>
                        <div class="block-content">
                            <p>
                                This is simply dummy text of the printing and typesetting industry. That has been the industry dummy text ever since the 1500s, when an unknown printer took a galley. </p>
                            <ul class="files files-list reviews-files-list clearfix" data-toggle="modal-gallery" data-target="#modal-gallery">
                            </ul>
                            <div class="rev_smiles">
                                <div class="rev_smile rev_smile-like" data-loginpopup="true" data-ajax="http://www.ladystar.eu/wp-admin/admin-ajax.php?lang=en" data-revtype="like" data-review="25">
                                    <div class="rev_smile-name">Like</div>
                                    <div class="icon fa fa-thumbs-up"></div>
                                    <div class="rev_smile-count">
                                        12 </div>
                                </div>
                                <div class="rev_smile rev_smile-love" data-loginpopup="true" data-ajax="http://www.ladystar.eu/wp-admin/admin-ajax.php?lang=en" data-revtype="like" data-review="25">
                                    <div class="rev_smile-name">Love</div>
                                    <div class="icon fa fa-heart"></div>
                                    <div class="rev_smile-count">
                                        14 </div>
                                </div>

                                <div class="rev_smile rev_smile-angry" data-loginpopup="true" data-ajax="http://www.ladystar.eu/wp-admin/admin-ajax.php?lang=en" data-revtype="like" data-review="25">
                                    <div class="rev_smile-name">Angry</div>
                                    <div class="icon fa fa-thumbs-up unlike"></div>
                                    <div class="rev_smile-count">
                                        7 </div>
                                </div>
                                <i class="reviev_ajax_loader hidden fa fa-spinner fa-spin ajax-indicator"></i>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="blog-comment">
                    <div class="author-photo-wr">
                        <a href="http://www.ladystar.eu/agent-profile/user">
                            <img src="https://www.gravatar.com/avatar/97a504d90ee1fd3b5992d4fdeddb9204?s=75&amp;d=mm&amp;r=g" alt="Test User">
                        </a>
                    </div>
                    <div class="author-content">
                        <header class="comment-header">
                            <h3 class="author-name">Test User</h3>
                            <p class="rating">
                                <i class="fa fa-star active" aria-hidden="true"></i>
                                <i class="fa fa-star active" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </p>
                            <p class="publish">20 January, 2019</p>
                        </header>
                        <div class="block-content">
                            <p>
                                This is simply dummy text of the printing and typesetting industry. That has been the industry dummy text ever since the 1500s, when an unknown printer took a galley. </p>
                            <ul class="files files-list reviews-files-list clearfix" data-toggle="modal-gallery" data-target="#modal-gallery">
                            </ul>
                            <div class="rev_smiles">
                                <div class="rev_smile rev_smile-like" data-loginpopup="true" data-ajax="http://www.ladystar.eu/wp-admin/admin-ajax.php?lang=en" data-revtype="like" data-review="24">
                                    <div class="rev_smile-name">Like</div>
                                    <div class="icon fa fa-thumbs-up"></div>
                                    <div class="rev_smile-count">
                                        15 </div>
                                </div>
                                <div class="rev_smile rev_smile-love" data-loginpopup="true" data-ajax="http://www.ladystar.eu/wp-admin/admin-ajax.php?lang=en" data-revtype="like" data-review="24">
                                    <div class="rev_smile-name">Love</div>
                                    <div class="icon fa fa-heart"></div>
                                    <div class="rev_smile-count">
                                        17 </div>
                                </div>

                                <div class="rev_smile rev_smile-angry" data-loginpopup="true" data-ajax="http://www.ladystar.eu/wp-admin/admin-ajax.php?lang=en" data-revtype="like" data-review="24">
                                    <div class="rev_smile-name">Angry</div>
                                    <div class="icon fa fa-thumbs-up unlike"></div>
                                    <div class="rev_smile-count">
                                    </div>
                                </div>
                                <i class="reviev_ajax_loader hidden fa fa-spinner fa-spin ajax-indicator"></i>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <form action="#form_review" method="post" class="form rate-form">
                <p class="title">Write Review</p>
                <div class="rate-model">
                    <p class="rating">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </p>
                    <p class="hidden" id="rating-value">
                        <input type="radio" name="stars" value="1">
                        <input type="radio" name="stars" value="2">
                        <input type="radio" name="stars" value="3">
                        <input type="radio" name="stars" value="4">
                        <input type="radio" name="stars" value="5">
                    </p>
                    <span>Rate Model</span>
                </div>
                <input class="hidden" id="widget_id" name="widget_id" type="text" value="review">
                <textarea id="inputMessageR" name="message" placeholder="Message"></textarea>

                <input class="hidden" name="repository_id" type="text" value="741">
                <div class="profile-uiploadimage">
                    <div id="page-files-741" rel="repository_m">
                        <!-- The file upload form used as target for the file upload widget -->
                        <div class="fileupload fileupload-custom" id="fileupload_741">
                            <div role="presentation" class="fieldset-content">
                                <ul class="files files-list reviews-files-list clearfix" data-toggle="modal-gallery" data-target="#modal-gallery">
                                </ul>
                            </div>
                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <noscript>
                                <input type="hidden" name="redirect" value="http://www.ladystar.eu/admin/estate/edit/">
                            </noscript>
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="fileupload-buttonbar row hidden">
                                <div class="col-md-12 ">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success fileinput-button">
                                                        <i class="icon-plus icon-white"></i>
                                                        <span>Addfiles</span>
                                    <input type="file" name="files[]" class="file-btn" multiple="">
                                    </span>
                                    <button type="reset" class="btn btn-warning cancel">
                                        <i class="icon-ban-circle icon-white"></i>
                                        <span>Cancelupload</span>
                                    </button>
                                    <button type="button" class="btn btn-danger delete">
                                        <i class="icon-trash icon-white"></i>
                                        <span>Delete</span>
                                    </button>
                                    <input type="checkbox" class="toggle hidden">
                                </div>
                                <!-- The global progress information -->
                                <div class="col-md-12 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div id="progress-upload" class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="bar" style="width:0%;"></div>
                                    </div>
                                    <!-- The extended global progress information -->
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
                            </div>
                            <div class="fileupload-loading"></div>
                        </div>
                    </div>
                </div>
                <div id="dropzone-741" class="dropzone fade well">
                    <div class="dropzone-content">
                        <svg class="dropzone_icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43">
                            <path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"></path>
                        </svg>
                        <div class="dropzone-content-notice">
                            <strong>Choose a images</strong> <span class="box__dragndrop">or drag it here</span>.
                        </div>
                    </div>
                    <div class="loading_mask hidden"><i class="fa fa-spinner fa-spin fa-custom-ajax-indicator"></i></div>
                </div>
                <div class="clear"></div>
                <div class="cliearfix">
                    <button type="submit" class="btn-classic   login_popup_enabled ">Post Review</button>
                </div>
            </form>

        </div>
    </section>

</div>