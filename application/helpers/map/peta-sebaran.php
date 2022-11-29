
<h3 class="header smaller lighter blue"><i class="ace-icon fa fa-globe smaller-100"></i> SEBARAN LAYANAN</h3>

<div style="float:left; border:#999999 dashed 1px; padding:10px; width:100%;" >
	<form name="formfil" id="formfil" method="get" action="index.php" >	
		<div class="col-sm-1" style="float:left; padding-top:7px">JENIS </div>
		<div class="col-sm-3">						
			<select name="filt_stat" id="filt_stat" class="form-control" required onChange="changeMapJenis()"  >
				<?php //<option value='All' >- Pilih -</option>

				$filt_stat = "Heatmap";
				//if(isset($_GET["filt_stat"])){ $_SESSION["filt_stat"]=$_GET["filt_stat"]; }
				//if(isset($_SESSION["filt_stat"])){ $filt_stat=$_SESSION["filt_stat"]; }

				$arr = array("Heatmap", "Point");
				$i=0; while	($i < 2){ $selc="";						
					if($arr[$i]==$filt_stat) { $selc=" selected "; }
					echo "<option value='".$arr[$i]."' ".$selc.">".$arr[$i]."</option>";
					$i++;
				}
				?>										
			</select>
		</div>

		<input type="submit" id="filt_btn" name="flt_time" value="Go" class="btn btn-info"  STYLE=" margin-left:7px;float:left;width:50px; height:30px; padding:3px; display: none" >

		<input name="act" type="hidden" value="<?php echo $act;?>"  />                 
	</form>            			

</div>		
<div style="clear: both; height: 10px"></div>

<div class="row">	
	<div class="col-md-11">	
		<div id="petaisi" style="width: 100%"><img src="../img/load.gif" width="90px" ></div>
  	</div>
  <!-- End Full Body Container -->
</div>
 
<?php 
$in_page_script=$act."_js.php";
$datepicker=1;
?>