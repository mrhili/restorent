<?Php


class Money  extends Utilities{


    //The lowest money
	public static function limit($money)
	{ 
        $limit_money = self::$limit_money;
		return $money > $limit_money? $money : $limit_money ;
	}
}


$framework_money = new Money();