const Expert = {
    add(el, isEdit = false) {
        const $form = $(el).closest('.modal').find('form');
        const formData = new FormData($form[0]);
        const url = '/admin/experts/' + (isEdit ? 'edit' : 'add');
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
        const url = '/admin/experts/delete/' + id;
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
        const $modal = $('#edit-new-expert');
        $modal.find('[name="id"]').val(param.id);
        $modal.find('[name="full_name"]').val(param.full_name);
        $modal.find('[name="note"]').val(param.note);
        $modal.find('.avatar-preview').attr('src', '/' + param.avatar);
        $('#summernote-basic-edit').summernote({
            placeholder: "Write something...",
            height: 230
        });
        $modal.modal('show');
    },
    edit(el) {
        this.add(el, true);
    }
}