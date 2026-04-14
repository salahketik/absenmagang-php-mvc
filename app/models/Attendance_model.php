<?php

class Attendance_model
{
    private $table = 'attendance';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function recordAttendance($data)
    {
        // PENGAMAN: Jika status entah bagaimana kosong, paksa jadi 'Present'
        $status = isset($data['status']) ? $data['status'] : 'Present';

        $query = "INSERT INTO " . $this->table . " (user_id, date, entry_time, status) 
                  VALUES (:user_id, :date, :entry_time, :status)";

        try {
            $this->db->query($query);
            $this->db->bind('user_id', $data['user_id']);
            $this->db->bind('date', $data['date']);
            $this->db->bind('entry_time', $data['time']);
            $this->db->bind('status', $status); // Bind status hasil validasi

            $this->db->execute();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return 0;
        }
    }

    public function getAttendanceByUserAndDate($user_id, $date)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = :user_id AND date = :date";
        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        $this->db->bind('date', $date);
        return $this->db->single();
    }

    public function getPersonalLogs($user_id, $limit = 5)
    {
        $query = "SELECT * FROM " . $this->table . " 
                  WHERE user_id = :user_id 
                  ORDER BY date DESC, entry_time DESC 
                  LIMIT :limit";

        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        $this->db->bind('limit', (int)$limit, PDO::PARAM_INT);
        return $this->db->resultSet();
    }
    /* --- FUNGSI UNTUK ADMIN --- */

    public function getRecentAttendance($limit = 5)
    {
        $query = "SELECT a.*, u.name 
                  FROM " . $this->table . " a
                  JOIN users u ON a.user_id = u.id
                  WHERE a.date = CURDATE()
                  ORDER BY a.entry_time DESC 
                  LIMIT :limit";

        $this->db->query($query);
        $this->db->bind('limit', $limit, PDO::PARAM_INT);
        return $this->db->resultSet();
    }

    public function countPresentToday()
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " 
                  WHERE date = CURDATE() AND (status = 'Present' OR status = 'Late')";
        $this->db->query($query);
        $result = $this->db->single();
        return $result ? $result['total'] : 0;
    }

    public function countPermissionToday()
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->table . " 
                  WHERE date = CURDATE() AND (status = 'Permission' OR status = 'Sick')";
        $this->db->query($query);
        $result = $this->db->single();
        return $result ? $result['total'] : 0;
    }
}
