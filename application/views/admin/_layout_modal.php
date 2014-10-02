<?php $this->load->view('admin/components/page_head'); ?>

<body style="background: #555;">
    
    <div class="modal show" role="dialog" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        
        <div class="modal-dialog">
            <div class="modal-content">
                
                <?php $this->load->view($subview); //Subview is set in controller ?>
                
                <div class="modal-footer">
                   <?php echo anchor('/', '<- Home', 'class="label label-info"')?> &copy; <?php echo $meta_title; ?>
                </div>
            </div>
        </div>

    </div>
    
</body>

<?php $this->load->view('admin/components/page_tail'); ?>