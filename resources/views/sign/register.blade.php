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
                <img src="../../images/logo.svg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" id="registform">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Nama">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="{{ url('/login') }}"class="text-primary">Login</a>
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
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->

  <script>
    $(document).ready(function () {
        $('#registform').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true,
                },
                password: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: 'Nama harus diisi'
                },
                email: {
                    required: 'Email harus diisi',
                    email: 'Harus sesuai format email'
                },
                username: {
                    required: 'Username harus diisi'
                },
                password: {
                    required: 'Password harus diisi',
                }
            },
            errorClass: "text-danger",
            submitHandler: function () {
                $.ajax({
                    url: "{{ url('/api/register') }}",
                    method: 'POST',
                    data: {
                        name: $('#name').val(),
                        email: $('#email').val(),
                        username: $('#username').val(),
                        password: $('#password').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        if (res.status === 201) {
                            swal({
                                title: 'Berhasil',
                                text: 'Registrasi berhasil',
                                icon: 'success'
                            }).then(() => {
                                window.location = "{{ url('/login') }}";
                            });
                        } else {
                            swal({
                                title: 'Gagal',
                                text: res.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        swal({
                            title: 'Gagal',
                            text: err.responseJSON.message,
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });
</script>

  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>


</html>
