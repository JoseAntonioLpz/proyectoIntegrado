<?php
/**
 * @Entity @Table(name="cita")
 **/
class Cita{
    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    protected $id;
    
    /**
     * @Column(type="string", length=10, unique=false, nullable=false)
     */
    protected $seguridadSocial;
    
    /**
     * @Column(type="string", length=25, unique=false, nullable=false)
     */
    protected $type;
    
    /**
     * @Column(type="string", length=200, unique=false, nullable=false)
     */
    protected $reason;
    
    /**
     * @Column(type="string", length=9, unique=false, nullable=false)
     */
    protected $telephone;
    
    /**
     * @Column(type="date",unique=false,nullable=false)
     */
    protected $fecha;
    //Methods Getter & Setter
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getSeguridadSocial(){
        return $this->seguridadSocial;
    }
    
    public function setSeguridadSocial($number){
        $this->seguridadSocial = $number;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function setType($type){
        $this->type = $type;
    }
    
    public function getReason(){
        return $this->reason;
    }
    
    public function setReason($reason){
        $this->reason = $reason;
    }
    
    public function getTelephone(){
        return $this->telephone;
    }
    
    public function setTelephone($telephone){
        $this->telephone = $telephone;
    }
    
    public function getFecha(){
        return $this->fecha;
    }
    
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    
    public function getArray(){
        return array(
                "id" => $this->id,
                "seguridadSocial" => $this->seguridadSocial,
                "type" => $this->type,
                "reason" => $this->reason,
                "telephone" => $this->telephone,
                "fecha" => $this->fecha
            );
    }
    
    function __toString(){
        return 'Cita: ' . $this->getId() . ' ' . $this->getSeguridadSocial() . ' ' . 
        $this->getName() . ' ' . $this->getReason() . ' ' . $this->getType() . ' ' . 
        $this->getTelephone();
    }
}