<?php

class QuickQuery extends InitDB{



    public static function insert($table , Array $columns ){
        $conn = self::init();


        try{
            //note, costumer_id, size_id, type_id, user_id, price

            $questions = '';
            $counter= 1;

            foreach($columns as $column){

                $questions.=' ? ';



                if( $counter != count( $columns ) ){

                    $questions.=' , ';
    
                }

                $counter++;

            }
            $sql = "INSERT INTO ".$table." ( ".implode( ", ", array_keys($columns) )." ) VALUES(".$questions.")";

            ////self::debug( $sql );
            $table_insert = $conn->prepare($sql)->execute(array_values($columns));
        
            $row_id = $conn->lastInsertId();

            return ['row_id' => $row_id , 'table_insert' => $table_insert ];


        }catch(PDOException $e){
            self::write($e);
            return null;
        }
        
    }


    public static function first($table , $id , $rows ='*' ){
        $conn = self::init();
        if( is_array( $rows ) ){
            $rows = implode( ", ", $rows );
        }
        $sql = "SELECT ".$rows." FROM ".$table." WHERE id = ?";
        try{
            $query = $conn->prepare($sql);
            $query->execute([$id]);
            return $query->fetch()[0];
        }catch(PDOException $e){
            
            self::write($e);
        }
    }

    public static function first_row($table , $id , $rows ='*' ){
        $conn = self::init();
        if( is_array( $rows ) ){
            $rows = implode( ", ", $rows );
        }
        $sql = "SELECT ".$rows." FROM ".$table." WHERE id = ?";
        try{
        $query = $conn->prepare($sql);
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);

        }catch(PDOException $e){
                
            self::write($e);
        }
    }


    public static function first_rowBy($table ,Array $columns, $rows ='*' ){
        $conn = self::init();
        $counter = 1;
        $string = '';


        
        if( is_array( $rows ) ){
            $rows = implode( ", ", $rows );
        }

        $sql = "SELECT ".$rows." FROM ".$table;


        //(key = :key AND key2 = :key2)
        foreach($columns as $key => $column ){
            $string.= '('.$key.'= :'. $key.')';

            if($counter != 1 && $counter != count( $columns ) ){

                $string.=' AND ';

            }

            
            $counter++;

        }

        $sql .= ' WHERE '.$string;


        try{

            $query = $conn->prepare($sql);
            //self::debug($string);
            //self::debug($sql);
            
            $counter = null;$string = null;

            $query->execute($columns);

            //$var = '{"key":"item"}'
            // echo = $var->key
            // item
            return $query->fetchAll(PDO::FETCH_OBJ);


        }catch(PDOException $e){
            
            self::write($e);
        }







        

        $query = $conn->prepare($sql);
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public static function rows($table , $columns='' , $rows ='*' ){
        
        
        $conn = self::init();
        $counter = 1;
        $string = '';
        if( is_array( $rows ) ){
            $rows = implode( ", ", $rows );
        }
        $sql = "SELECT ".$rows." FROM ".$table;
        if( is_array( $columns ) ){
            //self::debug( $columns );
            
           //(key = :key AND key2 = :key2)
            foreach($columns as $key => $column ){
                $string.= '('.$key.'= :'. $key.')';
    
                if($counter != 1 && $counter != count( $columns ) ){
    
                    $string.=' AND ';
    
                }
    
                
                $counter++;
    
            }

            //WHERE (key = :key AND key2 = :key2) 
            $sql .= ' WHERE '.$string;
            
        }elseif( $columns != '' && !is_array( $columns)  ){
            $sql .= ' WHERE '.$columns;
        }
        
        try{
        $query = $conn->prepare($sql);
        //self::debug($string);
        //self::debug($sql);
        
        $counter = null;$string = null;
        if( is_array( $columns ) ){
            //key => item
            //self::debug($columns);
            $query->execute($columns);
        }else{
            $query->execute(  );
        }
        
        return $query->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            
            self::write($e);
        }
    }
}
$framework_quick_query = new QuickQuery();