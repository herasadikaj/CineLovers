<?php

class connect
{
    private $username = "root";
    private $password = "";
    private $server_name = "localhost";
    private $db_name = "cinelovers";
    public $conn;

    function __construct()
    {
        $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function update($query)
    {
        if ($this->conn->query($query) === TRUE) {
            return true; 
        } else {
            echo '<script>alert("' . $this->conn->error . '");</script>';
            return false; 
        }
    }

    function delete($sql, $message) {
        if ($this->conn->query($sql) === TRUE) {
            echo $message;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    function select_by_query($query) {
        $result = $this->conn->query($query);
        if ($result === FALSE) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }

    function select_all($table_name)
    {
        $sql = "SELECT * FROM $table_name";
        $result = $this->conn->query($sql);
        if ($result === FALSE) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }

    function select_movie($table_name, $date)
    {
        if ($date == "comingsoon") {
            $sql = "SELECT * FROM $table_name WHERE rel_date > NOW()";
        } else {
            $sql = "SELECT * FROM $table_name WHERE rel_date < NOW()";
        }
        $result = $this->conn->query($sql);
        if ($result === FALSE) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }

    function select($table_name, $id)
    {
        $sql = "SELECT * FROM $table_name WHERE id = $id"; 
        $result = $this->conn->query($sql);
        if ($result === FALSE) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }

    function insert($query)
    {
        if ($this->conn->query($query) === TRUE) {
            echo '<script>alert("The movie was added successfully");</script>';
        } else {
            echo '<script>alert("' . $this->conn->error . '");</script>';
        }
    }
}
?>
