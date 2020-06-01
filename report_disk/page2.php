<?php
$path = "/Users/natawonputtarasundorm/Downloads/KhanStore";
echo "Folder Project = ".(filesize_r($path)/1000000)." MB";
 
function filesize_r($path){
  if(!file_exists($path)) return 0;
  if(is_file($path)) return filesize($path);
  $ret = 0;
  foreach(glob($path."/*") as $fn)
    $ret += filesize_r($fn);
  return $ret;

  
// return $ret/10000000;

// $ret=round($ret/(1024*1024),1);
// return $ret;


}
//   if($ret<1024) 
//     { 
//         return $ret." bytes"; 
//     } 
//     else if($ret<(1024*1024)) 
//     { 
//         $ret=round($ret/1024,1); 
//         return $ret." KB"; 
//     } 
//     else if($ret<(1024*1024*1024)) 
//     { 
//         $ret=round($ret/(1024*1024),1); 
//         return $ret." MB"; 
//     } 
//     else 
//     { 
//         $ret=round($ret/(1024*1024*1024),1); 
//         return $ret." GB"; 
//     } 
// }
?>


