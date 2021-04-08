<?php
    class linkModel extends Model implements IModel{
       
        private $id;
        private $name;
        private $link;
        private $img;

        public function setName($name){ $this->name = $name; }
        public function setLink($link){ $this->link = $link; }
        public function setImg($img){   $this->img = $img; }
        public function setId($id){   $this->id = $id; }

        public function getId(){ return $this->id; }
        public function getName(){ return $this->name; }
        public function getLink(){ return $this->link; }
        public function getImg(){   return $this->img; }
       
        public function __construct(){
            parent::__construct();
            $this->name = '';
            $this->link = '';
            $this->img = '';
        } 
       
        public function save(){
            try{
                $query = $this->prepare('INSERT INTO links(name, link, img) VALUES (:name, :link, :img)');
                $query->execute([
                    'name' => $this->name,
                    'link' => $this->link,
                    'img' => $this->img
                ]);
                if($query->rowCount() > 0) return true;
                return false;

            } catch(PDOException $e){
                error_log('LinkModel::save->PDOEXCEPTION-> '  .$e);
                return false;
            }
        }

        public function get($id){
            try{
                $query = $this->prepare('SELECT * FROM links WHERE id = :id');
                $query->execute(['id' => $id]);
                if($query->rowCount() > 0){
                    $item = $query->fetch(PDO::FETCH_ASSOC);
                    return $item;
                }else{
                    return null;
                }
                
            } catch(PDOException $e){
                error_log('LinkModel::get->PDOEXCEPTION-> '  .$e);
                return false;
            }
        }

        public function getAll(){
            $items = [];
            try{
                $query = $this->query('SELECT * FROM links');
                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = new LinkModel();
                    $item->from($p);
                    array_push($items, $item);
                }
                
                return $items;
                
            } catch(PDOException $e){
                error_log('LinkModel::getall->PDOEXCEPTION-> '  .$e);
                return false;
            }
        }

        public function delete($id){
            try{
                $query = $this->prepare('DELETE FROM links WHERE id = :id');
                $query->execute(['id' => $id]);
                if($query->rowCount() > 0) return true;
                return false;

            } catch(PDOException $e){
                error_log('LinkModel::delete->PDOEXCEPTION-> '  .$e);
                return false;
            }
        }

        public function from($array){
            $this->id = $array['id'];
            $this->name = $array['name'];
            $this->link = $array['link'];
            $this->img = $array['img'];
        }

        public function update($id){
            try{
                $query = $this->prepare('UPDATE links SET name = :name, link = :link, img = :img WHERE id = :id');
                $query->execute([
                    'id' => $id,
                    'name' => $this->name,
                    'link' => $this->link,
                    'img' => $this->img 
                ]);
                if($query->rowCount() > 0) return true;
                return false;
            } catch(PDOException $e){
                error_log('LinkModel::update->PDOEXCEPTION-> '  .$e);
                return false;
            }
        }

        public function updatePhoto($hash, $id){
            try{
                $query = $this->prepare('UPDATE links SET img = :img WHERE id = :id');
                $query->execute([
                    'id' => $id,
                    'img' => $hash
                ]);
                if($query->rowCount() > 0) return true;
                return false;
            } catch(PDOException $e){
                error_log('LinkModel::update->PDOEXCEPTION-> '  .$e);
                return false;
            }
        }

        public function linkExists($name, $link){
            try{
                $query = $this->prepare('SELECT link FROM links WHERE name = :name');
                $query->execute(['name' => $name]);
                $query = $query->fetch(PDO::FETCH_ASSOC)['link'];
                if($query == $link) return true;
                return false;
            } catch(PDOException $e){
                error_log('LinkModel::linkExists->PDOEXCEPTION-> '  .$e);
                return null;
            }
        }
    }
?>