<h1>Add III Check Digits</h1>
<?php
include ('CheckDigits.class.php');
$check = new CheckDigits;

if (array_key_exists('records',$_REQUEST)) {
    $lines = explode("\n", str_replace("\r", "", $_REQUEST['records']));
    foreach ($lines as $line) {
        print ($check->Calculate($line). '<br />'.PHP_EOL);
    }
}

?>
<form id="inputs">
<input type="submit" value="Submit" /><br />
<textarea cols="10" rows="10" name="records"></textarea>
</form>