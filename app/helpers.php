<?php

    function formatPrice($price){
        if($price <= 2500) return "$";
        else if ($price <= 4000 ) return "$$";
        else return "$$$";
    }

?>