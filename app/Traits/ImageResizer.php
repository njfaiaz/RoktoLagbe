<?php

namespace App\Traits;

trait ImageResizer
{
    public function resizeAndSaveImage($image, $targetWidth = 300, $targetHeight = 200, $folder = 'uploads')
    {
        $originalPath = $image->getPathname();
        $extension = strtolower($image->getClientOriginalExtension());
        $filename = time() . '.' . $extension;

        list($width, $height) = getimagesize($originalPath);

        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $source = imagecreatefromjpeg($originalPath);
                break;
            case 'png':
                $source = imagecreatefrompng($originalPath);
                break;
            case 'gif':
                $source = imagecreatefromgif($originalPath);
                break;
            default:
                return ['error' => 'Unsupported image format'];
        }

        $resized = imagecreatetruecolor($targetWidth, $targetHeight);

        if (in_array($extension, ['png', 'gif'])) {
            imagecolortransparent($resized, imagecolorallocatealpha($resized, 0, 0, 0, 127));
            imagealphablending($resized, false);
            imagesavealpha($resized, true);
        }

        imagecopyresampled($resized, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

        $path = public_path($folder);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $savePath = $path . '/' . $filename;

        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                imagejpeg($resized, $savePath);
                break;
            case 'png':
                imagepng($resized, $savePath);
                break;
            case 'gif':
                imagegif($resized, $savePath);
                break;
        }

        imagedestroy($source);
        imagedestroy($resized);

        return [
            'success' => true,
            'filename' => $filename,
            'path' => $folder . '/' . $filename,
        ];
    }
}
