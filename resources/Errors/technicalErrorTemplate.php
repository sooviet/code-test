<?php if (isset($data['technical_error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Technical Error Code : <?php echo $data['technical_error']['code']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>