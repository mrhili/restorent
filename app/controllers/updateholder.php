


//IAM IN


//MODIFIED



//$framework_tools::debug($framework_security::isOnlyChef() &&  ($ordering->user_id != $_SESSION['id']) );
































//%




////////////////////////////////////////////AFTER































if( count($_POST['arounds']) != 0  ){




    foreach( $arounds as $around ){



    $table_around_ordering = $framework_quick_query::insert('around_ordering',[

        'ordering_id' => $table_ordering['row_id'],
        'around_id' => $around
    ]);


    }




    if(is_array($table_around_ordering)){

    $good['around_ordering'] = True;

    }



}else{
$good['around_ordering'] = True;
}



foreach( $past_arounds as $ps ){
    $framework_quick_query::dropBy('around_ordering', ['around_id' => $ps] );
}





//$framework_tools::debug( $table );




if( $good['around_ordering']  && $good['ordering']){


    //GO SEE THE ORDERING

    $framework_route::go('../../views/back/showmeal', $framework_route::parameterizer( ['i' => $table_ordering['row_id']   ])  );



}else{
    $framework_tools::debug($table_ordering);
    $table_around_ordering;
}
















































