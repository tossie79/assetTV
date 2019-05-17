<?php
declare(strict_types=1);
namespace App\Services;

use App\Contracts\FileAnalyzerInterface;

use \getID3;

class Id3FileAnalyzer implements FileAnalyzerInterface
{
    /*
    |--------------------------------------------------------------------------
    | FileAnalyzer 
    |--------------------------------------------------------------------------
    |
    | 
    | 
    |
    */
    private $getId3Instance;
    /**
    *
    *
    **/
   
    public function __construct()
    {
        $this->setInstance();
              
    }

    /**
    *
    *
    **/
    public function analyzeFile(string $filepath):array
    {
        if(!empty($filepath))
        {
            $analyzedFile =  $this->getId3Instance->analyze($filepath);
            $cleanedFile = $this->utf8ize($analyzedFile);
            return $cleanedFile;
        }
            return ["Error: File could not be analyzed"];
        
    }
    
   /**
    *
    *Initialize getID3 engine
    **/ 
    public function setInstance()
    {
       
         $this->getId3Instance = new getID3;
    }
    /**
    *
    *
    **/
    public function utf8ize($mixed) {
        if (is_array($mixed)) {
            foreach ($mixed as $key => $value) {
                $mixed[$key] = $this->utf8ize($value);
            }
        } elseif (is_string($mixed)) {
            return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
        }
        return $mixed;
}
    
}
