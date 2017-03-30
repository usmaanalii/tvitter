<!--
    - In the top right corner of each post will be a link to the
    profile of the sender
    -
    - If the post was made to another user, then the top right corner will
    consist of (sender) to (recipient), both of which will be links leading
    back to the respective profile pages
    -
    - The javascript code that deletes posts based on the clicking of the button with the class 'delete-post-button' is dependent on the node structure of the html tags
    - If the structure is changed, the query selectors in src/js/ajax need to be changed to match
 -->
<?php foreach ($posts as $post): ?>

        <div class="post">
            <?php if ($post['sender_username'] != $post['recipient_username']): ?>
                <p class = "post-usernames">
                    <a href="profile.php?username=<?php echo $post['sender_username']; ?>"><?php echo $post['sender_username']; ?></a> to
                    <a href="profile.php?username=<?php echo $post['recipient_username']; ?>"><?php echo $post['recipient_username']; ?></a>
                </p>
            <?php else: ?>
                <p class = "post-usernames">
                    <a href="profile.php?username=<?php echo $post['sender_username']; ?>"><?php echo $post['sender_username']; ?></a>
                </p>
            <?php endif; ?>

            <p class="post-body">
                <?php echo $post['post_body']; ?>
                <?php if ($post['sender_username'] == $_GET['username']): ?>
                    <form action="../logic/timeline.php?username=<?php echo $_SESSION['username']; ?>" method="post">
                        <input type="hidden" name="post-recipient" value="<?php echo $post['recipient_username'] ?>">
                        <input type="hidden" name="delete-post-id" value="<?php echo $post['post_id'] ?>">
                        <input class="delete-button" type="submit" name="delete-post" value="x">
                    </form>
                <?php endif; ?>
            </p>
            <h6 class="post-time"><?php echo $post['post_time']; ?></h6>
        </div>
<?php endforeach; ?>
