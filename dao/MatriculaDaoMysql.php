<?php
require_once 'models/Matricula.php';

class MatriculaDaoMysql implements MatriculaDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Matricula $m) {
        $sql = $this->pdo->prepare("INSERT INTO matriculas (aluno_id, turma_id) VALUES (:aluno_id, :turma_id)");
        $sql->bindValue(':aluno_id', $m->getAlunoId());
        $sql->bindValue(':turma_id', $m->getTurmaId());
        $sql->execute();

        $m->setId($this->pdo->lastInsertId());
        return $m;
    }

    public function findAll() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM matriculas");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $m = new Matricula();
                $m->setId($item['id']);
                $m->setAlunoId($item['aluno_id']);
                $m->setTurmaId($item['turma_id']);

                $array[] = $m;
            }
        }
        return $array;
    }

    public function findByTurmaId($turma_id) {
        $array = [];

        $sql = $this->pdo->prepare("SELECT * FROM matriculas WHERE turma_id = :turma_id");
        $sql->bindValue(':turma_id', $turma_id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $m = new Matricula();
                $m->setId($item['id']);
                $m->setAlunoId($item['aluno_id']);
                $m->setTurmaId($item['turma_id']);

                $array[] = $m;
            }
        }
        return $array;
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM matriculas WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
?>
