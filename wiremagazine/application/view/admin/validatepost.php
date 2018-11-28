	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">

				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-12 cp-r animate-box">
						<div class="col-lg-12 animate-box">
							<h3 class="heading">Menampilkan semua request validasi post</h3>
							 <table class="table table-hover" style="margin-top: 20px;">
							 		<thead>
							 			<tr>
									        <th>Gambar Post</th>
									        <th>Judul Post</th>
									        <th>Jenis Post</th>
									        <th>Status</th>
									        <th>Tanggal Post</th>
									        <th>Tanggal Kadaluarsa</th>
									        <th>Opsi</th>
									    </tr>
							 		</thead>
								    <tbody>	    	
								    	<?php if(empty($posts)){
								    		echo "Tidak ada post yang ditampilkan";
								    	} else{
								    	foreach($posts as $post){?>
								      <tr>
								      	<td class="col-md-2">
								      		<img src="<?php echo URL.$post->alamatFoto ?>" alt="Image" class="img-responsive" style="height: 100px;">
								      	</td>
								        <td class="col-md-2">
											
											<?php echo $post->judulPost; ?>
										</td>
										<td class="col-md-2">
											
											<?php echo $post->jenisPost; ?>
										</td>
										<td class="col-md-1">
											
											<?php echo $post->statusPost; ?>
										</td>
										<td class="col-md-2">
											
											<?php echo $post->tanggalPost; ?>
										</td>
										<td class="col-md-3">
											
											<?php echo $post->tanggalKadaluarsa; ?>
										</td>
										<td class="col-md-1">
											<form class="form-horizontal" role="form" action="<?php echo URL; ?>admin/terimapostreq" method="post" enctype="multipart/form-data">
												<input type="hidden" class="form-control" name="idPostTerima" value="<?php echo $post->idPost ?>">
												<button class=" btn btn-default btn-xs" type="submit" name="terimapostreq_click" value="Rincian" onClick="return confirm('Terima Post?')">Terima</button>
											</form>

											<form class="form-horizontal" role="form" action="<?php echo URL; ?>admin/hapuspostreq" method="post" enctype="multipart/form-data">
												<input type="hidden" class="form-control" name="idPostHapus" value="<?php echo $post->idPost ?>">
												<button class=" btn btn-default btn-xs" type="submit" name="hapuspostreq_click" value="Hapus" onClick="return confirm('Post akan dihapus akan disembunyikan. Yakin untuk menghapus post?')">Hapus</button>
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