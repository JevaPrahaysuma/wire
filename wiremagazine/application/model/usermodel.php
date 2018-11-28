<?php

class Usermodel
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all songs from database
     */

    public function getAllUser(){
        $sql = "SELECT idUser, namaUser, NIM, password, status, tanggalLahir, tanggalGabung, alamatFoto FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function register_user($nama, $nim, $password, $tanggalLahir, $alamatFoto){
        
        $sql = "INSERT INTO user (namaUser, NIM, password, status, tanggalLahir, tanggalGabung, alamatFoto) VALUES (:namaUser, :NIM, :password, :status, :tanggalLahir, :tanggalGabung, :alamatFoto)";
        
        $encrypt = md5($password);
        $status = "Standard User";
        $tanggalGabung = date("Y/m/d");

        $query = $this->db->prepare($sql);
        $parameters = array(':namaUser' => $nama, ':NIM' => $nim, ':password' => $encrypt, 'status' => $status, ':tanggalLahir' => $tanggalLahir, ':tanggalGabung' => $tanggalGabung, ':alamatFoto' => $alamatFoto);

        $query->execute($parameters);
    }


    public function update_user($idUser, $nama, $password, $tanggalLahir, $alamatFoto){
        
        if (is_null($alamatFoto)) {
            $sql = "UPDATE user SET namaUser = :namaUser, password = :password, tanggalLahir = :tanggalLahir WHERE idUser = :idUser";

            $query = $this->db->prepare($sql);
            $parameters = array(':namaUser' => $nama, ':password' => $password, ':tanggalLahir' => $tanggalLahir, ':idUser' => $idUser);
            $query->execute($parameters);

        } else{
            $sql = "UPDATE user SET namaUser = :namaUser, password = :password, tanggalLahir = :tanggalLahir, alamatFoto = :alamatFoto WHERE idUser = :idUser";

            $query = $this->db->prepare($sql);
            $parameters = array(':namaUser' => $nama, ':password' => $password, ':tanggalLahir' => $tanggalLahir, ':alamatFoto' => $alamatFoto, ':idUser' => $idUser);
            $query->execute($parameters); 
              
        }
    }
    public function cekupgradeuser($idUser){
        $sql = "SELECT idUser FROM request WHERE idUser = :idUser";

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser);

        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function requpgradeuser($idUser, $jabatanUser, $namaInstansi, $jenisInstansi, $alamatInstansi, $alamatFoto){
        $sql = "INSERT INTO request (idUser, jabatanUser, namaInstansi, jenisInstansi, alamatInstansi, alamatFoto, statusRequest) VALUES (:idUser, :jabatanUser, :namaInstansi, :jenisInstansi, :alamatInstansi, :alamatFoto, :statusRequest)";
        
        $status = "Menunggu";

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser, ':jabatanUser' => $jabatanUser, ':namaInstansi' => $namaInstansi, ':jenisInstansi' => $jenisInstansi, ':alamatInstansi' => $alamatInstansi, ':alamatFoto' => $alamatFoto, ':statusRequest' => $status );

        $query->execute($parameters);
    }

    public function getUserinfo($idUser){
        $sql = "SELECT namaUser, NIM, password, status, tanggalLahir, tanggalGabung, alamatFoto FROM user WHERE idUser = :idUser";

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser);

        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getUserInstance($idUser){
        $sql = "SELECT namaInstansi, jenisInstansi, alamatInstansi, jabatanUser FROM instansi WHERE idUser = :idUser";

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser);

        $query->execute($parameters);

        return $query->fetchAll();
    }

}
