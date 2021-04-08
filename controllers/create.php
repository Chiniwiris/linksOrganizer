<?php
    require_once 'models/linkmodel.php';
    class Create extends Controller{
        function __construct(){
            parent::__construct();
        }
        
        public function render(){
            $this->view->render('links/create');
        }

        public function newLink(){
            $name = $this->getPost('name');
            $link = $this->getPost('link');
            $photo = $this->getPost('photo');
            $linkModel = new LinkModel();
            $linkModel->setName($name);
            $linkModel->setLink($link);
            $linkModel->setImg($photo);
            if(!$linkModel->linkExists($name, $link)){
                if($linkModel->save()){
                    $this->redirect('create', ['success' => SuccessMesssages::SUCCESS_CREATE_NEWLINK]);//TODO: Success: Se creó un nuevo link exitosamente.
                } else{
                    $this->redirect('create', ['error' => ErrorMessages::ERROR_CREATE_NEWLINK]);//TODO: Error: Hubo un problema procesando la solicitud.
                }
            } else{
                $this->redirect('create', ['error' => ErrorMessages::ERROR_CREATE_NEWLINK_LINKEXISTALREADY]);//TODO: Error: Este link ya existe.
            }
        }
    }
?>