<?php

namespace App\Repositories\Link;

use App\Models\Link;

class LinkRepository implements LinkRepositoryInterface
{

    public function getEntityByToken(string $token) : Link|null
    {
        $result = Link::where('token',$token)->first();

        if ($result) {
            if (!$result->is_unlimited) {
                $result->decrement('limit',1);
                if (!$result->limit) {
                    $result->lifetime_job()->delete();
                    $result->delete();
                }
            }
        }

        return $result;


    }
}
