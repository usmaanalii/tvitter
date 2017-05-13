<!--
- In the top right corner of each post will be a link to the
profile of the sender
-
- If the post was made to another user, then the top right corner will
consist of (sender) to (recipient), both of which will be links leading
back to the respective profile pages
-
- The javascript code that deletes posts based on the clicking of the button with the class 'delete-post-button' is dependent on the node structure of the html tags
=
- If the structure is changed, the query selectors in src/js/ajax/profile.js need to be changed to match
-
-->
<div class="posts-section">
    <?php if ($posts): ?>
        <?php foreach ($posts as $post): ?>

                <div class="post">
                    <!--
                        - Represents the username links in the top right corner of individual posts
                    -->
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

                    <?php if (!empty($post['title'])): ?>
                        <img class="img-rounded title-poster post-content" src="<?php echo $poster_url_method($post['title']); ?>" onerror="this.src = '../src/images/title-poster-placeholder.png';" alt="no image" height="75px" width="50px">
                    <?php endif; ?>

                    <p class="post-body">
                        <?php if (!empty($post['title'])): ?>
                            <a class="title-link" href="../pages/title-page.php?username=<?php echo $username; ?>&title=<?php echo $post['title']; ?>"><?php echo $post['title']; ?>
                            </a>
                        <?php endif; ?>
                        <?php echo htmlentities($post['post_body']); ?>
                    </p>

                    <!--
                        - Form that allows the user to delete posts
                    -->
                    <?php if ($post['sender_username'] == $_GET['username'] || $post['sender_username'] == $_SESSION['username']): ?>
                        <form class="delete-post-form" action="../logic/timeline.php?username=<?php echo $_SESSION['username']; ?>" method="post">
                            <input type="hidden" name="post-recipient" value="<?php echo $post['recipient_username'] ?>">
                            <input type="hidden" name="delete-post-id" value="<?php echo $post['post_id'] ?>">
                            <button type="submit" name="search-film-submit"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></button>
                        </form>
                    <?php endif; ?>

                    <h6 class="post-time">
                        <?php if (date('m-d') == substr($post['post_time'], 5, 5)): ?>
                            <?php echo substr($post['post_time'], 11, 5); ?>
                        <?php elseif (substr($post['post_time'], 0, 4) !== date('Y')): ?>
                            <?php echo substr(date("M Y jS H:i:s", strtotime($post['post_time'])), 0, 8); ?>
                        <?php else: ?>
                            <?php echo substr(date("Y - M jS H:i:s", strtotime($post['post_time'])), 7, 8); ?>
                        <?php endif; ?>
                    </h6>
                </div>

        <?php endforeach; ?>
        <?php else: ?>
            <h4 id="search-posts-error">Sorry, we don't have a match for that search!</h4>
    <?php endif; ?>
</div>
