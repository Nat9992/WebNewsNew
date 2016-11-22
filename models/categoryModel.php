<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 22.11.16
 * Time: 14:04
 */
class categoryModel extends abstractModel
{
    public function getContent ($id){

        $content = $this->query("SELECT name, id from category where id = ".$id); //массив по табл категории
        $cnt=0;
        foreach ($content as $category) {

            $content[$cnt]["allArticlesFromCategory"] = $this->query("SELECT name,id from articles where category_id = ".$category ['id']." ORDER BY date DESC");
            $cnt++;

        }
       
        return $content;
    }

}
