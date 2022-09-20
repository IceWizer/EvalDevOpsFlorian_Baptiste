<?php

require dirname(__FILE__) . '../../lib/database/MyPDO.php';

/**
 * Description of Entity
 *
 * @author Florian
 */
class Entity implements JsonSerializable {
    private static $myDatabase;
    
    protected $identifier;
    
    public function __construct($p_identifier)
    {
        $this->identifier = $p_identifier;
    }
    
    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function jsonSerialize(): array {
        return ['id' => $this->identifier];
    }
}
