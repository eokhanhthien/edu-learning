<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Danh mục tin tức
                    <a href="<?php echo site_url('admin/cat_new_form/add_cat_new_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Thêm Danh mục tin tức mới</a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Danh mục tin tức</h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($cat_new as $key => $cat_new) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><strong><?php echo $cat_new['name']; ?></strong></td>
                                   <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/cat_new_form/edit_cat_new_form/' . $cat_new['id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/cat_new/delete/' . $cat_new['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
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