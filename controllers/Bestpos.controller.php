<?php
include_once("connection.php");
include_once("conf.php");
include_once("models/Bestpos.class.php");
include_once("views/Bestpos.view.php");

class BestposController
{
    private $bestpos;

    function __construct()
    {
        $this->bestpos = new Bestpos(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->bestpos->open();
        $this->bestpos->getBestpos();
        $data = array();
        while ($row = $this->bestpos->getResult()) {
            array_push($data, $row);
        }

        $this->bestpos->close();

        $view = new BestposView();
        $view->render($data);
    }

    public function update($id)
    {
        $this->bestpos->open();
        $data = $this->bestpos->getBestposById($id);
        $this->bestpos->update($id, $data);
        $this->bestpos->close();

        header("location:bestpos.php");
    }


    function add($data)
    {
        $this->bestpos->open();
        $this->bestpos->add($data);
        $this->bestpos->close();

        header("location:bestpos.php");
    }

    function delete($id)
    {
        $this->bestpos->open();
        $this->bestpos->delete($id);
        $this->bestpos->close();

        header("location:bestpos.php");
    }
}
