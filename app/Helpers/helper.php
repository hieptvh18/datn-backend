<?php

if(!function_exists('testHelper')){
    function testHelper(){
        return 'ok helper';
    }
}

if(!function_exists('fileUploader')){
    function fileUploader($file, $prefixName = '', $folder)
    {
        $fileName = $file->hashName();
        $fileName = $prefixName
            ? $prefixName . '_' . $fileName
            : time().'_'.$fileName;

        return $file->storeAs($folder, $fileName);
    }
}
