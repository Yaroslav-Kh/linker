<?php

namespace App\DTO;

class BaseDTO
{

    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (isset($this->{$key})) $this->{$key} = is_null($value) ? $this->{$key} : $value;
        }
    }

}
