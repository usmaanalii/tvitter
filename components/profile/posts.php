<!--
    - In the top right corner of each post will be the
    links to the composer of the message
-->
<?php foreach ($posts as $post): ?>


        <div class="post">

            <p class = "sender-username"><a href="profile.php?username=<?php echo $post['sender_username']; ?>"><?php echo $post['sender_username']; ?></a></p>

            <p class="post-body">
                <?php echo $post['post_body']; ?>
            </p>

            <?php if ($post['sender_username'] == $_SESSION['username']): ?>
                <button type="button" class="delete-post-button">x</button>
            <?php endif; ?>
            <h6 class="post-time"><?php echo $post['post_time']; ?></h6>
        </div>
<?php endforeach; ?>

<?php
    // TODO: Change the time format - Ajax delete-post dependent on this
    // substr($post['post_time'], 0, 5)
?>
