<div class="row">
      <div class="col-md-12">
      </div>
    </div>

    <div class="container">
 <br>
 <div class="container">
  <form class="form-horizontal" role="form" action="<?php echo URL; ?>login/login_user" method="post" enctype="multipart/form-data">

   <div class="form-group">
       <label class="col-xs-4 col-sm-4"></label>
     <label class="col-md-4">
      <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" required >
      </label>
   </div>

    <div class="form-group">
        <label class="col-xs-4 col-sm-4"></label>
      <label class="col-md-4">
       <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required >
       </label>
    </div>
    <center><p>Atau masuk sebagai <a href="<?php echo URL; ?>admin/login">Administrator</a></p></center>

    <center>
     <button class=" btn btn-default" type="submit" name="login_click" value="Login">Login</button>
    </center>

    </div>
   </form>
  </div>