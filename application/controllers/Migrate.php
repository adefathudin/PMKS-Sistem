<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Migrate
 *
 * @author adefathudin
 */
class Migrate extends CI_Controller {
    function index($version=0){
        if(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])){
            show_404();
            exit;
        }
        
        $this->load->library('migration');

        if (!$version){
            if ($this->migration->current() === FALSE)
            {
                show_error($this->migration->error_string());
            }else{
                echo 'Migration to last version success!' . PHP_EOL;
            }
        }else{
            if ($this->migration->version($version)===FALSE){
                show_error($this->migration->error_string());
            }else{
                echo 'Migration to version '.$version.' success!' . PHP_EOL;
            }
        }
    }
}

/**
 * Filename : migrate.php
 * Location : /application/controllers/migrate.php
 */
