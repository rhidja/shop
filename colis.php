<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_parcels.js"></script>
<?php
session_start();
include_once("connex.php");
?>
<div>
<form id="newParcelForm" name="newParcelForm" class="form-horizontal"><legend>New parcel</legend>

	<div class="control-group">
		<label class="control-label" for="idColis">Parcel's Id</label>
		<div class="controls">
			<input type="text" name="idColis" id="idColis" placeholder="Parcel's Id" required aurofocus/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="codeColis">Parcel's code</label>
		<div class="controls">
			<input type="text" name="codeColis" id="codeColis" data-format="yy-mm-dd" placeholder="Parcel's code"/>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="dateEnvoiColis">Sent date</label>
		<div class="controls">
			<div id="datetimepicker1" class="input-append">
				<input type="text" id="dateEnvoiColis" name="dateEnvoiColis" data-format="yyyy-MM-dd"></input>
				<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
			</div>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="dateReceptionColis">Receved date</label>
		<div class="controls">
			<div id="datetimepicker2" class="input-append">
				<input type="text" id="dateReceptionColis" name="dateReceptionColis"  data-format="yyyy-MM-dd"></input>
				<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
			</div>
		</div>
	</div>
	

	<div class="control-group">
		<div class="controls">
			<button type="submit" id="submitColis" class="btn"><i class="icon-ok-sign"></i>Submit</button>
		</div>
	</div>
</form>
</div>