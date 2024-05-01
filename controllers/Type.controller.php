<?php
include_once("connection.php");
include_once("conf.php");
include_once("models/Type.class.php");
include_once("views/Type.view.php");

class TypeController
{
    private $type;

    function __construct()
    {
        $this->type = new Type(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->type->open();
        $this->type->getType();
        $data = array();
        while ($row = $this->type->getResult()) {
            array_push($data, $row);
        }

        $this->type->close();

        $view = new TypeView();
        $view->render($data);
    }

    public function update($id)
    {
        $this->type->open();
        $data = $this->type->getTypeById($id);
        $this->type->update($id, $data);
        $this->type->close();

        header("location:type.php");
    }


    function add($data)
    {
        $this->type->open();
        $this->type->add($data);
        $this->type->close();

        header("location:type.php");
    }

    function delete($id)
    {
        $this->type->open();
        $this->type->delete($id);
        $this->type->close();

        header("location:type.php");
    }
}
