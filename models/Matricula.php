<?php
class Matricula {
    private $id;
    private $aluno_id;
    private $turma_id;

    public function getId() {
        return $this->id;
    }

    public function setId($i) {
        $this->id = trim($i);
    }

    public function getAlunoId() {
        return $this->aluno_id;
    }

    public function setAlunoId($ai) {
        $this->aluno_id = trim($ai);
    }

    public function getTurmaId() {
        return $this->turma_id;
    }

    public function setTurmaId($ti) {
        $this->turma_id = trim($ti);
    }
}

interface MatriculaDAO {
    public function add(Matricula $m);
    public function findAll();
    public function findByTurmaId($turma_id);
    public function delete($id);
}
?>
