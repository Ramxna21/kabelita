<?php
$judul = "TENTANG KAMI";
?>


<style>
  .about-info-area {
    background-color: #add8e6; /* biru muda */
    padding: 40px 20px;
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
			<section class="about-info-area section-gap">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 info-left">
                <!-- Use the <video> element instead of <img> -->
                <img class="img-fluid" src="<?= base_url(); ?>assets/img/about/About.jpg" alt="About Image">

            </div>
            <div class="col-lg-6 info-right">
                <h6><?= $judul; ?></h6>
                <h1>CRT KABELITA</h1>
                <p>
                This company moved by  the spirit to contribute the developing country and give addded value for human being and  to the better enoivornment in the future.

                We ready to give best service and emphasizing the building of mutual business relationship for long term.
                </p>
            </div>
        </div>
    </div>
</section>

