	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">

				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-12 cp-r animate-box">
						<div class="col-lg-12 animate-box">
							<h3 class="heading">Post yang pernah anda buat</h3>
							 <table class="table table-hover" style="margin-top: 20px;">
								    <tbody>	    	
								    	<?php if(empty($posts)){
								    		echo "Anda belum memiliki post";
								    	} else{
								    	foreach($posts as $post){?>
								      <tr>
								      	<td class="col-md-2">
								      		<img src="<?php echo URL.$post->alamatFoto ?>" alt="Image" class="img-responsive" style="height: 150px;">
								      	</td>
								        <td class="col-md-5">
											
											<?php echo $post->judulPost; ?>
											<br>
											<span class="fh5co-meta animate-box" style="color: orange;"><?php echo $post->jenisPost?></span>

											<p style="font-size: 15px"><?php 
											$teks = $post->isiPost;
											$tampil = substr($teks, 0, 150);
											echo $tampil." ...";?><a href="<?php echo URL.'posts/index/'.$post->idPost ?>">Lanjutkan</a></p>
										</td>
										<td class="col-md-2">
											<span class="fh5co-meta fh5co-date animate-box"><?php echo $post->tanggalPost ?></span>		
										</td>
										<td class="col-md-2">
											<?php $warna = "black"; 
											if ($post->statusPost == "Valid") {
												$warna = "green";
											} else if($post->statusPost == "Tidak Valid"){
												$warna = "red";
											} else{
												$warna = "black";
											}?>

											<p style="color: <?php echo $warna?>"> <?php echo $post->statusPost ?></p>
										</td>
										<td class="col-md-1">
											<form class="form-horizontal" role="form" action="<?php echo URL; ?>posts/editpost" method="post" enctype="multipart/form-data">
												<input type="hidden" class="form-control" name="idPostEdit" value="<?php echo $post->idPost?>">
												<input type="hidden" class="form-control" name="idUserEdit" value="<?php echo $_SESSION['idUser']?>">		
												<button class=" btn btn-default btn-xs" type="submit" name="editpost_click" value="Komentar" onClick="return confirm('Edit post ini?')">Edit</button>
											</form>
											<form class="form-horizontal" role="form" action="<?php echo URL; ?>posts/hapuspost" method="post" enctype="multipart/form-data">

												<input type="hidden" class="form-control" name="idPostHapus" value="<?php echo $post->idPost?>">
												<input type="hidden" class="form-control" name="idUserHapus" value="<?php echo $_SESSION['idUser']?>">		
												<button class=" btn btn-default btn-xs" type="submit" name="hapuspost_click" value="Hapus" onClick="return confirm('Post akan dihapus secara permanen. Yakin untuk menghapus post?')">Hapus</button>
											</form>	
										</td>
								  
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