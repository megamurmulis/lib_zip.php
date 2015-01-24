<pre><?php
define( 'ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)) );

require_once('../lib_zip.php');
$zip = new ZipFile();

$filename = 'zipfile.zip';
$dir      = 'testdir1';

/*******************************************************************/
//Create
echo '[Add]'. PHP_EOL;
if( !$zip->add(ROOT_PATH, $dir) ) {
	die("Failed adding item ($dir)!");
}
echo '[Save]'. PHP_EOL;
if( !$zip->save($filename) ) {
	die("Failed saving zip file ($filename)!");
}
echo '[DONE]<hr>'. PHP_EOL;

/*******************************************************************/
//Test
echo '[LIST]'. PHP_EOL;
if ( !class_exists('ZipArchive' ) )
	die('ZipArchive class not found!');

$zip = new ZipArchive;
if ($zip->open($filename) === TRUE) {
	for ($i = 0; $i < $zip->numFiles; $i++) {
		echo 'FILE: '. $zip->getNameIndex($i) . PHP_EOL;
	}
}
else
	die("Failed to open zip file ($filename)!");
echo '[DONE]<hr>'. PHP_EOL;
/*******************************************************************/
