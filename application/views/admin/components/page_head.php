<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $meta_title; ?></title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/sb-admin.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/datepicker.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/jquery-ui.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/tagging/bootstrap-tagsinput.css'); ?>" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url('js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
        <?php if (isset($sortable) && $sortable === TRUE): ?>
            <script src="<?php echo base_url('js/jquery-ui.js'); ?>"></script>
            <script src="<?php echo base_url('js/jquery.mjs.nestedSortable.js'); ?>"></script>   
        <?php endif; ?>
            
        
        
        
        <script type="text/javascript" src="<?php echo base_url('js/tagging/bootstrap-tagsinput-angular.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/tagging/bootstrap-tagsinput-angular.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/tagging/bootstrap-tagsinput.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/tagging/bootstrap-tagsinput.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/tagging/bootstrap-tagsinput.min.js.map'); ?>"></script>
        <script src="<?php echo base_url('js/typeahead.bundle.js'); ?>"></script>
       
        
        

    </head>
