<?php echo empty($user->id) ? '<div class="modal-header">
    <h3>Register</h3>
</div>' : '<h3>Edit user ' . $user->name . "</h3>"; ?>
<div class="modal-body">
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>

    <table class="table">
        <tr>
            <td>
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <?php echo form_input('user_name', set_value('name', $user->name), 'class="form-control" placeholder="Username"'); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <?php echo form_input('user_email', set_value('user_email', $user->email), 'class="form-control" placeholder="E-Mail"'); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <?php echo form_password('password', '', 'class="form-control" placeholder="Password"'); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <?php echo form_password('password_confirm', '', 'class="form-control" placeholder="Confirm Password"'); ?>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;"><?php echo form_submit('submit', 'log in', 'class="btn btn-primary"'); ?></td>
        </tr>
    </table>

    <?php echo form_close(); ?>
</div>