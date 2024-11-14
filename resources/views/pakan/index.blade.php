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
          <div class="col-lg-30 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Pakan</h4>
                  <a class="nav-link"  href="{{url ('/fpakan')}}" >
                    <button type="button" class="btn btn-primary mr-2">Tambahkan Pakan</button>
                  </a>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Nama Pakan
                          </th>
                          <th>
                            Jenis Pakan
                          </th>
                          <th>
                            Stok Pakan
                          </th>
                          <th>
                            Tanggal Diperbarui
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
          <h5 class="modal-title" id="editModalLabel">Edit Pakan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editForm">
            @csrf
            <div class="form-group">
              <label for="nama">Nama Pakan</label>
              <input type="text" class="form-control" id="edit_nama" name="nama">
            </div>
            <div class="form-group">
              <label for="jenis">Jenis Pakan</label>
              <input type="text" class="form-control" id="edit_jenis" name="jenis">
            </div>
            <div class="form-group">
              <label for="stok">Stok Pakan</label>
              <input type="text" class="form-control" id="edit_stok" name="stok">
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
  <script src="/vendors/sweetalert/sweetalert.min.js"></script>
  <!-- endinject -->

  <script>

  $(document).ready(function() {
    // Ambil token dari localStorage
    const token = localStorage.getItem('token');
    console.log("Token di localStorage:", localStorage.getItem('token'));

    if (!token) {
        console.error("Token tidak ditemukan. Pastikan Anda sudah login.");
        return;
    }

    $.ajax({
        url: '/api/pakan', // Sesuaikan dengan URL API
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token // Pastikan token dikirim dengan benar
        },
        success: function(response) {
            if (response.status === 200 && response.data.length > 0) {
                response.data.forEach(function(pakan) {
                    $('tbody').append(`
                        <tr>
                            <td>${pakan.nama}</td>
                            <td>${pakan.jenis}</td>
                            <td>${pakan.stok} ekor</td>
                            <td>${pakan.updated_at}</td>
                            <td>
                                <button class="btn btn-sm btn-primary btn-edit" data-id="${pakan.id}">Edit</button>
                                <button class="btn btn-sm btn-danger btn-delete" data-id="${pakan.id}">Hapus</button>

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
                url: `/api/pakan/${editId}`,
                method: 'GET',
                headers: {
                  'Authorization': 'Bearer ' + token // Pastikan token dikirim dengan benar
              },
                success: function(response) {
                    if (response.data) {
                        $('#edit_nama').val(response.data.nama);
                        $('#edit_jenis').val(response.data.jenis);
                        $('#edit_stok').val(response.data.stok);

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
                  jenis: $('#edit_jenis').val(),
                  stok: $('#edit_stok').val(),
                  _token: '{{csrf_token()}}'
              };

              // Mengirim data ke API untuk disimpan
              $.ajax({
                  url: `/api/pakan/${editId}`,
                  method: 'PUT',
                  data: data,
                  headers: {
                  'Authorization': 'Bearer ' + token // Pastikan token dikirim dengan benar
              },
                  success: function(response) {
                      if (response.message) {
                        swal({
                          title: 'Berhasil',
                          text: 'Pakan berhasil diperbarui',
                          icon: 'success'
                        }).then(()=>{
                          location.reload();
                        });

                          // Update tampilan tabel tanpa reload
                          $(`button[data-id="${editId}"]`).closest('tr').find('td:eq(0)').text(data.nama);
                          $(`button[data-id="${editId}"]`).closest('tr').find('td:eq(1)').text(data.jenis);
                          $(`button[data-id="${editId}"]`).closest('tr').find('td:eq(2)').text(data.stok);
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
            $('.btn-delete').on('click', function() {
          const id = $(this).data('id');
          if (confirm('Anda yakin ingin menghapus data ini?')) {

            const data2 = {
                        _token: '{{csrf_token()}}'
                    };
              
        $.ajax({
            url: `/api/pakan/${id}`, // URL API untuk delete
            method: 'DELETE',
            
            data: data2,
            headers: {
                'Authorization': 'Bearer ' + token // Jangan lupa set token
            },
            success: function(deleteResponse) {
                alert('Data berhasil dihapus');
                location.reload(); // Refresh halaman setelah hapus
            },
            error: function(xhr) {
                console.error('Error deleting data:', xhr);
                alert('Gagal menghapus data');
            }
        });
    }
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
  </script>
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

</html>

