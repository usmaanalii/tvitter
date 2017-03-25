<!--
    - In the top right corner of each post will be a link to the
    profile of the sender
    -
    - If the post was made to another user, then the top right corner will
    consist of (sender) to (recipient), both of which will be links leading
    back to the respective profile pages
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
                    <button type="button" class="delete-post-button">x</button>
                <?php endif; ?>
            </p>

        </div>
<?php endforeach; ?>
