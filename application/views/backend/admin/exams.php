<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Quản lý đề thi
                    <a href="<?php echo site_url('admin/exam_form/add_exam'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i> Thêm đề thi mới</a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="table-responsive-sm mt-4">
    <div class="form-group">
        <label for="categoryFilter" style="font-weight: 600;color: black;">Danh mục:</label>
        <select id="categoryFilter">
            <option value="">Tất cả</option>
            <?php foreach($categories as $category): ?>
            <option value="<?=$category['name']; ?>"><?=$category['name']; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <table id="categories-table" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='10'>
        <thead>
            <th>STT</th>
            <th>Tên đề thi</th>
            <th>Thời gian làm bài (phút)</th>
            <th>Câu hỏi</th>
            <th>Danh mục</th>
            <th>Ngày tạo</th>
            <th>Chỉnh sửa</th>
            <th>Quản lý câu hỏi</th>
            <th>Xóa</th>
        </thead>
        <tbody>
            <?php $stt=1;?>
            <?php foreach ($exams->result_array() as $exam) :
            ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td> <?php echo $exam['title']; ?></td>
                        <td><?php echo $exam['duration']; ?></td>
                        <td>
                        <?php
                            $quiz_questions = $this->crud_model->get_quiz_questions($exam['id']);
                            echo count($quiz_questions->result_array());
                        ?>  
                        </td>
                        <td><b>
                            <?php 
                              $category_details = $this->crud_model->get_exam_category_details_by_id($exam['category_id'])->row_array();
                               if($category_details){ echo '<span class="badge badge-dark-lighten">'.$category_details['name'].'</span>'; } else{ echo '_'; }
                            ?>
                            </b>
                         </td>
                        <td> <?php echo date("d/m/Y", $exam['date_added']); ?></td>
                        <td> <a href="<?php echo site_url('admin/exam_form/edit_exam/' . $exam['id']); ?>" class="btn btn-icon btn-outline-info btn-sm" id="exam-edit-btn-<?php echo $exam['id']; ?>">
                            <i class="mdi mdi-wrench"></i> <?php echo get_phrase('edit'); ?>
                        </a>
                        </td>
                        <td> 
                            <a href="javascript::" class="btn btn-icon btn-outline-info btn-sm" onclick="showLargeModal('<?php echo site_url('modal/popup/quiz_questions/'.$exam['id']); ?>', '<?php echo get_phrase('manage_quiz_questions'); ?>')"><i class="mdi mdi-comment-question-outline"></i> Câu hỏi</a>
                        </td>
                        <td> <a href="#" class="btn btn-icon btn-outline-danger btn-sm" id="exam-delete-btn-<?php echo $exam['id']; ?>" onclick="confirm_modal('<?php echo site_url('admin/exams/delete/' . $exam['id']); ?>');" >
                            <i class="mdi mdi-delete"></i> <?php echo get_phrase('delete'); ?>
                        </a></td>
                    </tr>

        <?php endforeach; ?>
        </tbody>
        
    </table>
</div>

<style>

    #categoryFilter{
        margin-left: 0.5em;
        display: inline-block;
        width: auto;
        height: calc(1.8725rem + 2px);
        padding: 0.28rem 0.8rem;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
        font-weight: 400;
        color: #6c757d;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #dee2e6;
    }
</style>

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
        $.fn.dataTable.ext.errMode = 'throw';
        var table = $('#categories-table').DataTable({
            paging: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/vi.json',
            },
        });

        $('#categoryFilter').on('change', function () {
            var selectedCategory = $(this).val();
            table.column(4).search(selectedCategory).draw();
           
        });
    });
</script>