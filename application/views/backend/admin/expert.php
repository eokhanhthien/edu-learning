<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="header-title m-0">Danh sách chuyên gia</h4>
                    <button class="btn btn-success" data-toggle="modal" data-target="#add-new-expert">Thêm mới</button>
                </div>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th class="text-center">Họ và tên</th>
                                <th>Ghi chú</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($experts as $index => $expert) : ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td>
                                        <img src="<?= base_url($expert['avatar']) ?>" alt="" style="width: 140px">
                                    </td>
                                    <td class="text-center"><?= $expert['full_name']; ?></td>
                                    <td><?= $expert['note'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-primary" onclick="Expert.openEdit(<?= htmlspecialchars(json_encode($expert)) ?>)">Sửa</button>
                                        <button class="btn btn-danger" onclick="Expert.delete(<?= $expert['id'] ?>)">Xóa</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (count($experts) === 0) : ?>
                                <tr>
                                    <td colspan="5" class="text-center">Không có chuyên gia nào đang hoạt động</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add-new-expert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Thêm chuyên gia mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="full_name">Họ và tên</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="summernote-basic">Mô tả</label>
                        <div class="input-group">
                            <textarea name="note" id="summernote-basic" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="avatar">Ảnh đại diện</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar" name="avatar" accept="image/jpg,image/jpeg,image/png" onchange="changeTitleOfImageUploader(this)" />
                                <label class="custom-file-label" for="avatar">Chọn ảnh đại diện của chuyên gia</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="Expert.add(this)">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-new-expert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Sửa thông tin chuyên gia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <input type="hidden" name='id' value="">
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="full_name">Họ và tên</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="summernote-basic-edit">Mô tả</label>
                        <div class="input-group">
                            <textarea name="note" id="summernote-basic-edit" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label" for="avatar">Ảnh đại diện</label>
                        <div class="w-100">
                            <img src="" alt="" class="avatar-preview mb-2" style="width: 140px;">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar" name="avatar" accept="image/jpg,image/jpeg,image/png" onchange="changeTitleOfImageUploader(this)" />
                                <label class="custom-file-label" for="avatar">Chọn ảnh đại diện của chuyên gia</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="Expert.edit(this)">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
