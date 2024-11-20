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
  <!-- <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
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
            <a class="nav-link" href="{{url ('/kandang')}}"aria-expanded="false" aria-controls="kandangdropdown">
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
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
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
          <div class="col-lg-30 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Kandang</h4>
                  <a class="nav-link"  href="{{url ('/fkandang')}}" >
                    <button type="button" class="btn btn-primary mr-2">Tambahkan kandang</button>
                  </a>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Kode Kandang
                          </th>
                          <th>
                            Jenis Unggas
                          </th>
                          <th>
                            Jumlah Unggas
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Tanggal Masuk
                          </th>
                          <th>
                            Tanggal Keluar
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
          <h5 class="modal-title" id="editModalLabel">Edit Kandang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editForm">
            @csrf
            <div class="form-group">
              <label for="kode">Kode</label>
              <input type="text" class="form-control" id="edit_kode" name="kode">
            </div>
            <div class="form-group">
              <label for="jenis_unggas">Jenis Unggas</label>
              <input type="text" class="form-control" id="edit_jenis_unggas" name="jenis_unggas">
            </div>
            <div class="form-group">
              <label for="jumlah_unggas">Jumlah Unggas</label>
              <input type="text" class="form-control" id="edit_jumlah_unggas" name="jumlah_unggas">
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <input type="text" class="form-control" id="edit_status" name="status">
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
  <script src="/vendors/sweetalert/sweetalert.min.js"></script>
  <!-- endinject -->

  <script>
  $(document).ready(function() {
    const token = sessionStorage.getItem('token');
    console.log("Token di localStorage:", sessionStorage.getItem('token'));
    
    if (!token) {
        console.error("Token tidak ditemukan. Pastikan Anda sudah login.");
        return window.location.href = '/login' ;
    }

      $.ajax({
          url: '/kandang',
          method: 'GET',
          headers: {
              'Authorization': 'Bearer ' + sessionStorage.getItem('token')
          },
          success: function(response) {
              console.log('Halaman kandang berhasil dimuat');
          },
          error: function(xhr) {
              console.log('Error:', xhr);
          }
      });

    $.ajax({
        url: '/api/kandang', 
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token 
        },
        success: function(response) {
            if (response.status === 200 && response.data.length > 0) {
                response.data.forEach(function(kandang) {
                  const createdAt = kandang.created_at ? new Date(kandang.created_at) : null;
                  const deactivatedAt = kandang.deactivated_at ? new Date(kandang.deactivated_at) : null;
                  const formattedCreatedAt = createdAt ? createdAt.toLocaleDateString('en-GB') : '-';
                  const formattedDeactivatedAt = deactivatedAt ? deactivatedAt.toLocaleDateString('en-GB') : '-';
                    $('tbody').append(`
                        <tr>
                            <td>${kandang.kode}</td>
                            <td>${kandang.jenis_unggas}</td>
                            <td>${kandang.jumlah_unggas} ekor</td>
                            <td>
                            <span class="badge ${kandang.status === 'aktif' ? 'badge-success' : 'badge-danger'}">
                                ${kandang.status}
                            </span>
                            </td>
                            <td>${formattedCreatedAt}</td>
                            <td>${formattedDeactivatedAt}</td>
                            <td>
                                <button class="btn btn-sm btn-primary btn-edit" data-id="${kandang.id}">Edit</button>
                            </td>
                        </tr>
                    `);
                });

                $(document).ready(function() {
                $(document).on('click', '.btn-edit', function() {
                const editId = $(this).data('id'); 
                $('#editModal').data('id', editId); 

                $.ajax({
                    url: `/api/kandang/${editId}`,
                    method: 'GET',
                    headers: {
                      'Authorization': 'Bearer ' + token 
                  },
                    success: function(response) {
                        if (response.data) {
                            $('#edit_kode').val(response.data.kode);
                            $('#edit_jenis_unggas').val(response.data.jenis_unggas);
                            $('#edit_jumlah_unggas').val(response.data.jumlah_unggas);
                            $('#edit_status').val(response.data.status);

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
                  kode: $('#edit_kode').val(),
                  jenis_unggas: $('#edit_jenis_unggas').val(),
                  jumlah_unggas: $('#edit_jumlah_unggas').val(),
                  status: $('#edit_status').val(),
                  _token: '{{csrf_token()}}'
              };

              $.ajax({
                  url: `/api/kandang/${editId}`,
                  method: 'PUT',
                  data: data,
                  headers: {
                  'Authorization': 'Bearer ' + token 
                  },
                  success: function(response) {
                      if (response.message) {
                        swal({
                          title: 'Berhasil',
                          text: 'Kandang berhasil diperbarui',
                          icon: 'success'
                        }).then(()=>{
                          location.reload();
                        });

                          $(`button[data-id="${editId}"]`).closest('tr').find('td:eq(0)').text(data.kode);
                          $(`button[data-id="${editId}"]`).closest('tr').find('td:eq(1)').text(data.jenis_unggas);
                          $(`button[data-id="${editId}"]`).closest('tr').find('td:eq(2)').text(data.jumlah_unggas);
                          $(`button[data-id="${editId}"]`).closest('tr').find('td:eq(3)').text(data.status);
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
        }
    });
  });
  
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
                    url: '/api/logout', 
                    type: 'POST',   
                    headers: {
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token'), // Pastikan token ada jika Anda menggunakan Bearer Token
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

$(document).ready(function () {
  // Inisialisasi DataTables dengan fitur Export
  $('.table').DataTable({
    processing: true,  
    serverSide: true,
    // Nonaktifkan fitur advanced table
    searching: false,      // Nonaktifkan fitur pencarian
        ordering: false,       // Nonaktifkan sorting kolom
        paging: false,         // Nonaktifkan pagination
        info: false, 
    dom: "<'row'<'col-4'B>>rt<'row'<'col-6'p>>",
    buttons: [
      {
        className: 'btn btn-danger btn-sm',
        extend: 'pdfHtml5',
        text: 'PDF',
        title: 'Data Kandang',
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
        title: 'Data Kandang',
        exportOptions: {
          columns: ':not(:last-child)',
          format: {
      body: function(data, row, column, node) {
       if (data === null || data === undefined) {
          return '';
        }
        if (typeof data === 'object') {
          return JSON.stringify(data);
        }
        if (typeof data === 'number') {
          return data.toString(); 
        }
        return data; 
      }
    }
        },
      },
      {
        className: 'btn btn-secondary btn-sm',
        extend: 'print',
        text: 'Print',
        title: '<h4>Data Kandang</h4>',
        exportOptions: {
          columns: ':not(:last-child)',
        },
      },
    ],
    columns: [
      { data: 'kode' },
      { data: 'jenis_unggas' },
      { data: 'jumlah_unggas' },
      {
      data: 'status',
      render: function (data, type, row) {
        // Gunakan badge dengan warna sesuai status
        let badgeClass = data === 'aktif' ? 'badge-success' : 'badge-danger';
        return `
          <span class="badge ${badgeClass}">
            ${data}
          </span>
        `;
      },
      title: 'Status' },
      { data: 'created_at',
        render: function (data) {
      let date = new Date(data);
      return date.toLocaleDateString('id-ID'); 
    }
       },
      { data: 'deactivated_at',
        render: function (data) {
          if (data === null) {
          return '-'; 
    }
          let date = new Date(data);
          return date.toLocaleDateString('id-ID'); 
        }
       },
       {data: null, 
    render: function (data, type, row) {
      return `
        <button class="btn btn-sm btn-primary btn-edit" data-id="${row.id}">Edit</button>
      `;
    },
    orderable: false, 
    searchable: false}
    ],
    ajax: {
      url: '/api/kandang', 
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
    complete: function() {
        table.processing(false);  
      },
    responsive: true,
    // language: {
    //   emptyTable: "Tidak ada data tersedia",
    //   lengthMenu: "Tampilkan _MENU_ entri",
    //   search: "Cari:",
    //   paginate: {
    //     first: "Pertama",
    //     last: "Terakhir",
    //     next: "Berikutnya",
    //     previous: "Sebelumnya",
    //   },
    //   info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
    //   infoEmpty: "Tidak ada entri untuk ditampilkan",
    // },
  });
});

  </script>
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="/vendors/jquery-3.7.1.min.js"></script> 
  <script src="/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="/vendors/datatables.net/dataTables.buttons.js"></script>
  <script src="/vendors/datatables.net/jszip.min.js"></script>
  <script src="/vendors/datatables.net/pdfmake.min.js"></script>
  <script src="/vendors/datatables.net/vfs_fonts.js"></script>
  <script src="/vendors/datatables.net/buttons.html5.min.js"></script>
  <script src="/vendors/datatables.net/buttons.print.min.js"></script>
  <!-- <script src="/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
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

