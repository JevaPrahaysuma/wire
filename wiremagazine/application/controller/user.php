<?php

class User extends Controller
{
    public function edit_user(){
    	try {
    		session_start();
    		$userlog = $_SESSION["userlog"];
    		foreach ($userlog as $user) {

            if (isset($_POST["edit_click"])) {
            	if (empty($_POST["passworduser"]))
            	{
            		$_POST["passworduser"] = $user->password;
            	} else{
            		$newpass = md5($_POST["passworduser"]);
            		$_POST["passworduser"] = $newpass;
            	}
            	$newdir = $user->alamatFoto;
            	if (!empty($_FILES["fileToUpload"]["name"])) {
            		$target_dir = "images/person/";
		            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		            $uploadOk = 1;
		            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		            // Check if image file is a actual image or fake image
		            if(isset($_POST["submit"])) {
		                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		                if($check != false) {
		                    $uploadOk = 1;
		                } else {
		                    $message = "Maaf, file anda bukan gambar";
		                    echo "<script type='text/javascript'>alert('$message');</script>";
		                    $uploadOk = 0;
		                }
		            }
		            // Check file size
		            if ($_FILES["fileToUpload"]["size"] > 500000) {
		                $message = "Maaf, ukuran foto anda terlalu besar";
		                echo "<script type='text/javascript'>alert('$message');</script>";
		                $uploadOk = 0;
		            }
		            // Allow certain file formats
		            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		                $message = "Sorry, only JPG, JPEG & PNG files are allowed.";
		                echo "<script type='text/javascript'>alert('$message');</script>";
		                $uploadOk = 0;
		            }
		            // Check if $uploadOk is set to 0 by an error

		            if ($uploadOk == 0) {
		                $message = "Maaf, foto anda tidak terupload";
		                echo "<script type='text/javascript'>alert('$message');</script>";
		            // if everything is ok, try to upload file
		            } else {

		                $newfilename = round(microtime(true)) . '.' . $imageFileType;
		                $newdir = $target_dir.$newfilename;


		                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newdir)) {
		                	$message = "Maaf, perubahan pada profil anda berhasil dilakukan";
		                    echo "<script type='text/javascript'>alert('$message');</script>";
		                } else {
		                    $message = "Maaf, perubahan foto anda tidak tersimpan. Anda akan tetap menggunakan foto lama anda";
		                    echo "<script type='text/javascript'>alert('$message');</script>";
		                }
		            }
		            }
		            $id = $_SESSION["idUser"];
		            $users = $this->usermodel->update_user($id, $_POST["namauser"], $_POST["passworduser"], $_POST["tanggallahir"], $newdir); 
		        
		            echo'<script>window.location="'.URL.'home/index";</script>';
            	}
            }
        }
      	catch (Exception $e) {
            $message = "Terjadi kesalahan pada proses pendaftaran anda, silahkan ulangi kembali";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo'<script>window.location="'.URL.'home/edituser";</script>';
        }
    }

    public function hapususer(){
    	if (isset($_POST["hapususer_click"])) {
            $hapuspost = $this->adminmodel->deleteUser($_POST["idUserHapus"]);
            header('location: ' . URL . 'admin/viewalluser');
        }
    }
}