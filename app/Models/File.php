<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class File extends Model
{
    use HasFactory;

    public static function storeFile(string $path, $file): string
    {
        $url = $path. "/" . Str::random(64) . "." . $file->getClientOriginalExtension();
        $resize = Image::make($file);
        $resize->save(public_path($url));

        return $url;
    }

    public static function resizeFile(string $path, $file, $size): string
    {
        $url = $path. "/" . Str::random(64) . "." . $file->getClientOriginalExtension();
        $resize = Image::make($file)->resize($size[0],$size[1]);
        $resize->save(public_path($url));

        return $url;
    }
}
