
<style>

.series_list .numberlist a {
    position: relative;
    display: block;
    padding: 0.8em 1em 0.8em 6em;
    font-weight: bold;
    margin: 1em 0;
    background: #fff;
    color: #444;
    text-decoration: none;
    -moz-border-radius: .3em;
    -webkit-border-radius: 0.3em;
    border-radius: 0.3em;
	border: 1px solid #ccc;
	background-color: #cbe7f8;
}

.numberlist ol {
	list-style-type: none;
	padding-left: 0; /* Nếu bạn muốn loại bỏ khoảng cách bên trái của danh sách */
}
</style>
<div id="primary" class="content-area shadow rounded series_list container">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<div class="alert alert-warning mt-4 mb-4" role="alert" style="padding: 1.5rem 1.25rem;">
					<h1 style="font-size: 30px;text-align: center; margin-bottom: 0" class="font-weight-bold text-danger"><?php echo $page_title ?></h1>
				</div>
			</header>
        
			<div class="numberlist">
				<ol>
					<?php foreach ($list_lesson as $lesson) : ?>
						<li class="mb-4 shadow rounded">
							 <a  href="<?= site_url('/bai-hoc-ngu-phap/' . $lesson->id) ?>" ><span>Bài: <?php echo $lesson->lesson_number ?> </span> <?php echo $lesson->name ?> </a>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</main>
	</div>