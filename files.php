<?php
/**
 * Created by PhpStorm.
 * User: Karan Jobanputra
 * Date: 09-10-2016
 * Time: 04:39 PM
 */


$dir = "images";
$bc= "";
$i=1;

if (is_dir($dir))
{
    if ($dh = opendir($dir))
    {
        while (($file = readdir($dh)) !== false)
        {
            if($i>2)
            $bc= $bc.$file.' ';
            else $i=$i+1;
        }
        closedir($dh);
    }
}
echo trim($bc);
?>


