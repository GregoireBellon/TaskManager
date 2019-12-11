<?php


class Router
{

    public static function analyze($var)
    {
         $result = array("controller" => "Index",
             "action" => "display",
             "params" => array());

        if (isset($var["action"]) && isset($var["slug"])) {

            switch ($var["action"]) {
                case "display" :
                    if (isset($var['slug'])) {
                        $result = array(
                            "controller" => "Item",
                            "action" => "display",
                            "params" => array("slug" => $var['slug'])
                        );
                    } else
                        $result = array(
                            "controller" => "Index",
                            "action" => "display",
                            "params" => array()
                        );

                    break;

                case "edit" :

                    if (isset($var['slug'])) {
                        $result = array(
                            "controller" => "Item",
                            "action" => "edit",
                            "params" => array("slug" =>$var['slug'])
                        );
                    }
                    break;

                case "do_edit" :
                    if (isset($var['slug'])) {
                        $result = array(
                            "controller" => "Item",
                            "action" => "do_edit",
                            "params" => array(
                                "slug" => $var['slug'] ,
                                "description" => $var['description'],
                                "expiration" => $var['expiration']
                            )
                        );
                    }
                    break;

                default :
                    $result = array(
                        "controller" => "Error",
                        "action" => "error404",
                        "params" => array()
                    );
            }
        }
        return $result;
    }

}