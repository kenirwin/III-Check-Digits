<?php
/* usage: 
$test = new CheckDigits;
print ($test->Calculate('b1024364')); // prints b10243641
var_dump ($test->Validate('b10243641')); // prints true
var_dump ($test->Validate('b1024364x')); // prints false
*/

class CheckDigits {

    public function Calculate($input) {
        if (preg_match('/b?(\d{7})/', $input, $m)) {
            $seed = $m[1];
            $d = preg_split('//',$seed);
            $sum = ($d[1] * 8) + ($d[2] * 7) + ($d[3] * 6) + ($d[4] * 5) + ($d[5] * 4) + ($d[6] * 3) + ($d[7] *2);
            $check = $sum % 11;
            if ($check == 10) { $check = 'x'; }
            return $seed . $check;
        }
    }
    
    public function Validate($input) {
        if (preg_match('/b?(\d{7})(.)/', $input, $m)) {
            $seed = $m[1];
            $check = $m[2];
        }
        if ($this->Calculate($seed) == $seed . $check) {
            return true;
        }
        return false;
    }
}

?>