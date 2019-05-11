<?php
class Ordering extends QuickQuery{

    public static $table ="orderings";
    //input -> costumer_id = 1
    //output -> { name:amine, tel: 06060606 }
    public static function getCostumer($id)
	{ 
	  return self::first_row( 'costumers', $id );
    }
    public static function getType($id)
	{ 
    
	  return self::first_row( 'types', $id );
    }
    
    public static function getSize($id)
	{ 
	  return self::first_row( 'sizes', $id );
    }
    public static function getUser($id)
	{ 
	  return self::first_row( 'users', $id );
    }
    
    public static function getArounds($ordering_id)
	{ 

    //[ 'ordering_id' => $ordering_id ]
	  return self::rows( 'around_ordering', compact('ordering_id') );
    }
    public static function getAroundsWell($ordering_id)
	  { 
      $arounds = self::rows( 'around_ordering', compact('ordering_id') );
      //{}
      $new_arounds = new stdClass();
      
      foreach($arounds as $around){
        //$new_arounds->aroundkey_7
        $new_arounds->{ 'aroundkey_'. $around->id } = self::first_row( 'arounds', $around->around_id );
      }
      return $new_arounds;
    }
    public static function getIt($id)
	{ 
	  return self::first_row( self::$table, $id );
    }
    public static function getItWell($id)
	{ 
      //{}
      //[]
      $ordering =  self::getIt($id);
      
      
      $ordering->size = self::getSize($ordering->size_id);
      $ordering->type = self::getType($ordering->type_id);
      $ordering->user = self::getUser($ordering->user_id);
      $ordering->costumer = self::getCostumer($ordering->costumer_id);
      //
      $ordering->arounds = self::getAroundsWell($ordering->id);
      return $ordering;
    }

    
    public static function getThemWell()
    {
      $orderings = self::rows( self::$table );
      
      foreach( $orderings as $ordering ){
        
 
        $ordering->size = self::getSize($ordering->size_id);
        $ordering->type = self::getType($ordering->type_id);
        $ordering->user = self::getUser($ordering->user_id);
        $ordering->costumer = self::getCostumer($ordering->costumer_id);
        $ordering->arounds = self::getAroundsWell($ordering->id);
      }
      return $orderings;
    }


    public static function getThemWellBy(Array $columns)
    {
      $orderings = self::rows( self::$table,$columns );
      //$tools::debug($orderings);
      foreach( $orderings as $ordering ){
        
 
        $ordering->size = self::getSize($ordering->size_id);
        $ordering->type = self::getType($ordering->type_id);
        $ordering->user = self::getUser($ordering->user_id);
        $ordering->costumer = self::getCostumer($ordering->costumer_id);
        $ordering->arounds = self::getAroundsWell($ordering->id);
      }
      return $orderings;
    }
    
}
$framework_ordering_model  = new Ordering();