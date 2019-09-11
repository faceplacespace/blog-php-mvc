<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.shapedtheme.com/kotha-pro-html/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 08:50:25 GMT -->
<head>
	<!-- Document Settings -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<!-- Page Title -->
	<title><?=$this->e($title)?></title>
	<!-- Fonts -->
	<link
		href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i%7cOswald:300,400,500,600,700%7cPlayfair+Display:400,400i,700,700i"
		rel="stylesheet">
	<!-- Styles -->
        <link rel="stylesheet" href="../app/views/front/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../app/views/front/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="../app/views/front/assets/css/slick-theme.css">
	<link rel="stylesheet" href="../app/views/front/assets/css/slick.css">
	<link rel="stylesheet" href="../app/views/front/assets/css/style.css">
        
</head>
<body>
<header class="kotha-menu marketing-menu">
	<nav class="navbar  navbar-default">
		<div class="container">
			<div class="menu-content">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
					        data-target="#myNavbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="top-social-icons list-inline pull-right">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li class="top-search">
							<a href="#" class="sactive">
								<i class="fa fa-search"></i>
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav text-uppercase pull-left">
						<li><a href="/">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"  role="button"
							   aria-haspopup="true" aria-expanded="false">Layouts</a>
							<ul class="dropdown-menu">
								<li><a href="single-page.html">Standard Post</a></li>
								<li><a href="default-1st-large-then-grid.html">1st Large Then Grid</a></li>
								<li><a href="default-grid.html">Grid Layout</a></li>
								<li><a href="default-1st-large-then-list.html">1st Large Then list</a></li>
								<li><a href="default-list.html">List Layout</a></li>
								<li><a href="grid-2-columns.html">Grid 2 Columns Layout</a></li>
								<li><a href="default-grid-3-columns.html">Grid 3 Columns Layout</a></li>
								<li><a href="isotope-blog-grid.html">Grid Layout with isotope</a></li>
								<li><a href="grid-masonry.html">Masonry Layout</a></li>
								<li><a href="index-overlay-post.html">Post Overlay Layout</a></li>
								<li><a href="single-page.html">Single Post</a></li>
							</ul>
						</li>
                                                <?php if (\Delight\Cookie\Session::has('auth_username')): ?>
                                                <li><a href="#"><?=\Delight\Cookie\Session::get('auth_username');?></a></li>
						<li><a href="/logout">Logout</a></li>
                                                    <?php if(\Delight\Cookie\Session::has('auth_roles') && \Delight\Cookie\Session::get('auth_roles') === 1): ?>
                                                <li><a href="/admin">Control Panel</a></li>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                <li><a href="/login">Login</a></li>
                                                <?php endif; ?>
					</ul>
				</div>
				<div class="show-search">
					<form role="search" method="get" id="searchform-1" action="#">
						<input type="text" placeholder="Search and hit enter..." name="s" id="se">
					</form>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</nav>
	<div class="kotha-logo text-center">
		<h1><a href="index-2.html"><img src="../app/views/front/assets/images/kotha-logo.png" alt="KothaPro"></a></h1>
	</div>
</header>

<?=$this->section('content')?>

<footer>
	<div class="container">
		<div class="footer-widget-row">
			<div class="footer-widget contact-widget">
				<div class="widget-title">
					<img src="../app/views/front/assets/images/ft-logo.png" alt="">
				</div>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
					ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eaccusam et justo duo
					dolores eteem.</p>
				<div class="address">
					<h4 class="text-uppercase">contact Info</h4>
					<p> 239/2 NK Street, DC, USA</p>
					<p> Phone: +123 456 78900</p>
					<a href="mailto:theme@kotha.com">theme@kotha.com</a>
				</div>
			</div>
			<div class="footer-widget twitter-widget">
				<h2 class="widget-title text-uppercase">
					Latest TWeeTs
				</h2>
				<div class="single-tweet">
					<p>Check our new theme 'kotha - Personal WordPress Blog Theme' on #themeforest #Envato
						#WordPress <br>
						<a href="https://t.co/kN5OPEuPzx">https://t.co/kN5OPEuPzx</a></p>
					<h4><i class="fa fa-twitter"></i>Tweeted on 17 hours ago</h4>
				</div>
				<div class="single-tweet">
					<p>Check our new theme 'kotha - Personal WordPress Blog Theme' on #themeforest #Envato
						#WordPress
						<br>
						<a href="https://t.co/kN5OPEuPzx">https://t.co/kN5OPEuPzx</a></p>
					<h4><i class="fa fa-twitter"></i>Tweeted on 17 hours ago</h4>
				</div>
			</div>

			<div class="footer-widget testimonial-widget">
				<h2 class="widget-title text-uppercase">Testimonials</h2>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!--Indicator-->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class=""></li>
						<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="2" class=""></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item">
							<div class="single-review">
								<div class="review-text">
									<p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
										tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
										vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
										magna aliquyam eratma</p>
								</div>
								<div class="author-id">
									<img src="../app/views/front/assets/images/author.png" alt="">
									<div class="author-text">
										<h4>Sophia</h4>
										<h4>CEO, ReadyTheme</h4>
									</div>
								</div>
							</div>
						</div>
						<div class="item active">
							<div class="single-review">
								<div class="review-text">
									<p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
										tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
										vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
										magna aliquyam eratma</p>
								</div>
								<div class="author-id">
									<img src="../app/views/front/assets/images/author.png" alt="">
									<div class="author-text">
										<h4>Sophia</h4>
										<h4>CEO, ReadyTheme</h4>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="single-review">
								<div class="review-text">
									<p>Lorem ipsum dolor sit amet, conssadipscing elitr, sed diam nonumy eirmod
										tempvidunt ut labore et dolore magna aliquyam erat,sed diam voluptua. At
										vero eos et accusam justo duo dolores et ea rebum.gubergren no sea takimata
										magna aliquyam eratma</p>
								</div>
								<div class="author-id">
									<img src="../app/views/front/assets/images/author.png" alt="">

									<div class="author-text">
										<h4>Sophia</h4>
										<h4>CEO, ReadyTheme</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid text-center ft-copyright">
		<p>&copy;  2017   <a href="#">Kotha PRO </a> - Designed with <i class="fa fa-heart"></i> by <a href="http://shapedtheme.com/">ShapedTheme</a></p>
	</div>
</footer>
<div class="scroll-up">
	<a href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!--//Script//-->
<script src="../app/views/front/assets/js/jquery-1.12.4.min.js"></script>
<script src="../app/views/front/assets/js/bootstrap.min.js"></script>
<script src="../app/views/front/assets/js/slick.min.js"></script>
<script src="../app/views/front/assets/js/main.js"></script>
</body>

<!-- Mirrored from demo.shapedtheme.com/kotha-pro-html/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Apr 2019 08:50:25 GMT -->
</html>