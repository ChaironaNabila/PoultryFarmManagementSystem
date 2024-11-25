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
            <a class="nav-link"  href="{{url ('/kandang')}}" aria-expanded="false" aria-controls="kandangdropdown">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Kandang</span>
            </a>
          <li class="nav-item">
            <a class="nav-link" href="{{url ('/pakan')}}" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Stok Pakan</span>
            </a>
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
          <div class="row">
            <div class="grid-margin">
              <div class="row">
                <h3 class="font-weight-bold">Selamat Datang {{session('name')}}</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="grid-margin ">
              <div class="row">
                <div class="col-md-4" style="margin-right: 20px;" >
                  <div class="card border border-warning" style="width: 120px; height: 80px;">
                    <div class="card-body">
                      <p >Total Telur</p>
                      <p class="fs-15" id="total_telur"></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4"  style="margin-right: 20px;">
                  <div class="card border border-warning" style="width: 150px; height: 80px;">
                    <div class="card-body">
                      <p >Produksi Telur</p>
                      <p class="fs-15 " id="produksi_telur"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Grafik Kondisi Unggas</h4>
                  <canvas id="pieChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Grafik Stok Pakan</h4>
                  <canvas id="doughnutChart"></canvas>
                </div>
              </div>
            </div>
            <!-- <div class="main-panel"> -->
              <div class="content-wrapper">
                <div class="col-lg-50 " style="max-width: 1200px; margin: 0 auto;">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Laporan Harian</h4>
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>
                                  Kandang
                                </th>
                                <th>
                                  Pengirim
                                </th>
                                <th>
                                  Jenis Pakan
                                </th>
                                <th>
                                  Nama Pakan
                                </th>
                                <th>
                                  Bobot  
                                </th>
                                <th>
                                  Telur 
                                </th>
                                <th>
                                  Sakit 
                                </th>
                                <th>
                                  Penyakit
                                </th>
                                <th>
                                  Kematian
                                </th>
                                <th>
                                  Tanggal Laporan
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
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
  <script src="/vendors/sweetalert/sweetalert.min.js"></script>

  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <script>
    $(document).ready(function() {
      const token = sessionStorage.getItem('token');
      console.log('Token:', token); // Pastikan token ada
      // sessionStorage.clear();

        if (!token) {
        console.error("Token tidak ditemukan. Pastikan Anda sudah login.");
        return window.location.href = '/login';;
        }

        $.ajax({
        url: 'https://poultreaseapi-ekarhzgnb9ddbkay.southeastasia-01.azurewebsites.net/api/admin/dashboard',
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + sessionStorage.getItem('token')
        },
        success: function (response) {
            if (response.status === 200) {
                const data = response.data;
                console.log("Data1:", data);

                $('#total_telur').text(data.total_telur + "butir");
                updateTotalTelur(data.total_telur);
                function updateTotalTelur(newTotalTelur) {
                const currentTotalTelur = parseInt($('#total_telur').text()) || 0;
                
                // Cek apakah ada perubahan pada total telur
                  if (newTotalTelur !== currentTotalTelur) {
                      $('#total_telur').text(newTotalTelur + " butir");
                      
                      $('#total_telur').fadeOut(200, function () {
                          $(this).fadeIn(200);
                      });
                  }
                }

                $('#produksi_telur').text(data.total_telur_per_hari + " butir/hari ini");
                updateProduksiTelur(data.produksi_telur);

                function updateProduksiTelur(newProduksiTelur) {
                const currentProduksiTelur = parseInt($('#produksi_telur').text()) || 0;

                  if (newProduksiTelur !== currentProduksiTelur) {
                      $('#produksi_telur').text(newProduksiTelur );
                      
                      $('#produksi_telur').fadeOut(200, function () {
                          $(this).fadeIn(200);
                      });
                  }
                }

                const ctx1 = document.getElementById('pieChart').getContext('2d');
                const isZeroData = data.diagram_kesehatan.sehat === 0 && 
                                  data.diagram_kesehatan.sakit === 0 && 
                                  data.diagram_kesehatan.mati === 0;

                const chartData = isZeroData ? [1, 0, 0] : [
                    data.diagram_kesehatan.sehat, 
                    data.diagram_kesehatan.sakit, 
                    data.diagram_kesehatan.mati
                ];
                const chartLabels = isZeroData 
                      ? ['Belum Ada Data', '', '']
                      : [
                          `Sehat (${data.diagram_kesehatan.sehat})`, 
                          `Sakit (${data.diagram_kesehatan.sakit})`, 
                          `Mati (${data.diagram_kesehatan.mati})`
                      ];
                const chartBackgroundColors = isZeroData 
                    ? ['#e0e0e0', '#e0e0e0', '#e0e0e0']
                    : ['rgba(56,166,62,1)', 'rgba(255,0,0,1)', 'rgba(230,255,0,1)'];

                new Chart(ctx1, {
                    type: 'pie',
                    data: {
                        labels: chartLabels,
                        datasets: [{
                            data: chartData,
                            backgroundColor: chartBackgroundColors
                        }]
                    }
                });
              
                const ctx2 = document.getElementById('doughnutChart').getContext('2d');
                const doughnutLabels = data.diagram_pakan.map(item => `${item.jenis} (${item.total_stok})`);
                

                new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        labels: doughnutLabels,
                        datasets: [{
                            data: data.diagram_pakan.map(item => item.total_stok),
                            backgroundColor: ['rgba(56,166,62,1)', 'rgba(255,0,0,1)', 'rgba(230,255,0,1)', 'rgba(390,255,0,1)']
                        }]
                    }
                });
              }
        }
      });

        $.ajax({
        url: 'https://poultreaseapi-ekarhzgnb9ddbkay.southeastasia-01.azurewebsites.net/api/laporan-harian', 
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token 
        },
        success: function(response) {
            if (response.status === 200 && response.data.length > 0) {
              let laporanData = response.data;
              console.log("Data2:", laporanData);

              let tableBody = $('tbody'); // Ganti dengan selector yang sesuai
              laporanData.forEach(function(laporan) {
                let createdAt = laporan.created_at ? new Date(laporan.created_at) : null;
                let formattedDate = createdAt 
                    ? `${String(createdAt.getDate()).padStart(2, '0')}/${String(createdAt.getMonth() + 1).padStart(2, '0')}/${createdAt.getFullYear()}`
                    : 'Tanggal Tidak Ada';
                  let row = `<tr>
                      <td>${laporan.kandang ? laporan.kandang.kode : 'Data Tidak Ada'}</td>
                      <td>${laporan.user ? laporan.user.name : 'Data Tidak Ada'}</td>
                      <td>${laporan.pakan ? laporan.pakan.nama: 'Data Tidak Ada'}</td>
                      <td>${laporan.pakan ? laporan.pakan.jenis: 'Data Tidak Ada'}</td>
                      <td>${laporan.jumlah_pakan} kg</td>
                      <td>${laporan.telur} butir</td>
                      <td>${laporan.jumlah_sakit} ekor</td>
                      <td>${laporan.penyakit ? laporan.penyakit.nama : '-'}</td>
                      <td>${laporan.kematian} ekor</td>
                      <td>${formattedDate}</td>
                  </tr>`;

                  // Tambahkan row ke dalam tableBody
                  tableBody.append(row);
              });;
            } 
        },
        error: function(xhr) {
            console.error('Error fetching data:', xhr);
            $('tbody').append(`
                <tr>
                    <td colspan="6" class="text-center">Gagal memuat data</td>
                </tr>
            `);
        },
        error: function (xhr) {
            // Menangani error API
            console.error('Error terjadi saat memanggil API:');
            console.error('Status Kode:', xhr.status); // Menampilkan status kode
            console.error('Pesan Error:', xhr.responseJSON ? xhr.responseJSON.message : 'Tidak ada pesan error.');

            // Menampilkan pesan error di console secara detail
            console.error('Detail Error:', xhr);

            // Menampilkan pesan error kepada pengguna (opsional)
            alert('Terjadi kesalahan: ' + (xhr.responseJSON ? xhr.responseJSON.message : 'Periksa koneksi atau kredensial Anda.'));
        }
        });
  
      // Event listener untuk tombol log out
      $(document).ready(function() {
      $('#logout-button').click(function(e) {
        e.preventDefault(); 
          swal({
            title: "Kamu yakin?",
            text: "Kamu akan keluar dari akun!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willLogout) => {
            if (willLogout) {
                $.ajax({
                    url: 'https://poultreaseapi-ekarhzgnb9ddbkay.southeastasia-01.azurewebsites.net/api/logout', 
                    type: 'POST',   
                    headers: {
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token'), 
                    },
                    success: function(response) {
                        swal({
                            title: "Logged Out!",
                            text: response.message,
                            icon: "success",
                        })
                        .then(() => {
                            window.location.href = '/login'; 
                        });
                    },
                    error: function(xhr, status, error) {
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

