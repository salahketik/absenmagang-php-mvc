<?php

class Intern_model
{
    private $table = 'users'; // Data mahasiswa ada di tabel users
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Menghitung total seluruh mahasiswa yang terdaftar
     */
    public function countAllInterns()
    {
        $this->db->query("SELECT COUNT(*) as total FROM " . $this->table . " WHERE role = 'intern'");
        return $this->db->single()['total'] ?? 0;
    }

    /**
     * Menghitung mahasiswa yang status magangnya masih 'Active'
     */
    public function countActiveInterns()
    {
        $this->db->query("SELECT COUNT(*) as total FROM " . $this->table . " WHERE role = 'intern' AND status = 'Active'");
        return $this->db->single()['total'] ?? 0;
    }

    /**
     * Menghitung mahasiswa yang sudah menyelesaikan magang (Finished)
     */
    public function countFinishedInterns()
    {
        $this->db->query("SELECT COUNT(*) as total FROM " . $this->table . " WHERE role = 'intern' AND status = 'Finished'");
        return $this->db->single()['total'] ?? 0;
    }

    /**
     * Mengambil semua data mahasiswa (untuk halaman Manage Interns)
     */
    public function getAllInterns()
    {
        $this->db->query("SELECT id, name, username, status, created_at FROM " . $this->table . " WHERE role = 'intern' ORDER BY name ASC");
        return $this->db->resultSet();
    }


    /**
     * Mengupdate status magang (Misal dari Active ke Finished)
     */
    public function updateStatus($id, $status)
    {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
