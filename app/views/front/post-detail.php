<?php $this->layout('/front/front-template', ['title' => $post['title']]) ?>
    <div class="kotha-default-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<article class="single-blog">
					<div class="post-thumb">
						<img src="<?=$this->e($post['photo'])?>" alt="">
					</div>
					<div class="post-content">
						<div class="entry-header text-center text-uppercase">
							<a href="/category/<?=$this->e($post['category'])?>" class="post-cat"><?=$this->e($post['category'])?></a>
							<h2><?=$this->e($post['title'])?></h2>
						</div>
						<div class="entry-content">
							<p><?=$this->e($post['content'])?></p>	
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
				<div class="top-comment"><!--top comment-->
					<img src="/app/views/front/assets/images/comment.jpg" class="pull-left img-circle" alt="">
					<h4><a href="#">Ricard Goff</a></h4>
					<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
						invidunt ut labore et dolore magna aliquyam erat.</p>
					<ul class="list-inline social-share">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
                            
				<div class="row"><!--blog next previous-->
                                    <?php if($nextPost): ?>
					<div class="col-md-6">
						<div class="single-blog-box">
							<a href="/post/<?=$this->e($nextPost['id'])?>">
								<img src="<?=$this->e($nextPost['photo'])?>" alt="">
								<div class="overlay">
									<div class="promo-text">
										<p><i class=" pull-left fa fa-angle-left"></i></p>
										<h5><?=$this->e($nextPost['title'])?></h5>
									</div>
								</div>
							</a>
						</div>
					</div>
                                    <?php endif; ?>
                                    <?php if($prevPost): ?>
					<div class="col-md-6">
						<div class="single-blog-box">
                                                    <a href="/post/<?=$this->e($prevPost['id'])?>">
								<img src="<?=$this->e($prevPost['photo'])?>" alt="">
								<div class="overlay">
									<div class="promo-text">
										<p><i class="pull-right fa fa-angle-right"></i></p>
										<h5><?=$this->e($nextPost['title'])?></h5>
									</div>
								</div>
							</a>
						</div>
					</div>
                                    <?php endif; ?>
				</div>
				<div class="related-post-carousel"><!--related post carousel-->
					<div class="related-heading">
						<h4>You might also like</h4>
					</div>
					<div class="related-post-carousel-items">
						<div class="single-item">
							<a href="#">
                                                            <img src="/app/views/front/assets/images/p-1.jpg" alt="">
								<h4>Lorem ipsum dolor sit amet,</h4>
							</a>
						</div>
						<div class="single-item">
							<a href="#">
								<img src="/app/views/front/assets/images/p-2.jpg" alt="">
								<h4>Just Wondering at Beach</h4>
							</a>
						</div>
						<div class="single-item">
							<a href="#">
								<img src="/app/views/front/assets/images/p-3.jpg" alt="">
								<h4>Nonumy eirmod tempor invidunt</h4>
							</a>
						</div>
						<div class="single-item">
							<a href="#">
								<img src="/app/views/front/assets/images/p-1.jpg" alt="">
								<h4>Justo duo dolores et ea rebum</h4>
							</a>
						</div>
						<div class="single-item">
							<a href="#">
								<img src="/app/views/front/assets/images/p-2.jpg" alt="">
								<h4>Duo dolores justo t ea rebum</h4>
							</a>
						</div>
						<div class="single-item">
							<a href="#">
								<img src="/app/views/front/assets/images/p-3.jpg" alt="">
								<h4>Duo dolores justo t ea rebum</h4>
							</a>
						</div>
					</div>
				</div>
				<div class="comment-area">
					<div class="comment-heading">
						<!--<h3>3 Thoughts</h3>-->
					</div>
                                    <?php foreach ($comments as $comment): ?>
					<div class="single-comment">
						<div class="media">
							<div class="media-left text-center">
                                                            <a href="#"><img class="media-object" src="<?=$this->e($comment['avatar'])?>" alt=""></a>
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h3 class="text-uppercase">
										<a href="#"><?=$this->e($comment['username'])?></a>
										<!--<a href="#" class="pull-right reply-btn">reply</a>-->
									</h3>
								</div>
								<p class="comment-date">
									<?=$this->e($comment['creation_date'])?>
								</p>
								<p class="comment-p">
									<?=$this->e($comment['text'])?>
								</p>
							</div>
						</div>
					</div>
                                    <?php endforeach; ?>
				</div>
                                <?php if(isset($_SESSION['auth_username'])): ?>
				<!--leave comment-->
				<div class="leave-comment">
					<h4>Leave a reply</h4>
                                        <?=flash()->display();?>
                                        <form class="form-horizontal contact-form" method="post" action="/comment/create" enctype="multipart/form-data">
                                            <input type="hidden" name="post_id" value="<?=$this->e($post['id'])?>">
						<div class="form-group">
							<div class="col-md-12">
								<textarea class="form-control" rows="6" name="text" placeholder="Write Massage" required></textarea>
							</div>
						</div>
						<button type="submit" class="btn send-btn">Post Comment</button>
					</form>
				</div>	
                                <?php endif; ?>
                        </div>
			<div class="col-sm-4">
				<div class="kotha-sidebar">
					<aside class="widget about-me-widget  text-center">
						<div class="about-me-content">
							<div class="about-me-img">
								<img src="/app/views/front/assets/images/me.jpg" alt="" class="img-me img-circle">
								<h2 class="text-uppercase">Kotha Smith</h2>
								<p>Kotha Smith is an enthusiastic and passionate Story Teller. He loves to do different home-made things
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
							<li>
                                                            <a href="/post/<?=$this->e($post['id'])?>" class="popular-img"><img src="<?=$this->e($post['photo'])?>" alt="">
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
                                                    <?php foreach($popularPosts as $post): ?>
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