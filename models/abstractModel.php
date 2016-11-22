<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 21.11.16
 * Time: 23:57
 */
abstract class abstractModel
{

    protected $dbObject;
    protected $table;
   

    public function __construct() {

       
        $this->dbObject = new mysqli (HOST, LOGIN, PASSWORD, DATABASE);
        $this->dbObject->set_charset("utf8");

        if( mysqli_connect_error() ){
            throw new Exception('Could not connect to DB');
        }
    }

    public function query($sql){
        if ( !$this->dbObject ){
            return false;
        }

        $result = $this->dbObject->query($sql);

        if ( mysqli_error($this->dbObject) ){
            throw new Exception(mysqli_error($this->dbObject));
        }

        $data = array();
        while( $row = mysqli_fetch_assoc($result) ){
            $data[] = $row;
        }
        return $data;
    }

}