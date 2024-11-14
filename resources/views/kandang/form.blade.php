<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
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
  <link rel="shortcut icon" href="images/favicon.png" />
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
          <li class="nav-item active">
            <a class="nav-link" href="{{url ('/kandang')}}" aria-expanded="false" aria-controls="kandangdropdown">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Kandang</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url ('/pakan')}}" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Stok Pakan</span>
            </a>
            <div class="collapse" id="form-elements">
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#penyakitdropdown" aria-expanded="false" aria-controls="penyakitdropdown">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Penyakit</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="penyakitdropdown">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link"  href="{{url ('/penyakit')}}">Data Penyakit</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url ('/laporanp')}}" >Laporan</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url ('/laphar')}}" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Laporan Harian</span>
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
                  <h4 class="card-title">Form Kandang</h4>
                  <form id="formkandang" >
                  @csrf
                    <div class="form-group">
                      <label for="kode">Kode Kandang</label>
                      <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Kandang">
                    </div>
                    <div class="form-group">
                      <label for="jenis_unggas">Jenis Unggas</label>
                      <input type="text" class="form-control" id="jenis_unggas" name="jenis_unggas" placeholder="Jenis Unggas">
                    </div>
                    <div class="form-group">
                      <label for="jumlah_unggas">Jumlah Unggas</label>
                      <input type="text" class="form-control" id="jumlah_unggas"  name="jumlah_unggas" placeholder="Jumlah Unggas">
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                      <input type="text" class="form-control" id="status" name="status" placeholder="Status">
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
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->

  <script>
  $(document).ready(function () {
    
        $('#formkandang').validate({
          rules: {
            kode: {
              required: true,
            },
            jenis_unggas: {
              required: true
            },
            jumlah_unggas: {
              required: true
            },
            status: {
              required: true
            }
          },
          messages: {
            kode: {
              required: 'Kode harus diisi',
            },
            jenis_unggas: {
              required: 'Jenis harus diisi'
            },
            jumlah_unggas: {
              required: 'Jumlah harus diisi'
            },
            status: {
              required: 'Status harus diisi'
            }
          },
          errorClass:"text-danger",
          submitHandler: function () {
            const token = localStorage.getItem('token');
            console.log("Token di localStorage:", localStorage.getItem('token'));

            if (!token) {
                console.error("Token tidak ditemukan. Pastikan Anda sudah login.");
                return;
            }

            $.ajax({
              url: "{{ url('/api/kandang') }}",
              method:'POST',
              type:'POST',
              headers: {
            'Authorization': 'Bearer ' + token 
        },
              data: {
                kode: $('#kode').val(),
                jenis_unggas:$('#jenis_unggas').val(),
                jumlah_unggas:$('#jumlah_unggas').val(),
                status:$('#status').val(),
                _token: '{{csrf_token()}}'
              },
              dataType:'json',
              success: function(res){
                if (res)
                swal({
                    title: 'berhasil',
                    text: 'Penambahan berhasil',
                    icon: 'success'
                  }).then(()=>{
                    window.location="{{ url('/kandang') }}";
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

