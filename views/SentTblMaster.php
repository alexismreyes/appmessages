<?php

namespace PHPMaker2023\appmessage;

// Table
$sent_tbl = Container("sent_tbl");
?>
<?php if ($sent_tbl->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_sent_tblmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($sent_tbl->datetime_sent->Visible) { // datetime_sent ?>
        <tr id="r_datetime_sent"<?= $sent_tbl->datetime_sent->rowAttributes() ?>>
            <td class="<?= $sent_tbl->TableLeftColumnClass ?>"><?= $sent_tbl->datetime_sent->caption() ?></td>
            <td<?= $sent_tbl->datetime_sent->cellAttributes() ?>>
<span id="el_sent_tbl_datetime_sent">
<span<?= $sent_tbl->datetime_sent->viewAttributes() ?>>
<?= $sent_tbl->datetime_sent->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($sent_tbl->fk_id_message->Visible) { // fk_id_message ?>
        <tr id="r_fk_id_message"<?= $sent_tbl->fk_id_message->rowAttributes() ?>>
            <td class="<?= $sent_tbl->TableLeftColumnClass ?>"><?= $sent_tbl->fk_id_message->caption() ?></td>
            <td<?= $sent_tbl->fk_id_message->cellAttributes() ?>>
<span id="el_sent_tbl_fk_id_message">
<span<?= $sent_tbl->fk_id_message->viewAttributes() ?>>
<?= $sent_tbl->fk_id_message->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
