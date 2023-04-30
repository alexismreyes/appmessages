<?php

namespace PHPMaker2023\appmessage;

// Page object
$MessageTblDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { message_tbl: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fmessage_tbldelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fmessage_tbldelete")
        .setPageId("delete")
        .build();
    window[form.id] = form;
    currentForm = form;
    loadjs.done(form.id);
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fmessage_tbldelete" id="fmessage_tbldelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="on">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="message_tbl">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($Page->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?= HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid <?= $Page->TableGridClass ?>">
<div class="card-body ew-grid-middle-panel <?= $Page->TableContainerClass ?>" style="<?= $Page->TableContainerStyle ?>">
<table class="<?= $Page->TableClass ?>">
    <thead>
    <tr class="ew-table-header">
<?php if ($Page->created_at_message->Visible) { // created_at_message ?>
        <th class="<?= $Page->created_at_message->headerCellClass() ?>"><span id="elh_message_tbl_created_at_message" class="message_tbl_created_at_message"><?= $Page->created_at_message->caption() ?></span></th>
<?php } ?>
<?php if ($Page->to_message->Visible) { // to_message ?>
        <th class="<?= $Page->to_message->headerCellClass() ?>"><span id="elh_message_tbl_to_message" class="message_tbl_to_message"><?= $Page->to_message->caption() ?></span></th>
<?php } ?>
<?php if ($Page->text_message->Visible) { // text_message ?>
        <th class="<?= $Page->text_message->headerCellClass() ?>"><span id="elh_message_tbl_text_message" class="message_tbl_text_message"><?= $Page->text_message->caption() ?></span></th>
<?php } ?>
    </tr>
    </thead>
    <tbody>
<?php
$Page->RecordCount = 0;
$i = 0;
while (!$Page->Recordset->EOF) {
    $Page->RecordCount++;
    $Page->RowCount++;

    // Set row properties
    $Page->resetAttributes();
    $Page->RowType = ROWTYPE_VIEW; // View

    // Get the field contents
    $Page->loadRowValues($Page->Recordset);

    // Render row
    $Page->renderRow();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php if ($Page->created_at_message->Visible) { // created_at_message ?>
        <td<?= $Page->created_at_message->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_message_tbl_created_at_message" class="el_message_tbl_created_at_message">
<span<?= $Page->created_at_message->viewAttributes() ?>>
<?= $Page->created_at_message->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->to_message->Visible) { // to_message ?>
        <td<?= $Page->to_message->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_message_tbl_to_message" class="el_message_tbl_to_message">
<span<?= $Page->to_message->viewAttributes() ?>>
<?= $Page->to_message->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->text_message->Visible) { // text_message ?>
        <td<?= $Page->text_message->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_message_tbl_text_message" class="el_message_tbl_text_message">
<span<?= $Page->text_message->viewAttributes() ?>>
<?= $Page->text_message->getViewValue() ?></span>
</span>
</td>
<?php } ?>
    </tr>
<?php
    $Page->Recordset->moveNext();
}
$Page->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div class="ew-buttons ew-desktop-buttons">
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
