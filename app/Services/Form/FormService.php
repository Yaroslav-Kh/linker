<?php

namespace App\Services\Form;

use App\DTO\Form\FormDTO;
use App\Jobs\LifetimeJob;
use App\Models\Link;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Queue;

class FormService implements FormServiceInterface
{

    public function create(FormDTO $DTO)
    {

        if (Link::where('link', $DTO->link)->exists()) return (object)['exists' => true];

        try {
            $token = substr(hash('sha512',rand()),0,8);

            DB::transaction(function () use ($DTO, $token){

                $entity = Link::create([
                    'link'          => $DTO->link,
                    'limit'         => $DTO->limit,
                    'token'         => $token,
                    'is_unlimited'  => !$DTO->limit,
                    'job_id'        => 0,
                ]);

                $job_id = Queue::later(Carbon::now()->addMinutes($DTO->lifetime), new LifetimeJob($entity));
                $entity->update(['job_id' => $job_id]);

            });

            return (object)[
                'token' => $token
            ];

        } catch (\Exception $e) {
            logger($e);
            return false;
        }




        //Cache::put($token, $value,Carbon::now()->addSeconds(10));
        //request()->cookie($token,$value,$DTO->lifetime * 60,'/');
        //dd(request()->cookie($token));
    }
}
