<?php

namespace App\Http\Controllers;


use App\Repositories\Link\LinkRepositoryInterface;

class RedirectController extends Controller
{

    public function __construct(private LinkRepositoryInterface $linkRepository){}

    public function index(string $token)
    {
        $result = $this->linkRepository->getEntityByToken($token);

        if ($result) {
            return redirect($result->link);
        }

        return abort(404);

    }
}
