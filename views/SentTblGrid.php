<?php

namespace PHPMaker2023\appmessage;

// Set up and run Grid object
$Grid = Container("SentTblGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var fsent_tblgrid;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let currentTable = <?= JsonEncode($Grid->toClientVar()) ?>;
    ew.deepAssign(ew.vars, { tables: { sent_tbl: currentTable } });
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("fsent_tblgrid")
        .setPageId("grid")
        .setFormKeyCountName("<?= $Grid->FormKeyCountName ?>")

        // Add fields
        .setFields([
            ["datetime_sent", [fields.datetime_sent.visible && fields.datetime_sent.required ? ew.Validators.required(fields.datetime_sent.caption) : null, ew.Validators.datetime(fields.datetime_sent.clientFormatPattern)], fields.datetime_sent.isInvalid],
            ["fk_id_message", [fields.fk_id_message.visible && fields.fk_id_message.required ? ew.Validators.required(fields.fk_id_message.caption) : null, ew.Validators.integer], fields.fk_id_message.isInvalid],
            ["twiliocode_sent", [fields.twiliocode_sent.visible && fields.twiliocode_sent.required ? ew.Validators.required(fields.twiliocode_sent.caption) : null], fields.twiliocode_sent.isInvalid]
        ])

        // Check empty row
        .setEmptyRow(
            function (rowIndex) {
                let fobj = this.getForm(),
                    fields = [["datetime_sent",false],["fk_id_message",false],["twiliocode_sent",false]];
                if (fields.some(field => ew.valueChanged(fobj, rowIndex, ...field)))
                    return false;
                return true;
            }
        )

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
            "fk_id_message": <?= $Grid->fk_id_message->toClientList($Grid) ?>,
        })
        .build();
    window[form.id] = form;
    loadjs.done(form.id);
});
</script>
<?php } ?>
<main class="list<?= ($Grid->TotalRecords == 0 && !$Grid->isAdd()) ? " ew-no-record" : "" ?>">
<div id="ew-list">
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?= $Grid->isAddOrEdit() ? " ew-grid-add-edit" : "" ?> <?= $Grid->TableGridClass ?>">
<div id="fsent_tblgrid" class="ew-form ew-list-form">
<div id="gmp_sent_tbl" class="card-body ew-grid-middle-panel <?= $Grid->TableContainerClass ?>" style="<?= $Grid->TableContainerStyle ?>">
<table id="tbl_sent_tblgrid" class="<?= $Grid->TableClass ?>"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Grid->RowType = ROWTYPE_HEADER;

// Render list options
$Grid->renderListOptions();

// Render list options (header, left)
$Grid->ListOptions->render("header", "left");
?>
<?php if ($Grid->datetime_sent->Visible) { // datetime_sent ?>
        <th data-name="datetime_sent" class="<?= $Grid->datetime_sent->headerCellClass() ?>"><div id="elh_sent_tbl_datetime_sent" class="sent_tbl_datetime_sent"><?= $Grid->renderFieldHeader($Grid->datetime_sent) ?></div></th>
<?php } ?>
<?php if ($Grid->fk_id_message->Visible) { // fk_id_message ?>
        <th data-name="fk_id_message" class="<?= $Grid->fk_id_message->headerCellClass() ?>"><div id="elh_sent_tbl_fk_id_message" class="sent_tbl_fk_id_message"><?= $Grid->renderFieldHeader($Grid->fk_id_message) ?></div></th>
<?php } ?>
<?php if ($Grid->twiliocode_sent->Visible) { // twiliocode_sent ?>
        <th data-name="twiliocode_sent" class="<?= $Grid->twiliocode_sent->headerCellClass() ?>"><div id="elh_sent_tbl_twiliocode_sent" class="sent_tbl_twiliocode_sent"><?= $Grid->renderFieldHeader($Grid->twiliocode_sent) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Grid->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody data-page="<?= $Grid->getPageNumber() ?>">
<?php
$Grid->setupGrid();
while ($Grid->RecordCount < $Grid->StopRecord) {
    $Grid->RecordCount++;
    if ($Grid->RecordCount >= $Grid->StartRecord) {
        $Grid->setupRow();

        // Skip 1) delete row / empty row for confirm page, 2) hidden row
        if (
            $Grid->RowAction != "delete" &&
            $Grid->RowAction != "insertdelete" &&
            !($Grid->RowAction == "insert" && $Grid->isConfirm() && $Grid->emptyRow()) &&
            $Grid->RowAction != "hide"
        ) {
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowCount);
?>
    <?php if ($Grid->datetime_sent->Visible) { // datetime_sent ?>
        <td data-name="datetime_sent"<?= $Grid->datetime_sent->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_sent_tbl_datetime_sent" class="el_sent_tbl_datetime_sent">
<input type="<?= $Grid->datetime_sent->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_datetime_sent" id="x<?= $Grid->RowIndex ?>_datetime_sent" data-table="sent_tbl" data-field="x_datetime_sent" value="<?= $Grid->datetime_sent->EditValue ?>" placeholder="<?= HtmlEncode($Grid->datetime_sent->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->datetime_sent->formatPattern()) ?>"<?= $Grid->datetime_sent->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->datetime_sent->getErrorMessage() ?></div>
<?php if (!$Grid->datetime_sent->ReadOnly && !$Grid->datetime_sent->Disabled && !isset($Grid->datetime_sent->EditAttrs["readonly"]) && !isset($Grid->datetime_sent->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsent_tblgrid", "datetimepicker"], function () {
    let format = "<?= DateFormat(16) ?>",
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
    ew.createDateTimePicker("fsent_tblgrid", "x<?= $Grid->RowIndex ?>_datetime_sent", jQuery.extend(true, {"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="sent_tbl" data-field="x_datetime_sent" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_datetime_sent" id="o<?= $Grid->RowIndex ?>_datetime_sent" value="<?= HtmlEncode($Grid->datetime_sent->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_sent_tbl_datetime_sent" class="el_sent_tbl_datetime_sent">
<input type="<?= $Grid->datetime_sent->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_datetime_sent" id="x<?= $Grid->RowIndex ?>_datetime_sent" data-table="sent_tbl" data-field="x_datetime_sent" value="<?= $Grid->datetime_sent->EditValue ?>" placeholder="<?= HtmlEncode($Grid->datetime_sent->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->datetime_sent->formatPattern()) ?>"<?= $Grid->datetime_sent->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->datetime_sent->getErrorMessage() ?></div>
<?php if (!$Grid->datetime_sent->ReadOnly && !$Grid->datetime_sent->Disabled && !isset($Grid->datetime_sent->EditAttrs["readonly"]) && !isset($Grid->datetime_sent->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsent_tblgrid", "datetimepicker"], function () {
    let format = "<?= DateFormat(16) ?>",
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
    ew.createDateTimePicker("fsent_tblgrid", "x<?= $Grid->RowIndex ?>_datetime_sent", jQuery.extend(true, {"useCurrent":false,"display":{"sideBySide":false}}, options));
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_sent_tbl_datetime_sent" class="el_sent_tbl_datetime_sent">
<span<?= $Grid->datetime_sent->viewAttributes() ?>>
<?= $Grid->datetime_sent->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="sent_tbl" data-field="x_datetime_sent" data-hidden="1" name="fsent_tblgrid$x<?= $Grid->RowIndex ?>_datetime_sent" id="fsent_tblgrid$x<?= $Grid->RowIndex ?>_datetime_sent" value="<?= HtmlEncode($Grid->datetime_sent->FormValue) ?>">
<input type="hidden" data-table="sent_tbl" data-field="x_datetime_sent" data-hidden="1" data-old name="fsent_tblgrid$o<?= $Grid->RowIndex ?>_datetime_sent" id="fsent_tblgrid$o<?= $Grid->RowIndex ?>_datetime_sent" value="<?= HtmlEncode($Grid->datetime_sent->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->fk_id_message->Visible) { // fk_id_message ?>
        <td data-name="fk_id_message"<?= $Grid->fk_id_message->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->fk_id_message->getSessionValue() != "") { ?>
<span<?= $Grid->fk_id_message->viewAttributes() ?>>
<span class="form-control-plaintext"><?= $Grid->fk_id_message->getDisplayValue($Grid->fk_id_message->ViewValue) ?></span></span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_fk_id_message" name="x<?= $Grid->RowIndex ?>_fk_id_message" value="<?= HtmlEncode($Grid->fk_id_message->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_sent_tbl_fk_id_message" class="el_sent_tbl_fk_id_message">
<?php
if (IsRTL()) {
    $Grid->fk_id_message->EditAttrs["dir"] = "rtl";
}
?>
<span id="as_x<?= $Grid->RowIndex ?>_fk_id_message" class="ew-auto-suggest">
    <input type="<?= $Grid->fk_id_message->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_fk_id_message" id="sv_x<?= $Grid->RowIndex ?>_fk_id_message" value="<?= RemoveHtml($Grid->fk_id_message->EditValue) ?>" autocomplete="off" size="30" placeholder="<?= HtmlEncode($Grid->fk_id_message->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->fk_id_message->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->fk_id_message->formatPattern()) ?>"<?= $Grid->fk_id_message->editAttributes() ?>>
</span>
<selection-list hidden class="form-control" data-table="sent_tbl" data-field="x_fk_id_message" data-input="sv_x<?= $Grid->RowIndex ?>_fk_id_message" data-value-separator="<?= $Grid->fk_id_message->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_fk_id_message" id="x<?= $Grid->RowIndex ?>_fk_id_message" value="<?= HtmlEncode($Grid->fk_id_message->CurrentValue) ?>"></selection-list>
<div class="invalid-feedback"><?= $Grid->fk_id_message->getErrorMessage() ?></div>
<script>
loadjs.ready("fsent_tblgrid", function() {
    fsent_tblgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_fk_id_message","forceSelect":false}, { lookupAllDisplayFields: <?= $Grid->fk_id_message->Lookup->LookupAllDisplayFields ? "true" : "false" ?> }, ew.vars.tables.sent_tbl.fields.fk_id_message.autoSuggestOptions));
});
</script>
<?= $Grid->fk_id_message->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_fk_id_message") ?>
</span>
<?php } ?>
<input type="hidden" data-table="sent_tbl" data-field="x_fk_id_message" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_fk_id_message" id="o<?= $Grid->RowIndex ?>_fk_id_message" value="<?= HtmlEncode($Grid->fk_id_message->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->fk_id_message->getSessionValue() != "") { ?>
<span<?= $Grid->fk_id_message->viewAttributes() ?>>
<span class="form-control-plaintext"><?= $Grid->fk_id_message->getDisplayValue($Grid->fk_id_message->ViewValue) ?></span></span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_fk_id_message" name="x<?= $Grid->RowIndex ?>_fk_id_message" value="<?= HtmlEncode($Grid->fk_id_message->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_sent_tbl_fk_id_message" class="el_sent_tbl_fk_id_message">
<?php
if (IsRTL()) {
    $Grid->fk_id_message->EditAttrs["dir"] = "rtl";
}
?>
<span id="as_x<?= $Grid->RowIndex ?>_fk_id_message" class="ew-auto-suggest">
    <input type="<?= $Grid->fk_id_message->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_fk_id_message" id="sv_x<?= $Grid->RowIndex ?>_fk_id_message" value="<?= RemoveHtml($Grid->fk_id_message->EditValue) ?>" autocomplete="off" size="30" placeholder="<?= HtmlEncode($Grid->fk_id_message->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->fk_id_message->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->fk_id_message->formatPattern()) ?>"<?= $Grid->fk_id_message->editAttributes() ?>>
</span>
<selection-list hidden class="form-control" data-table="sent_tbl" data-field="x_fk_id_message" data-input="sv_x<?= $Grid->RowIndex ?>_fk_id_message" data-value-separator="<?= $Grid->fk_id_message->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_fk_id_message" id="x<?= $Grid->RowIndex ?>_fk_id_message" value="<?= HtmlEncode($Grid->fk_id_message->CurrentValue) ?>"></selection-list>
<div class="invalid-feedback"><?= $Grid->fk_id_message->getErrorMessage() ?></div>
<script>
loadjs.ready("fsent_tblgrid", function() {
    fsent_tblgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_fk_id_message","forceSelect":false}, { lookupAllDisplayFields: <?= $Grid->fk_id_message->Lookup->LookupAllDisplayFields ? "true" : "false" ?> }, ew.vars.tables.sent_tbl.fields.fk_id_message.autoSuggestOptions));
});
</script>
<?= $Grid->fk_id_message->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_fk_id_message") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_sent_tbl_fk_id_message" class="el_sent_tbl_fk_id_message">
<span<?= $Grid->fk_id_message->viewAttributes() ?>>
<?= $Grid->fk_id_message->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="sent_tbl" data-field="x_fk_id_message" data-hidden="1" name="fsent_tblgrid$x<?= $Grid->RowIndex ?>_fk_id_message" id="fsent_tblgrid$x<?= $Grid->RowIndex ?>_fk_id_message" value="<?= HtmlEncode($Grid->fk_id_message->FormValue) ?>">
<input type="hidden" data-table="sent_tbl" data-field="x_fk_id_message" data-hidden="1" data-old name="fsent_tblgrid$o<?= $Grid->RowIndex ?>_fk_id_message" id="fsent_tblgrid$o<?= $Grid->RowIndex ?>_fk_id_message" value="<?= HtmlEncode($Grid->fk_id_message->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->twiliocode_sent->Visible) { // twiliocode_sent ?>
        <td data-name="twiliocode_sent"<?= $Grid->twiliocode_sent->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_sent_tbl_twiliocode_sent" class="el_sent_tbl_twiliocode_sent">
<input type="<?= $Grid->twiliocode_sent->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_twiliocode_sent" id="x<?= $Grid->RowIndex ?>_twiliocode_sent" data-table="sent_tbl" data-field="x_twiliocode_sent" value="<?= $Grid->twiliocode_sent->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->twiliocode_sent->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->twiliocode_sent->formatPattern()) ?>"<?= $Grid->twiliocode_sent->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->twiliocode_sent->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="sent_tbl" data-field="x_twiliocode_sent" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_twiliocode_sent" id="o<?= $Grid->RowIndex ?>_twiliocode_sent" value="<?= HtmlEncode($Grid->twiliocode_sent->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_sent_tbl_twiliocode_sent" class="el_sent_tbl_twiliocode_sent">
<input type="<?= $Grid->twiliocode_sent->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_twiliocode_sent" id="x<?= $Grid->RowIndex ?>_twiliocode_sent" data-table="sent_tbl" data-field="x_twiliocode_sent" value="<?= $Grid->twiliocode_sent->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->twiliocode_sent->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->twiliocode_sent->formatPattern()) ?>"<?= $Grid->twiliocode_sent->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->twiliocode_sent->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_sent_tbl_twiliocode_sent" class="el_sent_tbl_twiliocode_sent">
<span<?= $Grid->twiliocode_sent->viewAttributes() ?>>
<?= $Grid->twiliocode_sent->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="sent_tbl" data-field="x_twiliocode_sent" data-hidden="1" name="fsent_tblgrid$x<?= $Grid->RowIndex ?>_twiliocode_sent" id="fsent_tblgrid$x<?= $Grid->RowIndex ?>_twiliocode_sent" value="<?= HtmlEncode($Grid->twiliocode_sent->FormValue) ?>">
<input type="hidden" data-table="sent_tbl" data-field="x_twiliocode_sent" data-hidden="1" data-old name="fsent_tblgrid$o<?= $Grid->RowIndex ?>_twiliocode_sent" id="fsent_tblgrid$o<?= $Grid->RowIndex ?>_twiliocode_sent" value="<?= HtmlEncode($Grid->twiliocode_sent->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowCount);
?>
    </tr>
<?php if ($Grid->RowType == ROWTYPE_ADD || $Grid->RowType == ROWTYPE_EDIT) { ?>
<script data-rowindex="<?= $Grid->RowIndex ?>">
loadjs.ready(["fsent_tblgrid","load"], () => fsent_tblgrid.updateLists(<?= $Grid->RowIndex ?><?= $Grid->RowIndex === '$rowindex$' ? ", true" : "" ?>));
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (
        $Grid->Recordset &&
        !$Grid->Recordset->EOF &&
        $Grid->RowIndex !== '$rowindex$' &&
        (!$Grid->isGridAdd() || $Grid->CurrentMode == "copy") &&
        (!(($Grid->isCopy() || $Grid->isAdd()) && $Grid->RowIndex == 0))
    ) {
        $Grid->Recordset->moveNext();
    }
    // Reset for template row
    if ($Grid->RowIndex === '$rowindex$') {
        $Grid->RowIndex = 0;
    }
    // Reset inline add/copy row
    if (($Grid->isCopy() || $Grid->isAdd()) && $Grid->RowIndex == 0) {
        $Grid->RowIndex = 1;
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "edit") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Grid->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fsent_tblgrid">
</div><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Grid->Recordset) {
    $Grid->Recordset->close();
}
?>
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $Grid->OtherOptions->render("body", "bottom") ?>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } else { ?>
<div class="ew-list-other-options">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<?php } ?>
</div>
</main>
<?php if (!$Grid->isExport()) { ?>
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
<?php } ?>
