<?php
class Turma {
    private $id;
    private $nome;
    private $descricao;
    private $tipo;

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

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($d) {
        $this->descricao = trim($d);
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($t) {
        $this->tipo = ucwords(trim($t));
    }
}

interface TurmaDAO {
    public function add(Turma $t);
    public function findAll($limit, $offset);
    public function findById($id);
    public function update(Turma $t);
    public function delete($id);
}
?>
