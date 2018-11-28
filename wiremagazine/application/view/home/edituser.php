<div class="row">
      <div class="col-md-12">
      </div>
    </div>
<div class="container">
      <div class="panel panel-success">
       <div class="panel-heading">
      <h3 class="panel-title ">Hanya beberapa informasi yang bisa diubah </h3>
       </div>
 <br>
 <div class="container">
 <?php foreach ($userlog as $user) {?>
  <form class="form-horizontal" role="form" action="<?php echo URL; ?>user/edit_user" method="post" enctype="multipart/form-data">

   <div class="form-group">
       <label class="col-xs-4 col-sm-4">Nama User : </label>
     <label class="col-md-4">
      <input type="text" name="namauser" class="form-control" placeholder="Masukkan Nama Anda" value="<?php echo $user->namaUser?>" required >
      </label>
   </div>

   <div class="form-group">
       <label class="col-xs-4 col-sm-4">Password User : </label>
     <label class="col-md-4">
      <input type="text" name="passworduser" class="form-control" placeholder="Kosongkan bila tidak ada perubahan">
      </label>
   </div>

    <div class="form-group">
        <label class="col-xs-4 col-sm-4">Tanggal Lahir : </label>
      <label class="col-md-4">
       <input type="date" name="tanggallahir" class="form-control" placeholder="Masukkan Tanggal" value="<?php echo $user->tanggalLahir?>" required >
       </label>
    </div>

   <div class="form-group">
       <label class="col-xs-4 col-sm-4">Foto Profil : </label>
    <center>
     <img class="col-xs-12 col-sm-4 col-md-4" src="<?php echo URL.$user->alamatFoto ?>" alt="" role="button" id="uploadPreview"></img>
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
    <p class="help-block">Kosongkan foto apabila tidak ada perubahan</p>
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
    <?php } ?>
    <center>
     <button class=" btn btn-default" type="submit" name="edit_click" value="Perbarui"
      onClick="return confirm('Apakah anda yakin untuk memperbarui?')">Perbarui</button>
    </center>
   </form>
  </div>
<div class="container" style="padding-bottom: 50px;">
  </div>
  </div>