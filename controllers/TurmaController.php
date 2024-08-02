<?php
require_once '../config/database.php';
require_once '../dao/TurmaDaoMysql.php';

class TurmaController {
    private $turmaDao;

    public function __construct() {
        $database = new Database();
        $this->turmaDao = new TurmaDaoMysql($database->getConnection());
    }

    public function index() {
        $limit = 5;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $limit;

        $lista = $this->turmaDao->findAll($limit, $offset);
        include '../views/turmas/index.php';
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = filter_input(INPUT_POST, 'nome');
            $descricao = filter_input(INPUT_POST, 'descricao');
            $tipo = filter_input(INPUT_POST, 'tipo');

            if ($nome && $descricao && $tipo) {
                $novaTurma = new Turma();
                $novaTurma->setNome($nome);
                $novaTurma->setDescricao($descricao);
                $novaTurma->setTipo($tipo);

                $this->turmaDao->add($novaTurma);
                header("Location: index.php");
                exit;
            }
        }
        include '../views/turmas/create.php';
    }

    public function edit($id) {
        $turma = $this->turmaDao->findById($id);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = filter_input(INPUT_POST, 'nome');
            $descricao = filter_input(INPUT_POST, 'descricao');
            $tipo = filter_input(INPUT_POST, 'tipo');

            if ($nome && $descricao && $tipo) {
                $turma->setNome($nome);
                $turma->setDescricao($descricao);
                $turma->setTipo($tipo);

                $this->turmaDao->update($turma);
                header("Location: index.php");
                exit;
            }
        }
        include '../views/turmas/edit.php';
    }

    public function delete($id) {
        $this->turmaDao->delete($id);
        header("Location: index.php");
        exit;
    }
}
?>
