<div class="row">
      <div class="col-md-12">
      </div>
    </div>
    
    <div class="container">
 <br>
 <div class="container">
  <form class="form-horizontal" role="form" action="<?php echo URL; ?>login/register_user" method="post" enctype="multipart/form-data">

   <div class="form-group">
       <label class="col-xs-4 col-sm-4">Nama User : </label>
     <label class="col-md-4">
      <input type="text" name="namauser" class="form-control" placeholder="Masukkan Nama Anda" required >
      </label>
   </div>

   <div class="form-group">
       <label class="col-xs-4 col-sm-4">NIM User : </label>
     <label class="col-md-4">
      <input type="text" name="nimuser" class="form-control" placeholder="Masukkan NIM Anda" required >
      </label>
   </div>

   <div class="form-group">
       <label class="col-xs-4 col-sm-4">Password User : </label>
     <label class="col-md-4">
      <input type="text" name="passworduser" class="form-control" placeholder="Masukkan Password Anda" required >
      </label>
   </div>

    <div class="form-group">
        <label class="col-xs-4 col-sm-4">Tanggal Lahir : </label>
      <label class="col-md-4">
       <input type="date" name="tanggallahir" class="form-control" placeholder="Masukkan Tanggal" required >
       </label>
    </div>

   <div class="form-group">
       <label class="col-xs-4 col-sm-4">Foto Profil : </label>
    <center>
     <img class="col-xs-12 col-sm-4 col-md-4" src="<?php echo URL; ?>images/drop.png" alt="" role="button" id="uploadPreview"></img>
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
    <p class="help-block">Ukuran Foto Maksimal 500 KB</p>
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
     <button class=" btn btn-default" type="submit" name="daftar_click" value="Daftar"
      onClick="return confirm('Apakah anda yakin untuk mendaftar?')">Daftar</button>
    </center>

    </div>

        </div>
   </form>
  </div>