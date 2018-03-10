<?php
/**
 * Created by PhpStorm.
 * User: hmtmc
 * Date: 10/03/2018
 * Time: 08:03 PM
 */

class WPPlugin
{

    const DIRECTORIES = array(
        "admin" => array(
            "css",
            "js",
            "images",
        ),
        "languages",
        "includes",
        "public" => array(
            "css",
            "js",
            "images",
        )
    );

    private static function makeDirectory($path){
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
    }

    public static function populatesDirectories($path){
        foreach (self::DIRECTORIES as $parent => $directory){
            $parentDirectory = $path . "/";
            if (is_array($directory)){
                $parentDirectory = $parentDirectory . $parent . "/";
                foreach ($directory as $subDirectory){
                    self::makeDirectory($parentDirectory . $subDirectory);
                }
            }else{
                $parentDirectory = $parentDirectory . $directory;
            }
            self::makeDirectory($parentDirectory);
        }
    }

    public static function createBasicStructure($pluginName, $wpContentPath){

    }

}