<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Poultrease</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo.png" />
</head>
<body>
  <!-- <div class="container-scroller">     -->
    <div class="page-body-wrapper" style="margin: 0; padding: 0;">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-logo text-center my-3">
         <img src="images/logo.png" style="max-width: 100px; height: auto;" class="img-fluid" alt="Company Logo">
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url ('/dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url ('/kandang')}}" aria-expanded="false" aria-controls="kandangdropdown">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Kandang</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{url ('/pakan')}}" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Stok Pakan</span>
            </a>
            <div class="collapse" id="form-elements">
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="/penyakit" aria-expanded="false" aria-controls="penyakitdropdown">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Penyakit</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url ('/laphar')}}" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Laporan Harian</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  id="logout-button" href="#" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Log Out</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="col-30 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Pakan</h4>
                  <form id="formpakan" >
                  @csrf
                    <div class="form-group">
                      <label for="nama">Nama Pakan</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pakan">
                    </div>
                    <div class="form-group">
                    <label for="jenis">Jenis Pakan</label>
                      <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis Pakan">
                    </div>
                    <div class="form-group">
                      <label for="stok">Stok Pakan</label>
                      <input type="text" class="form-control" id="stok"  name="stok" placeholder="Stok Pakan">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" >Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        
        
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="/vendors/jquery-3.7.1.min.js"></script>
  <script src="/vendors/jquery-validation-1.19.5/jquery.validate.min.js"></script>
  <script src="/vendors/jquery-validation-1.19.5/additional-methods.min.js"></script>
  <script src="/vendors/sweetalert/sweetalert.min.js"></script>
  <script src="/vendors/jquery-3.7.1.min.js"></script>
  <script src="/vendors/jquery-validation-1.19.5/jquery.validate.min.js"></script>
  <script src="/vendors/jquery-validation-1.19.5/additional-methods.min.js"></script>
  <script src="/vendors/sweetalert/sweetalert.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->

  <script>
  $(document).ready(function () {
    const token = sessionStorage.getItem('token');
            console.log("Token di localStorage:", sessionStorage.getItem('token'));

            if (!token) {
                console.error("Token tidak ditemukan. Pastikan Anda sudah login.");
                return;
            }
    
        $('#formpakan').validate({
          rules: {
            nama: {
              required: true,
            },
            jenis: {
              required: true
            },
            stok: {
              required: true
            },

          },
          messages: {
            nama: {
              required: 'Kode harus diisi',
            },
            jenis: {
              required: 'Jenis harus diisi'
            },
            stok: {
              required: 'Jumlah harus diisi'
            },
            
          },
          errorClass:"text-danger",
          submitHandler: function () {
            
            $.ajax({
              url: "{{ url('/api/pakan') }}",
              method:'POST',
              type:'POST',
              headers: {
            'Authorization': 'Bearer ' + token 
        },
              data: {
                nama: $('#nama').val(),
                jenis:$('#jenis').val(),
                stok:$('#stok').val(),
                _token: '{{csrf_token()}}'
              },
              dataType:'json',
              success: function(res){
                if (res)
                swal({
                    title: 'berhasil',
                    text: 'Pakan berhasil ditambahkan',
                    icon: 'success'
                  }).then(()=>{
                    window.location="{{ url('/pakan') }}";
                  });
                  
                else{
                  swal({
                    title: 'Gagal',
                    text: 'Penambahan gagal',
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
    $(document).ready(function() {
    $('#logout-button').click(function(e) {
        e.preventDefault(); // Menghindari refresh halaman
        
        // Menampilkan SweetAlert konfirmasi sebelum logout
        swal({
            title: "Are you sure?",
            text: "You will be logged out from your account!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willLogout) => {
            if (willLogout) {
                // Melakukan request logout menggunakan AJAX
                $.ajax({
                    url: '/api/logout', // Endpoint API untuk logout
                    type: 'POST',   // Pastikan Anda menggunakan metode POST
                    headers: {
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token'), // Pastikan token ada jika Anda menggunakan Bearer Token
                    },
                    success: function(response) {
                        // Menampilkan SweetAlert jika logout sukses
                        swal({
                            title: "Logged Out!",
                            text: response.message,
                            icon: "success",
                        })
                        .then(() => {
                            // Redirect ke halaman login setelah logout berhasil
                            window.location.href = '/login'; // Ganti dengan URL login Anda
                        });
                    },
                    error: function(xhr, status, error) {
                        // Menampilkan SweetAlert jika terjadi error
                        swal({
                            title: "Error!",
                            text: "Something went wrong while logging out. Please try again.",
                            icon: "error",
                        });
                    }
                });
            }
        });
    });
});
           
  </script>
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/chart.js"></script>

  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

