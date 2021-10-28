<?php if (!empty($success)) : ?>
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    <?php echo $success; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
<?php if (!empty($error)) : ?>
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    <?php echo $error; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>