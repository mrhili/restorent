<?Php 



$orderings = $framework_ordering_model::getThemWellBy(['user_id' => $_SESSION['id']]) ;

$count = 1;

//$framework_tools::debug($orderings);