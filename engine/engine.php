<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 21.11.16
 * Time: 23:26
 */
class engine {

    public static function init() {
        $request = router::instance();
        $obj = $request->correctionParse();
        $action = $request->getActionName();

        $htmlcontent = $obj->$action($request->getPath());
       require "templates/index.php";
    }

}