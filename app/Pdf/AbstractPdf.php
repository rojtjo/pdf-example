<?php

declare(strict_types=1);

namespace App\Pdf;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\App;
use Spatie\Browsershot\Browsershot;

abstract class AbstractPdf implements Responsable
{
    public function toResponse($request)
    {
        return response()->make($this->render(), 200, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function render(): string
    {
        // Yikes!
        if (App::environment('testing')) {
            return 'Hello World!';
        }

        return Browsershot::html($this->toHtml())
            ->paperSize(210.0, 297.0)
            ->showBackground()
            ->waitUntilNetworkIdle(true)
            ->pdf();
    }

    public function toHtml(): string
    {
        return view($this->view(), $this->data())->render();
    }

    abstract public function view(): string;

    abstract public function data(): array;
}
