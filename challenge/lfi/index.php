
<?php

$file = $_GET['page'];

if( isset( $file ) )
  include( $file );
else {
  header( 'Location:?page=include.php' );
  exit;
}

?>
</body>
<html>
