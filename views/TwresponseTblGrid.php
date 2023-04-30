<?php

namespace PHPMaker2023\appmessage;

// Set up and run Grid object
$Grid = Container("TwresponseTblGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var ftwresponse_tblgrid;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let currentTable = <?= JsonEncode($Grid->toClientVar()) ?>;
    ew.deepAssign(ew.vars, { tables: { twresponse_tbl: currentTable } });
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftwresponse_tblgrid")
        .setPageId("grid")
        .setFormKeyCountName("<?= $Grid->FormKeyCountName ?>")

        // Add fields
        .setFields([
            ["date_created_twresponse", [fields.date_created_twresponse.visible && fields.date_created_twresponse.required ? ew.Validators.required(fields.date_created_twresponse.caption) : null], fields.date_created_twresponse.isInvalid],
            ["to_twresponse", [fields.to_twresponse.visible && fields.to_twresponse.required ? ew.Validators.required(fields.to_twresponse.caption) : null], fields.to_twresponse.isInvalid],
            ["from_twresponse", [fields.from_twresponse.visible && fields.from_twresponse.required ? ew.Validators.required(fields.from_twresponse.caption) : null], fields.from_twresponse.isInvalid],
            ["body_twresponse", [fields.body_twresponse.visible && fields.body_twresponse.required ? ew.Validators.required(fields.body_twresponse.caption) : null], fields.body_twresponse.isInvalid]
        ])

        // Check empty row
        .setEmptyRow(
            function (rowIndex) {
                let fobj = this.getForm(),
                    fields = [["date_created_twresponse",false],["to_twresponse",false],["from_twresponse",false],["body_twresponse",false]];
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
<div id="ftwresponse_tblgrid" class="ew-form ew-list-form">
<div id="gmp_twresponse_tbl" class="card-body ew-grid-middle-panel <?= $Grid->TableContainerClass ?>" style="<?= $Grid->TableContainerStyle ?>">
<table id="tbl_twresponse_tblgrid" class="<?= $Grid->TableClass ?>"><!-- .ew-table -->
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
<?php if ($Grid->date_created_twresponse->Visible) { // date_created_twresponse ?>
        <th data-name="date_created_twresponse" class="<?= $Grid->date_created_twresponse->headerCellClass() ?>"><div id="elh_twresponse_tbl_date_created_twresponse" class="twresponse_tbl_date_created_twresponse"><?= $Grid->renderFieldHeader($Grid->date_created_twresponse) ?></div></th>
<?php } ?>
<?php if ($Grid->to_twresponse->Visible) { // to_twresponse ?>
        <th data-name="to_twresponse" class="<?= $Grid->to_twresponse->headerCellClass() ?>"><div id="elh_twresponse_tbl_to_twresponse" class="twresponse_tbl_to_twresponse"><?= $Grid->renderFieldHeader($Grid->to_twresponse) ?></div></th>
<?php } ?>
<?php if ($Grid->from_twresponse->Visible) { // from_twresponse ?>
        <th data-name="from_twresponse" class="<?= $Grid->from_twresponse->headerCellClass() ?>"><div id="elh_twresponse_tbl_from_twresponse" class="twresponse_tbl_from_twresponse"><?= $Grid->renderFieldHeader($Grid->from_twresponse) ?></div></th>
<?php } ?>
<?php if ($Grid->body_twresponse->Visible) { // body_twresponse ?>
        <th data-name="body_twresponse" class="<?= $Grid->body_twresponse->headerCellClass() ?>"><div id="elh_twresponse_tbl_body_twresponse" class="twresponse_tbl_body_twresponse"><?= $Grid->renderFieldHeader($Grid->body_twresponse) ?></div></th>
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
    <?php if ($Grid->date_created_twresponse->Visible) { // date_created_twresponse ?>
        <td data-name="date_created_twresponse"<?= $Grid->date_created_twresponse->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_date_created_twresponse" class="el_twresponse_tbl_date_created_twresponse">
<input type="<?= $Grid->date_created_twresponse->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_date_created_twresponse" id="x<?= $Grid->RowIndex ?>_date_created_twresponse" data-table="twresponse_tbl" data-field="x_date_created_twresponse" value="<?= $Grid->date_created_twresponse->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->date_created_twresponse->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->date_created_twresponse->formatPattern()) ?>"<?= $Grid->date_created_twresponse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->date_created_twresponse->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="twresponse_tbl" data-field="x_date_created_twresponse" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_date_created_twresponse" id="o<?= $Grid->RowIndex ?>_date_created_twresponse" value="<?= HtmlEncode($Grid->date_created_twresponse->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_date_created_twresponse" class="el_twresponse_tbl_date_created_twresponse">
<input type="<?= $Grid->date_created_twresponse->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_date_created_twresponse" id="x<?= $Grid->RowIndex ?>_date_created_twresponse" data-table="twresponse_tbl" data-field="x_date_created_twresponse" value="<?= $Grid->date_created_twresponse->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->date_created_twresponse->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->date_created_twresponse->formatPattern()) ?>"<?= $Grid->date_created_twresponse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->date_created_twresponse->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_date_created_twresponse" class="el_twresponse_tbl_date_created_twresponse">
<span<?= $Grid->date_created_twresponse->viewAttributes() ?>>
<?= $Grid->date_created_twresponse->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="twresponse_tbl" data-field="x_date_created_twresponse" data-hidden="1" name="ftwresponse_tblgrid$x<?= $Grid->RowIndex ?>_date_created_twresponse" id="ftwresponse_tblgrid$x<?= $Grid->RowIndex ?>_date_created_twresponse" value="<?= HtmlEncode($Grid->date_created_twresponse->FormValue) ?>">
<input type="hidden" data-table="twresponse_tbl" data-field="x_date_created_twresponse" data-hidden="1" data-old name="ftwresponse_tblgrid$o<?= $Grid->RowIndex ?>_date_created_twresponse" id="ftwresponse_tblgrid$o<?= $Grid->RowIndex ?>_date_created_twresponse" value="<?= HtmlEncode($Grid->date_created_twresponse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->to_twresponse->Visible) { // to_twresponse ?>
        <td data-name="to_twresponse"<?= $Grid->to_twresponse->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_to_twresponse" class="el_twresponse_tbl_to_twresponse">
<input type="<?= $Grid->to_twresponse->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_to_twresponse" id="x<?= $Grid->RowIndex ?>_to_twresponse" data-table="twresponse_tbl" data-field="x_to_twresponse" value="<?= $Grid->to_twresponse->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->to_twresponse->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->to_twresponse->formatPattern()) ?>"<?= $Grid->to_twresponse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->to_twresponse->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="twresponse_tbl" data-field="x_to_twresponse" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_to_twresponse" id="o<?= $Grid->RowIndex ?>_to_twresponse" value="<?= HtmlEncode($Grid->to_twresponse->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_to_twresponse" class="el_twresponse_tbl_to_twresponse">
<input type="<?= $Grid->to_twresponse->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_to_twresponse" id="x<?= $Grid->RowIndex ?>_to_twresponse" data-table="twresponse_tbl" data-field="x_to_twresponse" value="<?= $Grid->to_twresponse->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->to_twresponse->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->to_twresponse->formatPattern()) ?>"<?= $Grid->to_twresponse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->to_twresponse->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_to_twresponse" class="el_twresponse_tbl_to_twresponse">
<span<?= $Grid->to_twresponse->viewAttributes() ?>>
<?= $Grid->to_twresponse->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="twresponse_tbl" data-field="x_to_twresponse" data-hidden="1" name="ftwresponse_tblgrid$x<?= $Grid->RowIndex ?>_to_twresponse" id="ftwresponse_tblgrid$x<?= $Grid->RowIndex ?>_to_twresponse" value="<?= HtmlEncode($Grid->to_twresponse->FormValue) ?>">
<input type="hidden" data-table="twresponse_tbl" data-field="x_to_twresponse" data-hidden="1" data-old name="ftwresponse_tblgrid$o<?= $Grid->RowIndex ?>_to_twresponse" id="ftwresponse_tblgrid$o<?= $Grid->RowIndex ?>_to_twresponse" value="<?= HtmlEncode($Grid->to_twresponse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->from_twresponse->Visible) { // from_twresponse ?>
        <td data-name="from_twresponse"<?= $Grid->from_twresponse->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_from_twresponse" class="el_twresponse_tbl_from_twresponse">
<input type="<?= $Grid->from_twresponse->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_from_twresponse" id="x<?= $Grid->RowIndex ?>_from_twresponse" data-table="twresponse_tbl" data-field="x_from_twresponse" value="<?= $Grid->from_twresponse->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->from_twresponse->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->from_twresponse->formatPattern()) ?>"<?= $Grid->from_twresponse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->from_twresponse->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="twresponse_tbl" data-field="x_from_twresponse" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_from_twresponse" id="o<?= $Grid->RowIndex ?>_from_twresponse" value="<?= HtmlEncode($Grid->from_twresponse->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_from_twresponse" class="el_twresponse_tbl_from_twresponse">
<input type="<?= $Grid->from_twresponse->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_from_twresponse" id="x<?= $Grid->RowIndex ?>_from_twresponse" data-table="twresponse_tbl" data-field="x_from_twresponse" value="<?= $Grid->from_twresponse->EditValue ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->from_twresponse->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->from_twresponse->formatPattern()) ?>"<?= $Grid->from_twresponse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->from_twresponse->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_from_twresponse" class="el_twresponse_tbl_from_twresponse">
<span<?= $Grid->from_twresponse->viewAttributes() ?>>
<?= $Grid->from_twresponse->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="twresponse_tbl" data-field="x_from_twresponse" data-hidden="1" name="ftwresponse_tblgrid$x<?= $Grid->RowIndex ?>_from_twresponse" id="ftwresponse_tblgrid$x<?= $Grid->RowIndex ?>_from_twresponse" value="<?= HtmlEncode($Grid->from_twresponse->FormValue) ?>">
<input type="hidden" data-table="twresponse_tbl" data-field="x_from_twresponse" data-hidden="1" data-old name="ftwresponse_tblgrid$o<?= $Grid->RowIndex ?>_from_twresponse" id="ftwresponse_tblgrid$o<?= $Grid->RowIndex ?>_from_twresponse" value="<?= HtmlEncode($Grid->from_twresponse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->body_twresponse->Visible) { // body_twresponse ?>
        <td data-name="body_twresponse"<?= $Grid->body_twresponse->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_body_twresponse" class="el_twresponse_tbl_body_twresponse">
<input type="<?= $Grid->body_twresponse->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_body_twresponse" id="x<?= $Grid->RowIndex ?>_body_twresponse" data-table="twresponse_tbl" data-field="x_body_twresponse" value="<?= $Grid->body_twresponse->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Grid->body_twresponse->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->body_twresponse->formatPattern()) ?>"<?= $Grid->body_twresponse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->body_twresponse->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="twresponse_tbl" data-field="x_body_twresponse" data-hidden="1" data-old name="o<?= $Grid->RowIndex ?>_body_twresponse" id="o<?= $Grid->RowIndex ?>_body_twresponse" value="<?= HtmlEncode($Grid->body_twresponse->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_body_twresponse" class="el_twresponse_tbl_body_twresponse">
<input type="<?= $Grid->body_twresponse->getInputTextType() ?>" name="x<?= $Grid->RowIndex ?>_body_twresponse" id="x<?= $Grid->RowIndex ?>_body_twresponse" data-table="twresponse_tbl" data-field="x_body_twresponse" value="<?= $Grid->body_twresponse->EditValue ?>" size="30" placeholder="<?= HtmlEncode($Grid->body_twresponse->getPlaceHolder()) ?>" data-format-pattern="<?= HtmlEncode($Grid->body_twresponse->formatPattern()) ?>"<?= $Grid->body_twresponse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->body_twresponse->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_twresponse_tbl_body_twresponse" class="el_twresponse_tbl_body_twresponse">
<span<?= $Grid->body_twresponse->viewAttributes() ?>>
<?= $Grid->body_twresponse->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="twresponse_tbl" data-field="x_body_twresponse" data-hidden="1" name="ftwresponse_tblgrid$x<?= $Grid->RowIndex ?>_body_twresponse" id="ftwresponse_tblgrid$x<?= $Grid->RowIndex ?>_body_twresponse" value="<?= HtmlEncode($Grid->body_twresponse->FormValue) ?>">
<input type="hidden" data-table="twresponse_tbl" data-field="x_body_twresponse" data-hidden="1" data-old name="ftwresponse_tblgrid$o<?= $Grid->RowIndex ?>_body_twresponse" id="ftwresponse_tblgrid$o<?= $Grid->RowIndex ?>_body_twresponse" value="<?= HtmlEncode($Grid->body_twresponse->OldValue) ?>">
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
loadjs.ready(["ftwresponse_tblgrid","load"], () => ftwresponse_tblgrid.updateLists(<?= $Grid->RowIndex ?><?= $Grid->RowIndex === '$rowindex$' ? ", true" : "" ?>));
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
<input type="hidden" name="detailpage" value="ftwresponse_tblgrid">
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
    ew.addEventHandlers("twresponse_tbl");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>
