<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "subject_adinfo.php" ?>
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
$subject_ad_update = new csubject_ad_update();
$Page =& $subject_ad_update;

// Page init processing
$subject_ad_update->Page_Init();

// Page main processing
$subject_ad_update->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var subject_ad_update = new ew_Page("subject_ad_update");

// page properties
subject_ad_update.PageID = "update"; // page ID
var EW_PAGE_ID = subject_ad_update.PageID; // for backward compatibility

// extend page with ValidateForm function
subject_ad_update.ValidateForm = function(fobj) {
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
subject_ad_update.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
subject_ad_update.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
subject_ad_update.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
subject_ad_update.ValidateRequired = false; // no JavaScript validation
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
								<a href="<?php echo $subject_ad->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;<?php Lang_Text("Xuất bản")?></font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>

<?php $subject_ad_update->ShowMessage() ?>
<form name="fsubject_adupdate" id="fsubject_adupdate" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return subject_ad_update.ValidateForm(this);">
<p>
<input type="hidden" name="t" id="t" value="subject_ad">
<input type="hidden" name="a_update" id="a_update" value="U">
<?php for ($i = 0; $i < $subject_ad_update->nKeySelected; $i++) { ?>
<input type="hidden" name="k<?php echo $i+1 ?>_key" id="key<?php echo $i+1 ?>" value="<?php echo ew_HtmlEncode($subject_ad_update->arRecKeys[$i]) ?>">
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
	<tr class="ewTableHeader">
		<td><?php echo Lang_Text('Trạng thái');?></td>
		<td>chọn</td>
	</tr>
<?php if ($subject_ad->trang_thai->Visible) { // trang_thai ?>
	<tr<?php echo $subject_ad->trang_thai->RowAttributes ?>>
		<td<?php echo $subject_ad->trang_thai->CellAttributes() ?>>
<input type="hidden" name="u_trang_thai" id="u_trang_thai" value="1">
Trạng thái</td>
		<td<?php echo $subject_ad->trang_thai->CellAttributes() ?>><span id="el_trang_thai">
<select id="x_trang_thai" name="x_trang_thai"<?php echo $subject_ad->trang_thai->EditAttributes() ?>>
<?php
if (is_array($subject_ad->trang_thai->EditValue)) {
	$arwrk = $subject_ad->trang_thai->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($subject_ad->trang_thai->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span><?php echo $subject_ad->trang_thai->CustomMsg ?></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<p>
<input type="submit" name="btnAction" id="btnAction" value="  <?php echo Lang_Text("Xuất bản"); ?>  ">
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
class csubject_ad_update {

	// Page ID
	var $PageID = 'update';

	// Table Name
	var $TableName = 'subject_ad';

	// Page Object Name
	var $PageObjName = 'subject_ad_update';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $subject_ad;
		if ($subject_ad->UseTokenInUrl) $PageUrl .= "t=" . $subject_ad->TableVar . "&"; // add page token
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
		global $objForm, $subject_ad;
		if ($subject_ad->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($subject_ad->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($subject_ad->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function csubject_ad_update() {
		global $conn;

		// Initialize table object
		$GLOBALS["subject_ad"] = new csubject_ad();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'update', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'subject_ad', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $subject_ad;
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
			$this->Page_Terminate("subject_adlist.php");
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
		global $objForm, $gsFormError, $subject_ad;

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
				$subject_ad->CurrentAction = $_POST["a_update"];

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
					$subject_ad->CurrentAction = "I"; // Form error, reset action
					$this->setMessage($gsFormError);
				}
			}
		}
		if ($this->nKeySelected <= 0)
			$this->Page_Terminate("subject_adlist.php"); // No records selected, return to list
		switch ($subject_ad->CurrentAction) {
			case "U": // Update
				if ($this->UpdateRows()) { // Update Records based on key
					$this->setMessage("Xuất bản"); // Set update success message
					$this->Page_Terminate($subject_ad->getReturnUrl()); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values
				}
		}

		// Render row
		$subject_ad->RowType = EW_ROWTYPE_EDIT; // Render edit
		$this->RenderRow();
	}

	// Load initial values to form if field values are identical in all selected records
	function LoadMultiUpdateValues() {
		global $subject_ad;
		$subject_ad->CurrentFilter = $this->BuildKeyFilter();

		// Load recordset
		$rs = $this->LoadRecordset();
		$i = 1;
		while (!$rs->EOF) {
			if ($i == 1) {
				$subject_ad->trang_thai->setDbValue($rs->fields('trang_thai'));
			} else {
				if (!ew_CompareValue($subject_ad->trang_thai->DbValue, $rs->fields('trang_thai')))
					$subject_ad->trang_thai->CurrentValue = NULL;
			}
			$i++;
			$rs->MoveNext();
		}
		$rs->Close();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $subject_ad;
		$sWrkFilter = "";
		foreach ($this->arRecKeys as $sKey) {
			$sKey = trim($sKey);
			if ($this->SetupKeyValues($sKey)) {
				$sFilter = $subject_ad->KeyFilter();
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
		global $subject_ad;
		$sKeyFld = $key;
		if (!is_numeric($sKeyFld))
			return FALSE;
		$subject_ad->chuyenmuc_id->CurrentValue = $sKeyFld;
		return TRUE;
	}

	// Update all selected rows
	function UpdateRows() {
		global $conn, $subject_ad;
		$conn->BeginTrans();

		// Get old recordset
		$subject_ad->CurrentFilter = $this->BuildKeyFilter();
		$sSql = $subject_ad->SQL();
		$rsold = $conn->Execute($sSql);

		// Update all rows
		$sKey = "";
		foreach ($this->arRecKeys as $sThisKey) {
			$sThisKey = trim($sThisKey);
			if ($this->SetupKeyValues($sThisKey)) {
				$subject_ad->SendEmail = FALSE; // Do not send email on update success
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
		global $objForm, $subject_ad;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $subject_ad;
		$subject_ad->trang_thai->setFormValue($objForm->GetValue("x_trang_thai"));
		$subject_ad->trang_thai->MultiUpdate = $objForm->GetValue("u_trang_thai");
		$subject_ad->chuyenmuc_id->setFormValue($objForm->GetValue("x_chuyenmuc_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $subject_ad;
		$subject_ad->chuyenmuc_id->CurrentValue = $subject_ad->chuyenmuc_id->FormValue;
		$subject_ad->trang_thai->CurrentValue = $subject_ad->trang_thai->FormValue;
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $subject_ad;

		// Call Recordset Selecting event
		$subject_ad->Recordset_Selecting($subject_ad->CurrentFilter);

		// Load list page SQL
		$sSql = $subject_ad->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$subject_ad->Recordset_Selected($rs);
		return $rs;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $subject_ad;

		// Call Row_Rendering event
		$subject_ad->Row_Rendering();

		// Common render codes for all row types
		// trang_thai

		$subject_ad->trang_thai->CellCssStyle = "";
		$subject_ad->trang_thai->CellCssClass = "";
		if ($subject_ad->RowType == EW_ROWTYPE_VIEW) { // View row

			// trang_thai
			if (strval($subject_ad->trang_thai->CurrentValue) <> "") {
				switch ($subject_ad->trang_thai->CurrentValue) {
					case "0":
						$subject_ad->trang_thai->ViewValue = Lang_Text("Không xuất bản");
						break;
					case "1":
						$subject_ad->trang_thai->ViewValue = Lang_Text("Xuất bản");
						break;
					default:
						$subject_ad->trang_thai->ViewValue = $subject_ad->trang_thai->CurrentValue;
				}
			} else {
				$subject_ad->trang_thai->ViewValue = NULL;
			}
			$subject_ad->trang_thai->CssStyle = "";
			$subject_ad->trang_thai->CssClass = "";
			$subject_ad->trang_thai->ViewCustomAttributes = "";

			// trang_thai
			$subject_ad->trang_thai->HrefValue = "";
		} elseif ($subject_ad->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// trang_thai
			$subject_ad->trang_thai->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", Lang_Text("Không xuất bản"));
			$arwrk[] = array("1", Lang_Text("Xuất bản"));
			array_unshift($arwrk, array("", Lang_Text("Chọn")));
			$subject_ad->trang_thai->EditValue = $arwrk;

			// Edit refer script
			// trang_thai

			$subject_ad->trang_thai->HrefValue = "";
		}

		// Call Row Rendered event
		$subject_ad->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $subject_ad;

		// Initialize
		$gsFormError = "";
		$lUpdateCnt = 0;
		if ($subject_ad->trang_thai->MultiUpdate == "1") $lUpdateCnt++;
		if ($lUpdateCnt == 0) {
			$gsFormError = "Không có bản ghi được chọn";
			return FALSE;
		}

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($subject_ad->trang_thai->MultiUpdate <> "" && $subject_ad->trang_thai->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Chưa nhập - Trang Thai";
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
		global $conn, $Security, $subject_ad;
		$sFilter = $subject_ad->KeyFilter();
		$subject_ad->CurrentFilter = $sFilter;
		$sSql = $subject_ad->SQL();
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
			if ($subject_ad->trang_thai->MultiUpdate == "1") {
			$subject_ad->trang_thai->SetDbValueDef($subject_ad->trang_thai->CurrentValue, 0);
			$rsnew['trang_thai'] =& $subject_ad->trang_thai->DbValue;
			}

			// Call Row Updating event
			$bUpdateRow = $subject_ad->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($subject_ad->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($subject_ad->CancelMessage <> "") {
					$this->setMessage($subject_ad->CancelMessage);
					$subject_ad->CancelMessage = "";
				} else {
					$this->setMessage(Lang_Text('Cập nhật bị huỷ bỏ'));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$subject_ad->Row_Updated($rsold, $rsnew);
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
