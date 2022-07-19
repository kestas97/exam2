<?php

namespace Controller;

use Core\AbstractController;
use Helper\Validator;
use Model\People;
use Model\Gender;
use Model\Society;
use Model\Year;
use Helper\Url;

class Register extends AbstractController
{
    public function index()
    {
        $this->data['genders'] = Gender::getAll();
        $this->data['years'] = Year::getAll();
        $this->data['societies'] = Society::getAll();

        $this->render('register/form');
    }

    public function create()
    {
        $isEmailValid = Validator::checkEmail($_POST['email']);
        if ($isEmailValid) {
            $register = new People();
            $register->setName($_POST['name']);
            $register->setSurname($_POST['surname']);
            $register->setEmail($_POST['email']);
            $register->setGenderId($_POST['gender_id']);
            if (isset($_POST['phone']) && !empty($_POST['phone'])) {
                $register->setPhone($_POST['phone']);
            } else {
                $register->setPhone(null);
            }

            $register->setSocietyId($_POST['society_id']);
            $register->setYearsId($_POST['years_id']);
            $register->save();

            Url::redirect('');
        }else{
            echo 'Patikrinkite ar gerai ivedete el.pasta';
        }
    }
}