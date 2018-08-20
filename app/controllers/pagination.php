<?php
$bdd = new PDO( 'mysql:host=localhost;dbname=tutoadmin;', 'root', '' );

$perPage = 5;
$totalReq = $bdd->query( 'select id from comments' );
$total = $totalReq->rowCount();
$pagesTotal = ceil( $total/$perPage );

if( isset( $_GET['page'] ) && !empty($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $pagesTotal ) {
	$_GET['page'] = intval($_GET['page']);
	$currentPage = $_GET['page'];
} else {
	$currentPage = 1;
}

$start = ($currentPage - 1) * $perPage;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>pagination</title>
</head>
<body>
	<?php 
	$comments = $bdd->query( 'select * from comments order by id desc limit' . $start . ',' . $perPage );

	while( $comment = $comments->fetch() ) {
	?>
	<b><?= $comment['author'] ?></b><time> Le <?= $comment['created_at'] ?></time>
	<p><?= $comment['comment'] ?></p>
	<?php	
	}
	?>
	<?php 
    for( $i = 1;$i <= $pagesTotal;$i++ ) {
    	if( $i == $currentPage ) {
    		echo $i . ' ';
    	} else {
    		echo '<a href="pagination.php?page=' . $i .'">' . $i . '</a>';
    	}
    }
	?>

</body>
</html>

