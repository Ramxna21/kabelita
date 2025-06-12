<style>
  .destinations-area {
    background-color: #add8e6; /* Warna lebih netral */
    padding: 50px 20px;
}

.section-title {
    padding: 15px;
    font-size: 26px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 30px;
    border-bottom: 3px solid #007bff; /* Garis bawah untuk tampilan lebih profesional */
    color: #333;
}

.package-list {
    list-style-type: none;
    padding: 20px;
    font-size: 16px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.package-list li {
    padding: 12px;
    display: flex;
    flex-direction: column;
    border-bottom: 1px solid #ddd;
}

.package-list li:last-child {
    border-bottom: none;
}

.package-list li strong {
    color: #007bff;
    font-size: 15px;
    font-weight: bold;
}

.plant-title {
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #333;
}


.single-destinations {
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.thumb img {
    width: 100%;
    border-radius: 8px;
}

.details h4 {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin-top: 15px;
}

.price-btn {
    background: #007bff;
    color: #fff;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.price-btn:hover {
    background: #0056b3;
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
		<section class="destinations-area section-gap">
			<div class="container">
				<div class="row">
					<!-- Plant 1 & Plant 2 dalam satu kotak -->
					<div class="col-lg-12">
						<div class="single-destinations">
							<h2 class="section-title">Main Products</h2>
							<div class="row">
								<div class="col-lg-6">
									<h3 class="plant-title">Plant 1</h3>
									<ul class="package-list">
										<li><strong>Enamelled Round Copper Wires</strong> EW, PEW, UEW, PVF, EIW, AIW</li>
										<li><strong>Annealled & Tin Annealled Copper Wires</strong> Annealled & Tin Annealled Copper Wires</li>
										<li><strong>Electric Cables</strong> UL, UL/C-UL, CSA, DENTORI, -F- Mark, CEE, AS Approved</li>
										<li><strong>SII/LMK/SPLN Approved cables</strong> SII/LMK/SPLN Approved cables</li>
										<li><strong>Automotive Cables</strong> AV, AVS, AVSS, AVf, HEB, EB, FBLK, etc.</li>
										<li><strong>Power Supply Cord and Cordset</strong> UL, UL/C-UL, CSA, DENTORI, CEE, AS Approved</li>
										<li><strong>Telecommunication Cables</strong> Coaxial, TV Feeder, Indoor Telephone, Jumper Wires, etc.</li>
										<li><strong>Audio Cables</strong> Speaker, Microphone, Shield Wire, etc.</li>
									</ul>
								</div>
								<div class="col-lg-6">
									<h3 class="plant-title">Plant 2</h3>
									<ul class="package-list">
										<li><strong>Manufacturing Wiring Harness</strong></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<!-- Daftar layanan -->
					<?php foreach ($dt_service as $d): ?>
					<div class="col-lg-4">
						<div class="single-destinations">
							<div class="thumb">
								<img src="<?= base_url(); ?>upload/<?= $d->file; ?>" alt="">
							</div>
							<div class="details">
								<h4><?= $d->nama_service; ?></h4>
								<ul class="package-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>Biaya</span>
										<span><?= $d->biaya; ?></span>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Durasi</span>
										<span><?= $d->durasi; ?></span>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span></span>
										<a href="<?= base_url('user'); ?>" class="price-btn">Booking</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>