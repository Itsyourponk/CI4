<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>

    <!-- CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- CONTAINER -->
    <div class="container mt-4">

        <!-- CARD -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Data Pegawai
            </div>
            <div class="card-body">

                <!-- TOMBOL PENCARIAN -->
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="katakunci" placeholder="masukkan kata kunci">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                    </div>
                </form>

                <!-- BUTTON Trigger Modal : Tambah Data -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Tambah Data Pegawai
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data Pegawai</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <!-- ALERT ISIAN ERROR -->
                                <div class="alert alert-danger error" role="alert" style="display: none;"></div>

                                <!-- ALERT ISIAN SUKSES -->
                                <div class="alert alert-success sukses" role="alert" style="display: none;"></div>

                                <!-- FORM INPUT -->
                                <form action="" method="post">
                                    <!-- Input Nama -->
                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama pegawai">
                                        </div>
                                    </div>

                                    <!-- Input Email -->
                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email">
                                        </div>
                                    </div>

                                    <!-- Pilih Bidang -->
                                    <div class="mb-3 row">
                                        <label for="bidang" class="col-sm-3 col-form-label">Bidang</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" id="bidang" name="bidang">
                                                <option value="">-- Pilih Bidang --</option>
                                                <option value="HR">HR</option>
                                                <option value="Finance">Finance</option>
                                                <option value="IT">IT</option>
                                                <option value="Marketing">Marketing</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Input Alamat -->
                                    <div class="mb-3 row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Tabel View Data Pegawai -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Bidang</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Nama Pegawai 1</td>
                            <td>Pegawai1@email.com</td>
                            <td>HR</td>
                            <td>Alamat Pegawai 1</td>
                            <td>
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- JQUERY & BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SCRIPT AJAX SIMPAN -->
    <script>
      $('#tombolSimpan').on('click', function() {
          var nama   = $('#nama').val();
          var email  = $('#email').val();
          var bidang = $('#bidang').val();
          var alamat = $('#alamat').val();

          $.ajax({
              url: "<?php echo site_url('pegawai/simpan') ?>",
              type: "POST",
              data: {
                  nama: nama,
                  email: email,
                  bidang: bidang,
                  alamat: alamat
              },
              success: function(hasil) {
                  var $obj = $.parseJSON(hasil);
                  if ($obj.sukses == false) {
                      $('.sukses').hide();
                      $('.error').show();
                      $('.error').html($obj.error);
                  } else {
                      $('.error').hide();
                      $('.sukses').show();
                      $('.sukses').html($obj.sukses);
                  }
              }
          });
      });
    </script>
</body>
</html>