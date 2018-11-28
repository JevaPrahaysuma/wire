<?php

class Posts extends Controller
{
    public function index($idPost)
    {
        session_start();
        if (isset($idPost)) {
            $posts = $this->postmodel->getPost($idPost);
            $maxpost = $this->postmodel->getMaxPost();

            if (isset($_SESSION["idUser"]) && isset($_SESSION["status"])){
                $userlog = $this->usermodel->getUserInfo($_SESSION["idUser"]);
                $_SESSION["userlog"] = $userlog;
               if ($_SESSION["status"] == "Standard User") {

                    require APP . 'view/_templates/header_user.php';
                    require APP . 'view/_templates/kanvas_standard.php';
                    require APP . 'view/posts/index.php';
                    require APP . 'view/_templates/footer_user.php';
               } else
               {
                    $instancelog = $this->usermodel->getUserInstance($_SESSION["idUser"]);

                    require APP . 'view/_templates/header_user.php';
                    require APP . 'view/_templates/kanvas_trusted.php';
                    require APP . 'view/posts/index_trusted.php';
                    require APP . 'view/_templates/footer_user.php';
               }
            } else 
            {
                
                    require APP . 'view/_templates/header_user.php';
                    require APP . 'view/_templates/kanvas_nonlogin.php';
                    require APP . 'view/posts/index_nonlogin.php';
                    require APP . 'view/_templates/footer_user.php';
            } 
        }
        else{
            echo'<script>window.location="'.URL.'home/index";</script>';
        }
        }

    public function buatpost(){
        session_start();
        if (isset($_SESSION["idUser"]) && isset($_SESSION["status"])){
            $userlog = $this->usermodel->getUserInfo($_SESSION["idUser"]);
            $_SESSION["userlog"] = $userlog;
           if ($_SESSION["status"] == "Standard User") {
            echo'<script>window.location="'.URL.'home/index";</script>';
                
           } else
           {
                $instancelog = $this->usermodel->getUserInstance($_SESSION["idUser"]);

                require APP . 'view/_templates/header_user.php';
                require APP . 'view/_templates/kanvas_trusted.php';
                require APP . 'view/posts/buatpost.php';
                require APP . 'view/_templates/footer_user.php';
           }
        } else 
        {
            echo'<script>window.location="'.URL.'home/index";</script>';
        }
    }

    public function editpost(){
        session_start();
        if (isset($_SESSION["idUser"]) && isset($_SESSION["status"])){
            $userlog = $this->usermodel->getUserInfo($_SESSION["idUser"]);
            $_SESSION["userlog"] = $userlog;
           if ($_SESSION["status"] == "Standard User") {
            echo'<script>window.location="'.URL.'home/index";</script>';
                
           } else
           {
                if (!isset($_POST["editpost_click"])) {
                    echo'<script>window.location="'.URL.'home/index";</script>';
                } else
                {
                    if (!isset($_POST["idPostEdit"])) {
                    echo'<script>window.location="'.URL.'home/index";</script>';
                    } else
                    {

                    $instancelog = $this->usermodel->getUserInstance($_SESSION["idUser"]);
                    $posts = $this->postmodel->getPost($_POST["idPostEdit"]);

                    require APP . 'view/_templates/header_user.php';
                    require APP . 'view/_templates/kanvas_trusted.php';
                    require APP . 'view/posts/editpost.php';
                    require APP . 'view/_templates/footer_user.php';
                    }
            }
           }
        } else 
        {
            echo'<script>window.location="'.URL.'home/index";</script>';
        }
    }

    public function submiteditpost(){
        try {
            if (isset($_POST["submiteditpost_click"])) {
            session_start();
            $newdir = $_POST["newdir"];
            if (!empty($_FILES["fileToUpload"]["name"])) {
                    $target_dir = "images/post/";
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
                        $message = "Maaf, foto anda tidak terupload";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    // if everything is ok, try to upload file
                    } else {
                        $newfilename = round(microtime(true)) . '.' . $imageFileType;
                        $newdir = $target_dir.$newfilename;


                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newdir)) {
                            $message = "Post anda berhasil diperbarui";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        } else {
                            $message = "Maaf, perubahan foto anda tidak tersimpan. Anda akan tetap menggunakan foto lama anda";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                    }
            }   

                $users = $this->postmodel->update_post($_POST["idPost"], $_POST["judulpost"], $_POST["jenispost"], $_POST["isipost"], $_POST["tanggalpost"], $newdir);
            
                echo'<script>window.location="'.URL.'home/index";</script>';
        }
        } catch (Exception $e) {
            $message = "Terjadi kesalahan pada pembuatan post anda, silahkan ulangi kembali";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo'<script>window.location="'.URL.'home/index";</script>';
        }
    }

    public function editkomentar(){
        session_start();
        if (isset($_SESSION["idUser"]) && isset($_SESSION["status"])){
            if($_SESSION["idUser"] == $_POST["idUser"]){
                $idUser = $_POST["idUser"];
                $idPost = $_POST["idPost"];
                $judulPost = $_POST["judulPost"];
                $idKomentar = $_POST["idKomentar"];
                $isiKomentar = $_POST["isiKomentar"];

               if ($_SESSION["status"] == "Standard User") {
                    require APP . 'view/_templates/header_user.php';
                    require APP . 'view/_templates/kanvas_standard.php';
                    require APP . 'view/posts/editkomentar.php';
                    require APP . 'view/_templates/footer_user.php';
               } else
               {
                    require APP . 'view/_templates/header_user.php';
                    require APP . 'view/_templates/kanvas_trusted.php';
                    require APP . 'view/posts/editkomentar.php';
                    require APP . 'view/_templates/footer_user.php';
               }  
            } else
            {
                echo'<script>window.location="'.URL.'home/index";</script>';
            }               
            } else 
            {
                echo'<script>window.location="'.URL.'home/index";</script>';
            }
    }
    public function kirimeditkomentar(){
        if (isset($_POST["editkomentar_click"])) {
            $komentar = $this->postmodel->updateComment($_POST["idPost"], $_POST["idKomentar"], $_POST["idUser"], $_POST["isiKomentar"]);
         
            header('location: ' . URL . 'posts/index/'.$_POST["idPost"]);
        }
    }
    public function hapuskomentar(){
        if (isset($_POST["hapuskomentar_click"])) {
            $hapuskomentar = $this->postmodel->deleteComment($_POST["idPost"], $_POST["idKomentar"], $_POST["idUser"]);
         
            header('location: ' . URL . 'posts/index/'.$_POST["idPost"]);
        }
    }

    public function hapuspost(){
        if (isset($_POST["hapuspost_click"])) {
            $hapuspost = $this->postmodel->deletePost($_POST["idPostHapus"], $_POST["idUserHapus"]);
            header('location: ' . URL . 'posts/lihatpost');
        }
    }

    public function submit_post(){
        try {
            if (isset($_POST["submit_click"])) {
            
            session_start();

            $target_dir = "images/post/";
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

                $newfilename = round(microtime(true)) . '.' . $imageFileType;
                $newdir = $target_dir.$newfilename;


                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newdir)) {
                    $message = "Post anda berhasil dibuat, silahkan tunggu validasi dari admin sebelum ditampilkan ke list";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    echo'<script>window.location="'.URL.'home/index";</script>';
                } else {
                    $message = "Maaf, terjadi kesalahan dalam upload foto anda";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }

            $users = $this->postmodel->submit_post($_POST["judulpost"], $_POST["isipost"], $newdir, $_SESSION["idUser"], $_POST["tanggalpost"], $_POST["jenispost"]); 
            }
        
        } catch (Exception $e) {
            $message = "Terjadi kesalahan pada pembuatan post anda, silahkan ulangi kembali";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo'<script>window.location="'.URL.'home/index";</script>';
        }
    }
    
    public function komentaripost(){
        session_start();
        if (isset($_POST["komentar_click"])) {
            $komentar = $this->postmodel->sendcomment($_SESSION["idUser"], $_POST["idPost"], $_POST["isiKomentar"]);
         
            header('location: ' . URL . 'posts/index/'.$_POST["idPost"]);
        }
    }

    
    public function lihatpost(){
        session_start();

        $posts = $this->postmodel->getAllMyPost($_SESSION["idUser"]);
        if (isset($_SESSION["idUser"]) && isset($_SESSION["status"])){
            $userlog = $this->usermodel->getUserInfo($_SESSION["idUser"]);
            $maxpost = $this->postmodel->getMaxPost();
            $_SESSION["userlog"] = $userlog;
           if ($_SESSION["status"] == "Standard User") {
            echo'<script>window.location="'.URL.'home/index";</script>';
           } else
           {
                $instancelog = $this->usermodel->getUserInstance($_SESSION["idUser"]);

                require APP . 'view/_templates/header_user.php';
                require APP . 'view/_templates/kanvas_trusted.php';
                require APP . 'view/posts/lihatpost.php';
                require APP . 'view/_templates/footer_user.php';
           }
        } else 
        {
            echo'<script>window.location="'.URL.'home/index";</script>';
        }
    }

}
