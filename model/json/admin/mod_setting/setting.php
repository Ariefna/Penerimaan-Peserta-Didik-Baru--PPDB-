<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<section class='content'>
	<div class='row'>
		<div class='col-md-12 notif'></div>
		<div class='col-md-12'>
			<form id="form-setting">
				<div class='box box-solid'>
					<div class='box-header with-border'>
						<h3 class='box-title'>Pengaturan Aplikasi</h3>
						<div class='box-tools pull-right btn-group'>
							<button type='submit' id="save-btn" class='btn btn-sm btn-flat btn-success'><i class='fa fa-check'></i> Simpan</button>
						</div>
					</div><!-- /.box-header -->
					<div class='box-body'>
						<div class='form-group'>
							<label>Nama Sekolah</label>
							<input type='text' name='nama_sekolah' value="<?= $setting['nama_sekolah'] ?>" class='form-control' required='true' />
						</div>
						<div class='form-group'>
							<div class='row'>
								<div class='col-md-6'>
									<label>NSM/NSS Sekolah</label>
									<input type='text' name='nsm' value="<?= $setting['nsm'] ?>" class='form-control' required='true' />
								</div>
								<div class='col-md-6'>
									<label>NPSN Sekolah</label>
									<input type='text' name='npsn' value="<?= $setting['npsn'] ?>" class='form-control' required='true' />
								</div>
							</div>
						</div>

						<div class='form-group'>
							<div class='row'>
								<div class="col-sm-6 col-md-6">
									<label>Logo</label>
									<input type='file' name='logo' class='form-control' />
								</div>
								<div class="col-sm-6 col-md-6">
									&nbsp;<br />
									<img src="../<?= $setting['logo'] ?>" class="img-thumbnail" width="100">
								</div>
							</div>
						</div>
						<!--<div class='form-group'>
							<div class='row'>
								<div class='col-md-12'>
									<label>Kop Sekolah</label>
									<input type='file' name='kop' class='form-control' />
								</div>
								<div class="col-sm-6 col-md-12">
									&nbsp;<br />
									<img src="../<?= $setting['kop'] ?>" class="img-thumbnail" width="800">
								</div>
							</div>
						</div>
						<div class='form-group'>
							<div class='row'>
								<div class='col-md-12'>
									<label>Logo sidadik</label>
									<input type='file' name='logo_sidadik' class='form-control' />
								</div>
								<div class="col-sm-6 col-md-12">
									&nbsp;<br />
									<img src="../<?= $setting['logo_sidadik'] ?>" class="img-thumbnail" width="800">
								</div>
							</div>
						</div>-->

					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</form>
		</div>
		<script>
			$('.custom-file-input').on('change', function() {
				let fileName = $(this).val().split('\\').pop();
				$(this).next('.custom-file-label').addClass("selected").html(fileName);
			});
			$('#form-setting').on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'post',
					url: 'admin/mod_setting/crud_setting.php?pg=ubah',
					data: new FormData(this),
					processData: false,
					contentType: false,
					cache: false,
					beforeSend: function() {
						$('form button').on("click", function(e) {
							e.preventDefault();
						});
					},
					success: function(data) {

						iziToast.success({
							title: 'berhasil!',
							message: data,
							position: 'topRight'
						});
						setTimeout(function() {
							window.location.reload();
						}, 2000);


					}
				});
			});
		</script>



	</div>
</section><!-- /.content -->