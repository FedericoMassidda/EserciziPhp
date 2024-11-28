<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Unit;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $w, $h, $fileName, $path;
    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname ($filePath);
        $this->fileName = basename ($filePath);
        $this-> w = $w;
        $this-> h = $h;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        Image::load($srcPath)
        ->crop($w, $h, CropPosition::Center)
        ->watermark(
            base_path('public\images\logo.jpg'),//\public\images\logo.jpg NON APPARE IL LOGO, VEDERE DOMANI COL DOCENTE
            width: $w * 0.5,
            height: $h * 0.5, 
            paddingX: 5,
            paddingY: 5,
            paddingUnit: Unit::Percent
        )
        ->save($destPath);

    }
}
