<?php
require_once ('app/kernel/Controller.php');
class IndexController extends Controller
{

    public function display()
    {

       $result = Item::getList();


        while ($result->fetch ()) {
            echo "<li><a href='index.php?action=display&slug=" . $result["slug"] . "'>" . $result["description"] . "</a></li>";
        }
    }

}