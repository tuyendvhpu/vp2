<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_answerinfo.php" ?>
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
$t_answer_view = new ct_answer_view();
$Page =& $t_answer_view;

// Page init processing
$t_answer_view->Page_Init();

// Page main processing
$t_answer_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_answer->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_answer_view = new ew_Page("t_answer_view");

// page properties
t_answer_view.PageID = "view"; // page ID
var EW_PAGE_ID = t_answer_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
t_answer_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_answer_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_answer_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_answer_view.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php } ?>

<p><span class="phpmaker">
        <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<a href="t_answerlist.php?question_id= <?php  echo $_SESSION["question_id"];?>"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Xem thông tin câu trả lời</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							  <?php 
                                                                    $sSqlAnser = "Select * From `t_question` where question_id = ".$_SESSION["question_id"];
                                                                    //echo $sSqlAnser;
                                                                    $rsAns = $conn->Execute($sSqlAnser);
                                                                    //echo $rsAns ;
                                                                    $arAns = ($rsAns) ? $rsAns->GetRows() : array();
                                                                    if ($rsAns) $rsAns->Close();
                                                                    $rowAns = count($arAns);
                                                                    if($rowAns>0){
                                                                         $_SESSION["mailq"]  = $arAns[0]['email'];
                                                                        $_SESSION["IdCodeq"] = $arAns[0]['IDcard'];
                                                                         $IdCode = $arAns[0]['Idcard'];
                                                                        $_SESSION["s_number"] = $arAns[0]['s_number'];
                                                                        $_SESSION["s_public"] = $arAns[0]['s_public'];
                                                                        $_SESSION["ID_Group"] = $arAns[0]['ID_Group'];   
                                                                         
                                                                        $sSqlGroup = "Select * From t_question_group where id = ".$_SESSION["ID_Group"];
                                                                    //echo $sSqlAnser;
                                                                    $rsGroup = $conn->Execute($sSqlGroup);
                                                                    //echo $rsAns ;
                                                                    $arGroup = ($rsGroup) ? $rsGroup->GetRows() : array();
                                                                    if ($rsGroup) $rsGroup->Close();
                                                                    $rowGroup = count($arGroup);
                                                                    if($rowGroup>0)
                                                                       $_SESSION["Group_Name"] = $arGroup[0]['NAME'];    
                                                                              
                                                                  ?>
                                               <tr>
                                                                <td height="20" colspan="2" align="left" valign="top"><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Câu hỏi</font></b></td>
                                                      
                                                </tr> 
                                                <tr>
                                                <td   valign="top"  colspan="2">
                                                                    <table cellspacing="0"    width="100%">
                                        <tr style="height:10px;">
                                            <td width="10%" >Họ Tên: </td>
                                            <td  align="left" ><?php echo $arAns[0]['user_name'];?></td>
                                                
                                        </tr>
                                        <tr style="height:10px;">
                                            <td  width="10%" >Mã Sinh Viên: </td>
                                            <td  align="left"><?php echo $arAns[0]['msv_id'];?></td>
                                                
                                        </tr>
                                         <tr style="height:10px;">

                                            <td width="10%" >Điện thoại </td>
                                            <td align="left"><?php echo $arAns[0]['tel'];?></td>
                                                
                                        </tr>
                                          <tr>
                                            <td width="10%">Email </td>
                                            <td  align="left"><?php echo $arAns[0]['email'];?></td>
                                                
                                        </tr> 
                                        <tr>
                                            <td width="10%">Mã câu hỏi: </td>
                                            <td  align="left"><?php echo $_SESSION["IdCodeq"];?></td>
                                                
                                        </tr><tr>
                                            </table>
                                                                    </td>
                                                                
                                                               
							</tr>
                                                        <tr>  <td  style="height:10px;"  valign="top"  colspan="2"></td></tr>
                                        <tr>
								<td   valign="top"  colspan="2">
                                                                    <table cellspacing="0" boder ="1"   width="100%">
                                                                              <tr >
                                                                            <td width="15%" class="ewGridContent"   valign="top">
                                                                            Câu hỏi:
                                                                            </td>
                                                                            <td class="ewGridContent" width="85%" align="left" valign="top"><?php echo $arAns[0]['content']?>
                                                                            </td>


                                                                            </tr> 
                                                                            <tr >
                                                                            <td width="15%" class="ewGridContent"  valign="top">
                                                                            Lý do không hài lòng 1:
                                                                            </td>
                                                                            <td class="ewGridContent" width="85%" align="left" valign="top"><?php echo $arAns[0]['content1']?>
                                                                            </td>


                                                                            </tr>   
                                                                            <tr >
                                                                            <td width="15%" class="ewGridContent"  valign="top">
                                                                            Lý do không hài lòng 2:
                                                                            </td>
                                                                            <td class="ewGridContent" width="85%" align="left" valign="top"><?php echo $arAns[0]['content2']?>
                                                                            </td>


                                                                            </tr>   
                                                                    </table>
                                                                    </td>
                                                                
                                                               
							</tr>
                                                      
                                                  <?php } ?>
</table>
        <br>
<?php if ($t_answer->Export == "") { ?>
<a href="<?php echo $t_answer->AddUrl() ?>">Thêm</a>&nbsp;
<a href="<?php echo $t_answer->EditUrl() ?>">Sửa</a>&nbsp;
<a href="<?php echo $t_answer->CopyUrl() ?>">Sao chép</a>&nbsp;

<?php } ?>
</span></p>
<?php $t_answer_view->ShowMessage() ?>
<p>
<?php if ($t_answer->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_answer_view->Pager)) $t_answer_view->Pager = new cNumericPager($t_answer_view->lStartRec, $t_answer_view->lDisplayRecs, $t_answer_view->lTotalRecs, $t_answer_view->lRecRange) ?>
<?php if ($t_answer_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_answer_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_answer_view->PageUrl() ?>start=<?php echo $t_answer_view->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_answer_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_answer_view->PageUrl() ?>start=<?php echo $t_answer_view->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_answer_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_answer_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_answer_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_answer_view->PageUrl() ?>start=<?php echo $t_answer_view->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_answer_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_answer_view->PageUrl() ?>start=<?php echo $t_answer_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_answer_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($t_answer->answer_id->Visible) { // answer_id ?>
	<tr<?php echo $t_answer->answer_id->RowAttributes ?>>
		<td class="ewTableHeader">Mã trả lời</td>
		<td<?php echo $t_answer->answer_id->CellAttributes() ?>>
<div<?php echo $t_answer->answer_id->ViewAttributes() ?>><?php echo $t_answer->answer_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_answer->question_id->Visible) { // question_id ?>
	<tr<?php echo $t_answer->question_id->RowAttributes ?>>
		<td class="ewTableHeader">Mã câu hỏi</td>
		<td<?php echo $t_answer->question_id->CellAttributes() ?>>
<div<?php echo $t_answer->question_id->ViewAttributes() ?>><?php echo $t_answer->question_id->ViewValue ?></div>
    <?php 
        $sSqlAnser = "Select * From `t_question` where question_id = ".$t_answer->question_id->ViewValue;
        //echo $sSqlAnser;
        $rsAns = $conn->Execute($sSqlAnser);
        //echo $rsAns ;
        $arAns = ($rsAns) ? $rsAns->GetRows() : array();
        if ($rsAns) $rsAns->Close();
      
    ?>            
<div>
     <p> * <b>Mã câu hỏi: </b> <?php echo  $arAns [0]['IDcard'] ?> </p>
     <p> * <b>Số điện thoại:</b> <?php echo  $arAns [0]['tel'] ?><br/>
     <p> * <b>Email:</b>  <?php echo  $arAns [0]['email'] ?> <br/>
     <p> * <b>MSV: <?php echo  $arAns [0]['msv_id'] ?> </b>
   
</div>          
                
                </td>
	</tr>
<?php } ?>
<?php if ($t_answer->answer->Visible) { // answer ?>
	<tr<?php echo $t_answer->answer->RowAttributes ?>>
		<td class="ewTableHeader">Trả lời</td>
		<td<?php echo $t_answer->answer->CellAttributes() ?>>
<div<?php echo $t_answer->answer->ViewAttributes() ?>><?php echo $t_answer->answer->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_answer->s_faq->Visible) { // s_faq ?>
	<tr<?php echo $t_answer->s_faq->RowAttributes ?>>
		<td class="ewTableHeader">FAQ</td>
		<td<?php echo $t_answer->s_faq->CellAttributes() ?>>
<div<?php echo $t_answer->s_faq->ViewAttributes() ?>><?php echo $t_answer->s_faq->ViewValue ?></div></td>
	</tr>
<?php } ?>
        
        
        <tr >
            <td  style="background-color: #EBEBEB;border-bottom: 1px solid;border-right: 1px solid;border-color: #4F93E3; ">Nhóm câu hỏi</td>
		<td>
                <?php echo $_SESSION["Group_Name"]; ?></td>
	</tr>

        
        
        <?php if ($t_answer->desciption->Visible) { // desciption ?>
	<tr<?php echo $t_answer->desciption->RowAttributes ?>>
		<td class="ewTableHeader">Mô tả câu trả lời</td>
		<td<?php echo $t_answer->desciption->CellAttributes() ?>>
<div<?php echo $t_answer->desciption->ViewAttributes() ?>><?php echo $t_answer->desciption->ViewValue ?></div></td>
	</tr>
<?php } ?>
        
        
<?php if ($t_answer->datetime_Add->Visible) { // datetime_Add ?>
	<tr<?php echo $t_answer->datetime_Add->RowAttributes ?>>
		<td class="ewTableHeader">Ngày tạo:</td>
		<td<?php echo $t_answer->datetime_Add->CellAttributes() ?>>
<div<?php echo $t_answer->datetime_Add->ViewAttributes() ?>><?php echo $t_answer->datetime_Add->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_answer->datetime_Update->Visible) { // datetime_Update ?>
	<tr<?php echo $t_answer->datetime_Update->RowAttributes ?>>
		<td class="ewTableHeader">Ngày cập nhật:</td>
		<td<?php echo $t_answer->datetime_Update->CellAttributes() ?>>
<div<?php echo $t_answer->datetime_Update->ViewAttributes() ?>><?php echo $t_answer->datetime_Update->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($t_answer->User_Update->Visible) { // User_Update ?>
	<tr<?php echo $t_answer->User_Update->RowAttributes ?>>
		<td class="ewTableHeader">Người cập nhật:</td>
		<td<?php echo $t_answer->User_Update->CellAttributes() ?>>
<div<?php echo $t_answer->User_Update->ViewAttributes() ?>><?php echo $t_answer->User_Update->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($t_answer->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($t_answer_view->Pager)) $t_answer_view->Pager = new cNumericPager($t_answer_view->lStartRec, $t_answer_view->lDisplayRecs, $t_answer_view->lTotalRecs, $t_answer_view->lRecRange) ?>
<?php if ($t_answer_view->Pager->RecordCount > 0) { ?>
	<?php if ($t_answer_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $t_answer_view->PageUrl() ?>start=<?php echo $t_answer_view->Pager->FirstButton->Start ?>"><b>Đâu</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_answer_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $t_answer_view->PageUrl() ?>start=<?php echo $t_answer_view->Pager->PrevButton->Start ?>"><b>Qua</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($t_answer_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $t_answer_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($t_answer_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $t_answer_view->PageUrl() ?>start=<?php echo $t_answer_view->Pager->NextButton->Start ?>"><b>Tiếp</b></a>&nbsp;
	<?php } ?>
	<?php if ($t_answer_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $t_answer_view->PageUrl() ?>start=<?php echo $t_answer_view->Pager->LastButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($t_answer_view->sSrchWhere == "0=101") { ?>
	Nhập tiêu trí tìm kiếm
	<?php } else { ?>
	Không có bản ghi dược tìm thấy
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($t_answer->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class ct_answer_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 't_answer';

	// Page Object Name
	var $PageObjName = 't_answer_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_answer;
		if ($t_answer->UseTokenInUrl) $PageUrl .= "t=" . $t_answer->TableVar . "&"; // add page token
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
		global $objForm, $t_answer;
		if ($t_answer->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_answer->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_answer->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_answer_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_answer"] = new ct_answer();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_answer', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_answer;

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
	var $lDisplayRecs; // Number of display records
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs;
	var $lRecRange;
	var $lRecCnt;

	//
	// Page main processing
	//
	function Page_Main() {
		global $t_answer;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["answer_id"] <> "") {
				$t_answer->answer_id->setQueryStringValue($_GET["answer_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$t_answer->CurrentAction = "I"; // Display form
			switch ($t_answer->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("t_answerlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($t_answer->answer_id->CurrentValue) == strval($rs->fields('answer_id'))) {
								$t_answer->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage("No records found"); // Set no record message
						$sReturnUrl = "t_answerlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "t_answerlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$t_answer->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_answer;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_answer->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_answer->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_answer->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_answer->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_answer->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_answer->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_answer;

		// Call Recordset Selecting event
		$t_answer->Recordset_Selecting($t_answer->CurrentFilter);

		// Load list page SQL
		$sSql = $t_answer->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_answer->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_answer;
		$sFilter = $t_answer->KeyFilter();

		// Call Row Selecting event
		$t_answer->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_answer->CurrentFilter = $sFilter;
		$sSql = $t_answer->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_answer->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_answer;
		$t_answer->answer_id->setDbValue($rs->fields('answer_id'));
		$t_answer->question_id->setDbValue($rs->fields('question_id'));
		$t_answer->answer->setDbValue($rs->fields('answer'));
		$t_answer->s_faq->setDbValue($rs->fields('s_faq'));
                $t_answer->desciption->setDbValue($rs->fields('desciption'));
                $t_answer->datetime_Add->setDbValue($rs->fields('datetime_Add'));
		$t_answer->datetime_Update->setDbValue($rs->fields('datetime_Update'));
		$t_answer->User_Update->setDbValue($rs->fields('User_Update'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_answer;

		// Call Row_Rendering event
		$t_answer->Row_Rendering();

		// Common render codes for all row types
		// answer_id

		$t_answer->answer_id->CellCssStyle = "";
		$t_answer->answer_id->CellCssClass = "";

		// question_id
		$t_answer->question_id->CellCssStyle = "";
		$t_answer->question_id->CellCssClass = "";

		// answer
		$t_answer->answer->CellCssStyle = "";
		$t_answer->answer->CellCssClass = "";

		// s_faq
		$t_answer->s_faq->CellCssStyle = "";
		$t_answer->s_faq->CellCssClass = "";
                 // desciption
		$t_answer->desciption->CellCssStyle = "";
		$t_answer->desciption->CellCssClass = "";
                
                // datetime_Add
		$t_answer->datetime_Add->CellCssStyle = "";
		$t_answer->datetime_Add->CellCssClass = "";

		// datetime_Update
		$t_answer->datetime_Update->CellCssStyle = "";
		$t_answer->datetime_Update->CellCssClass = "";

		// User_Update
		$t_answer->User_Update->CellCssStyle = "";
		$t_answer->User_Update->CellCssClass = "";
		if ($t_answer->RowType == EW_ROWTYPE_VIEW) { // View row

			// answer_id
			$t_answer->answer_id->ViewValue = $t_answer->answer_id->CurrentValue;
			$t_answer->answer_id->CssStyle = "";
			$t_answer->answer_id->CssClass = "";
			$t_answer->answer_id->ViewCustomAttributes = "";

			// question_id
			$t_answer->question_id->ViewValue = $t_answer->question_id->CurrentValue;
			$t_answer->question_id->ViewValue = strtolower($t_answer->question_id->ViewValue);
			$t_answer->question_id->CssStyle = "";
			$t_answer->question_id->CssClass = "";
			$t_answer->question_id->ViewCustomAttributes = "";

			// answer
			$t_answer->answer->ViewValue = $t_answer->answer->CurrentValue;
			$t_answer->answer->CssStyle = "";
			$t_answer->answer->CssClass = "";
			$t_answer->answer->ViewCustomAttributes = "";

			// s_faq
			if (strval($t_answer->s_faq->CurrentValue) <> "") {
				switch ($t_answer->s_faq->CurrentValue) {
					case "0":
						$t_answer->s_faq->ViewValue = "Không";
						break;
					case "1":
						$t_answer->s_faq->ViewValue = "FAQ";
						break;
					default:
						$t_answer->s_faq->ViewValue = $t_answer->s_faq->CurrentValue;
				}
			} else {
				$t_answer->s_faq->ViewValue = NULL;
			}
			$t_answer->s_faq->CssStyle = "";
			$t_answer->s_faq->CssClass = "";
			$t_answer->s_faq->ViewCustomAttributes = "";

                         // desciption
			$t_answer->desciption->ViewValue = $t_answer->desciption->CurrentValue;
			$t_answer->desciption->CssStyle = "";
			$t_answer->desciption->CssClass = "";
			$t_answer->desciption->ViewCustomAttributes = "";
                        
                        // datetime_Add
			$t_answer->datetime_Add->ViewValue = $t_answer->datetime_Add->CurrentValue;
			$t_answer->datetime_Add->ViewValue = ew_FormatDateTime($t_answer->datetime_Add->ViewValue, 7);
			$t_answer->datetime_Add->CssStyle = "";
			$t_answer->datetime_Add->CssClass = "";
			$t_answer->datetime_Add->ViewCustomAttributes = "";

			// datetime_Update
			$t_answer->datetime_Update->ViewValue = $t_answer->datetime_Update->CurrentValue;
			$t_answer->datetime_Update->ViewValue = ew_FormatDateTime($t_answer->datetime_Update->ViewValue, 7);
			$t_answer->datetime_Update->CssStyle = "";
			$t_answer->datetime_Update->CssClass = "";
			$t_answer->datetime_Update->ViewCustomAttributes = "";

			// User_Update
			$t_answer->User_Update->ViewValue = $t_answer->User_Update->CurrentValue;
			$t_answer->User_Update->CssStyle = "";
			$t_answer->User_Update->CssClass = "";
			$t_answer->User_Update->ViewCustomAttributes = "";
                        
			// answer_id
			$t_answer->answer_id->HrefValue = "";

			// question_id
			$t_answer->question_id->HrefValue = "";

			// answer
			$t_answer->answer->HrefValue = "";

			// s_faq
			$t_answer->s_faq->HrefValue = "";
                        // desciption
			$t_answer->desciption->HrefValue = "";
                        // datetime_Add
			$t_answer->datetime_Add->HrefValue = "";

			// datetime_Update
			$t_answer->datetime_Update->HrefValue = "";

			// User_Update
			$t_answer->User_Update->HrefValue = "";
		}

		// Call Row Rendered event
		$t_answer->Row_Rendered();
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
         
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}
}
?>
