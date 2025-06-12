<style>
  .faq-banner mt-5  {
    background-color: #add8e6; /* biru muda */
    padding: 40px 20px;
  }
</style>


<div class="faq-banner d-flex align-items-center justify-content-center">
    <h1 class="text-white">Frequently Asked Questions</h1>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="faq-container">
                <?php if (!empty($faqs)): ?>
                    <?php foreach ($faqs as $faq): ?>
                        <div class="faq-item card mb-3">
                            <div class="card-header">
                                <span><?= $faq->question ?></span>
                                <i class="fas fa-chevron-down toggle-icon"></i>
                            </div>
                            <div class="card-body">
                                <p><?= $faq->answer ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info">
                        Belum ada FAQ yang tersedia.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const header = item.querySelector('.card-header');
            header.addEventListener('click', function() {
                // Tutup semua FAQ yang terbuka
                faqItems.forEach(faq => {
                    if (faq !== item && faq.classList.contains('active')) {
                        faq.classList.remove('active');
                    }
                });

                // Toggle FAQ yang diklik
                item.classList.toggle('active');
            });
        });
    });
</script>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center">
        <style>
            body {
            background-color: #add8e6;
            color: black;
        }

        .faq-banner {
            background-image: url('<?= base_url("assets/img/slider1.jpg"); ?>');
            background-size: cover;
            background-position: center;
            height: 308px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .faq-banner::before {
            content: "";
            position: absolute;
            top: 0; 
            left: 0;
            width: 100%; 
            height: 100%;
            background-color: rgba(4, 9, 30, 0.4); /* Sama dengan .overlay-bg */
            z-index: 1;
        }


        .faq-banner h1 {
            position: relative;
            z-index: 2;
            color: white;
            font-size: 42px;
            font-weight: bold;
            text-align: center;
        }

        .faq-container {
            margin-top: 30px;
        }

        .faq-item {
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .card {
            background-color: white;
            border: 1px solid #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: rgb(52, 69, 85);
            color: white;
            font-weight: 400;
            padding: 15px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px 8px 0 0;
        }

        .card-header .toggle-icon {
            transition: transform 0.3s ease-in-out;
        }

        .card-body {
            background-color: white;
            padding: 15px;
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .faq-item.active .card-body {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .faq-item.active .toggle-icon {
            transform: rotate(180deg);
        }

        </style>
        </div>
    </div>
</div>

