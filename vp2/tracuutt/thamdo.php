<style type="text/css">
/* popup_box DIV-Styles*/
#popup_box { 
	display:none; /* Hide the DIV */
	position:fixed;  
	_position:absolute; /* hack for internet explorer 6 */  
	height:auto;
        min-height:170px; 
	width:600px;  
        background:#FFFFFF url('../images/common/Survey Icon.jpg') no-repeat;  
	left: 300px;
	top: 150px;
	z-index:1000; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
	margin-left: 15px;  
	/* additional features, can be omitted */
	border:2px solid #045395;  	
	padding:15px;  
	font-size:15px;  
	-moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        -moz-box-shadow: 0 0 10px rgba(0,0,0,.4);
        -webkit-box-shadow: 0 0 10px rgba(0,0,0,.4);
        -box-shadow: 0 0 10px rgba(0,0,0,.4);
	box-shadow: 0 0 5px #045395;
	
}

#container {
	position: fixed; 
		height: 100%;
		width: 100%;
		background: #000;
		background: rgba(0,0,0,.8);
		z-index: 100;
		display: none;
		top: 0;
		left: 0; 
              
}

a{  
cursor: pointer;  
text-decoration:none;  
} 
   h4{
            font: 900 14px/30px "georgia";
            padding-left: 20px;
            border: 1px outset #fff;
            background:#54b6f5;
        }
        
/* This is for the positioning of the Close Link */
#popupBoxClose {
	font-size:20px;  
	line-height:15px;  
	right:5px;  
	top:5px;  
	position:absolute;  
	color:#6fa5e2;  
	font-weight:500;  	
}
h1.h1abc {
    font-weight: bold;
    text-align: center;
    padding: 20px 0px 10px 85px;
   
}
dl.dlabc {
    padding-left:100px;
}
dl.dlabc dt dd {
  
}
#adongy {
    margin-top:10px;
}
a.atenmon {
    padding:8px 5px 5px 20px;
    color: black
    
}
a.atenmon:hover {
    font-weight: bold;
    text-decoration: underline;
} 
p.pnote {
    color: red;
    font-size: 12px;
    font-style: italic;
     padding: 5px;
}
</style>
<script type="text/javascript">
        // set minutes
     var mins = 1;
       // calculate the seconds (don't change this! unless time progresses at a different speed for you...)
     var secs = mins * 10;
    function countdown() {
     setTimeout('Decrement()',1000);
    }
    function Decrement() {
    if (document.getElementById) {
    minutes = document.getElementById("minutes");
    seconds = document.getElementById("seconds");
    // if less than a minute remaining
    seconds.value = secs;
    secs--;
    if (secs > 0) setTimeout('Decrement()',1000);
    }
    }
    function getminutes() {
       
    // minutes is seconds divided by 60, rounded down
    mins = Math.floor(secs / 60);
    return mins;
    }
    function getseconds() {
    // take mins remaining (as seconds) away from total seconds remaining
    return secs-Math.round(mins *60);
    }
    </script>
<script type="text/javascript">
function popupClose()
{
    countdown();
}
	$(document).ready( function() {
		// When site loaded, load the Popupbox First
		loadPopupBox();
                  $("#timer").hide();
	
		$('#popupBoxClose').click( function() {			
			unloadPopupBox();
		});
                
                $('#popupClose').click( function() {
                     //  alert("Thông báo sẽ được ẩn đi sau 3s");
                        $("#popupClose").hide();
                        $("#timer").show();
                       setTimeout(function(){
                           unloadPopupBox();
                   },10000);	
		});
                
                $('#agree').click( function() {			
			unloadPopupBox();
		});
		
		function unloadPopupBox() {	// TO Unload the Popupbox
			$('#popup_box').fadeOut("slow");
			$("#container").css({ // this is just for style		
				"opacity": "1"  
			}); 
                        $("#container").hide();
		}	
		
		function loadPopupBox() {	// To Load the Popupbox
			$('#popup_box').fadeIn("slow");
			$("#container").css({ // this is just for style
				"opacity": "0.5"  
			}); 
                         $("#container").show();

		}
		/**********************************************************/
		
	});
   
</script>
 
<?php  $monhocthamdo =  $_SESSION['monhocthamdo']  ;
  
?>
<div id="popup_box">	<!-- OUR PopupBox DIV-->
    <h1 class="h1abc"> <?php echo $GLOBALS['content_ax'] ?></h1>
    <dl class="dlabc">
        <dt><h4>* Đề nghị bạn <?php echo $_SESSION['arraythongtin']['HoTen'] ?> cho ý kiến về các môn sau: <i>(*click vào môn để thăm dò)</i></h4></dt>
        <dd></dd>
         <dt> 
           <?php
               for($i=0;$i<count($monhocthamdo);$i++)
                 {   
                 $url ="http://thamdo.hpu.edu.vn/thamdo/".$monhocthamdo[$i]['survey_id']."/monhoc/".$monhocthamdo[$i]['id']."";
                 echo "<a target='_blank'  href=".$url." class=\"atenmon\">- ".$monhocthamdo[$i]['tenmon']."</a><br/>";
                 }
           ?>
         <div><h4>&nbsp</h4></div>
         <div><p class="pnote">&#8727; Thông báo sẽ được ẩn khi bạn <?php echo  $_SESSION['arraythongtin']['HoTen'] ?> đã hoàn thành các bài thăm dò </p>
              <div id="timer">
                  <center>
                    Hệ thống sẽ chuyển tiếp sau  <input id="minutes" type="text" style="width: 14px; border: none; background-color:none; font-size: 16px; font-weight: bold;visibility: hidden"> <input id="seconds" type="text" style="width:24px;height: 31px; border: none; background-color:none; font-size: 16px; font-weight: bold;background: url('../images/common/ajax-loading.gif') no-repeat;padding-left:8px"> giây.
                  </center>
              </div>
         </div>
         </dt>
        </dl> 	
<!--        <a id="popupBoxClose"><img src="../images/x.png"></a>-->
        <center> 
            <a class="id_close" id="popupClose" onclick="popupClose()"><img  id="adongy" src="../images/common/img_desau.jpg"></a>  <a class="id_close" id="agree"  target="_blank" href="<?php echo "http://thamdo.hpu.edu.vn/thamdo/".$monhocthamdo[0]['survey_id']."/monhoc/".$monhocthamdo[0]['id'].""  ?>" title="Văn phòng hỗ trợ trực tuyến" ><img id="adongy" src="../images/common/img_dongy.jpg"></a>
        </center>
</div>

<?php
$u_agent = $_SERVER['HTTP_USER_AGENT'];
$flag = true;
if(preg_match('/Chrome/i',$u_agent) && ($flag == true))
    {
  ?>

<script type="text/javascript">
$(document).ready(function(){
     $(".id_close").click(function () {
       $("#htht").html('<center style="margin-top:100px"><img  src="../images/common/ajax-loading.gif">...process...</center>');
       $.ajax({
            type: "POST",
            data: "msv="+$("#txtmsv").val()+"&ser_code=" + 1,
            url: "msvajax.php",
            success: function(msg){
                if (msg != ''){
                   $("#htht").html(msg).show();
                }
                else{
                    $("#htht").html('<em>No item result</em>');
                }
            }
        });
    });
  });
</script> 

<?php
  $flag = false;
    } 
?>
<div id="container"> <!-- Main Page -->
	
</div>