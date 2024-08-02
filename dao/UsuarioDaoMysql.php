<?php
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Usuario $u) {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, data_nascimento, cpf, email) VALUES (:nome, :data_nascimento, :cpf, :email)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':data_nascimento', $u->getDataNascimento());
        $sql->bindValue(':cpf', $u->getCpf());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }

    public function findAll() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setDataNascimento($item['data_nascimento']);
                $u->setCpf($item['cpf']);
                $u->setEmail($item['email']);

                $array[] = $u;
            }
        }
        return $array;
    }

    public function findByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setDataNascimento($data['data_nascimento']);
            $u->setCpf($data['cpf']);
            $u->setEmail($data['email']);

            return $u;
        } else {
            return false;
        }
    }

    public function findById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setDataNascimento($data['data_nascimento']);
            $u->setCpf($data['cpf']);
            $u->setEmail($data['email']);

            return $u;
        } else {
            return false;
        }
    }

    public function update(Usuario $u) {
        $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, data_nascimento = :data_nascimento, cpf = :cpf, email = :email WHERE id = :id");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':data_nascimento', $u->getDataNascimento());
        $sql->bindValue(':cpf', $u->getCpf());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();

        return true;
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
?>