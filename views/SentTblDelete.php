<?php

namespace PHPMaker2023\appmessage;

// Page object
$SentTblDelete = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { sent_tbl: currentTable } });
var currentPageID = ew.PAGE_ID = "delete";
var currentForm;
var fsent_tbldelete;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fsent_tbldelete")
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
<form name="fsent_tbldelete" id="fsent_tbldelete" class="ew-form ew-delete-form" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="on">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="sent_tbl">
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
<?php if ($Page->datetime_sent->Visible) { // datetime_sent ?>
        <th class="<?= $Page->datetime_sent->headerCellClass() ?>"><span id="elh_sent_tbl_datetime_sent" class="sent_tbl_datetime_sent"><?= $Page->datetime_sent->caption() ?></span></th>
<?php } ?>
<?php if ($Page->fk_id_message->Visible) { // fk_id_message ?>
        <th class="<?= $Page->fk_id_message->headerCellClass() ?>"><span id="elh_sent_tbl_fk_id_message" class="sent_tbl_fk_id_message"><?= $Page->fk_id_message->caption() ?></span></th>
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
<?php if ($Page->datetime_sent->Visible) { // datetime_sent ?>
        <td<?= $Page->datetime_sent->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_sent_tbl_datetime_sent" class="el_sent_tbl_datetime_sent">
<span<?= $Page->datetime_sent->viewAttributes() ?>>
<?= $Page->datetime_sent->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($Page->fk_id_message->Visible) { // fk_id_message ?>
        <td<?= $Page->fk_id_message->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_sent_tbl_fk_id_message" class="el_sent_tbl_fk_id_message">
<span<?= $Page->fk_id_message->viewAttributes() ?>>
<?= $Page->fk_id_message->getViewValue() ?></span>
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
