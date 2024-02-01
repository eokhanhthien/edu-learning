<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Bài học
                    <a href="<?php echo site_url('admin/grammar_lessons_form/add_grammar_lesson'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Thêm mới bài học</a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="table-responsive-sm mt-4">
    <table id="categories-table" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='10'>
        <thead>
            <th>STT</th>
            <th>Mã danh mục</th>
            <th>Tên danh mục đề thi</th>
            <th>Ngày tạo</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </thead>
        <tbody>
            <?php $stt=1;?>
            <?php foreach ($categories->result_array() as $category) :
            ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td> <?php echo $category['code']; ?></td>
                        <td><b> <?php echo $category['name']; ?></b></td>
                        <td><b> <?php echo date("d/m/Y", $category['date_added']); ?></b></td>
                        <td> <a href="<?php echo site_url('admin/grammar_lessons_form/edit_grammar_lesson/' . $category['id']); ?>" class="btn btn-icon btn-outline-info btn-sm" id="category-edit-btn-<?php echo $category['id']; ?>">
                            <i class="mdi mdi-wrench"></i> <?php echo get_phrase('edit'); ?>
                        </a></td>
                        <td> <a href="#" class="btn btn-icon btn-outline-danger btn-sm" id="category-delete-btn-<?php echo $category['id']; ?>" onclick="confirm_modal('<?php echo site_url('admin/grammar/delete/' . $category['id']); ?>');" >
                            <i class="mdi mdi-delete"></i> <?php echo get_phrase('delete'); ?>
                        </a></td>
                    </tr>

        <?php endforeach; ?>
        </tbody>
        
    </table>
</div>

   

<script type="text/javascript">
    $('.on-hover-action').mouseenter(function() {
        var id = this.id;
        $('#category-delete-btn-' + id).show();
        $('#category-edit-btn-' + id).show();
    });
    $('.on-hover-action').mouseleave(function() {
        var id = this.id;
        $('#category-delete-btn-' + id).hide();
        $('#category-edit-btn-' + id).hide();
    });
</script>

<script type="text/javascript">
  $(document).ready(function() {
        // $.fn.dataTable.ext.errMode = 'throw';
        $('#categories-table').DataTable({
            "paging": true
        });
    });
</script>