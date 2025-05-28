<?php

namespace Novius\LaravelFilamentActionPreview\Filament\Traits;

use Filament\Actions\Action;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Action
 */
trait IsPreviewAction
{
    use CanCustomizeProcess;

    public static function getDefaultName(): ?string
    {
        return 'preview';
    }

    protected function setUpPreviewAction(): void
    {
        $process = function () {
            return $this->process(function (Model $record) {
                return method_exists($record, 'previewUrl') ? $record->previewUrl() : null;
            });
        };

        $this->label(trans('laravel-filament-action-preview::messages.open'));
        $this->color('gray');
        $this->icon('heroicon-o-arrow-top-right-on-square');
        $this->disabled(function () use ($process): bool {
            return $process() === null;
        });
        $this->url(function () use ($process): string {
            return $process();
        });
        $this->openUrlInNewTab();
    }
}
