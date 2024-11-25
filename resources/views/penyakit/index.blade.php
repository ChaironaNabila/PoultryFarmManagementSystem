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
<style>
.table td, .table th {
      word-break: break-word; 
      white-space: normal; 
    }
.table td:nth-child(1), /* Kolom Nama Penyakit */
.table td:nth-child(2), /* Kolom Deskripsi */
.table td:nth-child(3), /* Kolom Gejala */
.table td:nth-child(4) { /* Kolom Pengobatan */
max-width: 200px; /* Sesuaikan lebar maksimum kolom sesuai keperluan */
    }
</style>

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
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/penyakit" aria-expanded="false" aria-controls="penyakitdropdown">
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
          <div class="col-lg-30 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Penyakit</h4>
                  <a class="nav-link"  href="{{url ('/fpenyakit')}}" >
                    <button type="button" class="btn btn-primary mr-2">Tambahkan Penyakit</button>
                  </a>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Nama Penyakit
                          </th>
                          <th>
                            Deskripsi
                          </th>
                          <th>
                            Gejala
                          </th>
                          <th>
                            Pengobatan
                          </th>
                          <th>
                            Aksi 
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
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Penyakit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editForm">
            @csrf
            <div class="form-group">
              <label for="nama">Nama Penyakit</label>
              <input type="text" class="form-control" id="edit_nama" name="nama">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control" id="edit_deskripsi" name="deskripsi">
            </div>
            <div class="form-group">
              <label for="gejala">Gejala</label>
              <input type="text" class="form-control" id="edit_gejala" name="gejala">
            </div>
            <div class="form-group">
              <label for="pengobatan">Pengobatan</label>
              <input type="text" class="form-control" id="edit_pengobatan" name="pengobatan">
            </div>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>
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
  <script src="/vendors/sweetalert/sweetalert.min.js"></script>  <!-- endinject -->
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

  $(document).ready(function() {
    // Ambil token dari localStorage
    const token = sessionStorage.getItem('token');
    console.log("Token di localStorage:", sessionStorage.getItem('token'));

    if (!token) {
        console.error("Token tidak ditemukan. Pastikan Anda sudah login.");
        return;
    }

    $.ajax({
        url: 'https://poultreaseapi-ekarhzgnb9ddbkay.southeastasia-01.azurewebsites.net/api/penyakit', // Sesuaikan dengan URL API
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token // Pastikan token dikirim dengan benar
        },
        success: function(response) {
            if (response.status === 200 && response.data.length > 0) {
                response.data.forEach(function(penyakit) {
                    $('tbody').append(`
                        <tr>
                            <td>${penyakit.nama}</td>
                            <td>${penyakit.deskripsi}</td>
                            <td>${penyakit.gejala} </td>
                            <td>${penyakit.pengobatan} </td>
                            <td>
                                <button class="btn btn-sm btn-primary btn-edit" data-id="${penyakit.id}">Edit</button>
                                <button class="btn btn-sm btn-danger btn-delete" data-id="${penyakit.id}">Hapus</button>

                            </td>
                        </tr>
                    `);
                });

            $(document).ready(function() {
          // Event listener untuk tombol Edit

          $(document).on('click', '.btn-edit', function() {
            const editId = $(this).data('id'); // Ambil ID dari tombol Edit yang diklik
            $('#editModal').data('id', editId); // Simpan ID ke dalam modal

            // Panggil API untuk mendapatkan data pakan
            $.ajax({
                url: `https://poultreaseapi-ekarhzgnb9ddbkay.southeastasia-01.azurewebsites.net/api/penyakit/${editId}`,
                method: 'GET',
                headers: {
                  'Authorization': 'Bearer ' + token // Pastikan token dikirim dengan benar
              },
                success: function(response) {
                    if (response.data) {
                        $('#edit_nama').val(response.data.nama);
                        $('#edit_deskripsi').val(response.data.deskripsi);
                        $('#edit_gejala').val(response.data.gejala);
                        $('#edit_pengobatan').val(response.data.pengobatan);


                        // Tampilkan modal 
                        const editModal = new bootstrap.Modal(document.getElementById('editModal'));
                        editModal.show();
                    }
                },
                error: function(xhr) {
                    console.error('Gagal mengambil data:', xhr);
                }
            });
          });

    // Event listener untuk tombol Save Changes di modal
    $('#saveChanges').on('click', function() {
              // Ambil editId dari data modal
              const editId = $('#editModal').data('id'); 

              // Data yang akan dikirim ke server
              const data = {
                  nama: $('#edit_nama').val(),
                  deskripsi: $('#edit_deskripsi').val(),
                  gejala: $('#edit_gejala').val(),
                  pengobatan: $('#edit_pengobatan').val(),
                  _token: '{{csrf_token()}}'
              };

              // Mengirim data ke API untuk disimpan
              $.ajax({
                  url: `https://poultreaseapi-ekarhzgnb9ddbkay.southeastasia-01.azurewebsites.net/api/penyakit/${editId}`,
                  method: 'PUT',
                  data: data,
                  headers: {
                  'Authorization': 'Bearer ' + token // Pastikan token dikirim dengan benar
              },
                  success: function(response) {
                      if (response.message) {
                        swal({
                          title: 'Berhasil',
                          text: 'Penyakit berhasil diperbarui',
                          icon: 'success'
                        }).then(()=>{
                          location.reload();
                        });

                          // Update tampilan tabel tanpa reload
                          $(`button[data-id="${editId}"]`).closest('tr').find('td:eq(0)').text(data.nama);
                          $(`button[data-id="${editId}"]`).closest('tr').find('td:eq(1)').text(data.deskripsi);
                          $(`button[data-id="${editId}"]`).closest('tr').find('td:eq(2)').text(data.gejala);
                          $(`button[data-id="${editId}"]`).closest('tr').find('td:eq(2)').text(data.pengobatan);

                      } else {
                          alert('Gagal menyimpan perubahan');
                      }
                  },
                  error: function(xhr) {
                      console.error('Terjadi kesalahan saat menyimpan perubahan:', xhr);
                      alert('Terjadi kesalahan saat menyimpan perubahan');
                  }
              });

          });
        });
        
            // Event listener for delete button
            $(document).on('click', '.btn-delete', function () {
              const id = $(this).data('id');
              swal({
            title: "Apa kamu yakin menghapus pakan ini?",
            text: "Data penyakit akan hilang",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((deletedata) => {
            if (deletedata) {
                const data2 = {
                        _token: '{{csrf_token()}}'
                    };
              
        $.ajax({
            url: `https://poultreaseapi-ekarhzgnb9ddbkay.southeastasia-01.azurewebsites.net/api/penyakit/${id}`, 
            method: 'DELETE',
            
            data: data2,
            headers: {
                'Authorization': 'Bearer ' + token // Jangan lupa set token
            },
            success: function(res){
                if (res)
                swal({
                    title: 'Berhasil',
                    text: ' Penyakit berhasil dihapus',
                    icon: 'success'
                  }).then(()=>{
                    location.reload();
                  });
                  
                else{
                  swal({
                    title: 'Gagal',
                    text: 'Penambahan gagal',
                    icon: 'error'
                  });
                }
              },
        });
            }
        });
});
            } else {
                $('tbody').append(`
                    <tr>
                        <td colspan="6" class="text-center">Data tidak tersedia.</td>
                    </tr>
                `);
            }
        },

        error: function(xhr) {
            console.error('Error fetching data:', xhr);
            $('tbody').append(`
                <tr>
                    <td colspan="6" class="text-center">Gagal memuat data</td>
                </tr>
            `);
            if (xhr.status === 401) {
                alert("Unauthorized: Anda harus login kembali.");
                // Redirect ke halaman login jika perlu
                window.location.href = '/login';
            }
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
          columns: ':not(:last-child)',
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
    columns: ':not(:last-child)',
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
          columns: ':not(:last-child)',
        },
      },
    ],
    columns: [
      { data: 'nama', title: 'nama' },
      { data: 'deskripsi', title: 'deskripsi' },
      { data: 'gejala', title: 'gejala' },
      { data: 'pengobatan', title: 'pengobatan' },
      {data: null, // Menggunakan data null untuk kolom aksi
    render: function (data, type, row) {
      return `
        <button class="btn btn-sm btn-primary btn-edit" data-id="${row.id}">Edit</button>
        <button class="btn btn-sm btn-danger btn-delete" data-id="${row.id}">Hapus</button>      `;
    },
    orderable: false, 
    searchable: false}
    
    ],
  
    ajax: {
      url: 'https://poultreaseapi-ekarhzgnb9ddbkay.southeastasia-01.azurewebsites.net/api/penyakit', 
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
</html>

