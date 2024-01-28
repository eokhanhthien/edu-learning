<div class="float-menu-category-mobile">
    <menu class="menu">
        <nav>
            <ul class="first-level" style="overflow: auto">
                <li class="close js-menu">Đóng</li>
                <?php if ($this->session->userdata('user_id')) : ?>
                    <li class="blue">
                        <a href="">
                            <div class="clearfix">
                                <div class="user-image text-center">
                                    <img class="w-50" src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="">
                                </div>
                                <div class="user-details text-center">
                                    <div class="user-name">
                                        <span class="hi"><?php echo site_phrase('hi'); ?>,</span>
                                        <?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?>
                                    </div>
                                    <div class="user-email d-flex flex-column">
                                        <span class="email"><?php echo $user_details['email']; ?></span>
                                        <span class="welcome"><?php echo site_phrase("welcome_back"); ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endif; ?>
                <?php $menuLists = ViewHelper::getMenuData(); ?>
                <?php foreach ($menuLists as $rootId => $rootMenu) : ?>
                    <?php $rootMenuData = $rootMenu['data'] ?>
                    <?php if ($rootMenuData['is_content'] == '1') continue ?>
                    <li class="blue">
                        <a href="#"><?= $rootMenuData['name'] ?></a>
                        <?php if (!empty($rootMenu['submenu'])) : ?>
                            <ul class="second-level">
                                <?php foreach ($rootMenu['submenu'] as $sub1Id => $sub1Menu) : ?>
                                    <?php if (empty($sub1Menu['submenu'])) : ?>
                                        <?php $sub1MenuData = $sub1Menu['data']; ?>
                                        <li>
                                            <a href="<?= $sub1MenuData['url'] ?>"><?= $sub1MenuData['name'] ?></a>
                                        </li>
                                    <?php else : ?>
                                        <?php foreach ($sub1Menu['submenu'] as $sub2Id => $sub2Menu) : ?>
                                            <?php foreach ($sub2Menu['data'] as $sub2MenuData) : ?>
                                                <li>
                                                    <a href="<?= $sub2MenuData['url'] ?>"><?= $sub2MenuData['name'] ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
                <?php if (!$this->session->userdata('user_id')) : ?>
                    <li class="blue">
                        <a href="<?= site_url('home/login'); ?>"><?= site_phrase('log_in'); ?>/<?= site_phrase('sign_up'); ?></a>
                    </li>
                <?php else : ?>
                    <li><a href="<?php echo site_url('home/my_courses'); ?>"><i class="far fa-gem"></i><?php echo site_phrase('my_courses'); ?></a></li>
                    <li><a href="<?php echo site_url('home/my_wishlist'); ?>"><i class="far fa-heart"></i><?php echo site_phrase('my_wishlist'); ?></a></li>
                    <li><a href="<?php echo site_url('home/my_messages'); ?>"><i class="far fa-envelope"></i><?php echo site_phrase('my_messages'); ?></a></li>
                    <li><a href="<?php echo site_url('home/purchase_history'); ?>"><i class="fas fa-shopping-cart"></i><?php echo site_phrase('purchase_history'); ?></a></li>
                    <li><a href="<?php echo site_url('home/profile/user_profile'); ?>"><i class="fas fa-user"></i><?php echo site_phrase('user_profile'); ?></a></li>
                    <?php if (addon_status('customer_support')) : ?>
                        <li><a href="<?php echo site_url('addons/customer_support/user_tickets'); ?>"><i class="fas fa-life-ring"></i><?php echo site_phrase('support'); ?></a></li>
                    <?php endif; ?>
                    <?php if (get_settings('allow_instructor') == 1) : ?>
                        <li>
                            <a href="<?php echo site_url('user'); ?>">
                                <i class="fas fa-user"></i>
                                <?= site_phrase('instructor'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="dropdown-user-logout"><a href="<?php echo site_url('login/logout'); ?>"><?php echo site_phrase('log_out'); ?></a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </menu>
</div>
<script>
    $('.second-level').prepend('<li class="back">Back</li>');

    var toggleLevel = function(e) {
        var l = e.data.level;
        var $menu = $('menu');
        // Toggele first level
        if (l == 1) {
            if ($(e.target).hasClass('js-menu') || ($('.is-open').length && !$(e.target).parents('nav').length))
                $menu.toggleClass('is-open');
        } else if (l == 2) {
            // Close second level
            if ($menu.hasClass('is-first-level')) {
                $('.second-level, menu').removeClass('is-second-level is-first-level');
            }
            // Open second level
            else {
                $menu.addClass('is-first-level').find($(this)).next('.second-level').addClass('is-second-level');
            }
        }
    }

    $('.first-level li > a, .back').on("click", {
        level: 2
    }, toggleLevel);

    $(document).on('click', {
        level: 1
    }, toggleLevel);
</script>
