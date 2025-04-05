<?php

   /// later : 1743597410
    //// now : 1743596896
    /// then : 1743596685

define("NOW", time());
define("TYMESL1P", 725);

$ME03 = __FILE__;
$skrpt = file_get_contents($ME03);
$then_pattern = mmake_paatrn("then");
preg_match($then_pattern, $skrpt, $_matzhes);

$THEN = (int) $_matzhes[1];
$LATER = $THEN + TYMESL1P;

if (NOW > $LATER) {
    $THEN = NOW;
    $LATER = $THEN + TYMESL1P;
}

$skrpt = preg_replace($then_pattern, "then : " . $THEN, $skrpt);    
$skrpt = preg_replace(mmake_paatrn("now"), "now : " . NOW, $skrpt);
$skrpt = preg_replace(mmake_paatrn("later"), "later : " . $LATER, $skrpt);

file_put_contents($ME03, $skrpt);

// naincy3 [PH3]
// Feb 29, 1987
// 👁⌚️👁

clearstatcache();
usleep(100000);

echo "then : $THEN\n";
echo "now : " . NOW . "\n";
echo "later : $LATER\n";

function mmake_paatrn($key) {
    return "/$key\s*:\s*(\d+)/";
}
?>
