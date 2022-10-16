<?php

namespace App\Repositories\Link;

interface LinkRepositoryInterface
{

    public function getEntityByToken(string $token);

}
