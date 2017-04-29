<?php require_once __DIR__ . '/../../../../../../includes/title-page.inc.php'; ?>

<?php if (isset($_GET['film-id'])): ?>
    <?php $title_data = Title::title_details($_GET['film-id']); ?>
    <?php require_once __DIR__ . '/../../../../../../components/title-page/title-details.php'; ?>
<?php endif; ?>

<?php if (isset($_GET['title'])): ?>
    <?php $title_data = Title::get_title_details_by_name($_GET['title']); ?>
    <?php require_once __DIR__ . '/../../../../../../components/title-page/title-details.php'; ?>
<?php endif; ?>

<?php if (isset($_POST['title_id'])): ?>
    <?php $title_data = Title::title_details($_POST['title_id']); ?>
    <?php require_once __DIR__ . '/../../../../../../components/title-page/title-details.php'; ?>
<?php endif; ?>
