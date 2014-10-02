<div class="modal-header">
    <h3>Log in</h3>
    <p>Please log in using you credentials</p>
</div>
<div class="modal-body">
    
    <?php echo validation_errors(); ?>


    <?php $attributes = array('id' => 'login_form'); ?>
    <?php echo form_open('admin/user/login', $attributes); ?>
    <table class="table">
        <tr>
            <td>
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <?php echo form_input('user_email', '', 'class="form-control" placeholder="Username"') ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="input-group">
                    <span class="input-group-addon">P</span>
                    <?php echo form_password('password', '', 'class="form-control" placeholder="Password"') ?>
                    </span>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;">
                <?php echo form_submit('submit', 'log in', 'class="btn btn-primary"'); ?></td>
        </tr>
    </table>
    <?php echo form_close(); ?>
</div>

