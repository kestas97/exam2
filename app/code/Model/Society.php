<?php


namespace Model;

use Core\AbstractModel;
use Helper\DBHelper;

class Society extends AbstractModel
{
    protected const TABLE = 'society';
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

    public function assignData()
    {
        $this->data = [
            'name' => $this->name,
        ];
    }

    public function load($id)
    {
        $db = new DBHelper();
        $society = $db->select()->from(self::TABLE)->where('id', $id)->getOne();
        if (!empty($society)) {
            $this->id = $society['id'];
            $this->name = $society['name'];
        }
        return $this;

    }

    public static function getAll()
    {
        $db = new DBHelper();

        $data = $db->select()->from(self::TABLE)->get();

        $societies = [];

        foreach ($data as $element) {
            $societies[] = new Society($element['id']);;
        }
        return $societies;
    }
}


