<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Menu
                    <a href="<?php echo site_url('admin/menu_form/add_menu_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Thêm Menu mới</a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Menu</h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Liên kết</th>
                                <th>Thứ tự</th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($menu as $key => $menu) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><strong><?php echo $menu['name']; ?></strong></td>
                                    <td><?php echo $menu['url']; ?></td>
                                    <td><?php echo $menu['sort']; ?></td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/menu_form/edit_menu_form/' . $menu['id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/menu/delete/' . $menu['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>