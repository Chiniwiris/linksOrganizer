<?php
    require_once 'models/linkmodel.php';
    class Edit extends Controller{
        private $options;
        function __construct(){
            parent::__construct();
            $this->options = [];
        }
        
        public function render(){
            $this->getAllOptions();
            $this->view->render('links/edit', [
                'allOptions' => $this->options
                ]);
        }
        
        Public function getAllOptions(){
            $linkModel = new LinkModel();
            $this->options = $linkModel->getAll();
        }

        public function getAllOptionsJSON(){
            $linkModel = new LinkModel();
            $res = $linkModel->getAll();
            $json = [];
            foreach($res as $element){
                $item = [];
                $item['id'] = $element->getId();
                $item['name'] = $element->getName();
                $item['link'] = $element->getLink();
                $item['img'] = $element->getImg();
                array_push($json, $item);
            }
            $json = json_encode($json);
            echo $json;
        }

        public function getByIdOptionJSON($params){
            $id = $params[0];
            $linkModel = new LinkModel();
            $res = $linkModel->get($id);
            $json = [];
                $item = [];
                $item['id'] = $res['id'];
                $item['name'] = $res['name'];
                $item['link'] = $res['link'];
                $item['img'] = $res['img'];
                array_push($json, $item);
            
            $json = json_encode($json);
            echo $json;
            
        }

        public function updateLink(){
            $id = $this->getPost('id');
            $name = $this->getPost('name');
            $link = $this->getPost('link');
            echo 'id= ' . $id . ' name=' . $name . ' link=' . $link . '<br>';
            $linkModel = new LinkModel();
            $linkModel->setName($name);
            $linkModel->setLink($link);
            if($linkModel->update($id)){
                $this->redirect('edit', ['success' => SuccessMesssages::SUCCESS_EDIT_UPDATELINK]);
            } else{
                $this->redirect('edit', ['error' => ErrorMessages::ERROR_EDIT_UPDATELINK]);
            }
        }

        public function updatePhoto($params){
            if(!isset($_FILES['photo'])){
                $this->redirect('user', ['error' => ErrorMessages::ERROR_EDIT_UPDATEPHOTO]);
                return;
            }
            $id = $params[0];
            $photo = $_FILES['photo'];
            $linkModel = new LinkModel();
            $target_dir = "public/linksImages/";
            $extarr = explode('.',$photo["name"]);
            $filename = $extarr[sizeof($extarr)-2];
            $ext = $extarr[sizeof($extarr)-1];
            $hash = $photo['name'];
            $target_file = $target_dir . $hash;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
            $check = getimagesize($photo["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $uploadOk = 0;
            }
    
            if ($uploadOk == 0) {
                //echo "Sorry, your file was not uploaded.";
                $this->redirect('edit', ['error' => ErrorMessages::ERROR_EDIT_UPDATEPHOTO_NONEPHOTO]);
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($photo["tmp_name"], $target_file)) {
                    if($linkModel->updatePhoto($hash, $id)){
                        $this->redirect('edit', ['success' => SuccessMesssages::SUCCESS_EDIT_UPDATEPHOTO]);
                    }
                } else {
                    $this->redirect('edit', ['error' => ErrorMessages::ERROR_EDIT_UPDATEPHOTO_NONEPHOTO]);
                }
            }
        }
    }
?>