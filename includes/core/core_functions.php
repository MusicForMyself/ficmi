<?php

function site_url($append = '', $echo = true){
    if($echo){
        echo SITEURL.$append;
        return;
    }
    return SITEURL.$append;
}