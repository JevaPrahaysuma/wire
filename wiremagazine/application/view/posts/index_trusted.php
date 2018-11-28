<a href="<?php echo URL; ?>posts/index/<?php if($idPost-1 != 0){echo $idPost-1;} else {echo $idPost;}?>" class="fh5co-post-prev"><span><i class="icon-chevron-left"></i> Prev</span></a>
	<a href="<?php echo URL; ?>posts/index/<?php if($idPost+1 != $maxpost+1){echo $idPost+1;} else {echo $idPost;}?>" class="fh5co-post-next"><span>Next <i class="icon-chevron-right"></i></span></a>
	<!-- END #fh5co-header -->
	<?php foreach($userlog as $user){?>
	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<center>
				<figure class="animate-box">
					<img src="<?php echo URL.$posts->alamatFoto; ?>" alt="Image" class="img-responsive" style="height: 700px; width: 500px;">
				</figure>
				
				<span class="fh5co-meta animate-box"><a>Expo</a></span>
				<h2 class="fh5co-article-title animate-box"><a><?php echo $posts->judulPost; ?></a></h2>
				<span class="fh5co-meta fh5co-date animate-box"><?php echo $posts->tanggalPost; ?></span>		

					<div class="fh5co-meta fh5co-date animate-box">
					<?php if ($posts->idUser == $_SESSION["idUser"]) { ?>
						<form class="form-horizontal" role="form" action="<?php echo URL; ?>posts/editpost" method="post" enctype="multipart/form-data">
							<input type="hidden" class="form-control" name="idPostEdit" value="<?php echo $posts->idPost?>">
							<input type="hidden" class="form-control" name="idUserEdit" value="<?php echo $posts->idUser?>">		
							<button class=" btn btn-default btn-xs" type="submit" name="editpost_click" value="Komentar" onClick="return confirm('Edit post ini?')">Edit Post</button>
						</form>
					<?php }?>	
					</div>

				</center>
				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">

					<div class="row">
						<div class="col-lg-12 cp-r animate-box">
						
						<p><?php echo nl2br($posts->isiPost)?></p>
						</div>
                        
                        <div class="col-lg-12 animate-box">
							<form class="form-horizontal" role="form" action="<?php echo URL; ?>posts/komentaripost" method="post" enctype="multipart/form-data">

							<div class="form-group">
									<textarea name="isiKomentar" class="form-control" cols="5" rows="5" placeholder="Berikan komentar untuk post ini" style="resize: none;"></textarea>
									<input type="hidden" class="form-control" name="idPost" value="<?php echo $posts->idPost?>">
							</div>
											
							<button class=" btn btn-default" type="submit" name="komentar_click" value="Komentar"
									onClick="return confirm('Apakah anda yakin untuk mengomentari?')">Komentari</button>
							</form>	
						</div>
						<div class="col-lg-12 animate-box">
							<h3 class="heading">Comment Section</h3>
							
							 <table class="table table-hover" style="margin-top: 20px;">

								    <tbody>
								    	
								    	<?php if(empty($comments)){
								    		echo "Tidak ada komentar untuk post ini";
								    	} else{
								    	foreach($comments as $komen){?>
								      <tr>
								      	<td class="col-md-1">
								      		<img src="<?php echo URL.$komen->alamatFoto ?>" alt="Image" class="img-responsive" style="height: 50px; width: 50px;">
								      	</td>
								        <td class="col-md-2">
											<?php echo $komen->namaUser?>	
											<br>
											<p style="font-size: 11px;"> <?php echo $komen->status?> <br><?php echo $komen->tanggalKomentar?></p>
										</td>
								        <td class="col-md-8">
								        	<?php echo nl2br($komen->isiKomentar);?>
								    	</td>
								    	<td class="col-md-1">
								        	<?php if($komen->idUser == $_SESSION['idUser']){ ?>
								        		<form class="form-horizontal" role="form" action="<?php echo URL; ?>posts/editkomentar" method="post" enctype="multipart/form-data">

													<input type="hidden" class="form-control" name="idPost" value="<?php echo $posts->idPost?>">
													<input type="hidden" class="form-control" name="idUser" value="<?php echo $komen->idUser?>">
													<input type="hidden" class="form-control" name="judulPost" value="<?php echo $posts->judulPost?>">
													<input type="hidden" class="form-control" name="idKomentar" value="<?php echo $komen->idKomentar?>">
													<input type="hidden" class="form-control" name="isiKomentar" value="<?php echo $komen->isiKomentar?>">		
													<button class=" btn btn-default btn-xs" type="submit" name="komentar_click" value="Komentar" onClick="return confirm('Edit koment anda?')">Edit</button>
												</form>
												<form class="form-horizontal" role="form" action="<?php echo URL; ?>posts/hapuskomentar" method="post" enctype="multipart/form-data">

													<input type="hidden" class="form-control" name="idPost" value="<?php echo $posts->idPost?>">
													<input type="hidden" class="form-control" name="idUser" value="<?php echo $komen->idUser?>">
													<input type="hidden" class="form-control" name="idKomentar" value="<?php echo $komen->idKomentar?>">		
													<button class=" btn btn-default btn-xs" type="submit" name="hapuskomentar_click" value="Komentar" onClick="return confirm('Yakin untuk menghapus komentar?')">Hapus</button>
												</form>	
								        	<?php }?>
								    	</td>
								    	<?php }}?>

								    </tbody>
								  </table>
								  
								</div>
						</div>
						
				</div>

			</article>

		</div>

	</div>
	<?php }?>