<?php
include_once("connection.php");
include_once("conf.php");
include_once("models/Hero.class.php");
include_once("models/Type.class.php");
include_once("models/Bestpos.class.php");
include_once("views/Hero.view.php");

class HeroController
{
    private $hero;
    private $type;
    private $bestpos;

    function __construct()
    {
        $this->hero = new Hero(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->type = new Hero(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->bestpos = new Hero(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->hero->open();
        $this->type->open();
        $this->bestpos->open();
        $this->hero->getHero();
        $this->type->getHero();
        $this->bestpos->getHero();

        $data = array(
            'hero' => array(),
            'type' => array(),
            'bestpos' => array()
        );
        while ($row = $this->hero->getResult()) {
            array_push($data['hero'], $row);
        }
        while ($row = $this->type->getResult()) {
            array_push($data['type'], $row);
        }
        while ($row = $this->bestpos->getResult()) {
            array_push($data['bestpos'], $row);
        }

        $this->hero->close();
        $this->type->close();
        $this->bestpos->close();

        $view = new HeroView();
        $view->render($data);
    }

    function add($data)
    {
        $this->hero->open();
        $this->hero->add($data);
        $this->hero->close();

        header("location:index.php");
    }

    function update($id)
    {
        $this->hero->open();
        $this->hero->update($id);
        $this->hero->close();

        header("location:index.php");
    }

    function delete($id)
    {
        $this->hero->open();
        $this->hero->delete($id);
        $this->hero->close();

        header("location:index.php");
    }
}
