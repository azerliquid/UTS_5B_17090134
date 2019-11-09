<?php
include 'template/header.php';
include 'template/leftside.php';
?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <button data-toggle="modal" data-target=".tambah" type="button" class="btn btn-md btn-success"><i class="fa fa-plus"><span> Tambah</span></i></button>
                <br>
                <br>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding ">
                <table id="example2" class="table table-bordered table-hover ">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Pariwisata</th>
                    <th>Lokasi</th>
                    <th>Harga</th>
                    <th>Jenis WIsata</th>
                    <th>Deskripsi</th>
                    <th>Image</th>
                    <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody >
                    <?php 
                    $sql = "SELECT * FROM pariwisata INNER JOIN jeniswisata ON pariwisata.jenisWisata=jeniswisata.id_jeniswisata";
                    $result = mysqli_query($db, $sql);
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {

                        $i++;
                        ?>
                        <tr>
                            <td>
                            <?= $row['id']; ?> 
                            </td>
                            <td>
                            <?= $row['namaPariwisata'] ?> 
                            </td>
                            <td>
                            <?= $row['lokasi'] ?> 
                            </td>
                            <td>
                            <?= $row['harga'] ?> 
                            </td>
                            <td>
                            <?= $row['jenisWisata'] ?> 
                            </td>
                            <td>
                            <?= $row['deskripsi'] ?> 
                            </td>
                            <td>
                            <?= $row['tumbnail'] ?> 
                            </td>
                            <td>
                                <button href="" data-toggle="modal" data-target=".edit"  data-id="<?php echo $row['id'] ?>"
                                                                                data-nama="<?php echo $row['namaPariwisata'] ?>" 
                                                                                data-lokasi="<?php echo $row['lokasi'] ?>" 
                                                                                data-harga="<?php echo $row['harga']; ?>"
                                                                                data-jenisWisata="<?php echo $row['id_jeniswisata'] ?>"
                                                                                data-deskripsi="<?php echo $row['deskripsi'] ?>"
                                                                                class="btn btn-xs btn-warning" id="btn-edit"><i class="fa fa-edit"> Edit</i> </button>
                                <button href="" data-toggle="modal" data-target=".hapus" data-id="<?php echo $row['id'] ?>"
                                                                                data-nama="<?php echo $row['namaPariwisata'] ?>" 
                                                                                data-lokasi="<?php echo $row['lokasi'] ?>" 
                                                                                data-harga="<?php echo $row['harga']; ?>"
                                                                                data-jenisWisata="<?php echo $row['jenisWisata'] ?>"
                                                                                data-deskripsi="<?php echo $row['deskripsi'] ?>"
                                                                                class="btn btn-xs btn-danger" id="btn-hapus"><i class="fa fa-trash"> Hapus</i></button>
                            </td> 
                        </tr>
                    <?php 
                }
                ?>
                    

                    </tbody>
                </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </section>
        <!-- /.content -->

        <!-- modal tambah -->
        <div class="modal fade tambah">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Pariwisata</h4>
              </div>
              <div class="modal-body">
                <form action="config/C_Pariwisata.php" method="POST" role="form" enctype="multipart/form-data">
                    <!-- text input -->
                    <div class="form-group">
                    <label>Nama Pariwisata</label>
                    <input name="namaPariwisata" type="text" class="form-control" placeholder="Masukan Nama Pariwisata">
                    </div>
                    <div class="form-group">
                    <label>Lokasi</label>
                    <textarea name="lokasi" class="form-control" rows="3" placeholder="Masukan Lokasi"></textarea>
                    </div>

                    <div class="form-group">
                    <label>Harga per tiket</label>
                    <input name="harga" type="number" class="form-control" placeholder="Masukan Harga per tiket">
                    </div>

                    <div class="form-group">
                    <label>Jenis wisata</label>
                    <select name="jenisWisata" class="form-control">
                    <?php 
                    $sql = "SELECT * FROM jenisWisata";
                    $result = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <option value="<?= $row['id_jeniswisata'] ?>"><?= $row['jenisWisata'] ?></option>
                    <?php 
                }
                ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukan Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tumbnail">Cover</label>
                        <input type="file" id="tumbnail" name="tumbnail" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="tambah">Save changes</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- modal edit -->
        <div class="modal fade edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Pariwisata</h4>
              </div>
              <div class="modal-body">
                <form action="config/C_Pariwisata.php" method="POST" role="form" enctype="multipart/form-data">
                    <!-- text input -->
                    <div class="form-group" hidden>
                        <label for="id"></label>
                        <input type="text" id="id" name="id" class="form-control edit_id">
                    </div>
                    <div class="form-group">
                        <label>Nama Pariwisata</label>
                        <input name="namaPariwisata" type="text" class="form-control edit_nama" placeholder="Masukan Nama Pariwisata">
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <textarea name="lokasi" class="form-control edit_lokasi" rows="3" placeholder="Masukan Lokasi"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Harga per tiket</label>
                        <input name="harga" type="number" class="form-control edit_harga" placeholder="Masukan Harga per tiket">
                    </div>

                    <div class="form-group">
                        <label>Jenis wisata</label>
                        <select name="jenisWisata" class="form-control edit_jeniswisata">
                        <?php 
                        $sql = "SELECT * FROM jeniswisata";
                        $result = mysqli_query($db, $sql);
                        while ($row = mysqli_fetch_array($result)) { ?>
                            <option value="<?= $row['id_jeniswisata'] ?>"><?= $row['jenisWisata'] ?></option>
                        <?php 
                    }
                    ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control edit_deskripsi" rows="3" placeholder="Masukan Deskripsi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tumbnail">Cover</label>
                        <input type="file" id="tumbnail" name="tumbnail" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal edit -->

        <!-- modal hapus -->
        <div class="modal fade hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title">Hapus Data Pariwisata</h2>
              </div>
              <div class="modal-body">

                <h4>Apakah anda yakin untuk menghapus data ini ?</h4>
                <br>
                <form action="config/C_Pariwisata.php" method="POST" role="form">
                    <!-- text input -->
                    <div class="form-group" hidden>
                        <label for="id"></label>
                        <input type="text" id="id" name="id" class="form-control edit_id">
                    </div>
                    <div class="form-group">
                        <label>Nama Pariwisata</label>
                        <input name="nama" type="text" class="form-control edit_nama" placeholder="Masukan Nama Pariwisata" disabled>
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <textarea name="lokasi" class="form-control edit_lokasi" rows="3" placeholder="Masukan Lokasi" disabled></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal hapus -->

    
  <?php
    include 'template/footer.php';
    ?>

    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  });

  $(document).on( "click", '#btn-edit',function(e) {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var lokasi = $(this).data('lokasi');
                var harga = $(this).data('harga');
                var jeniswisata = $(this).data('jenisWisata');
                var deskripsi = $(this).data('deskripsi');


                $(".edit_id").val(id);
                $(".edit_nama").val(nama);
                $(".edit_lokasi").val(lokasi);
                $(".edit_harga").val(harga);
                $(".edit_jeniswisata").val(jeniswisata);
                $(".edit_deskripsi").val(deskripsi);
    });
  $(document).on( "click", '#btn-hapus',function(e) {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var lokasi = $(this).data('lokasi');
                var harga = $(this).data('harga');
                var jenisPariwisata = $(this).data('jenisPariwisata');
                var deskripsi = $(this).data('deskripsi');

                $(".edit_id").val(id);
                $(".edit_nama").val(nama);
                $(".edit_lokasi").val(lokasi);
                $(".edit_harga").val(harga);
                $(".edit_deskripsi").val(deskripsi);
    });
</script>