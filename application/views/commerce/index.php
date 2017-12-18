
<div class="container-fluid" style="min-height: 600px;">
	<div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">
                <i class="fa fa fa-shopping-cart"></i> Commerce
            </h3>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-tag"></i>  <a href="index.html"><?= $this->uri->segment(1); ?></a>
                    </li>
                    <li class="active">
                        <?= $this->uri->segment(2); ?>
                    </li>
                </ol>
        </div>

        <div class="col-md-3">
        	<div class="panel panel-default">
        		<div class="panel-heading">
        			<h3 class="panel-title">Things to Do</h3>
        		</div>
        		<div class="panel-body">
        			<ul>
        			<li class="commerces"><a href=""><i class="fa fa-edit"></i> Add Products</a></li>
        			<li class="commerces"><a href="<?= base_url('commerce/showneworder') ?>"><i class="fa fa-cart-plus"></i> New Order <small class="label label-danger">2</small></a></li>
        			<li class="commerces"><a href=""><i class="fa fa-question-circle-o"></i> Confirm</a></li>
        			<li class="commerces"><a href=""><i class="fa fa-check-square-o"></i> Well Done</a></li>
        			<br>
        			<li class="commerces"><a href="<?= base_url('commerce/showsettings') ?>"><i class="fa fa-gear"></i> Settings</a></li>
        			</ul>
        		</div>
        	</div>
        </div>

        <div class="col-md-9">

            <div id="app-control">
        	<div class="panel panel-default pnl">
        		<div class="panel-heading">
        			<h3 class="panel-title">All Product</h3>
        		</div>
        		<div class="panel-body">
        			<table class="table table-condensed">
        				<thead>
        					<tr>
        						<th>Product Name</th>
        						<th>Category</th>
        						<th>Status</th>
        						<th>Action</th>
        					</tr>
        				</thead>
        				<tbody>
        					<tr>
        						<td>Macbook Pro 13 Mid 2009</td>
        						<td>PC/Laptop</td>
        						<td>Active</td>
        						<td>
        							edit | view | delete
        						</td>
        					</tr>
                            <tr>
                                <td>Macbook Pro 13 Mid 2009</td>
                                <td>PC/Laptop</td>
                                <td>active</td>
                                <td>
                                    edit | view | delete
                                </td>
                            </tr>
        				</tbody>
        			</table>
        		</div>
        	</div>
        </div>
    </div> <!-- app control -->

    </div>
</div>

<script type="text/javascript">
    $('.commerces a').click(function(e){
        var link = $(this).attr('href');
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:link,
            success:function(html){
                $('.pnl').remove();
                $('#app-control').append(html);
            }
        });
    })
</script>