	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">

				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-12 cp-r animate-box">
						<div class="col-lg-12 animate-box">

							 <table class="table table-hover" style="margin-top: 20px;">
								    <tbody>	    	
								    	<?php if(empty($posts)){
								    		echo "Tidak ada post yang ditampilkan";
								    	} else{
								    	foreach($posts as $post){?>
								      <tr>
								      	<td class="col-md-3">
								      		<img src="<?php echo URL.$post->alamatFoto ?>" alt="Image" class="img-responsive" style="height: 200px;">
								      	</td>
								        <td class="col-md-7">
											
											<?php echo $post->judulPost; ?>
											<br>
											<span class="fh5co-meta animate-box" style="color: orange;"><?php echo $post->jenisPost?></span>

											<p style="font-size: 15px"><?php 
											$teks = $post->isiPost;
											$tampil = substr($teks, 0, 300);
											echo $tampil." ...";?><a href="<?php echo URL.'posts/index/'.$post->idPost ?>">Lanjutkan</a></p>
										</td>
										<td class="col-md-2">
											<span class="fh5co-meta fh5co-date animate-box"><?php echo $post->tanggalPost ?></span>		
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