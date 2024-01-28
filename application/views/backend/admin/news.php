<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Bài viết
                    <a href="<?php echo site_url('admin/news_form/add_news_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Thêm Bài viết mới</a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Bài viết</h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Trích dẫn</th>
                                <th>Hình đại diện</th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($news as $key => $new) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><strong><?php echo $new['name']; ?></strong></td>
                                    <td><?php echo $new['desc']; ?></td>
                                    <td><img src="<?php echo '../uploads/news/'.$new['thumb']; ?>" alt="<?php echo $new['name']; ?>" height="42" class="shadow-sm"></td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/news_form/edit_news_form/' . $new['id']) ?>"><?php echo get_phrase('edit'); ?></a></li>
                                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/news/delete/' . $new['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
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