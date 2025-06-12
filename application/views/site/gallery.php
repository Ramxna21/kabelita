<style>
  .other-issue-area {
    background-color: #add8e6;
    padding: 40px 20px;
  }

  .panel {
    border: 1px solid black;
    border-radius: 4px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    background-color: rgb(52, 69, 85);
    padding: 20px;
}

.panel-body h3 {
    margin-bottom: 10px; 
    color: #ffffff;
}

.list-group-item {
    font-size: 16px;
    padding: 10px;
    border: none;
    background-color: transparent; 
}

.list-group-item a {
    text-decoration: none;
    color: #ffffff; /* Warna teks putih */
}

.list-group-item a:hover {
    color: #007bff;
}


.col-lg-3 {
    margin-top: 130px; /* Atur margin agar posisi kategori turun */
    padding-left: 50px;
}



</style>



<section class="about-banner relative">
		<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								<?= $judul; ?>				
							</h1>	
							
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
            <!-- Start about-info Area -->
			<section class="other-issue-area section-gap">
    <div class="container">
        <div class="row">
            <!-- Kolom Berita Terbaru -->
            <div class="col-lg-9">
                <div class="menu-content pb-40">
                    <div class="title">
                        <h1 class="mb-10">Berita Terbaru</h1>
                        <p>Berikut Berita Terbaru dari PT. CRT Kabelita</p>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($dt_gallery as $d): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-other-issue">
                                <div class="thumb">
                                    <img class="img-fluid" src="<?= base_url(); ?>upload/<?= $d->file; ?>" alt="">    
                                    <a href="#"></a>
                                    
                                </div>
                                
                                
                                <h4><?= $d->nama_gallery; ?></h4>
                                <p><small><?= $d->nama_kategori; ?></small></p>
                                <p><?= $d->ket; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Kolom Kategori -->
         <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="text-center">Categories</h3>
                        <ul class="list-group">
                          
                            <?php foreach($dt_kategori as $k): ?>
                            <li class="list-group-item"><a href="<?= base_url('site/gallery/kategori/'.$k->id_kategori); ?>"><?= $k->nama_kategori; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

		</div>