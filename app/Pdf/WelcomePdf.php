<?php

declare(strict_types=1);

namespace App\Pdf;

final class WelcomePdf extends AbstractPdf
{
    private string $greeting;

    public function __construct(string $greeting)
    {
        $this->greeting = $greeting;
    }

    public function view(): string
    {
        return 'pdfs.example';
    }

    public function data(): array
    {
        return [
            'greeting' => $this->greeting,
        ];
    }
}
