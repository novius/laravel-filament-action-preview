<?php

namespace Novius\LaravelFilamentActionPreview\Filament\Actions;

use Filament\Actions\Action;
use Novius\LaravelFilamentActionPreview\Filament\Traits\IsPreviewAction;

class PreviewAction extends Action
{
    use IsPreviewAction;

    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpPreviewAction();
    }
}
