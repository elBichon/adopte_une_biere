<?php
    class Biere
    {
        private $_id,
        $_date,
        $_lieu,
        $_type;
        
        
        //construction
        public function __construct(array $donnees)
        {
            $this->hydrate($donnees);
        }
        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key => $value)
            {
                $method = 'set'.ucfirst($key);
                
                if (method_exists($this, $method))
                {
                    $this->$method($value);
                }
            }
        }
        
        // GETTERS //
 
        public function id()
        {
            return $this->_id;
        }
        public function date()
        {
            return $this->_date;
        }
        public function lieu()
        {
            return $this->_lieu;
        }
        public function type()
        {
            return $this->_type;
        }
      
        //SETTERS
        
        public function setId($id)
        {
            $id = (int) $id;
            if ($id > 0)
            {
                $this->_id = $id;
            }
        }
        public function setDate($date)
        {
            $this->_date = $date;
        }
        public function setLieu($lieu)
        {
            if (is_string($lieu))
            {
                $this->_lieu = $lieu;
            }
        }
        public function setType($type)
        {
            if (is_string($type))
            {
                $this->_type = $type;
            }
        }
    }
?>
