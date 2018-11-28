	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">

				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-12 cp-r animate-box">
						<div class="col-lg-12 animate-box">
							<h3 class="heading">Menampilkan semua komentar</h3>
							 <table class="table table-hover" style="margin-top: 20px;">
							 		<thead>
							 			<tr>
									        <th>Tanggal Komentar</th>
									        <th>Judul Post</th>
									        <th>Nama User</th>
									        <th>Isi Komentar</th>
									        <th>Opsi</th>
									    </tr>
							 		</thead>
								    <tbody>	    	
								    	<?php if(empty($komens)){
								    		echo "Tidak ada komen yang ditampilkan";
								    	} else{
								    	foreach($komens as $komen){?>
								      <tr>
								        <td class="col-md-3">
											<?php echo $komen->tanggalKomentar; ?>
										</td>
										<td class="col-md-4">
											
											<?php echo $komen->judulPost; ?>
										</td>
										<td class="col-md-2">
											
											<?php echo $komen->namaUser; ?>
										</td>
										<td class="col-md-3">

											<?php echo nl2br($komen->isiKomentar); ?>
										</td>
										<td class="col-md-1">
											<form class="form-horizontal" role="form" action="<?php echo URL; ?>admin/hapuskomentar" method="post" enctype="multipart/form-data">
												<input type="hidden" class="form-control" name="idKomenHapus" value="<?php echo $komen->idKomentar ?>">
												<button class=" btn btn-default btn-xs" type="submit" name="hapuskomentar_click" value="Hapus" onClick="return confirm('Komentar akan dihapus secara permanen. Yakin untuk menghapus komentar?')">Hapus</button>
											</form>
										</td>
								  		</tr>
								    	<?php }}?>

								    </tbody>
								  </table>
								</div>	
						</div>
						</div>
						
				</div>

			</article>

		</div>

	</div>