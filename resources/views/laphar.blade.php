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
          <li class="nav-item">
            <a class="nav-link" href="{{url ('/kandang')}}" aria-expanded="false" aria-controls="kandangdropdown">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Kandang</span>
            </a>
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
          <li class="nav-item">
            <a class="nav-link" href="/penyakit" aria-expanded="false" aria-controls="penyakitdropdown">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Penyakit</span>
            </a>
          </li>
          <li class="nav-item active">
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
          </div>
          <div class="col-lg-50 grid-margin stretch-card">
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
      
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
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
    url: '/laphar',
    method: 'GET',
    headers: {
        'Authorization': 'Bearer ' + sessionStorage.getItem('token')
    },
    success: function(response) {
        console.log('Halaman laporan berhasil dimuat');
    },
    error: function(xhr) {
        console.log('Error:', xhr);
    }
});

    $.ajax({
        url: '/api/laporan-harian', // Sesuaikan dengan URL API
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token // Pastikan token dikirim dengan benar
        },
        success: function(response) {
          console.log()
            if (response.status === 200 && response.data.length > 0) {
              let laporanData = response.data;
              console.log(laporanData);

              let tableBody = $('tbody'); // Ganti dengan selector yang sesuai
              laporanData.forEach(function(laporan) {
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
                      <td>${laporan.created_at}</td>
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
$(document).ready(function () {
  // Inisialisasi DataTables dengan fitur Export
  $('.table').DataTable({
    
    dom: "<'row'<'col-4'l><'col-4'B><'col-4'f>>rt<'row'<'col-6'i><'col-6'p>>",
    buttons: [
      {
        className: 'btn btn-danger btn-sm',
        extend: 'pdfHtml5',
        text: 'PDF',
        title: 'Data Laporan Harian',
        orientation: 'landscape',
        pageSize: 'A4',
        exportOptions: {
          columns: ':visible',
        },
        customize: function (doc) {
          doc.styles.tableHeader.alignment = 'center';
          doc.styles.title = {
            alignment: 'center',
            fontSize: 18,
            bold: true,
          };
          doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1)
            .join('*')
            .split('');
        },
      },
      {
        className: 'btn btn-success btn-sm',
        extend: 'excelHtml5',
        text: 'Excel',
        title: 'Data Laporan Harian',
        exportOptions: {
    columns: ':visible',
    format: {
      body: function(data, row, column, node) {
        // Jika data adalah null atau undefined, ganti dengan string kosong
        if (data === null || data === undefined) {
          return '';
        }
        // Jika data berupa objek, ubah menjadi string
        if (typeof data === 'object') {
          return JSON.stringify(data);
        }
        // Jika data adalah angka, pastikan tetap dalam format angka
        if (typeof data === 'number') {
          return data.toString(); // Atau bisa disesuaikan jika ada format khusus
        }
        return data; // Mengembalikan data jika sudah valid
      }
    }
  }
      },
      {
        className: 'btn btn-secondary btn-sm',
        extend: 'print',
        text: 'Print',
        title: 'Data Laporan Harian',
        exportOptions: {
          columns: ':visible',
        },
      },
    ],
    columns: [
      { data: 'kandang.kode', title: 'Kode Kandang' },
      { data: 'user.name', title: 'Pengirim' },
      { data: 'pakan.jenis', title: 'Jenis Pakan' },
      { data: 'pakan.nama', title: 'Nama Pakan' },
      { data: 'jumlah_pakan', title: 'Bobot' },
      { data: 'telur', title: 'Telur' },
      { data: 'jumlah_sakit', title: 'Sakit' },
      { data: 'penyakit.nama', title: 'Penyakit', render: function (data) {
          // Cek jika data null atau undefined, lalu ganti dengan string kosong atau default value
          return data ? data : 'Data Tidak Tersedia';
        }, },
      { data: 'kematian', title: 'Kematian' },
      { data: 'updated_at',
        render: function (data) {
      let date = new Date(data);
      return date.toLocaleDateString('id-ID'); // Format tanggal sesuai lokal Indonesia
    }
       },
    ],
  
    ajax: {
      url: '/api/laporan-harian', // Endpoint untuk data tabel
      type: 'GET',
      headers: {
        Authorization: `Bearer ${sessionStorage.getItem('token')}`,
      },
      
      dataSrc: function (json) {
        console.log('API Response:', json);  
        return json.data;  
      },
      error: function (xhr, error, thrown) {
        console.error('Error loading data:', xhr.responseText);
        alert('Error loading data. Check console or API response.');
      },
      
    },
    responsive: true,
    language: {
      emptyTable: "Tidak ada data tersedia",
      lengthMenu: "Tampilkan _MENU_ entri",
      search: "Cari:",
      paginate: {
        first: "Pertama",
        last: "Terakhir",
        next: "Berikutnya",
        previous: "Sebelumnya",
      },
      info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
      infoEmpty: "Tidak ada entri untuk ditampilkan",
    },
  });
});


  </script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/vendors/datatables.net/jszip.min.js"></script>
  <script src="/vendors/datatables.net/dataTables.buttons.js"></script>
  <script src="/vendors/datatables.net/pdfmake.min.js"></script>
  <script src="/vendors/datatables.net/vfs_fonts.js"></script>
  <script src="/vendors/datatables.net/buttons.html5.min.js"></script>
  <script src="/vendors/datatables.net/buttons.print.min.js"></script>
  <script src="/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
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

</html>

