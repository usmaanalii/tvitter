<ul id="users-list">
    <?php foreach($all_users_info as $username => $username_info): ?>

            <li class="single-user">

                <a class="username-link" href="profile.php?username=<?php echo $username ?>"><?php echo $username; ?></a>

                <img class="profile-image" src="../src/images/profile-placeholder.jpg" alt="Profile Placeholder Image">

                <p class="user-info">
                    <span class="email-web-links">
                        <?php if (!empty($username_info['email'])): ?>
                            <a href="mailto:<?php echo $username_info['email']; ?>?Subject=Hello" target="_top"><?php echo $username_info['email']; ?></a>
                        <?php endif; ?>
                        <?php if (!empty($username_info['website'])): ?>
                            ||
                            <a href="http://<?php echo $username_info['website']; ?>" target="_blank"><?php echo $username_info['website']; ?></a>
                        <?php endif; ?>
                    </span>

                    <?php if (!empty($username_info['bio'])): ?>
                        <?php echo $username_info['bio']; ?>
                        <br>
                    <?php endif; ?>
                </p>
            </li>

    <?php endforeach; ?>
</ul>
