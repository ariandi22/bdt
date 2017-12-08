<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pages Read</h2>
        <table class="table">
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Content</td><td><?php echo $content; ?></td></tr>
	    <tr><td>Category</td><td><?php echo $category; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Img</td><td><?php echo $img; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pages') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>