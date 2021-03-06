<?php
// Do not delete these lines
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
    if ( post_password_required() ) { ?>
        <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php
        return;
    }
?>

<?php if ( have_comments() ) : ?>
    <h3 id="comments"><?php comments_number('No Responses Yet', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

    <ol id="commentlist">
        <?php wp_list_comments('avatar_size=45'); ?>
    </ol>

    <p><?php edit_comment_link(); ?> || <?php if(function_exists('delete_comment_link')) { delete_comment_link(get_comment_ID()); } ?></p>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
    <nav id="comment-nav-below">
        <div class="nav-previous"><?php previous_comments_link( __()); ?></div>
        <div class="nav-next"><?php next_comments_link( __()); ?></div>
    </nav>
    <?php endif; // check for comment navigation ?>

    <?php else : // this is displayed if there are no comments so far ?>

    <?php if ( comments_open() ) : ?>
        <!-- If comments are open, but there are no comments. -->
    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->
        <p class="nocomments">Comments are closed.</p>
    <?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<?php comment_form(); ?>

<?php endif; ?>