<?php
/**
 *  获取指定目录下的文件列表
 *	string $path 指定的目录，默认为当前目录
 *	string $exten 文件扩展名带前面的点(.txt),默认显示全部文件
 *	string $ifchild 是否显示子目录文件列表，默认不显示
 */
function openpath(string $path="./src", string $exten = '*' ,bool $ifchild = true): array
{
    $defaultIgnoreFile = [ 'autoload.php', 'openPath.php', 'composer.json', 'composer.lock', 'script.php'];
    static $file_array = []; // file name
    static $path_array = []; // file path
    $path = preg_replace('/(.*)([^\/])$/', '$1$2/', $path);
    if(is_dir($path)){
        $H = @ opendir($path);
        while(false !== ($_file=readdir($H))){
            if(is_dir($path.$_file) && $_file != "." && $_file!=".." && $_file!=="Thumbs.db"){
                if($ifchild){
                    openpath($path.$_file, $exten ,$ifchild);
                }
            }elseif(is_file($path.$_file) && $_file!="." && $_file!=".." && $_file!=="Thumbs.db"){
                if($exten == '*'){
                    $name = strrchr($_file, '.');
                    if ($name == '.php' && !in_array($_file, $defaultIgnoreFile)) {
                        array_push($file_array, $path.$_file);
                        array_push($path_array, $path);
                    }
                } else {
                    if(preg_match('/(.*)'.$exten.'/', '/'.$_file.'/')){
                        array_push($file_array, $path.$_file);
                        array_push($path_array, $path);
                    }
                }
            }
        }
        closedir($H);
    }
    return $file_array;
}
