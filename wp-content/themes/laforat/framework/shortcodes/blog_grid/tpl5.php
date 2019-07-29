<?php
global $i;
$i++;
var_dump($i);
if($i %3 == 0):?>
	<div class="col-md-4 big_product_item">
		<?php include 'tpl1.php'; ?>
	</div>
	<div class="col-md-8">
		<div class="row">
		<?php else:
			for($j=0;$j<$i;$j++){
				if($j%2==0):?>
					<div class="col-md-6 col-sm-6">
						<?php include 'tpl1.php'; ?>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
					<?php else:?>
						<div class="col-md-6 col-sm-6">
							<?php include 'tpl1.php'; ?>
						</div>
				<?php endif;
				if($j%2==0) echo'</div>';
			}
			endif;
if($i %3 == 0) echo "</div></div>";