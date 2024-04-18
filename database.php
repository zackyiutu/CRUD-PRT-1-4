<?php
 
class Database{
 
    private $host = "localhost";
    private $uname = "root";
    private $pass = "";
    private $db = "malasngoding";
    private $conn;
 
    function __construct(){
        $this->conn = new mysqli($this->host, $this->uname, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
 
    function tampil_data(){
        $query = "SELECT * FROM user";
        $result = $this->conn->query($query);
        $hasil = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $hasil[] = $row;
            }
        }
        return $hasil;
    }
 
    function input($nama,$alamat,$usia){
        $stmt = $this->conn->prepare("INSERT INTO user (nama, alamat, usia) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $alamat, $usia);
        $stmt->execute();
        $stmt->close();
    }
 
    function hapus($id){
        $stmt = $this->conn->prepare("DELETE FROM user WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
 
    function edit($id){
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $hasil = array();
        while ($row = $result->fetch_assoc()) {
            $hasil[] = $row;
        }
        $stmt->close();
        return $hasil;
    }
 
    function update($id,$nama,$alamat,$usia){
        $stmt = $this->conn->prepare("UPDATE user SET nama=?, alamat=?, usia=? WHERE id=?");
        $stmt->bind_param("sssi", $nama, $alamat, $usia, $id);
        $stmt->execute();
        $stmt->close();
    }
 
    function __destruct(){
        $this->conn->close();
    }
 
} 

?>
