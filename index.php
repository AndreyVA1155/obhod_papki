<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');


$dir = "c:\\MinGW";
//простой обход папки без использования ООП
getFiles($dir);
function getFiles($dir) {
    $files  = array_diff(scandir($dir), ['..', '.']);
    $result = [];

    foreach ($files as $file) {
        $path = $dir . '/' . $file;
        if (is_dir($path)) {
            $result = array_merge($result, getFiles($path));
        } else {
            $result[] = $path;
        }
    }
    return $result;
}
$array = getFiles($dir);
echo '<pre>';
//var_dump($array);
echo '</pre>';
?>

<?php
//обход папки c использованием Iterator

$dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('.'), true);
foreach ($dir as $file) {
    echo str_repeat('-', $dir->getDepth()) ." $file<br/>";
}
