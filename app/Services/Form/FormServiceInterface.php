<?php

namespace App\Services\Form;

use App\DTO\Form\FormDTO;

interface FormServiceInterface
{

    public function create(FormDTO $DTO);

}
