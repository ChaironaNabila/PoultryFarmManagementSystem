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
          <li class="nav-item">
            <a class="nav-link" href="{{url ('/kandang')}}"aria-expanded="false" aria-controls="kandangdropdown">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Kandang</span>
              <!-- <i class="menu-arrow"></i> -->
            </a>
            <!-- <div class="collapse" id="kandangdropdown">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link"  href="{{url ('/kandang')}}">Kandang</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Izin Akses</a></li>
              </ul>
            </div> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url ('/pakan')}}" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Stok Pakan</span>
              <!-- <i class="menu-arrow"></i> -->
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link"  href="/penyakit" aria-expanded="false" aria-controls="penyakitdropdown">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Penyakit</span>
            </a>
            <div class="collapse" id="penyakitdropdown">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link"  href="{{url ('/penyakit')}}">Data Penyakit</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url ('/lpenyakit')}}" >Laporan</a></li>
              </ul>
            </div>
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
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Form Penyakit</h4>
                  
                  <form id="formpenyakit">
                    @csrf
                    <div class="form-group">
                      <label for="nama">Nama Penyakit</label>
                      <input type="text" class="form-control"  id="nama" name="nama" placeholder="Nama Penyakit">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Deskripsi</label>
                      <input type="text" class="form-control"  id="deskripsi" name="deskripsi" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Gejala</label>
                      <input type="text" class="form-control" id="gejala" name="gejala" placeholder="Gejala">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Pengobatan</label>
                      <input type="text" class="form-control"  id="pengobatan" name="pengobatan" placeholder="Pengobatan">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
        </div>


        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      
        <!-- partial -->
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
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
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
<script>
  $(document).ready(function () {
    const token = sessionStorage.getItem('token');
    console.log("Token diambil:", sessionStorage.getItem('token'));

    if (!token) {
        console.error("Token tidak ditemukan. Pastikan Anda sudah login.");
        return;
    }
        $('#formpenyakit').validate({
          rules: {
            nama: {
              required: true,
            },
            deskripsi: {
              required: true
            },
            gejala: {
              required: true
            },
            pengobatan: {
              required: true
            }
          },
          messages: {
            nama: {
              required: 'Nama Penyakit harus diisi',
            },
            deskripsi: {
              required: 'Deskripsi harus diisi'
            },
            gejala: {
              required: 'Gejala harus diisi'
            },
            pengobatan: {
              required: 'Pengobatan harus diisi'
            }
          },
          errorClass:"text-danger",
          submitHandler: function () {

            $.ajax({
              url: "https://poultreaseapi-ekarhzgnb9ddbkay.southeastasia-01.azurewebsites.net/api/penyakit",
              method:'POST',
              type:'POST',
              headers: {
            'Authorization': 'Bearer ' + token 
        },
              data: {
                nama: $('#nama').val(),
                deskripsi:$('#deskripsi').val(),
                gejala:$('#gejala').val(),
                pengobatan:$('#pengobatan').val(),
                _token: '{{csrf_token()}}'
              },
              dataType:'json',
              success: function(res){
                if (res)
                swal({
                    title: 'berhasil',
                    text: 'Penyakit berhasil ditambahkan',
                    icon: 'success'
                  }).then(()=>{
                    window.location="{{ url('/penyakit') }}";
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
                    url: 'https://poultreaseapi-ekarhzgnb9ddbkay.southeastasia-01.azurewebsites.net/api/logout', // Endpoint API untuk logout
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

</html>

