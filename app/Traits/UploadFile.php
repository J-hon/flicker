<?php

namespace App\Traits;

use JD\Cloudder\Facades\Cloudder;

trait UploadFile
{
    public static function uploadNewFile($file, array $params, $publicId = null)
    {
        try {
            Cloudder::upload($file, $publicId, $params);
            return Cloudder::getResult()['secure_url'];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}