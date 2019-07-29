<?php global $jws_theme_options; ?>
<div id="panel-style-selector">
	<div class="panel-wrapper">
		<div class="panel-selector-open"><i class="fa fa-cog"></i></div>
		<div class="panel-selector-header">Style Selector</div>
		<div class="panel-selector-body clearfix">
			<div class="panel-selector-section clearfix">
				<h3 class="panel-selector-title">Primary Color</h3>

				<div class="panel-selector-row clearfix">
					<ul class="panel-primary-color">
						<li style="background-color: <?php echo $jws_theme_options['jws_theme_primary_color'];?>" data-color="<?php echo $jws_theme_options['jws_theme_primary_color'];?>" class="active" ></li>
						<li style="background-color:#c29778" data-color="#c29778"></li>
						<li style="background-color:#cc686f" data-color="#cc686f"></li>
						<li style="background-color:#ecb345" data-color="#ecb345"></li>
						<li style="background-color:#95c45d" data-color="#95c45d"></li>
						<li style="background-color:#99b234" data-color="#99b234"></li>
						<li style="background-color:#ec8e42" data-color="#ec8e42"></li>
						<li style="background-color:#78a3a6" data-color="#78a3a6"></li>
					</ul>
				</div>
			</div>

			<div class="panel-selector-section clearfix">
				<h3 class="panel-selector-title">Layout</h3>

				<div class="panel-selector-row clearfix">
					<?php $wide = $jws_theme_options['jws_theme_body_layout'] == 'wide'; ?>
					<a data-type="layout" data-value="wide" href="#" class="panel-selector-btn<?php if( $wide ) echo ' active';?>">Wide</a>
					<a data-type="layout" data-value="boxed" href="#" class="panel-selector-btn<?php if( !$wide ) echo ' active';?>">Boxed</a>
				</div>
			</div>
			<div class="panel-selector-section clearfix">
				<h3 class="panel-selector-title">Background</h3>

				<div class="panel-selector-row clearfix">
					<ul class="panel-primary-background">
						<li class="pattern-0" data-name="pattern-1.png" data-type="pattern" style="background-position: 0px 0px;"></li>
						<li class="pattern-1" data-name="pattern-2.png" data-type="pattern" style="background-position: -45px 0px;"></li>
						<li class="pattern-2" data-name="pattern-3.png" data-type="pattern" style="background-position: -90px 0px;"></li>
						<li class="pattern-3" data-name="pattern-4.png" data-type="pattern" style="background-position: -135px 0px;"></li>
						<li class="pattern-4" data-name="pattern-5.png" data-type="pattern" style="background-position: -180px 0px;"></li>
						<li class="pattern-5" data-name="pattern-6.png" data-type="pattern" style="background-position: -225px 0px;"></li>
						<li class="pattern-6" data-name="pattern-7.png" data-type="pattern" style="background-position: -256px 0px;"></li>
						<li class="pattern-7" data-name="pattern-8.png" data-type="pattern" style="background-position: -307px 0px;"></li>
					</ul>
				</div>
			</div>
			<div class="panel-selector-section clearfix">
				<div class="panel-selector-row text-center">
					<a id="panel-selector-reset" href="#" class="panel-selector-btn">Reset</a>
				</div>
			</div>
		</div>
	</div>
</div>