<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "advertising_infoinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$advertising_info_update = new cadvertising_info_update();
$Page =& $advertising_info_update;

// Page init processing
$advertising_info_update->Page_Init();

// Page main processing
$advertising_info_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var advertising_info_update = new ew_Page("advertising_info_update");

// page properties
advertising_info_update.PageID = "update"; // page ID
var EW_PAGE_ID = advertising_info_update.PageID; // for backward compatibility

// extend page with ValidateForm function
advertising_info_update.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	
	var uelm;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_trang_thai"];
		uelm = fobj.elements["u" + infix + "_trang_thai"];
		if (uelm && uelm.checked) {
			if (elm && !ew_HasValue(elm))
				return ew_OnError(this, elm, "<?php echo Lang_Text('Hãy nhập trường bắt buộc');?> - Trang Thai");
		}

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
advertising_info_update.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
advertising_info_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
advertising_info_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
advertising_info_update.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="<?php echo $advertising_info->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php echo Lang_Text("Xuất bản");?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>


<?php $advertising_info_update->ShowMessage() ?>
<form name="fadvertising_infoupdate" id="fadvertising_infoupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return advertising_info_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="advertising_info">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $advertising_info_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($advertising_info_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td><?php echo Lang_Text('Trạng thái');?></td>
		<td>Chọn</td>
	</tr>
<?php if ($advertising_info->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $advertising_info->trang_thai->RowAttributes ?>>
		<td<?php echo $advertising_info->trang_thai->CellAttributes() ?>>
<input type="hidden" name="u_trang_thai" id="u_trang_thai" value="1">
<?php echo Lang_Text("Xuất bản"); ?></td>
		<td<?php echo $advertising_info->trang_thai->CellAttributes() ?>><span id="el_trang_thai">
<select id="x_trang_thai" name="x_trang_thai"<?php echo $advertising_info->trang_thai->EditAttributes() ?>>
<?php
if (is_array($advertising_info->trang_thai->EditValue)) {
	$arwrk = $advertising_info->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($advertising_info->trang_thai->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
		if ($selwrk <> "") $emptywrk = FALSE;
?>
<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
<?php echo $arwrk[$rowcntwrk][1] ?>
</option>
<?php
	}
}
?>
</select>
</span><?php echo $advertising_info->trang_thai->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="  <?php echo Lang_Text("Xuất bản");?>  ">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class cadvertising_info_update {

	// Page ID
	var $PageID = 'update';

	// Table Name
	var $TableName = 'advertising_info';

	// Page Object Name
	var $PageObjName = 'advertising_info_update';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $advertising_info;
		if ($advertising_info->UseTokenInUrl) $PageUrl .= "t=" . $advertising_info->TableVar . "&"; // add page token
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
			$_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
		} else {
			$_SESSION[EW_SESSION_MESSAGE] = $v;
		}
	}

	// Show Message
	function ShowMessage() {
		if ($this->getMessage() <> "") { // Message in Session, display
			echo "<p><span class=\"ewMessage\">" . $this->getMessage() . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate Page request
	function IsPageRequest() {
		global $objForm, $advertising_info;
		if ($advertising_info->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($advertising_info->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($advertising_info->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cadvertising_info_update() {
		global $conn;

		// Initialize table object
		$GLOBALS["advertising_info"] = new cadvertising_info();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'advertising_info', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $advertising_info;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("advertising_infolist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Global page loading event (in userfn6.php)
		Page_Loading();

		// Page load event, used in current page
		$this->Page_Load();
	}

	//
	//  Page_Terminate
	//  - called when exit page
	//  - if URL specified, redirect to the URL
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page unload event, used in current page
		$this->Page_Unload();

		// Global page unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close Connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			ob_end_clean();
			header("Location: $url");
		}
		exit();
	}
	var $nKeySelected;
	var $arRecKeys;
	var $sDisabled;

	//
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $advertising_info;

		// Try to load keys from list form
		$this->nKeySelected = 0;
		if (ew_IsHttpPost()) {
			if (isset($_POST["key_m"])) { // Key count > 0
				$this->nKeySelected = count($_POST["key_m"]); // Get number of keys
				$this->arRecKeys = ew_StripSlashes($_POST["key_m"]);
				$this->LoadMultiUpdateValues(); // Load initial values to form
			}
		}

		// Try to load key from update form
		if ($this->nKeySelected == 0) {
			$this->arRecKeys = array();

			// Create form object
			$objForm = new cFormObj();
			if (@$_POST["a_update"] <> "") {

				// Get action
				$advertising_info->CurrentAction = $_POST["a_update"];

				// Get record keys
				$sKey = @$_POST["k" . strval($this->nKeySelected+1) . "_key"];
				while ($sKey <> "") {
					$this->arRecKeys[$this->nKeySelected] = ew_StripSlashes($sKey);
					$this->nKeySelected++;
					$sKey = @$_POST["k" . strval($this->nKeySelected+1) . "_key"];
				}
				$this->LoadFormValues(); // Get form values

				// Validate Form
				if (!$this->ValidateForm()) {
					$advertising_info->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("advertising_infolist.php"); // No records selected, return to list
		switch ($advertising_info->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage("Xuất bản"); // Set update success message
					$this->Page_Terminate($advertising_info->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$advertising_info->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $advertising_info;
		$advertising_info->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		$rs = $this->LoadRecordset();
		$i = 1;
		while (!$rs->EOF) {
			if ($i == 1) {
				$advertising_info->trang_thai->setDbValue($rs->fields('trang_thai'));
			} else {
				if (!ew_CompareValue($advertising_info->trang_thai->DbValue, $rs->fields('trang_thai')))
					$advertising_info->trang_thai->CurrentValue = NULL;
			}
			$i++;
			$rs->MoveNext();
		}
		$rs->Close();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $advertising_info;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $advertising_info->KeyFilter();
				if ($sWrkFilter <> "") $sWrkFilter .= " OR ";
				$sWrkFilter .= $sFilter;
			} else {
				$sWrkFilter = "0=1";
				break;
			}
		}
		return $sWrkFilter;
	}

	// Set up key value
	function SetupKeyValues($key) {
		global $advertising_info;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$advertising_info->baiviet_id->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $advertising_info;
		$conn->BeginTrans();

		// Get old recordset
		$advertising_info->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $advertising_info->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$advertising_info->SendEmail = FALSE; // Do not send email on update success
				$UpdateRows = $this->EditRow(); // Update this row
			} else {
				$UpdateRows = FALSE;
			}
			if (!$UpdateRows)
				return; // Update failed
			if ($sKey <> "") $sKey .= ", ";
			$sKey .= $sThisKey;
		}

		// Check if all rows updated
		if ($UpdateRows) {
			$conn->CommitTrans(); // Commit transaction

			// Get new recordset
			$rsnew = $conn->Execute($sSql);
		} else {
			$conn->RollbackTrans(); // Rollback transaction
		}
		return $UpdateRows;
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $advertising_info;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $advertising_info;
		$advertising_info->trang_thai->setFormValue($objForm->GetValue("x_trang_thai"));
		$advertising_info->trang_thai->MultiUpdate = $objForm->GetValue("u_trang_thai");
		$advertising_info->baiviet_id->setFormValue($objForm->GetValue("x_baiviet_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $advertising_info;
		$advertising_info->baiviet_id->CurrentValue = $advertising_info->baiviet_id->FormValue;
		$advertising_info->trang_thai->CurrentValue = $advertising_info->trang_thai->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $advertising_info;

		// Call Recordset Selecting event
		$advertising_info->Recordset_Selecting($advertising_info->CurrentFilter);

		// Load list page SQL
		$sSql = $advertising_info->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$advertising_info->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $advertising_info;

		// Call Row_Rendering event
		$advertising_info->Row_Rendering();

		// Common render codes for all row types
		// trang_thai

		$advertising_info->trang_thai->CellCssStyle = "";
		$advertising_info->trang_thai->CellCssClass = "";
		if ($advertising_info->RowType == EW_ROWTYPE_VIEW) { // View row

			// trang_thai
			if (strval($advertising_info->trang_thai->CurrentValue) <> "") {
				switch ($advertising_info->trang_thai->CurrentValue) {
					case "0":
						$advertising_info->trang_thai->ViewValue = Lang_Text("Không xuất bản");
						break;
					case "1":
						$advertising_info->trang_thai->ViewValue = Lang_Text("Xuất bản");
						break;
					default:
						$advertising_info->trang_thai->ViewValue = $advertising_info->trang_thai->CurrentValue;
				}
			} else {
				$advertising_info->trang_thai->ViewValue = NULL;
			}
			$advertising_info->trang_thai->CssStyle = "";
			$advertising_info->trang_thai->CssClass = "";
			$advertising_info->trang_thai->ViewCustomAttributes = "";

			// trang_thai
			$advertising_info->trang_thai->HrefValue = "";
		} elseif ($advertising_info->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// trang_thai
			$advertising_info->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", Lang_Text("Không xuất bản"));
			$arwrk[] = array("1", Lang_Text("Xuất bản"));
			array_unshift($arwrk, array("", Lang_Text("Chọn")));
			$advertising_info->trang_thai->EditValue = $arwrk;

			// Edit refer script
			// trang_thai

			$advertising_info->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$advertising_info->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $advertising_info;

		// Initialize
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($advertising_info->trang_thai->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = "Không có bản ghi được chọn";
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($advertising_info->trang_thai->MultiUpdate <> "" && $advertising_info->trang_thai->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= Lang_Text('Hãy nhập trường bắt buộc')." - Trang Thai";
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $ValidateForm;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $advertising_info;
		$sFilter = $advertising_info->KeyFilter();
		$advertising_info->CurrentFilter = $sFilter;
		$sSql = $advertising_info->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			// Field trang_thai
			if ($advertising_info->trang_thai->MultiUpdate == "1") {
			$advertising_info->trang_thai->SetDbValueDef($advertising_info->trang_thai->CurrentValue, 0);
			$rsnew['trang_thai'] =& $advertising_info->trang_thai->DbValue;
			}

			// Call Row Updating event
			$bUpdateRow = $advertising_info->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($advertising_info->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($advertising_info->CancelMessage <> "") {
					$this->setMessage($advertising_info->CancelMessage);
					$advertising_info->CancelMessage = "";
				} else {
					$this->setMessage(Lang_Text('Cập nhật bị huỷ bỏ'));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$advertising_info->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
