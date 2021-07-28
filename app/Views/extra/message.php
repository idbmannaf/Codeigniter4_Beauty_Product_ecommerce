<?php if (session()->getFlashdata('fail')): ?>
    <div class="alert alert-danger"><?php echo session()->getFlashdata('fail')?></div>
<?php endif; ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?php echo session()->getFlashdata('success')?></div>
<?php endif; ?>