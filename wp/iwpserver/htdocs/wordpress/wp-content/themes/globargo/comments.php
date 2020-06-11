<?php
/**
* The template for displaying comments
*
* This is the template that displays the area of the page that contains both the current comments
* and the comment form.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package belsip
*/

/*
* If the current post is protected by a password and
* the visitor has not yet entered the password we will
* return early without loading the comments.
*/

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
    <?php
// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>

    <div class="detail-caption">
        <span>
            <?php comments_number( esc_html( '0 comments', 'belsip' ),  esc_html( '1 comments', 'belsip' ), esc_html( '% comments', 'belsip' ) ); ?> </span>
    </div>
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <?php endif; // Check for comment navigation. ?>

    <ol class="comment-list">
        <?php
		wp_list_comments( array(
			'style'      => 'ol',
			'short_ping' => true,
			) );
			?>
    </ol><!-- .comment-list -->
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <div class="paging">
        <?php 
//Create pagination links for the comments on the current post, with single arrow heads for previous/next
				paginate_comments_links( array('prev_text' => 'Prev', 'next_text' => 'Next')); 
				?>
    </div>
    <?php
endif; // Check for comment navigation.
endif; // Check for have_comments().
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    <p class="no-comments">
        <?php esc_html_e( 'Comments are closed.', 'belsip' ); ?>
    </p>
    <?php
endif;
//comment_form();
?>
    <?php
$comment_form = array( 
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="row"> <div class="col-md-6 col-sm-6 col-xs-12">' .
		'<div class="field-item">'.	
		'<p class="field-caption">'.esc_html("Name","belsip").' <span>*</span></p>'.
		'<input id="author" name="author" placeholder=" " type="text" value="' .
		esc_attr( $commenter['comment_author']) . '" tabindex="1" />' .
		'</div>' .
		'</div>',
		'email'  => '<div class="col-md-6 col-sm-6 col-xs-12">' .
		'<div class="field-item">'.
		'<p class="field-caption">'.esc_html("Email","belsip").' <span>*</span></p>'.
		'<input id="email" name="email" placeholder="" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" tabindex="2" />' .
		'</div>' .
		'</div>' .
		'</div>',
		) ),

	'comment_field' => ' <div class="field-item">' .
	'<p class="field-caption">'.esc_html("Comment","belsip").' <span>*</span></p>'.
	'<textarea id="comment" name="comment" aria-required="true" placeholder=""></textarea>' .
	'</div>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'title_reply' => '<span>'.esc_html("Leave a reply","belsip").'</span>' ,
	'label_submit' => esc_html("SUBMIT","belsip"),
	'class_submit'=>'my-btn my-btn-dark',
	'logged_in_as' => '',
	);
comment_form($comment_form, $post->ID); 
?>
</div><!-- #comments -->
