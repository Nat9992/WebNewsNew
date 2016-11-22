<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 22.11.16
 * Time: 17:35
 */

class tagModel extends abstractModel
{
    public function getContent ($id){

        $content = $this->query("SELECT tag, id from tags where id = ".$id); //массив по табл тэгов
        $cnt=0;
        foreach ($content as $tag) {

            $content[$cnt]["allArticlesByTag"] = $this->query("SELECT name,id from articles where tags_id = ".$tag ['id']." ORDER BY date DESC");
            $cnt++;

        }
        //var_dump($content);
        return $content;
    }

}
