<?php

namespace Model;

use Core\AbstractModel;
use Helper\DBHelper;

class Gender extends AbstractModel
{
    protected const TABLE = 'genders';
    private $name;

    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->load($id);
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function load($id)
    {
        $db = new DBHelper();

        $gender = $db->select()->from(self::TABLE)->where('id', $id)->getOne();

        if (!empty($gender)) {
            $this->id = $gender['id'];
            $this->name = $gender['name'];
        }

        return $this;
    }

    public static function getAll()
    {
        $db = new DBHelper();

        $data = $db->select()->from(self::TABLE)->get();

        $genders = [];

        foreach ($data as $element) {
            $genders[] = new Gender($element['id']);;
        }
        return $genders;
    }
}



