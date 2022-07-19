<?php

namespace Model;

namespace Model;

use Core\AbstractModel;
use Helper\DBHelper;

class People extends AbstractModel
{
    protected const TABLE = 'people';

    private $name;
    private $surname;
    private $email;
    private $phone;
    private $genderId;
    private $societyId;
    private $yearsId;

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

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getGenderId()
    {
        return $this->genderId;
    }

    public function setGenderId($genderId)
    {
        $this->genderId = $genderId;
    }

    public function getSocietyId()
    {
        return $this->societyId;
    }

    public function setSocietyId($societyId)
    {
        $this->societyId = $societyId;
    }

    public function getYearsId()
    {
        return $this->yearsId;
    }

    public function setYearsId($yearsId)
    {
        $this->yearsId = $yearsId;
    }

    public function assignData()
    {
        $this->data = [
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender_id' => $this->genderId,
            'society_id' => $this->societyId,
            'years_id' => $this->yearsId,

        ];
    }

    public function load($id)
    {
        $db = new DBHelper();
        $people = $db->select()->from(self::TABLE)->where('id', $id)->getOne();
        if (!empty($people)) {
            $this->id = $people['id'];
            $this->name = $people['name'];
            $this->surname = $people['surname'];
            $this->email = $people['email'];
            $this->phone = $people['phone'];
            $this->genderId = $people['gender_id'];
            $this->societyId = $people['society_id'];
            $this->yearsId = $people['years_id'];
        }
        return $this;
    }
}

