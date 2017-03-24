<!--
    - If the user is on his own profile, then a blank space will be
    printed before the post
    - Else the user's name will be printed prefixed with @ before
    the post
    -
    - In the top right corner of each post will be the
    recipient_username
    -
    - Both, the prefixed sender_username and recipient_username will
    be hyperlinks leading to the profile pages
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
            </p>

        </div>
<?php endforeach; ?>
