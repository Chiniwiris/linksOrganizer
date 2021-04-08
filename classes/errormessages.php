<?php
    class ErrorMessages{
        const PRUEBA = '5416154fsdfsdcsdcbgmhmjmw';
        const ERROR_EDIT_UPDATELINK = '02120dfyio54dsgdgddgsv002132451';
        const ERROR_EDIT_UPDATEPHOTO = '02120dfyio54dssv002132451';
        const ERROR_EDIT_UPDATEPHOTO_NONEPHOTO = '130530cd54fa68g4es10';
        const ERROR_CREATE_NEWLINK = 'av<obde<fnh<sugb<suogh<sbj';
        const ERROR_CREATE_NEWLINK_LINKEXISTALREADY = 'foai021561846iihefjc<semsec';
        private $errorList = [];

        public function __construct() {
            $this->errorList = [
                ErrorMessages::PRUEBA => 'este es un mensaje de error de prueba',
                ErrorMessages::ERROR_EDIT_UPDATELINK => 'Hubo un error actualizando los datos',
                ErrorMessages::ERROR_EDIT_UPDATEPHOTO => 'Hubo un error actualizando la foto',
                ErrorMessages::ERROR_EDIT_UPDATEPHOTO_NONEPHOTO => 'El archivo tiene que ser una imagen',
                ErrorMessages::ERROR_CREATE_NEWLINK_LINKEXISTALREADY => 'Este link ya existe.',
                ErrorMessages::ERROR_CREATE_NEWLINK => 'Hubo un problema insertando los datos.'
            ];
        }

        public function existsKey($key){
            if(array_key_exists($key, $this->errorList)){
                return true;
            } else{
                return false;
            }
        }

        public function getMessage($hash){
            return $this->errorList[$hash];
        }
    }
?>