<?php

namespace PHPMaker2023\appmessage;

// Page object
$SentTblView = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $Page->ExportOptions->render("body") ?>
<?php $Page->OtherOptions->render("body") ?>
</div>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="view">
<form name="fsent_tblview" id="fsent_tblview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="on">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { sent_tbl: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var fsent_tblview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fsent_tblview")
        .setPageId("view")
        .build();
    window[form.id] = form;
    currentForm = form;
    loadjs.done(form.id);
});
</script>
<?php } ?>
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="sent_tbl">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id_sent->Visible) { // id_sent ?>
    <tr id="r_id_sent"<?= $Page->id_sent->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sent_tbl_id_sent"><?= $Page->id_sent->caption() ?></span></td>
        <td data-name="id_sent"<?= $Page->id_sent->cellAttributes() ?>>
<span id="el_sent_tbl_id_sent">
<span<?= $Page->id_sent->viewAttributes() ?>>
<?= $Page->id_sent->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->fk_id_message->Visible) { // fk_id_message ?>
    <tr id="r_fk_id_message"<?= $Page->fk_id_message->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sent_tbl_fk_id_message"><?= $Page->fk_id_message->caption() ?></span></td>
        <td data-name="fk_id_message"<?= $Page->fk_id_message->cellAttributes() ?>>
<span id="el_sent_tbl_fk_id_message">
<span<?= $Page->fk_id_message->viewAttributes() ?>>
<?= $Page->fk_id_message->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->datetime_sent->Visible) { // datetime_sent ?>
    <tr id="r_datetime_sent"<?= $Page->datetime_sent->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sent_tbl_datetime_sent"><?= $Page->datetime_sent->caption() ?></span></td>
        <td data-name="datetime_sent"<?= $Page->datetime_sent->cellAttributes() ?>>
<span id="el_sent_tbl_datetime_sent">
<span<?= $Page->datetime_sent->viewAttributes() ?>>
<?= $Page->datetime_sent->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->twiliocode_sent->Visible) { // twiliocode_sent ?>
    <tr id="r_twiliocode_sent"<?= $Page->twiliocode_sent->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_sent_tbl_twiliocode_sent"><?= $Page->twiliocode_sent->caption() ?></span></td>
        <td data-name="twiliocode_sent"<?= $Page->twiliocode_sent->cellAttributes() ?>>
<span id="el_sent_tbl_twiliocode_sent">
<span<?= $Page->twiliocode_sent->viewAttributes() ?>>
<?= $Page->twiliocode_sent->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
</table>
</form>
</main>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
