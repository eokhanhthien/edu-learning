<?php 
    $vocabularis = $this->crud_model->get_parent_vocabulary();
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Thêm từ vựng</h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title">Danh từ vựng</h4>

                <form class="required-form" action="<?php echo site_url('admin/vocabulary/add'); ?>" method="post">
                    <div class="form-group">
                        <label for="code"><?php echo get_phrase('category_code'); ?></label>
                        <input type="text" class="form-control" id="code" name = "code" value="<?php echo substr(md5(rand(0, 1000000)), 0, 10); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="parent_id">Danh mục cha<span class="required">*</span></label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0">--Chọn danh mục cha--</option>
                            <?php foreach ($vocabularis as $vocabulary) : ?>
                                <option value="<?= $vocabulary['id']; ?>"><?= $vocabulary['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name"><?php echo get_phrase('category_title'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="name" name = "name" placeholder="ex: Tổng hợp từ vựng N4"  required>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><i class="fa fa-save"></i> <?php echo get_phrase("submit"); ?></button>
                    <a href="<?=site_url('admin/vocabulary'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Quay lại</a>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

