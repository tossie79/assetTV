<?php
declare(strict_types=1);
namespace App\Contracts;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface ProcessFileInterface
{
	/*
    |--------------------------------------------------------------------------
    | ProcessVideo Interface
    |--------------------------------------------------------------------------
    |
    | 
    | 
    |
    */
    public function setStoragePath(string $path);
    public function getFileDetails(UploadedFile $file):string;
    public function getStorageDestinationPath():string;
    public function getPublicDestinationPath():string;
    public function getUploadedFilePath(string $file_name):string;
	

}
