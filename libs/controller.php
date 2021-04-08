<?php
    class Controller{
        function __construct(){
            $this->view = new View();
        }

        function loadModel($model){
            $modelFile = 'models/' . $model . 'model.php';
            if(file_exists($modelFile)){
                require_once $modelFile;
                $modelClassName = $model . 'Model';
                $this->model = new $modelClassName(4);
                error_log($model . "'s Controller::LoadModel-> this model created!");
            } else{
                error_log($model . "'s Controller::LoadModel-> this model doesn't exist!");
            }
        }

        public function existsPost($params){
            foreach($params as $param){
                if(!isset($_POST['param'])){
                    return false;
                    break;
                }
            }
            return true;
        }

        public function existsGet($params){
            foreach($params as $param){
                if(!isset($_GET['param'])){
                    return false;
                    break;
                }
            }
            return true;
        }

        public function getPost($post){
            return $_POST[$post];
        }

        public function getGet($get){
            return $_GET[$get];
        }

        public function redirect($route, $mensajes = []){
            $params = '';
            $data = [];
            foreach($mensajes as $key => $mensaje){
                array_push($data, $key . '=' . $mensaje);
            }
            $params = join('&', $data);
            if($params != ''){
                $params = '?' . $params;
            }
            header('Location: ' . constant('URL') . $route . $params);
        }
    }
?>