<?php

class calculateCalibration
{
    public function calculateCalibration($input)
    {
        // we do an array with the values and the empty values
        $inputIntoArray = preg_split("/[\n]+/", $input);

        // remove empty break line
        $inputIntoArray = array_map('trim', $inputIntoArray);

        $numbers = [];

        foreach ($inputIntoArray as $string)
        {
            $strlength = strlen($string);
            $indexes = [];
            for ($index = 0;  $index < $strlength; $index++)
            {
                $char = substr($string, $index, 1);

                if (is_numeric($char))
                {
                    $indexes[] = $index;
                }
            }
            
            $min = min($indexes);
            $max = max($indexes);
            
            $firstDigit = substr($string, $min, 1);
            $lastDigit = substr($string, $max, 1);

            $numbers[] = $firstDigit.$lastDigit;
        }

        // first star => 54573
        return array_sum($numbers);
    }
}