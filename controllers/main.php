<?php
    require_once 'models/linkmodel.php';
    class Main extends Controller{
        function __construct(){
            parent::__construct();
        }
        
        public function render(){
            $this->view->render('main/index');
        }

        public function deleteItem($params){
            $id = $params[0];
            $linkModel = new LinkModel();
            if($linkModel->delete($id)){
                echo 'deleted';
            } else{
                echo 'error';
            }
        }

    }
?>