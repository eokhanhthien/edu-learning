<?php if (empty($courses)) : ?>
    <h3 class="text-center w-100 mb-5">Không có khóa học nào phù hợp!</h3>
<?php else : ?>

    <?php $cart_items = $this->session->userdata('cart_items') ?? [] ?>
    <div class="d-flex flex-wrap">
        <?php foreach ($courses as $course) : ?>
            <div class="course-box-wrap" style="width: calc(391px + .5rem) !important">
                <a href="<?= site_url('home/course/' . rawurlencode(slugify($course['title'])) . '/' . $course['id']); ?>" class="has-popover">
                    <div class="course-box">
                        <div class="course-image" style="background-image: url('<?= $this->crud_model->get_course_thumbnail_url($course['id']); ?>')"></div>
                        <div class="course-details">
                            <h5 class="title"><?= $course['title']; ?></h5>
                            <p class="instructors"><?= $course['short_description']; ?></p>
                            <div class="rating">
                                <?php
                                $total_rating =  $this->crud_model->get_ratings('course', $course['id'], true)->row()->rating;
                                $number_of_ratings = $this->crud_model->get_ratings('course', $course['id'])->num_rows();
                                if ($number_of_ratings > 0) {
                                    $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                                } else {
                                    $average_ceil_rating = 0;
                                }

                                for ($i = 1; $i < 6; $i++) : ?>
                                    <?php if ($i <= $average_ceil_rating) : ?>
                                        <i class="fas fa-star filled"></i>
                                    <?php else : ?>
                                        <i class="fas fa-star"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <span class="d-inline-block average-rating"><?= $average_ceil_rating; ?></span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-left text-secondary d-inline-block course-compare" style="font-size: 13px; cursor : pointer; font-weight : 500; color : #4d98ad !important;" redirect_to="<?= site_url('home/compare?course-1=' . rawurlencode(slugify($course['title'])) . '&&course-id-1=' . $course['id']); ?>">
                                    <i class="fas fa-balance-scale"></i> <?= site_phrase('compare'); ?>
                                </p>
                                <?php if ($course['is_free_course'] == 1) : ?>
                                    <p class="price d-inline-block"><?= site_phrase('free'); ?></p>
                                <?php else : ?>
                                    <?php if ($course['discount_flag'] == 1) : ?>
                                        <p class="price d-inline-block"><small><?= currency($course['price']); ?></small><?= currency($course['discounted_price']); ?></p>
                                    <?php else : ?>
                                        <p class="price d-inline-block"><?= currency($course['price']); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </a>

                <div class="webui-popover-content">
                    <div class="course-popover-content">
                        <?php if ($course['last_modified'] == "") : ?>
                            <div class="last-updated"><?= site_phrase('last_updated') . ' ' . date('D, d-M-Y', $course['date_added']); ?></div>
                        <?php else : ?>
                            <div class="last-updated"><?= site_phrase('last_updated') . ' ' . date('D, d-M-Y', $course['last_modified']); ?></div>
                        <?php endif; ?>

                        <div class="course-title">
                            <a href="<?= site_url('home/course/' . rawurlencode(slugify($course['title'])) . '/' . $course['id']); ?>"><?= $course['title']; ?></a>
                        </div>
                        <div class="course-meta">
                            <?php if ($course['course_type'] == 'general') : ?>
                                <span class=""><i class="fas fa-play-circle"></i>
                                    <?= $this->crud_model->get_lessons('course', $course['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                                </span>
                                <span class=""><i class="far fa-clock"></i>
                                    <?php
                                    $total_duration = 0;
                                    $lessons = $this->crud_model->get_lessons('course', $course['id'])->result_array();
                                    foreach ($lessons as $lesson) {
                                        if ($lesson['lesson_type'] != "other" && $lesson['lesson_type'] != "text") {
                                            $time_array = explode(':', $lesson['duration']);
                                            $hour_to_seconds = $time_array[0] * 60 * 60;
                                            $minute_to_seconds = $time_array[1] * 60;
                                            $seconds = $time_array[2];
                                            $total_duration += $hour_to_seconds + $minute_to_seconds + $seconds;
                                        }
                                    }
                                    echo gmdate("H:i:s", $total_duration) . ' ' . site_phrase('hours');
                                    ?>
                                </span>
                            <?php elseif ($course['course_type'] == 'scorm') : ?>
                                <span class="badge badge-light"><?= site_phrase('scorm_course'); ?></span>
                            <?php endif; ?>
                            <span class=""><i class="fas fa-closed-captioning"></i><?= ucfirst($course['language']); ?></span>
                        </div>
                        <div class="course-subtitle"><?= $course['short_description']; ?></div>
                        <div class="what-will-learn">
                            <ul>
                                <?php
                                $outcomes = json_decode($course['outcomes']);
                                foreach ($outcomes as $outcome) : ?>
                                    <li><?= $outcome; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="popover-btns">
                            <?php if (is_purchased($course['id'])) : ?>
                                <div class="purchased">
                                    <a href="<?= site_url('home/my_courses'); ?>"><?= site_phrase('already_purchased'); ?></a>
                                </div>
                            <?php else : ?>
                                <?php if ($course['is_free_course'] == 1) :
                                    if ($this->session->userdata('user_login') != 1) {
                                        $url = "#";
                                    } else {
                                        $url = site_url('home/get_enrolled_to_free_course/' . $course['id']);
                                    } ?>
                                    <a href="<?= $url; ?>" class="btn add-to-cart-btn big-cart-button" onclick="handleEnrolledButton()"><?= site_phrase('get_enrolled'); ?></a>
                                <?php else : ?>
                                    <button type="button" class="btn add-to-cart-btn <?php if (in_array($course['id'], $cart_items)) echo 'addedToCart'; ?> big-cart-button-<?= $course['id']; ?>" id="<?= $course['id']; ?>" onclick="handleCartItems(this)">
                                        <?php
                                        if (in_array($course['id'], $cart_items))
                                            echo site_phrase('added_to_cart');
                                        else
                                            echo site_phrase('add_to_cart');
                                        ?>
                                    </button>
                                <?php endif; ?>
                                <button type="button" class="wishlist-btn <?php if ($this->crud_model->is_added_to_wishlist($course['id'])) echo 'active'; ?>" title="Add to wishlist" onclick="handleWishList(this)" id="<?= $course['id']; ?>"><i class="fas fa-heart"></i></button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="w-100 text-center mt-3 mb-5">
        <a class="btn btn-outline-secondary" href="/home/courses">
            Xem thêm
            <i class="fas fa-angle-down ml-1"></i>
        </a>
    </div>
<?php endif; ?>
