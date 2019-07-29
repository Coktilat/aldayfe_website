<?php

/*
   Class: AlbergoElatedMultipleImages
   A class that initializes Albergo Multiple Images
*/

class AlbergoElatedMultipleImages implements iAlbergoElatedRender {
	private $name;
	private $label;
	private $description;
	
	function __construct( $name, $label = "", $description = "" ) {
		global $albergo_Framework;
		$this->name        = $name;
		$this->label       = $label;
		$this->description = $description;
		$albergo_Framework->eltdMetaBoxes->addOption( $this->name, "" );
	}
	
	public function render( $factory ) {
		global $post;
		?>
		
		<div class="eltd-page-form-section">
			<div class="eltd-field-desc">
				<h4><?php echo esc_html( $this->label ); ?></h4>
				<p><?php echo esc_html( $this->description ); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<ul class="eltd-gallery-images-holder clearfix">
								<?php
								$image_gallery_val = get_post_meta( $post->ID, $this->name, true );
								if ( $image_gallery_val != '' ) {
									$image_gallery_array = explode( ',', $image_gallery_val );
								}
								
								if ( isset( $image_gallery_array ) && count( $image_gallery_array ) != 0 ):
									foreach ( $image_gallery_array as $gimg_id ):
										$gimage_wp = wp_get_attachment_image_src( $gimg_id, 'thumbnail', true );
										echo '<li class="eltd-gallery-image-holder"><img src="' . esc_url( $gimage_wp[0] ) . '"/></li>';
									endforeach;
								endif;
								?>
							</ul>
							<input type="hidden" value="<?php echo esc_attr( $image_gallery_val ); ?>" id="<?php echo esc_attr( $this->name ) ?>" name="<?php echo esc_attr( $this->name ) ?>">
							<div class="eltd-gallery-uploader">
								<a class="eltd-gallery-upload-btn btn btn-sm btn-primary" href="javascript:void(0)"><?php esc_html_e( 'Upload', 'albergo' ); ?></a>
								<a class="eltd-gallery-clear-btn btn btn-sm btn-default pull-right" href="javascript:void(0)"><?php esc_html_e( 'Remove All', 'albergo' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

/*
   Class: AlbergoElatedImagesVideos
   A class that initializes Albergo Images Videos
*/
class AlbergoElatedImagesVideos implements iAlbergoElatedRender {
	private $label;
	private $description;
	
	function __construct( $label = "", $description = "" ) {
		$this->label       = $label;
		$this->description = $description;
	}
	
	public function render( $factory ) {
		global $post;
		?>
		
		<div class="eltd_hidden_portfolio_images" style="display: none">
			<div class="eltd-page-form-section">
				<div class="eltd-field-desc">
					<h4><?php echo esc_html( $this->label ); ?></h4>
					<p><?php echo esc_html( $this->description ); ?></p>
				</div>
				<div class="eltd-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-2">
								<em class="eltd-field-description"><?php esc_html_e( 'Order Number', 'albergo' ); ?></em>
								<input type="text" class="form-control eltd-input eltd-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x"/>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="eltd-field-description"><?php esc_html_e( 'Image', 'albergo' ); ?></em>
								<div class="eltd-media-uploader">
									<div style="display: none" class="eltd-media-image-holder">
										<img src="" alt="" class="eltd-media-image img-thumbnail"/>
									</div>
									<div style="display: none" class="eltd-media-meta-fields">
										<input type="hidden" class="eltd-media-upload-url" name="portfolioimg_x" id="portfolioimg_x"/>
										<input type="hidden" class="eltd-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
										<input type="hidden" class="eltd-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
									</div>
									<a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e( 'Select Image', 'albergo' ); ?>" data-frame-button-text="<?php esc_html_e( 'Select Image', 'albergo' ); ?>"><?php esc_html_e( 'Upload', 'albergo' ); ?></a>
									<a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'albergo' ); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-3">
								<em class="eltd-field-description"><?php esc_html_e( 'Video Type', 'albergo' ); ?></em>
								<select class="form-control eltd-form-element eltd-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
									<option value=""></option>
									<option value="youtube"><?php esc_html_e( 'YouTube', 'albergo' ); ?></option>
									<option value="vimeo"><?php esc_html_e( 'Vimeo', 'albergo' ); ?></option>
									<option value="self"><?php esc_html_e( 'Self Hosted', 'albergo' ); ?></option>
								</select>
							</div>
							<div class="col-lg-3">
								<em class="eltd-field-description"><?php esc_html_e( 'Video ID', 'albergo' ); ?></em>
								<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x"/>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="eltd-field-description">Video image</em>
								<div class="eltd-media-uploader">
									<div style="display: none" class="eltd-media-image-holder">
										<img src="" alt="" class="eltd-media-image img-thumbnail"/>
									</div>
									<div style="display: none" class="eltd-media-meta-fields">
										<input type="hidden" class="eltd-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x"/>
										<input type="hidden" class="eltd-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
										<input type="hidden" class="eltd-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
									</div>
									<a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e( 'Select Image', 'albergo' ); ?>" data-frame-button-text="<?php esc_html_e( 'Select Image', 'albergo' ); ?>"><?php esc_html_e( 'Upload', 'albergo' ); ?></a>
									<a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'albergo' ); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-4">
								<em class="eltd-field-description"><?php esc_html_e( 'Video mp4', 'albergo' ); ?></em>
								<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x"/>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<a class="eltd_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'albergo' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php
		$no               = 1;
		$portfolio_images = get_post_meta( $post->ID, 'eltd_portfolio_images', true );
		if ( count( $portfolio_images ) > 1 && albergo_elated_core_plugin_installed() ) {
			usort( $portfolio_images, "eltd_core_compare_portfolio_videos" );
		}
		while ( isset( $portfolio_images[ $no - 1 ] ) ) {
			$portfolio_image = $portfolio_images[ $no - 1 ];
			?>
			
			<div class="eltd_portfolio_image" rel="<?php echo esc_attr( $no ); ?>" style="display: block;">
				<div class="eltd-page-form-section">
					<div class="eltd-field-desc">
						<h4><?php echo esc_html( $this->label ); ?></h4>
						<p><?php echo esc_html( $this->description ); ?></p>
					</div>
					<div class="eltd-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="eltd-field-description"><?php esc_html_e( 'Order Number', 'albergo' ); ?></em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="portfolioimgordernumber_<?php echo esc_attr( $no ); ?>" name="portfolioimgordernumber[]" value="<?php echo isset( $portfolio_image['portfolioimgordernumber'] ) ? esc_attr( stripslashes( $portfolio_image['portfolioimgordernumber'] ) ) : ""; ?>"/>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltd-field-description"><?php esc_html_e( 'Image', 'albergo' ); ?></em>
									<div class="eltd-media-uploader">
										<div<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == false ) { ?> style="display: none"<?php } ?> class="eltd-media-image-holder">
											<img src="<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == true ) { echo esc_url( albergo_elated_get_attachment_thumb_url( stripslashes( $portfolio_image['portfolioimg'] ) ) ); } ?>" alt="" class="eltd-media-image img-thumbnail"/>
										</div>
										<div style="display: none" class="eltd-media-meta-fields">
											<input type="hidden" class="eltd-media-upload-url" name="portfolioimg[]" id="portfolioimg_<?php echo esc_attr( $no ); ?>" value="<?php echo stripslashes( $portfolio_image['portfolioimg'] ); ?>"/>
											<input type="hidden" class="eltd-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
											<input type="hidden" class="eltd-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
										</div>
										<a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e( 'Select Image', 'albergo' ); ?>" data-frame-button-text="<?php esc_html_e( 'Select Image', 'albergo' ); ?>"><?php esc_html_e( 'Upload', 'albergo' ); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'albergo' ); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-3">
									<em class="eltd-field-description"><?php esc_html_e( 'Video Type', 'albergo' ); ?></em>
									<select class="form-control eltd-form-element eltd-portfoliovideotype" name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr( $no ); ?>">
										<option value=""></option>
										<option <?php if ( $portfolio_image['portfoliovideotype'] == "youtube" ) { echo "selected='selected'"; } ?> value="youtube"><?php esc_html_e( 'YouTube', 'albergo' ); ?></option>
										<option <?php if ( $portfolio_image['portfoliovideotype'] == "vimeo" ) { echo "selected='selected'"; } ?> value="vimeo"><?php esc_html_e( 'Vimeo', 'albergo' ); ?></option>
										<option <?php if ( $portfolio_image['portfoliovideotype'] == "self" ) { echo "selected='selected'"; } ?> value="self"><?php esc_html_e( 'Self Hosted', 'albergo' ); ?></option>
									</select>
								</div>
								<div class="col-lg-3">
									<em class="eltd-field-description"><?php esc_html_e( 'Video ID', 'albergo' ); ?></em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideoid_<?php echo esc_attr( $no ); ?>" name="portfoliovideoid[]" value="<?php echo isset( $portfolio_image['portfoliovideoid'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideoid'] ) ) : ""; ?>"/>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltd-field-description">Video image</em>
									<div class="eltd-media-uploader">
										<div<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == false ) { ?> style="display: none"<?php } ?> class="eltd-media-image-holder">
											<img src="<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == true ) { echo esc_url( albergo_elated_get_attachment_thumb_url( stripslashes( $portfolio_image['portfoliovideoimage'] ) ) ); } ?>" alt="" class="eltd-media-image img-thumbnail"/>
										</div>
										<div style="display: none" class="eltd-media-meta-fields">
											<input type="hidden" class="eltd-media-upload-url" name="portfoliovideoimage[]" id="portfoliovideoimage_<?php echo esc_attr( $no ); ?>" value="<?php echo stripslashes( $portfolio_image['portfoliovideoimage'] ); ?>"/>
											<input type="hidden" class="eltd-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
											<input type="hidden" class="eltd-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
										</div>
										<a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e( 'Select Image', 'albergo' ); ?>" data-frame-button-text="<?php esc_html_e( 'Select Image', 'albergo' ); ?>"><?php esc_html_e( 'Upload', 'albergo' ); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'albergo' ); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-4">
									<em class="eltd-field-description"><?php esc_html_e( 'Video mp4', 'albergo' ); ?></em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideomp4_<?php echo esc_attr( $no ); ?>" name="portfoliovideomp4[]" value="<?php echo isset( $portfolio_image['portfoliovideomp4'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideomp4'] ) ) : ""; ?>"/>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<a class="eltd_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e( 'Remove portfolio image/video', 'albergo' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$no ++;
		}
		?>
		<br/>
		<a class="eltd_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/"><?php esc_html_e( 'Add portfolio image/video', 'albergo' ); ?></a>
		<?php
	}
}

/*
   Class: AlbergoElatedImagesVideos
   A class that initializes Albergo Images Videos
*/

class AlbergoElatedImagesVideosFramework implements iAlbergoElatedRender {
	private $label;
	private $description;
	
	function __construct( $label = "", $description = "" ) {
		$this->label       = $label;
		$this->description = $description;
	}
	
	public function render( $factory ) {
		global $post;
		?>
		
		<div class="eltd-hidden-portfolio-images" style="display: none">
			<div class="eltd-portfolio-toggle-holder">
				<div class="eltd-portfolio-toggle eltd-toggle-desc">
					<span class="number">1</span>
					<span class="eltd-toggle-inner"><?php esc_html_e( 'Image - ', 'albergo' ); ?><em><?php esc_html_e( 'Order Number', 'albergo' ); ?></em></span>
				</div>
				<div class="eltd-portfolio-toggle eltd-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltd-portfolio-toggle-content">
				<div class="eltd-page-form-section">
					<div class="eltd-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="eltd-media-uploader">
										<em class="eltd-field-description"><?php esc_html_e( 'Image', 'albergo' ); ?></em>
										<div style="display: none" class="eltd-media-image-holder">
											<img src="" alt="" class="eltd-media-image img-thumbnail">
										</div>
										<div class="eltd-media-meta-fields">
											<input type="hidden" class="eltd-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
											<input type="hidden" class="eltd-media-upload-height" name="eltd_options_theme[media-upload][height]" value="">
											<input type="hidden" class="eltd-media-upload-width" name="eltd_options_theme[media-upload][width]" value="">
										</div>
										<a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e( 'Select Image', 'albergo' ); ?>" data-frame-button-text="<?php esc_html_e( 'Select Image', 'albergo' ); ?>"><?php esc_html_e( 'Upload', 'albergo' ); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'albergo' ); ?></a>
									</div>
								</div>
								<div class="col-lg-2">
									<em class="eltd-field-description"><?php esc_html_e( 'Order Number', 'albergo' ); ?></em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x">
								</div>
							</div>
							<input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
							<input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
							<input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
							<input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="eltd-hidden-portfolio-videos" style="display: none">
			<div class="eltd-portfolio-toggle-holder">
				<div class="eltd-portfolio-toggle eltd-toggle-desc">
					<span class="number">2</span>
					<span class="eltd-toggle-inner"><?php esc_html_e( 'Video - ', 'albergo' ); ?><em><?php esc_html_e( 'Order Number', 'albergo' ); ?></em></span>
				</div>
				<div class="eltd-portfolio-toggle eltd-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltd-portfolio-toggle-content">
				<div class="eltd-page-form-section">
					<div class="eltd-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="eltd-media-uploader">
										<em class="eltd-field-description"><?php esc_html_e( 'Cover Video Image', 'albergo' ); ?></em>
										<div style="display: none" class="eltd-media-image-holder">
											<img src="" alt="" class="eltd-media-image img-thumbnail">
										</div>
										<div style="display: none" class="eltd-media-meta-fields">
											<input type="hidden" class="eltd-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
											<input type="hidden" class="eltd-media-upload-height" name="eltd_options_theme[media-upload][height]" value="">
											<input type="hidden" class="eltd-media-upload-width" name="eltd_options_theme[media-upload][width]" value="">
										</div>
										<a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e( 'Select Image', 'albergo' ); ?>" data-frame-button-text="<?php esc_html_e( 'Select Image', 'albergo' ); ?>"><?php esc_html_e( 'Upload', 'albergo' ); ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'albergo' ); ?></a>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-2">
											<em class="eltd-field-description"><?php esc_html_e( 'Order Number', 'albergo' ); ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x">
										</div>
									</div>
									<div class="row next-row">
										<div class="col-lg-2">
											<em class="eltd-field-description"><?php esc_html_e( 'Video Type', 'albergo' ); ?></em>
											<select class="form-control eltd-form-element eltd-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
												<option value=""></option>
												<option value="youtube"><?php esc_html_e( 'YouTube', 'albergo' ); ?></option>
												<option value="vimeo"><?php esc_html_e( 'Vimeo', 'albergo' ); ?></option>
												<option value="self"><?php esc_html_e( 'Self Hosted', 'albergo' ); ?></option>
											</select>
										</div>
										<div class="col-lg-2 eltd-video-id-holder">
											<em class="eltd-field-description" id="videoId"><?php esc_html_e( 'Video ID', 'albergo' ); ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x">
										</div>
									</div>
									<div class="row next-row eltd-video-self-hosted-path-holder">
										<div class="col-lg-4">
											<em class="eltd-field-description"><?php esc_html_e( 'Video mp4', 'albergo' ); ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x">
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php
		$no               = 1;
		$portfolio_images = get_post_meta( $post->ID, 'eltd_portfolio_images', true );
		if ( !empty( $portfolio_images) ) {
			if ( count( $portfolio_images ) > 1 && albergo_elated_core_plugin_installed() ) {
				usort( $portfolio_images, "eltd_core_compare_portfolio_videos" );
			}
			while ( isset( $portfolio_images[ $no - 1 ] ) ) {
				$portfolio_image = $portfolio_images[ $no - 1 ];
				if ( isset( $portfolio_image['portfolioimgtype'] ) ) {
					$portfolio_img_type = $portfolio_image['portfolioimgtype'];
				} else {
					if ( stripslashes( $portfolio_image['portfolioimg'] ) == true ) {
						$portfolio_img_type = "image";
					} else {
						$portfolio_img_type = "video";
					}
				}
				
				if ( $portfolio_img_type == "image" ) { ?>
					<div class="eltd-portfolio-images eltd-portfolio-media" rel="<?php echo esc_attr( $no ); ?>">
						<div class="eltd-portfolio-toggle-holder">
							<div class="eltd-portfolio-toggle eltd-toggle-desc">
								<span class="number"><?php echo esc_html( $no ); ?></span>
								<span class="eltd-toggle-inner"><?php esc_html_e( 'Image - ', 'albergo' ); ?><em><?php echo stripslashes( $portfolio_image['portfolioimgordernumber'] ); ?></em></span>
							</div>
							<div class="eltd-portfolio-toggle eltd-portfolio-control">
								<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
								<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="eltd-portfolio-toggle-content" style="display: none">
							<div class="eltd-page-form-section">
								<div class="eltd-section-content">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-2">
												<div class="eltd-media-uploader">
													<em class="eltd-field-description"><?php esc_html_e( 'Image', 'albergo' ); ?></em>
													<div<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == false ) { ?> style="display: none"<?php } ?> class="eltd-media-image-holder">
														<img src="<?php if ( stripslashes( $portfolio_image['portfolioimg'] ) == true ) { echo esc_url( albergo_elated_get_attachment_thumb_url( stripslashes( $portfolio_image['portfolioimg'] ) ) ); } ?>" alt="" class="eltd-media-image img-thumbnail"/>
													</div>
													<div style="display: none" class="eltd-media-meta-fields">
														<input type="hidden" class="eltd-media-upload-url" name="portfolioimg[]" id="portfolioimg_<?php echo esc_attr( $no ); ?>" value="<?php echo stripslashes( $portfolio_image['portfolioimg'] ); ?>"/>
														<input type="hidden" class="eltd-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
														<input type="hidden" class="eltd-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
													</div>
													<a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e( 'Select Image', 'albergo' ); ?>" data-frame-button-text="<?php esc_html_e( 'Select Image', 'albergo' ); ?>"><?php esc_html_e( 'Upload', 'albergo' ); ?></a>
													<a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'albergo' ); ?></a>
												</div>
											</div>
											<div class="col-lg-2">
												<em class="eltd-field-description"><?php esc_html_e( 'Order Number', 'albergo' ); ?></em>
												<input type="text" class="form-control eltd-input eltd-form-element" id="portfolioimgordernumber_<?php echo esc_attr( $no ); ?>" name="portfolioimgordernumber[]" value="<?php echo isset( $portfolio_image['portfolioimgordernumber'] ) ? esc_attr( stripslashes( $portfolio_image['portfolioimgordernumber'] ) ) : ""; ?>">
											</div>
										</div>
										<input type="hidden" id="portfoliovideoimage_<?php echo esc_attr( $no ); ?>" name="portfoliovideoimage[]">
										<input type="hidden" id="portfoliovideotype_<?php echo esc_attr( $no ); ?>" name="portfoliovideotype[]">
										<input type="hidden" id="portfoliovideoid_<?php echo esc_attr( $no ); ?>" name="portfoliovideoid[]">
										<input type="hidden" id="portfoliovideomp4_<?php echo esc_attr( $no ); ?>" name="portfoliovideomp4[]">
										<input type="hidden" id="portfolioimgtype_<?php echo esc_attr( $no ); ?>" name="portfolioimgtype[]" value="image">
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				} else {
					?>
					<div class="eltd-portfolio-videos eltd-portfolio-media" rel="<?php echo esc_attr( $no ); ?>">
						<div class="eltd-portfolio-toggle-holder">
							<div class="eltd-portfolio-toggle eltd-toggle-desc">
								<span class="number"><?php echo esc_html( $no ); ?></span>
								<span class="eltd-toggle-inner"><?php esc_html_e( 'Video - ', 'albergo' ); ?><em><?php echo stripslashes( $portfolio_image['portfolioimgordernumber'] ); ?></em></span>
							</div>
							<div class="eltd-portfolio-toggle eltd-portfolio-control">
								<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
								<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="eltd-portfolio-toggle-content" style="display: none">
							<div class="eltd-page-form-section">
								<div class="eltd-section-content">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-2">
												<div class="eltd-media-uploader">
													<em class="eltd-field-description"><?php esc_html_e( 'Cover Video Image', 'albergo' ); ?></em>
													<div<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == false ) { ?> style="display: none"<?php } ?> class="eltd-media-image-holder">
														<img src="<?php if ( stripslashes( $portfolio_image['portfoliovideoimage'] ) == true ) { echo esc_url( albergo_elated_get_attachment_thumb_url( stripslashes( $portfolio_image['portfoliovideoimage'] ) ) ); } ?>" alt="" class="eltd-media-image img-thumbnail"/>
													</div>
													<div style="display: none" class="eltd-media-meta-fields">
														<input type="hidden" class="eltd-media-upload-url" name="portfoliovideoimage[]" id="portfoliovideoimage_<?php echo esc_attr( $no ); ?>" value="<?php echo stripslashes( $portfolio_image['portfoliovideoimage'] ); ?>"/>
														<input type="hidden" class="eltd-media-upload-height" name="eltd_options_theme[media-upload][height]" value=""/>
														<input type="hidden" class="eltd-media-upload-width" name="eltd_options_theme[media-upload][width]" value=""/>
													</div>
													<a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_html_e( 'Select Image', 'albergo' ); ?>" data-frame-button-text="<?php esc_html_e( 'Select Image', 'albergo' ); ?>"><?php esc_html_e( 'Upload', 'albergo' ); ?></a>
													<a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e( 'Remove', 'albergo' ); ?></a>
												</div>
											</div>
											<div class="col-lg-10">
												<div class="row">
													<div class="col-lg-2">
														<em class="eltd-field-description"><?php esc_html_e( 'Order Number', 'albergo' ); ?></em>
														<input type="text" class="form-control eltd-input eltd-form-element" id="portfolioimgordernumber_<?php echo esc_attr( $no ); ?>" name="portfolioimgordernumber[]" value="<?php echo isset( $portfolio_image['portfolioimgordernumber'] ) ? esc_attr( stripslashes( $portfolio_image['portfolioimgordernumber'] ) ) : ""; ?>">
													</div>
												</div>
												<div class="row next-row">
													<div class="col-lg-2">
														<em class="eltd-field-description"><?php esc_html_e( 'Video Type', 'albergo' ); ?></em>
														<select class="form-control eltd-form-element eltd-portfoliovideotype" name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr( $no ); ?>">
															<option value=""></option>
															<option <?php if ( $portfolio_image['portfoliovideotype'] == "youtube" ) { echo "selected='selected'"; } ?> value="youtube"><?php esc_html_e( 'YouTube', 'albergo' ); ?></option>
															<option <?php if ( $portfolio_image['portfoliovideotype'] == "vimeo" ) { echo "selected='selected'"; } ?> value="vimeo"><?php esc_html_e( 'Vimeo', 'albergo' ); ?></option>
															<option <?php if ( $portfolio_image['portfoliovideotype'] == "self" ) { echo "selected='selected'"; } ?> value="self"><?php esc_html_e( 'Self Hosted', 'albergo' ); ?></option>
														</select>
													</div>
													<div class="col-lg-2 eltd-video-id-holder">
														<em class="eltd-field-description"><?php esc_html_e( 'Video ID', 'albergo' ); ?></em>
														<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideoid_<?php echo esc_attr( $no ); ?>" name="portfoliovideoid[]" value="<?php echo isset( $portfolio_image['portfoliovideoid'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideoid'] ) ) : ""; ?>"/>
													</div>
												</div>
												<div class="row next-row eltd-video-self-hosted-path-holder">
													<div class="col-lg-4">
														<em class="eltd-field-description"><?php esc_html_e( 'Video mp4', 'albergo' ); ?></em>
														<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideomp4_<?php echo esc_attr( $no ); ?>" name="portfoliovideomp4[]" value="<?php echo isset( $portfolio_image['portfoliovideomp4'] ) ? esc_attr( stripslashes( $portfolio_image['portfoliovideomp4'] ) ) : ""; ?>"/>
													</div>
												</div>
											</div>
										</div>
										<input type="hidden" id="portfolioimg_<?php echo esc_attr( $no ); ?>" name="portfolioimg[]">
										<input type="hidden" id="portfolioimgtype_<?php echo esc_attr( $no ); ?>" name="portfolioimgtype[]" value="video">
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				$no ++;
			}
		}
		?>
		
		<div class="eltd-portfolio-add">
			<a class="eltd-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i><?php esc_html_e( 'Add Image', 'albergo' ); ?></a>
			<a class="eltd-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i><?php esc_html_e( 'Add Video', 'albergo' ); ?></a>
			<a class="eltd-toggle-all-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( 'Expand All', 'albergo' ); ?></a>
		</div>
		<?php
	}
}

class AlbergoElatedTwitterFramework implements iAlbergoElatedRender {
	public function render( $factory ) {
		$twitterApi = ElatedTwitterApi::getInstance();
		$message    = '';
		
		if ( ! empty( $_GET['oauth_token'] ) && ! empty( $_GET['oauth_verifier'] ) ) {
			if ( ! empty( $_GET['oauth_token'] ) ) {
				update_option( $twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token'] );
			}
			
			if ( ! empty( $_GET['oauth_verifier'] ) ) {
				update_option( $twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier'] );
			}
			
			$responseObj = $twitterApi->obtainAccessToken();
			if ( $responseObj->status ) {
				$message = esc_html__( 'You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'albergo' );
			} else {
				$message = $responseObj->message;
			}
		}
		
		$buttonText = $twitterApi->hasUserConnected() ? esc_html__( 'Re-connect with Twitter', 'albergo' ) : esc_html__( 'Connect with Twitter', 'albergo' );
		?>
		<?php if ( $message !== '' ) { ?>
			<div class="alert alert-success" style="margin-top: 20px;">
				<span><?php echo esc_html( $message ); ?></span>
			</div>
		<?php } ?>
		<div class="eltd-page-form-section" id="eltd_enable_social_share">
			<div class="eltd-field-desc">
				<h4><?php esc_html_e( 'Connect with Twitter', 'albergo' ); ?></h4>
				<p><?php esc_html_e( 'Connecting with Twitter will enable you to show your latest tweets on your site', 'albergo' ); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<a id="eltd-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html( $buttonText ); ?></a>
							<input type="hidden" data-name="current-page-url" value="<?php echo esc_url( $twitterApi->buildCurrentPageURI() ); ?>"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }
}

class AlbergoElatedInstagramFramework implements iAlbergoElatedRender {
	public function render( $factory ) {
		$instagram_api = ElatedInstagramApi::getInstance();
		$message       = '';
		
		//if code wasn't saved to database
		if ( ! get_option( 'eltd_instagram_code' ) ) {
			//check if code parameter is set in URL. That means that user has connected with Instagram
			if ( ! empty( $_GET['code'] ) ) {
				//update code option so we can use it later
				$instagram_api->storeCode();
				$instagram_api->getAccessToken();
				$message = esc_html__( 'You have successfully connected with your Instagram account. If you have any issues fetching data from Instagram try reconnecting.', 'albergo' );
				
			} else {
				$instagram_api->storeCodeRequestURI();
			}
		}
		
		$buttonText = $instagram_api->hasUserConnected() ? esc_html__( 'Re-connect with Instagram', 'albergo' ) : esc_html__( 'Connect with Instagram', 'albergo' );
		?>
		<?php if ( $message !== '' ) { ?>
			<div class="alert alert-success" style="margin-top: 20px;">
				<span><?php echo esc_html( $message ); ?></span>
			</div>
		<?php } ?>
		<div class="eltd-page-form-section" id="eltd_enable_social_share">
			<div class="eltd-field-desc">
				<h4><?php esc_html_e( 'Connect with Instagram', 'albergo' ); ?></h4>
				<p><?php esc_html_e( 'Connecting with Instagram will enable you to show your latest photos on your site', 'albergo' ); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" href="<?php echo esc_url( $instagram_api->getAuthorizeUrl() ); ?>"><?php echo esc_html( $buttonText ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }
}

/*
   Class: AlbergoElatedImagesVideos
   A class that initializes Albergo Images Videos
*/
class AlbergoElatedOptionsFramework implements iAlbergoElatedRender {
	private $label;
	private $description;
	
	function __construct( $label = "", $description = "" ) {
		$this->label       = $label;
		$this->description = $description;
	}
	
	public function render( $factory ) {
		global $post;
		?>
		
		<div class="eltd-portfolio-additional-item-holder" style="display: none">
			<div class="eltd-portfolio-toggle-holder">
				<div class="eltd-portfolio-toggle eltd-toggle-desc">
					<span class="number">1</span>
					<span class="eltd-toggle-inner">Additional Sidebar Item <em><?php esc_html_e( '(Order Number, Item Title)', 'albergo' ); ?></em></span>
				</div>
				<div class="eltd-portfolio-toggle eltd-portfolio-control">
					<span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltd-portfolio-toggle-content">
				<div class="eltd-page-form-section">
					<div class="eltd-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="eltd-field-description"><?php esc_html_e( 'Order Number', 'albergo' ); ?></em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x">
								</div>
								<div class="col-lg-10">
									<em class="eltd-field-description"><?php esc_html_e( 'Item Title', 'albergo' ); ?></em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="optionLabel_x" name="optionLabel_x">
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltd-field-description"><?php esc_html_e( 'Item Text', 'albergo' ); ?></em>
									<textarea class="form-control eltd-input eltd-form-element" id="optionValue_x" name="optionValue_x"></textarea>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltd-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'albergo' ); ?></em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="optionUrl_x" name="optionUrl_x">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$no         = 1;
		$portfolios = get_post_meta( $post->ID, 'eltd_portfolios', true );
		if ( !empty( $portfolio_images) ) {
			if ( count( $portfolios ) > 1 && albergo_elated_core_plugin_installed() ) {
				usort( $portfolios, "eltd_core_compare_portfolio_options" );
			}
			while ( isset( $portfolios[ $no - 1 ] ) ) {
				$portfolio = $portfolios[ $no - 1 ];
				?>
				<div class="eltd-portfolio-additional-item" rel="<?php echo esc_attr( $no ); ?>">
					<div class="eltd-portfolio-toggle-holder">
						<div class="eltd-portfolio-toggle eltd-toggle-desc">
							<span class="number"><?php echo esc_html( $no ); ?></span>
							<span class="eltd-toggle-inner"><?php esc_html_e( 'Additional Sidebar Item - ', 'albergo' ); ?><em>(<?php echo stripslashes( $portfolio['optionlabelordernumber'] ); ?>, <?php echo stripslashes( $portfolio['optionLabel'] ); ?>)</em></span>
						</div>
						<div class="eltd-portfolio-toggle eltd-portfolio-control">
							<span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
							<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="eltd-portfolio-toggle-content" style="display: none">
						<div class="eltd-page-form-section">
							<div class="eltd-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<em class="eltd-field-description"><?php esc_html_e( 'Order Number', 'albergo' ); ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="optionlabelordernumber_<?php echo esc_attr( $no ); ?>" name="optionlabelordernumber[]" value="<?php echo isset( $portfolio['optionlabelordernumber'] ) ? esc_attr( stripslashes( $portfolio['optionlabelordernumber'] ) ) : ""; ?>">
										</div>
										<div class="col-lg-10">
											<em class="eltd-field-description"><?php esc_html_e( 'Item Title', 'albergo' ); ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="optionLabel_<?php echo esc_attr( $no ); ?>" name="optionLabel[]" value="<?php echo esc_attr( stripslashes( $portfolio['optionLabel'] ) ); ?>">
										</div>
									</div>
									<div class="row next-row">
										<div class="col-lg-12">
											<em class="eltd-field-description"><?php esc_html_e( 'Item Text', 'albergo' ); ?></em>
											<textarea class="form-control eltd-input eltd-form-element" id="optionValue_<?php echo esc_attr( $no ); ?>" name="optionValue[]"><?php echo esc_attr( stripslashes( $portfolio['optionValue'] ) ); ?></textarea>
										</div>
									</div>
									<div class="row next-row">
										<div class="col-lg-12">
											<em class="eltd-field-description"><?php esc_html_e( 'Enter Full URL for Item Text Link', 'albergo' ); ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="optionUrl_<?php echo esc_attr( $no ); ?>" name="optionUrl[]" value="<?php echo stripslashes( $portfolio['optionUrl'] ); ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				$no ++;
			}
		}
		?>
		
		<div class="eltd-portfolio-add">
			<a class="eltd-add-item btn btn-sm btn-primary" href="#"><?php esc_html_e( 'Add New Item', 'albergo' ); ?></a>
			<a class="eltd-toggle-all-item btn btn-sm btn-default pull-right" href="#"><?php esc_html_e( 'Expand All', 'albergo' ); ?></a>
		</div>
		<?php
	}
}

class AlbergoElatedRepeater implements iAlbergoElatedRender {
	private $label;
	private $description;
	private $name;
	private $fields;
	private $num_of_rows;
	private $button_text;
	private $table_layout;

	function __construct( $fields, $name, $label = '', $description = '', $button_text = '', $table_layout = false) {
		global $albergo_Framework;

		$this->label       = $label;
		$this->description = $description;
		$this->fields      = $fields;
		$this->name        = $name;
		$this->num_of_rows = 1;
		$this->button_text = ! empty( $button_text ) ? $button_text : esc_html__( 'Add New Item', 'albergo' );
		$this->table_layout = $table_layout;

		$counter = 0;
		foreach ( $this->fields as $field ) {

			if ( ! isset( $this->fields[ $counter ]['options'] ) ) {
				$this->fields[ $counter ]['options'] = array();
			}
			if ( ! isset( $this->fields[ $counter ]['args'] ) ) {
				$this->fields[ $counter ]['args'] = array();
			}
			if ( ! isset( $this->fields[ $counter ]['label'] ) ) {
				$this->fields[ $counter ]['label'] = '';
			}
			if ( ! isset( $this->fields[ $counter ]['description'] ) ) {
				$this->fields[ $counter ]['description'] = '';
			}
			if ( ! isset( $this->fields[ $counter ]['default_value'] ) ) {
				$this->fields[ $counter ]['default_value'] = '';
			}
			if ( ! isset( $this->fields[ $counter ]['hidden'] ) ) {
				$this->fields[ $counter ]['hidden'] = '';
			}
			$counter ++;
		}
		$albergo_Framework->eltdMetaBoxes->addOption( $this->name, '');
	}

	public function render( $factory ) {
		global $post;

		$clones = array();
		$wrapper_classes = array();

		if ( ! empty( $post ) ) {
			$clones = get_post_meta( $post->ID, $this->name, true );
		}

		$sortable_class = 'sortable';

		foreach ( $this->fields as $field ) {
			if ( $field['type'] == 'textareahtml' ) {
				$sortable_class = '';
				break;
			}
		}

		if ($this->table_layout){
			$wrapper_classes[] = 'eltd-repeater-table';
		}

		?>
        <div class="eltd-repeater-wrapper <?php echo implode(' ', $wrapper_classes)?>">
			<?php  if ( $this->label !== '') { ?>
                <h4><?php echo esc_attr($this->label); ?></h4>
			<?php } ?>
			<?php if($this->description != ''){ ?>
                <p><?php echo esc_attr($this->description); ?></p>
			<?php } ?>
			<?php if ($this->table_layout) { ?>
                <div class="eltd-repeater-table-heading">
                    <div class="eltd-repeater-fields-holder">
                        <div class="eltd-repeater-table-cell eltd-repeater-sort"><?php esc_html_e( 'Order', 'albergo' ) ?></div>
                        <div class="eltd-repeater-fields">
							<?php foreach ( $this->fields as $field ) {
								$col_width_class = 'col-xs-12';
								if ( ! empty($field['col_width']) ) {
									$col_width_class = 'col-xs-'.$field['col_width'];
								} ?>
                                <div class="eltd-repeater-table-cell <?php echo esc_attr($col_width_class);?>"><?php echo esc_html( $field['th'] ); ?></div>
							<?php } ?>
                        </div>
                        <div class="eltd-repeater-table-cell eltd-repeater-remove"><?php esc_html_e( 'Remove', 'albergo' ) ?></div>
                    </div>
                </div>
			<?php } ?>
            <div class="eltd-repeater-wrapper-inner <?php echo esc_attr( $sortable_class ); ?>" data-template="<?php echo str_replace('_', '-', $this->name); ?>">
				<?php if (! empty($clones) && count($clones) > 0) {
					$counter = 0;
					foreach($clones as $clone) {
						?>
                        <div class="eltd-repeater-fields-holder clearfix" data-index="<?php echo esc_attr($counter); ?>">
                            <div class="eltd-repeater-sort">
                                <i class="fa fa-sort"></i>
                            </div>
                            <div class="eltd-repeater-fields">
								<?php
								foreach ($this->fields as $field) {
									$col_width_class = 'col-xs-12';
									if ( ! empty($field['col_width']) ) {
										$col_width_class = 'col-xs-'.$field['col_width'];
									}
									?>
                                    <div class="eltd-repeater-fields-row <?php echo esc_attr($col_width_class);?>">
                                        <div class="eltd-repeater-fields-row-inner">
											<?php
											if($field['type'] == 'repeater'){

												$sortable_inner_class = 'sortable';
												foreach ( $field['fields'] as $field_inner ) {
													if ( $field_inner['type'] == 'textareahtml' ) {
														$sortable_inner_class = '';
														break;
													}
												} ?>
                                                <div class="eltd-repeater-inner-wrapper">
                                                    <div class="eltd-repeater-inner-wrapper-inner <?php echo esc_attr( $sortable_inner_class ); ?>" data-template="<?php echo str_replace('_', '-', $field['name']); ?>">
                                                        <h4><?php echo esc_attr($field['label']); ?></h4>
														<?php if($field['description'] != ''){ ?>
                                                            <p><?php echo esc_attr($field['description']); ?></p>
														<?php } ?>
														<?php if (!empty($clone[$field['name']]) && count($clone[$field['name']]) > 0) {
															$counter2 = 0;

															foreach($clone[$field['name']] as $clone_inner) {
																?>
                                                                <div class="eltd-repeater-inner-fields-holder eltd-second-level clearfix" data-index="<?php echo esc_attr($counter2); ?>">
                                                                    <div class="eltd-repeater-sort">
                                                                        <i class="fa fa-sort"></i>
                                                                    </div>
                                                                    <div class="eltd-repeater-inner-fields">
																		<?php
																		foreach ($field['fields'] as $field_inner) {
																			$col_width_inner_class = 'col-xs-12';
																			if ( ! empty($field_inner['col_width']) ) {
																				$col_width_inner_class = 'col-xs-'.$field_inner['col_width'];
																			} ?>
                                                                            <div class="eltd-repeater-inner-fields-row <?php echo esc_attr( $col_width_inner_class ); ?>">
                                                                                <div class="eltd-repeater-inner-fields-row-inner">
																					<?php

																					if (!isset($field_inner['options'])) {
																						$field_inner['options'] = array();
																					}
																					if (!isset($field_inner['args'])) {
																						$field_inner['args'] = array();
																					}
																					if (!isset($field_inner['label'])) {
																						$field_inner['label'] =  '';
																					}
																					if (!isset($field_inner['description'])) {
																						$field_inner['description'] = '';
																					}
																					if (!isset($field_inner['default_value'])) {
																						$field_inner['default_value'] = '';
																					}

																					if($clone_inner[$field_inner['name']] == '' && $field_inner['default_value'] != ''){
																						$repeater_inner_field_value = $field_inner['default_value'];
																					} else {
																						$repeater_inner_field_value = $clone_inner[$field_inner['name']];
																					}

																					$containerClass = '';
																					$data = array();

																					if ( ! empty( $field_inner['dependency'] ) ) {
																						$dependencyValues = albergo_elated_return_repeater_dependency_options_array(array(
																							'field' 	   => $field,
																							'repeaterName' => $this->name,
																							'counter' 	   => $counter,
																							'fieldInner'   => $field_inner,
																							'counter2' 	   => $counter2
																						));
																						$data 			  = $dependencyValues['data'];
																						$containerClass   = $dependencyValues['class'];
																					}
																					?>
                                                                                    <div class="<?php echo esc_attr($containerClass); ?>" <?php echo albergo_elated_get_inline_attrs($data, true); ?>>
																						<?php
																						$factory->render($field_inner['type'], $field_inner['name'], $field_inner['label'], $field_inner['description'], $field_inner['options'], $field_inner['args'], $field_inner['hidden'], array('name'=> $this->name . '['.$counter.']['.$field['name'].']', 'index' => $counter2, 'value' => $repeater_inner_field_value));
																						?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
																			<?php
																		} ?>
                                                                    </div>
                                                                    <div class="eltd-repeater-remove">
                                                                        <a class="eltd-clone-inner-remove" href="#"><i class="fa fa-times"></i></a>
                                                                    </div>
                                                                </div>
																<?php $counter2++; }
														} ?>
                                                    </div>
                                                    <div class="eltd-repeater-inner-add">
                                                        <a class="eltd-inner-clone btn btn-sm btn-primary" data-count="<?php echo esc_attr($this->num_of_rows) ?>" href="#"><?php echo esc_html($field['button_text']); ?></a>
                                                    </div>
                                                </div>
												<?php
											} else {
												if($clone[$field['name']] == '' && $field['default_value'] != ''){
													$repeater_field_value = $field['default_value'];
												} else {
													$repeater_field_value = $clone[$field['name']];
												}

												$containerClass = '';
												$data = array();

												if ( ! empty( $field['dependency'] ) ) {
													$dependencyValues = albergo_elated_return_repeater_dependency_options_array(array(
														'field' 		=> $field,
														'repeaterName' => $this->name,
														'counter' 		=> $counter
													));
													$data 			  = $dependencyValues['data'];
													$containerClass   = $dependencyValues['class'];
												}
												?>
                                                <div class="<?php echo esc_attr($containerClass); ?>" <?php echo albergo_elated_get_inline_attrs($data, true); ?>>
													<?php
													$factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('name'=> $this->name, 'index' => $counter, 'value' => $repeater_field_value));
													?>
                                                </div>
												<?php
											} ?>
                                        </div>
                                    </div>
								<?php } ?>
                            </div>
                            <div class="eltd-repeater-remove">
                                <a class="eltd-clone-remove" href="#"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
						<?php $counter++; } } ?>
                <script type="text/html" id="tmpl-eltd-repeater-template-<?php echo str_replace('_', '-', $this->name); ?>">
                    <div class="eltd-repeater-fields-holder <?php echo esc_attr( $sortable_class ); ?> clearfix"  data-index="{{{ data.rowIndex }}}">
                        <div class="eltd-repeater-sort">
                            <i class="fa fa-sort"></i>
                        </div>
                        <div class="eltd-repeater-fields">
							<?php
							foreach ($this->fields as $field) {
								$col_width_class = 'col-xs-12';
								if ( ! empty($field['col_width']) ) {
									$col_width_class = 'col-xs-'.$field['col_width'];
								} ?>
                                <div class="eltd-repeater-fields-row <?php echo esc_attr($col_width_class);?>">
                                    <div class="eltd-repeater-fields-row-inner">
										<?php
										if($field['type'] == 'repeater') { ?>
                                            <div class="eltd-repeater-inner-wrapper">
                                                <div class="eltd-repeater-inner-wrapper-inner" data-template="<?php echo str_replace('_', '-', $field['name']); ?>">
                                                    <h4><?php echo esc_attr($field['label']); ?></h4>
													<?php if($field['description'] != ''){ ?>
                                                        <p><?php echo esc_attr($field['description']); ?></p>
													<?php } ?>
                                                </div>
                                                <div class="eltd-repeater-inner-add">
                                                    <a class="eltd-inner-clone btn btn-sm btn-primary" data-count="<?php echo esc_attr($this->num_of_rows) ?>" href="#">
														<?php echo esc_html($field['button_text']); ?>
                                                    </a>
                                                </div>
                                            </div>
										<?php } else {
											$containerClass = '';
											$data = array();

											?>
                                            <div class="<?php echo esc_attr($containerClass); ?>" <?php echo albergo_elated_get_inline_attrs($data, true); ?>>
												<?php
												$repeater_template_field_value = ($field['default_value'] != '') ? $field['default_value'] : '';
												$factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('name' => $this->name, 'index' => '{{{ data.rowIndex }}}', 'value' => $repeater_template_field_value));
												?>
                                            </div> <?php
										} ?>
                                    </div>
                                </div>
								<?php
							} ?>
                        </div>
                        <div class="eltd-repeater-remove">
                            <a class="eltd-clone-remove" href="#"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                </script>
				<?php
				//add script if field type repeater
				foreach ($this->fields as $field) {
					if($field['type'] == 'repeater') {
						?>
                        <script type="text/html" id="tmpl-eltd-repeater-inner-template-<?php echo str_replace('_', '-', $field['name']); ?>">
                            <div class="eltd-repeater-inner-fields-holder eltd-second-level clearfix" data-index="{{{ data.rowInnerIndex }}}">
                                <div class="eltd-repeater-sort">
                                    <i class="fa fa-sort"></i>
                                </div>
                                <div class="eltd-repeater-inner-fields">
									<?php $counter2 = 0;
									foreach ($field['fields'] as $field_inner) {
										$col_width_inner_class = 'col-xs-12';
										if ( ! empty($field_inner['col_width']) ) {
											$col_width_inner_class = 'col-xs-'.$field_inner['col_width'];
										} ?>
                                        <div class="eltd-repeater-inner-fields-row <?php echo esc_attr($col_width_inner_class);?>">
                                            <div class="eltd-repeater-fields-row-inner">
												<?php

												if (!isset($field_inner['options'])) {
													$field_inner['options'] = array();
												}
												if (!isset($field_inner['args'])) {
													$field_inner['args'] = array();
												}
												if (!isset($field_inner['label'])) {
													$field_inner['label'] =  '';
												}
												if (!isset($field_inner['description'])) {
													$field_inner['description'] = '';
												}
												if (!isset($field_inner['default_value'])) {
													$field_inner['default_value'] = '';
												}
												if (!isset($field_inner['hidden'])) {
													$field_inner['hidden'] = '';
												}

												$containerClass = '';
												$data = array();

												?>
                                                <div class="<?php echo esc_attr($containerClass); ?>" <?php echo albergo_elated_get_inline_attrs($data, true); ?>>
													<?php
													$repeater_inner_template_field_value = ($field_inner['default_value'] != '') ? $field_inner['default_value'] : '';
													$factory->render($field_inner['type'], $field_inner['name'], $field_inner['label'], $field_inner['description'], $field_inner['options'], $field_inner['args'], $field_inner['hidden'], array('name'=> $this->name . '[{{{ data.rowIndex }}}]['.$field['name'].']', 'index' => '{{{ data.rowInnerIndex }}}', 'value' => $repeater_inner_template_field_value));
													?>
                                                </div>
                                            </div>
                                        </div>
										<?php
										$counter2++;	} ?>
                                </div>
                                <div class="eltd-repeater-remove">
                                    <a class="eltd-clone-inner-remove" href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </script>
					<?php }
				} ?>
            </div>
            <div class="eltd-repeater-add">
                <a class="eltd-clone btn btn-sm btn-primary" data-count="<?php echo esc_attr( $this->num_of_rows ) ?>" href="#"><?php echo esc_html( $this->button_text ); ?></a>
            </div>
        </div>
		<?php
	}
}


class AlbergoElatedFieldAddress extends AlbergoElatedFieldType {
	public function render( $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$col_width = 12;
		if ( isset( $args["col_width"] ) ) {
			$col_width = $args["col_width"];
		}
		
		$suffix = ! empty( $args['suffix'] ) ? $args['suffix'] : false;
		
		$class = $id = $country = $lat_field = $long_field = '';
		if ( ! empty( $repeat ) ) {
			if ( array_key_exists( 'index', $repeat ) ) {
				$id = $name . '-' . $repeat['index'];
			} else {
				$id = $name;
			}
			if ( array_key_exists( 'name', $repeat ) ) {
				$name = $repeat['name'];
			}
			$name  .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$id    = $name;
			$value = albergo_elated_option_get_value( $name );
		}
		
		if ( $label === '' && $description === '' ) {
			$class .= ' eltd-no-description';
		}
		
		if ( isset( $args['country'] ) && $args['country'] != '' ) {
			$country = $args['country'];
		}

        if ( isset( $args['latitude_field'] ) && $args['latitude_field'] != '' ) {
            $lat_field = $args['latitude_field'];
        }

        if ( isset( $args['longitude_field'] ) && $args['longitude_field'] != '' ) {
            $long_field = $args['longitude_field'];
        }
		?>
		
		<div class="eltd-page-form-section eltd-address-field <?php echo esc_attr( $class ); ?>" data-country="<?php echo esc_attr( $country ); ?>" data-lat-field="<?php echo esc_attr( $lat_field ); ?>" data-long-field="<?php echo esc_attr( $long_field ); ?>" id="eltd_<?php echo esc_attr( $id ); ?>"<?php if ( $hidden ) { ?> style="display: none"<?php } ?>>
			<div class="eltd-field-desc">
				<h4><?php echo esc_html( $label ); ?></h4>
				<p><?php echo esc_html( $description ); ?></p>
			</div>
			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr( $col_width ); ?>">
							<?php if ( $suffix ) : ?>
							<div class="input-group">
								<?php endif; ?>
								<input type="text" class="form-control eltd-input eltd-form-element" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_attr( htmlspecialchars( $value ) ); ?>"/>
								<?php if ( $suffix ) : ?>
									<div class="input-group-addon"><?php echo esc_html( $args['suffix'] ); ?></div>
								<?php endif; ?>
								<?php if ( $suffix ) : ?>
							</div>
						<?php endif; ?>
							<div class="map_canvas"></div>
							<button id="find" class="btn btn-primary"><?php esc_html_e( 'Place the pin on the map', 'albergo' ); ?></button>
							<a id="reset" href="#" style="display:none;"><?php esc_html_e( 'Reset Marker', 'albergo' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}