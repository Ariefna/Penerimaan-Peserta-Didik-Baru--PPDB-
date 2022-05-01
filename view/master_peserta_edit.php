<?php
if (isset($_GET['action']) == 'edit') {
    $judul = "Edit";
} elseif (isset($_GET['action']) == 'tambah') {
    $judul = "Tambah";
}
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="font-weight-bold text-primary"><? echo $judul; ?> Peserta</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputAddress">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="<?php echo $tanggal; ?>" onchange="myFunction(this.value)" readonly required>
                                <label for="inputAddress">Sales</label>
                                <input type="text" class="form-control" id="Kode_Pelanggan" value="<?php echo $sales; ?>" name="sales" readonly required>
                                <label for="inputAddress">Jatuh Tempo (Hari)</label>
                                <input class="form-control" name="tempo" type="number" value="<?php echo $tempo; ?>" required readonly></input>
                                <label for="inputAddress">Nama Pelanggan</label>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input autocomplete="off" type="text" class="form-control" onKeyUp="suggest2(this.value);" name="nama" value="<?php echo $nama; ?>" onBlur="fill2();" id="nama" readonly required>
                                        <div class="suggestionsBox col-md-12" id="suggestions" style="display: none;">
                                            <div class="suggestionList" id="suggestionsList" style="cursor: pointer;">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" id="idsp" name="" value="<?php echo $id[0]; ?>" readonly>
                                <label for="inputAddress">Kode Pelanggan</label>
                                <input type="text" class="form-control" id="kodepl" name="kodepl" value="<?php echo $kodepl; ?>" readonly required>
                                <label for="inputAddress">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="Kode_Pelanggan" value="<?php echo $alamat; ?>" readonly required>
                                <label for="inputAddress">Saldo</label>
                                <input type="text" class="form-control" id="saldo" name="saldo" value="<?php echo $saldo; ?>" readonly required>
                            </div>
                        </div>
                        <div class="center">
                            <?php
                            if (isset($_GET['action']) == 'tambah') {
                                echo '<button id="" name="tambah" type="submit" class="col-md-3 btn btn-primary">Tambah</button>';
                            } else {

                                echo '<button id="" name="edit" type="submit" class="col-md-3 btn btn-primary">Edit</button>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->