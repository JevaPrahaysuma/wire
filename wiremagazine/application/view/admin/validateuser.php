	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">

				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-12 cp-r animate-box">
						<div class="col-lg-12 animate-box">
							<h3 class="heading">Menampilkan semua request upgrade user</h3>
							 <table class="table table-hover" style="margin-top: 20px;">
							 		<thead>
							 			<tr>
									        <th>Foto Instansi</th>
									        <th>Nama Instansi</th>
									        <th>Jenis</th>
									        <th>Alamat</th>
									        <th>Status</th>
									        <th>Nama User</th>
									        <th>Opsi</th>
									    </tr>
							 		</thead>
								    <tbody>	    	
								    	<?php if(empty($request)){
								    		echo "Tidak ada user yang ditampilkan";
								    	} else{
								    	foreach($request as $req){?>
								      <tr>
								      	<td class="col-md-2">
								      		<img src="<?php echo URL.$req->alamatFoto ?>" alt="Image" class="img-responsive" style="height: 100px;">
								      	</td>
								        <td class="col-md-2">
											
											<?php echo $req->namaInstansi; ?>
										</td>
										<td class="col-md-1">
											
											<?php echo $req->jenisInstansi; ?>
										</td>
										<td class="col-md-2">
											
											<?php echo $req->alamatInstansi; ?>
										</td>
										<td class="col-md-2">
											
											<?php echo $req->statusRequest; ?>
										</td>
										<td class="col-md-2">
											
											<?php echo $req->namaUser; ?>
										</td>
										<td class="col-md-1">
											<form class="form-horizontal" role="form" action="<?php echo URL; ?>admin/terimauserreq" method="post" enctype="multipart/form-data">
												<input type="hidden" class="form-control" name="idUserTerima" value="<?php echo $req->idInstansi ?>">
												<button class=" btn btn-default btn-xs" type="submit" name="terimauserreq_click" value="Terima" onClick="return confirm('Setujui Request?')">Terima</button>
											</form>
											<form class="form-horizontal" role="form" action="<?php echo URL; ?>admin/hapususerreq" method="post" enctype="multipart/form-data">
												<input type="hidden" class="form-control" name="idUserHapus" value="<?php echo $req->idInstansi ?>">
												<button class=" btn btn-default btn-xs" type="submit" name="hapususerreq_click" value="Hapus" onClick="return confirm('Request akan dihapus secara permanen. Yakin untuk menghapus request?')">Hapus</button>
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