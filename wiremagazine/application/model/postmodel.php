<?php

class Postmodel
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

    public function getSortPost($condition){
        $query = null;
        if ($condition == "Paling baru") {
           $sql = "SELECT idPost, judulPost, isiPost, jenisPost, tanggalPost, alamatFoto FROM post WHERE statusPost = 'Valid' ORDER BY idPost DESC";
           $query = $this->db->prepare($sql);
           $query->execute();
           $query = $query->fetchAll();
        }  else if ($condition == "Alfabet") {
           $sql = "SELECT idPost, judulPost, isiPost, jenisPost, tanggalPost, alamatFoto FROM post WHERE statusPost = 'Valid' ORDER BY judulPost ASC";
           $query = $this->db->prepare($sql);
           $query->execute();
           $query = $query->fetchAll();
        } else if ($condition == "Paling ramai") {
           $sql = "SELECT a.idPost, a.judulPost, a.isiPost, a.jenisPost, a.tanggalPost, a.alamatFoto, COUNT(b.idKomentar) as Hitung FROM post a LEFT JOIN komentar b ON a.idPost = b.idPost WHERE statusPost = 'Valid' GROUP BY a.idPost, a.judulPost, a.isiPost, a.jenisPost, a.tanggalPost, a.alamatFoto ORDER BY Hitung DESC";
           $query = $this->db->prepare($sql);
           $query->execute();
           $query = $query->fetchAll();
       }
        

        return $query;        
    }


    public function searchPost($kunci){
        $sql = "SELECT idPost, judulPost, isiPost, jenisPost, tanggalPost, alamatFoto FROM post WHERE statusPost = 'Valid' AND judulPost LIKE '%$kunci%' ORDER BY judulPost ASC";
        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetchAll();        
    }

	public function submit_post($judulPost, $isiPost, $alamatFoto, $idUser, $tanggalPost, $jenisPost){
		$sql = "INSERT INTO post (judulPost, isiPost, statusPost, tanggalKadaluarsa, alamatFoto, idUser, tanggalPost, jenisPost) VALUES (:judulPost, :isiPost, :statusPost, :tanggalKadaluarsa, :alamatFoto, :idUser, :tanggalPost, :jenisPost)";
        
        $start_date = $tanggalPost;  
	    $date = strtotime($start_date);
	    $date = strtotime('+7 day', $date);
	    $nextweek = date('Y/m/d', $date);
        $tanggalkadaluarsa = $nextweek;
        $status = "Menunggu";
        $query = $this->db->prepare($sql);
        $parameters = array(':judulPost' => $judulPost, ':isiPost' => $isiPost, ':statusPost' => $status, ':tanggalKadaluarsa' => $tanggalkadaluarsa, ':alamatFoto' => $alamatFoto, ':idUser' => $idUser, ':tanggalPost' =>$tanggalPost, 'jenisPost' => $jenisPost);

        $query->execute($parameters);
	}

    public function update_post($idPost, $judulPost, $jenisPost, $isiPost, $tanggalPost, $alamatFoto){
        if (!is_null($alamatFoto)) {
            $sql = "UPDATE post SET judulPost = :judulPost, jenisPost = :jenisPost, isiPost = :isiPost, tanggalPost = :tanggalPost, alamatFoto = :alamatFoto, tanggalKadaluarsa = :tanggalKadaluarsa WHERE idPost = :idPost";
            
            $start_date = $tanggalPost;  
            $date = strtotime($start_date);
            $date = strtotime('+7 day', $date);
            $nextweek = date('Y/m/d', $date);
            $tanggalkadaluarsa = $nextweek;
            $query = $this->db->prepare($sql);
            $parameters = array(':judulPost' => $judulPost, ':jenisPost' => $jenisPost, ':isiPost' => $isiPost, ':tanggalPost' => $tanggalPost, ':alamatFoto' => $alamatFoto, ':tanggalKadaluarsa' => $tanggalkadaluarsa,':idPost' => $idPost);

            $query->execute($parameters);
        } else{
            $sql = "UPDATE posts SET judulPost = :judulPost, jenisPost = :jenisPost, isiPost = :isiPost, tanggalPost = :tanggalPost, tanggalKadaluarsa = :tanggalKadaluarsa WHERE idPost = :idPost";
        
            $start_date = $tanggalPost;  
            $date = strtotime($start_date);
            $date = strtotime('+7 day', $date);
            $nextweek = date('Y/m/d', $date);
            $tanggalkadaluarsa = $nextweek;
            $query = $this->db->prepare($sql);
            $parameters = array(':judulPost' => $judulPost, ':jenisPost' => $jenisPost, ':isiPost' => $isiPost, ':tanggalPost' => $tanggalPost,':tanggalKadaluarsa' => $tanggalkadaluarsa,':idPost' => $idPost);

             $query->execute($parameters);
        }
    }

    public function getPost($idPost){
        $sql = "SELECT idPost, idUser, judulPost, isiPost, statusPost, jenisPost, tanggalPost, tanggalKadaluarsa, alamatFoto FROM post WHERE idPost = :idPost LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':idPost' => $idPost);

        $query->execute($parameters);

        return $query->fetch();
    }

     public function getMaxPost()
    {
        $sql = "SELECT COUNT(idPost) AS total FROM post";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->total;
    }

    
    public function sendcomment($idUser, $idPost, $isiKomentar){
        $sql = "INSERT INTO komentar (idUser, idPost, tanggalKomentar, isiKomentar) VALUES (:idUser, :idPost, :tanggalKomentar, :isiKomentar)";

        $tanggalKomentar = date("Y/m/d h:i:sa");

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser, ':idPost' => $idPost, ':tanggalKomentar' => $tanggalKomentar, ':isiKomentar' => $isiKomentar);

        $query->execute($parameters);
    }

    public function updateComment($idPost, $idKomentar, $idUser, $isiKomentar){
        $sql = "UPDATE komentar SET isiKomentar = :isiKomentar WHERE idPost = :idPost AND idUser = :idUser AND idKomentar = :idKomentar";

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser, ':idPost' => $idPost, ':isiKomentar' => $isiKomentar, ':idKomentar' => $idKomentar);

        $query->execute($parameters);
    }

    public function deleteComment($idPost, $idKomentar, $idUser){
        $sql = "DELETE FROM komentar WHERE idPost = :idPost AND idUser = :idUser AND idKomentar = :idKomentar";

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser, ':idPost' => $idPost, ':idKomentar' => $idKomentar);

        $query->execute($parameters);
    }

    public function deletePost($idPost, $idUser){
        $sql = "DELETE FROM post WHERE idPost = :idPost AND idUser = :idUser";

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser, ':idPost' => $idPost);

        $query->execute($parameters);
    }

    public function getComment($idPost){
        $sql = "SELECT a.idKomentar, a.idUser, a.tanggalKomentar, a.isiKomentar, b.namaUser, b.alamatFoto, b.status FROM komentar a, user b WHERE a.idUser = b.idUser AND a.idPost = :idPost ORDER BY a.tanggalKomentar ASC";
        $query = $this->db->prepare($sql);
        $parameters = array(':idPost' => $idPost);

        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getCommentById($idKomentar){
        $sql = "SELECT SELECT a.isiKomentar, b.judulPost FROM komentar a, post b WHERE a.idPost = b.idPost a.idKomentar = :idKomentar LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':idKomentar' => $idKomentar);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function getAmountOfComment($idPost)
    {
        $sql = "SELECT COUNT(a.idKomentar) AS total FROM komentar a, user b WHERE a.idUser = b.IdUser AND a.idPost = :idPost";
        $query = $this->db->prepare($sql);
        $parameters = array(':idPost' => $idPost);
        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->total;
    }

    public function deletePost($idPost, $idUser){
        $sql = "DELETE FROM post WHERE idPost = :idPost AND idUser = :idUser";

        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser, ':idPost' => $idPost);

        $query->execute($parameters);
    }

    public function getAllPost(){
         $sql = "SELECT idPost, judulPost, isiPost, jenisPost, tanggalPost, alamatFoto FROM post WHERE statusPost = 'Valid' ORDER BY idPost DESC";
        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetchAll();        
    }

    public function getAllMyPost($idUser){
         $sql = "SELECT idPost, judulPost, isiPost, jenisPost, tanggalPost, statusPost, alamatFoto FROM post WHERE idUser = :idUser ORDER BY idPost DESC";
        $query = $this->db->prepare($sql);
        $parameters = array(':idUser' => $idUser);
        $query->execute($parameters);

        return $query->fetchAll();        
    }


   
}
