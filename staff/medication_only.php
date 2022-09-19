<?php 
session_start();
include 'inc/header.php';

#Update
?>
<div class="container">
    <div class="row">
        <form class="col s7 push-s3" onSubmit={formSubmit}>
            <h2>Lomo-gan San-code</h2>
            <div class="chip">Medication Only</div>
            <div class="card blue-grey darken-1">
	            <div class="row">
	            	<div class="input-field col s7 push-s3">
	                    <label for="username">Staff Name</label>
	                    <input name="staff_name" type="text" autofocus = "on" autocomplete="off" required/>
	                </div>
	                <div class="input-field col s7 push-s3">
	                    <label for="username">Enter temperature reading</label>
	                    <input name="temp" type="text" autofocus = "on" autocomplete="off" required/>
	                </div>
	                <div class="col s12 push-s3">
		                <?php if($_SESSION["temp"] > 0) : ?>
							<small class="chip"><?php echo "<b>".$_SESSION["fname"]."'s</b> previous temperature reading : <b>".$_SESSION["temp"]."</b>"?></small>
						<?php else:?>
								<small class="chip">Temperature reading unavailable for <?php echo $_SESSION["fname"];?></small>
						<?php endif?>
					</div>
					<div class="col s12 push-s3">
						<?php if(!empty($_SESSION["comment"])):?>
							<small class="chip"><?php echo "<b>".$_SESSION["fname"]."</b>'s complains' : <b>".$_SESSION["comment"]."</b>"?></small>
						<?php else:?>
							<small class="chip">No previous complains for <?php echo $_SESSION["fname"]?></small>
						<?php endif?>
					</div>
					<div class="col s12 push-s3">
						<?php if(!empty($_SESSION["ailment"])):?>
						<small class="chip"><?php echo "<b>".$_SESSION["fname"]."</b> had : <b>".$_SESSION["ailment"]."</b>"?></small>
						<?php else:?>
							<small class="chip">No previous ailment for <?php echo $_SESSION["fname"]?></small>
						<?php endif?>
					</div>
					<div class="col s12 push-s3">
						<?php if(!empty($_SESSION["medication"])):?>
							<small class="chip"><?php echo "<b>".$_SESSION["fname"]."</b> was administered : <b>".$_SESSION["medication"]."</b>"?></small>
						<?php else:?>
							<small class="chip">No previous medication for <?php echo $_SESSION["fname"]?></small>
						<?php endif?>
					</div>
	            </div>
	            <div class="row center">
	                <div class="input-field col s12">
	                    <button type="submit" class="btn waves-effect waves-dark light-blue darken-1">submit</button>
	                </div>
	            </div>
	        </div>
        </form>