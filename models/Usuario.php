<?php

class Usuario {
    private $id;
    private $nome;
    private $email;

    public function getID(){
        return $this->id;
    }

    public function setID($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($n){
        $this->nome = ucwords(trim($n));
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($e){
        $this->email = strtolower(trim($e));
    }
}

interface UsuarioDAO {
		public function add(Usuario $u);
		public function findAll();
		public function findByEmail($email);
		public function findById($id); //recebe uma instancia de Usuario
		public function update(Usuario $u); 
		public function delete($id);
}