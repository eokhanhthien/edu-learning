<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Tiêu chí
                    <a href="<?php echo site_url('admin/tieuchi'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle">Quay lại</a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('tieuchi_add_form'); ?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/tieuchi/add'); ?>" method="post" enctype="multipart/form-data">

                         <div class="form-group">
                            <label for="code">Tên hiển thị<span class="required">*</span></label>
                            <input type="text" class="form-control" id="code" name="code" value="" required>
                        </div>

                         <div class="form-group">
                            <label for="discount_percentage">Nội dung</label>
                            <div class="input-group">
                                <input type="text" name="discount_percentage" id="discount_percentage" class="form-control" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="expiry_date">Hình Ảnh<span class="required">*</span></label>
							<input type="file" name="userfile" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script>
    function generateARandomtieuchiCode() {
        var randomtieuchiCode;
        randomtieuchiCode = randomString(7);
        $('#code').val(randomtieuchiCode);
    }

    function randomString(len) {
        var p = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return [...Array(len)].reduce(a => a + p[~~(Math.random() * p.length)], '');
    }
</script>