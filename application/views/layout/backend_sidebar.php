            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li class="active">
                        <a href="<?= base_url('admin/index') ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="<?= base_url('pages/index') ?>"><i class="fa fa-fw fa-file-text-o"></i> Pages</a>
                    </li>

                    <li>
                        <a href="<?= base_url('pages/index') ?>"><i class="fa fa-fw fa fa-files-o"></i> Post</a>
                    </li>

                    <li>
                        <a href="<?= base_url('menu/index') ?>"><i class="fa fa-fw fa fa-navicon"></i> Menu</a>
                    </li>
                    
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-file-photo-o"></i> Media</a>
                    </li>

                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-shopping-basket"></i> Packet</a>
                    </li>

                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-shopping-cart"></i> Order Baru <small class="label label-danger">2</small></a>
                    </li>

                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-commenting"></i> Comments</a>
                    </li>

                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Testimony</a>
                    </li>

                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-envelope"></i> Email</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-gears"></i> Setting <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse" style="background-color: #333">
                            <li>
                                <a href="<?= base_url('admin/list_header')?>">General</a>
                            </li>
                            <li>
                                <a href="<?= base_url('info/list_info') ?>">Account</a>
                            </li>
                            <li>
                                <a href="<?= base_url('seo/index') ?>">Seo</a>
                            </li>
                        </ul>
                    </li>
                    <hr>
                    <li class="b-credit">
                        <a><small><i class="fa fa-leaf"></i> BigCMS  powered by Bigkiandi.</small></a>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->