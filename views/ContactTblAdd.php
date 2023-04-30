<?php

namespace PHPMaker2023\appmessage;

// Page object
$ContactTblAdd = &$Page;
?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { contact_tbl: currentTable } });
var currentPageID = ew.PAGE_ID = "add";
var currentForm;
var fcontact_tbladd;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fcontact_tbladd")
        .setPageId("add")

        // Add fields
        .setFields([
            ["name_contact", [fields.name_contact.visible && fields.name_contact.required ? ew.Validators.required(fields.name_contact.caption) : null], fields.name_contact.isInvalid],
            ["phone_contact", [fields.phone_contact.visible && fields.phone_contact.required ? ew.Validators.required(fields.phone_contact.caption) : null], fields.phone_contact.isInvalid]
        ])

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
<form name="fcontact_tbladd" id="fcontact_tbladd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="on">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="contact_tbl">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->name_contact->Visible) { // name_contact ?>
    <div id="r_name_contact"<?= $Page->name_contact->rowAttributes() ?>>
        <label id="elh_contact_tbl_name_contact" for="x_name_contact" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name_contact->caption() ?><?= $Page->name_contact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->name_contact->cellAttributes() ?>>
<span id="el_contact_tbl_name_contact">
<input type="<?= $Page->name_contact->getInputTextType() ?>" name="x_name_contact" id="x_name_contact" data-table="contact_tbl" data-field="x_name_contact" value="<?= $Page->name_contact->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->name_contact->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->name_contact->formatPattern()) ?>"<?= $Page->name_contact->editAttributes() ?> aria-describedby="x_name_contact_help">
<?= $Page->name_contact->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name_contact->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->phone_contact->Visible) { // phone_contact ?>
    <div id="r_phone_contact"<?= $Page->phone_contact->rowAttributes() ?>>
        <label id="elh_contact_tbl_phone_contact" for="x_phone_contact" class="<?= $Page->LeftColumnClass ?>"><?= $Page->phone_contact->caption() ?><?= $Page->phone_contact->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->phone_contact->cellAttributes() ?>>
<span id="el_contact_tbl_phone_contact">
<input type="<?= $Page->phone_contact->getInputTextType() ?>" name="x_phone_contact" id="x_phone_contact" data-table="contact_tbl" data-field="x_phone_contact" value="<?= $Page->phone_contact->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->phone_contact->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->phone_contact->formatPattern()) ?>"<?= $Page->phone_contact->editAttributes() ?> aria-describedby="x_phone_contact_help">
<?= $Page->phone_contact->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->phone_contact->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fcontact_tbladd"><?= $Language->phrase("AddBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fcontact_tbladd" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("contact_tbl");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
