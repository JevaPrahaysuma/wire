<?php

/**
 * Class Problem
 * Formerly named "Error", but as PHP 7 does not allow Error as class name anymore (as there's a Error class in the
 * PHP core itself) it's now called "Problem"
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Problem extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        session_start();
        if (isset($_SESSION["adminview"])) {
                require APP . 'view/_templates/header_admin.php';
                require APP . 'view/problem/index.php';
                require APP . 'view/_templates/footer_admin.php';
        }
        else if (isset($_SESSION["idUser"]) && isset($_SESSION["status"])){
            $userlog = $this->usermodel->getUserInfo($_SESSION["idUser"]);
           if ($_SESSION["status"] == "Standard User") {
                require APP . 'view/_templates/header_user.php';
                require APP . 'view/_templates/kanvas_standard.php';
                require APP . 'view/problem/index.php';
                require APP . 'view/_templates/footer_user.php';
           } else
           {
             $instancelog = $this->usermodel->getUserInstance($_SESSION["idUser"]);
                require APP . 'view/_templates/header_user.php';
                require APP . 'view/_templates/kanvas_trusted.php';
                require APP . 'view/problem/index.php';
                require APP . 'view/_templates/footer_user.php';
            } 
        }
        else 
        {
            require APP . 'view/_templates/header_user.php';
            require APP . 'view/_templates/kanvas_nonlogin.php';
            require APP . 'view/problem/index.php';
            require APP . 'view/_templates/footer_user.php';
        }
    }
}
