<?php
require_once '../config/database.php';
require_once '../dao/MatriculaDaoMysql.php';
require_once '../dao/UsuarioDaoMysql.php';
require_once '../dao/TurmaDaoMysql.php';

class MatriculaController {
    private $matriculaDao;
    private $usuarioDao;
    private $turmaDao;

    public function __construct() {
        $database = new Database();
        $this->matriculaDao = new MatriculaDaoMysql($database->getConnection());
        $this->usuarioDao = new UsuarioDaoMysql($database->getConnection());
        $this->turmaDao = new TurmaDaoMysql($database->getConnection());
    }

    public function index() {
        $lista = $this->matriculaDao->findAll();
        include '../views/matriculas/index.php';
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $aluno_id = filter_input(INPUT_POST, 'aluno_id');
            $turma_id = filter_input(INPUT_POST, 'turma_id');

            if ($aluno_id && $turma_id) {
                $novaMatricula = new Matricula();
                $novaMatricula->setAlunoId($aluno_id);
                $novaMatricula->setTurmaId($turma_id);

                $this->matriculaDao->add($novaMatricula);
                header("Location: index.php");
                exit;
            }
        }
        $alunos = $this->usuarioDao->findAll();
        $turmas = $this->turmaDao->findAll(PHP_INT_MAX, 0);
        include '../views/matriculas/create.php';
    }

    public function show($turma_id) {
        $matriculas = $this->matriculaDao->findByTurmaId($turma_id);
        include '../views/matriculas/show.php';
    }

    public function delete($id) {
        $this->matriculaDao->delete($id);
        header("Location: index.php");
        exit;
    }
}
?>
