<div class="row">
    <div class="col-lg-12">
        <div class="card text-white bg-quiz-result-info mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 class="card-title">Chúc mừng bạn đã hoàn thành bài test! <br> Kết quả bài kiểm tra.</h5>
                        <p class="card-text"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="8" fill="#6875F5"></circle><path fill-rule="evenodd" clip-rule="evenodd" d="M11.8325 5.17568C11.9398 5.2882 12 5.44079 12 5.5999C12 5.759 11.9398 5.91159 11.8325 6.02412L7.25703 10.8243C7.14977 10.9368 7.00433 11 6.85267 11C6.70101 11 6.55556 10.9368 6.44831 10.8243L4.16055 8.42422C4.05637 8.31105 3.99872 8.15948 4.00002 8.00216C4.00132 7.84483 4.06147 7.69434 4.16752 7.58309C4.27356 7.47184 4.41701 7.40874 4.56697 7.40737C4.71693 7.406 4.8614 7.46648 4.96927 7.57578L6.85267 9.55167L11.0238 5.17568C11.1311 5.06319 11.2765 5 11.4282 5C11.5798 5 11.7253 5.06319 11.8325 5.17568Z" fill="white"></path></svg> <?php echo 'Bạn trả lời '.$total_correct_answers.'/'.$total_questions.' câu đúng'; ?> .</p>
                    </div>
                    <div class="col-lg-8">
                        <img src="https://thaolejp.com/result-image.png" height="200">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="show-result" class="hidden">
    <?php $stt=1; ?>
    <?php foreach ($submitted_quiz_info as $each):
        $question_details = $this->crud_model->get_quiz_question_by_id($each['question_id'])->row_array();
        $options = json_decode($question_details['options']);
        $correct_answers = json_decode($each['correct_answers']);
        $submitted_answers = json_decode($each['submitted_answers']);
    ?>
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card text-left card-with-no-color-no-border">
                <div class="card-body">
                    <h6 class="card-title"><img src="<?php echo $each['submitted_answer_status'] == 1 ? base_url('assets/frontend/default/img/green-tick.png') : base_url('assets/frontend/default/img/red-cross.png'); ?>" alt="" height="15px;"> <?php echo '<b>Câu số '.($stt++).'</b> '.html_entity_decode($question_details['title']); ?></h6>
                    <?php for ($i = 0; $i < count($correct_answers); $i++): ?>
                        <p class="card-text"> -
                            <?php echo $options[($correct_answers[$i] - 1)]; ?>
                            <img src="<?php echo base_url('assets/frontend/default/img/green-circle-tick.png'); ?>" alt="" height="15px;">
                        </p>
                    <?php endfor; ?>
                    <p class="card-text"> <strong>Đáp án trả lời: </strong> [
                        <?php
                        $submitted_answers_as_csv = "";
                        for ($i = 0; $i < count($submitted_answers); $i++){
                            $submitted_answers_as_csv .= $options[($submitted_answers[$i] - 1)].', ';
                        }
                        echo rtrim($submitted_answers_as_csv, ', ');
                        ?>
                        ]</p>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="text-center">
    <a href="javascript::" name="button" class="btn btn-sign-up btn-dark mt-2" style="color: #fff;" onclick="$('#show-result').show();"><svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.835 7.23926H13.8732C13.664 7.23926 13.4651 7.33975 13.342 7.51201L10.1182 11.9827L8.65803 9.95654C8.53498 9.78633 8.33811 9.68379 8.12687 9.68379H7.16506C7.03175 9.68379 6.95382 9.83555 7.03175 9.94424L9.58704 13.488C9.6474 13.5722 9.72698 13.6409 9.81917 13.6883C9.91136 13.7356 10.0135 13.7603 10.1172 13.7603C10.2208 13.7603 10.323 13.7356 10.4152 13.6883C10.5074 13.6409 10.5869 13.5722 10.6473 13.488L14.9663 7.49971C15.0462 7.39102 14.9683 7.23926 14.835 7.23926Z" fill="#4F46E5"></path><path d="M11 1.3125C5.92637 1.3125 1.8125 5.42637 1.8125 10.5C1.8125 15.5736 5.92637 19.6875 11 19.6875C16.0736 19.6875 20.1875 15.5736 20.1875 10.5C20.1875 5.42637 16.0736 1.3125 11 1.3125ZM11 18.1289C6.7877 18.1289 3.37109 14.7123 3.37109 10.5C3.37109 6.2877 6.7877 2.87109 11 2.87109C15.2123 2.87109 18.6289 6.2877 18.6289 10.5C18.6289 14.7123 15.2123 18.1289 11 18.1289Z" fill="#4F46E5"></path></svg> Xem kết quả</a>
    <a href="javascript::" name="button" class="btn btn-sign-up btn-dark mt-2" style="color: #fff;" onclick="location.reload();"><svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1.50092V5.25092H1.4365M1.4365 5.25092C1.93439 4.01952 2.82676 2.9881 3.97377 2.31832C5.12078 1.64853 6.4576 1.37823 7.77473 1.54978C9.09185 1.72132 10.3148 2.32502 11.252 3.26625C12.1892 4.20749 12.7876 5.43307 12.9535 6.75092M1.4365 5.25092H4.75M13 13.5009V9.75092H12.5642M12.5642 9.75092C12.0656 10.9816 11.173 12.0122 10.0261 12.6814C8.87923 13.3506 7.5428 13.6206 6.22607 13.4491C4.90935 13.2776 3.68665 12.6743 2.7494 11.7337C1.81215 10.7931 1.21327 9.56826 1.0465 8.25092M12.5642 9.75092H9.25" stroke="#6875F5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg> Làm lại</a>
</div>
