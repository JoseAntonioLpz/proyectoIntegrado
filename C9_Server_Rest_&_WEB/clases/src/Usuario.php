<?php
/*
    LOS USUARIOS SOLO PODRÁN LOGEARSE A TRAVÉS DE LA WEB PARA VISUALIZAR SUS CITAS,
    SU CLAVE PRIMARIA CORRESPONDE CON SU NUMERO DE LA SEGURIDAD SOCIAL.
*/

/**
 * @Entity @Table(name="usuario")
 **/
class Usuario{
    
    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    
    /**
     * @Column(type="string", length=10, unique=false, nullable=false)
     */
    private $seguridadSocial;
    
    /**
     * @Column(type="string", length=40, unique=false, nullable=false)
     */
    private $password;
    
    /**
     * @Column(type="string", length=25, unique=false, nullable=false)
     */
    private $firstName;
    
    /**
     * @Column(type="string", length=25, unique=false, nullable=false)
     */
    private $lastName;
    
    //Metodos getter and setter
    
    function getId(){
        return $this->id;
    }
    
    function setId($id){
        $this->id = $id;
    }
    
    function getSeguridadSocial(){
        return $this->seguridadSocial;
    }
    
    function setSeguridadSocial($numero){
        $this->seguridadSocial = $numero;
    }
    
    function getPassword(){
        return $this->password;
    }
    
    function setPassword($pass){
        $this->password = $pass;
    }
    
    function getFirstName(){
        return $this->firstName;
    }
    
    function setFirstName($name){
        $this->firstName = $name;
    }
    
    function getLastName(){
        return $this->lastName;
    }
    
    function setLastName($lastName){
        $this->lastName = $lastName;
    }
    
    public function getArray(){
        return array(
                "id" => $this->id,
                "seguridadSocial" => $this->seguridadSocial,
                "password" => $this->password,
                "firstName" => $this->firstName,
                "lastName" => $this->lastName
            );
    }
    
    function __toString(){
        return 'Usuario: ' . $this->getId() . ' ' . $this->getSeguridadSocial() . ' ' . 
        $this->getPassword() . ' ' . $this->getFirstName() . ' ' . $this->getLastName();
    }
}
?>