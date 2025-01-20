<!-- Bagian Header -->
<section class="single-page-header bg-primary text-white py-5">
	<div class="container text-center">
		<h2 class="mb-3">Contact Us</h2>
		<ol class="breadcrumb header-bradcrumb justify-content-center">
			<li class="breadcrumb-item"><a href="index.html" class="text-white"></a></li>
			<li class="breadcrumb-item active" aria-current="page"></li>
		</ol>
	</div>
</section>

<!-- Bagian Contact Us -->
<section class="contact-us section py-5" id="contact">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-8 text-center">
        <h3 class="mb-4 display-4 font-weight-bold">Sampaikan Informasi Anda Kepada Kami</h3>
        <p class="text-muted">
          Sampaikan informasi Anda seputar Disnaker Kota Semarang, lowongan kerja, pelatihan, job fair, dan lainnya. Kami siap mendengarkan!
        </p>
      </div>
    </div>
    <div class="row">
      <!-- Contact Details -->
      <div class="col-md-6 mb-4">
        <img src="<?= base_url('assets/images/contact/contactdisnaker.png') ?>" class="img-fluid rounded shadow-lg" alt="Contact Us">
      </div>
      <div class="col-md-6">
        <ul class="contact-short-info list-unstyled mb-4">
          <li class="d-flex align-items-center mb-3">
            <i class="tf-ion-android-phone-portrait text-primary me-3 fa-3x"></i>
            <span class="h6">(024) 8440335</span>
          </li>
          <li class="d-flex align-items-center mb-3">
            <i class="tf-ion-android-mail text-primary me-3 fa-3x"></i>
            <span class="h6">disnaker@semarangkota.co.id</span>
          </li>
          <li class="d-flex align-items-center">
            <i class="tf-ion-ios-home text-primary me-3 fa-3x"></i>
            <span class="h6">Jl. Ki Mangunsarkoro, No. 21, Kel. Karangkidul, Kec. Semarang Tengah, Kota Semarang.</span>
          </li>
        </ul>
        <!-- Social Media Links -->
        <div class="social-icon">
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a href="https://www.facebook.com/disnakersmg/" class="text-primary"><i class="tf-ion-social-facebook fa-3x"></i></a></li>
            <li class="list-inline-item"><a href="https://x.com/disnakersmg" class="text-primary"><i class="tf-ion-social-twitter fa-3x"></i></a></li>
            <li class="list-inline-item"><a href="https://www.instagram.com/disnakersmg/" class="text-primary"><i class="tf-ion-social-instagram fa-3x"></i></a></li>
            <li class="list-inline-item"><a href="https://www.youtube.com/disnakersmg" class="text-primary"><i class="tf-ion-social-youtube fa-3x"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CSS tambahan untuk mempercantik -->
<style>
  .contact-us {
    background-color: #f8f9fa;
  }

  .contact-us .display-4 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
  }

  .contact-us p {
    font-size: 1.1rem;
    color: #666;
  }

  .contact-short-info li {
    font-size: 1.1rem;
    color: #555;
  }

  .contact-short-info li i {
    transition: color 0.3s ease;
  }

  .contact-short-info li i:hover {
    color: #007bff;
  }

  .social-icon ul li a {
    transition: transform 0.3s ease, color 0.3s ease;
  }

  .social-icon ul li a:hover {
    transform: scale(1.1);
    color: #007bff;
  }

  .social-icon i {
    transition: color 0.3s ease;
  }

  .social-icon i:hover {
    color: #007bff;
  }

  /* Shadow effect for images */
  .img-fluid {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .img-fluid:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
  }
</style>

<!-- Modal Sukses -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success text-white">
				<h5 class="modal-title" id="successModalLabel">Sukses</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Data berhasil disimpan!
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url('kontak'); ?>'">OK</button>
			</div>
		</div>
	</div>
</div>

<!-- Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
	$(document).ready(function () {
		<?php if ($this->session->flashdata('success')): ?>
			$('#successModal').modal('show');
		<?php endif; ?>
	});
</script>

<style>
	.single-page-header {
		background: #007bff;
		padding: 50px 0;
		color: white;
	}
	.contact-short-info li {
		font-size: 1rem;
		color: #333;
	}
	.social-icon ul {
		padding: 0;
	}
	.social-icon ul li {
		display: inline-block;
		margin-right: 10px;
	}
	.social-icon ul li a {
		font-size: 1.5rem;
		color: #007bff;
	}
	.modal-header.bg-success {
		background-color: #28a745 !important;
	}
</style>
