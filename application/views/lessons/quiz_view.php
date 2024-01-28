<?php
$quiz_questions = $this->crud_model->get_quiz_questions($lesson_details['id']);
?>
<div id="quiz-body">
    <div class="" id="quiz-header" style="border: 1px solid #eee;padding: 10px;box-shadow: 2px 3px 4px 3px grey;">
        <i class="fa fa-book"></i> Trắc nghiệm : <strong><?php echo $lesson_details['title']; ?></strong><br>
        <i class="fa fa-question-circle"></i> <?php echo get_phrase("number_of_questions"); ?> : <strong><?php echo count($quiz_questions->result_array()); ?></strong><br>
        <i class="fas fa-clock"></i> <?php echo get_phrase("quiz_time"); ?> : <strong><?php echo $lesson_details['duration']; ?> (phút)</strong><br>
        <p><img width="100" height="100" src="https://img.icons8.com/external-flaticons-flat-flat-icons/64/external-exam-university-flaticons-flat-flat-icons-6.png"/></p>
        <?php if (count($quiz_questions->result_array()) > 0): ?>
            <button type="button" name="button" class="btn btn-sign-up btn-success mt-2" style="color: #fff;" onclick="getStarted(1)">Bắt đầu làm bài</button>
        <?php endif; ?>
    </div>

    
    <form id = "quiz_form" action="" method="post" onsubmit="return false;">
        <h3 id="title-question" class="hidden" style="text-align: center;"><?php echo $lesson_details['title']; ?></h3>
        <div id="timer-panel" class="hidden">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card text-left quiz-card">
                            <div class="card-body">
                                <svg width="30" height="34" viewBox="0 0 30 34" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0)"><path d="M12.5298 2.62727V0.193182C12.5298 0.0772727 12.6055 0 12.7191 0H19.3247C19.4383 0 19.514 0.0772727 19.514 0.193182V2.62727C19.514 2.74318 19.4383 2.82045 19.3247 2.82045H12.7191C12.6055 2.82045 12.5298 2.74318 12.5298 2.62727Z" fill="#434D5F"></path><path d="M16.0126 5.42871C11.7539 5.42871 7.9306 7.37985 5.35647 10.4514L7.57098 13.4264C9.48265 10.7798 12.5489 9.04121 15.9937 9.04121C21.7476 9.04121 26.4416 13.8321 26.4416 19.7048C26.4416 25.5776 21.7476 30.3685 15.9937 30.3685C11.5647 30.3685 7.76025 27.5287 6.24606 23.5298C5.81073 22.4094 5.56467 21.1923 5.54574 19.9173H7.94953L3.99369 14.5855L0 19.9367H2.02524C2.04416 21.1923 2.21451 22.3901 2.53628 23.5492C4.18297 29.5764 9.59621 34.0003 16.0126 34.0003C23.735 34.0003 30 27.5867 30 19.7242C30 11.8423 23.735 5.42871 16.0126 5.42871Z" fill="#6875F5"></path><path d="M16.0131 5.42827C16.4862 5.42827 16.9405 5.44759 17.3948 5.50554V2.82031H14.6313V5.50554C15.0856 5.4669 15.5588 5.42827 16.0131 5.42827Z" fill="#434D5F"></path><path d="M17.1292 21.1145C16.5235 21.7327 15.5204 21.7327 14.9147 21.1145C14.309 20.4964 14.309 19.4725 14.9147 18.8543C15.5204 18.2361 19.7034 16.2271 19.7034 16.2271C19.7034 16.2271 17.7349 20.477 17.1292 21.1145Z" fill="#6875F5"></path><path d="M16.0125 10.4512C15.6908 10.4512 15.4258 10.7216 15.4258 11.05V12.3444C15.4258 12.6728 15.6908 12.9432 16.0125 12.9432C16.3343 12.9432 16.5993 12.6728 16.5993 12.3444V11.05C16.6182 10.7023 16.3532 10.4512 16.0125 10.4512Z" fill="#B1AFB0"></path><path d="M16.0125 26.5044C15.6908 26.5044 15.4258 26.7749 15.4258 27.1033V28.3976C15.4258 28.726 15.6908 28.9964 16.0125 28.9964C16.3343 28.9964 16.5993 28.726 16.5993 28.3976V27.1033C16.6182 26.7749 16.3532 26.5044 16.0125 26.5044Z" fill="#B1AFB0"></path><path d="M24.5302 19.125H23.262C22.9403 19.125 22.6753 19.3955 22.6753 19.7239C22.6753 20.0523 22.9403 20.3227 23.262 20.3227H24.5302C24.852 20.3227 25.1169 20.0523 25.1169 19.7239C25.1169 19.3955 24.852 19.125 24.5302 19.125Z" fill="#B1AFB0"></path></g><defs><clipPath id="clip0"><rect width="30" height="34" fill="white"></rect></clipPath></defs></svg>
                                <span id="timer"></span>
                                <button style="float: right;" class="btn btn-sign-up btn-primary mt-2 mb-2" onclick="submitQuiz()"> <i class="fa fa-check"></i> Nộp bài</button>    
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (count($quiz_questions->result_array()) > 0): ?>
            <?php foreach ($quiz_questions->result_array() as $key => $quiz_question):
                $options = json_decode($quiz_question['options']);
            ?>
                <input type="hidden" name="lesson_id" value="<?php echo $lesson_details['id']; ?>">
                <div class="hidden" id = "question-number-<?php echo $key+1; ?>">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card text-left quiz-card">
                                <div class="card-body">
                                    <h6 class="card-title"><strong><?php echo get_phrase("question").' '.($key+1); ?> :</strong> <?php echo html_entity_decode($quiz_question['title']); ?></h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php
                                    foreach ($options as $key2 => $option): ?>
                                    <li class="list-group-item quiz-options">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="<?php echo $quiz_question['id']; ?>[]" value="<?php echo $key2+1; ?>" id="quiz-id-<?php echo $quiz_question['id']; ?>-option-id-<?php echo $key2+1; ?>" onclick="enableNextButton('<?php echo $quiz_question['id'];?>')">
                                            <label class="form-check-label" for="quiz-id-<?php echo $quiz_question['id']; ?>-option-id-<?php echo $key2+1; ?>">
                                                <?php echo $option; ?>
                                            </label>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if($key+1 != 1):?>
                    <button type="button" name="button" class="btn btn-sign-up btn-primary mt-2 mb-2" style="color: #fff;" onclick="showPreviousQuestion('<?php echo $key+1; ?>')"><i class="fas fa-backward"></i> Trước</button>
                    <?php endif?>
                    <button type="button" name="button" class="btn btn-sign-up btn-primary mt-2 mb-2" id = "next-btn-<?php echo $quiz_question['id'];?>" style="color: #fff;" <?php if(count($quiz_questions->result_array()) == $key+1):?>onclick="submitQuiz()"<?php else: ?>onclick="showNextQuestion('<?php echo $key+2; ?>')"<?php endif; ?> ><?php echo count($quiz_questions->result_array()) == $key+1 ? '<i class="fas fa-eye"></i> Nộp bài và xem kết quả' : '<i class="fas fa-forward"></i> Tiếp'; ?></button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </form>
</div>
<div id="quiz-result" class="text-left">

</div>
<style>
    .quiz-options:hover {
        background: orange;
        cursor: pointer;
    }

    .quiz-options:hover .form-check-label{
        cursor: pointer;
        color: #fff;
    }

    #timer{
        font-weight: 600;
        font-size: 2em;
    }

</style>
<script type="text/javascript">

function startCountdown(minutes) {

    var seconds = minutes * 60;

    function updateTimer() {
        var hours = Math.floor(seconds / 3600);
        var minutes = Math.floor((seconds % 3600) / 60);
        var remainingSeconds = seconds % 60;

        var formattedTime = pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds);

        document.getElementById("timer").innerHTML = formattedTime;

        if (seconds > 0) {
            seconds--;
        } else {
            clearInterval(timerInterval);
            document.getElementById("timer").innerHTML = '00:00:00 (Hết giờ)';
            $.ajax({
                url: '<?php echo site_url('home/submit_quiz'); ?>',
                type: 'post',
                data: $('form#quiz_form').serialize(),
                success: function(response) {
                    $('#quiz-body').hide();
                    $('#quiz-result').html(response);
                }
            });

        }
    }

    function pad(value) {
        return value < 10 ? "0" + value : value;
    }

    var timerInterval = setInterval(updateTimer, 1000);

    updateTimer();
}

        
function getStarted(first_quiz_question) {
    $('#quiz-header').hide();
    $('#lesson-summary').hide();
    $('#title-question').show();
    $('#timer-panel').show();
    $('#question-number-'+first_quiz_question).show();
    startCountdown(<?=$lesson_details['duration']; ?>);
}
function showNextQuestion(next_question) {
    $('#question-number-'+(next_question-1)).hide();
    $('#question-number-'+next_question).show();
}
function showPreviousQuestion(pre_question) {
    $('#question-number-'+(pre_question-1)).show();
    $('#question-number-'+pre_question).hide();
}
function submitQuiz() {
    let confirm = window.confirm('Bạn muốn xác nhận nộp bài bài trắc nghiệm ?');

    if(confirm){
        $.ajax({
            url: '<?php echo site_url('home/submit_quiz'); ?>',
            type: 'post',
            data: $('form#quiz_form').serialize(),
            success: function(response) {
                $('#quiz-body').hide();
                $('#quiz-result').html(response);
            }
        });

    }

    return false;
   
}
function enableNextButton(quizID) {
    $('#next-btn-'+quizID).prop('disabled', false);
}
</script>
