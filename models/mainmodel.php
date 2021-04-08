<?php
    class MainModel extends Model{
        private $paginaActual;
        private $totalPaginas;
        private $nResultados;
        private $resultadosPorPagina;
        private $indice;

        public function __construct($nPorPagina) {
            parent::__construct();
            $this->resultadosPorPagina = $nPorPagina;
            $this->indice = 0;
            $this->paginaActual = 1;
            $this->calcularPaginas();
        }

        public function calcularPaginas(){
            $queryTotalResultados = $this->query('SELECT COUNT(*) AS total FROM links');
            $this->nResultados = $queryTotalResultados->fetch(PDO::FETCH_ASSOC)['total'];
            $this->totalPaginas = $this->nResultados / $this->resultadosPorPagina;

            if(isset($_GET['pagina'])){
                $this->paginaActual = $_GET['pagina'];
                $this->indice = ($this->paginaActual - 1) * $this->resultadosPorPagina;
            }
        }

        public function mostrarLinks(){
            $query = $this->prepare('SELECT * FROM links LIMIT :pos, :n');
            $query->execute(['pos' => $this->indice, 'n' => $this->resultadosPorPagina]);

            foreach($query as $item){
                include 'views/main/link-item.php';
            }
        }

        public function mostrarPaginas(){
            $actual = '';
            echo '<ul>';
            
            for($i = 0; $i < $this->totalPaginas; $i++){
                if(($i + 1) == $this->paginaActual){
                    $actual = 'class="current" style="background-color: rgba(38, 54, 63, 0.822)"';
                } else{
                    $actual = 'class=""';
                }
                echo '<li><a '. $actual .' href="?pagina='. ($i + 1) .'">'. ($i + 1) .'</a></li>';
            }

            echo '</ul>';
        }

    }  
?>