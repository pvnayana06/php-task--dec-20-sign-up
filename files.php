<html>
<head>
<title>File</title>
</head> 
<body>
<FORM method="POST">

<input type="submit" name="Submit" value="Read File">
</FORM>

<?php
if(isset($_POST['Submit']))
{
$filename = fopen( "computer.txt", "r" );

if( $filename == true )
{
$filesize = filesize("computer.txt" );
$filecontent = fread( $filename, $filesize );
fclose( $filename );

echo ( " File Content = $filecontent <br>" );
echo ( "File size : $filesize bytes" );
}
else
{ 
echo "Error !! Try again" ;
} 
}
?>

</body>
</html>