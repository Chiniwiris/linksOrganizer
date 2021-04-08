<?php
    class SuccessMesssages{
        const PRUEBA = '5416154fsdfsdcsdcbgmhmjmw';
        const SUCCESS_EDIT_UPDATELINK = 'c024g6gv03sdgsrherh54120f';
        const SUCCESS_EDIT_UPDATEPHOTO = 'c024g6gv03sdf';
        const SUCCESS_CREATE_NEWLINK = 'jkvbs<itefg48925617';
        private $successList = [];

        public function __construct() {
            $this->successList = [
                SuccessMesssages::SUCCESS_EDIT_UPDATEPHOTO => 'Se ha actualizado la foto exitosamente',
                SuccessMesssages::SUCCESS_EDIT_UPDATELINK => 'Se han actualizadi los datos exitosamente',
                SuccessMesssages::SUCCESS_CREATE_NEWLINK => 'Se creó un nuevo link exitosamente.'
            ];
        }

        public function existsKey($key){
            if(array_key_exists($key, $this->successList)){
                return true;
            } else{
                return false;
            }
        }

        public function getMessage($hash){
            return $this->successList[$hash];
        }
    }
?>