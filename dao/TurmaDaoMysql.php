<?php
require_once 'models/Turma.php';

class TurmaDaoMysql implements TurmaDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Turma $t) {
        $sql = $this->pdo->prepare("INSERT INTO turmas (nome, descricao, tipo) VALUES (:nome, :descricao, :tipo)");
        $sql->bindValue(':nome', $t->getNome());
        $sql->bindValue(':descricao', $t->getDescricao());
        $sql->bindValue(':tipo', $t->getTipo());
        $sql->execute();

        $t->setId($this->pdo->lastInsertId());
        return $t;
    }

    public function findAll($limit, $offset) {
        $array = [];

        $sql = $this->pdo->prepare("SELECT * FROM turmas ORDER BY nome ASC LIMIT :limit OFFSET :offset");
        $sql->bindValue(':limit', $limit, PDO::PARAM_INT);
        $sql->bindValue(':offset', $offset, PDO::PARAM_INT);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $t = new Turma();
                $t->setId($item['id']);
                $t->setNome($item['nome']);
                $t->setDescricao($item['descricao']);
                $t->setTipo($item['tipo']);

                $array[] = $t;
            }
        }
        return $array;
    }

    public function findById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM turmas WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $t = new Turma();
            $t->setId($data['id']);
            $t->setNome($data['nome']);
            $t->setDescricao($data['descricao']);
            $t->setTipo($data['tipo']);

            return $t;
        } else {
            return false;
        }
    }

    public function update(Turma $t) {
        $sql = $this->pdo->prepare("UPDATE turmas SET nome = :nome, descricao = :descricao, tipo = :tipo WHERE id = :id");
        $sql->bindValue(':nome', $t->getNome());
        $sql->bindValue(':descricao', $t->getDescricao());
        $sql->bindValue(':tipo', $t->getTipo());
        $sql->bindValue(':id', $t->getId());
        $sql->execute();

        return true;
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM turmas WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
?>
