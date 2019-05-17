<?php
declare(strict_types=1);
namespace App\Services;

use App\Contracts\ProcessFileInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ProcessVideoFile implements ProcessFileInterface
{
    /*
    |--------------------------------------------------------------------------
    | ProcessVideo 
    |--------------------------------------------------------------------------
    |
    | 
    | 
    |
    */
    
    private $storagePath;
    /**
    *
    *
    **/
    public function __construct()
    {
      
        $this->setStoragePath('/app/public/videos');
       
    }

    /**
    *
    *
    **/

    public function setStoragePath(string $storagePath)
    {
        $this->storagePath = $storagePath;
       
    }

    /**
    *
    *
    **/

    public function getFileDetails(UploadedFile $uploadedFile):string
    {
        $file_name = time().'.'.$uploadedFile->getClientOriginalExtension();
        $uploadedFile->move($this->getStorageDestinationPath(), $file_name);
        $uploadedFile_withPath= $this->getUploadedFilePath($file_name);  
        return $uploadedFile_withPath;
      
   
    }
    /**
    *
    *
    **/

    public function getStorageDestinationPath():string
    {
        return storage_path($this->storagePath);
        
    }
    /**
    *
    *
    **/

    public function getPublicDestinationPath():string
    {
        return rtrim(app()->basePath('public/' . $this->storagePath), '/');
               
    }
    /**
    *
    *
    **/
    public function getUploadedFilePath(string $file_name):string
    {
        $uploadedFile_withPath = $this->getStorageDestinationPath().DIRECTORY_SEPARATOR .$file_name;  
        return $uploadedFile_withPath;
    }

    
    
}
