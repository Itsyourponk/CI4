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

            <!-- NOTIFIKASI BERHASIL HAPUS -->
            <?php if (session()->getFlashdata('succes')) : ?>
                    <div class="alert alert-success alert-succes alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('succes'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>

                <!-- TOMBOL PENCARIAN -->
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="katakunci" value ="<?php echo $katakunci; ?>" placeholder="masukkan kata kunci">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pegawai</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <!-- ALERT ISIAN ERROR -->
                                <div class="alert alert-danger error" role="alert" style="display: none;"></div>

                                <!-- ALERT ISIAN SUKSES -->
                                <div class="alert alert-success sukses" role="alert" style="display: none;"></div>

                                <!-- FORM INPUT -->
                                <form action="" method="post">
                                    <input type="hidden" id="id" name="id">
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
                                            <select name="bidang" id="bidang" class="form-select">
                                                <option value="">-- Pilih Bidang --</option>
                                                <option value="hr">HR</option>
                                                <option value="finance">Finance</option>
                                                <option value="marketing">Marketing</option>
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
                                <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Tabel View Data Pegawai -->
                 <div id="tabelPegawai">
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
                        <?php $nomor = 0; ?>
                        <?php
                        foreach ($dataPegawai as $k => $v) {
                            ?> 
                            <tr>
                                <td><?= ++$nomor; ?></td>
                                <td><?= ($v['nama']) ?></td>
                                <td><?= ($v['email']) ?></td>
                                <td><?= ($v['bidang']) ?></td>
                                <td><?= ($v['alamat']) ?></td>
                                <td>
                                    <!-- Tombol Aksi -->
                                    <button type= "button" btn class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="edit (<?= $v['id'] ?>)">Edit</button>
                                    <button type= "button" btn class="btn btn-danger btn-sm" onclick="hapus (<?= $v['id'] ?>)">Hapus</button>
                                </td>
                            </tr>
                        <?php } ?>
                      
                    </tbody>
                </table>
                <!-- PAGINATION -->
                    <?php
                    echo $pager->links('default', 'bootstrap_pagination'); 
                    ?>
                 </div>
            </div>
        </div>
    </div>

    <!-- JQUERY & BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SCRIPT AJAX SIMPAN -->
    <script>
        function tampilDataPegawai() {
            $('#tabelPegawai').load(window.location.href + ' #tabelPegawai');
        }
        function hapus(id) {
          var result = confirm("Yakin ingin menghapus data ini?");
          if (result) {
              window.location.href = "<?php echo site_url('pegawai/hapus') ?>/" + id;
                      }
                  }
          
       function edit(id) {
          $.ajax({
              url: "<?php echo site_url('pegawai/edit') ?>/" + id,
              type: "GET",
              
              success: function(hasil) {
                var $obj = $.parseJSON(hasil);
                if ($obj.id != '') {
                    $('#id').val($obj.id);
                    $('#nama').val($obj.nama);
                    $('#email').val($obj.email);
                    $('#bidang').val($obj.bidang);
                    $('#alamat').val($obj.alamat);
                }
              }
          });
      }

        function bersihkan() {
    $('#id').val('');
    $('#nama').val('');
    $('#email').val('');
    $('#bidang').val('');
    $('#alamat').val('');
  }

  $('#tombolSimpan').on('click', function() {
    var id     = $('#id').val();
    var nama   = $('#nama').val();
    var email  = $('#email').val();
    var bidang = $('#bidang').val();
    var alamat = $('#alamat').val();

      $.ajax({
          url: "<?php echo site_url('pegawai/simpan') ?>",
          type: "POST",
          data: {
            id: id,
            nama: nama,
            email: email,
            bidang: bidang,
            alamat: alamat
          },
          success: function(hasil) {
              var $obj = $.parseJSON(hasil);
              if ($obj.sukses == false) {
                  $('.sukses').hide();
                  $('.error').show().html($obj.error);
              } else {
                  $('.error').hide();
                  $('.sukses').show().html($obj.sukses);
                  bersihkan();

                  tampilDataPegawai();
                  setTimeout(function() {
                      $('#exampleModal').modal('hide');
                      $('alert').hide();
                  }, 1000);
              }
          }
      });
      
  });

  $('.tombol-tutup').on('click', function() {
      if ($('.sukses').is(':visible')) {
          window.location.href = "<?php echo current_url(). "?" .$_SERVER['QUERY_STRING'] ?>";
      }
      $('.alert').hide();
      bersihkan();
  });
</script>
</body>
</html>