<?php

namespace App\Http\Controllers;

use App\DTO\Form\FormDTO;
use App\Http\Requests\FormPageRequest;
use App\Services\Form\FormServiceInterface;

class FormPageController extends Controller
{

    public function __construct(private FormServiceInterface $formService){}

    public function index()
    {
        return view('form');
    }

    public function submit(FormPageRequest $request)
    {
        $response = ['error' => __('Server Error')];

        $result = $this->formService->create(new FormDTO($request->validated()));

        if (isset($result->exists)) {
            $response = ['warning' => __('This link is not expired yet')];
        }

        if (isset($result->token)) {
            $response = ['success' => $request->getSchemeAndHttpHost().'/'.$result->token];
        }

        return redirect()->back()->with($response);

    }
}
