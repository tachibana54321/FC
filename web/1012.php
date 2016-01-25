<br /><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
<title>FlyCircuit </title>
</head>
<LINK REL="StyleSheet" HREF="styleID.css" TYPE="text/css">
<body>
<script type="text/javascript" src="tooltips/wz_tooltip.js"></script>
<style type="text/css"> 
.thumb img {
 max-width: 230px;
}
</style>

<p><u><font size="+6"><strong>Neuron ID</strong></font></u></p>
</p>
<table width="920" border="0" cellpadding="0" cellspacing="0" bgcolor="#000000">
  <tr>
    <td><table id="mytb" width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td colspan="6" bgcolor="#003399"><font size="+1" color="#ffffff"><strong><input type="button" value="-"  onclick="setHideTR_General();">General Information  </strong></font></td>
      </tr>
	  <tr class="hide General">

<?php
//neuron detail database
$neuronName=$_GET["name"];
$Link = mysql_connect("localhost", "root", "cwycjz321");
if (!$Link) {
	die(" can't connect to Database". mysql_error());
}
mysql_query("SET NAMES 'utf8'");
mysql_select_db("ppcb");
$sql = "select * from `neuronID` where `Name`='".$neuronName."'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($Link);
?>

        <td width="10%" bgcolor="#CCCCCC"><strong>Name</strong></td>
        <td width="28%" bgcolor="#FFFFFF"><?echo $_GET["name"];?></td>
        <td width="10%" bgcolor="#eeeeee"><strong>Soma Coordinate</td>
        <td width="21%" bgcolor="#FFFFFF"><?   echo "X:".$row[1];   echo ",Y:".$row[2];   echo ",Z:".$row[3];?></td>
        <td width="10%" bgcolor="#eeeeee"><strong>Author</strong></td>
        <td width="21%" bgcolor="#FFFFFF"><?echo $row[4];?></td>
      </tr>
      <tr class="hide General">
        <td width="10%" bgcolor="#CCCCCC"><strong>Driver</strong></td>
        <td width="28%" bgcolor="#FFFFFF"><?echo $row[5];?></td>
        <td width="10%" bgcolor="#eeeeee"><strong>Putative neurotransmitter</strong></td>
        <td width="21%" bgcolor="#FFFFFF"><?echo $row[6];?></td>
        <td width="10%" bgcolor="#eeeeee"><strong>Stock</strong></td>
        <td width="21%" bgcolor="#FFFFFF"><?echo $row[7];?></td>
      </tr>
      <tr class="hide General">                                               
		<td width="10%" bgcolor="#CCCCCC"><strong>Gender/Age</strong></td>
        <td width="28%" bgcolor="#FFFFFF"><?echo $row[8]; echo $row[9];?></td>
        <td width="10%" bgcolor="#eeeeee"><strong>Putative birth time</strong></td>
        <td width="21%" bgcolor="#FFFFFF"><?echo $row[10];?></td>
        <td width="10%" bgcolor="#eeeeee"><strong>Lineage</strong></td>
        <td width="21%" bgcolor="#FFFFFF"><?echo $row[11];?></td>	
      </tr>		
      <tr class="hide General">
        <td bgcolor="#CCCCCC"><strong>Polarity</strong></td>
		<td colspan="5" bgcolor="#FFFFFF"><?echo $row[12];?></td>
      </tr>
	  <tr class="hide General" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>
      </tr>
	  <tr>
        <td colspan="6" bgcolor="#003399"><font size="+1" color="#ffffff"><strong><input type="button" value="-"  onclick="setHideTR_Images();">Images</strong></font></td>
      </tr>

<!--temp-->
      <tr class="hide Images">
        <td colspan="6" bgcolor="#333333"><table width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td width="33.33%" bgcolor="#FFFFFF"><div align="center" >Original confocal image</div></td>
            <td width="33.33%" bgcolor="#FFFFFF"><div align="center">Segmentation </div></td>
            <td width="33.33%" bgcolor="#FFFFFF"><div align="center">Standard brain  </div></td>
          </tr>
		  <tr class="hide Images">
            <?echo "<td bgcolor='#000000'><div align='center'><a href='/neuronIMG/neuronPNG/".$neuronName."_lsm.png' target='blank'><img src='/neuronIMG/neuronPNG/".$neuronName."_lsmResize.png' height='250' width='250' border='0' /></a>
</div></td>";?>
            <td bgcolor="#eeeeee"><div align="center"><a href="" target="_blank"><img src="" height="250" width="250" border="0" /></a></div></td>
            <td bgcolor="#eeeeee"><div align="center"><a href="" target="_blank"><img src="" height="250" width="250" border="0" /></a></div></td>
          </tr>
<!--temp-->
	      <tr class="hide Images">
			<td width="33.33%" bgcolor="#FFFFFF"><div align="center" >Standard</div></td>
			<td width="33.33%" bgcolor="#FFFFFF"><div align="center" >Motif</div></td>
			<td width="33.33%" bgcolor="#FFFFFF"><div align="center" >Connection</div></td>
		  </tr>
		  <tr class="hide Images">
            <?echo "<td bgcolor='#FFFFFF'><div align='center'><a href='/driver/modules/search/20140725_DtoN_F/programC/neuronID/radius/".$neuronName."_radius_modify.jpg' target='_blank'><img src='/driver/modules/search/20140725_DtoN_F/programC/neuronID/radius/".$neuronName."_radius_modify.jpg' height='250' width='250' border='0' /></a>";?>
</div></td>
            <?echo "<td bgcolor='#FFFFFF'><div align='center'><a href='/driver/modules/search/20140725_DtoN_F/programC/neuronID/B/".$neuronName."_s.jpg' target='_blank'><img src='/driver/modules/search/20140725_DtoN_F/programC/neuronID/B/".$neuronName."_s.jpg' height='250' width='250' border='0' /></a></div></td>";?>
            <?echo "<td bgcolor='#FFFFFF'><div align='center'><a href='/driver/modules/search/20140725_DtoN_F/programC/neuronID/A/".$neuronName."_m.jpg' target='_blank'><img src='/driver/modules/search/20140725_DtoN_F/programC/neuronID/A/".$neuronName."_m.jpg' height='250' width='250' border='0' /></a></div></td>";?>
          </tr>
		</table></td>
        </tr>		
		<tr class="hide Images" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>
        </tr>	

<?
//counts database
$areaValue[1]="med";$areaValue[2]="lop";$areaValue[3]="lob";$areaValue[4]="og";$areaValue[5]="lh";$areaValue[6]="vlp";$areaValue[7]="optu";
$areaValue[8]="dlp";$areaValue[9]="idlp";$areaValue[10]="spp";$areaValue[11]="fspp";$areaValue[12]="cal";$areaValue[13]="cvlp";$areaValue[14]="dmp";
$areaValue[15]="cmp";$areaValue[16]="lat";$areaValue[17]="ammc";$areaValue[18]="idfp";$areaValue[19]="al";$areaValue[20]="mb";$areaValue[21]="pan";
$areaValue[22]="vmp";$areaValue[23]="sdfp";$areaValue[24]="sog";$areaValue[25]="pcb";$areaValue[26]="fb";$areaValue[27]="ccp";$areaValue[28]="eb";
$areaValue[29]="nod";$areaValue[30]="NOD";$areaValue[31]="EB";$areaValue[32]="CCP";$areaValue[33]="FB";$areaValue[34]="PCB";$areaValue[35]="SOG";
$areaValue[36]="SDFP";$areaValue[37]="VMP";$areaValue[38]="PAN";$areaValue[39]="MB";$areaValue[40]="AL";$areaValue[41]="IDFP";$areaValue[42]="AMMC";
$areaValue[43]="LAT";$areaValue[44]="CMP";$areaValue[45]="DMP";$areaValue[46]="CVLP";$areaValue[47]="CAL";$areaValue[48]="FSPP";$areaValue[49]="SPP";
$areaValue[50]="IDLP";$areaValue[51]="DLP";$areaValue[52]="OPTU";$areaValue[53]="VLP";$areaValue[54]="LH";$areaValue[55]="OG";$areaValue[56]="LOB";
$areaValue[57]="LOP";$areaValue[58]="MED";


$neuropilArr[1]=$areaValue[35];$neuropilArr[2]=$areaValue[24];$neuropilArr[3]=$areaValue[42];$neuropilArr[4]=$areaValue[17];$neuropilArr[5]=$areaValue[40];
$neuropilArr[6]=$areaValue[19];$neuropilArr[7]=$areaValue[39];$neuropilArr[8]=$areaValue[20];$neuropilArr[9]=$areaValue[36];$neuropilArr[10]=$areaValue[23];
$neuropilArr[11]=$areaValue[33];$neuropilArr[12]=$areaValue[26];$neuropilArr[13]=$areaValue[43];$neuropilArr[14]=$areaValue[16];$neuropilArr[15]=$areaValue[31];
$neuropilArr[16]=$areaValue[28];$neuropilArr[17]=$areaValue[30];$neuropilArr[18]=$areaValue[29];$neuropilArr[19]=$areaValue[45];$neuropilArr[20]=$areaValue[14];
$neuropilArr[21]=$areaValue[38];$neuropilArr[22]=$areaValue[21];$neuropilArr[23]=$areaValue[41];$neuropilArr[24]=$areaValue[18];$neuropilArr[25]=$areaValue[44];
$neuropilArr[26]=$areaValue[15];$neuropilArr[27]=$areaValue[46];$neuropilArr[28]=$areaValue[13];$neuropilArr[29]=$areaValue[37];$neuropilArr[30]=$areaValue[22];
$neuropilArr[31]=$areaValue[32];$neuropilArr[32]=$areaValue[27];$neuropilArr[33]=$areaValue[34];$neuropilArr[34]=$areaValue[25];$neuropilArr[35]=$areaValue[47];
$neuropilArr[36]=$areaValue[12];$neuropilArr[37]=$areaValue[48];$neuropilArr[38]=$areaValue[11];$neuropilArr[39]=$areaValue[49];$neuropilArr[40]=$areaValue[10];
$neuropilArr[41]=$areaValue[53];$neuropilArr[42]=$areaValue[6];$neuropilArr[43]=$areaValue[52];$neuropilArr[44]=$areaValue[7];$neuropilArr[45]=$areaValue[51];
$neuropilArr[46]=$areaValue[8];$neuropilArr[47]=$areaValue[50];$neuropilArr[48]=$areaValue[9];$neuropilArr[49]=$areaValue[54];$neuropilArr[50]=$areaValue[5];
$neuropilArr[51]=$areaValue[55];$neuropilArr[52]=$areaValue[4];$neuropilArr[53]=$areaValue[56];$neuropilArr[54]=$areaValue[3];$neuropilArr[55]=$areaValue[57];
$neuropilArr[56]=$areaValue[2];$neuropilArr[57]=$areaValue[58];$neuropilArr[58]=$areaValue[1];
//58area counts
$personal_db=mysqli_connect("localhost","root","cwycjz321","ppcb");
$sql="SELECT * FROM `1countsNeuron` where `neuron`='".$neuronName."'";
$test=mysqli_query($personal_db,$sql);
$source="";

while($row =mysqli_fetch_row($test)){
    for($i=1;$i<59;$i++){
        $source.=trim($row[$i])."_";
        $neuropil=$neuropilArr[$i];
		if($row[$i]!=0){
			$spaceCodeText.=$neuropil." ".floor(trim($row[$i])).",";
		}
	}
}
$spaceCodeText=substr($spaceCodeText,0,-1);
mysql_close($personal_db);
?>

<?
//endPoint counts
$endPoint_db=mysqli_connect("localhost","root","cwycjz321","ppcb");
$sql2="SELECT * FROM `neuronCounts` where `neuron`='".$neuronName."'";
$test2=mysqli_query($endPoint_db,$sql2);
$source2="";

while($row2 =mysqli_fetch_row($test2)){
    for($i=1;$i<59;$i++){
        $source2.=trim($row2[$i])."_";
        $neuropil=$neuropilArr[$i];
        if($row2[$i]!=0){
            $spaceCodeText2.=$neuropil." ".floor(trim($row2[$i])).",";
        }
    }
}
$spaceCodeText2=substr($spaceCodeText2,0,-1);
mysql_close($endPoint_db);
?>

<!---hide table-->
<script type="text/javascript"> 
function setHideTR_Cell(){
    var obj=document.getElementById("mytb");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<mytr.length;i++){
        if(mytr[i].className=="hide Cell"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
}
function setHideTR_Spatial(){ 
	var obj=document.getElementById("mytb"); 
	var mytr=obj.getElementsByTagName("TR"); 
	for(var i=0;i<mytr.length;i++){ 
	    if(mytr[i].className=="hide Spatial"){ 
	        if(mytr[i].style.display=="none"){ 
	            mytr[i].style.display=""; 
	        }
			else{ 
	            mytr[i].style.display="none"; 
	        }            
	    } 
	}
}
function setHideTR_End(){
    var obj=document.getElementById("mytb");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<mytr.length;i++){
        if(mytr[i].className=="hide End"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
} 
function setHideTR_NCHC(){
    var obj=document.getElementById("mytb");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<mytr.length;i++){
        if(mytr[i].className=="hide NCHC"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
}
function setHideTR_Global(){
    var obj=document.getElementById("mytb");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<mytr.length;i++){
        if(mytr[i].className=="hide Global"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
}
function setHideTR_Local(){
    var obj=document.getElementById("mytb");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<mytr.length;i++){
        if(mytr[i].className=="hide Local"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
}
function setHideTR_Volume(){
    var obj=document.getElementById("mytb");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<mytr.length;i++){
        if(mytr[i].className=="hide Volume"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
}
function setHideTR_Motif(){
    var obj=document.getElementById("mytb");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<mytr.length;i++){
        if(mytr[i].className=="hide Motif"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
}
function setHideTR_Terminal(){
    var obj=document.getElementById("mytb");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<mytr.length;i++){
        if(mytr[i].className=="hide Terminal"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
}
function setHideTR_Connection(){
    var obj=document.getElementById("mytable");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<mytr.length;i++){
        if(mytr[i].className=="hide Connection"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
}
function setHideTR_Images(){
    var obj=document.getElementById("mytb");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<=mytr.length;i++){
        if(mytr[i].className=="hide Images"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
}
function setHideTR_General(){
    var obj=document.getElementById("mytb");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<mytr.length;i++){
        if(mytr[i].className=="hide General"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
}
function setHideTR_network(){
    var obj=document.getElementById("mytb");
    var mytr=obj.getElementsByTagName("TR");
    for(var i=0;i<mytr.length;i++){
        if(mytr[i].className=="hide network"){
            if(mytr[i].style.display=="none"){
                mytr[i].style.display="";
            }
            else{
                mytr[i].style.display="none";
            }
        }
    }
}
</script>

		
		<tr>
			<td colspan="6" bgcolor="#003399"><font size="+1" color="#ffffff"><strong><input type="button" value="-"  onclick="setHideTR_Spatial();">Spatial Distribution
				<input name="textarea" type="text" value="<?=$spaceCodeText;?>" size="110">
				</strong></font></td>
		</tr>
		<tr class="hide Spatial">	
          <td colspan="6" bgcolor="#DCF0F0"><center>
          <img src="gd_spatial_distribution.php?source=<?=$source;?>" border="0" usemap="#Map"/></center></td>
        </tr>
		<tr class="hide Spatial" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="143" rows="1" disabled="disabled"></textarea></td>
        </tr>
		<tr>
			<td colspan="6" bgcolor="#003399"><font size="+1" color="#ffffff"><strong><input type="button" value="-" onclick="setHideTR_End();">End Point Spatial Distribution
				<input name="textarea" type="text" value="<?=$spaceCodeText2;?>" size="96">
				</strong></font></td>
		</tr>	
		<tr class="hide End">
			<td colspan="6" bgcolor="#DCF0F0"><center>
			<img src="endPoint_gd_spatial_distribution.php?source=<?=$source2;?>" border="0" usemap="#Map"/></center></td>
		</tr>	
		<tr class="hide End" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>
        </tr>
		<tr>
			<td colspan="6" bgcolor="#003399"><font size="+1" color="#ffffff"><strong><input type="button" value="-"  onclick="setHideTR_Global();">Global Neuron Sequence</strong></font></td>
		</tr>
		<tr class="hide Global">
			<td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="3"></textarea></td>
		</tr>
		<tr class="hide Global" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>
        </tr>
		<tr>
			<td colspan="6" bgcolor="#003399"><font size="+1" color="#ffffff"><strong><input type="button" value="-"  onclick="setHideTR_Local();">Local Neuron Sequence
			</strong></font></td>
		</tr>
		<tr class="hide Local">
			<td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="3"></textarea></td>
		</tr>
		<tr class="hide Local" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>
        </tr>
		<tr>
            <td colspan="6" bgcolor="#003399"><font size="+1" color="#ffffff"><strong><input type="button" value="-"  onclick="setHideTR_Motif();">Neuron Motif
            </strong></font></td>
        </tr>
		<tr class="hide Motif">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="3"></textarea></td>
        </tr>
		<tr class="hide Motif" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>
        </tr>
		<tr>
            <td colspan="6" bgcolor="#003399"><font size="+1" color="#ffffff"><strong><input type="button" value="-"  onclick="setHideTR_NCHC();">Similar Neurons NCHC          </tr>
		<tr class="hide NCHC">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="3"></textarea></td>
        </tr>
		<tr class="hide NCHC" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>
        </tr>
		<tr>
            <td colspan="6" bgcolor="#003399"><font size="+1" color="#ffffff"><strong><input type="button" value="-"  onclick="setHideTR_Cell();">Cell body neighborhood       </tr>
       <tr class="hide Cell">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="3"></textarea></td>
        </tr>
	   <tr class="hide Cell" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>
       </tr>  
		  <tr>
		  <td colspan="6" bgcolor="#003399"><font size="+1" color="#ffffff"><strong>
		    <input type="button" value="-"  onclick="setHideTR_Volume();">Similar Neurons Volume to Volume
			<input type='button' name='neuronC'value='less neurons' onClick="if(tmp>=36){tmp-=24;k();}">
			<input type='button' name='neuronC'value='more neurons' onClick=k()>
			</strong></font></td>
		</tr>
		<tr class="hide Volume">
			<td colspan="6" bgcolor="#DCF0F0"><center><?
			//if(strpos($neuron,'-F-')==true || strpos($neuron,'-M-')==true){
                $neuronGlobal=mysqli_connect("localhost","root","cwycjz321","ppcb");
                if(mysqli_connect_errno()){
                 echo "error: ".mycjz321();}
                else{
                $sql="SELECT DISTINCT driver,driver1,global FROM 1N2Nglobalall WHERE driver='$neuronName'or driver1='$neuronName' order by global desc ";
				//$sql="SELECT * From 1N2Nglobalall WHERE driver like '$neuronName%' or driver1 like '$neuronName' order by global desc ";
                $n2nScore=mysqli_query($neuronGlobal,$sql);
                $i=0;
				$repeat0=empty1;
				$repeat1=empty2;
                echo "<table>";
                while(($result =mysqli_fetch_row($n2nScore))){
					if( $repeat0==$result[1] )
                    {
						if($repeat1==$result[0]){
						    continue;
						}
                    }
					$repeat0=$result[0];
                    $repeat1=$result[1];

                    if($result[1]==$neuronName){
                                    $tempswitch=$result[1];
                                    $result[1]=$result[0];
                                    $result[0]=$tempswitch;
                    }
                $i=$i+1;
                if($i<=4){
                $picpos = "/neuronIMG/neuronPNG/".$result[1]."_lsm.png";
                echo "<td width='256'><center><font size=4>$result[1]<br/>$i.score=$result[2]</font></center><a href=$picpos target='_blank'><center><img src =$picpos height='192'width='192'></center></a></td>";
                }
                }
                echo "</table>";
				}
                mysqli_close($neuronGlobal);
            //}									?>
			  </center> <center><p id='k'></p><center></td>
        </tr>
		

<?php
//Neuron more less
    $personal_db=mysqli_connect("localhost","root","cwycjz321","ppcb");
    if(mysqli_connect_errno()){
        echo "error: ".mycjz321();
    }
    else{
        $query=mysqli_query($personal_db,"SELECT DISTINCT driver,driver1,global FROM 1N2Nglobalall WHERE driver='$neuronName'or driver1='$neuronName' order by global desc ");
        echo "
                        <script>
                        var i = 0;
                        var script_array = []; // 空陣
                        ";
				$repeat0=emptyy;
				$repeat1=emptyy;
                while($result=mysqli_fetch_row($query)){
					if( $repeat0==$result[1] )
                    {
                        if($repeat1==$result[0]){
                            continue;
                        }
                    }
					$repeat0=$result[0];
                    $repeat1=$result[1];
                    if($result[1]==$neuronName){
                                    $tempswitch=$result[1];
                                    $result[1]=$result[0];
                                    $result[0]=$tempswitch;
                    }
                    echo "script_array.push('$result[1]');";
                    echo "script_array.push('$result[2]');";
                    $picpos = "<img src=\'/neuronIMG/neuronPNG/".$result[1]."_lsm.png\' height=192 width=192><br/>";
                    echo "script_array.push('$picpos');";
                }
                echo "</script>";
        }
?>
<script>
var tmp=24;
function k(){
var i,j=4;
text = "";
        for (i = 12; i < tmp; i+=3){
            j++;
            if(i%12==0)text+="<table>";
            text += "<td width=256><center>"+script_array[i].fontsize(4)+"<br><font size=4>"+j+".score=</font>"+script_array[i+1].fontsize(4)+"<br>"+script_array[i+2].fontsize(4)+"</center></td>";
            if(i%12==9)text+="</table>";
        }
        document.getElementById("k").innerHTML = text;
        tmp=tmp+12;
}
</script>




		<tr class="hide Volume" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>
        </tr>

		<tr>
			<td colspan="6" bgcolor="#003399"><font size="+1" color="#ffffff"><strong><input type="button" value="-"  onclick="setHideTR_Terminal();">Terminal To Terminal
			</strong></font></td>
		</tr>

<style type="text/css">
#T1{
background-image:url('/driver/modules/search/20140725_DtoN_F/programC/neuronID/circle-41073_640.png');
width:450px;
height:450px;
background-position:100%;
border:0px #ccc solid;
}
</style>
<style type="text/css">
.profile {
    border-radius: 50%;
}
</style>
<style type="text/css">
.networkR {
    border-radius: 15px;
}
</style>

		<tr class="hide Terminal">
			<?php echo "<td colspan='3' div id='T1' bgcolor='#FFFFFF'><a href='/driver/modules/search/20140725_DtoN_F/programC/neuronID/C/".$neuronName."_star.jpg'><center><img src='/driver/modules/search/20140725_DtoN_F/programC/neuronID/C/".$neuronName."_star.jpg' height='330' width='330' border='0' class='profile' ></center></a></div></td>";?>
			<?php echo "<td colspan='3' bgcolor='#FFFFFF' align='left' border='0'><a href='/driver/modules/search/20140725_DtoN_F/programC/neuronID/D/".$neuronName.".png'><center><img src='/driver/modules/search/20140725_DtoN_F/programC/neuronID/D/".$neuronName.".png' height='450' width='450' border='0'></center></a></td>";?>
		</tr>
		<tr class="hide Terminal" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>
			<!--<td colspan="6" bgcolor="#003399"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>-->
        </tr>
		<tr>
			<td colspan="6" bgcolor="#003399" width="922"><font size="+1" color="#ffffff"><strong><input type="button" value="-"  onclick="setHideTR_network();">Network</strong></font> <input type="button" onClick="javascript:window.open('color.jpg','','width=644,height=614,toolbar=no, status=no, menubar=no, resizable=yes, scrollbars=yes')"; value="Color Table"></td>
		</tr>
		<style>
			.networkbox{position:relative;width:1000px;height:1000px;}
			.ajax_loader {background: url("/driver/modules/search/20140725_DtoN_F/programC/neuronID/network/spinner_squares_circle.gif") no-repeat center center transparent;width:100%;height:100%;}
		</style>
		<script src="/driver/modules/search/20140725_DtoN_F/programC/neuronID/network/jquery-1.11.3.js"></script>
		<script src="/driver/modules/search/20140725_DtoN_F/programC/neuronID/network/ajaxLoader.js"></script>
		<script type="text/JavaScript">
			function change() {
				var MyNeuronName = "<? echo $neuronName; ?>.txt";
				var waitingblock = new ajaxLoader('.networkbox');
				var el = neuronselect.getElementsByTagName('input');
				var len = el.length;
				var select_all = false;
				var select_network = document.getElementById('network_gobal');
				var user_select = MyNeuronName;
				if(select_network.checked == true) {
					user_select += "&select_zone[]=59";
				}
				else {
					do {
						for(var i=0; i<len; i++) {
							if( el[i].id=="network_all" && el[i].checked == true ) {
								select_all = true;
								user_select += "&select_zone[]=60";
								break;
							}
						}
						if(select_all) break;
						for(var i=0; i<len; i++) {
							if( el[i].id=="local" && el[i].checked == true ) {
								user_select += "&select_zone[]=";
								user_select += el[i].value;
								//alert("user_select="+user_select);
							}
						}
					} while(false);
				}
				
				//alert(user_select);
				$.get("/driver/modules/search/20140725_DtoN_F/programC/neuronID/network/1011.php?neuron="+user_select,function(data){
				$("#iframe").html(data);
				}); 
				var removeBlock = setTimeout("waitingblock.remove()",2000); 
				//waitingblock.remove();
			};
			function clearZone() {
				var el = neuronselect.getElementsByTagName('input');
				var len = el.length;
				for(var i=0; i<len; i++) {
					if(el[i].id=="local" || el[i].id=="network_gobal") {
						el[i].checked = false;
					}
				}
			};
			function clearAll() {
				var checkboxall = document.getElementById('network_all');
				var checkboxgobal = document.getElementById('network_gobal');
				checkboxall.checked = false;
				checkboxgobal.checked = false;
			};
			function clearLocal() {
				var el = neuronselect.getElementsByTagName('input');
				var len = el.length;
				for(var i=0; i<len; i++) {
					//if((el[i].type=="checkbox") && (el[i].id=="local")) {
					if(el[i].id=="local" || el[i].id=="network_all") {
						el[i].checked = false;
					}
				}
			}
			
		</script>
		<tr class="hide network"><td colspan="6" bgcolor="#FFFFFF" width="922">
		<form name="neuronselect">
			<table><tr>
			<td><input type="checkbox" value="1" name="select_zone[]" id="local" onclick="clearAll();"><label>sog_l (1)</label></td>
			<td><input type="checkbox" value="2" name="select_zone[]" id="local" onclick="clearAll();"><label>sog_r (2)</label></td>
			<td><input type="checkbox" value="3" name="select_zone[]" id="local" onclick="clearAll();"><label>ammc_l (3)</label></td>
			<td><input type="checkbox" value="4" name="select_zone[]" id="local" onclick="clearAll();"><label>ammc_r (4)</label></td>
			<td><input type="checkbox" value="5" name="select_zone[]" id="local" onclick="clearAll();"><label>al_l (5)</label></td>
			<td><input type="checkbox" value="6" name="select_zone[]" id="local" onclick="clearAll();"><label>al_r (6)</label></td>
			<td><input type="checkbox" value="7" name="select_zone[]" id="local" onclick="clearAll();"><label>mb_l (7)</label></td>
			<td><input type="checkbox" value="8" name="select_zone[]" id="local" onclick="clearAll();"><label>mb_r (8)</label></td>
			<td><input type="checkbox" value="9" name="select_zone[]" id="local" onclick="clearAll();"><label>sdfp_l (9)</label></td>
			<td><input type="checkbox" value="10" name="select_zone[]" id="local" onclick="clearAll();"><label>sdfp_r (10)</label></td>
			</tr><tr>
			<td><input type="checkbox" value="11" name="select_zone[]" id="local" onclick="clearAll();"><label>fb_l (11)</label></td>
			<td><input type="checkbox" value="12" name="select_zone[]" id="local" onclick="clearAll();"><label>fb_r (12)</label></td>
			<td><input type="checkbox" value="13" name="select_zone[]" id="local" onclick="clearAll();"><label>lat_l (13)</label></td>
			<td><input type="checkbox" value="14" name="select_zone[]" id="local" onclick="clearAll();"><label>lat_r (14)</label></td>
			<td><input type="checkbox" value="15" name="select_zone[]" id="local" onclick="clearAll();"><label>eb_l (15)</label></td>
			<td><input type="checkbox" value="16" name="select_zone[]" id="local" onclick="clearAll();"><label>eb_r (16)</label></td>
			<td><input type="checkbox" value="17" name="select_zone[]" id="local" onclick="clearAll();"><label>nod_l (17)</label></td>
			<td><input type="checkbox" value="18" name="select_zone[]" id="local" onclick="clearAll();"><label>nod_r (18)</label></td>
			<td><input type="checkbox" value="19" name="select_zone[]" id="local" onclick="clearAll();"><label>dmp_l (19)</label></td>
			<td><input type="checkbox" value="20" name="select_zone[]" id="local" onclick="clearAll();"><label>dmp_r (20)</label></td>
			</tr><tr>
			<td><input type="checkbox" value="21" name="select_zone[]" id="local" onclick="clearAll();"><label>pan_l (21)</label></td>
			<td><input type="checkbox" value="22" name="select_zone[]" id="local" onclick="clearAll();"><label>pan_r (22)</label></td>
			<td><input type="checkbox" value="23" name="select_zone[]" id="local" onclick="clearAll();"><label>idfp_l (23)</label></td>
			<td><input type="checkbox" value="24" name="select_zone[]" id="local" onclick="clearAll();"><label>idfp_r (24)</label></td>
			<td><input type="checkbox" value="25" name="select_zone[]" id="local" onclick="clearAll();"><label>cmp_l (25)</label></td>
			<td><input type="checkbox" value="26" name="select_zone[]" id="local" onclick="clearAll();"><label>cmp_r (26)</label></td>
			<td><input type="checkbox" value="27" name="select_zone[]" id="local" onclick="clearAll();"><label>cvlp_l (27)</label></td>
			<td><input type="checkbox" value="28" name="select_zone[]" id="local" onclick="clearAll();"><label>cvlp_r (28)</label></td>
			<td><input type="checkbox" value="29" name="select_zone[]" id="local" onclick="clearAll();"><label>vmp_l (29)</label></td>
			<td><input type="checkbox" value="30" name="select_zone[]" id="local" onclick="clearAll();"><label>vmp_r (30)</label></td>
			</tr><tr>
			<td><input type="checkbox" value="31" name="select_zone[]" id="local" onclick="clearAll();"><label>ccp_l (31)</label></td>
			<td><input type="checkbox" value="32" name="select_zone[]" id="local" onclick="clearAll();"><label>ccp_r (32)</label></td>
			<td><input type="checkbox" value="33" name="select_zone[]" id="local" onclick="clearAll();"><label>pcb_l (33)</label></td>
			<td><input type="checkbox" value="34" name="select_zone[]" id="local" onclick="clearAll();"><label>pcb_r (34)</label></td>
			<td><input type="checkbox" value="35" name="select_zone[]" id="local" onclick="clearAll();"><label>cal_l (35)</label></td>
			<td><input type="checkbox" value="36" name="select_zone[]" id="local" onclick="clearAll();"><label>cal_r (36)</label></td>
			<td><input type="checkbox" value="37" name="select_zone[]" id="local" onclick="clearAll();"><label>fspp_l (37)</label></td>
			<td><input type="checkbox" value="38" name="select_zone[]" id="local" onclick="clearAll();"><label>fspp_r (38)</label></td>
			<td><input type="checkbox" value="39" name="select_zone[]" id="local" onclick="clearAll();"><label>spp_l (39)</label></td>
			<td><input type="checkbox" value="40" name="select_zone[]" id="local" onclick="clearAll();"><label>spp_r (40)</label></td>
			</tr><tr>
			<td><input type="checkbox" value="41" name="select_zone[]" id="local" onclick="clearAll();"><label>vlp_l (41)</label></td>
			<td><input type="checkbox" value="42" name="select_zone[]" id="local" onclick="clearAll();"><label>vlp_r (42)</label></td>
			<td><input type="checkbox" value="43" name="select_zone[]" id="local" onclick="clearAll();"><label>optu_l (43)</label></td>
			<td><input type="checkbox" value="44" name="select_zone[]" id="local" onclick="clearAll();"><label>optu_r (44)</label></td>
			<td><input type="checkbox" value="45" name="select_zone[]" id="local" onclick="clearAll();"><label>dlp_l (45)</label></td>
			<td><input type="checkbox" value="46" name="select_zone[]" id="local" onclick="clearAll();"><label>dlp_r (46)</label></td>
			<td><input type="checkbox" value="47" name="select_zone[]" id="local" onclick="clearAll();"><label>idlp_l (47)</label></td>
			<td><input type="checkbox" value="48" name="select_zone[]" id="local" onclick="clearAll();"><label>idlp_r (48)</label></td>
			<td><input type="checkbox" value="49" name="select_zone[]" id="local" onclick="clearAll();"><label>lh_l (49)</label></td>
			<td><input type="checkbox" value="50" name="select_zone[]" id="local" onclick="clearAll();"><label>lh_r (50)</label></td>
			</tr><tr>
			<td><input type="checkbox" value="51" name="select_zone[]" id="local" onclick="clearAll();"><label>og_l (51)</label></td>
			<td><input type="checkbox" value="52" name="select_zone[]" id="local" onclick="clearAll();"><label>og_r (52)</label></td>
			<td><input type="checkbox" value="53" name="select_zone[]" id="local" onclick="clearAll();"><label>lob_l (53)</label></td>
			<td><input type="checkbox" value="54" name="select_zone[]" id="local" onclick="clearAll();"><label>lob_r (54)</label></td>
			<td><input type="checkbox" value="55" name="select_zone[]" id="local" onclick="clearAll();"><label>lop_l (55)</label></td>
			<td><input type="checkbox" value="56" name="select_zone[]" id="local" onclick="clearAll();"><label>lop_r (56)</label></td>
			<td><input type="checkbox" value="57" name="select_zone[]" id="local" onclick="clearAll();"><label>med_l (57)</label></td>
			<td><input type="checkbox" value="58" name="select_zone[]" id="local" onclick="clearAll();"><label>med_r (58)</label></td>
			<td><input type="checkbox" value="60" name="select_zone[]" id="network_all" onclick="clearZone();"><label>ALL</label></td>
			</tr><tr>
			<td><input type="checkbox" id="network_gobal" onclick="clearLocal();" ><label>Gobal</label></td>	
			<td><input type="button" onclick="change();" value="submit"></td>
			</tr></table>
		</form>
		</td></tr>
		<tr class="hide network">
			<?php //echo "<td colspan='4' bgcolor='#FFFFFF' align='middle' border='0'><a href='/driver/modules/search/20140725_DtoN_F/programC/neuronID/network/".$neuronName.".png'><img src='/driver/modules/search/20140725_DtoN_F/programC/neuronID/network/".$neuronName.".png' class='networkR' height='1350' width='700' border='0'></a></td>";?>
			<?php //echo "<td colspan='2' bgcolor='#FFFFFF' align='left' border='0'><a href='/driver/modules/search/20140725_DtoN_F/programC/neuronID/color.jpg'><img src='/driver/modules/search/20140725_DtoN_F/programC/neuronID/color.jpg' height='300' width='300' border='0'></a></td>";?>
			<td colspan="6" bgcolor="#FFFFFF"><div id="iframe" class="networkbox"></div></td>
			<?php 
			//echo "<script src=\"/driver/modules/search/20140725_DtoN_F/programC/neuronID/network/jquery-1.11.3.js\"></script>";
			//echo "<script src=\"/driver/modules/search/20140725_DtoN_F/programC/neuronID/network/ajaxLoader.js\"></script>";
			echo "<script type=\"text/JavaScript\">";
			echo "$(document).ready(function(){";
			echo "var waitingblock = new ajaxLoader(\".networkbox\");";
			echo "var defaultAll = document.getElementById('network_all');";
			echo "defaultAll.checked = true;";
			echo "$.get(\"/driver/modules/search/20140725_DtoN_F/programC/neuronID/network/1011.php?neuron=".$neuronName.".txt\",function(data){ $(\"#iframe\").html(data);});";
			echo "var removeBlock = setTimeout(\"waitingblock.remove()\",2000);";
			echo "});";
			echo "</script>";
			?>
		</tr>
		<tr class="hide network" style="display:none">
            <td colspan="6" bgcolor="#FFFFFF"><textarea name="textarea" cols="141" rows="1" disabled="disabled"></textarea></td>
        </tr>

</table></table>

<!--connect table-->
<table id="mytable" width="1015" bgColor="#99BBFF" border="1" bordercolor="black">
  <tr>
	<td colspan="9" bgcolor="#003399" width="922"><font size="+1" color="#ffffff"><strong><input type="button" value="-"  onclick="setHideTR_Connection();">Connection Table
	<input type="button" value="more" onclick="temp++;add_new_data()"> <input type="button" value="less" onclick="temp--;if(temp<0){temp=-1;}remove_data()"><br />
  <tr border="0" class="hide Connection">
    <td colspan="1" bgcolor="#003399"><font size="3" color="#ffffff"><strong><center>From spot number</center></strong></font></td>
    <td colspan="1" bgcolor="#003399"><font size="3" color="#ffffff"><strong><center>Polor angle</center></strong></font></td>
    <td colspan="1" bgcolor="#003399"><font size="3" color="#ffffff"><strong><center>Fiber radius</center></strong></font></td>
    <td colspan="1" bgcolor="#003399"><font size="3" color="#ffffff"><strong><center>Axon/Dendrite</center></strong></font></td>
    <td colspan="1" bgcolor="#003399"><font size="3" color="#ffffff"><strong><center>Neuropil</center></strong></font></td>
    <td colspan="1" bgcolor="#003399"><font size="3" color="#ffffff"><strong><center>Connection to</center></strong></font></td>
    <td colspan="1" bgcolor="#003399"><font size="3" color="#ffffff"><strong><center>To spot number</center></strong></font></td>
    <td colspan="1" bgcolor="#003399"><font size="3" color="#ffffff"><strong><center>Axon/Dendrite</center></strong></font></td>
  </tr>	
  </tr>
	<?
	//connection
	$connect_db=mysqli_connect("localhost","root","cwycjz321","ppcb");
	$sql3="SELECT * FROM `Connect` where `neuronName`='".$neuronName."'";
	$test3=mysqli_query($connect_db,$sql3);
	?>


	<?for($trow=0;$trow<5;$trow++){
		$row3 =mysqli_fetch_row($test3);
	?>
		<tr border="0" class="hide Connection">
			<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo "$row3[1]";?></center></font></td>
			<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo "$row3[2]";?></center></font></td>
			<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo "$row3[3]";?></center></font></td>
			<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo "$row3[4]";?></center></font></td>
			<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo "$row3[5]";?></center></font></td>
			<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo "$row3[6]";?></center></font></td>
			<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo "$row3[7]";?></center></font></td>
			<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo "$row3[8]";?></center></font></td>
		</tr>
	<?}?>
		<tr class="hide Connection" style="display:none">
            <td colspan="9" bgcolor="#FFFFFF"><textarea name="textarea" cols="140" rows="1" disabled="disabled"></textarea></td>
        </tr>

	<?
	$k=0;
	while( $row3 =mysqli_fetch_row($test3) ){
		$row33[$k][1]=$row3[1];
		$row33[$k][2]=$row3[2];
		$row33[$k][3]=$row3[3];
		$row33[$k][4]=$row3[4];
		$row33[$k][5]=$row3[5];
		$row33[$k][6]=$row3[6];
		$row33[$k][7]=$row3[7];
		$row33[$k][8]=$row3[8];
		$k++;
	}
		
	?>

</table>
<script>
var temp=-1;
function add_new_data() {	
			if(temp==0){
				<?
				for($i=0;$i<10;$i++){
					//if( !($row33[$i][1])  ){
					//	break;
					//}
				?>
					var num = document.getElementById("mytable").rows.length;
					var Tr = document.getElementById("mytable").insertRow(num);
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';
				<?}?>
			}
			
			
			if(temp==1){
				<?
				for($i=10;$i<20;$i++){
					if( $i>=$k ){
						$row33[$i][1]="noresult!";
					}
				?>
					var num = document.getElementById("mytable").rows.length;
					var Tr = document.getElementById("mytable").insertRow(num);
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
					Td = Tr.insertCell(Tr.cells.length);
					Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';      
				<?}?>
			}
			
			if(temp==2){
                <?
                for($i=20;$i<30;$i++){
                    if( $i>=$k ){
                        $row33[$i][1]="noresult!";
                    }
                ?>
                    var num = document.getElementById("mytable").rows.length;
                    var Tr = document.getElementById("mytable").insertRow(num);
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';
                <?}?>
            }

			if(temp==3){
                <?
                for($i=30;$i<40;$i++){
                    if( $i>=$k ){
                        $row33[$i][1]="noresult!";
                    }
                ?>
                    var num = document.getElementById("mytable").rows.length;
                    var Tr = document.getElementById("mytable").insertRow(num);
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';
                <?}?>
            }

			if(temp==4){
                <?
                for($i=40;$i<50;$i++){
                    if( $i>=$k ){
                        $row33[$i][1]="noresult!";
                    }
                ?>
                    var num = document.getElementById("mytable").rows.length;
                    var Tr = document.getElementById("mytable").insertRow(num);
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';
                <?}?>
            }

			if(temp==5){
                <?
                for($i=50;$i<60;$i++){
                    if( $i>=$k ){
                        $row33[$i][1]="noresult!";
                    }
                ?>
                    var num = document.getElementById("mytable").rows.length;
                    var Tr = document.getElementById("mytable").insertRow(num);
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';
                <?}?>
            }

			if(temp==6){
                <?
                for($i=60;$i<70;$i++){
                    if( $i>=$k ){
                        $row33[$i][1]="noresult!";
                    }
                ?>
                    var num = document.getElementById("mytable").rows.length;
                    var Tr = document.getElementById("mytable").insertRow(num);
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';
                <?}?>
            }

			if(temp==7){
                <?
                for($i=70;$i<80;$i++){
                    if( $i>=$k ){
                        $row33[$i][1]="noresult!";
                    }
                ?>
                    var num = document.getElementById("mytable").rows.length;
                    var Tr = document.getElementById("mytable").insertRow(num);
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';
                <?}?>
            }

			if(temp==8){
                <?
                for($i=80;$i<90;$i++){
                    if( $i>=$k ){
                        $row33[$i][1]="noresult!";
                    }
                ?>
                    var num = document.getElementById("mytable").rows.length;
                    var Tr = document.getElementById("mytable").insertRow(num);
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';
                <?}?>
            }

			if(temp==9){
                <?
                for($i=90;$i<100;$i++){
                    if( $i>=$k ){
                        $row33[$i][1]="noresult!";
                    }
                ?>
                    var num = document.getElementById("mytable").rows.length;
                    var Tr = document.getElementById("mytable").insertRow(num);
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';
                <?}?>
            }
		
			if(temp==10){
                <?
                for($i=100;$i<110;$i++){
                    if( $i>=$k ){
                        $row33[$i][1]="noresult!";
                    }
                ?>
                    var num = document.getElementById("mytable").rows.length;
                    var Tr = document.getElementById("mytable").insertRow(num);
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';
                <?}?>
            }
			
			if(temp==11){
                <?
                for($i=110;$i<120;$i++){
                    if( $i>=$k ){
                        $row33[$i][1]="noresult!";
                    }
                ?>
                    var num = document.getElementById("mytable").rows.length;
                    var Tr = document.getElementById("mytable").insertRow(num);
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name[]"><font size="3" color="#000000"><center><?echo $row33[$i][1];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name1[]"><font size="3" color="#000000"><center><?echo $row33[$i][2];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name2[]"><font size="3" color="#000000"><center><?echo $row33[$i][3];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name3[]"><font size="3" color="#000000"><center><?echo $row33[$i][4];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name4[]"><font size="3" color="#000000"><center><?echo $row33[$i][5];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name5[]"><font size="3" color="#000000"><center><?echo $row33[$i][6];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name6[]"><font size="3" color="#000000"><center><?echo $row33[$i][7];?></center></font></td>';
                    Td = Tr.insertCell(Tr.cells.length);
                    Td.innerHTML='<td colspan="1" bgcolor="#99BBFF" name="name7[]"><font size="3" color="#000000"><center><?echo $row33[$i][8];?></center></font></td>';
                <?}?>
            }
			
		
}
function remove_data() {
	for(var i=0;i<10;i++){
	var num = document.getElementById("mytable").rows.length;
	if(num >7) {
		document.getElementById("mytable").deleteRow(-1);
	}
	}
}
</script>



</table>
</body>
</html>
