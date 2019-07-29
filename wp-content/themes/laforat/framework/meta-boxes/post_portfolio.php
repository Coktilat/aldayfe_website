<div id="jws_theme_porfolio_metabox" class='tb-porfolio-metabox'>
	<?php
	$this->text('source_project',
			'Source Project',
			'',
			__('Enter source project for portfolio item instead of title','laforat')
	);
	?>
	<p>
	<?php
		$this->text('date',
				'Date',
				''
		);
	?>
	</p>
	<p>
	<?php
		$this->text('client',
				'Client',
				''
		);
	?>
	</p>
	<p>
	<?php
		$this->text('location',
				'Location',
				''
		);
		?>
	</p>
	<?php
	$this->textarea('galleries',
			'Gallery image',
			__('Please copy list gallery image, seperate by comma(,).','laforat')
	);
	?>
</div>