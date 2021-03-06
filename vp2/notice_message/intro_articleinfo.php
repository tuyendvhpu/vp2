<?php

// PHPMaker 6 configuration for Table intro_article
$intro_article = NULL; // Initialize table object

// Define table class
class cintro_article {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $baiviet_id;
	var $chuyenmuc_id;
	var $tieude_baiviet;
	var $begin_date;
	var $end_date;
	var $tukhoa_baiviet;
	var $tomtat_baiviet;
	var $noidung_baiviet;
	var $nguon_baiviet;
	var $lienket_baiviet;
	var $thoigian_them;
	var $thoihan_sua;
	var $nguoi_them;
	var $nguoi_sua;
	var $soluot_truynhap;
	var $trang_thai;
	var $thutu_sapxep;
	var $anh_daidien;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function cintro_article() {
		$this->TableVar = "intro_article";
		$this->TableName = "intro_article";
		$this->SelectLimit = TRUE;
		$this->baiviet_id = new cField('intro_article', 'x_baiviet_id', 'baiviet_id', "`baiviet_id`", 19, -1, FALSE);
		$this->fields['baiviet_id'] =& $this->baiviet_id;
		$this->chuyenmuc_id = new cField('intro_article', 'x_chuyenmuc_id', 'chuyenmuc_id', "`chuyenmuc_id`", 19, -1, FALSE);
		$this->fields['chuyenmuc_id'] =& $this->chuyenmuc_id;
		$this->tieude_baiviet = new cField('intro_article', 'x_tieude_baiviet', 'tieude_baiviet', "`tieude_baiviet`", 200, -1, FALSE);
		$this->fields['tieude_baiviet'] =& $this->tieude_baiviet;
		$this->begin_date = new cField('intro_article', 'x_begin_date', 'begin_date', "`begin_date`", 135, 7, FALSE);
		$this->fields['begin_date'] =& $this->begin_date;
		$this->end_date = new cField('intro_article', 'x_end_date', 'end_date', "`end_date`", 135, 7, FALSE);
		$this->fields['end_date'] =& $this->end_date;
		$this->tukhoa_baiviet = new cField('intro_article', 'x_tukhoa_baiviet', 'tukhoa_baiviet', "`tukhoa_baiviet`", 200, -1, FALSE);
		$this->fields['tukhoa_baiviet'] =& $this->tukhoa_baiviet;
		$this->tomtat_baiviet = new cField('intro_article', 'x_tomtat_baiviet', 'tomtat_baiviet', "`tomtat_baiviet`", 201, -1, FALSE);
		$this->fields['tomtat_baiviet'] =& $this->tomtat_baiviet;
		$this->noidung_baiviet = new cField('intro_article', 'x_noidung_baiviet', 'noidung_baiviet', "`noidung_baiviet`", 201, -1, FALSE);
		$this->fields['noidung_baiviet'] =& $this->noidung_baiviet;
		$this->nguon_baiviet = new cField('intro_article', 'x_nguon_baiviet', 'nguon_baiviet', "`nguon_baiviet`", 200, -1, FALSE);
		$this->fields['nguon_baiviet'] =& $this->nguon_baiviet;
		$this->lienket_baiviet = new cField('intro_article', 'x_lienket_baiviet', 'lienket_baiviet', "`lienket_baiviet`", 200, -1, FALSE);
		$this->fields['lienket_baiviet'] =& $this->lienket_baiviet;
		$this->thoigian_them = new cField('intro_article', 'x_thoigian_them', 'thoigian_them', "`thoigian_them`", 135, 7, FALSE);
		$this->fields['thoigian_them'] =& $this->thoigian_them;
		$this->thoihan_sua = new cField('intro_article', 'x_thoihan_sua', 'thoihan_sua', "`thoihan_sua`", 135, 7, FALSE);
		$this->fields['thoihan_sua'] =& $this->thoihan_sua;
		$this->nguoi_them = new cField('intro_article', 'x_nguoi_them', 'nguoi_them', "`nguoi_them`", 19, -1, FALSE);
		$this->fields['nguoi_them'] =& $this->nguoi_them;
		$this->nguoi_sua = new cField('intro_article', 'x_nguoi_sua', 'nguoi_sua', "`nguoi_sua`", 19, -1, FALSE);
		$this->fields['nguoi_sua'] =& $this->nguoi_sua;
		$this->soluot_truynhap = new cField('intro_article', 'x_soluot_truynhap', 'soluot_truynhap', "`soluot_truynhap`", 19, -1, FALSE);
		$this->fields['soluot_truynhap'] =& $this->soluot_truynhap;
		$this->trang_thai = new cField('intro_article', 'x_trang_thai', 'trang_thai', "`trang_thai`", 19, -1, FALSE);
		$this->fields['trang_thai'] =& $this->trang_thai;
		$this->thutu_sapxep = new cField('intro_article', 'x_thutu_sapxep', 'thutu_sapxep', "`thutu_sapxep`", 5, -1, FALSE);
		$this->fields['thutu_sapxep'] =& $this->thutu_sapxep;
		$this->anh_daidien = new cField('intro_article', 'x_anh_daidien', 'anh_daidien', "`anh_daidien`", 205, -1, TRUE);
		$this->fields['anh_daidien'] =& $this->anh_daidien;
	}

	// Records per page
	function getRecordsPerPage() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE];
	}

	function setRecordsPerPage($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE] = $v;
	}

	// Start record number
	function getStartRecordNumber() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC];
	}

	function setStartRecordNumber($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC] = $v;
	}

	// Search Highlight Name
	function HighlightName() {
		return "intro_article_Highlight";
	}

	// Advanced search
	function getAdvancedSearch($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld];
	}

	function setAdvancedSearch($fld, $v) {
		if (@$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] <> $v) {
			$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] = $v;
		}
	}

	// Basic search Keyword
	function getBasicSearchKeyword() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH];
	}

	function setBasicSearchKeyword($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH] = $v;
	}

	// Basic Search Type
	function getBasicSearchType() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE];
	}

	function setBasicSearchType($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE] = $v;
	}

	// Search where clause
	function getSearchWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE];
	}

	function setSearchWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE] = $v;
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			$ofld->setSort("");
		}
	}

	// Session WHERE Clause
	function getSessionWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE];
	}

	function setSessionWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE] = $v;
	}

	// Session ORDER BY
	function getSessionOrderBy() {
		//return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY];
                return "";
	}

	function setSessionOrderBy($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY] = $v;
	}

	// Session Key
	function getKey($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld];
	}

	function setKey($fld, $v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld] = $v;
	}

	// Table level SQL
	function SqlSelect() { // Select
		return "SELECT * FROM `intro_article`";
	}

	function SqlWhere() { // Where
            // tag theo chuyên mục
            global $notice_id;
            if($notice_id <> null)
                {   
            	$sWhere = "(intro_article.trang_thai=1) AND (intro_article.chuyenmuc_id=".$notice_id.")";
                }
             else
               { 
                 $sWhere = "(intro_article.trang_thai=1)";
               }   
		$this->TableFilter = "";
		if ($this->TableFilter <> "") {
			if ($sWhere <> "") $sWhere .= "(" . $sWhere . ") AND (";
			$sWhere .= "(" . $this->TableFilter . ")";
		}
		return $sWhere;
 
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "end_date DESC";
	}

	// SQL variables
	var $CurrentFilter; // Current filter
	var $CurrentOrder; // Current order
	var $CurrentOrderType; // Current order type

	// Get SQL
	function GetSQL($where, $orderby) {
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$where, $orderby);
	}

	// Table SQL
	function SQL() {
		$sFilter = $this->CurrentFilter;
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Return table sql with list page filter
	function SelectSQL() {
		$sFilter = $this->getSessionWhere();
		if ($this->CurrentFilter <> "") {
			if ($sFilter <> "") $sFilter = "($sFilter) AND ";
			$sFilter .= "(" . $this->CurrentFilter . ")";
		}
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Return record count
	function SelectRecordCount() {
		global $conn;
		$cnt = -1;
		$sFilter = $this->CurrentFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		if ($this->SelectLimit) {
			$sSelect = $this->SelectSQL();
			if (strtoupper(substr($sSelect, 0, 13)) == "SELECT * FROM") {
				$sSelect = "SELECT COUNT(*) FROM" . substr($sSelect, 13);
				if ($rs = $conn->Execute($sSelect)) {
					if (!$rs->EOF)
						$cnt = $rs->fields[0];
					$rs->Close();
				}
			}
		}
		if ($cnt == -1) {
			if ($rs = $conn->Execute($this->SelectSQL())) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $sFilter;
		return intval($cnt);
	}

	// INSERT statement
	function InsertSQL(&$rs) {
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= (is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `intro_article` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `intro_article` SET ";
		foreach ($rs as $name => $value) {
			$SQL .= $this->fields[$name]->FldExpression . "=" .
					(is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM `intro_article` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'baiviet_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['baiviet_id'], $this->baiviet_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`baiviet_id` = @baiviet_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->baiviet_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@baiviet_id@", ew_AdjustSql($this->baiviet_id->CurrentValue), $sKeyFilter); // Replace key value
		return $sKeyFilter;
	}

	// Return url
	function getReturnUrl() {

		// Get referer URL automatically
		if (ew_ServerVar("HTTP_REFERER") <> "" && ew_ReferPage() <> ew_CurrentPage() && ew_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = ew_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] <> "") {
			return $_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL];
		} else {
			return "intro_articlelist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("intro_articleview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "intro_articleadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("intro_articleedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("intro_articleadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("intro_articledelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->baiviet_id->CurrentValue)) {
			$sUrl .= "baiviet_id=" . urlencode($this->baiviet_id->CurrentValue);
		} else {
			return "javascript:alert('Invalid Record! Key is null');";
		}
		return $sUrl;
	}

	// Sort Url
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			($fld->FldType == 205)) { // Unsortable data type
			return "";
		} else {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&ordertype=" . $fld->ReverseSort());
			return ew_CurrentPage() . "?" . $sUrlParm;
		}
	}

	// URL parm
	function UrlParm($parm = "") {
		$UrlParm = ($this->UseTokenInUrl) ? "t=intro_article" : "";
		if ($parm <> "") {
			if ($UrlParm <> "")
				$UrlParm .= "&";
			$UrlParm .= $parm;
		}
		return $UrlParm;
	}

	// Function LoadRs
	// - Load rows based on filter
	function LoadRs($sFilter) {
		global $conn;

		// Set up filter (Sql Where Clause) and get Return Sql
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		return $conn->Execute($sSql);
	}

	// Load row values from recordset
	function LoadListRowValues(&$rs) {
		$this->baiviet_id->setDbValue($rs->fields('baiviet_id'));
		$this->chuyenmuc_id->setDbValue($rs->fields('chuyenmuc_id'));
		$this->tieude_baiviet->setDbValue($rs->fields('tieude_baiviet'));
		$this->begin_date->setDbValue($rs->fields('begin_date'));
		$this->end_date->setDbValue($rs->fields('end_date'));
		$this->tukhoa_baiviet->setDbValue($rs->fields('tukhoa_baiviet'));
		$this->tomtat_baiviet->setDbValue($rs->fields('tomtat_baiviet'));
		$this->noidung_baiviet->setDbValue($rs->fields('noidung_baiviet'));
		$this->nguon_baiviet->setDbValue($rs->fields('nguon_baiviet'));
		$this->lienket_baiviet->setDbValue($rs->fields('lienket_baiviet'));
		$this->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$this->thoihan_sua->setDbValue($rs->fields('thoihan_sua'));
		$this->nguoi_them->setDbValue($rs->fields('nguoi_them'));
		$this->nguoi_sua->setDbValue($rs->fields('nguoi_sua'));
		$this->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$this->trang_thai->setDbValue($rs->fields('trang_thai'));
		$this->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$this->anh_daidien->Upload->DbValue = $rs->fields('anh_daidien');
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// baiviet_id
		$this->baiviet_id->ViewValue = $this->baiviet_id->CurrentValue;
		$this->baiviet_id->CssStyle = "";
		$this->baiviet_id->CssClass = "";
		$this->baiviet_id->ViewCustomAttributes = "";

		// chuyenmuc_id
		$this->chuyenmuc_id->ViewValue = $this->chuyenmuc_id->CurrentValue;
		$this->chuyenmuc_id->CssStyle = "";
		$this->chuyenmuc_id->CssClass = "";
		$this->chuyenmuc_id->ViewCustomAttributes = "";

		// tieude_baiviet
		$this->tieude_baiviet->ViewValue = $this->tieude_baiviet->CurrentValue;
		$this->tieude_baiviet->CssStyle = "";
		$this->tieude_baiviet->CssClass = "";
		$this->tieude_baiviet->ViewCustomAttributes = "";

		// begin_date
		$this->begin_date->ViewValue = $this->begin_date->CurrentValue;
		$this->begin_date->ViewValue = ew_FormatDateTime($this->begin_date->ViewValue, 7);
		$this->begin_date->CssStyle = "";
		$this->begin_date->CssClass = "";
		$this->begin_date->ViewCustomAttributes = "";

		// end_date
		$this->end_date->ViewValue = $this->end_date->CurrentValue;
		$this->end_date->ViewValue = ew_FormatDateTime($this->end_date->ViewValue, 7);
		$this->end_date->CssStyle = "";
		$this->end_date->CssClass = "";
		$this->end_date->ViewCustomAttributes = "";

		// tukhoa_baiviet
		$this->tukhoa_baiviet->ViewValue = $this->tukhoa_baiviet->CurrentValue;
		$this->tukhoa_baiviet->CssStyle = "";
		$this->tukhoa_baiviet->CssClass = "";
		$this->tukhoa_baiviet->ViewCustomAttributes = "";

		// trang_thai
		$this->trang_thai->ViewValue = $this->trang_thai->CurrentValue;
		$this->trang_thai->CssStyle = "";
		$this->trang_thai->CssClass = "";
		$this->trang_thai->ViewCustomAttributes = "";

		// thutu_sapxep
		$this->thutu_sapxep->ViewValue = $this->thutu_sapxep->CurrentValue;
		$this->thutu_sapxep->CssStyle = "";
		$this->thutu_sapxep->CssClass = "";
		$this->thutu_sapxep->ViewCustomAttributes = "";

		// baiviet_id
		$this->baiviet_id->HrefValue = "";

		// chuyenmuc_id
		$this->chuyenmuc_id->HrefValue = "";

		// tieude_baiviet
		$this->tieude_baiviet->HrefValue = "";

		// begin_date
		$this->begin_date->HrefValue = "";

		// end_date
		$this->end_date->HrefValue = "";

		// tukhoa_baiviet
		$this->tukhoa_baiviet->HrefValue = "";

		// trang_thai
		$this->trang_thai->HrefValue = "";

		// thutu_sapxep
		$this->thutu_sapxep->HrefValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}
	var $CurrentAction; // Current action
	var $EventName; // Event name
	var $EventCancelled; // Event cancelled
	var $CancelMessage; // Cancel message
	var $RowType; // Row Type
	var $CssClass; // Css class
	var $CssStyle; // Css style
	var $RowClientEvents; // Row client events

	// Row Attribute
	function RowAttributes() {
		$sAtt = "";
		if (trim($this->CssStyle) <> "") {
			$sAtt .= " style=\"" . trim($this->CssStyle) . "\"";
		}
		if (trim($this->CssClass) <> "") {
			$sAtt .= " class=\"" . trim($this->CssClass) . "\"";
		}
		if ($this->Export == "") {
			if (trim($this->RowClientEvents) <> "") {
				$sAtt .= " " . trim($this->RowClientEvents);
			}
		}
		return $sAtt;
	}

	// Field objects
	function fields($fldname) {
		return $this->fields[$fldname];
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here	
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here	
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here	
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}

	// Row Inserting event
	function Row_Inserting(&$rs) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted(&$rs) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating(&$rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated(&$rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}
}
?>
