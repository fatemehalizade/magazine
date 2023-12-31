<?php

    use Illuminate\Http\Request;

    function convertDateToFarsi($date){
        return \Morilog\Jalali\Jalalian::forge($date)->format("Y-m-d H:i:s");
    }
?>
