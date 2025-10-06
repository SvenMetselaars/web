<?php
    $result = "0";
    $hexaresult = "0";
    $decresult = "0";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        extract($_POST);
        // for the hexadecimal > decimal
        if($hexa == "hex")
        {   
            if ($dectohexa == "dechex")
            {   
                    $rounder = "0";
                // if cosen option NOT EQUALS wortel AND one of both inputs is empty
                if($operator != "wortel" &&  $operator != "select" && $operator != "krone" && $operator != "euro" && ($number1 == "" || $number2 == ""))
                {
                    $result = "Please fill in both numbers!!";
                }
                // when option is wortel
                elseif($operator == "wortel" && $number1 != "" && $number2 == "")
                {
                    $hexaresult = sqrt($number1); 
                }
                elseif($operator == "wortel" && $number2 != "" && $number1 == "")
                {
                    $hexaresult = sqrt($number2); 
                }
                elseif($operator == "wortel" && ($number1 == "" ))
                {
                    $hexaresult = "please fill in a number"; 
                    // when operator isnt selected yet
                }
                elseif($operator == "wortel" && $number1 < 0 && $number2 == "")
                {
                    $result = "please fill in a higher number"; 
                    // when operator isnt selected yet
                }
                elseif($operator == "wortel" && $number2 < 0 && $number1 == "")
                {
                    $result = "please fill in a higher number"; 
                    // when operator isnt selected yet
                }
                elseif($operator == "krone" && $number1 =="" && $number2 == "")
                {
                    $result = "please fill in a number";
                }
                elseif($operator == "krone" && $number1 !="" && $number2 != "")
                {
                    $result = "please only fill in one number";
                }
                elseif($operator == "krone" && $number1 !="")
                {
                    $hexaresult = ($number1 * 1.47);
                }
                elseif($operator == "krone" && $number2 !="")
                {
                    $hexaresult = ($number2 * 1.47);
                }
                elseif($operator == "euro" && $number1 =="" && $number2 == "")
                {
                    $result = "please fill in a number";
                }
                elseif($operator == "euro" && $number1 !="" && $number2 != "")
                {
                    $result = "please only fill in one number";
                }
                elseif($operator == "euro" && $number1 !="")
                {
                    $hexaresult = round(($number1 / 1.47), $rounder);
                }
                elseif($operator == "euro" && $number2 !="")
                {
                    $hexaresult = round(($number2 / 1.47), $rounder);
                }
                elseif($operator == "select" && ($number1 != "" && $number2 != ""))
                {
                    $result = "please fill in an operator";
                }
                elseif($operator != "select" && $conversion1 != "select_con1" && $conversion2 != "select_con2")
                {
                    $result = "please only use one";
                }
                elseif($operator == "select" && ($number1 != "" && $number2 != ""))
                {
                    $result = "please fill in an operator";
                }
                elseif($operator == "select" && ($conversion1 == "select_con1"  || $conversion2 == "select_con2"))
                {
                    $result = "please fill in both converters";
                }
                elseif($operator == "select" && $conversion1 != "select_con1"  && $conversion2 != "select_con2")
                {
                    if($conversion1 == $conversion2)
                    {
                        $result = "cant convert to the same unit";
                    }
                    elseif($number1 == "" && $number2 == "")
                    {
                        $result = "please fill in a number";
                    }
                    elseif($number1 != "" && $number2 != "")
                    {
                        $result = "please fill in only one number";
                    }
                    elseif($number1 != "" && $number2 == "")
                    {
                        if($conversion1 == "mm1")
                        {
                            if($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number1 / 10), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number1 / 100), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number1 / 1000), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number1 / 10000), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $hexaresult = round(($number1 / 100000), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number1 / 1000000), $rounder);
                            }
                        }
                        elseif($conversion1 == "cm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number1 * 10), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number1 / 10), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number1 / 100), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number1 / 1000), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $hexaresult = round(($number1 / 10000), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number1 / 100000), $rounder);
                            }
                        }
                        elseif($conversion1 == "dm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number1 * 100), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number1 * 10), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number1 / 10), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number1 / 100), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $hexaresult = round(($number1 / 1000), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number1 / 10000), $rounder);
                            }
                        }
                        elseif($conversion1 == "m1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number1 * 1000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number1 * 100), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number1 * 10), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number1 / 10), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $hexaresult = round(($number1 / 100), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number1 / 1000), $rounder);
                            }
                        }
                        elseif($conversion1 == "dam1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number1 * 10000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number1 * 1000), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number1 * 100), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number1 * 10), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $hexaresult = round(($number1 / 10), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number1 / 100), $rounder);
                            }
                        }
                        elseif($conversion1 == "hm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number1 * 100000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number1 * 10000), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number1 * 1000), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number1 * 100), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number1 * 10), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number1 / 10), $rounder);
                            }
                        }
                        elseif($conversion1 == "km1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number1 * 1000000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number1 * 100000), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number1 * 10000), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number1 * 1000), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number1 * 100), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number1 * 10), $rounder);
                            }
                        }
                    }
                    elseif($number1 == "" && $number2 != "")
                    {
                        if($conversion1 == "mm1")
                        {
                            if($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number2 / 10), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number2 / 100), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number2 / 1000), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number2 / 10000), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $hexaresult = round(($number2 / 100000), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number2 / 1000000), $rounder);
                            }
                        }
                        elseif($conversion1 == "cm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number2 * 10), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number2 / 10), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number2 / 100), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number2 / 1000), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $hexaresult = round(($number2 / 10000), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number2 / 100000), $rounder);
                            }
                        }
                        elseif($conversion1 == "dm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number2 * 100), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number2 * 10), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number2 / 10), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number2 / 100), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $hexaresult = round(($number2 / 1000), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number2 / 10000), $rounder);
                            }
                        }
                        elseif($conversion1 == "m1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number2 * 1000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number2 * 100), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number2 * 10), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number2 / 10), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $hexaresult = round(($number2 / 100), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number2 / 1000), $rounder);
                            }
                        }
                        elseif($conversion1 == "dam1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number2 * 10000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number2 * 1000), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number2 * 100), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number2 * 10), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $hexaresult = round(($number2 / 10), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number2 / 100), $rounder);
                            }
                        }
                        elseif($conversion1 == "hm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number2 * 100000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number2 * 10000), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number2 * 1000), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number2 * 100), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number2 * 10), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number2 / 10), $rounder);
                            }
                        }
                        elseif($conversion1 == "km1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $hexaresult = round(($number2 * 1000000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $hexaresult = round(($number2 * 100000), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $hexaresult = round(($number2 * 10000), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $hexaresult = round(($number2 * 1000), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $hexaresult = round(($number2 * 100), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $hexaresult = round(($number2 * 10), $rounder);
                            }
                        }
                    }
                }    // in other cases...
                else
                {
                    switch($operator)
                    {  
                        
                        case "plus": 
                            $hexaresult = ($number1 + $number2);
                        break;
                        case "min":
                            $hexaresult = ($number1 - $number2);
                        break;
                        case "keer": 
                            $hexaresult = ($number1 * $number2);
                        break;    
                        case "div":
                            if($number2 != 0)
                            {
                                $hexaresult = ($number1 / $number2);
                            }
                            else
                            {
                                // so people dont divide by zero
                                $result = "Cannot divide by zero!";
                            }
                            
                        break;
                        case "macht":
                            if($number2 < 0)
                            {
                                $result = "cant have a negative number here";
                            }
                            else
                            { 
                                $hexaresult = (pow($number1, $number2));
                            }
                        break;
                                
                    }
                }
            }
            elseif($dectohexa == "hexdec")
            {
                    $rounder = "0";
                // if cosen option NOT EQUALS wortel AND one of both inputs is empty
                if($operator != "wortel" &&  $operator != "select" && $operator !="krone" && $operator !="euro" && ($number1 == "" || $number2 == ""))
                {
                    $result = "Please fill in both numbers!!";
                }
                // when option is wortel
                elseif($operator == "wortel" && $number1 != "" && $number2 == "")
                {
                    $decresult = sqrt($number1); 
                }
                elseif($operator == "wortel" && $number2 != "" && $number1 == "")
                {
                    $decresult = sqrt($number2); 
                }
                elseif($operator == "wortel" && ($number1 == "" ))
                {
                    $decresult = "please fill in a number"; 
                    // when operator isnt selected yet
                }
                elseif($operator == "wortel" && $number1 < 0 && $number2 == "")
                {
                    $result = "please fill in a higher number"; 
                    // when operator isnt selected yet
                }
                elseif($operator == "wortel" && $number2 < 0 && $number1 == "")
                {
                    $result = "please fill in a higher number"; 
                    // when operator isnt selected yet
                }
                elseif($operator == "krone" && $number1 =="" && $number2 == "")
                {
                    $result = "please fill in a number";
                }
                elseif($operator == "krone" && $number1 !="" && $number2 != "")
                {
                    $result = "please only fill in one number";
                }
                elseif($operator == "krone" && $number1 !="")
                {
                    $decresult = round(($number1 * 1.47), $rounder);
                }
                elseif($operator == "krone" && $number2 !="")
                {
                    $decresult = round(($number2 * 1.47), $rounder);
                }
                elseif($operator == "euro" && $number1 =="" && $number2 == "")
                {
                    $result = "please fill in a number";
                }
                elseif($operator == "euro" && $number1 !="" && $number2 != "")
                {
                    $result = "please only fill in one number";
                }
                elseif($operator == "euro" && $number1 !="")
                {
                    $decresult = round(($number1 / 1.47), $rounder);
                }
                elseif($operator == "euro" && $number2 !="")
                {
                    $decresult = round(($number2 / 1.47), $rounder);
                }
                elseif($operator == "select" && ($number1 != "" && $number2 != ""))
                {
                    $result = "please fill in an operator";
                }
                elseif($operator != "select" && $conversion1 != "select_con1" && $conversion2 != "select_con2")
                {
                $result = "please only use one";
                }
                elseif($operator == "select" && ($number1 != "" && $number2 != ""))
                {
                $result = "please fill in an operator";
                }
                elseif($operator == "select" && ($conversion1 == "select_con1"  || $conversion2 == "select_con2"))
                {
                $result = "please fill in both converters";
                }
                elseif($operator == "select" && $conversion1 != "select_con1"  && $conversion2 != "select_con2")
                {
                    if($conversion1 == $conversion2)
                    {
                        $result = "cant convert to the same unit";
                    }
                    elseif($number1 == "" && $number2 == "")
                    {
                        $result = "please fill in a number";
                    }
                    elseif($number1 != "" && $number2 != "")
                    {
                        $result = "please fill in only one number";
                    }
                    elseif($number1 != "" && $number2 == "")
                    {
                        if($conversion1 == "mm1")
                        {
                            if($conversion2 == "cm2")
                            {
                                $decresult = round(($number1 / 10), $rounder) . " cm";
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number1 / 100), $rounder) . " dm";
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number1 / 1000), $rounder) . " m";
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number1 / 10000), $rounder) . " dam";
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $decresult = round(($number1 / 100000), $rounder) . " hm";
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number1 / 1000000), $rounder) . " km";
                            }
                        }
                        elseif($conversion1 == "cm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number1 * 10), $rounder) . " cm";
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number1 / 10), $rounder) . " dm";
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number1 / 100), $rounder) . " m";
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number1 / 1000), $rounder) . " dam";
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $decresult = round(($number1 / 10000), $rounder) . " hm";
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number1 / 100000), $rounder) . " km";
                            }
                        }
                        elseif($conversion1 == "dm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number1 * 100), $rounder) . " cm";
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $decresult = round(($number1 * 10), $rounder) . " dm";
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number1 / 10), $rounder) . " m";
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number1 / 100), $rounder) . " dam";
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $decresult = round(($number1 / 1000), $rounder) . " hm";
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number1 / 10000), $rounder) . " km";
                            }
                        }
                        elseif($conversion1 == "m1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number1 * 1000), $rounder) . " cm";
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $decresult = round(($number1 * 100), $rounder) . " dm";
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number1 * 10), $rounder) . " m";
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number1 / 10), $rounder) . " dam";
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $decresult = round(($number1 / 100), $rounder) . " hm";
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number1 / 1000), $rounder) . " km";
                            }
                        }
                        elseif($conversion1 == "dam1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number1 * 10000), $rounder) . " cm";
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $decresult = round(($number1 * 1000), $rounder) . " dm";
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number1 * 100), $rounder) . " m";
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number1 * 10), $rounder) . " dam";
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $decresult = round(($number1 / 10), $rounder) . " hm";
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number1 / 100), $rounder) . " km";
                            }
                        }
                        elseif($conversion1 == "hm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number1 * 100000), $rounder) . " cm";
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $decresult = round(($number1 * 10000), $rounder) . " dm";
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number1 * 1000), $rounder) . " m";
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number1 * 100), $rounder) . " dam";
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number1 * 10), $rounder) . " hm";
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number1 / 10), $rounder) . " km";
                            }
                        }
                        elseif($conversion1 == "km1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number1 * 1000000), $rounder) . " cm";
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $decresult = round(($number1 * 100000), $rounder) . " dm";
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number1 * 10000), $rounder) . " m";
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number1 * 1000), $rounder) . " dam";
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number1 * 100), $rounder) . " hm";
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number1 * 10), $rounder) . " km";
                            }
                        }
                    }
                    elseif($number1 == "" && $number2 != "")
                    {
                        if($conversion1 == "mm1")
                        {
                            if($conversion2 == "cm2")
                            {
                                $decresult = round(($number2 / 10), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number2 / 100), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number2 / 1000), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number2 / 10000), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $decresult = round(($number2 / 100000), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number2 / 1000000), $rounder);
                            }
                        }
                        elseif($conversion1 == "cm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number2 * 10), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number2 / 10), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number2 / 100), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number2 / 1000), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $decresult = round(($number2 / 10000), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number2 / 100000), $rounder);
                            }
                        }
                        elseif($conversion1 == "dm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number2 * 100), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $decresult = round(($number2 * 10), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number2 / 10), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number2 / 100), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $decresult = round(($number2 / 1000), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number2 / 10000), $rounder);
                            }
                        }
                        elseif($conversion1 == "m1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number2 * 1000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $decresult = round(($number2 * 100), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number2 * 10), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number2 / 10), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $decresult = round(($number2 / 100), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number2 / 1000), $rounder);
                            }
                        }
                        elseif($conversion1 == "dam1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number2 * 10000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $decresult = round(($number2 * 1000), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number2 * 100), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number2 * 10), $rounder);
                            }
                            elseif($conversion2 == "hm2")
                            {
                                $decresult = round(($number2 / 10), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number2 / 100), $rounder);
                            }
                        }
                        elseif($conversion1 == "hm1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number2 * 100000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $decresult = round(($number2 * 10000), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number2 * 1000), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number2 * 100), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number2 * 10), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number2 / 10), $rounder);
                            }
                        }
                        elseif($conversion1 == "km1")
                        {
                            if($conversion2 == "mm2")
                            {
                                $decresult = round(($number2 * 1000000), $rounder);
                            }
                            elseif($conversion2 == "cm2")
                            {
                                $decresult = round(($number2 * 100000), $rounder);
                            }
                            elseif($conversion2 == "dm2")
                            {
                                $decresult = round(($number2 * 10000), $rounder);
                            }
                            elseif($conversion2 == "m2")
                            {
                                $decresult = round(($number2 * 1000), $rounder);
                            }
                            elseif($conversion2 == "dam2")
                            {
                                $decresult = round(($number2 * 100), $rounder);
                            }
                            elseif($conversion2 == "km2")
                            {
                                $decresult = round(($number2 * 10), $rounder);
                            }
                        }
                    }
                }
                // in other cases...
                else
                {
                    switch($operator)
                    {  
                        
                        case "plus": 
                            $decresult = ($number1 + $number2);
                        break;
                        case "min":
                            $decresult = ($number1 - $number2);
                        break;
                        case "keer": 
                            $decresult = ($number1 * $number2);
                        break;    
                        case "div":
                            if($number2 != 0)
                            {
                                $decresult = ($number1 / $number2);
                            }
                            else
                            {
                                // so people dont divide by zero
                                $result = "Cannot divide by zero!";
                            }
                            
                        break;
                        case "macht":
                            if($number2 < 0)
                            {
                                $result = "cant have a negative number here";
                            }
                            else
                            { 
                                $decresult = (pow($number1, $number2));
                            }
                        break;
                            
                    }
                }
                }
            }
        // for decimal > hexadecimal
        elseif ($hexa == "dec")
        {

            if($rounder == "")
            { 
                $rounder = "10";
            }
            // if cosen option NOT EQUALS wortel AND one of both inputs is empty
            if($operator != "wortel" && $operator != "select" && $operator != "krone" && $operator != "euro" && ($number1 == "" || $number2 == ""))
            {
                $result = "Please fill in both numbers!!";
            }
            // when option is wortel
            elseif($operator == "wortel" && $number1 != "" && $number2 == "")
            {
                $result = sqrt($number1); 
            }
            elseif($operator == "wortel" && $number2 != "" && $number1 == "")
            {
                $result = sqrt($number2); 
            }
            elseif($operator == "wortel" && ($number1 == "" ))
            {
                $result = "please fill in a number"; 
                // when operator isnt selected yet
            }
            elseif($operator == "wortel" && $number1 < 0 && $number2 == "")
            {
                $result = "please fill in a higher number"; 
                // when you try lower than 0
            }
            elseif($operator == "wortel" && $number2 < 0 && $number1 == "")
            {
                $result = "please fill in a higher number"; 
                // when you try lower than 0
            }
            // if they didnt fill in a number
            elseif($operator == "krone" && $number1 =="" && $number2 == "")
            {
                $result = "please fill in a number";
            }
            // if thye filled in both numbers
            elseif($operator == "krone" && $number1 !="" && $number2 != "")
            {
                $result = "please only fill in one number";
            }
            // if they did one number
            elseif($operator == "krone" && $number1 !="")
            {
                $result = round(($number1 * 1.47), $rounder) . " krone";
            }
            // if they did the second number
            elseif($operator == "krone" && $number2 !="")
            {
                $result = round(($number2 * 1.47), $rounder) . " krone";
            }
            // same is krone
            elseif($operator == "euro" && $number1 =="" && $number2 == "")
            {
                $result = "please fill in a number";
            }
            elseif($operator == "euro" && $number1 !="" && $number2 != "")
            {
                $result = "please only fill in one number";
            }
            elseif($operator == "euro" && $number1 !="")
            {
                $result = round(($number1 / 1.47), $rounder) . " euro";
            }
            elseif($operator == "euro" && $number2 !="")
            {
                $result = round(($number2 / 1.47), $rounder) . " euro";
            }
            // if they convert and use operator at the same time
            elseif($operator != "select" && $conversion1 != "select_con1" && $conversion2 != "select_con2")
            {
                $result = "please only use one";
            }
            // if they dont use operator
            elseif($operator == "select" && ($number1 != "" && $number2 != ""))
            {
                $result = "please fill in an operator";
            }
            // if they only used one converter
            elseif($operator == "select" && ($conversion1 == "select_con1"  || $conversion2 == "select_con2"))
            {
                $result = "please fill in both converters";
            }
            // if they did it right
            elseif($operator == "select" && $conversion1 != "select_con1"  && $conversion2 != "select_con2")
            {
                // if they chose the same converter twice
                if($conversion1 == $conversion2)
                {
                    $result = "cant convert to the same unit";
                }
                // if they used 2 numbers
                elseif($number1 == "" && $number2 == "")
                {
                    $result = "please fill in a number";
                }
                // if they used no numbers
                elseif($number1 != "" && $number2 != "")
                {
                    $result = "please fill in only one number";
                }
                // if they did the first number
                elseif($number1 != "" && $number2 == "")
                {
                    // convert
                    if($conversion1 == "mm1")
                    {
                        if($conversion2 == "cm2")
                        {
                            $result = round(($number1 / 10), $rounder) . " cm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number1 / 100), $rounder) . " dm";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number1 / 1000), $rounder) . " m";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number1 / 10000), $rounder) . " dam";
                        }
                        elseif($conversion2 == "hm2")
                        {
                            $result = round(($number1 / 100000), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number1 / 1000000), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "cm1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number1 * 10), $rounder) . " cm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number1 / 10), $rounder) . " dm";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number1 / 100), $rounder) . " m";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number1 / 1000), $rounder) . " dam";
                        }
                        elseif($conversion2 == "hm2")
                        {
                            $result = round(($number1 / 10000), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number1 / 100000), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "dm1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number1 * 100), $rounder) . " cm";
                        }
                        elseif($conversion2 == "cm2")
                        {
                            $result = round(($number1 * 10), $rounder) . " dm";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number1 / 10), $rounder) . " m";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number1 / 100), $rounder) . " dam";
                        }
                        elseif($conversion2 == "hm2")
                        {
                            $result = round(($number1 / 1000), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number1 / 10000), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "m1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number1 * 1000), $rounder) . " cm";
                        }
                        elseif($conversion2 == "cm2")
                        {
                            $result = round(($number1 * 100), $rounder) . " dm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number1 * 10), $rounder) . " m";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number1 / 10), $rounder) . " dam";
                        }
                        elseif($conversion2 == "hm2")
                        {
                            $result = round(($number1 / 100), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number1 / 1000), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "dam1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number1 * 10000), $rounder) . " cm";
                        }
                        elseif($conversion2 == "cm2")
                        {
                            $result = round(($number1 * 1000), $rounder) . " dm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number1 * 100), $rounder) . " m";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number1 * 10), $rounder) . " dam";
                        }
                        elseif($conversion2 == "hm2")
                        {
                            $result = round(($number1 / 10), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number1 / 100), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "hm1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number1 * 100000), $rounder) . " cm";
                        }
                        elseif($conversion2 == "cm2")
                        {
                            $result = round(($number1 * 10000), $rounder) . " dm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number1 * 1000), $rounder) . " m";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number1 * 100), $rounder) . " dam";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number1 * 10), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number1 / 10), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "km1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number1 * 1000000), $rounder) . " cm";
                        }
                        elseif($conversion2 == "cm2")
                        {
                            $result = round(($number1 * 100000), $rounder) . " dm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number1 * 10000), $rounder) . " m";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number1 * 1000), $rounder) . " dam";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number1 * 100), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number1 * 10), $rounder) . " km";
                        }
                    }
                }
                elseif($number1 == "" && $number2 != "")
                {
                    if($conversion1 == "mm1")
                    {
                        if($conversion2 == "cm2")
                        {
                            $result = round(($number2 / 10), $rounder) . " cm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number2 / 100), $rounder) . " dm";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number2 / 1000), $rounder) . " m";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number2 / 10000), $rounder) . " dam";
                        }
                        elseif($conversion2 == "hm2")
                        {
                            $result = round(($number2 / 100000), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number2 / 1000000), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "cm1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number2 * 10), $rounder) . " cm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number2 / 10), $rounder) . " dm";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number2 / 100), $rounder) . " m";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number2 / 1000), $rounder) . " dam";
                        }
                        elseif($conversion2 == "hm2")
                        {
                            $result = round(($number2 / 10000), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number2 / 100000), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "dm1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number2 * 100), $rounder) . " cm";
                        }
                        elseif($conversion2 == "cm2")
                        {
                            $result = round(($number2 * 10), $rounder) . " dm";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number2 / 10), $rounder) . " m";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number2 / 100), $rounder) . " dam";
                        }
                        elseif($conversion2 == "hm2")
                        {
                            $result = round(($number2 / 1000), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number2 / 10000), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "m1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number2 * 1000), $rounder) . " cm";
                        }
                        elseif($conversion2 == "cm2")
                        {
                            $result = round(($number2 * 100), $rounder) . " dm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number2 * 10), $rounder) . " m";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number2 / 10), $rounder) . " dam";
                        }
                        elseif($conversion2 == "hm2")
                        {
                            $result = round(($number2 / 100), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number2 / 1000), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "dam1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number2 * 10000), $rounder) . " cm";
                        }
                        elseif($conversion2 == "cm2")
                        {
                            $result = round(($number2 * 1000), $rounder) . " dm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number2 * 100), $rounder) . " m";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number2 * 10), $rounder) . " dam";
                        }
                        elseif($conversion2 == "hm2")
                        {
                            $result = round(($number2 / 10), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number2 / 100), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "hm1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number2 * 100000), $rounder) . " cm";
                        }
                        elseif($conversion2 == "cm2")
                        {
                            $result = round(($number2 * 10000), $rounder) . " dm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number2 * 1000), $rounder) . " m";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number2 * 100), $rounder) . " dam";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number2 * 10), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number2 / 10), $rounder) . " km";
                        }
                    }
                    elseif($conversion1 == "km1")
                    {
                        if($conversion2 == "mm2")
                        {
                            $result = round(($number2 * 1000000), $rounder) . " cm";
                        }
                        elseif($conversion2 == "cm2")
                        {
                            $result = round(($number2 * 100000), $rounder) . " dm";
                        }
                        elseif($conversion2 == "dm2")
                        {
                            $result = round(($number2 * 10000), $rounder) . " m";
                        }
                        elseif($conversion2 == "m2")
                        {
                            $result = round(($number2 * 1000), $rounder) . " dam";
                        }
                        elseif($conversion2 == "dam2")
                        {
                            $result = round(($number2 * 100), $rounder) . " hm";
                        }
                        elseif($conversion2 == "km2")
                        {
                            $result = round(($number2 * 10), $rounder) . " km";
                        }
                    }
                }
            }
            // in other cases...
            else
            {
                switch($operator)
                {  
                    // if they did plus
                    case "plus": 
                        $result = $number1 . " + " . $number2 . " = " . round(($number1 + $number2), $rounder);
                    break;
                    // if they did min
                    case "min":
                        $result = $number1 . " - " . $number2 . " = " . round(($number1 - $number2), $rounder);
                    break;
                    // if they did keer
                    case "keer": 
                        $result = $number1 . " * " . $number2 . " = " . round(($number1 * $number2), $rounder);
                    break;    
                    // if they did div
                    case "div":
                        if($number2 != 0)
                        {
                            $result = $number1 . " / " . $number2 . " = " . round(($number1 / $number2), $rounder);
                        }
                        else
                        {
                            // so people dont divide by zero
                            $result = "Cannot divide by zero!";
                        }
                        
                    break;
                    // if they did macht
                    case "macht":
                        // cant use macht and lower than 0
                        if($number2 < 0)
                        {
                            $result = "cant have a negative number here";
                        }
                        // if they did it right
                        else
                        { 
                            $result = $number1 . " ^ " . $number2 . " = " . round((pow($number1, $number2)), $rounder);
                        }
                    break;
                }
            }
        }    
      
    }   
?>
<!DOCTYPE html>
<html lang="en" id="calculator">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Sven Metselaars" />
    <title>Calculator</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body id="calculator_body">
    <form action="calculator.php" method="post" class="othersites">
        <!-- to go to other sites -->
        <input Type="button" onclick='window.location = "http://localhost/1ste_periode/91815_BprjWEDE_CD_lj1p1/index.php"' value="homepage" />
        <input Type="button" onclick='window.location = "http://localhost/1ste_periode/91815_BprjWEDE_CD_lj1p1/projects.php"' value="projects" />
        <input Type="button" onclick='window.location = "http://localhost/1ste_periode/91815_BprjWEDE_CD_lj1p1/contact.php"' value="contact" />
    </form>
    <br />
    <form action="calculator.php" method="post" class="calculator_form">
    <div id="php"> 
    <?php
    //for result
        echo "dec: ";
        echo $result;
    ?>
    </div>
        <select name="hexa" id="hexa">
            <!-- to select hexa options -->
            <option>dec</option>
            <option>hex</option>
        </select>
        <select name="dectohexa" id="dec">
            <!-- to select other hexa option -->
            <option value="dechex">dec > hex</option>
            <option value="hexdec">hex > dec</option>
        </select>
        <br />
        <div class="bottomContainer">
        <!-- number 1 -->
        <input type="number" name="number1" placeholder="number 1" class="numbers" step="any" autocomplete="off"/>
        <br />
        <select name="operator" id="operators">
            <!-- operators -->
            <option value="select">Select an option</option>
            <option value="plus">+</option>
            <option value="min">-</option>
            <option value="keer">x</option>
            <option value="div">/</option>
            <option value="macht">^</option>
            <option value="wortel">√</option>
            <option value="krone">euro > krone</option>  
            <option value="euro">krone > euro</option> 
        </select>
        <br />
        <!-- converters  -->
        <div class="conversionDiv">
            <select name="conversion1" class="convertor">
                <option value="select_con1">Select</option>
                <option value="mm1">mm</option>
                <option value="cm1">cm</option>
                <option value="dm1">dm</option>
                <option value="m1">m</option>
                <option value="dam1">dam</option>
                <option value="hm1">hm</option>
                <option value="km1">km</option>
            </select>
            <h3>&rarr;</h3>
            <!-- converters  -->
            <select name="conversion2" class="convertor2">
                <option value="select_con2">Select</option>
                <option value="mm2">mm</option>
                <option value="cm2">cm</option>
                <option value="dm2">dm</option>
                <option value="m2">m</option>
                <option value="dam2">dam</option>
                <option value="hm2">hm</option>
                <option value="km2">km</option>
            </select>
        </div>
        <br />
        <!-- number 2 -->
        <input type="number" name="number2" placeholder="number 2" class="numbers" step="any" autocomplete="off"/>
        <!-- for how many decimals you want -->
        <input type="number" name="rounder" placeholder="decimal places" min = "0" autocomplete="off"/>  
        <br />            
        <!-- to get the awnser button  -->
        <input type="submit" name="mySubmit" value="calculate" />
        <br />
        <!-- reset button -->
        <input type="button" onclick='window.location = "http://localhost/91815_BprjWEDE_CD_lj1p1/calculator.php"' value="reset" class="button"/>
        <br />
        </div>
        <div id="hexaphp">
            <?php 
            // for anwser if they used hex or dec
            echo "hex: ";
            echo dechex($hexaresult);
            echo " dec: ";
            echo hexdec($decresult);
            ?>
        </div>
    </form>
    <!-- this is a comment -->
    <!-- this is a comment -->
    <!-- if i wanted to imply javascript -->
    <!-- <script src="js/main.js"></script> -->
</body>
</html>