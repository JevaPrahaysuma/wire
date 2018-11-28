 <div class="container-fluid">
 <div class="col-lg-12 animate-box">
	<form class="form-horizontal" role="form" action="<?php echo URL; ?>posts/kirimeditkomentar" method="post" enctype="multipart/form-data">

	<div class="container col-lg-3"></div>
	<div class="container col-lg-6">
		<h3 class="heading"><?php echo $judulPost ?></h3>
	<div class="form-group">
				
				<textarea name="isiKomentar" class="form-control" cols="" rows="5" placeholder="Berikan komentar untuk post ini" style="resize: none;"><?php echo $isiKomentar; ?></textarea>
				<input type="hidden" class="form-control" name="idPost" value="<?php echo $idPost?>">
				<input type="hidden" class="form-control" name="idKomentar" value="<?php echo $idKomentar?>">
				<input type="hidden" class="form-control" name="idUser" value="<?php echo $idUser?>">
			
	</div>
					
	<button class=" btn btn-default" type="submit" name="editkomentar_click" value="Edit Komentar"
			onClick="return confirm('Edit Komentar?')">Perbarui Komentar</button>
			</div>
	</form>	
</div>
</div>