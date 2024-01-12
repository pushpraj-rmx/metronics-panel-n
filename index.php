<?php
include 'db/config.php';
include './lock.php';

if (isset($_POST['login'])) {
	$email_id = $_POST['email_id'];
	$password = $_POST['password'];
	$query = mysqli_query($conn, "select * from users where email_id='$email_id' and password='" . md5($password) . "' and is_active=1");
	$record = mysqli_fetch_array($query);
	$count = mysqli_num_rows($query);

	if ($count == 1) {
		$_SESSION['email_id'] = $record['email_id'];
		$_SESSION['username'] = $record['username'];
		sleep(1);
		header('Location:' . BASE_URL . 'dashboard.php');
	} else {
		echo "incorrect login ID or password";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Dinesh</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body id="kt_body" class="bg-body">
	<div class="d-flex flex-column flex-root">
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url('assets/media/illustrations/sketchy-1/14.png')">
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<a href="index.php" class="mb-12">
					<img alt="Logo" src="assets/media/logos/logo-1.svg" class="h-40px" />
				</a>
				<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
					<form action="index.php" class="form w-100" novalidate="novalidate" method="post">
						<div class="text-center mb-10">
							<h1 class="text-dark mb-3">Sign In to Dinesh Arora</h1>
						</div>

						<div class="fv-row mb-10">
							<label class="form-label fs-6 fw-bolder text-dark">Email</label>
							<input class="form-control form-control-lg form-control-solid" type="text" name="email_id" autocomplete="off" />
						</div>

						<div class="fv-row mb-10">
							<div class="d-flex flex-stack mb-2">
								<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
								<a href="" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
							</div>
							<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
						</div>

						<div class="pb-lg-0 pb-5">
							<button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3" name="login">Log In</button>
						</div>
					</form>
				</div>
			</div>

			<div class="d-flex flex-center flex-column-auto p-10">
				<div class="d-flex align-items-center fw-bold fs-6">
					<p style="color: grey;">Designed &amp; Developed by <b>National Marketing Projects Inc.</b></p>
				</div>
			</div>
		</div>
	</div>

	<script>
		var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
	</script>

	<script src="<?= BASE_URL ?>assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?= BASE_URL ?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
	<script src="<?= BASE_URL ?>assets/js/scripts.bundle.js"></script>
	<script src="<?= BASE_URL ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
	<script src="<?= BASE_URL ?>assets/js/pages/widgets.js"></script>
	<script src="<?= BASE_URL ?>assets/js/pages/custom/login/login-general.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<script type='text/javascript' src='<?= BASE_URL ?>assets/plugins/custom/tinymce/tinymce.bundle.js'></script>
	<script type='text/javascript' src='<?= BASE_URL ?>assets/js/pages/crud/forms/editors/tinymce.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="./assets//js/custom.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
</body>

</html>