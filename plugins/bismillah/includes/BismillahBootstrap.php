<?php
/**
 * Created by PhpStorm.
 * User: hmtmc
 * Date: 10/03/2018
 * Time: 08:58 PM
 */

class BismillahBootstrap
{

    public function loadDependencies(){

    }

    public static function activationTask(){
        error_log("Print Log activationTask");
    }


    public static function deactivationTask(){
        error_log("Print Log deactivationTask");
    }

    public function registerAdminAction(){

    }

    public function registerAdminFilter(){

    }


    public function registerPublicAction(){

    }

    public function registerPublicFilter(){

    }


    public function enqueueJs(){

    }


    public function enqueueCss(){

    }


    public function start(){
        $this->enqueueJs();
        $this->enqueueCss();
        $this->loadDependencies();
        $this->registerAdminAction();
        $this->registerAdminFilter();
        $this->registerPublicAction();
        $this->registerPublicFilter();
    }

}