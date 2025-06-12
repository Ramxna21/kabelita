			<!-- Start popular-destination Area -->
			<section class="popular-destination-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Produk</h1>
		                        
		                    </div>
		                </div>
		            </div>						
					<div class="row">
						
						 <?php
            
                foreach ($dt_service as $d):?>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="<?= base_url(); ?>upload/<?= $d->file; ?>" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">Rp. <?= $d->biaya; ?></a>			
									<h4><?= $d->nama_service; ?></h4>
									<p><?= $d->nama_kategori; ?></p>			
								</div>
							</div>
						</div>		
					<?php endforeach; ?>
					</div>
										

				</div>	
			</section>
			<!-- End popular-destination Area -->
			
			
			<!-- Start other-issue Area -->
			<section class="other-issue-area" style="background-color: rgb(196, 221, 248);">

				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-9">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Berita Terbaru</h1>
								<p>Lihat berita terbaru</p>
		                        <a href="<?= base_url('site/gallery'); ?>" class="primary-btn text-uppercase">Lihat Semua</a>
		                       
		                    </div>
		                </div>
		            </div>					
					<div class="row">
						   <?php
            
                foreach ($dt_gallery as $d):?>
						<div class="col-lg-3 col-md-6">
							<div class="single-other-issue">
								<div class="thumb">
									<img class="img-fluid" src="<?= base_url(); ?>upload/<?= $d->file; ?>" alt="">					
								</div>
								<a href="#">
									<h4><?= $d->nama_gallery; ?></h4>
								</a>
								<p>
									<?= $d->ket; ?>
								</p>
							</div>
						</div>
					<?php endforeach; ?>
																						
					</div>
				</div>	
			</section>
			<!-- End other-issue Area -->