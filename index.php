<?php

function getShortestArray($inputNumber) {
    $arrayResult = [];
    $maxArrayNumber = 8; // it could be a second parameter to function
    
    // check if input is 0 or if input is greater or equal to max number
    if ($inputNumber === 0 || $inputNumber <= $maxArrayNumber) {
    	$arrayResult[] = $inputNumber;
    } else {
    	$remainder = null;

        // if modulo isn't 0 than get remainder, than deduct remainder from input number
        if ($inputNumber % $maxArrayNumber !== 0) {
            $remainder = $inputNumber % $maxArrayNumber;
            $inputNumber -= $remainder;
        }

        //  if modulo is 0 get quantity of max number in input number and add to array
        if ($inputNumber % $maxArrayNumber === 0) {
            $quantityOfEight = $inputNumber / $maxArrayNumber;
            for ($i = 0; $i < $quantityOfEight; $i++) {
                $arrayResult[] = $maxArrayNumber;
            }
        }

        // add remainder to the end of array to get desc sort
        if ($remainder) {
            $arrayResult[] = $remainder;
        }
    }
    
    return $arrayResult;
}

try {
    $inputNumber = 39;
    // check if input is an integer
    if (!is_int($inputNumber)) {
        throw new Exception('Input must be an integer.');
    }

    // check if input is an positive integer
    if ($inputNumber < 0) {
       throw new Exception('Interger cannot be negative.');
    }

    echo '<pre>';
    print_r(getShortestArray($inputNumber));
    echo '</pre>';
} catch (Exception $e) {
    echo  $e->getMessage();
}

?>