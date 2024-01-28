<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="header-title m-0">Danh sách khóa học theo chuyên gia</h4>
                    <button class="btn btn-success" data-toggle="modal" data-target="#add-new-expert-course">Thêm mới</button>
                </div>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Chuyên gia</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung</th>
                                <th>Chuyên gia đồng hành</th>
                                <th class="text-center">Active</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($course_expert as $index => $course) : ?>
                                <tr>
                                    <td class="text-center" style="max-width: 100px">
                                        <div class="img-showing" style="background-image: url('<?= base_url($course['experts']['avatar']) ?>')"></div>
                                    </td>
                                    <td class="text-center"><?= $course['experts']['full_name']; ?></td>
                                    <td><?= $course['title'] ?></td>
                                    <td>
                                        <div style="max-width: 350px"><?= $course['description'] ?></div>
                                    </td>
                                    <td>
                                        <ul class="p-0 pl-2">
                                            <?php foreach ($course['partners_data'] as $partner) : ?>
                                                <li><?= $partner ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </td>
                                    <td class="text-center"><?= $course['is_active'] ? 'Active' : 'Disabled' ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-primary m-1" onclick="CourseExpert.openEdit(<?= htmlspecialchars(json_encode($course)) ?>)">Sửa</button>
                                        <button class="btn btn-danger m-1" onclick="CourseExpert.delete(<?= $course['id'] ?>)">Xóa</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if (count($course_expert) === 0) : ?>
                                <tr>
                                    <td colspan="7" class="text-center">Không có khóa học theo chuyên gia nào</td>
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
<div class="modal fade modal-scroll-content" id="add-new-expert-course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Thêm khoá học cùng chuyên gia mới</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="expert">Chuyên gia</label>
                        <div class="input-group">
                            <select class="form-control select2" data-toggle="select2" name="expert" id="expert" required data-placeholder>
                                <option value="">Chọn chuyên gia</option>
                                <?php foreach ($experts as $expert) : ?>
                                    <option value="<?= $expert['id'] ?>"><?= $expert['full_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="title">Tiêu đề</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="price">Giá</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="partners">Người đồng hành</label>
                        <div class="input-group">
                            <select class="form-control select2" data-toggle="select2" name="partners[]" id="partners" data-placeholder required multiple="multiple">
                                <?php foreach ($experts as $expert) : ?>
                                    <option value="<?= $expert['id'] ?>"><?= $expert['full_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="courses">Khóa học</label>
                        <div class="input-group">
                            <select class="form-control select2" data-toggle="select2" name="courses[]" id="courses" data-placeholder required multiple="multiple">
                                <?php foreach ($courses as $course) : ?>
                                    <option value="<?= $course['id'] ?>"><?= $course['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="summernote-basic">Mô tả</label>
                        <div class="input-group">
                            <textarea name="description" id="summernote-basic" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="CourseExpert.add(this)">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-scroll-content" id="edit-new-expert-course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="expert_edit">Chuyên gia</label>
                        <div class="input-group">
                            <select class="form-control select2" data-toggle="select2" name="expert" id="expert_edit" required data-placeholder>
                                <option value="">Chọn chuyên gia</option>
                                <?php foreach ($experts as $expert) : ?>
                                    <option value="<?= $expert['id'] ?>"><?= $expert['full_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="title_edit">Tiêu đề</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="title_edit" name="title" required>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="price_edit">Giá</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="price_edit" name="price" required>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="partners_edit">Người đồng hành</label>
                        <div class="input-group">
                            <select class="form-control select2" data-toggle="select2" name="partners[]" id="partners_edit" data-placeholder required multiple="multiple">
                                <?php foreach ($experts as $expert) : ?>
                                    <option value="<?= $expert['id'] ?>"><?= $expert['full_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="courses_edit">Khóa học</label>
                        <div class="input-group">
                            <select class="form-control select2" data-toggle="select2" name="courses[]" id="courses_edit" data-placeholder required multiple="multiple">
                                <?php foreach ($courses as $course) : ?>
                                    <option value="<?= $course['id'] ?>"><?= $course['title'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-1">
                        <label class="col-form-label" for="description_edit">Mô tả</label>
                        <div class="input-group">
                            <textarea name="description" id="description_edit" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="CourseExpert.edit(this)">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
