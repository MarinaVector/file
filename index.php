<?php

    function first()
    {
        $pathToFile = $_SERVER['DOCUMENT_ROOT'] . '/file_upload.js';
        $text = file_get_contents($pathToFile);
        if (file_exists($pathToFile)) {

            $pattern = '/(_(.+?)) function (\((.+?)\))/';

            preg_match_all($pattern, $text, $matches);
            foreach ($matches[0] as $value) {

                $parameters = preg_replace("~(_(.+?)) function~", '' , $value);

                $count = substr_count( $parameters, "," );

                echo $value . ' ' .':'. preg_replace("~(function) (\((.+?)\))~" ,' ', $value)
                    .($count + 1 )  . '<br>' . '<hr>' ;
            }
        }
    }

     first();

