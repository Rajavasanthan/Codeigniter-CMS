<div class="row">
    <div class="col-lg-12">
        <h1>Articles <small>Manage Articles</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>
    </div>
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-2" style="font-size: 12px;">
        <a href="<?php echo base_url('admin/article/edit'); ?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp; Add Article</button></a>
    </div>
</div>
<br>
<div class="row">
    <div class="table-responsive">
        <?php //var_dump($articles); ?>
        <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Author</th>
                    <th>Created</th>
                    <th>Last Modified</th>
                    <th>Breaking</th>
                    <th>Views</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <?php $created = new DateTime($article->created); ?>
                        <?php $modified = new DateTime($article->modified); ?>
                        <td><?php echo $count ?></td>
                        <td><?php echo $article->article_title; ?></td>
                        <td><?php echo $article->category_name; ?></td>
                        <td><?php echo $article->published == 1 ? 'Published' : 'Unpublished'; ?></td>
                        <td><?php echo $article->user_name; ?></td>
                        <td><?php echo $created->format('d-j-Y g:i A'); ?></td>
                        <td><?php echo $modified->format('d-j-Y g:i A'); ?></td>
                        <td><?php echo $article->breaking == 1 ? 'Breaking News' : 'Non Breaking'; ?></td>
                        <td><?php echo $article->views; ?></td>
                        <td><?php echo btn_edit('admin/article/edit/' . $article->id); ?></td>
                        <td> <?php echo btn_delete('admin/article/delete/' . $article->id); ?></td>
                    </tr>
                    <?php $count++; ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div><!-- /.row -->