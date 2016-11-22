<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 22.11.16
 * Time: 01:37
 */
class articleModel extends abstractModel
{
    public function getContent ($id){

        $content = $this->query("SELECT a.name, a.id, a.text, a.tags_id, t.tag as tag from articles a join tags t on a.tags_id = t.id where a.id=".$id);
        
        return $content;
    }

}