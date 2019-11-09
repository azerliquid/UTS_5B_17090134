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
                    <th>Jenis Wisata</th>
                    <th>Created</th>
                    <th>Udated</th>
                    <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody >
                    <?php 
                    $sql = "SELECT * FROM jeniswisata";
                    $result = mysqli_query($db, $sql);
                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {

                        $i++;
                        ?>
                        <tr>
                            <td>
                            <?= $row['id_jeniswisata']; ?> 
                            </td>
                            <td>
                            <?= $row['jenisWisata'] ?> 
                            </td>
                            <td>
                            <?= $row['created'] ?> 
                            </td>
                            <td>
                            <?= $row['updated'] ?> 
                            </td>
                            <td>
                                <button href="" data-toggle="modal" data-target=".edit"  data-id="<?php echo $row['id_jeniswisata'] ?>"
                                                                                data-jeniswisata="<?php echo $row['jenisWisata'] ?>" 
                                                                                class="btn btn-xs btn-warning" id="btn-edit"><i class="fa fa-edit"> Edit</i> </button>
                                <button href="" data-toggle="modal" data-target=".hapus" data-id="<?php echo $row['id_jeniswisata'] ?>"
                                                                                data-jeniswisata="<?php echo $row['jenisWisata'] ?>" 
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
                <form action="config/C_JenisWisata.php" method="POST" role="form">
                    <!-- text input -->
                    <div class="form-group">
                    <label>Jenis Wisata</label>
                    <input name="jenisWisata" type="text" class="form-control" placeholder="Masukan Nama Jenis Pariwisata">
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
                <form action="config/C_JenisWisata.php" method="POST" role="form">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" id="id" name="id" class="form-control edit_id">
                    </div>
                    <div class="form-group">
                        <label>Jenis Pariwisata</label>
                        <input name="jenisWisata" type="text" class="form-control edit_jeniswisata" placeholder="Masukan Nama Jenis Pariwisata">
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
                <form action="config/C_JenisWisata.php" method="POST" role="form">
                    <!-- text input -->
                    <div class="form-group">
                        <label for="id"></label>
                        <input type="text" id="id" name="id" class="form-control hapus_id">
                    </div>
                    <div class="form-group">
                        <label>Jenis Pariwisata</label>
                        <input name="nama" type="text" class="form-control hapus_jeniswisata" placeholder="Jenis Wisata">
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
                var jeniswisata = $(this).data('jeniswisata');
                console.log("id="+id+" jenis="+jeniswisata);

                $(".edit_id").val(id);
                $(".edit_jeniswisata").val(jeniswisata);
    });
  $(document).on( "click", '#btn-hapus',function(e) {
                var id = $(this).data('id');
                var jenisPariwisata = $(this).data('jeniswisata');
                console.log("id="+id+" jenis="+jenisPariwisata);
                $(".hapus_id").val(id);
                $(".hapus_jeniswisata").val(jenisPariwisata);
    });
</script> 