<?php

namespace PHPMaker2023\appmessage;

// Page object
$TwresponseTblView = &$Page;
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
<form name="ftwresponse_tblview" id="ftwresponse_tblview" class="ew-form ew-view-form overlay-wrapper" action="<?= CurrentPageUrl(false) ?>" method="post" novalidate autocomplete="on">
<?php if (!$Page->isExport()) { ?>
<script>
var currentTable = <?= JsonEncode($Page->toClientVar()) ?>;
ew.deepAssign(ew.vars, { tables: { twresponse_tbl: currentTable } });
var currentPageID = ew.PAGE_ID = "view";
var currentForm;
var ftwresponse_tblview;
loadjs.ready(["wrapper", "head"], function () {
    let $ = jQuery;
    let fields = currentTable.fields;

    // Form object
    let form = new ew.FormBuilder()
        .setId("ftwresponse_tblview")
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
<input type="hidden" name="t" value="twresponse_tbl">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<table class="<?= $Page->TableClass ?>">
<?php if ($Page->id_twresponse->Visible) { // id_twresponse ?>
    <tr id="r_id_twresponse"<?= $Page->id_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_id_twresponse"><?= $Page->id_twresponse->caption() ?></span></td>
        <td data-name="id_twresponse"<?= $Page->id_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_id_twresponse">
<span<?= $Page->id_twresponse->viewAttributes() ?>>
<?= $Page->id_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->sid_twresponse->Visible) { // sid_twresponse ?>
    <tr id="r_sid_twresponse"<?= $Page->sid_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_sid_twresponse"><?= $Page->sid_twresponse->caption() ?></span></td>
        <td data-name="sid_twresponse"<?= $Page->sid_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_sid_twresponse">
<span<?= $Page->sid_twresponse->viewAttributes() ?>>
<?= $Page->sid_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->date_created_twresponse->Visible) { // date_created_twresponse ?>
    <tr id="r_date_created_twresponse"<?= $Page->date_created_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_date_created_twresponse"><?= $Page->date_created_twresponse->caption() ?></span></td>
        <td data-name="date_created_twresponse"<?= $Page->date_created_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_date_created_twresponse">
<span<?= $Page->date_created_twresponse->viewAttributes() ?>>
<?= $Page->date_created_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->date_updated_twresponse->Visible) { // date_updated_twresponse ?>
    <tr id="r_date_updated_twresponse"<?= $Page->date_updated_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_date_updated_twresponse"><?= $Page->date_updated_twresponse->caption() ?></span></td>
        <td data-name="date_updated_twresponse"<?= $Page->date_updated_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_date_updated_twresponse">
<span<?= $Page->date_updated_twresponse->viewAttributes() ?>>
<?= $Page->date_updated_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->date_sent_twresponse->Visible) { // date_sent_twresponse ?>
    <tr id="r_date_sent_twresponse"<?= $Page->date_sent_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_date_sent_twresponse"><?= $Page->date_sent_twresponse->caption() ?></span></td>
        <td data-name="date_sent_twresponse"<?= $Page->date_sent_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_date_sent_twresponse">
<span<?= $Page->date_sent_twresponse->viewAttributes() ?>>
<?= $Page->date_sent_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->account_sid_twresponse->Visible) { // account_sid_twresponse ?>
    <tr id="r_account_sid_twresponse"<?= $Page->account_sid_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_account_sid_twresponse"><?= $Page->account_sid_twresponse->caption() ?></span></td>
        <td data-name="account_sid_twresponse"<?= $Page->account_sid_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_account_sid_twresponse">
<span<?= $Page->account_sid_twresponse->viewAttributes() ?>>
<?= $Page->account_sid_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->to_twresponse->Visible) { // to_twresponse ?>
    <tr id="r_to_twresponse"<?= $Page->to_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_to_twresponse"><?= $Page->to_twresponse->caption() ?></span></td>
        <td data-name="to_twresponse"<?= $Page->to_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_to_twresponse">
<span<?= $Page->to_twresponse->viewAttributes() ?>>
<?= $Page->to_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->from_twresponse->Visible) { // from_twresponse ?>
    <tr id="r_from_twresponse"<?= $Page->from_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_from_twresponse"><?= $Page->from_twresponse->caption() ?></span></td>
        <td data-name="from_twresponse"<?= $Page->from_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_from_twresponse">
<span<?= $Page->from_twresponse->viewAttributes() ?>>
<?= $Page->from_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->messaging_service_sid_twresponse->Visible) { // messaging_service_sid_twresponse ?>
    <tr id="r_messaging_service_sid_twresponse"<?= $Page->messaging_service_sid_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_messaging_service_sid_twresponse"><?= $Page->messaging_service_sid_twresponse->caption() ?></span></td>
        <td data-name="messaging_service_sid_twresponse"<?= $Page->messaging_service_sid_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_messaging_service_sid_twresponse">
<span<?= $Page->messaging_service_sid_twresponse->viewAttributes() ?>>
<?= $Page->messaging_service_sid_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->body_twresponse->Visible) { // body_twresponse ?>
    <tr id="r_body_twresponse"<?= $Page->body_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_body_twresponse"><?= $Page->body_twresponse->caption() ?></span></td>
        <td data-name="body_twresponse"<?= $Page->body_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_body_twresponse">
<span<?= $Page->body_twresponse->viewAttributes() ?>>
<?= $Page->body_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->status_twresponse->Visible) { // status_twresponse ?>
    <tr id="r_status_twresponse"<?= $Page->status_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_status_twresponse"><?= $Page->status_twresponse->caption() ?></span></td>
        <td data-name="status_twresponse"<?= $Page->status_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_status_twresponse">
<span<?= $Page->status_twresponse->viewAttributes() ?>>
<?= $Page->status_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->num_segments_twresponse->Visible) { // num_segments_twresponse ?>
    <tr id="r_num_segments_twresponse"<?= $Page->num_segments_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_num_segments_twresponse"><?= $Page->num_segments_twresponse->caption() ?></span></td>
        <td data-name="num_segments_twresponse"<?= $Page->num_segments_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_num_segments_twresponse">
<span<?= $Page->num_segments_twresponse->viewAttributes() ?>>
<?= $Page->num_segments_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->num_media_twresponse->Visible) { // num_media_twresponse ?>
    <tr id="r_num_media_twresponse"<?= $Page->num_media_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_num_media_twresponse"><?= $Page->num_media_twresponse->caption() ?></span></td>
        <td data-name="num_media_twresponse"<?= $Page->num_media_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_num_media_twresponse">
<span<?= $Page->num_media_twresponse->viewAttributes() ?>>
<?= $Page->num_media_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->direction_twresponse->Visible) { // direction_twresponse ?>
    <tr id="r_direction_twresponse"<?= $Page->direction_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_direction_twresponse"><?= $Page->direction_twresponse->caption() ?></span></td>
        <td data-name="direction_twresponse"<?= $Page->direction_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_direction_twresponse">
<span<?= $Page->direction_twresponse->viewAttributes() ?>>
<?= $Page->direction_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->api_version_twresponse->Visible) { // api_version_twresponse ?>
    <tr id="r_api_version_twresponse"<?= $Page->api_version_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_api_version_twresponse"><?= $Page->api_version_twresponse->caption() ?></span></td>
        <td data-name="api_version_twresponse"<?= $Page->api_version_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_api_version_twresponse">
<span<?= $Page->api_version_twresponse->viewAttributes() ?>>
<?= $Page->api_version_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->price_twresponse->Visible) { // price_twresponse ?>
    <tr id="r_price_twresponse"<?= $Page->price_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_price_twresponse"><?= $Page->price_twresponse->caption() ?></span></td>
        <td data-name="price_twresponse"<?= $Page->price_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_price_twresponse">
<span<?= $Page->price_twresponse->viewAttributes() ?>>
<?= $Page->price_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->price_unit_twresponse->Visible) { // price_unit_twresponse ?>
    <tr id="r_price_unit_twresponse"<?= $Page->price_unit_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_price_unit_twresponse"><?= $Page->price_unit_twresponse->caption() ?></span></td>
        <td data-name="price_unit_twresponse"<?= $Page->price_unit_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_price_unit_twresponse">
<span<?= $Page->price_unit_twresponse->viewAttributes() ?>>
<?= $Page->price_unit_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->error_code_twresponse->Visible) { // error_code_twresponse ?>
    <tr id="r_error_code_twresponse"<?= $Page->error_code_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_error_code_twresponse"><?= $Page->error_code_twresponse->caption() ?></span></td>
        <td data-name="error_code_twresponse"<?= $Page->error_code_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_error_code_twresponse">
<span<?= $Page->error_code_twresponse->viewAttributes() ?>>
<?= $Page->error_code_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->error_message_twresponse->Visible) { // error_message_twresponse ?>
    <tr id="r_error_message_twresponse"<?= $Page->error_message_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_error_message_twresponse"><?= $Page->error_message_twresponse->caption() ?></span></td>
        <td data-name="error_message_twresponse"<?= $Page->error_message_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_error_message_twresponse">
<span<?= $Page->error_message_twresponse->viewAttributes() ?>>
<?= $Page->error_message_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->uri_twresponse->Visible) { // uri_twresponse ?>
    <tr id="r_uri_twresponse"<?= $Page->uri_twresponse->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_uri_twresponse"><?= $Page->uri_twresponse->caption() ?></span></td>
        <td data-name="uri_twresponse"<?= $Page->uri_twresponse->cellAttributes() ?>>
<span id="el_twresponse_tbl_uri_twresponse">
<span<?= $Page->uri_twresponse->viewAttributes() ?>>
<?= $Page->uri_twresponse->getViewValue() ?></span>
</span>
</td>
    </tr>
<?php } ?>
<?php if ($Page->fk_id_sent->Visible) { // fk_id_sent ?>
    <tr id="r_fk_id_sent"<?= $Page->fk_id_sent->rowAttributes() ?>>
        <td class="<?= $Page->TableLeftColumnClass ?>"><span id="elh_twresponse_tbl_fk_id_sent"><?= $Page->fk_id_sent->caption() ?></span></td>
        <td data-name="fk_id_sent"<?= $Page->fk_id_sent->cellAttributes() ?>>
<span id="el_twresponse_tbl_fk_id_sent">
<span<?= $Page->fk_id_sent->viewAttributes() ?>>
<?= $Page->fk_id_sent->getViewValue() ?></span>
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
