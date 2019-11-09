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
                    <h3 class="box-title">Data Lokasi Pariwisata</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding ">
                <table id="example2" class="table table-bordered table-hover ">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th>Nama jalan</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Kab/Kota</th>
                    <th>Provinsi</th>
                    <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody >
                    <?php 
                    $sql = "SELECT * FROM lokasiwisata";
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
                            <?= $row['jalan'] ?> 
                            </td>
                            <td>
                            <?= $row['desa'] ?> 
                            </td>
                            <td>
                            <?= $row['kecamatan'] ?> 
                            </td>
                            <td>
                            <?= $row['kab_kota'] ?> 
                            </td>
                            <td>
                            <?= $row['provinsi'] ?> 
                            </td>
                            <td>
                                <button href="" data-toggle="modal" data-target=".edit"  data-id="<?php echo $row['id'] ?>"
                                                                                data-nama="<?php echo $row['jalan'] ?>" 
                                                                                data-lokasi="<?php echo $row['desa'] ?>" 
                                                                                data-harga="<?php echo $row['kecamatan']; ?>"
                                                                                data-jenisWisata="<?php echo $row['kab_kota'] ?>"
                                                                                data-deskripsi="<?php echo $row['provinsi'] ?>"
                                                                                class="btn btn-xs btn-warning" id="btn-edit"><i class="fa fa-edit"> Edit</i> </button>
                                <button href="" data-toggle="modal" data-target=".hapus" data-id="<?php echo $row['id'] ?>"
                                                                                data-nama="<?php echo $row['jalan'] ?>" 
                                                                                data-lokasi="<?php echo $row['desa'] ?>" 
                                                                                data-harga="<?php echo $row['kecamatan']; ?>"
                                                                                data-jenisWisata="<?php echo $row['kab/kota'] ?>"
                                                                                data-deskripsi="<?php echo $row['provinsi'] ?>"
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
                <h4 class="modal-title">Tambah Lokasi</h4>
              </div>
              <div class="modal-body">
                <form action="config/C_Lokasi.php" method="POST" role="form" enctype="multipart/form-data">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Nama Jalan</label>
                        <input name="jalan" type="text" class="form-control" placeholder="Masukan Nama Jalan">
                    </div>
                    <div class="form-group">
                        <label>Desa</label>
                        <input name="desa" type="text" class="form-control" placeholder="Masukan Nama Desa">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input name="kecamatan" type="text" class="form-control" placeholder="Masukan Nama Kecamatan">
                    </div>
                    <div class="form-group">
                        <label>Kab/Kota</label>
                        <input name="kab/kota" type="text" class="form-control" placeholder="Masukan Nama Kab/Kota">
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input name="provinsi" type="text" class="form-control" placeholder="Masukan Nama Provinsi">
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