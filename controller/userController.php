<?php
require_once(__DIR__ . '/../model/user.php');

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function getAll() {
        return $this->model->getAll();
    }

    public function create($nom, $email) {
        return $this->model->create($nom, $email);
    }

    public function update($id, $nom, $email) {
        return $this->model->update($id, $nom, $email);
    }

    public function delete($id) {
        return $this->model->delete($id);
    }
}
