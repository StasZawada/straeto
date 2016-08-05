<?php


    /**
     * Renders view, passing in values.
     */
    function render($view, $values = array())
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            // render view 
            require("../views/{$view}");
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }


    // CS50 Library
	
	
	
	
	
    require("../vendor/library50-php-5/CS50/CS50.php");
    CS50::init("../config.json");

?>