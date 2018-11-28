<?php
 class Adminmodel{
 	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}

 	public function getAllAdmin(){
        $sql = "SELECT idAdmin, namaAdmin, username, password FROM admin";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
 	}

 	public function deleteUser($idUser){
 		$sql = "DELETE FROM user WHERE idUser = :idUser";

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser);

        $query->execute($parameters);
 	}

 	public function getAllPost(){
         $sql = "SELECT a.idPost, a.judulPost, a.isiPost, a.statusPost, a.tanggalKadaluarsa, a.jenisPost, a.tanggalPost, a.alamatFoto, b.namaUser FROM post a, user b WHERE a.idUser = b.idUser";
        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetchAll();        
    }

    public function deletePost($idPost){
        $sql = "DELETE FROM post WHERE idPost = :idPost";

        $query = $this->db->prepare($sql);
        $parameters = array(':idPost' => $idPost);

        $query->execute($parameters);
    }

    
    public function getAllPostRequest(){
    	$sql = "SELECT a.idPost, a.judulPost, a.isiPost, a.statusPost, a.tanggalKadaluarsa, a.jenisPost, a.tanggalPost, a.alamatFoto, b.namaUser FROM post a, user b WHERE a.idUser = b.idUser AND a.statusPost = 'Menunggu'";
        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetchAll();  
    }

    public function getAllUserRequest(){
    	$sql = "SELECT a.namaInstansi, a.jenisInstansi, a.idInstansi, a.alamatInstansi, a.alamatFoto, a.statusRequest, b.namaUser FROM request a, user b WHERE a.idUser = b.idUser ";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getInstansi($idInstansi){
    	$sql = "SELECT idInstansi, namaInstansi, jenisInstansi, jabatanUser, idUser, alamatInstansi, alamatFoto, statusRequest FROM request WHERE idInstansi = :idInstansi LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':idInstansi' => $idInstansi);
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function upgradeUserById($idUser){
    	$sql = "UPDATE user SET status = 'Trusted User' WHERE idUser = :idUser";

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser);

        $query->execute($parameters);
    }

    public function addInstansi($namaInstansi, $jenisInstansi, $idUser, $alamatInstansi, $jabatanUser){
    	$sql = "INSERT INTO instansi(namaInstansi, jenisInstansi, idUser, alamatInstansi, jabatanUser) VALUES(:namaInstansi, :jenisInstansi, :idUser, :alamatInstansi, :jabatanUser)";

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser, ':namaInstansi' => $namaInstansi, ':jenisInstansi' => $jenisInstansi, ':alamatInstansi' => $alamatInstansi, ':jabatanUser' => $jabatanUser);

        $query->execute($parameters);
    }

    public function hapususerreq($idReq){
    	$sql = "DELETE FROM request WHERE idInstansi = :idInstansi";

        $query = $this->db->prepare($sql);
        $parameters = array(':idInstansi' => $idReq);

        $query->execute($parameters);
    }

    public function terimapostreq($idPost){
    	$sql = "UPDATE post SET statusPost = 'Valid' WHERE idPost = :idPost";

        $query = $this->db->prepare($sql);
        $parameters = array(':idPost' => $idPost);

        $query->execute($parameters);
    }

    public function hapuspostreq($idPost){
    	$sql = "UPDATE post SET statusPost = 'Tidak Valid' WHERE idPost = :idPost";

        $query = $this->db->prepare($sql);
        $parameters = array(':idPost' => $idPost);

        $query->execute($parameters);
    }
 }
