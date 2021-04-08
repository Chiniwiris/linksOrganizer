<?php
    class View{

        private $d;

        function __construct(){
            
        }
        public function render($file, $data = []){
            $this->d = $data;
            $this->hadleMessages();
            require_once 'views/' . $file . '.php';
        }

        private function hadleMessages(){
            if(isset($_GET['success']) && isset($_GET['error'])){
                //nothing happends
            } else if(isset($_GET['success'])){
                $this->handleSuccess();
            } else if(isset($_GET['error'])){
                $this->handleError();
            }
        }

        private function handleSuccess(){
            $hash = $_GET['success'];
            $message = new SuccessMesssages();
            if($message->existsKey($hash)){
                $this->d['success'] = $message->getMessage($hash);
            } else{
                $this->d['success'] = null;
            }
        }

        private function handleError(){
            $hash = $_GET['error'];
            $message = new ErrorMessages();
            if($message->existsKey($hash)){
                $this->d['error'] = $message->getMessage($hash);
            } else{
                $this->d['error'] = null;
            }
        }

        public function showMessages(){
            $this->showSuccessMessages();
            $this->showErrorMessages();
        }

        public function showErrorMessages(){
            if(array_key_exists('error', $this->d)){
                echo '<div class="error">'.$this->d['error'].'</div>';
            }
        }
    
        public function showSuccessMessages(){
            if(array_key_exists('success', $this->d)){
                echo '<div class="success">'.$this->d['success'].'</div>';
            }
        }
    }
?>