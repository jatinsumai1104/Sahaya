<?php require_once('../includes/header.php');?>
<?php require_once('../includes/nav.php');?>
<div class="fh5co-hero">
	<div class="fh5co-overlay"></div>
	<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo BASEPLUGINS;?>images/landing/background.jpg);">
		<div class="desc animate-box">
			<h2><strong>Contact</strong> Us</h2>
			<span><a class="btn btn-primary btn-lg" href="#">Donate Now</a></span>
		</div>
	</div>

</div>

<div id="fh5co-contact" class="animate-box">
	<div class="container">
		<form action="#">
			<div class="row">
				<div class="col-md-6">
					<h3 class="section-title">Our Address</h3>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					<ul class="contact-info">
						<li><i class="icon-phone2"></i>+91 7021197094</li>
						<li><i class="icon-mail"></i><a href="mailto:projectuser66@gmail.com">projectuser66@gmail.com</a></li>
					</ul>
				</div>
				<form action="">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Email">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Contact">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<select name="marrital_status" id="" style="height: 50px;width: 262.5px;">
										<option disabled selected>Choose Your Marital Status</option>
										<option value="0">Single</option>
										<option value="1">Married</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Send Message" class="btn btn-primary">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</form>
	</div>
</div>
<!-- END map -->
<?php require_once('../includes/footer.php');?>
