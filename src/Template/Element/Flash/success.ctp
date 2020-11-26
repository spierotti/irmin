<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="success col-sm-10">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <strong> <?= $message ?></strong>
</div>
