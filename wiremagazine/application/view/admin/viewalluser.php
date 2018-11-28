	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">

				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-12 cp-r animate-box">
						<div class="col-lg-12 animate-box">
							<h3 class="heading">Menampilkan semua user</h3>
							 <table class="table table-hover" style="margin-top: 20px;">
							 		<thead>
							 			<tr>
									        <th>Foto User</th>
									        <th>NIM</th>
									        <th>Nama User</th>
									        <th>Status</th>
									        <th>Tanggal Lahir</th>
									        <th>Tanggal Gabung</th>
									        <th>Opsi</th>
									    </tr>
							 		</thead>
								    <tbody>	    	
								    	<?php if(empty($users)){
								    		echo "Tidak ada user yang ditampilkan";
								    	} else{
								    	foreach($users as $user){?>
								      <tr>
								      	<td class="col-md-2">
								      		<img src="<?php echo URL.$user->alamatFoto ?>" alt="Image" class="img-responsive" style="height: 100px;">
								      	</td>
								        <td class="col-md-2">
											
											<?php echo $user->NIM; ?>
										</td>
										<td class="col-md-2">
											
											<?php echo $user->namaUser; ?>
										</td>
										<td class="col-md-1">
											
											<?php echo $user->status; ?>
										</td>
										<td class="col-md-2">
											
											<?php echo $user->tanggalLahir; ?>
										</td>
										<td class="col-md-3">
											
											<?php echo $user->tanggalGabung; ?>
										</td>
										<td class="col-md-1">
											<form class="form-horizontal" role="form" action="<?php echo URL; ?>user/hapususer" method="post" enctype="multipart/form-data">
												<input type="hidden" class="form-control" name="idUserHapus" value="<?php echo $user->idUser ?>">
												<button class=" btn btn-default btn-xs" type="submit" name="hapususer_click" value="Hapus" onClick="return confirm('User akan dihapus secara permanen. Yakin untuk menghapus user?')">Hapus</button>
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