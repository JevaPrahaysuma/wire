<?php

class Home extends Controller
{

    public function index()
    {
        // load views
        session_start();

        if(isset($_SESSION["adminview"])){
                unset($_SESSION["adminview"]);
        }

        if(isset($_POST["key"])){
            $posts = $this->postmodel->searchPost($_POST["key"]);
            $sort = "- Pencarian keyword '".$_POST["key"]."'";
        }
        else{
            $posts = $this->postmodel->getAllPost();
        }


        
        if (isset($_SESSION["idUser"]) && isset($_SESSION["status"])){
            $userlog = $this->usermodel->getUserInfo($_SESSION["idUser"]);
            $maxpost = $this->postmodel->getMaxPost();
            $_SESSION["userlog"] = $userlog;
           if ($_SESSION["status"] == "Standard User") {

                require APP . 'view/_templates/header_user.php';
                require APP . 'view/_templates/kanvas_standard.php';
                require APP . 'view/home/index.php';
                require APP . 'view/_templates/footer_user.php';
           } else
           {
                $instancelog = $this->usermodel->getUserInstance($_SESSION["idUser"]);

                require APP . 'view/_templates/header_user.php';
                require APP . 'view/_templates/kanvas_trusted.php';
                require APP . 'view/home/index.php';
                require APP . 'view/_templates/footer_user.php';
           }
        } else 
        {
            require APP . 'view/_templates/header_user.php';
            require APP . 'view/_templates/kanvas_nonlogin.php';
            require APP . 'view/home/index.php';
            require APP . 'view/_templates/footer_user.php';
        }


    }

    public function edituser(){
        session_start();
        if (isset($_SESSION["idUser"]) && isset($_SESSION["status"])){
            $userlog = $this->usermodel->getUserInfo($_SESSION["idUser"]);
           if ($_SESSION["status"] == "Standard User") {

                require APP . 'view/_templates/header_user.php';
                require APP . 'view/_templates/kanvas_standard.php';
                require APP . 'view/home/edituser.php';
                require APP . 'view/_templates/footer_user.php';
           } else
           {
                $instancelog = $this->usermodel->getUserInstance($_SESSION["idUser"]);

                require APP . 'view/_templates/header_user.php';
                require APP . 'view/_templates/kanvas_trusted.php';
                require APP . 'view/home/edituser.php';
                require APP . 'view/_templates/footer_user.php';
           }
        } else 
        {
            //header('location: ' . URL . 'home/index');
            echo'<script>window.location="'.URL.'home/index";</script>';
        }
    }

    public function upgradeuser(){
        session_start();
        if (isset($_SESSION["idUser"]) && isset($_SESSION["status"])){
            $userlog = $this->usermodel->getUserInfo($_SESSION["idUser"]);
           if ($_SESSION["status"] == "Standard User") {

                require APP . 'view/_templates/header_user.php';
                require APP . 'view/_templates/kanvas_standard.php';
                require APP . 'view/home/upgradeuser.php';
                require APP . 'view/_templates/footer_user.php';
           } else
           {
            //header('location: ' . URL . 'home/index');
            echo'<script>window.location="'.URL.'home/index";</script>';
           }
        } else 
        {
            //header('location: ' . URL . 'home/index');
            echo'<script>window.location="'.URL.'home/index";</script>';
        }
    }

    public function submitupgradeuser(){
        try {
            if (isset($_POST["upgrade_click"])) {
            
            session_start();

            $target_dir = "images/instance/";
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
            if ($_FILES["fileToUpload"]["size"] > 1000000) {
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
                $message = "Maaf, post anda tidak dibuat, silahkan membuat ulang post anda";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo'<script>window.location="'.URL.'home/index";</script>';

            // if everything is ok, try to upload file
            } else {
                $cek = $this->usermodel->cekupgradeuser($_SESSION["idUser"]);

                if (!empty($cek)) {
                    $message = "Anda sudah pernah melakukan pengajuan. Pengajuan upgrade hanya dapat dilakukan sekali dalam satu periode. Silahkan menunggu hasil validasi dari Administrator.";  
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
                else{
                    $newfilename = round(microtime(true)) . '.' . $imageFileType;
                    $newdir = $target_dir.$newfilename;

                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newdir)) {
                        $message = "Upgrade akun anda berhasil dilakukan, silahkan tunggu validasi dari admin.";  
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        $users = $this->usermodel->requpgradeuser($_SESSION["idUser"], $_POST["jabatanuser"], $_POST["namainstansi"], $_POST["jenisinstansi"], $_POST["alamatinstansi"], $newdir); 
                        echo'<script>window.location="'.URL.'home/index";</script>';
                    } else {
                        $message = "Maaf, terjadi kesalahan dalam upload foto anda";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                }
                }
            }

            
            }
        
        } catch (Exception $e) {
            $message = "Terjadi kesalahan pada pengajuan upgrade anda, silahkan ulangi kembali";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo'<script>window.location="'.URL.'home/upgradeuser";</script>';
        }
    }

}
