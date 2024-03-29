<section class="course-carousel-area">
    <div class="container-lg">
         <h1 class="titleText">Thư viện đề thi</h1>
         <label for="categoryFilter" style="font-weight: 600;color: black;">Danh mục:</label>
        <select id="categoryFilter">
            <option value="">Tất cả</option>
            <?php foreach($categories as $category): ?>
            <option value="<?=$category['name']; ?>"><?=$category['name']; ?></option>
            <?php endforeach ?>
        </select>
         <div class="table-responsive-sm mt-4">
            <table id="categories-table" class="table table-striped table-hover dt-responsive nowrap" width="100%" data-page-length='10'>
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php $stt=1;?>
                    <?php foreach ($exams->result_array() as $exam) :
                    ?>
                            <tr>
                                <td width="5%"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 1.75C5.16797 1.75 1.25 5.66797 1.25 10.5C1.25 15.332 5.16797 19.25 10 19.25C14.832 19.25 18.75 15.332 18.75 10.5C18.75 5.66797 14.832 1.75 10 1.75ZM10 17.7656C5.98828 17.7656 2.73438 14.5117 2.73438 10.5C2.73438 6.48828 5.98828 3.23438 10 3.23438C14.0117 3.23438 17.2656 6.48828 17.2656 10.5C17.2656 14.5117 14.0117 17.7656 10 17.7656Z" fill="#A1A1AA"></path><path d="M10 3.23438C5.98828 3.23438 2.73438 6.48828 2.73438 10.5C2.73438 14.5117 5.98828 17.7656 10 17.7656C14.0117 17.7656 17.2656 14.5117 17.2656 10.5C17.2656 6.48828 14.0117 3.23438 10 3.23438ZM10 15.5781C9.56836 15.5781 9.21875 15.2285 9.21875 14.7969C9.21875 14.3652 9.56836 14.0156 10 14.0156C10.4316 14.0156 10.7812 14.3652 10.7812 14.7969C10.7812 15.2285 10.4316 15.5781 10 15.5781ZM11.2285 11.291C11.0516 11.3593 10.8994 11.4793 10.7918 11.6354C10.6841 11.7915 10.626 11.9764 10.625 12.166V12.6094C10.625 12.6953 10.5547 12.7656 10.4688 12.7656H9.53125C9.44531 12.7656 9.375 12.6953 9.375 12.6094V12.1895C9.375 11.7383 9.50586 11.293 9.76367 10.9219C10.0156 10.5586 10.3672 10.2813 10.7812 10.123C11.4453 9.86719 11.875 9.31055 11.875 8.70312C11.875 7.8418 11.0332 7.14062 10 7.14062C8.9668 7.14062 8.125 7.8418 8.125 8.70312V8.85156C8.125 8.9375 8.05469 9.00781 7.96875 9.00781H7.03125C6.94531 9.00781 6.875 8.9375 6.875 8.85156V8.70312C6.875 7.93555 7.21094 7.21875 7.82031 6.68555C8.40625 6.17188 9.17969 5.89062 10 5.89062C10.8203 5.89062 11.5938 6.17383 12.1797 6.68555C12.7891 7.21875 13.125 7.93555 13.125 8.70312C13.125 9.83203 12.3809 10.8477 11.2285 11.291Z" fill="#FAFAFA"></path><path d="M9.21875 14.7969C9.21875 15.0041 9.30106 15.2028 9.44757 15.3493C9.59409 15.4958 9.7928 15.5781 10 15.5781C10.2072 15.5781 10.4059 15.4958 10.5524 15.3493C10.6989 15.2028 10.7812 15.0041 10.7812 14.7969C10.7812 14.5897 10.6989 14.391 10.5524 14.2444C10.4059 14.0979 10.2072 14.0156 10 14.0156C9.7928 14.0156 9.59409 14.0979 9.44757 14.2444C9.30106 14.391 9.21875 14.5897 9.21875 14.7969ZM12.1797 6.68555C11.5937 6.17383 10.8203 5.89062 10 5.89062C9.17969 5.89062 8.40625 6.17188 7.82031 6.68555C7.21094 7.21875 6.875 7.93555 6.875 8.70312V8.85156C6.875 8.9375 6.94531 9.00781 7.03125 9.00781H7.96875C8.05469 9.00781 8.125 8.9375 8.125 8.85156V8.70312C8.125 7.8418 8.9668 7.14062 10 7.14062C11.0332 7.14062 11.875 7.8418 11.875 8.70312C11.875 9.31055 11.4453 9.86719 10.7812 10.123C10.3672 10.2813 10.0156 10.5586 9.76367 10.9219C9.50586 11.293 9.375 11.7383 9.375 12.1895V12.6094C9.375 12.6953 9.44531 12.7656 9.53125 12.7656H10.4688C10.5547 12.7656 10.625 12.6953 10.625 12.6094V12.166C10.626 11.9764 10.6841 11.7915 10.7918 11.6354C10.8994 11.4793 11.0516 11.3593 11.2285 11.291C12.3809 10.8477 13.125 9.83203 13.125 8.70312C13.125 7.93555 12.7891 7.21875 12.1797 6.68555Z" fill="#A1A1AA"></path></svg></td>
                                <td> <a href="<?=site_url('de-thi/').$exam['id']; ?>"><b><?php echo $exam['title']; ?></b></a></td>
                                <td width="10%">
                                    <span class="rounded-text-xs bg-red-100"><b>
                                        <?php 
                                        $category_details = $this->crud_model->get_exam_category_details_by_id($exam['category_id'])->row_array();
                                        if($category_details){ echo '<span class="badge badge-dark-lighten">'.$category_details['name'].'</span>'; } else{ echo '_'; }
                                        ?>
                                        </b>
                                    </span>
                                </td>
                                <td width="10%">
                                    <span class="rounded-text-xs bg-indigo-100">
                                    <?php
                                        $quiz_questions = $this->crud_model->get_quiz_questions($exam['id']);
                                        echo count($quiz_questions->result_array()).' câu hỏi';
                                    ?> 
                                    </span> 
                                </td>
                                <td width="10%"><span class="rounded-text-xs bg-red-100"><?php echo $exam['duration'].':00 phút'; ?></span></td>
                                
                            </tr>

                <?php endforeach; ?>
                </tbody>
                
            </table>
        </div>

    </div>
</section>

<style>

   .titleText {
    font-weight: 700;
    font-size: 1.875rem;
    line-height: 2.25rem;
    margin: 30px 0;
    }

    .dataTables_wrapper .dataTables_filter {
        float: left!important;
        text-align: left!important;
        margin-bottom: 20px;
    }

    .dataTables_wrapper .dataTables_filter label{
        font-weight: 600;
        color: black;
    }

    .dataTables_wrapper .dataTables_filter input,#categoryFilter {
        width: 350px;
        --tw-text-opacity: 1;
        color: rgba(55,65,81,var(--tw-text-opacity));
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        font-size: .875rem;
        line-height: 1.25rem;
        height: 2.5rem;
        border: 2px solid black;
        border-radius: 0.5rem;
    }

    #categories-table tbody tr:hover{
        background-color: rgba(79,70,229,1);
        cursor: pointer;
    }

    #categories-table tbody tr:hover a{
        color: #fff;
    }

    #categories-table tbody tr td a{
        color: black;
    }
    .rounded-text-xs{
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        --tw-text-opacity: 1;
        color: rgba(239,68,68,var(--tw-text-opacity));
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
        font-size: .75rem;
        line-height: 1rem;
        border-radius: 0.25rem;
        /* border: 1px solid black; */
    }

    .bg-red-100 {
    --tw-bg-opacity: 1;
        background-color: rgba(254,226,226,var(--tw-bg-opacity));
    }

    .bg-indigo-100 {
        --tw-bg-opacity: 1;
        background-color: rgba(224,231,255,var(--tw-bg-opacity));
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgb(0 0 0 / 16%);
    }


</style>


<script type="text/javascript">
  $(document).ready(function() {

        var table = $('#categories-table').DataTable({
            paginate: true,
            lengthChange: false,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/vi.json',
            },
            initComplete: function () {
                // Add the dropdown to the DataTable toolbar
                this.api().columns(1).every(function () {
                    var column = this;
                    var select = $('<select><option value="">All</option></select>')
                        .appendTo($('#categoryFilter'))
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });

                    // Populate the dropdown with unique values from the column
                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
            
        });

        $('#categoryFilter').on('change', function () {
            var selectedCategory = $(this).val();
            table.column(2).search(selectedCategory).draw();
           
        });

       
    });
</script>