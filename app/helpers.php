<?php

    function formatPrice($price){
        if($price <= 3000) return "$";
        else if ($price <= 4500 ) return "$$";
        else return "$$$";
    }

    function noteToPercent($note){
        return $note*20;
    }

?>