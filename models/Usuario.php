<?php
class Usuario {
    private $id;
    private $nome;
    private $data_nascimento;
    private $cpf;
    private $email;

    public function getId() {
        return $this->id;
    }

    public function setId($i) {
        $this->id = trim($i);
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($n) {
        $this->nome = ucwords(trim($n));
    }

    public function getDataNascimento() {
        return $this->data_nascimento;
    }

    public function setDataNascimento($dn) {
        $this->data_nascimento = $dn;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($c) {
        $this->cpf = trim($c);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($e) {
        $this->email = strtolower(trim($e));
    }
}

interface UsuarioDAO {
    public function add(Usuario $u);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function update(Usuario $u);
    public function delete($id);
}
?>
