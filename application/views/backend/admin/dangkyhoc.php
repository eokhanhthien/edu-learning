<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Danh sách đăng ký học</h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Họ Tên</th>
                                <th>Khoá Học</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Hiện trạng</th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dangkyhoc as $key => $new) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><strong><?php echo $new['hoten']; ?></strong></td>
                                    <td><?php echo $new['khoahoc']; ?></td>
                                    <td><?php echo $new['phone']; ?></td>
                                    <td><?php echo $new['email']; ?></td>
                                    <td><?php if($new['status'] == 1){echo'<p style="width: max-content;background: green;padding: 1px 7px;color: #fff;font-weight: bold;border-radius: 15px;">Đã xếp lớp</p>';}elseif($new['status'] == 2){echo'<p style="width: max-content;background: black;padding: 1px 7px;color: #fff;font-weight: bold;border-radius: 15px;">Huỷ Học</p>';}else{echo'<p style="width: max-content;background: red;padding: 1px 7px;color: #fff;font-weight: bold;border-radius: 15px;">Chưa Xếp Lớp</p>';}; ?></td>
                                    <td>
                                        <div class="dropright dropright">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/dangkyhoc/xeplop/' . $new['id']) ?>">Đã Xếp Lớp</a></li>
                                                <li><a class="dropdown-item" href="<?php echo site_url('admin/dangkyhoc/huy/' . $new['id']) ?>">Đã Huỹ</a></li>
                                                <!--<li><a class="dropdown-item" href="<?php echo site_url('admin/dangkyhoc/delete/' . $new['id']) ?>">Xoá</a></li>-->
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>