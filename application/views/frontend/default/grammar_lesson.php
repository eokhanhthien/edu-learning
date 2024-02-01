<style>
    .title {
        font-size: 29px;
        margin: 24px 0px;
        font-weight: 600;
    }
    table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Thêm khoảng trắng trên bảng */
        }

        th, td {
            border: 1px solid #ddd; /* Màu và độ dày của khung */
            padding: 8px; /* Khoảng cách bên trong ô */
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Màu nền của tiêu đề */
        }
</style>

<div class="container course_container">
        <div class="title">
            Bài <?php echo $grammar_lesson_details['lesson_number'] ?> : <?php echo $page_title; ?>
        </div>
   

        <div>
            <?php echo html_entity_decode($grammar_lesson_details['content']); ?>
        </div>
</div>