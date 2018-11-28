<?php
class Login extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        session_start();
            if(isset($_SESSION["adminview"])){
                unset($_SESSION["adminview"]);
            }
            require APP . 'view/_templates/header_user.php';
            require APP . 'view/_templates/kanvas_nonlogin.php';
            require APP . 'view/login/index.php';
            require APP . 'view/_templates/footer_user.php';
    }

    public function register()
    {
        require APP . 'view/_templates/header_user.php';
            require APP . 'view/_templates/kanvas_nonlogin.php';
            require APP . 'view/login/register.php';
            require APP . 'view/_templates/footer_user.php';
    }

    public function login_user()
    {

        if (isset($_POST["login_click"])) {
            $users = $this->usermodel->getAllUser();
            $masuk = false;
            $idMasuk = null;
            $statusMasuk = null;
            $namaUser = null;

            foreach ($users as $user) {
                if ($user->NIM == $_POST["nim"] && $user->password == md5($_POST["password"])) {
                    $masuk = true;
                    $idMasuk = $user->idUser;
                    $statusMasuk = $user->status;
                    $namaUser = $user->namaUser;
                }   
            }

            if ($masuk && !is_null($idMasuk) && !is_null($statusMasuk) && !is_null($namaUser)) {
                session_start();
                $_SESSION["idUser"] = $idMasuk;
                $_SESSION["status"] = $statusMasuk;
                $_SESSION["namaUser"] = $namaUser;

                $message = "Login berhasil, selamat datang!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo'<script>window.location="'.URL.'home/index";</script>';
            } else{
                $message = "Kombinasi NIM dan password tidak ditemukan, silahkan coba lagi";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo'<script>window.location="'.URL.'login/index";</script>';
            }

        }
    }


    public function register_user(){
        try {
            if (isset($_POST["daftar_click"])) {
            
            $target_dir = "images/person/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
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
                    $users = $this->usermodel->register_user($_POST["namauser"],  $_POST["nimuser"], $_POST["passworduser"], $_POST["tanggallahir"], $newdir); 
                    $message = "Pendaftaran anda berhasil, silahkan melakukan login";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    echo'<script>window.location="'.URL.'home/index";</script>';

                } else {
                    $message = "Maaf, terjadi kesalahan dalam upload foto anda";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            } 
            }
        } catch (Exception $e) {
            $message = "Terjadi kesalahan pada proses pendaftaran anda, silahkan ulangi kembali";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo'<script>window.location="'.URL.'login/register";</script>';
        }
        
     
    }


    
    
   
}