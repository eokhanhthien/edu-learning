<style>
.dropdown{
    display:inline-block; 
    position:relative;
  }

  .dropdown button{
    border:none;
    padding:8px 16px;
    background-color:transparent;
    color:#fff;
    transition:.3s;
    cursor:pointer;
    height: 100%;
  }
  
  .dropdown:hover button{
    background-color:mediumSeaGreen;
  }
.dropdown:hover{
  filter:drop-shadow(0 2px 4px rgba(0,0,0,0.2));
}
  .dropdown > div{
    background-color:#fff;
    z-index:1;
    visibility:hidden;
    position:absolute;
    min-width:100%;
    opacity:0;
    transition:.3s;
  }
.dropdown .submenu{
  position:relative;
}
 .dropdown .submenu > div{
   background-color:#fff;
  visibility:hidden;
   position:absolute;
   left:100%;
   top:0;
   transition:.3s;
   opacity:0;
}
/*use the following commented class if you wanna show submenu at left*/
/*
.dropdown .submenu.atLeft > div{
  left:-100%;
}
*/
 .dropdown .submenu:hover > div{
  visibility:visible;
   opacity:1;
}

  .dropdown:hover > div{
    visibility:visible;
    opacity:1;
  }

  .dropdown a{
    display:block;
    text-decoration:none;
    padding:8px;
    color:#000;
    transition:.1s;
    white-space:nowrap;
  }
  
  .dropdown a:hover,.dropdown .submenu:hover > a{
    background-color:mediumSeaGreen;
    color:#fff;
  }
</style>
<?php 
// Lấy danh sách grammar
$grammars = $this->db->get('grammars')->result_array();
$vocabulary = $this->db->get('vocabulary')->result_array();
?>
<section class="menu-area">
  <div class="container-xl p-0">
    <div class="row pl-2 pr-2">
      <div class="col">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="mobile-header-buttons">
            <li><a class="mobile-nav-trigger js-menu menu-toggle" href="#">Menu<span></span></a></li>
            <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
          </ul>

          <a href="<?php echo site_url(''); ?>" class="navbar-brand" href="#"><img src="<?php echo base_url('uploads/system/' . get_frontend_settings('dark_logo')); ?>" alt="" height="35"></a>

          <div class="menu-category-icon d-flex m-0" style="width: 200px; cursor: pointer;">
            <img alt="Danh mục" src="<?= base_url('uploads/danh_muc.svg') ?>" data-src="<?= base_url('uploads/danh_muc.svg') ?>" width="18px" height="18px" class="mr-1 lazyload" style="margin-bottom: 1px;" />
            <b>DANH MỤC</b>
          </div>

          <div class="d-flex w-25 w-sm-50 w-md-100 w-lg-100 justify-content-between">
            <form class="inline-form form-search" action="<?php echo site_url('home/search'); ?>" method="get" style="width: 65%;">
              <div class="input-group search-box mobile-search">
                <input type="text" name='query' class="form-control search_for_courses" placeholder="<?php echo site_phrase('search_for_courses'); ?>">
                <div class="input-group-append">
                  <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
            <?php if ($this->session->userdata('admin_login')) : ?>
              <div class="instructor-box menu-icon-box">
                <div class="icon">
                  <a href="<?php echo site_url('admin'); ?>" style="border: 1px solid transparent; margin: 10px 10px; font-size: 14px; width: 100%; border-radius: 0;"><?php echo site_phrase('administrator'); ?></a>
                </div>
              </div>
            <?php endif; ?>
            <div class="d-flex">
              <div class="cart-box menu-icon-box" id="cart_items">
                <?php include 'cart_items.php'; ?>
              </div>
              <span class="signin-box-move-desktop-helper"></span>
              <div class="sign-in-box btn-group d-flex align-items-center">
                <?php if (!$this->session->userdata('user_id')) : ?>
                  <div class="mr-1">
                    <a href="<?php echo site_url('home/login'); ?>" class="btn btn-secondary" style="border-radius: 24px !important; padding: 6px 12px !important"><?php echo site_phrase('log_in'); ?></a>
                  </div>
                  <div class="ml-1">
                    <a href="<?php echo site_url('home/sign_up'); ?>" class="btn btn-danger" style="border-radius: 24px !important; padding: 6px 12px !important"><?php echo site_phrase('sign_up'); ?></a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>

  <div class="menu-area-bottom">
    <ul>
      <li><a href="<?=site_url('de-thi'); ?>">Đề thi</a></li>
      <!-- <li><a href="<?=site_url('cam-nhan-hoc-vien'); ?>">Cảm nhận học viên</a></li> -->
      <!-- thêm drop down -->
  <div class="dropdown">
  <button>Ngữ pháp</button>
  <div >
    <?php if (!empty($grammars)) : ?>
          <?php foreach ($grammars as $grammar) : ?>
            <?php if ($grammar['parent_id'] == 0) : ?>
              <div class="submenu">
                <a href="#"><?= $grammar['name']; ?></a>
                  <div >
                  <?php foreach ($grammars as $grammar_child) : ?>
                      <?php if ($grammar_child['parent_id'] == $grammar['id']) : ?>
                        <a href="<?= site_url('/danh-sach-bai-hoc/' . $grammar_child['id']); ?>"><?= $grammar_child['name']; ?></a>
                      <?php endif; ?>
                  <?php endforeach; ?>    
                  </div>
                </div>
            <?php endif; ?>
          <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<div class="dropdown">
  <button>Từ vựng</button>
  <div >
    <?php if (!empty($vocabulary)) : ?>
          <?php foreach ($vocabulary as $item) : ?>
            <?php if ($item['parent_id'] == 0) : ?>
              <div class="submenu">
                <a href="#"><?= $item['name']; ?></a>
                  <div >
                  <?php foreach ($vocabulary as $item_child) : ?>
                      <?php if ($item_child['parent_id'] == $item['id']) : ?>
                        <a href="<?= site_url('/danh-sach-tu-vung/' . $item_child['id']); ?>"><?= $item_child['name']; ?></a>
                      <?php endif; ?>
                  <?php endforeach; ?>    
                  </div>
                </div>
            <?php endif; ?>
          <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>
    
    </ul>
  </div>
</section>
<div class="float-menu-category container d-flex p-0">
  <div class="container-fluid py-4 px-5">
    <div class="row h-100">
      <!-- Não to lắm ms maintenance được menu này =)) -->
      <?php $menuLists = ViewHelper::getMenuData(); ?>
      <div class="col-3 col-box col-box-1 border-right">
        <!-- Render Menu level 1 -->
        <ul>
          <?php foreach ($menuLists as $rootId => $rootMenu) : ?>
            <?php $rootMenuData = $rootMenu['data'] ?>
            <li>
              <a href="<?= $rootMenuData['url'] == '#' ? 'javascript:void' : $rootMenuData['url'] ?>" title="<?= $rootMenuData['name'] ?>" alt="<?= $rootMenuData['name'] ?>" data-id="<?= $rootMenuData['id'] ?>" data-is-content="<?= $rootMenuData['is_content'] ?>" data-content="<?= htmlspecialchars($rootMenuData['content']) ?>">
                <?= $rootMenuData['name'] ?>
                <i class="icon-down-dir"></i>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="col-3 col-box col-box-2 border-right">
        <!-- Render Menu level 2 -->
        <?php foreach ($menuLists as $rootId => $rootMenu) : ?>
          <ul data-parent-id="<?= $rootId ?>" class="d-none">
            <?php if (!empty($rootMenu['submenu'])) : ?>
              <?php foreach ($rootMenu['submenu'] as $sub1Id => $sub1Menu) : ?>
                <?php $sub1MenuData = $sub1Menu['data'] ?>
                <li>
                  <a href="<?= $sub1MenuData['url'] == '#' ? 'javascript:void' : $sub1MenuData['url'] ?>" title="<?= $sub1MenuData['name'] ?>" alt="<?= $sub1MenuData['name'] ?>" data-id="<?= $sub1MenuData['id'] ?>">
                    <?= $sub1MenuData['name'] ?>
                    <i class="icon-down-dir"></i>
                  </a>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        <?php endforeach; ?>
      </div>
      <div class="col-6 col-box col-box-3">
        <!-- Render Menu level 3 -->
        <?php foreach ($menuLists as $rootId => $rootMenu) : ?>
          <?php if (!empty($rootMenu['submenu'])) : ?>
            <?php foreach ($rootMenu['submenu'] as $sub1Id => $sub1Menu) : ?>
              <?php if (!empty($sub1Menu['submenu'])) : ?>
                <ul data-parent-id="<?= $sub1Id ?>" class="d-none">
                  <?php foreach ($sub1Menu['submenu'] as $sub2Id => $sub2Menu) : ?>
                    <?php foreach ($sub2Menu['data'] as $sub2MenuData) : ?>
                      <li>
                        <a href="<?= $sub2MenuData['url'] == '#' ? 'javascript:void' : $sub2MenuData['url'] ?>" title="<?= $sub2MenuData['name'] ?>" alt="<?= $sub2MenuData['name'] ?>" data-id="<?= $sub2MenuData['id'] ?>">
                          <?= $sub2MenuData['name'] ?>
                          <i class="icon-down-dir"></i>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
      <div class="col-9 col-box col-box-content"></div>
    </div>
  </div>
</div>
<div class="float-menu-category-opacity"></div>
<?php include('components/menu_mobile.php') ?>
<script>
  (() => {
    const resetTopPadding = () => {
      //reset top padding for body when header stick
      const body = document.querySelector('body');
      const menuArea = document.querySelector('.menu-area');
      const menuAreaBottom = menuArea.querySelector('.menu-area-bottom');
      const floatMenuCategory = document.querySelector('.float-menu-category');
      const menuAreaHeight = menuArea.offsetHeight;
      body.style.paddingTop = menuAreaHeight + 'px';
      floatMenuCategory.style.top = menuAreaHeight - menuAreaBottom.offsetHeight + 'px';
    }

    const showHideHeaderOnScroll = () => {
      //show hide header on scroll
      const menuArea = document.querySelector('.menu-area');
      const floatMenuCategory = document.querySelector('.float-menu-category');
      const menuAreaHeight = menuArea.offsetHeight;
      const headerHeight = menuAreaHeight;
      let windowPageYOffset = 0;
      window.addEventListener('scroll', (e) => {
        const currentPageYOffset = window.pageYOffset;
        if (
          currentPageYOffset < headerHeight ||
          currentPageYOffset < windowPageYOffset
        ) {
          menuArea.classList.remove('hide');
          floatMenuCategory.classList.remove('stick-top');
        } else {
          menuArea.classList.add('hide');
          floatMenuCategory.classList.add('stick-top');
        }
        windowPageYOffset = currentPageYOffset;
      });
    }

    const actionHoverFloatMenuItem = () => {
      //hover to menu item of float box
      const menuCategoryIcon = document.querySelector('.menu-category-icon');
      const floatMenuCategory = document.querySelector('.float-menu-category');
      const floatMenuCategoryOpacity = document.querySelector('.float-menu-category-opacity');
      const inputSerachForCourse = document.querySelector('.search_for_courses');
      const mouseoverEvent = new Event('mouseover');
      let firstTimeOpenFloatMenu = true;

      menuCategoryIcon.addEventListener('click', () => {
        floatMenuCategory.classList.toggle('show');
        floatMenuCategoryOpacity.classList.toggle('show');

        if (!firstTimeOpenFloatMenu) return;

        setTimeout(() => {
          const firstChild = document.querySelector('.col-box-1 li:first-child');
          if (firstChild) {
            firstChild.querySelector('a').dispatchEvent(mouseoverEvent);
          }
        }, 200);

        setTimeout(() => {
          const secondChild = document.querySelector('.col-box-2 li:first-child');
          if (secondChild) {
            secondChild.querySelector('a').dispatchEvent(mouseoverEvent);
          }
        }, 400);

        setTimeout(() => {
          const thirdChild = document.querySelector('.col-box-3 li:first-child');
          if (thirdChild) {
            thirdChild.querySelector('a').dispatchEvent(mouseoverEvent);
          }
        }, 600);

        firstTimeOpenFloatMenu = false;
      });

      floatMenuCategoryOpacity.addEventListener('click', () => {
        floatMenuCategory.classList.remove('show');
        floatMenuCategoryOpacity.classList.remove('show');
      });

      inputSerachForCourse.addEventListener('focusin', () => {
        floatMenuCategory.classList.remove('show');
        floatMenuCategoryOpacity.classList.remove('show');
      });

      floatMenuCategory.querySelectorAll('a').forEach((a) => {
        a.addEventListener('mouseover', function() {
          const colBox = this.closest('.col-box');
          const id = this.getAttribute('data-id');
          const isContent = this.getAttribute('data-is-content') == '1';

          colBox.querySelectorAll('a.active').forEach((aActive) => {
            aActive.classList.remove('active');
          });
          this.classList.add('active');

          if (isContent) {
            this.closest('.float-menu-category').classList.add('has-content');
            const content = this.getAttribute('data-content');
            this.closest('.float-menu-category').querySelector('.col-box-content').innerHTML = content;
            return;
          }

          this.closest('.float-menu-category').classList.remove('has-content');

          const nextBox = colBox.nextElementSibling;
          if (!nextBox || nextBox.classList.contains('col-box-content')) return;

          nextBox.querySelectorAll('ul').forEach((ul) => {
            ul.classList.add('d-none');
          });

          const ulChild = nextBox.querySelector(`[data-parent-id="${id}"]`);
          if (ulChild) {
            ulChild.classList.remove('d-none');
          }

          const nextBox2 = nextBox.nextElementSibling;
          if (!nextBox2 || nextBox2.classList.contains('col-box-content')) return;

          nextBox2.querySelectorAll('ul').forEach((ul) => {
            ul.classList.add('d-none');
          });
        });
      })
    }

    resetTopPadding();
    showHideHeaderOnScroll();
    actionHoverFloatMenuItem();
  })();
</script>
