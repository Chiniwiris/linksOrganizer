<?php
    interface IModel{
        public function save();
        public function getAll();
        public function delete($id);
        public function from($array);
        public function update($id);
        public function get($id);
    }
?>