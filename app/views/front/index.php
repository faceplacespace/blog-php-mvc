<?php $this->layout('/front/front-template', ['title' => 'Main Page']) ?>

<div class="kotha-default-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
                            <?php foreach($posts as $post):?>
				<article class="single-blog">
					<div class="post-thumb">
						<a href="/post/<?=$this->e($post['id']);?>"><img src="<?=$this->e($post['photo'])?>" alt=""></a>
					</div>
					<div class="post-content">
						<div class="entry-header text-center text-uppercase">
							<a href="/category/<?=$this->e($post['category'])?>" class="post-cat"><?=$this->e($post['category'])?></a>
							<h2><a href="/post/<?=$this->e($post['id']);?>"><?=$this->e($post['title']);?></a></h2>
						</div>
						<div class="entry-content">
							<p><?=$this->e($post['content'], 'substr');?></p>
						</div>
						<div class="continue-reading text-center text-uppercase">
							<a href="/post/<?=$this->e($post['id']);?>">Continue Reading</a>
						</div>
						<div class="post-meta">
							<ul class="pull-left list-inline author-meta">
								<li class="author">By <a href="#"><?=$this->e($post['author'])?> </a></li>
								<li class="date"> On <?=$this->e($post['creation_date'])?></li>
							</ul>
							<ul class="pull-right list-inline social-share">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</article>
                            <?php endforeach;?>
				<div class="post-pagination  clearfix">
					<ul class="pagination text-left">
                                            <?php if ($paginator->getPrevUrl()): ?>
                                                <li><a href="<?=$paginator->getPrevUrl()?>"><i class="fa fa-angle-double-left"></i></a></li>
                                            <?php endif; ?>
                                            <?php foreach ($paginator->getPages() as $page): ?>
                                                <?php if ($page['url']): ?>
                                                    <li <?php echo $page['isCurrent'] ? 'class="active"' : ''; ?>>
                                                        <a href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
                                                    </li>
                                                <?php else: ?>
                                                    <li class="disabled"><span><?php echo $page['num']; ?></span></li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php if ($paginator->getNextUrl()): ?>
                                                <li><a href="<?=$paginator->getNextUrl()?>"><i class="fa fa-angle-double-right"></i></a></li>
                                            <?php endif; ?>
					</ul>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="kotha-sidebar">
					<aside class="widget about-me-widget  text-center">
						<div class="about-me-content">
							<div class="about-me-img">
								<img src="/app/views/front/assets/images/me.jpg" alt="" class="img-me img-circle">
								<h2 class="text-uppercase">Kotha Smith</h2>
								<p>Kotha Smith is an enthusiastic and passionate Story Teller. He loves to do different
									home-made things
									and share to the world.</p>
							</div>
						</div>
						<div class="social-share">
							<ul class="list-inline">
								<li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</aside>
					<aside class="widget news-letter-widget">
						<h2 class="widget-title text-uppercase text-center">Get Newsletter</h2>
						<form action="#">
							<input type="email" placeholder="Your email address" required>
							<input type="submit" value="Subscribe Now"
							       class="text-uppercase text-center btn btn-subscribe">
						</form>
					</aside>
					<aside class="widget widget-popular-post">
						<h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
						<ul>
                                                    <?php foreach($popularPosts as $post): ?>
                                                    <li><a href="/post/<?=$this->e($post['id'])?>" class="popular-img"><img src="<?=$this->e($post['photo'])?>" alt="">
							</a>
								<div class="p-content">
									<h4><a href="/post/<?=$this->e($post['id'])?>" class="text-uppercase"><?=$this->e($post['title'])?></a></h4>
									<span class="p-date"><?=$this->e($post['creation_date'])?> </span>
								</div>
							</li>
                                                    <?php endforeach; ?>
						</ul>
					</aside>
					<aside class="widget latest-post-widget">
						<h2 class="widget-title text-uppercase text-center">Latest Posts</h2>
						<ul>
                                                    <?php foreach($latestPosts as $post): ?>
							<li class="media">
								<div class="media-left">
									<a href="/post/<?=$this->e($post['id'])?>" class="popular-img"><img src="<?=$this->e($post['photo'])?>" alt="">
									</a>
								</div>
								<div class="latest-post-content">
									<h2 class="text-uppercase"><a href="/post/<?=$this->e($post['id'])?>"><?=$this->e($post['title'])?></a></h2>
									<p><?=$this->e($post['creation_date'])?></p>
								</div>
							</li>
                                                    <?php endforeach; ?>
						</ul>
					</aside>
					<aside class="widget insta-widget">
						<h2 class="widget-title text-uppercase text-center">INSTAGRAM FEED</h2>
						<div class="instagram-feed">
							<div class="single-instagram">
								<a href="#">
									<img src="/app/views/front/assets/images/ft-insta-1.jpg" alt="">
								</a>
								<div class="insta-overlay">
									<div class="insta-meta">
										<ul class="list-inline text-center">
											<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
											<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
										</ul>
									</div>
								</div>
								<a href="#" class="insta-link"></a>
							</div>
							<div class="single-instagram">
								<a href="#">
									<img src="/app/views/front/assets/images/ft-insta-6.jpg" alt="">
								</a>
								<div class="insta-overlay">
									<div class="insta-meta">
										<ul class="list-inline text-center">
											<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
											<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
										</ul>
									</div>
								</div>
								<a href="#" class="insta-link"></a>
							</div>
							<div class="single-instagram">
								<a href="#">
									<img src="/app/views/front/assets/images/ft-insta-4.jpg" alt="">
								</a>
								<div class="insta-overlay">
									<div class="insta-meta">
										<ul class="list-inline text-center">
											<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
											<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
										</ul>
									</div>
								</div>
								<a href="#" class="insta-link"></a>
							</div>
							<div class="single-instagram">
								<a href="#">
									<img src="/app/views/front/assets/images/ft-insta-3.jpg" alt="">
								</a>
								<div class="insta-overlay">
									<div class="insta-meta">
										<ul class="list-inline text-center">
											<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
											<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
										</ul>
									</div>
								</div>
								<a href="#" class="insta-link"></a>
							</div>
							<div class="single-instagram">
								<a href="#">
									<img src="/app/views/front/assets/images/ft-insta-7.jpg" alt="">
								</a>
								<div class="insta-overlay">
									<div class="insta-meta">
										<ul class="list-inline text-center">
											<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
											<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
										</ul>
									</div>
								</div>
								<a href="#" class="insta-link"></a>
							</div>
							<div class="single-instagram">
								<a href="#">
									<img src="/app/views/front/assets/images/ft-insta-8.jpg" alt="">
								</a>
								<div class="insta-overlay">
									<div class="insta-meta">
										<ul class="list-inline text-center">
											<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
											<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
										</ul>
									</div>
								</div>
								<a href="#" class="insta-link"></a>
							</div>
						</div>
					</aside>
					<aside class="widget add-widget">
						<h2 class="widget-title text-uppercase text-center">Advertisement</h2>

						<div class="add-image">
							<a href="#"><img src="/app/views/front/assets/images/add-image.jpg" alt=""></a>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid insta-feed text-center">
	<h2 class="text-uppercase">Follow@ <a href="#">Instagram</a></h2>
	<div id="footer-instagram" class="footer-insta">
		<div class="item">
			<div class="single-instagram">
				<a href="#">
					<img src="/app/views/front/assets/images/ft-insta-1.jpg" alt="">
				</a>
				<div class="insta-overlay">
					<div class="insta-meta">
						<ul class="list-inline text-center">
							<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
							<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
						</ul>
					</div>
				</div>
				<a href="#" class="insta-link"></a>
			</div>
		</div>
		<div class="item">
			<div class="single-instagram">
				<a href="#">
					<img src="/app/views/front/assets/images/ft-insta-2.jpg" alt="">
				</a>
				<div class="insta-overlay">
					<div class="insta-meta">
						<ul class="list-inline text-center">
							<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
							<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
						</ul>
					</div>
				</div>
				<a href="#" class="insta-link"></a>
			</div>

		</div>
		<div class="item">
			<div class="single-instagram">
				<a href="#">
					<img src="/app/views/front/assets/images/ft-insta-3.jpg" alt="">
				</a>
				<div class="insta-overlay">
					<div class="insta-meta">
						<ul class="list-inline text-center">
							<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
							<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
						</ul>
					</div>
				</div>
				<a href="#" class="insta-link"></a>
			</div>

		</div>
		<div class="item">
			<div class="single-instagram">
				<a href="#">
					<img src="/app/views/front/assets/images/ft-insta-4.jpg" alt="">
				</a>
				<div class="insta-overlay">
					<div class="insta-meta">
						<ul class="list-inline text-center">
							<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
							<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
						</ul>
					</div>
				</div>
				<a href="#" class="insta-link"></a>
			</div>
		</div>
		<div class="item">
			<div class="single-instagram">
				<a href="#">
					<img src="/app/views/front/assets/images/ft-insta-5.jpg" alt="">
				</a>
				<div class="insta-overlay">
					<div class="insta-meta">
						<ul class="list-inline text-center">
							<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
							<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
						</ul>
					</div>
				</div>
				<a href="#" class="insta-link"></a>
			</div>
		</div>
		<div class="item">
			<div class="single-instagram">
				<a href="#">
					<img src="/app/views/front/assets/images/ft-insta-6.jpg" alt="">
				</a>
				<div class="insta-overlay">
					<div class="insta-meta">
						<ul class="list-inline text-center">
							<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
							<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
						</ul>
					</div>
				</div>
				<a href="#" class="insta-link"></a>
			</div>
		</div>
		<div class="item">
			<div class="single-instagram">
				<a href="#">
					<img src="/app/views/front/assets/images/ft-insta-7.jpg" alt="">
				</a>
				<div class="insta-overlay">
					<div class="insta-meta">
						<ul class="list-inline text-center">
							<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
							<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
						</ul>
					</div>
				</div>
				<a href="#" class="insta-link"></a>
			</div>
		</div>
		<div class="item">
			<div class="single-instagram">
				<a href="#">
					<img src="/app/views/front/assets/images/ft-insta-8.jpg" alt="">
				</a>
				<div class="insta-overlay">
					<div class="insta-meta">
						<ul class="list-inline text-center">
							<li><a href="#"><i class="fa fa-heart-o"></i></a> 325</li>
							<li><a href="#"><i class="fa fa-comment-o"></i></a> 20</li>
						</ul>
					</div>
				</div>
				<a href="#" class="insta-link"></a>
			</div>
		</div>
	</div>
</div>