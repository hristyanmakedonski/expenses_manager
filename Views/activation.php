<?php require_once '../Other/ActivationCode.php';
$account = new ActivationCode();
if($account->activation($_GET)):?>
        <h1>The accaunt was succesfully activated</h1>
        <a href='/ExpensesManager'>login</a>
<?php else: ?>
        <h1>Invalid activation code</h1>
<?php endif; ?>