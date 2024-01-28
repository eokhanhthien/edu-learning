<?php
$sections = $this->crud_model->get_section('course', $param2)->result_array();
?>
<form action="<?php echo site_url('admin/quizes/'.$param2.'/add'); ?>" method="post">
    <div class="form-group">
        <label for="title"><?php echo get_phrase('quiz_title'); ?></label>
        <input class="form-control" type="text" placeholder="Nhập tên bài kiểm tra" name="title" id="title" required>
    </div>
    <div class="form-group">
        <label for="duration"><?php echo get_phrase('quiz_time'); ?> (phút)</label>
        <input class="form-control" type="number" min="1" name="duration" id="duration" placeholder="Nhập thời gian làm bài thi: 10 phút" required>
    </div>
    <div class="form-group">
        <label for="section_id"><?php echo get_phrase('section'); ?></label>
        <select class="form-control select2" data-toggle="select2" name="section_id" id="section_id" required>
            <?php foreach ($sections as $section): ?>
                <option value="<?php echo $section['id']; ?>"><?php echo $section['title']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label><?php echo get_phrase('instruction'); ?></label>
        <textarea name="summary" class="form-control"></textarea>
    </div>
    <div class="text-center">
        <button class = "btn btn-success" type="submit" name="button"><i class="fa fa-save"></i> Thêm mới</button>
    </div>
</form>
<script type="text/javascript">
$(document).ready(function() {
    initSelect2(['#section_id']);
});
</script>

