<link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
        </style>

<div class="container-fluid" style="min-height: 600px;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Pages <?php echo anchor(site_url('pages/create'), 'add pages', 'class="btn btn-primary btn-sm"'); ?>
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
                    <div class="col-md-6">
                        <?php 
                          if($this->session->flashdata('success') != null)
                                {
                                    ?>
                                    <div class="alert alert-success alert-dismissable">
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php
                                }
                            if($this->session->flashdata('fail') != null)
                                {
                                  ?>
                                    <div class="alert alert-danger alert-dismissable">
                                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                      <?php echo $this->session->flashdata('fail'); ?>
                                    </div>
                                    <?php
                                }

                        ; ?>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                 <div class="col-md-6">
                 	<div class="alert alert-info">
                		<i class="fa fa-info-circle"></i> Field status <strong>" 1 is visible and 0 is Draft "</strong>
            		</div>
                 </div>
                 <div class="col-md-12">
                    <table class="table table-condensed table-striped" id="mytable">
			            <thead>
			                <tr>
			                    <th width="80px">No</th>
							    <th>Title</th>
							    <th>Category</th>
							    <th>Status</th>
							    <th>Created At</th>
							    <th width="200px">Action</th>
			                </tr>
			            </thead>
				    
			        </table>
                 </div>
                 </div>
</div>

<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "<?= base_url('pages/json') ?>", "type": "POST"},
                    columns: [
                        {
                            "data": "id_pages",
                            "orderable": false
                        },{"data": "title"},{"data": "category"},{"data": "status"},{"data": "created_at"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>