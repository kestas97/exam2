<?php

namespace Model;

use Core\AbstractModel;
use Helper\DBHelper;

class Year extends AbstractModel
{
    protected const TABLE = 'years';
    private $year;

    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->load($id);
        }
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function assignData()
    {
        $this->data = [
            'year' => $this->year,
        ];
    }

    public function load($id)
    {
        $db = new DBHelper();
        $year = $db->select()->from(self::TABLE)->where('id', $id)->getOne();
        if (!empty($year)) {
            $this->id = $year['id'];
            $this->year = $year['year'];
        }

        return $this;
    }

    public static function getAll()
    {
        $db = new DBHelper();

        $data = $db->select()->from(self::TABLE)->get();

        $years = [];

        foreach ($data as $element) {
            $years[] = new Year($element['id']);;
        }

        return $years;
    }
}

