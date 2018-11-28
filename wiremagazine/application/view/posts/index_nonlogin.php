<a href="<?php echo URL; ?>posts/index/<?php if($idPost-1 != 0){echo $idPost-1;} else {echo $idPost;}?>" class="fh5co-post-prev"><span><i class="icon-chevron-left"></i> Prev</span></a>
	<a href="<?php echo URL; ?>posts/index/<?php if($idPost+1 != $maxpost+1){echo $idPost+1;} else {echo $idPost;}?>" class="fh5co-post-next"><span>Next <i class="icon-chevron-right"></i></span></a>
	<!-- END #fh5co-header -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<center>
				<figure class="animate-box">
					<img src="<?php echo URL.$posts->alamatFoto; ?>" alt="Image" class="img-responsive" style="height: 700px; width: 500px;">
				</figure>
				</center>
				<span class="fh5co-meta animate-box"><a href="1.html">Expo</a></span>
				<h2 class="fh5co-article-title animate-box"><a href="1.html"><?php echo $posts->judulPost; ?></a></h2>
				<span class="fh5co-meta fh5co-date animate-box"><?php echo $posts->tanggalPost; ?></span>
				
				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-12 cp-r animate-box">
						<p><?php echo nl2br($posts->isiPost)?></p>
						</div>
                        
                        
						
				</div>

			</article>

		</div>

	</div>