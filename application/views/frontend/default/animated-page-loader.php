<?php $lengthBoxAnimate = 4 ?>
<?php $animatePageData = isset($animatePageData) ? $animatePageData : [
    'id' => 'id',
    'cls_show_after' => '.shown-after-loading'
] ?>
<div class="animated-loader-area_<?= $animatePageData['id'] ?> mt-3" style="display: flex; margin-bottom: 75px;">
    <?php for ($i = 1; $i <= $lengthBoxAnimate; $i++) : ?>
        <div class="animated-loader animated-page-loader-<?= $i ?>" style="width: <?= 100 / $lengthBoxAnimate ?>%">
            <div>
                <div style="background: #fff; position: absolute; top: 210px; left: 0px; right: 0; height: 13px;"></div>
                <div style="background: #fff; position: absolute; top: 220px; left: 0px; right: 0; height: 20px; width: 15px;"></div>
                <div style="background: #fff; position: absolute; top: 240px; left: 0px; right: 0; height: 30px;"></div>
                <div style="background: #fff; position: absolute; top: 270px; left: 160px; right: 0; height: 13px;"></div>
                <div style="background: #fff; position: absolute; top: 270px; left: 0px; right: 0; height: 13px; width: 15px;"></div>
                <div style="background: #fff; position: absolute; top: 280px; left: 0px; right: 0; height: 13px;"></div>
                <div style="background: #fff; position: absolute; top: 290px; left: 0px; right: 0; height: 13px; width: 15px;"></div>
                <div style="background: #fff; position: absolute; top: 303px; left: 0px; right: 0; height: 42px;"></div>
                <div style="background: #fff; position: absolute; top: 290px; left: 100px; right: 0; height: 13px;"></div>
                <div style="background: #fff; position: absolute; top: 360px; left: 0px; right: 0; height: 20px;"></div>
                <div style="background: #fff; position: absolute; top: 345px; left: 0px; right: 90px; height: 20px;"></div>
                <div style="background: #fff; position: absolute; top: 210px; left: 176px; right: 0px; height: 150px; width: 15px;"></div>
            </div>
        </div>
    <?php endfor; ?>
</div>

<script type="text/javascript">
    window.CourseLoader_<?= $animatePageData['id'] ?> = {
        clsAnimateLoader: '.animated-loader-area_<?= $animatePageData['id'] ?>',
        clsShowAfterLoading: '<?= $animatePageData['cls_show_after'] ?>',
        checkJquery() {
            if (typeof $ !== 'function') {
                alert('Please install jQuery for run Course Loader!');
                return false;
            }
            return true;
        },
        hide() {
            if (!this.checkJquery()) return;
            $(this.clsAnimateLoader).hide();
            $(this.clsShowAfterLoading).css('display', 'block');
        },
        show() {
            if (!this.checkJquery()) return;
            $(this.clsAnimateLoader).css('display', 'flex');
            $(this.clsShowAfterLoading).hide();
        }
    }
</script>