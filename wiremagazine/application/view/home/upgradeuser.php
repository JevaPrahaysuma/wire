<div class="row">
      <div class="col-md-12">
      </div>
    </div>
<div class="container">
      <div class="panel panel-success">
       <div class="panel-heading">
      <h3 class="panel-title ">Upgrade akun anda dengan mendaftarkan instansi!</h3>
       </div>
 <br>
 <div class="container">
  <form class="form-horizontal" role="form" action="<?php echo URL; ?>home/submitupgradeuser" method="post" enctype="multipart/form-data">

   <div class="form-group">
       <label class="col-xs-3 col-sm-3">Nama Instansi : </label>
     <label class="col-md-6">
      <input type="text" name="namainstansi" class="form-control" placeholder="Masukkan Nama Instansi" required">
      </label>
   </div>


   <div class="form-group">
       <label class="col-xs-3 col-sm-3">Jenis Instansi : </label>
     <label class="col-md-6">
      <input type="text" name="jenisinstansi" class="form-control" placeholder="Masukkan Jenis Instansi" required">
      </label>
   </div>

   <div class="form-group">
       <label class="col-xs-3 col-sm-3">Alamat Instansi : </label>
     <label class="col-md-6">
      <input type="text" name="alamatinstansi" class="form-control" placeholder="Masukkan Alamat Instansi" required">
      </label>
   </div>

   <div class="form-group">
       <label class="col-xs-3 col-sm-3">Nama User : </label>
     <label class="col-md-6">
      <input type="text" name="namauser" class="form-control" placeholder="Masukkan Nama User" value="<?php echo $_SESSION["namaUser"]?>" required disabled ">
      </label>
   </div>

   <div class="form-group">
       <label class="col-xs-3 col-sm-3">Jabatan User : </label>
     <label class="col-md-6">
      <input type="text" name="jabatanuser" class="form-control" placeholder="Masukkan Judul User" required">
      </label>
   </div>

   <div class="form-group">
       <label class="col-xs-3 col-sm-3">Gambar Post : </label>
    <center>
     <img class="col-xs-12 col-sm-6 col-md-6" src="<?php echo URL; ?>images/drop.png" alt="" role="button" id="uploadPreview"></img>
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
     <button class=" btn btn-default" type="submit" name="upgrade_click" value="Submit"
      onClick="return confirm('Apakah semua informasi yang anda isikan sudah tepat?')">Ajukan Upgrade</button>
    </center>
   </form>
  </div>
<div class="container" style="padding-bottom: 50px;">
  </div>
  </div>