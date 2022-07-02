<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> <i class="fa fa-user" aria-hidden="true"></i> Manajemen User
                            Panitia</h4>

                        <div class="card-header-action">
                            <button type="button" class="btn btn-icon icon-left btn-warning" data-toggle="modal" data-target="#tambahdata">
                                <i class="far fa-edit"></i> Tambah Data
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="table-1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($koneksi, "select * from user where not level = 'kepala'");
                                        $no = 0;
                                        while ($user = mysqli_fetch_array($query)) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $user['nama_user'] ?></td>
                                                <td><?= $user['username'] ?></td>
                                                <td><?= $user['level'] ?></td>

                                                <td>
                                                    <?php if ($user['status'] == 1) { ?>
                                                        <span class="badge badge-success">Aktif</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-danger">Non Aktif</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button data-id="<?= $user['id_user'] ?>" class="hapus btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form id="form-edit<?= $no ?>">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Edit Data</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" value="<?= $user['id_user'] ?>" name="id_user" class="form-control" required="" />
                                                                        <div class="form-group">
                                                                            <label>Nama user</label>
                                                                            <input type="text" name="nama" value="<?= $user['nama_user'] ?>" class="form-control" required="" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Username</label>
                                                                            <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control" required="" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="level">Level</label>
                                                                            <select class="form-control" name="level" id="level" required>
                                                                                <option value="">Pilih Level</option>
                                                                                <option value="admin">Panitia || Admin</option>
                                                                                <!-- <option value="kepala">
                                                                                    Kepala Sekolah
                                                                                </option> -->
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Ganti Password</label>
                                                                            <input type="password" name="password" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                            Close
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            Save
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <script>
                                                $("#form-edit<?= $no ?>").submit(function(e) {
                                                    e.preventDefault();
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "model/json/admin/mod_user/crud_user.php?pg=ubah",
                                                        data: $(this).serialize(),
                                                        success: function(data) {
                                                            if (data == "OK") {
                                                                iziToast.success({
                                                                    title: "berhasil",
                                                                    message: "Data Berhasil diubah",
                                                                    position: "topRight",
                                                                });
                                                                setTimeout(function() {
                                                                    window.location.reload();
                                                                }, 2000);
                                                                $("#modal-edit<?= $no ?>").modal("hide");
                                                            } else {
                                                                iziToast.error({
                                                                    title: "Maaf!",
                                                                    message: "Data Gagal ditambahkan atau username sudah ada",
                                                                    position: "topRight",
                                                                });
                                                            }
                                                        },
                                                    });
                                                    return false;
                                                });
                                            </script>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
</section>
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-tambah">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required="" />
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required="" />
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" name="level" id="level" required>
                                <option value="">Pilih Level</option>
                                <option value="admin">Panitia || Admin</option>
                                <!-- <option value="kepala">Kepala Sekolah</option> -->
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#txtConfirmPassword").keyup(function() {
            var password = $("#txtNewPassword").val();
            $("#divCheckPasswordMatch").html(
                password == $(this).val() ?
                "Passwords match." :
                "Passwords do not match!"
            );
        });
    });
    $("#form-tambah").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "model/json/admin/mod_user/crud_user.php?pg=tambah",
            data: $(this).serialize(),
            success: function(data) {
                if (data == "OK") {
                    iziToast.success({
                        title: "berhasil!",
                        message: "Data Berhasil ditambahkan",
                        position: "topRight",
                    });
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                    $("#tambahdata").modal("hide");
                } else {
                    iziToast.error({
                        title: "Maaf!",
                        message: "Data Gagal ditambahkan atau username sudah ada",
                        position: "topRight",
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            },
        });
        return false;
    });

    $("#table-1").on("click", ".hapus", function() {
        var id = $(this).data("id");
        swal
            .fire({
                title: "Are you sure?",
                text: "Akan menghapus data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            })
            .then((result) => {
                if (result) {
                    $.ajax({
                        url: "model/json/admin/mod_user/crud_user.php?pg=hapus",
                        method: "POST",
                        data: "id_user=" + id,
                        success: function(data) {
                            iziToast.success({
                                title: "Horee!",
                                message: "Data Berhasil dihapus",
                                position: "topRight",
                            });
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        },
                    });
                }
            });
    });
</script>