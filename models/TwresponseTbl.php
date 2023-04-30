<?php

namespace PHPMaker2023\appmessage;

use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\FetchMode;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;

/**
 * Table class for twresponse_tbl
 */
class TwresponseTbl extends DbTable
{
    protected $SqlFrom = "";
    protected $SqlSelect = null;
    protected $SqlSelectList = null;
    protected $SqlWhere = "";
    protected $SqlGroupBy = "";
    protected $SqlHaving = "";
    protected $SqlOrderBy = "";
    public $DbErrorMessage = "";
    public $UseSessionForListSql = true;

    // Column CSS classes
    public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
    public $RightColumnClass = "col-sm-10";
    public $OffsetColumnClass = "col-sm-10 offset-sm-2";
    public $TableLeftColumnClass = "w-col-2";

    // Ajax / Modal
    public $UseAjaxActions = false;
    public $ModalSearch = false;
    public $ModalView = true;
    public $ModalAdd = false;
    public $ModalEdit = false;
    public $ModalUpdate = false;
    public $InlineDelete = false;
    public $ModalGridAdd = false;
    public $ModalGridEdit = false;
    public $ModalMultiEdit = false;

    // Fields
    public $id_twresponse;
    public $sid_twresponse;
    public $date_created_twresponse;
    public $date_updated_twresponse;
    public $date_sent_twresponse;
    public $account_sid_twresponse;
    public $to_twresponse;
    public $from_twresponse;
    public $messaging_service_sid_twresponse;
    public $body_twresponse;
    public $status_twresponse;
    public $num_segments_twresponse;
    public $num_media_twresponse;
    public $direction_twresponse;
    public $api_version_twresponse;
    public $price_twresponse;
    public $price_unit_twresponse;
    public $error_code_twresponse;
    public $error_message_twresponse;
    public $uri_twresponse;
    public $fk_id_sent;

    // Page ID
    public $PageID = ""; // To be overridden by subclass

    // Constructor
    public function __construct()
    {
        parent::__construct();
        global $Language, $CurrentLanguage, $CurrentLocale;

        // Language object
        $Language = Container("language");
        $this->TableVar = "twresponse_tbl";
        $this->TableName = 'twresponse_tbl';
        $this->TableType = "TABLE";
        $this->ImportUseTransaction = $this->supportsTransaction() && Config("IMPORT_USE_TRANSACTION");
        $this->UseTransaction = $this->supportsTransaction() && Config("USE_TRANSACTION");

        // Update Table
        $this->UpdateTable = "[dbo].[twresponse_tbl]";
        $this->Dbid = 'DB';
        $this->ExportAll = true;
        $this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)

        // PDF
        $this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
        $this->ExportPageSize = "a4"; // Page size (PDF only)

        // PhpSpreadsheet
        $this->ExportExcelPageOrientation = null; // Page orientation (PhpSpreadsheet only)
        $this->ExportExcelPageSize = null; // Page size (PhpSpreadsheet only)

        // PHPWord
        $this->ExportWordPageOrientation = ""; // Page orientation (PHPWord only)
        $this->ExportWordPageSize = ""; // Page orientation (PHPWord only)
        $this->ExportWordColumnWidth = null; // Cell width (PHPWord only)
        $this->DetailAdd = false; // Allow detail add
        $this->DetailEdit = false; // Allow detail edit
        $this->DetailView = false; // Allow detail view
        $this->ShowMultipleDetails = false; // Show multiple details
        $this->GridAddRowCount = 5;
        $this->AllowAddDeleteRow = true; // Allow add/delete row
        $this->UseAjaxActions = $this->UseAjaxActions || Config("USE_AJAX_ACTIONS");
        $this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
        $this->BasicSearch = new BasicSearch($this);

        // id_twresponse
        $this->id_twresponse = new DbField(
            $this, // Table
            'x_id_twresponse', // Variable name
            'id_twresponse', // Name
            '[id_twresponse]', // Expression
            'CAST([id_twresponse] AS NVARCHAR)', // Basic search expression
            3, // Type
            4, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[id_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'NO' // Edit Tag
        );
        $this->id_twresponse->InputTextType = "text";
        $this->id_twresponse->IsAutoIncrement = true; // Autoincrement field
        $this->id_twresponse->IsPrimaryKey = true; // Primary key field
        $this->id_twresponse->Nullable = false; // NOT NULL field
        $this->id_twresponse->Sortable = false; // Allow sort
        $this->id_twresponse->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->id_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN"];
        $this->Fields['id_twresponse'] = &$this->id_twresponse;

        // sid_twresponse
        $this->sid_twresponse = new DbField(
            $this, // Table
            'x_sid_twresponse', // Variable name
            'sid_twresponse', // Name
            '[sid_twresponse]', // Expression
            '[sid_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[sid_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->sid_twresponse->InputTextType = "text";
        $this->sid_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['sid_twresponse'] = &$this->sid_twresponse;

        // date_created_twresponse
        $this->date_created_twresponse = new DbField(
            $this, // Table
            'x_date_created_twresponse', // Variable name
            'date_created_twresponse', // Name
            '[date_created_twresponse]', // Expression
            '[date_created_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[date_created_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->date_created_twresponse->InputTextType = "text";
        $this->date_created_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['date_created_twresponse'] = &$this->date_created_twresponse;

        // date_updated_twresponse
        $this->date_updated_twresponse = new DbField(
            $this, // Table
            'x_date_updated_twresponse', // Variable name
            'date_updated_twresponse', // Name
            '[date_updated_twresponse]', // Expression
            '[date_updated_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[date_updated_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->date_updated_twresponse->InputTextType = "text";
        $this->date_updated_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['date_updated_twresponse'] = &$this->date_updated_twresponse;

        // date_sent_twresponse
        $this->date_sent_twresponse = new DbField(
            $this, // Table
            'x_date_sent_twresponse', // Variable name
            'date_sent_twresponse', // Name
            '[date_sent_twresponse]', // Expression
            '[date_sent_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[date_sent_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->date_sent_twresponse->InputTextType = "text";
        $this->date_sent_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['date_sent_twresponse'] = &$this->date_sent_twresponse;

        // account_sid_twresponse
        $this->account_sid_twresponse = new DbField(
            $this, // Table
            'x_account_sid_twresponse', // Variable name
            'account_sid_twresponse', // Name
            '[account_sid_twresponse]', // Expression
            '[account_sid_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[account_sid_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->account_sid_twresponse->InputTextType = "text";
        $this->account_sid_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['account_sid_twresponse'] = &$this->account_sid_twresponse;

        // to_twresponse
        $this->to_twresponse = new DbField(
            $this, // Table
            'x_to_twresponse', // Variable name
            'to_twresponse', // Name
            '[to_twresponse]', // Expression
            '[to_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[to_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->to_twresponse->InputTextType = "text";
        $this->to_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['to_twresponse'] = &$this->to_twresponse;

        // from_twresponse
        $this->from_twresponse = new DbField(
            $this, // Table
            'x_from_twresponse', // Variable name
            'from_twresponse', // Name
            '[from_twresponse]', // Expression
            '[from_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[from_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->from_twresponse->InputTextType = "text";
        $this->from_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['from_twresponse'] = &$this->from_twresponse;

        // messaging_service_sid_twresponse
        $this->messaging_service_sid_twresponse = new DbField(
            $this, // Table
            'x_messaging_service_sid_twresponse', // Variable name
            'messaging_service_sid_twresponse', // Name
            '[messaging_service_sid_twresponse]', // Expression
            '[messaging_service_sid_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[messaging_service_sid_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->messaging_service_sid_twresponse->InputTextType = "text";
        $this->messaging_service_sid_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['messaging_service_sid_twresponse'] = &$this->messaging_service_sid_twresponse;

        // body_twresponse
        $this->body_twresponse = new DbField(
            $this, // Table
            'x_body_twresponse', // Variable name
            'body_twresponse', // Name
            '[body_twresponse]', // Expression
            '[body_twresponse]', // Basic search expression
            200, // Type
            0, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[body_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->body_twresponse->InputTextType = "text";
        $this->body_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['body_twresponse'] = &$this->body_twresponse;

        // status_twresponse
        $this->status_twresponse = new DbField(
            $this, // Table
            'x_status_twresponse', // Variable name
            'status_twresponse', // Name
            '[status_twresponse]', // Expression
            '[status_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[status_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->status_twresponse->InputTextType = "text";
        $this->status_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['status_twresponse'] = &$this->status_twresponse;

        // num_segments_twresponse
        $this->num_segments_twresponse = new DbField(
            $this, // Table
            'x_num_segments_twresponse', // Variable name
            'num_segments_twresponse', // Name
            '[num_segments_twresponse]', // Expression
            '[num_segments_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[num_segments_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->num_segments_twresponse->InputTextType = "text";
        $this->num_segments_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['num_segments_twresponse'] = &$this->num_segments_twresponse;

        // num_media_twresponse
        $this->num_media_twresponse = new DbField(
            $this, // Table
            'x_num_media_twresponse', // Variable name
            'num_media_twresponse', // Name
            '[num_media_twresponse]', // Expression
            '[num_media_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[num_media_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->num_media_twresponse->InputTextType = "text";
        $this->num_media_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['num_media_twresponse'] = &$this->num_media_twresponse;

        // direction_twresponse
        $this->direction_twresponse = new DbField(
            $this, // Table
            'x_direction_twresponse', // Variable name
            'direction_twresponse', // Name
            '[direction_twresponse]', // Expression
            '[direction_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[direction_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->direction_twresponse->InputTextType = "text";
        $this->direction_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['direction_twresponse'] = &$this->direction_twresponse;

        // api_version_twresponse
        $this->api_version_twresponse = new DbField(
            $this, // Table
            'x_api_version_twresponse', // Variable name
            'api_version_twresponse', // Name
            '[api_version_twresponse]', // Expression
            '[api_version_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[api_version_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->api_version_twresponse->InputTextType = "text";
        $this->api_version_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['api_version_twresponse'] = &$this->api_version_twresponse;

        // price_twresponse
        $this->price_twresponse = new DbField(
            $this, // Table
            'x_price_twresponse', // Variable name
            'price_twresponse', // Name
            '[price_twresponse]', // Expression
            '[price_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[price_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->price_twresponse->InputTextType = "text";
        $this->price_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['price_twresponse'] = &$this->price_twresponse;

        // price_unit_twresponse
        $this->price_unit_twresponse = new DbField(
            $this, // Table
            'x_price_unit_twresponse', // Variable name
            'price_unit_twresponse', // Name
            '[price_unit_twresponse]', // Expression
            '[price_unit_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[price_unit_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->price_unit_twresponse->InputTextType = "text";
        $this->price_unit_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['price_unit_twresponse'] = &$this->price_unit_twresponse;

        // error_code_twresponse
        $this->error_code_twresponse = new DbField(
            $this, // Table
            'x_error_code_twresponse', // Variable name
            'error_code_twresponse', // Name
            '[error_code_twresponse]', // Expression
            '[error_code_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[error_code_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->error_code_twresponse->InputTextType = "text";
        $this->error_code_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['error_code_twresponse'] = &$this->error_code_twresponse;

        // error_message_twresponse
        $this->error_message_twresponse = new DbField(
            $this, // Table
            'x_error_message_twresponse', // Variable name
            'error_message_twresponse', // Name
            '[error_message_twresponse]', // Expression
            '[error_message_twresponse]', // Basic search expression
            200, // Type
            50, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[error_message_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->error_message_twresponse->InputTextType = "text";
        $this->error_message_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['error_message_twresponse'] = &$this->error_message_twresponse;

        // uri_twresponse
        $this->uri_twresponse = new DbField(
            $this, // Table
            'x_uri_twresponse', // Variable name
            'uri_twresponse', // Name
            '[uri_twresponse]', // Expression
            '[uri_twresponse]', // Basic search expression
            201, // Type
            0, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[uri_twresponse]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXTAREA' // Edit Tag
        );
        $this->uri_twresponse->InputTextType = "text";
        $this->uri_twresponse->Sortable = false; // Allow sort
        $this->uri_twresponse->SearchOperators = ["=", "<>", "IN", "NOT IN", "STARTS WITH", "NOT STARTS WITH", "LIKE", "NOT LIKE", "ENDS WITH", "NOT ENDS WITH", "IS EMPTY", "IS NOT EMPTY", "IS NULL", "IS NOT NULL"];
        $this->Fields['uri_twresponse'] = &$this->uri_twresponse;

        // fk_id_sent
        $this->fk_id_sent = new DbField(
            $this, // Table
            'x_fk_id_sent', // Variable name
            'fk_id_sent', // Name
            '[fk_id_sent]', // Expression
            'CAST([fk_id_sent] AS NVARCHAR)', // Basic search expression
            3, // Type
            4, // Size
            -1, // Date/Time format
            false, // Is upload field
            '[fk_id_sent]', // Virtual expression
            false, // Is virtual
            false, // Force selection
            false, // Is Virtual search
            'FORMATTED TEXT', // View Tag
            'TEXT' // Edit Tag
        );
        $this->fk_id_sent->InputTextType = "text";
        $this->fk_id_sent->IsForeignKey = true; // Foreign key field
        $this->fk_id_sent->Nullable = false; // NOT NULL field
        $this->fk_id_sent->Required = true; // Required field
        $this->fk_id_sent->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
        $this->fk_id_sent->SearchOperators = ["=", "<>", "IN", "NOT IN", "<", "<=", ">", ">=", "BETWEEN", "NOT BETWEEN"];
        $this->Fields['fk_id_sent'] = &$this->fk_id_sent;

        // Add Doctrine Cache
        $this->Cache = new ArrayCache();
        $this->CacheProfile = new \Doctrine\DBAL\Cache\QueryCacheProfile(0, $this->TableVar);

        // Call Table Load event
        $this->tableLoad();
    }

    // Field Visibility
    public function getFieldVisibility($fldParm)
    {
        global $Security;
        return $this->$fldParm->Visible; // Returns original value
    }

    // Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
    public function setLeftColumnClass($class)
    {
        if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
            $this->LeftColumnClass = $class . " col-form-label ew-label";
            $this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
            $this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
            $this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
        }
    }

    // Single column sort
    public function updateSort(&$fld)
    {
        if ($this->CurrentOrder == $fld->Name) {
            $sortField = $fld->Expression;
            $lastSort = $fld->getSort();
            if (in_array($this->CurrentOrderType, ["ASC", "DESC", "NO"])) {
                $curSort = $this->CurrentOrderType;
            } else {
                $curSort = $lastSort;
            }
            $orderBy = in_array($curSort, ["ASC", "DESC"]) ? $sortField . " " . $curSort : "";
            $this->setSessionOrderBy($orderBy); // Save to Session
        }
    }

    // Update field sort
    public function updateFieldSort()
    {
        $orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
        $flds = GetSortFields($orderBy);
        foreach ($this->Fields as $field) {
            $fldSort = "";
            foreach ($flds as $fld) {
                if ($fld[0] == $field->Expression || $fld[0] == $field->VirtualExpression) {
                    $fldSort = $fld[1];
                }
            }
            $field->setSort($fldSort);
        }
    }

    // Current master table name
    public function getCurrentMasterTable()
    {
        return Session(PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE"));
    }

    public function setCurrentMasterTable($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_MASTER_TABLE")] = $v;
    }

    // Get master WHERE clause from session values
    public function getMasterFilterFromSession()
    {
        // Master filter
        $masterFilter = "";
        if ($this->getCurrentMasterTable() == "sent_tbl") {
            $masterTable = Container("sent_tbl");
            if ($this->fk_id_sent->getSessionValue() != "") {
                $masterFilter .= "" . GetKeyFilter($masterTable->id_sent, $this->fk_id_sent->getSessionValue(), $masterTable->id_sent->DataType, $masterTable->Dbid);
            } else {
                return "";
            }
        }
        return $masterFilter;
    }

    // Get detail WHERE clause from session values
    public function getDetailFilterFromSession()
    {
        // Detail filter
        $detailFilter = "";
        if ($this->getCurrentMasterTable() == "sent_tbl") {
            $masterTable = Container("sent_tbl");
            if ($this->fk_id_sent->getSessionValue() != "") {
                $detailFilter .= "" . GetKeyFilter($this->fk_id_sent, $this->fk_id_sent->getSessionValue(), $masterTable->id_sent->DataType, $this->Dbid);
            } else {
                return "";
            }
        }
        return $detailFilter;
    }

    /**
     * Get master filter
     *
     * @param object $masterTable Master Table
     * @param array $keys Detail Keys
     * @return mixed NULL is returned if all keys are empty, Empty string is returned if some keys are empty and is required
     */
    public function getMasterFilter($masterTable, $keys)
    {
        $validKeys = true;
        switch ($masterTable->TableVar) {
            case "sent_tbl":
                $key = $keys["fk_id_sent"] ?? "";
                if (EmptyValue($key)) {
                    if ($masterTable->id_sent->Required) { // Required field and empty value
                        return ""; // Return empty filter
                    }
                    $validKeys = false;
                } elseif (!$validKeys) { // Already has empty key
                    return ""; // Return empty filter
                }
                if ($validKeys) {
                    return GetKeyFilter($masterTable->id_sent, $keys["fk_id_sent"], $this->fk_id_sent->DataType, $this->Dbid);
                }
                break;
        }
        return null; // All null values and no required fields
    }

    // Get detail filter
    public function getDetailFilter($masterTable)
    {
        switch ($masterTable->TableVar) {
            case "sent_tbl":
                return GetKeyFilter($this->fk_id_sent, $masterTable->id_sent->DbValue, $masterTable->id_sent->DataType, $masterTable->Dbid);
        }
        return "";
    }

    // Render X Axis for chart
    public function renderChartXAxis($chartVar, $chartRow)
    {
        return $chartRow;
    }

    // Table level SQL
    public function getSqlFrom() // From
    {
        return ($this->SqlFrom != "") ? $this->SqlFrom : "[dbo].[twresponse_tbl]";
    }

    public function sqlFrom() // For backward compatibility
    {
        return $this->getSqlFrom();
    }

    public function setSqlFrom($v)
    {
        $this->SqlFrom = $v;
    }

    public function getSqlSelect() // Select
    {
        return $this->SqlSelect ?? $this->getQueryBuilder()->select("*");
    }

    public function sqlSelect() // For backward compatibility
    {
        return $this->getSqlSelect();
    }

    public function setSqlSelect($v)
    {
        $this->SqlSelect = $v;
    }

    public function getSqlWhere() // Where
    {
        $where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
        $this->DefaultFilter = "";
        AddFilter($where, $this->DefaultFilter);
        return $where;
    }

    public function sqlWhere() // For backward compatibility
    {
        return $this->getSqlWhere();
    }

    public function setSqlWhere($v)
    {
        $this->SqlWhere = $v;
    }

    public function getSqlGroupBy() // Group By
    {
        return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
    }

    public function sqlGroupBy() // For backward compatibility
    {
        return $this->getSqlGroupBy();
    }

    public function setSqlGroupBy($v)
    {
        $this->SqlGroupBy = $v;
    }

    public function getSqlHaving() // Having
    {
        return ($this->SqlHaving != "") ? $this->SqlHaving : "";
    }

    public function sqlHaving() // For backward compatibility
    {
        return $this->getSqlHaving();
    }

    public function setSqlHaving($v)
    {
        $this->SqlHaving = $v;
    }

    public function getSqlOrderBy() // Order By
    {
        return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
    }

    public function sqlOrderBy() // For backward compatibility
    {
        return $this->getSqlOrderBy();
    }

    public function setSqlOrderBy($v)
    {
        $this->SqlOrderBy = $v;
    }

    // Apply User ID filters
    public function applyUserIDFilters($filter, $id = "")
    {
        return $filter;
    }

    // Check if User ID security allows view all
    public function userIDAllow($id = "")
    {
        $allow = $this->UserIDAllowSecurity;
        switch ($id) {
            case "add":
            case "copy":
            case "gridadd":
            case "register":
            case "addopt":
                return (($allow & 1) == 1);
            case "edit":
            case "gridedit":
            case "update":
            case "changepassword":
            case "resetpassword":
                return (($allow & 4) == 4);
            case "delete":
                return (($allow & 2) == 2);
            case "view":
                return (($allow & 32) == 32);
            case "search":
                return (($allow & 64) == 64);
            case "lookup":
                return (($allow & 256) == 256);
            default:
                return (($allow & 8) == 8);
        }
    }

    /**
     * Get record count
     *
     * @param string|QueryBuilder $sql SQL or QueryBuilder
     * @param mixed $c Connection
     * @return int
     */
    public function getRecordCount($sql, $c = null)
    {
        $cnt = -1;
        $rs = null;
        if ($sql instanceof QueryBuilder) { // Query builder
            $sqlwrk = clone $sql;
            $sqlwrk = $sqlwrk->resetQueryPart("orderBy")->getSQL();
        } else {
            $sqlwrk = $sql;
        }
        $pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';
        // Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
        if (
            ($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
            preg_match($pattern, $sqlwrk) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sqlwrk) &&
            !preg_match('/^\s*select\s+distinct\s+/i', $sqlwrk) && !preg_match('/\s+order\s+by\s+/i', $sqlwrk)
        ) {
            $sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sqlwrk);
        } else {
            $sqlwrk = "SELECT COUNT(*) FROM (" . $sqlwrk . ") COUNT_TABLE";
        }
        $conn = $c ?? $this->getConnection();
        $cnt = $conn->fetchOne($sqlwrk);
        if ($cnt !== false) {
            return (int)$cnt;
        }

        // Unable to get count by SELECT COUNT(*), execute the SQL to get record count directly
        return ExecuteRecordCount($sql, $conn);
    }

    // Get SQL
    public function getSql($where, $orderBy = "")
    {
        return $this->getSqlAsQueryBuilder($where, $orderBy)->getSQL();
    }

    // Get QueryBuilder
    public function getSqlAsQueryBuilder($where, $orderBy = "")
    {
        return $this->buildSelectSql(
            $this->getSqlSelect(),
            $this->getSqlFrom(),
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $where,
            $orderBy
        );
    }

    // Table SQL
    public function getCurrentSql()
    {
        $filter = $this->CurrentFilter;
        $filter = $this->applyUserIDFilters($filter);
        $sort = $this->getSessionOrderBy();
        return $this->getSql($filter, $sort);
    }

    /**
     * Table SQL with List page filter
     *
     * @return QueryBuilder
     */
    public function getListSql()
    {
        $filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->getSqlSelect();
        $from = $this->getSqlFrom();
        $sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
        $this->Sort = $sort;
        return $this->buildSelectSql(
            $select,
            $from,
            $this->getSqlWhere(),
            $this->getSqlGroupBy(),
            $this->getSqlHaving(),
            $this->getSqlOrderBy(),
            $filter,
            $sort
        );
    }

    // Get ORDER BY clause
    public function getOrderBy()
    {
        $orderBy = $this->getSqlOrderBy();
        $sort = $this->getSessionOrderBy();
        if ($orderBy != "" && $sort != "") {
            $orderBy .= ", " . $sort;
        } elseif ($sort != "") {
            $orderBy = $sort;
        }
        return $orderBy;
    }

    // Get record count based on filter (for detail record count in master table pages)
    public function loadRecordCount($filter)
    {
        $origFilter = $this->CurrentFilter;
        $this->CurrentFilter = $filter;
        $this->recordsetSelecting($this->CurrentFilter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
        $cnt = $this->getRecordCount($sql);
        $this->CurrentFilter = $origFilter;
        return $cnt;
    }

    // Get record count (for current List page)
    public function listRecordCount()
    {
        $filter = $this->getSessionWhere();
        AddFilter($filter, $this->CurrentFilter);
        $filter = $this->applyUserIDFilters($filter);
        $this->recordsetSelecting($filter);
        $select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : $this->getQueryBuilder()->select("*");
        $groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
        $having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
        $sql = $this->buildSelectSql($select, $this->getSqlFrom(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
        $cnt = $this->getRecordCount($sql);
        return $cnt;
    }

    /**
     * INSERT statement
     *
     * @param mixed $rs
     * @return QueryBuilder
     */
    public function insertSql(&$rs)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->insert($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->setValue($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        return $queryBuilder;
    }

    // Insert
    public function insert(&$rs)
    {
        $conn = $this->getConnection();
        try {
            $success = $this->insertSql($rs)->execute();
            $this->DbErrorMessage = "";
        } catch (\Exception $e) {
            $success = false;
            $this->DbErrorMessage = $e->getMessage();
        }
        if ($success) {
            // Get insert id if necessary
            $this->id_twresponse->setDbValue($conn->lastInsertId());
            $rs['id_twresponse'] = $this->id_twresponse->DbValue;
        }
        return $success;
    }

    /**
     * UPDATE statement
     *
     * @param array $rs Data to be updated
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    public function updateSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->update($this->UpdateTable);
        foreach ($rs as $name => $value) {
            if (!isset($this->Fields[$name]) || $this->Fields[$name]->IsCustom || $this->Fields[$name]->IsAutoIncrement) {
                continue;
            }
            $type = GetParameterType($this->Fields[$name], $value, $this->Dbid);
            $queryBuilder->set($this->Fields[$name]->Expression, $queryBuilder->createPositionalParameter($value, $type));
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        AddFilter($filter, $where);
        if ($filter != "") {
            $queryBuilder->where($filter);
        }
        return $queryBuilder;
    }

    // Update
    public function update(&$rs, $where = "", $rsold = null, $curfilter = true)
    {
        // If no field is updated, execute may return 0. Treat as success
        try {
            $success = $this->updateSql($rs, $where, $curfilter)->execute();
            $success = ($success > 0) ? $success : true;
            $this->DbErrorMessage = "";
        } catch (\Exception $e) {
            $success = false;
            $this->DbErrorMessage = $e->getMessage();
        }

        // Return auto increment field
        if ($success) {
            if (!isset($rs['id_twresponse']) && !EmptyValue($this->id_twresponse->CurrentValue)) {
                $rs['id_twresponse'] = $this->id_twresponse->CurrentValue;
            }
        }
        return $success;
    }

    /**
     * DELETE statement
     *
     * @param array $rs Key values
     * @param string|array $where WHERE clause
     * @param string $curfilter Filter
     * @return QueryBuilder
     */
    public function deleteSql(&$rs, $where = "", $curfilter = true)
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->delete($this->UpdateTable);
        if (is_array($where)) {
            $where = $this->arrayToFilter($where);
        }
        if ($rs) {
            if (array_key_exists('id_twresponse', $rs)) {
                AddFilter($where, QuotedName('id_twresponse', $this->Dbid) . '=' . QuotedValue($rs['id_twresponse'], $this->id_twresponse->DataType, $this->Dbid));
            }
        }
        $filter = ($curfilter) ? $this->CurrentFilter : "";
        AddFilter($filter, $where);
        return $queryBuilder->where($filter != "" ? $filter : "0=1");
    }

    // Delete
    public function delete(&$rs, $where = "", $curfilter = false)
    {
        $success = true;
        if ($success) {
            try {
                $success = $this->deleteSql($rs, $where, $curfilter)->execute();
                $this->DbErrorMessage = "";
            } catch (\Exception $e) {
                $success = false;
                $this->DbErrorMessage = $e->getMessage();
            }
        }
        return $success;
    }

    // Load DbValue from recordset or array
    protected function loadDbValues($row)
    {
        if (!is_array($row)) {
            return;
        }
        $this->id_twresponse->DbValue = $row['id_twresponse'];
        $this->sid_twresponse->DbValue = $row['sid_twresponse'];
        $this->date_created_twresponse->DbValue = $row['date_created_twresponse'];
        $this->date_updated_twresponse->DbValue = $row['date_updated_twresponse'];
        $this->date_sent_twresponse->DbValue = $row['date_sent_twresponse'];
        $this->account_sid_twresponse->DbValue = $row['account_sid_twresponse'];
        $this->to_twresponse->DbValue = $row['to_twresponse'];
        $this->from_twresponse->DbValue = $row['from_twresponse'];
        $this->messaging_service_sid_twresponse->DbValue = $row['messaging_service_sid_twresponse'];
        $this->body_twresponse->DbValue = $row['body_twresponse'];
        $this->status_twresponse->DbValue = $row['status_twresponse'];
        $this->num_segments_twresponse->DbValue = $row['num_segments_twresponse'];
        $this->num_media_twresponse->DbValue = $row['num_media_twresponse'];
        $this->direction_twresponse->DbValue = $row['direction_twresponse'];
        $this->api_version_twresponse->DbValue = $row['api_version_twresponse'];
        $this->price_twresponse->DbValue = $row['price_twresponse'];
        $this->price_unit_twresponse->DbValue = $row['price_unit_twresponse'];
        $this->error_code_twresponse->DbValue = $row['error_code_twresponse'];
        $this->error_message_twresponse->DbValue = $row['error_message_twresponse'];
        $this->uri_twresponse->DbValue = $row['uri_twresponse'];
        $this->fk_id_sent->DbValue = $row['fk_id_sent'];
    }

    // Delete uploaded files
    public function deleteUploadedFiles($row)
    {
        $this->loadDbValues($row);
    }

    // Record filter WHERE clause
    protected function sqlKeyFilter()
    {
        return "[id_twresponse] = @id_twresponse@";
    }

    // Get Key
    public function getKey($current = false)
    {
        $keys = [];
        $val = $current ? $this->id_twresponse->CurrentValue : $this->id_twresponse->OldValue;
        if (EmptyValue($val)) {
            return "";
        } else {
            $keys[] = $val;
        }
        return implode(Config("COMPOSITE_KEY_SEPARATOR"), $keys);
    }

    // Set Key
    public function setKey($key, $current = false)
    {
        $this->OldKey = strval($key);
        $keys = explode(Config("COMPOSITE_KEY_SEPARATOR"), $this->OldKey);
        if (count($keys) == 1) {
            if ($current) {
                $this->id_twresponse->CurrentValue = $keys[0];
            } else {
                $this->id_twresponse->OldValue = $keys[0];
            }
        }
    }

    // Get record filter
    public function getRecordFilter($row = null, $current = false)
    {
        $keyFilter = $this->sqlKeyFilter();
        if (is_array($row)) {
            $val = array_key_exists('id_twresponse', $row) ? $row['id_twresponse'] : null;
        } else {
            $val = !EmptyValue($this->id_twresponse->OldValue) && !$current ? $this->id_twresponse->OldValue : $this->id_twresponse->CurrentValue;
        }
        if (!is_numeric($val)) {
            return "0=1"; // Invalid key
        }
        if ($val === null) {
            return "0=1"; // Invalid key
        } else {
            $keyFilter = str_replace("@id_twresponse@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
        }
        return $keyFilter;
    }

    // Return page URL
    public function getReturnUrl()
    {
        $referUrl = ReferUrl();
        $referPageName = ReferPageName();
        $name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");
        // Get referer URL automatically
        if ($referUrl != "" && $referPageName != CurrentPageName() && $referPageName != "login") { // Referer not same page or login page
            $_SESSION[$name] = $referUrl; // Save to Session
        }
        return $_SESSION[$name] ?? GetUrl("TwresponseTblList");
    }

    // Set return page URL
    public function setReturnUrl($v)
    {
        $_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
    }

    // Get modal caption
    public function getModalCaption($pageName)
    {
        global $Language;
        if ($pageName == "TwresponseTblView") {
            return $Language->phrase("View");
        } elseif ($pageName == "TwresponseTblEdit") {
            return $Language->phrase("Edit");
        } elseif ($pageName == "TwresponseTblAdd") {
            return $Language->phrase("Add");
        }
        return "";
    }

    // API page name
    public function getApiPageName($action)
    {
        switch (strtolower($action)) {
            case Config("API_VIEW_ACTION"):
                return "TwresponseTblView";
            case Config("API_ADD_ACTION"):
                return "TwresponseTblAdd";
            case Config("API_EDIT_ACTION"):
                return "TwresponseTblEdit";
            case Config("API_DELETE_ACTION"):
                return "TwresponseTblDelete";
            case Config("API_LIST_ACTION"):
                return "TwresponseTblList";
            default:
                return "";
        }
    }

    // Current URL
    public function getCurrentUrl($parm = "")
    {
        $url = CurrentPageUrl(false);
        if ($parm != "") {
            $url = $this->keyUrl($url, $parm);
        } else {
            $url = $this->keyUrl($url, Config("TABLE_SHOW_DETAIL") . "=");
        }
        return $this->addMasterUrl($url);
    }

    // List URL
    public function getListUrl()
    {
        return "TwresponseTblList";
    }

    // View URL
    public function getViewUrl($parm = "")
    {
        if ($parm != "") {
            $url = $this->keyUrl("TwresponseTblView", $parm);
        } else {
            $url = $this->keyUrl("TwresponseTblView", Config("TABLE_SHOW_DETAIL") . "=");
        }
        return $this->addMasterUrl($url);
    }

    // Add URL
    public function getAddUrl($parm = "")
    {
        if ($parm != "") {
            $url = "TwresponseTblAdd?" . $parm;
        } else {
            $url = "TwresponseTblAdd";
        }
        return $this->addMasterUrl($url);
    }

    // Edit URL
    public function getEditUrl($parm = "")
    {
        $url = $this->keyUrl("TwresponseTblEdit", $parm);
        return $this->addMasterUrl($url);
    }

    // Inline edit URL
    public function getInlineEditUrl()
    {
        $url = $this->keyUrl("TwresponseTblList", "action=edit");
        return $this->addMasterUrl($url);
    }

    // Copy URL
    public function getCopyUrl($parm = "")
    {
        $url = $this->keyUrl("TwresponseTblAdd", $parm);
        return $this->addMasterUrl($url);
    }

    // Inline copy URL
    public function getInlineCopyUrl()
    {
        $url = $this->keyUrl("TwresponseTblList", "action=copy");
        return $this->addMasterUrl($url);
    }

    // Delete URL
    public function getDeleteUrl()
    {
        if ($this->UseAjaxActions && ConvertToBool(Param("infinitescroll")) && CurrentPageID() == "list") {
            return $this->keyUrl(GetApiUrl(Config("API_DELETE_ACTION") . "/" . $this->TableVar));
        } else {
            return $this->keyUrl("TwresponseTblDelete");
        }
    }

    // Add master url
    public function addMasterUrl($url)
    {
        if ($this->getCurrentMasterTable() == "sent_tbl" && !ContainsString($url, Config("TABLE_SHOW_MASTER") . "=")) {
            $url .= (ContainsString($url, "?") ? "&" : "?") . Config("TABLE_SHOW_MASTER") . "=" . $this->getCurrentMasterTable();
            $url .= "&" . GetForeignKeyUrl("fk_id_sent", $this->fk_id_sent->getSessionValue()); // Use Session Value
        }
        return $url;
    }

    public function keyToJson($htmlEncode = false)
    {
        $json = "";
        $json .= "\"id_twresponse\":" . JsonEncode($this->id_twresponse->CurrentValue, "number");
        $json = "{" . $json . "}";
        if ($htmlEncode) {
            $json = HtmlEncode($json);
        }
        return $json;
    }

    // Add key value to URL
    public function keyUrl($url, $parm = "")
    {
        if ($this->id_twresponse->CurrentValue !== null) {
            $url .= "/" . $this->encodeKeyValue($this->id_twresponse->CurrentValue);
        } else {
            return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
        }
        if ($parm != "") {
            $url .= "?" . $parm;
        }
        return $url;
    }

    // Render sort
    public function renderFieldHeader($fld)
    {
        global $Security, $Language, $Page;
        $sortUrl = "";
        $attrs = "";
        if ($fld->Sortable) {
            $sortUrl = $this->sortUrl($fld);
            $attrs = ' role="button" data-ew-action="sort" data-ajax="' . ($this->UseAjaxActions ? "true" : "false") . '" data-sort-url="' . $sortUrl . '" data-sort-type="1"';
            if ($this->ContextClass) { // Add context
                $attrs .= ' data-context="' . HtmlEncode($this->ContextClass) . '"';
            }
        }
        $html = '<div class="ew-table-header-caption"' . $attrs . '>' . $fld->caption() . '</div>';
        if ($sortUrl) {
            $html .= '<div class="ew-table-header-sort">' . $fld->getSortIcon() . '</div>';
        }
        if ($fld->UseFilter) {
            $html .= '<div class="ew-filter-dropdown-btn" data-ew-action="filter" data-table="' . $fld->TableVar . '" data-field="' . $fld->FieldVar .
                '"><div class="ew-table-header-filter" role="button" aria-haspopup="true">' . $Language->phrase("Filter") . '</div></div>';
        }
        $html = '<div class="ew-table-header-btn">' . $html . '</div>';
        if ($this->UseCustomTemplate) {
            $scriptId = str_replace("{id}", $fld->TableVar . "_" . $fld->Param, "tpc_{id}");
            $html = '<template id="' . $scriptId . '">' . $html . '</template>';
        }
        return $html;
    }

    // Sort URL
    public function sortUrl($fld)
    {
        global $DashboardReport;
        if (
            $this->CurrentAction || $this->isExport() ||
            in_array($fld->Type, [141, 201, 203, 128, 204, 205])
        ) { // Unsortable data type
                return "";
        } elseif ($fld->Sortable) {
            $urlParm = "order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->getNextSort();
            if ($DashboardReport) {
                $urlParm .= "&amp;dashboard=true";
            }
            return $this->addMasterUrl($this->CurrentPageName . "?" . $urlParm);
        } else {
            return "";
        }
    }

    // Get record keys from Post/Get/Session
    public function getRecordKeys()
    {
        $arKeys = [];
        $arKey = [];
        if (Param("key_m") !== null) {
            $arKeys = Param("key_m");
            $cnt = count($arKeys);
        } else {
            if (($keyValue = Param("id_twresponse") ?? Route("id_twresponse")) !== null) {
                $arKeys[] = $keyValue;
            } elseif (IsApi() && (($keyValue = Key(0) ?? Route(2)) !== null)) {
                $arKeys[] = $keyValue;
            } else {
                $arKeys = null; // Do not setup
            }

            //return $arKeys; // Do not return yet, so the values will also be checked by the following code
        }
        // Check keys
        $ar = [];
        if (is_array($arKeys)) {
            foreach ($arKeys as $key) {
                if (!is_numeric($key)) {
                    continue;
                }
                $ar[] = $key;
            }
        }
        return $ar;
    }

    // Get filter from records
    public function getFilterFromRecords($rows)
    {
        $keyFilter = "";
        foreach ($rows as $row) {
            if ($keyFilter != "") {
                $keyFilter .= " OR ";
            }
            $keyFilter .= "(" . $this->getRecordFilter($row) . ")";
        }
        return $keyFilter;
    }

    // Get filter from record keys
    public function getFilterFromRecordKeys($setCurrent = true)
    {
        $arKeys = $this->getRecordKeys();
        $keyFilter = "";
        foreach ($arKeys as $key) {
            if ($keyFilter != "") {
                $keyFilter .= " OR ";
            }
            if ($setCurrent) {
                $this->id_twresponse->CurrentValue = $key;
            } else {
                $this->id_twresponse->OldValue = $key;
            }
            $keyFilter .= "(" . $this->getRecordFilter() . ")";
        }
        return $keyFilter;
    }

    // Load recordset based on filter
    public function loadRs($filter)
    {
        $sql = $this->getSql($filter); // Set up filter (WHERE Clause)
        $conn = $this->getConnection();
        return $conn->executeQuery($sql);
    }

    // Load row values from record
    public function loadListRowValues(&$rs)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            return;
        }
        $this->id_twresponse->setDbValue($row['id_twresponse']);
        $this->sid_twresponse->setDbValue($row['sid_twresponse']);
        $this->date_created_twresponse->setDbValue($row['date_created_twresponse']);
        $this->date_updated_twresponse->setDbValue($row['date_updated_twresponse']);
        $this->date_sent_twresponse->setDbValue($row['date_sent_twresponse']);
        $this->account_sid_twresponse->setDbValue($row['account_sid_twresponse']);
        $this->to_twresponse->setDbValue($row['to_twresponse']);
        $this->from_twresponse->setDbValue($row['from_twresponse']);
        $this->messaging_service_sid_twresponse->setDbValue($row['messaging_service_sid_twresponse']);
        $this->body_twresponse->setDbValue($row['body_twresponse']);
        $this->status_twresponse->setDbValue($row['status_twresponse']);
        $this->num_segments_twresponse->setDbValue($row['num_segments_twresponse']);
        $this->num_media_twresponse->setDbValue($row['num_media_twresponse']);
        $this->direction_twresponse->setDbValue($row['direction_twresponse']);
        $this->api_version_twresponse->setDbValue($row['api_version_twresponse']);
        $this->price_twresponse->setDbValue($row['price_twresponse']);
        $this->price_unit_twresponse->setDbValue($row['price_unit_twresponse']);
        $this->error_code_twresponse->setDbValue($row['error_code_twresponse']);
        $this->error_message_twresponse->setDbValue($row['error_message_twresponse']);
        $this->uri_twresponse->setDbValue($row['uri_twresponse']);
        $this->fk_id_sent->setDbValue($row['fk_id_sent']);
    }

    // Render list content
    public function renderListContent($filter)
    {
        global $Response;
        $listPage = "TwresponseTblList";
        $listClass = PROJECT_NAMESPACE . $listPage;
        $page = new $listClass();
        $page->loadRecordsetFromFilter($filter);
        $view = Container("view");
        $template = $listPage . ".php"; // View
        $GLOBALS["Title"] ??= $page->Title; // Title
        try {
            $Response = $view->render($Response, $template, $GLOBALS);
        } finally {
            $page->terminate(); // Terminate page and clean up
        }
    }

    // Render list row values
    public function renderListRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // Common render codes

        // id_twresponse

        // sid_twresponse

        // date_created_twresponse

        // date_updated_twresponse

        // date_sent_twresponse

        // account_sid_twresponse

        // to_twresponse

        // from_twresponse

        // messaging_service_sid_twresponse

        // body_twresponse

        // status_twresponse

        // num_segments_twresponse

        // num_media_twresponse

        // direction_twresponse

        // api_version_twresponse

        // price_twresponse

        // price_unit_twresponse

        // error_code_twresponse

        // error_message_twresponse

        // uri_twresponse

        // fk_id_sent

        // id_twresponse
        $this->id_twresponse->ViewValue = $this->id_twresponse->CurrentValue;
        $this->id_twresponse->ViewValue = FormatNumber($this->id_twresponse->ViewValue, $this->id_twresponse->formatPattern());

        // sid_twresponse
        $this->sid_twresponse->ViewValue = $this->sid_twresponse->CurrentValue;

        // date_created_twresponse
        $this->date_created_twresponse->ViewValue = $this->date_created_twresponse->CurrentValue;

        // date_updated_twresponse
        $this->date_updated_twresponse->ViewValue = $this->date_updated_twresponse->CurrentValue;

        // date_sent_twresponse
        $this->date_sent_twresponse->ViewValue = $this->date_sent_twresponse->CurrentValue;

        // account_sid_twresponse
        $this->account_sid_twresponse->ViewValue = $this->account_sid_twresponse->CurrentValue;

        // to_twresponse
        $this->to_twresponse->ViewValue = $this->to_twresponse->CurrentValue;

        // from_twresponse
        $this->from_twresponse->ViewValue = $this->from_twresponse->CurrentValue;

        // messaging_service_sid_twresponse
        $this->messaging_service_sid_twresponse->ViewValue = $this->messaging_service_sid_twresponse->CurrentValue;

        // body_twresponse
        $this->body_twresponse->ViewValue = $this->body_twresponse->CurrentValue;

        // status_twresponse
        $this->status_twresponse->ViewValue = $this->status_twresponse->CurrentValue;

        // num_segments_twresponse
        $this->num_segments_twresponse->ViewValue = $this->num_segments_twresponse->CurrentValue;

        // num_media_twresponse
        $this->num_media_twresponse->ViewValue = $this->num_media_twresponse->CurrentValue;

        // direction_twresponse
        $this->direction_twresponse->ViewValue = $this->direction_twresponse->CurrentValue;

        // api_version_twresponse
        $this->api_version_twresponse->ViewValue = $this->api_version_twresponse->CurrentValue;

        // price_twresponse
        $this->price_twresponse->ViewValue = $this->price_twresponse->CurrentValue;

        // price_unit_twresponse
        $this->price_unit_twresponse->ViewValue = $this->price_unit_twresponse->CurrentValue;

        // error_code_twresponse
        $this->error_code_twresponse->ViewValue = $this->error_code_twresponse->CurrentValue;

        // error_message_twresponse
        $this->error_message_twresponse->ViewValue = $this->error_message_twresponse->CurrentValue;

        // uri_twresponse
        $this->uri_twresponse->ViewValue = $this->uri_twresponse->CurrentValue;

        // fk_id_sent
        $this->fk_id_sent->ViewValue = $this->fk_id_sent->CurrentValue;
        $this->fk_id_sent->ViewValue = FormatNumber($this->fk_id_sent->ViewValue, $this->fk_id_sent->formatPattern());

        // id_twresponse
        $this->id_twresponse->HrefValue = "";
        $this->id_twresponse->TooltipValue = "";

        // sid_twresponse
        $this->sid_twresponse->HrefValue = "";
        $this->sid_twresponse->TooltipValue = "";

        // date_created_twresponse
        $this->date_created_twresponse->HrefValue = "";
        $this->date_created_twresponse->TooltipValue = "";

        // date_updated_twresponse
        $this->date_updated_twresponse->HrefValue = "";
        $this->date_updated_twresponse->TooltipValue = "";

        // date_sent_twresponse
        $this->date_sent_twresponse->HrefValue = "";
        $this->date_sent_twresponse->TooltipValue = "";

        // account_sid_twresponse
        $this->account_sid_twresponse->HrefValue = "";
        $this->account_sid_twresponse->TooltipValue = "";

        // to_twresponse
        $this->to_twresponse->HrefValue = "";
        $this->to_twresponse->TooltipValue = "";

        // from_twresponse
        $this->from_twresponse->HrefValue = "";
        $this->from_twresponse->TooltipValue = "";

        // messaging_service_sid_twresponse
        $this->messaging_service_sid_twresponse->HrefValue = "";
        $this->messaging_service_sid_twresponse->TooltipValue = "";

        // body_twresponse
        $this->body_twresponse->HrefValue = "";
        $this->body_twresponse->TooltipValue = "";

        // status_twresponse
        $this->status_twresponse->HrefValue = "";
        $this->status_twresponse->TooltipValue = "";

        // num_segments_twresponse
        $this->num_segments_twresponse->HrefValue = "";
        $this->num_segments_twresponse->TooltipValue = "";

        // num_media_twresponse
        $this->num_media_twresponse->HrefValue = "";
        $this->num_media_twresponse->TooltipValue = "";

        // direction_twresponse
        $this->direction_twresponse->HrefValue = "";
        $this->direction_twresponse->TooltipValue = "";

        // api_version_twresponse
        $this->api_version_twresponse->HrefValue = "";
        $this->api_version_twresponse->TooltipValue = "";

        // price_twresponse
        $this->price_twresponse->HrefValue = "";
        $this->price_twresponse->TooltipValue = "";

        // price_unit_twresponse
        $this->price_unit_twresponse->HrefValue = "";
        $this->price_unit_twresponse->TooltipValue = "";

        // error_code_twresponse
        $this->error_code_twresponse->HrefValue = "";
        $this->error_code_twresponse->TooltipValue = "";

        // error_message_twresponse
        $this->error_message_twresponse->HrefValue = "";
        $this->error_message_twresponse->TooltipValue = "";

        // uri_twresponse
        $this->uri_twresponse->HrefValue = "";
        $this->uri_twresponse->TooltipValue = "";

        // fk_id_sent
        $this->fk_id_sent->HrefValue = "";
        $this->fk_id_sent->TooltipValue = "";

        // Call Row Rendered event
        $this->rowRendered();

        // Save data for Custom Template
        $this->Rows[] = $this->customTemplateFieldValues();
    }

    // Render edit row values
    public function renderEditRow()
    {
        global $Security, $CurrentLanguage, $Language;

        // Call Row Rendering event
        $this->rowRendering();

        // id_twresponse
        $this->id_twresponse->setupEditAttributes();
        $this->id_twresponse->EditValue = $this->id_twresponse->CurrentValue;
        $this->id_twresponse->EditValue = FormatNumber($this->id_twresponse->EditValue, $this->id_twresponse->formatPattern());

        // sid_twresponse
        $this->sid_twresponse->setupEditAttributes();
        if (!$this->sid_twresponse->Raw) {
            $this->sid_twresponse->CurrentValue = HtmlDecode($this->sid_twresponse->CurrentValue);
        }
        $this->sid_twresponse->EditValue = $this->sid_twresponse->CurrentValue;
        $this->sid_twresponse->PlaceHolder = RemoveHtml($this->sid_twresponse->caption());

        // date_created_twresponse
        $this->date_created_twresponse->setupEditAttributes();
        if (!$this->date_created_twresponse->Raw) {
            $this->date_created_twresponse->CurrentValue = HtmlDecode($this->date_created_twresponse->CurrentValue);
        }
        $this->date_created_twresponse->EditValue = $this->date_created_twresponse->CurrentValue;
        $this->date_created_twresponse->PlaceHolder = RemoveHtml($this->date_created_twresponse->caption());

        // date_updated_twresponse
        $this->date_updated_twresponse->setupEditAttributes();
        if (!$this->date_updated_twresponse->Raw) {
            $this->date_updated_twresponse->CurrentValue = HtmlDecode($this->date_updated_twresponse->CurrentValue);
        }
        $this->date_updated_twresponse->EditValue = $this->date_updated_twresponse->CurrentValue;
        $this->date_updated_twresponse->PlaceHolder = RemoveHtml($this->date_updated_twresponse->caption());

        // date_sent_twresponse
        $this->date_sent_twresponse->setupEditAttributes();
        if (!$this->date_sent_twresponse->Raw) {
            $this->date_sent_twresponse->CurrentValue = HtmlDecode($this->date_sent_twresponse->CurrentValue);
        }
        $this->date_sent_twresponse->EditValue = $this->date_sent_twresponse->CurrentValue;
        $this->date_sent_twresponse->PlaceHolder = RemoveHtml($this->date_sent_twresponse->caption());

        // account_sid_twresponse
        $this->account_sid_twresponse->setupEditAttributes();
        if (!$this->account_sid_twresponse->Raw) {
            $this->account_sid_twresponse->CurrentValue = HtmlDecode($this->account_sid_twresponse->CurrentValue);
        }
        $this->account_sid_twresponse->EditValue = $this->account_sid_twresponse->CurrentValue;
        $this->account_sid_twresponse->PlaceHolder = RemoveHtml($this->account_sid_twresponse->caption());

        // to_twresponse
        $this->to_twresponse->setupEditAttributes();
        if (!$this->to_twresponse->Raw) {
            $this->to_twresponse->CurrentValue = HtmlDecode($this->to_twresponse->CurrentValue);
        }
        $this->to_twresponse->EditValue = $this->to_twresponse->CurrentValue;
        $this->to_twresponse->PlaceHolder = RemoveHtml($this->to_twresponse->caption());

        // from_twresponse
        $this->from_twresponse->setupEditAttributes();
        if (!$this->from_twresponse->Raw) {
            $this->from_twresponse->CurrentValue = HtmlDecode($this->from_twresponse->CurrentValue);
        }
        $this->from_twresponse->EditValue = $this->from_twresponse->CurrentValue;
        $this->from_twresponse->PlaceHolder = RemoveHtml($this->from_twresponse->caption());

        // messaging_service_sid_twresponse
        $this->messaging_service_sid_twresponse->setupEditAttributes();
        if (!$this->messaging_service_sid_twresponse->Raw) {
            $this->messaging_service_sid_twresponse->CurrentValue = HtmlDecode($this->messaging_service_sid_twresponse->CurrentValue);
        }
        $this->messaging_service_sid_twresponse->EditValue = $this->messaging_service_sid_twresponse->CurrentValue;
        $this->messaging_service_sid_twresponse->PlaceHolder = RemoveHtml($this->messaging_service_sid_twresponse->caption());

        // body_twresponse
        $this->body_twresponse->setupEditAttributes();
        if (!$this->body_twresponse->Raw) {
            $this->body_twresponse->CurrentValue = HtmlDecode($this->body_twresponse->CurrentValue);
        }
        $this->body_twresponse->EditValue = $this->body_twresponse->CurrentValue;
        $this->body_twresponse->PlaceHolder = RemoveHtml($this->body_twresponse->caption());

        // status_twresponse
        $this->status_twresponse->setupEditAttributes();
        if (!$this->status_twresponse->Raw) {
            $this->status_twresponse->CurrentValue = HtmlDecode($this->status_twresponse->CurrentValue);
        }
        $this->status_twresponse->EditValue = $this->status_twresponse->CurrentValue;
        $this->status_twresponse->PlaceHolder = RemoveHtml($this->status_twresponse->caption());

        // num_segments_twresponse
        $this->num_segments_twresponse->setupEditAttributes();
        if (!$this->num_segments_twresponse->Raw) {
            $this->num_segments_twresponse->CurrentValue = HtmlDecode($this->num_segments_twresponse->CurrentValue);
        }
        $this->num_segments_twresponse->EditValue = $this->num_segments_twresponse->CurrentValue;
        $this->num_segments_twresponse->PlaceHolder = RemoveHtml($this->num_segments_twresponse->caption());

        // num_media_twresponse
        $this->num_media_twresponse->setupEditAttributes();
        if (!$this->num_media_twresponse->Raw) {
            $this->num_media_twresponse->CurrentValue = HtmlDecode($this->num_media_twresponse->CurrentValue);
        }
        $this->num_media_twresponse->EditValue = $this->num_media_twresponse->CurrentValue;
        $this->num_media_twresponse->PlaceHolder = RemoveHtml($this->num_media_twresponse->caption());

        // direction_twresponse
        $this->direction_twresponse->setupEditAttributes();
        if (!$this->direction_twresponse->Raw) {
            $this->direction_twresponse->CurrentValue = HtmlDecode($this->direction_twresponse->CurrentValue);
        }
        $this->direction_twresponse->EditValue = $this->direction_twresponse->CurrentValue;
        $this->direction_twresponse->PlaceHolder = RemoveHtml($this->direction_twresponse->caption());

        // api_version_twresponse
        $this->api_version_twresponse->setupEditAttributes();
        if (!$this->api_version_twresponse->Raw) {
            $this->api_version_twresponse->CurrentValue = HtmlDecode($this->api_version_twresponse->CurrentValue);
        }
        $this->api_version_twresponse->EditValue = $this->api_version_twresponse->CurrentValue;
        $this->api_version_twresponse->PlaceHolder = RemoveHtml($this->api_version_twresponse->caption());

        // price_twresponse
        $this->price_twresponse->setupEditAttributes();
        if (!$this->price_twresponse->Raw) {
            $this->price_twresponse->CurrentValue = HtmlDecode($this->price_twresponse->CurrentValue);
        }
        $this->price_twresponse->EditValue = $this->price_twresponse->CurrentValue;
        $this->price_twresponse->PlaceHolder = RemoveHtml($this->price_twresponse->caption());

        // price_unit_twresponse
        $this->price_unit_twresponse->setupEditAttributes();
        if (!$this->price_unit_twresponse->Raw) {
            $this->price_unit_twresponse->CurrentValue = HtmlDecode($this->price_unit_twresponse->CurrentValue);
        }
        $this->price_unit_twresponse->EditValue = $this->price_unit_twresponse->CurrentValue;
        $this->price_unit_twresponse->PlaceHolder = RemoveHtml($this->price_unit_twresponse->caption());

        // error_code_twresponse
        $this->error_code_twresponse->setupEditAttributes();
        if (!$this->error_code_twresponse->Raw) {
            $this->error_code_twresponse->CurrentValue = HtmlDecode($this->error_code_twresponse->CurrentValue);
        }
        $this->error_code_twresponse->EditValue = $this->error_code_twresponse->CurrentValue;
        $this->error_code_twresponse->PlaceHolder = RemoveHtml($this->error_code_twresponse->caption());

        // error_message_twresponse
        $this->error_message_twresponse->setupEditAttributes();
        if (!$this->error_message_twresponse->Raw) {
            $this->error_message_twresponse->CurrentValue = HtmlDecode($this->error_message_twresponse->CurrentValue);
        }
        $this->error_message_twresponse->EditValue = $this->error_message_twresponse->CurrentValue;
        $this->error_message_twresponse->PlaceHolder = RemoveHtml($this->error_message_twresponse->caption());

        // uri_twresponse
        $this->uri_twresponse->setupEditAttributes();
        $this->uri_twresponse->EditValue = $this->uri_twresponse->CurrentValue;
        $this->uri_twresponse->PlaceHolder = RemoveHtml($this->uri_twresponse->caption());

        // fk_id_sent
        $this->fk_id_sent->setupEditAttributes();
        if ($this->fk_id_sent->getSessionValue() != "") {
            $this->fk_id_sent->CurrentValue = GetForeignKeyValue($this->fk_id_sent->getSessionValue());
            $this->fk_id_sent->ViewValue = $this->fk_id_sent->CurrentValue;
            $this->fk_id_sent->ViewValue = FormatNumber($this->fk_id_sent->ViewValue, $this->fk_id_sent->formatPattern());
        } else {
            $this->fk_id_sent->EditValue = $this->fk_id_sent->CurrentValue;
            $this->fk_id_sent->PlaceHolder = RemoveHtml($this->fk_id_sent->caption());
            if (strval($this->fk_id_sent->EditValue) != "" && is_numeric($this->fk_id_sent->EditValue)) {
                $this->fk_id_sent->EditValue = FormatNumber($this->fk_id_sent->EditValue, null);
            }
        }

        // Call Row Rendered event
        $this->rowRendered();
    }

    // Aggregate list row values
    public function aggregateListRowValues()
    {
    }

    // Aggregate list row (for rendering)
    public function aggregateListRow()
    {
        // Call Row Rendered event
        $this->rowRendered();
    }

    // Export data in HTML/CSV/Word/Excel/Email/PDF format
    public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
    {
        if (!$recordset || !$doc) {
            return;
        }
        if (!$doc->ExportCustom) {
            // Write header
            $doc->exportTableHeader();
            if ($doc->Horizontal) { // Horizontal format, write header
                $doc->beginExportRow();
                if ($exportPageType == "view") {
                    $doc->exportCaption($this->id_twresponse);
                    $doc->exportCaption($this->sid_twresponse);
                    $doc->exportCaption($this->date_created_twresponse);
                    $doc->exportCaption($this->date_updated_twresponse);
                    $doc->exportCaption($this->date_sent_twresponse);
                    $doc->exportCaption($this->account_sid_twresponse);
                    $doc->exportCaption($this->to_twresponse);
                    $doc->exportCaption($this->from_twresponse);
                    $doc->exportCaption($this->messaging_service_sid_twresponse);
                    $doc->exportCaption($this->body_twresponse);
                    $doc->exportCaption($this->status_twresponse);
                    $doc->exportCaption($this->num_segments_twresponse);
                    $doc->exportCaption($this->num_media_twresponse);
                    $doc->exportCaption($this->direction_twresponse);
                    $doc->exportCaption($this->api_version_twresponse);
                    $doc->exportCaption($this->price_twresponse);
                    $doc->exportCaption($this->price_unit_twresponse);
                    $doc->exportCaption($this->error_code_twresponse);
                    $doc->exportCaption($this->error_message_twresponse);
                    $doc->exportCaption($this->uri_twresponse);
                    $doc->exportCaption($this->fk_id_sent);
                } else {
                    $doc->exportCaption($this->sid_twresponse);
                    $doc->exportCaption($this->date_created_twresponse);
                    $doc->exportCaption($this->date_updated_twresponse);
                    $doc->exportCaption($this->date_sent_twresponse);
                    $doc->exportCaption($this->account_sid_twresponse);
                    $doc->exportCaption($this->to_twresponse);
                    $doc->exportCaption($this->from_twresponse);
                    $doc->exportCaption($this->messaging_service_sid_twresponse);
                    $doc->exportCaption($this->body_twresponse);
                    $doc->exportCaption($this->status_twresponse);
                    $doc->exportCaption($this->num_segments_twresponse);
                    $doc->exportCaption($this->num_media_twresponse);
                    $doc->exportCaption($this->direction_twresponse);
                    $doc->exportCaption($this->api_version_twresponse);
                    $doc->exportCaption($this->price_twresponse);
                    $doc->exportCaption($this->price_unit_twresponse);
                    $doc->exportCaption($this->error_code_twresponse);
                    $doc->exportCaption($this->error_message_twresponse);
                    $doc->exportCaption($this->fk_id_sent);
                }
                $doc->endExportRow();
            }
        }

        // Move to first record
        $recCnt = $startRec - 1;
        $stopRec = ($stopRec > 0) ? $stopRec : PHP_INT_MAX;
        while (!$recordset->EOF && $recCnt < $stopRec) {
            $row = $recordset->fields;
            $recCnt++;
            if ($recCnt >= $startRec) {
                $rowCnt = $recCnt - $startRec + 1;

                // Page break
                if ($this->ExportPageBreakCount > 0) {
                    if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0) {
                        $doc->exportPageBreak();
                    }
                }
                $this->loadListRowValues($row);

                // Render row
                $this->RowType = ROWTYPE_VIEW; // Render view
                $this->resetAttributes();
                $this->renderListRow();
                if (!$doc->ExportCustom) {
                    $doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
                    if ($exportPageType == "view") {
                        $doc->exportField($this->id_twresponse);
                        $doc->exportField($this->sid_twresponse);
                        $doc->exportField($this->date_created_twresponse);
                        $doc->exportField($this->date_updated_twresponse);
                        $doc->exportField($this->date_sent_twresponse);
                        $doc->exportField($this->account_sid_twresponse);
                        $doc->exportField($this->to_twresponse);
                        $doc->exportField($this->from_twresponse);
                        $doc->exportField($this->messaging_service_sid_twresponse);
                        $doc->exportField($this->body_twresponse);
                        $doc->exportField($this->status_twresponse);
                        $doc->exportField($this->num_segments_twresponse);
                        $doc->exportField($this->num_media_twresponse);
                        $doc->exportField($this->direction_twresponse);
                        $doc->exportField($this->api_version_twresponse);
                        $doc->exportField($this->price_twresponse);
                        $doc->exportField($this->price_unit_twresponse);
                        $doc->exportField($this->error_code_twresponse);
                        $doc->exportField($this->error_message_twresponse);
                        $doc->exportField($this->uri_twresponse);
                        $doc->exportField($this->fk_id_sent);
                    } else {
                        $doc->exportField($this->sid_twresponse);
                        $doc->exportField($this->date_created_twresponse);
                        $doc->exportField($this->date_updated_twresponse);
                        $doc->exportField($this->date_sent_twresponse);
                        $doc->exportField($this->account_sid_twresponse);
                        $doc->exportField($this->to_twresponse);
                        $doc->exportField($this->from_twresponse);
                        $doc->exportField($this->messaging_service_sid_twresponse);
                        $doc->exportField($this->body_twresponse);
                        $doc->exportField($this->status_twresponse);
                        $doc->exportField($this->num_segments_twresponse);
                        $doc->exportField($this->num_media_twresponse);
                        $doc->exportField($this->direction_twresponse);
                        $doc->exportField($this->api_version_twresponse);
                        $doc->exportField($this->price_twresponse);
                        $doc->exportField($this->price_unit_twresponse);
                        $doc->exportField($this->error_code_twresponse);
                        $doc->exportField($this->error_message_twresponse);
                        $doc->exportField($this->fk_id_sent);
                    }
                    $doc->endExportRow($rowCnt);
                }
            }

            // Call Row Export server event
            if ($doc->ExportCustom) {
                $this->rowExport($doc, $row);
            }
            $recordset->moveNext();
        }
        if (!$doc->ExportCustom) {
            $doc->exportTableFooter();
        }
    }

    // Get file data
    public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0, $plugins = [])
    {
        global $DownloadFileName;

        // No binary fields
        return false;
    }

    // Table level events

    // Table Load event
    public function tableLoad()
    {
        // Enter your code here
    }

    // Recordset Selecting event
    public function recordsetSelecting(&$filter)
    {
        // Enter your code here
    }

    // Recordset Selected event
    public function recordsetSelected(&$rs)
    {
        //Log("Recordset Selected");
    }

    // Recordset Search Validated event
    public function recordsetSearchValidated()
    {
        // Example:
        //$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value
    }

    // Recordset Searching event
    public function recordsetSearching(&$filter)
    {
        // Enter your code here
    }

    // Row_Selecting event
    public function rowSelecting(&$filter)
    {
        // Enter your code here
    }

    // Row Selected event
    public function rowSelected(&$rs)
    {
        //Log("Row Selected");
    }

    // Row Inserting event
    public function rowInserting($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Inserted event
    public function rowInserted($rsold, &$rsnew)
    {
        //Log("Row Inserted");
    }

    // Row Updating event
    public function rowUpdating($rsold, &$rsnew)
    {
        // Enter your code here
        // To cancel, set return value to false
        return true;
    }

    // Row Updated event
    public function rowUpdated($rsold, &$rsnew)
    {
        //Log("Row Updated");
    }

    // Row Update Conflict event
    public function rowUpdateConflict($rsold, &$rsnew)
    {
        // Enter your code here
        // To ignore conflict, set return value to false
        return true;
    }

    // Grid Inserting event
    public function gridInserting()
    {
        // Enter your code here
        // To reject grid insert, set return value to false
        return true;
    }

    // Grid Inserted event
    public function gridInserted($rsnew)
    {
        //Log("Grid Inserted");
    }

    // Grid Updating event
    public function gridUpdating($rsold)
    {
        // Enter your code here
        // To reject grid update, set return value to false
        return true;
    }

    // Grid Updated event
    public function gridUpdated($rsold, $rsnew)
    {
        //Log("Grid Updated");
    }

    // Row Deleting event
    public function rowDeleting(&$rs)
    {
        // Enter your code here
        // To cancel, set return value to False
        return true;
    }

    // Row Deleted event
    public function rowDeleted(&$rs)
    {
        //Log("Row Deleted");
    }

    // Email Sending event
    public function emailSending($email, &$args)
    {
        //var_dump($email, $args); exit();
        return true;
    }

    // Lookup Selecting event
    public function lookupSelecting($fld, &$filter)
    {
        //var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
        // Enter your code here
    }

    // Row Rendering event
    public function rowRendering()
    {
        // Enter your code here
    }

    // Row Rendered event
    public function rowRendered()
    {
        // To view properties of field class, use:
        //var_dump($this-><FieldName>);
    }

    // User ID Filtering event
    public function userIdFiltering(&$filter)
    {
        // Enter your code here
    }
}
