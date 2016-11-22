<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 21.11.16
 * Time: 23:47
 */
class indexModel extends abstractModel
{
    public function getContent (){

        $content = $this->query("SELECT name, id from category"); 
        $cnt=0;
        foreach ($content as $category) {

            $content[$cnt]["fiveArticlesFromCategory"] = $this->query("SELECT name,id from articles where category_id = ".$category ['id']." ORDER BY date DESC LIMIT 5");
            $cnt++;

        }
     
        return $content;
    }

}