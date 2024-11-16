<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo.png" alt="logo">
              </div>
              <h4>Halo, selamat datang ><</h4>
              <h6 class="font-weight-light">Silahkan Sign In</h6>
              <form class="pt-3"  id="loginform">
                @csrf
                <div class="form-group">
                  <input type="identifier" class="form-control form-control-lg" id="identifier" placeholder="Email atau Username" name="identifier" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" required>
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/vendors/jquery-3.7.1.min.js"></script>
  <script src="/vendors/jquery-validation-1.19.5/jquery.validate.min.js"></script>
  <script src="/vendors/jquery-validation-1.19.5/additional-methods.min.js"></script>
  <script src="/vendors/sweetalert/sweetalert.min.js"></script>

  <!-- End plugin js for this page -->
  <script>
    $(document).ready(function () {
          sessionStorage.clear();

        $('#loginform').on('submit', function (event) {
            event.preventDefault();

            const identifier = $('#identifier').val();
            const password = $('#password').val();

            $.ajax({
                url: "{{ url('/api/login') }}",
                method: 'POST',
                headers: {
                    'Accept': 'application/json', // Tambahkan ini
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({
                    identifier: identifier,
                    password: password,
                    _token: '{{csrf_token()}}'
                }),
                dataType: 'json',
                success: function (response) {
                    if (response.status === 200) {
                        sessionStorage.setItem('token', response.data.token);
                        sessionStorage.setItem('user', JSON.stringify(response.data.user));
                        console.log('Token yang disimpan:', sessionStorage.getItem('token'));
                        window.location.href = "{{ url('/dashboard') }}";
                    } else {
                      swal({
                            title: "Identitas tidak ditemukan!",
                            text: "Masukkan username/email dan password yang benar",
                            icon: "error",
                        });
                    }
                },
                error: function (xhr) {
                    const errorMessage = xhr.responseJSON && xhr.responseJSON.message 
                        ? xhr.responseJSON.message 
                        : 'Terjadi kesalahan, periksa kredensial Anda.';
                    alert('Error: ' + errorMessage);
                }
            });
        });
    });
</script>


  <!-- Plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
