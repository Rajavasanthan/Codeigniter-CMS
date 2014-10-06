<div class="row">
    <div class="col-lg-12">
        <h1>Article <small>Mange Articles</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i>Articles</li>
        </ol>
    </div>
</div><!-- /.row -->
<div class="row">


    <div class="col-lg-12">
        <?php echo validation_errors(); ?>


        <?php $attributes = array('id' => 'login_form'); ?>
        <?php echo form_open(); ?>

        <div class="form-group">
            <label>Title</label>
            <?php echo form_input('article_title', set_value('article_title', $article->article_title), 'class="form-control"'); ?>
            <small>Title Should be in English<br>Length Should not Exceed 72 Characters</small>
        </div>
        <div class="form-group">           
            <label>Category</label>
            <?php echo form_dropdown('category_id', $category, isset($article->category_id) ? $article->category_id : '', 'class="form-control"'); ?>
        </div>
        <div class="panel-group" id="accordion">
            <div class="panel panel-info">
                <div class="panel-heading" >
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Summary
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="form-group">
                            <?php echo form_textarea('article_summary', set_value('article_summary', $article->article_summary)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
        <div class="form-group">
            <label>Body</label>
            <?php echo form_textarea('article_body', set_value('article_body', $article->article_body)); ?>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <?php echo form_input('tag', set_value('tag', isset($tag) == 1 ? $tag : ''), 'class="form-control"'); ?>
            <datalist id="mySelect">

            </datalist>
        </div>
        <div class="form-group">
            <?php echo form_checkbox('breaking', '1', $article->breaking == 1 ? TRUE : FALSE); ?>&nbsp;&nbsp;Breaking News<br>
            <small>If checked this article will be Displayed in main page slider.</small>
        </div>
        <div class="form-group">
            <?php echo form_checkbox('published', '1', $article->published == 1 ? TRUE : FALSE); ?>&nbsp;&nbsp;Publish<br>
            <small>Check this to publish this article</small>
        </div>







        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-default">
        </div>
        <?php echo form_close(); ?>
    </div>
    <?php echo form_close(); ?>

</div>