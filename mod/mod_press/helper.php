<?php
class modHelloWorldHelper
{
    /**
     * Zwraca komunikat powitalny
     *
     * @param array $params - obiekt zawieraj�cy parametry modu�u
     * @access public
     */    
    public static function getHello( $params )
    {
        return 'Witaj �wiecie!';
    }
}
?>