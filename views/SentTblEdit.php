<?php

namespace PHPMaker2023\appmessage;

// Page object
$SentTblEdit = &$Page;
?>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<main class="edit">
<form name="fsent_tbledit" id="fsent_tbledit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="on">
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { sent_tbl: currentTable } });
var currentPageID = ew.PAGE_ID = "edit";
var currentForm;
var fsent_tbledit;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fsent_tbledit")
        .setPageId("edit")

        // Add fields
        .setFields([
            ["id_sent", [fields.id_sent.visible && fields.id_sent.required ? ew.Validators.required(fields.id_sent.caption) : null], fields.id_sent.isInvalid],
            ["fk_id_message", [fields.fk_id_message.visible && fields.fk_id_message.required ? ew.Validators.required(fields.fk_id_message.caption) : null, ew.Validators.integer], fields.fk_id_message.isInvalid],
            ["datetime_sent", [fields.datetime_sent.visible && fields.datetime_sent.required ? ew.Validators.required(fields.datetime_sent.caption) : null, ew.Validators.datetime(fields.datetime_sent.clientFormatPattern)], fields.datetime_sent.isInvalid],
            ["twiliocode_sent", [fields.twiliocode_sent.visible && fields.twiliocode_sent.required ? ew.Validators.required(fields.twiliocode_sent.caption) : null], fields.twiliocode_sent.isInvalid]
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
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="sent_tbl">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<?php if (IsJsonResponse()) { ?>
<input type="hidden" name="json" value="1">
<?php } ?>
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id_sent->Visible) { // id_sent ?>
    <div id="r_id_sent"<?= $Page->id_sent->rowAttributes() ?>>
        <label id="elh_sent_tbl_id_sent" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id_sent->caption() ?><?= $Page->id_sent->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->id_sent->cellAttributes() ?>>
<span id="el_sent_tbl_id_sent">
<span<?= $Page->id_sent->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id_sent->getDisplayValue($Page->id_sent->EditValue))) ?>"></span>
<input type="hidden" data-table="sent_tbl" data-field="x_id_sent" data-hidden="1" name="x_id_sent" id="x_id_sent" value="<?= HtmlEncode($Page->id_sent->CurrentValue) ?>">
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fk_id_message->Visible) { // fk_id_message ?>
    <div id="r_fk_id_message"<?= $Page->fk_id_message->rowAttributes() ?>>
        <label id="elh_sent_tbl_fk_id_message" for="x_fk_id_message" class="<?= $Page->LeftColumnClass ?>"><?= $Page->fk_id_message->caption() ?><?= $Page->fk_id_message->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->fk_id_message->cellAttributes() ?>>
<span id="el_sent_tbl_fk_id_message">
<input type="<?= $Page->fk_id_message->getInputTextType() ?>" name="x_fk_id_message" id="x_fk_id_message" data-table="sent_tbl" data-field="x_fk_id_message" value="<?= $Page->fk_id_message->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Page->fk_id_message->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->fk_id_message->formatPattern()) ?>"<?= $Page->fk_id_message->editAttributes() ?> aria-describedby="x_fk_id_message_help">
<?= $Page->fk_id_message->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fk_id_message->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->datetime_sent->Visible) { // datetime_sent ?>
    <div id="r_datetime_sent"<?= $Page->datetime_sent->rowAttributes() ?>>
        <label id="elh_sent_tbl_datetime_sent" for="x_datetime_sent" class="<?= $Page->LeftColumnClass ?>"><?= $Page->datetime_sent->caption() ?><?= $Page->datetime_sent->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->datetime_sent->cellAttributes() ?>>
<span id="el_sent_tbl_datetime_sent">
<input type="<?= $Page->datetime_sent->getInputTextType() ?>" name="x_datetime_sent" id="x_datetime_sent" data-table="sent_tbl" data-field="x_datetime_sent" value="<?= $Page->datetime_sent->EditValue ?>" placeholder="<?= HtmlEncode($Page->datetime_sent->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->datetime_sent->formatPattern()) ?>"<?= $Page->datetime_sent->editAttributes() ?> aria-describedby="x_datetime_sent_help">
<?= $Page->datetime_sent->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->datetime_sent->getErrorMessage() ?></div>
<?php if (!$Page->datetime_sent->ReadOnly && !$Page->datetime_sent->Disabled && !isset($Page->datetime_sent->EditAttrs["readonly"]) && !isset($Page->datetime_sent->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsent_tbledit", "datetimepicker"], function () {
    let format = "<?= DateFormat(0) ?>",
        options = {
            localization: {
                locale: ew.LANGUAGE_ID + "-u-nu-" + ew.getNumberingSystem(),
                ...ew.language.phrase("datetimepicker")
            },
            display: {
                icons: {
                    previous: ew.IS_RTL ? "fa-solid fa-chevron-right" : "fa-solid fa-chevron-left",
                    next: ew.IS_RTL ? "fa-solid fa-chevron-left" : "fa-solid fa-chevron-right"
                },
                components: {
                    hours: !!format.match(/h/i),
                    minutes: !!format.match(/m/),
                    seconds: !!format.match(/s/i),
                    useTwentyfourHour: !!format.match(/H/)
                },
                theme: ew.isDark() ? "dark" : "auto"
            },
            meta: {
                format
            }
        };
    ew.createDateTimePicker("fsent_tbledit", "x_datetime_sent", jQuery.extend(true, {"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->twiliocode_sent->Visible) { // twiliocode_sent ?>
    <div id="r_twiliocode_sent"<?= $Page->twiliocode_sent->rowAttributes() ?>>
        <label id="elh_sent_tbl_twiliocode_sent" for="x_twiliocode_sent" class="<?= $Page->LeftColumnClass ?>"><?= $Page->twiliocode_sent->caption() ?><?= $Page->twiliocode_sent->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div<?= $Page->twiliocode_sent->cellAttributes() ?>>
<span id="el_sent_tbl_twiliocode_sent">
<input type="<?= $Page->twiliocode_sent->getInputTextType() ?>" name="x_twiliocode_sent" id="x_twiliocode_sent" data-table="sent_tbl" data-field="x_twiliocode_sent" value="<?= $Page->twiliocode_sent->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->twiliocode_sent->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Page->twiliocode_sent->formatPattern()) ?>"<?= $Page->twiliocode_sent->editAttributes() ?> aria-describedby="x_twiliocode_sent_help">
<?= $Page->twiliocode_sent->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->twiliocode_sent->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?= $Page->IsModal ? '<template class="ew-modal-buttons">' : '<div class="row ew-buttons">' ?><!-- buttons .row -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit" form="fsent_tbledit"><?= $Language->phrase("SaveBtn") ?></button>
<?php if (IsJsonResponse()) { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-bs-dismiss="modal"><?= $Language->phrase("CancelBtn") ?></button>
<?php } else { ?>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" form="fsent_tbledit" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
<?php } ?>
    </div><!-- /buttons offset -->
<?= $Page->IsModal ? "</template>" : "</div>" ?><!-- /buttons .row -->
</form>
</main>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("sent_tbl");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
