<?php

namespace PHPMaker2023\appmessage;

// Page object
$MessageTblAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { message_tbl: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fmessage_tbladd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fmessage_tbladd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["to_message", [fields.to_message.visible && fields.to_message.required ? ew.Validators.required(fields.to_message.caption) : null], fields.to_message.isInvalid],
            ["text_message", [fields.text_message.visible && fields.text_message.required ? ew.Validators.required(fields.text_message.caption) : null], fields.text_message.isInvalid]
        ])
        <?= Captcha()->getScript() ?>

        // Form_CustomValidate
        .setCustomValidate(
            function (fobj) { // DO NOT CHANGE THIS LINE! (except for adding "async" keyword)!
                    // Your custom validation code here, return false if invalid.
                    return true;
                }
        )

        // Use JavaScript validation or not
        .setValidateRequired(ew.CLIENT_VALIDATE)

        // Dynamic selection lists
        .setLists({
            "to_message": <?= $Page->to_message->toClientList($Page) ?>,
        })
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
<form name="fmessage_tbladd" id="fmessage_tbladd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="on">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="message_tbl">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->to_message->Visible) { // to_message ?>
    <div id="r_to_message"<?= $Page->to_message->rowAttributes() ?>>
        <label id="elh_message_tbl_to_message" class="<?= $Page->LeftColumnClass ?>"><?= $Page->to_message->caption() ?><?= $Page->to_message->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->to_message->cellAttributes() ?>>
<span id="el_message_tbl_to_message">
<?php
if (IsRTL()) {
    $Page->to_message->EditAttrs["dir"] = "rtl";
}
?>
<span id="as_x_to_message" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->to_message->getInputTextType() ?>" class="form-control" name="sv_x_to_message" id="sv_x_to_message" value="<?= RemoveHtml($Page->to_message->EditValue) ?>" autocomplete="off" size="30" placeholder="<?= HtmlEncode($Page->to_message->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->to_message->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->to_message->formatPattern()) ?>"<?= $Page->to_message->editAttributes() ?> aria-describedby="x_to_message_help">
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_to_message" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->to_message->caption() ?>" data-title="<?= $Page->to_message->caption() ?>" data-ew-action="add-option" data-el="x_to_message" data-url="<?= GetUrl("ContactTblAddopt") ?>"><i class="fa-solid fa-plus ew-icon"></i></button>
    </div>
</span>
<selection-list hidden class="form-control" data-table="message_tbl" data-field="x_to_message" data-input="sv_x_to_message" data-value-separator="<?= $Page->to_message->displayValueSeparatorAttribute() ?>" name="x_to_message" id="x_to_message" value="<?= HtmlEncode($Page->to_message->CurrentValue) ?>"></selection-list>
<?= $Page->to_message->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->to_message->getErrorMessage() ?></div>
<script>
loadjs.ready("fmessage_tbladd", function() {
    fmessage_tbladd.createAutoSuggest(Object.assign({"id":"x_to_message","forceSelect":false}, { lookupAllDisplayFields: <?= $Page->to_message->Lookup->LookupAllDisplayFields ? "true" : "false" ?> }, ew.vars.tables.message_tbl.fields.to_message.autoSuggestOptions));
});
</script>
<?= $Page->to_message->Lookup->getParamTag($Page, "p_x_to_message") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->text_message->Visible) { // text_message ?>
    <div id="r_text_message"<?= $Page->text_message->rowAttributes() ?>>
        <label id="elh_message_tbl_text_message" for="x_text_message" class="<?= $Page->LeftColumnClass ?>"><?= $Page->text_message->caption() ?><?= $Page->text_message->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->text_message->cellAttributes() ?>>
<span id="el_message_tbl_text_message">
<textarea data-table="message_tbl" data-field="x_text_message" name="x_text_message" id="x_text_message" cols="4" rows="8" placeholder="<?= HtmlEncode($Page->text_message->getPlaceHolder()) ?>"<?= $Page->text_message->editAttributes() ?> aria-describedby="x_text_message_help"><?= $Page->text_message->EditValue ?></textarea>
<?= $Page->text_message->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->text_message->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php
    if (in_array("sent_tbl", explode(",", $Page->getCurrentDetailTable())) && $sent_tbl->DetailAdd) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("sent_tbl", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "SentTblGrid.php" ?>
<?php } ?>
<!-- captcha html (begin) -->
<?= Captcha()->getHtml(); ?>
<!-- captcha html (end) -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fmessage_tbladd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fmessage_tbladd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("message_tbl");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
