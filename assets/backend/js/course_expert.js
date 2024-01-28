const CourseExpert = {
    add(el, isEdit = false) {
        const $form = $(el).closest('.modal').find('form');
        const formData = new FormData($form[0]);
        const url = '/admin/course_expert/' + (isEdit ? 'edit' : 'add');
        $.ajax({
            url,
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: (result) => {
                if (!result.success) {
                    NotifAlert.error(result.message);
                    return;
                }
                $(el).closest('.modal').modal('hide');
                NotifAlert.success(result.message, () => {
                    window.location.reload();
                });
            }
        })
    },
    delete(id) {
        Swal.fire({
            title: 'Chắc chắn chứ?',
            text: "Bạn chắc chắn muốn xóa chuyên gia này chứ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vâng, hãy xóa',
            cancelButtonText: 'Thôi'
        }).then((result) => {
            if (result.isConfirmed) {
                this.deleteConfirmed(id);
            }
        })
    },
    deleteConfirmed(id) {
        const url = '/admin/course_expert/delete/' + id;
        $.getJSON(url, (result) => {
            if (!result.success) {
                NotifAlert.error(result.message);
                return;
            }
            NotifAlert.success(result.message, () => {
                window.location.reload();
            });
        });
    },
    openEdit(param) {
        console.log(param);
        const $modal = $('#edit-new-expert-course');
        $modal.find('[name="id"]').val(param.id);
        $modal.find('[name="title"]').val(param.title);
        $modal.find('[name="price"]').val(param.price);
        $modal.find('[name="description"]').val(param.description);
        $modal.find('[name="description"]').summernote({
            placeholder: "Write something...",
            height: 230
        });

        const $expert = $modal.find('[name="expert"]');
        const $partners = $modal.find('[name="partners[]"]');
        const $courses = $modal.find('[name="courses[]"]');
        $expert.find(`option[value="${param.expert_id}"]`).prop('selected', true);

        for (const expert_course of param.expert_courses) {
            $courses.find(`option[value="${expert_course.course_id}"]`).prop('selected', true);
        }

        for (const partner of param.partners) {
            $partners.find(`option[value="${partner}"]`).prop('selected', true);
        }

        $expert.select2();
        $partners.select2();
        $courses.select2();
        $modal.modal('show');
    },
    edit(el) {
        this.add(el, true);
    }
}
