<?php
class Admin extends Controller
{
	public function login()
    {
    	session_start();
    	$_SESSION["adminview"] = true;
        require APP . 'view/_templates/header_admin.php';
        require APP . 'view/admin/login.php';
        require APP . 'view/_templates/footer_admin.php';
    }

    public function index()
    {
    	session_start();
    	$_SESSION["adminview"] = true;
        require APP . 'view/_templates/header_admin.php';
        require APP . 'view/admin/index.php';
        require APP . 'view/_templates/footer_admin.php';
    }

    public function viewalluser()
    {
        session_start();
        $_SESSION["adminview"] = true;
        $users = $this->usermodel->getAllUser();
        require APP . 'view/_templates/header_admin.php';
        require APP . 'view/admin/viewalluser.php';
        require APP . 'view/_templates/footer_admin.php';
    }

    public function viewallpost()
    {
        session_start();
        $_SESSION["adminview"] = true;
        $posts = $this->adminmodel->getAllPost();
        require APP . 'view/_templates/header_admin.php';
        require APP . 'view/admin/viewallpost.php';
        require APP . 'view/_templates/footer_admin.php';
    }

    

    public function validatepost()
    {
        session_start();
        $_SESSION["adminview"] = true;
        $posts = $this->adminmodel->getAllPostRequest();
        require APP . 'view/_templates/header_admin.php';
        require APP . 'view/admin/validatepost.php';
        require APP . 'view/_templates/footer_admin.php';
    }

    public function validateuser()
    {
        session_start();
        $_SESSION["adminview"] = true;
        $request = $this->adminmodel->getAllUserRequest();
        require APP . 'view/_templates/header_admin.php';
        require APP . 'view/admin/validateuser.php';
        require APP . 'view/_templates/footer_admin.php';
    }


    public function login_admin(){
    	if (isset($_POST["login_click"])) {
            $admins = $this->adminmodel->getAllAdmin();
            $masuk = false;
            $idAdmin = null;
            $namaAdmin = null;

            foreach ($admins as $admin) {
                if ($admin->username == $_POST["username"] && $admin->password == md5($_POST["password"])) {
                    $masuk = true;
                    $idAdmin = $admin->idAdmin;
                    $namaAdmin = $admin->namaAdmin;
                }   
            }

            if ($masuk && !is_null($idAdmin) && !is_null($namaAdmin)) {
                session_start();
                $_SESSION["idAdmin"] = $idAdmin;
                $_SESSION["namaAdmin"] = $namaAdmin;

                $message = "Login berhasil, selamat datang!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo'<script>window.location="'.URL.'admin/index";</script>';
            } else{
                $message = "Kombinasi username dan password tidak ditemukan, silahkan coba lagi";
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo'<script>window.location="'.URL.'admin/login";</script>';
            }

        }
    }

    public function hapuspost(){
        if (isset($_POST["hapuspost_click"])) {
            $hapuspost = $this->adminmodel->deletePost($_POST["idPostHapus"]);
            header('location: ' . URL . 'admin/viewallpost');
        }
    }

   

    public function terimauserreq(){
        if (isset($_POST["terimauserreq_click"])) {
            $instansi = $this->adminmodel->getInstansi($_POST["idUserTerima"]);
            foreach ($instansi as $int) {
                $add = $this->adminmodel->addInstansi($int->namaInstansi, $int->jenisInstansi, $int->idUser, $int->alamatInstansi, $int->jabatanUser);
                $upgrade = $this->adminmodel->upgradeUserById($int->idUser);
                $del = $this->adminmodel->hapususerreq($_POST["idUserTerima"]);
            }
         
           header('location: ' . URL . 'admin/validateuser');
        }
    }

    public function hapususerreq(){
        if (isset($_POST["hapususerreq_click"])) {
            $hapusreq = $this->adminmodel->hapususerreq($_POST["idUserHapus"]);
         
            header('location: ' . URL . 'admin/validateuser');
        }
    }

    public function terimapostreq(){
        if (isset($_POST["terimapostreq_click"])) {
            $terimareq = $this->adminmodel->terimapostreq($_POST["idPostTerima"]);
         
            header('location: ' . URL . 'admin/validatepost');
        }
    }

    public function hapuspostreq(){
        if (isset($_POST["hapuspostreq_click"])) {
            $hapusreq = $this->adminmodel->hapuspostreq($_POST["idPostHapus"]);
         
            header('location: ' . URL . 'admin/validatepost');
        }
    }
}
?>