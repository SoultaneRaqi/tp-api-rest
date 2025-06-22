<?php
require_once(__DIR__ . '/../config/database.php');

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nom, $email) {
        $stmt = $this->conn->prepare("INSERT INTO users (nom, email) VALUES (?, ?)");
        return $stmt->execute([$nom, $email]);
    }

    public function update($id, $nom, $email) {
        $stmt = $this->conn->prepare("UPDATE users SET nom = ?, email = ? WHERE id = ?");
        return $stmt->execute([$nom, $email, $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
