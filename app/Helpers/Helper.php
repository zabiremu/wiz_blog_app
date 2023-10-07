<?php
use App\Helpers\Helper;
use Illuminate\Support\Facades\Storage;

function saveImage($image, $dir)
{
    $file = $image;
    $fileExt = $file->extension();
    $fileName = uniqid() . '.' . $fileExt;
    $fileSave = $file->storeAs($dir, $fileName, 'public');
    $saveUrl = config('app.url') . 'storage/' . $fileSave;
    return $saveUrl;
}

function updateImage($oldImagePath, $image, $dir)
{
    if ($oldImagePath) {
        if (Storage::disk('public')->exists($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);
        }
    }
    $file = $image;
    $fileExt = $file->extension();
    $fileName = uniqid() . '.' . $fileExt;
    $fileSave = $file->storeAs($dir, $fileName, 'public');
    $saveUrl = config('app.url') . 'storage/' . $fileSave;
    return $saveUrl;
}

function destroy($oldImagePath)
{
    if ($oldImagePath) {
        if (Storage::disk('public')->exists($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);
        }
    }
}
