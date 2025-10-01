<?php

namespace Novius\LaravelFilamentActionPreview\Filament\Actions;

use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class PreviewAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'preview';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->label(trans('laravel-filament-action-preview::messages.open'))
            ->color('gray')
            ->icon('heroicon-o-arrow-top-right-on-square')
            ->disabled(function (?Model $record) {
                return ! method_exists($record, 'previewUrl') || empty($record?->previewUrl());
            })
            ->url(function (?Model $record) {
                return method_exists($record, 'previewUrl') ? $record?->previewUrl() : null;
            })
            ->openUrlInNewTab();
    }
}
