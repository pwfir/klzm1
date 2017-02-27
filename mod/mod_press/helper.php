<?php
class modHelloWorldHelper
{
    /**
     * Zwraca komunikat powitalny
     *
     * @param array $params - obiekt zawieraj¹cy parametry modu³u
     * @access public
     */    
    public static function getHello( $params )
    {
        return 'Witaj Œwiecie!';
    }
}
?>