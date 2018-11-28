<div class="row">
      <div class="col-md-12">
      </div>
    </div>
<div class="container">
      <div class="panel panel-success">
       <div class="panel-heading">
      <h3 class="panel-title ">Koreksi post anda untuk hasil maksimal!</h3>
       </div>
 <br>
 <div class="container">
  <form class="form-horizontal" role="form" action="<?php echo URL; ?>posts/submiteditpost" method="post" enctype="multipart/form-data">

   <div class="form-group">
       <label class="col-xs-3 col-sm-3">Judul Post : </label>
     <label class="col-md-6">
      <input type="text" name="judulpost" class="form-control" placeholder="Masukkan Judul Post" value="<?php echo $posts->judulPost?>" required">
      </label>
   </div>

   <div class="form-group">
       <label class="col-xs-3 col-sm-3">Jenis Post : </label>
     <label class="col-md-6">
      <input type="text" name="jenispost" class="form-control" placeholder="Masukkan Jenis Post" value="<?php echo $posts->jenisPost?>" required">
      </label>
   </div>

   <div class="form-group">
       <label class="col-xs-3 col-sm-3">Gambar Post : </label>
    <center>
     <img class="col-xs-12 col-sm-6 col-md-6" src="<?php echo URL.$posts->alamatFoto;  ?>" alt="" role="button" id="uploadPreview"></img>
   </center>
   </div>

   <center>
   <div class="form-group">
     <label class="col-xs-2 col-sm-1 col-md-0"> </label>
       <div>
         <input class="col-sm-0" id="fileToUpload" type="file" name="fileToUpload" onchange="PreviewImage();"/>
       </div>
    </div>
  </center>

  <center>
    <p class="help-block">Ukuran Foto Maksimal 1 MB</p>
    </center>

   <div class="form-group">
       <label class="col-xs-3 col-sm-3">Isi Post:</label>
     <label class="col-md-6">
      <textarea name="isipost" class="form-control" cols="45" rows="10" placeholder="Berikan keterangan dari post anda" style="resize: none;"><?php echo $posts->isiPost?></textarea>
      </label>
   </div>
    
   <div class="form-group">
        <label class="col-xs-3 col-sm-3">Tanggal Dilaksanakan : </label>
      <label class="col-md-6">
       <input type="date" name="tanggalpost" class="form-control" placeholder="Masukkan Tanggal Agenda Dilaksanakan" value="<?php echo $posts->tanggalPost?>" required >
       </label>
    </div>

    <center>
    <p class="help-block">Post akan dihapus seminggu setelah agenda diselenggarakan</p>
    </center>

    <script type="text/javascript">
    function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("fileToUpload").files[0]);
    oFReader.onload = function (oFREvent)
     {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
    };
    </script>
    <center>
      <input type="hidden" class="form-control" name="idPost" value="<?php echo $_POST["idPostEdit"] ?>">
      <input type="hidden" class="form-control" name="newdir" value="<?php echo $posts->alamatFoto ?>">
     <button class=" btn btn-default" type="submit" name="submiteditpost_click" value="Submit"
      onClick="return confirm('Apakah semua informasi yang anda isikan sudah tepat?')">Edit Post</button>
    </center>
   </form>
  </div>
<div class="container" style="padding-bottom: 50px;">
  </div>
  </div>