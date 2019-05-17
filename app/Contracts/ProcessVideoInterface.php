<?php
declare(strict_types=1);
namespace App\Contracts;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

interface ProcessVideoInterface
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
    public function getFileDetails(UploadedFile $file);
	public function analyzeFile(string $filepath);
	// public function getStorageDestinationPath():string;
	// public function isVideo():boolean;
	// public function hasFile():boolean;
	// public function getId3():array;

}
