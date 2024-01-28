<div class="learn_from_expert_box">
    <?php foreach ($course_expert as $ce) : ?>
        <div class="box">
            <div class="d-flex m-auto row" style="width: 80%">
                <div class="content py-4 pr-3 col-lg-7 col-md-6 col-12">
                    <div class="d-flex mb-4 align-items-center">
                        <div class="expert_avatar" style="background-image: url('<?= base_url($ce['experts']['avatar']) ?>')"></div>
                        <div class="expert_info">
                            <h2><?= $ce['experts']['full_name'] ?></h2>
                            <p class="mb-0 my-2 color_text f-14">
                                <b>0</b> khóa học &nbsp;&nbsp; • &nbsp;&nbsp;
                                <b>0</b> học viên &nbsp;&nbsp; • &nbsp;&nbsp;
                                <b>5</b> <i class="fas fa-star" style="color: rgb(241, 198, 0)"></i>
                            </p>
                            <?php if (count($ce['partners']) > 0) : ?>
                                <p class="mb-0 color_text2 f-14" style="overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 2;display: -webkit-box;-webkit-box-orient: vertical;height: 42px;">
                                    Chuyên gia đồng hành: <?= implode(', ', $ce['partners_data']) ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <h4><?= $ce['title'] ?></h4>
                    <p><?= $ce['description'] ?></p>
                    <div class="mt-2">
                        <a href="https://gitiho.com/lo-trinh-hoc-tap/dan-dat-bang-tri-tue-cam-xuc" class="font-weight-bold" tabindex="0">Xem chi tiết<i class="fas fa-angle-right ml-1"></i></a>
                    </div>
                </div>
                <div class="list-course py-4 pl-3 col-lg-5 col-md-6 col-12">
                    <?php foreach ($ce['courses'] as $course) : ?>
                        <div class="courses d-flex my-2">
                            <a rel="nofollow" class="Home_Image_MKTG05" href="#" tabindex="0">
                                <div style="
										background-image: url('<?= $this->crud_model->get_course_thumbnail_url($course['id']); ?>');
										background-size: cover;
										background-position: center;
										width: 150px;
										height: 120px;
										border-radius: 10px;
										background-repeat: no-repeat;
									"></div>
                            </a>
                            <div class="course-info ml-3">
                                <a rel="nofollow" class="font-weight-bold Home_Textlink_MKTG05 cou-title" href="#" tabindex="0">
                                    <?= $course['title'] ?>
                                </a>
                                <div class="my-1">
                                    <a rel="nofollow" class="f-12 color_text2 Home_Textlink_phamhaibang" href="#" title="Phạm Hải Bằng" tabindex="0">
                                        <span><?= $course['creator']['first_name'] . ' ' . $course['creator']['last_name'] ?></span>
                                    </a>
                                </div>
                                <div class="cou-rating mt-1">
                                    <div class="gen-star">
                                        <div class="stars">
                                            <div class="stars-content">
                                                <div class="fas fa-star"></div>
                                                <div class="fas fa-star"></div>
                                                <div class="fas fa-star"></div>
                                                <div class="fas fa-star"></div>
                                                <div class="fas fa-star"></div>
                                            </div>
                                        </div><span class="review-count pull-left"><strong>0</strong> (0 đánh giá)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="w-100 text-center mt-3 mb-5">
    <button type="button" class="btn btn-outline-secondary">
        Xem tất cả lộ trình
        <i class="fas fa-angle-down ml-1"></i>
    </button>
</div>
