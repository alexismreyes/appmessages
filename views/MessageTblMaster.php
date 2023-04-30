<?php

namespace PHPMaker2023\appmessage;

// Table
$message_tbl = Container("message_tbl");
?>
<?php if ($message_tbl->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_message_tblmaster" class="table ew-view-table ew-master-table ew-vertical">
    <tbody>
<?php if ($message_tbl->created_at_message->Visible) { // created_at_message ?>
        <tr id="r_created_at_message"<?= $message_tbl->created_at_message->rowAttributes() ?>>
            <td class="<?= $message_tbl->TableLeftColumnClass ?>"><?= $message_tbl->created_at_message->caption() ?></td>
            <td<?= $message_tbl->created_at_message->cellAttributes() ?>>
<span id="el_message_tbl_created_at_message">
<span<?= $message_tbl->created_at_message->viewAttributes() ?>>
<?= $message_tbl->created_at_message->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($message_tbl->to_message->Visible) { // to_message ?>
        <tr id="r_to_message"<?= $message_tbl->to_message->rowAttributes() ?>>
            <td class="<?= $message_tbl->TableLeftColumnClass ?>"><?= $message_tbl->to_message->caption() ?></td>
            <td<?= $message_tbl->to_message->cellAttributes() ?>>
<span id="el_message_tbl_to_message">
<span<?= $message_tbl->to_message->viewAttributes() ?>>
<?= $message_tbl->to_message->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
<?php if ($message_tbl->text_message->Visible) { // text_message ?>
        <tr id="r_text_message"<?= $message_tbl->text_message->rowAttributes() ?>>
            <td class="<?= $message_tbl->TableLeftColumnClass ?>"><?= $message_tbl->text_message->caption() ?></td>
            <td<?= $message_tbl->text_message->cellAttributes() ?>>
<span id="el_message_tbl_text_message">
<span<?= $message_tbl->text_message->viewAttributes() ?>>
<?= $message_tbl->text_message->getViewValue() ?></span>
</span>
</td>
        </tr>
<?php } ?>
    </tbody>
</table>
</div>
<?php } ?>
