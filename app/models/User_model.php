<?php

class User_model
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserByUsername($username)
    {
        $username = strtolower(trim($username));
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username");
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function register($data)
    {
        $username = strtolower(trim($data['username']));
        // Ambil dari $_POST['nama'] (dari form) tapi simpan ke kolom 'name' (di DB)
        $name = htmlspecialchars(trim($data['name']));

        if ($this->getUserByUsername($username)) {
            return -1;
        }

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        // SESUAIKAN: Gunakan 'name' bukan 'nama' sesuai struktur tabelmu
        $query = "INSERT INTO {$this->table} (username, name, password, role) 
                  VALUES (:username, :name, :password, :role)";

        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('name', $name); // Bind ke parameter :name
        $this->db->bind('password', $password);
        $this->db->bind('role', 'intern');

        try {
            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            // Debugging jika masih gagal
            die("Error Database: " . $e->getMessage());
        }
    }
}
