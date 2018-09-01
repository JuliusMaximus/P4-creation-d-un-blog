<?php
// Gestion de la communication avec la BDD
class DB extends PDO {
  const DSN = 'mysql:host=localhost;dbname=tutoadmin';
  const USER = 'root';
  const PASSWORD = '';

  public function __construct() {
    try {
      parent::__construct( self::DSN, self::USER, self::PASSWORD );
    }
    catch ( PDOException $e ) {
      die( 'Erreur : ' . $e->getMessage() );
    }
  }

  public static function select ( string $query, array $params = [] ) : array {
    $bdd = new DB;

    if ( $params ) {
      $req = $bdd->prepare( $query );
      $req->execute( $params );
    }
    else {
      $req = $bdd->query( $query );
    }

    $data = $req->fetchAll();

    return $data;
  }

  public static function selectAndCount ( string $query ) : int {
    $bdd = new DB;

    $req = $bdd->query( $query );
    $result = $req->fetchAll();
    $row = count( $result );

    return $row;
  }

  public static function update ( string $query, array $params = [] ) : int {
    $bdd = new DB;

    if ( $params ) {
      $req = $bdd->prepare( $query );
      $req->execute( $params );
    }
    else {
      $req = $bdd->query( $query );
    }

    $updated = $req->rowCount();

    return $updated;
  }

  public static function insert ( string $query, array $params = [] ) : int {
    $bdd = new DB;

    if ( $params ) {
      $req = $bdd->prepare( $query );
      $req->execute( $params );
    }
    else {
      $req = $bdd->query( $query );
    }

    $inserted = $req->rowCount();

    return $inserted;
  }

  public static function delete ( string $query, array $params = [] ) : int {
    $bdd = new DB;

    if ( $params ) {
      $req = $bdd->prepare( $query );
      $req->execute( $params );
    }
    else {
      $req = $bdd->query( $query );
    }

    $deleted = $req->rowCount();

    return $deleted;
  }
}
