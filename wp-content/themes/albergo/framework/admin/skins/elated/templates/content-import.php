<div class="eltd-tabs-content">
	<div class="tab-content">
		<div class="tab-pane fade in active" id="import">
			<div class="eltd-tab-content">
				<h2 class="eltd-page-title"><?php esc_html_e('Import', 'albergo'); ?></h2>
				<form method="post" class="eltd_ajax_form eltd-import-page-holder" data-confirm-message="<?php esc_html_e('Are you sure, you want to import Demo Data now?', 'albergo'); ?>">
					<div class="eltd-page-form">
						<div class="eltd-page-form-section-holder">
							<h3 class="eltd-page-section-title"><?php esc_html_e('Import Demo Content', 'albergo'); ?></h3>
							<div class="eltd-page-form-section">
								<div class="eltd-field-desc">
									<h4><?php esc_html_e('Import', 'albergo'); ?></h4>
									<p><?php esc_html_e('Choose demo content you want to import', 'albergo'); ?></p>
								</div>
								<div class="eltd-section-content">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-3">
												<select name="import_example" id="import_example" class="form-control eltd-form-element dependence">
													<option value="albergo"><?php esc_html_e('Albergo', 'albergo'); ?></option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="eltd-page-form-section">
								<div class="eltd-field-desc">
									<h4><?php esc_html_e('Import Type', 'albergo'); ?></h4>
									<p><?php esc_html_e('Import Type', 'albergo'); ?></p>
								</div>
								<div class="eltd-section-content">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-3">
												<select name="import_option" id="import_option" class="form-control eltd-form-element">
													<option value=""><?php esc_html_e('Please Select', 'albergo'); ?></option>
													<option value="complete_content"><?php esc_html_e('All', 'albergo'); ?></option>
													<option value="content"><?php esc_html_e('Content', 'albergo'); ?></option>
													<option value="widgets"><?php esc_html_e('Widgets', 'albergo'); ?></option>
													<option value="options"><?php esc_html_e('Options', 'albergo'); ?></option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="eltd-page-form-section">
								<div class="eltd-field-desc">
									<h4><?php esc_html_e('Import attachments', 'albergo'); ?></h4>
									<p><?php esc_html_e('Do you want to import media files?', 'albergo'); ?></p>
								</div>
								<div class="eltd-section-content">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-12">
												<p class="field switch">
													<label class="cb-enable dependence"><span><?php esc_html_e('Yes', 'albergo'); ?></span></label>
													<label class="cb-disable selected dependence"><span><?php esc_html_e('No', 'albergo'); ?></span></label>
													<input type="checkbox" id="import_attachments" class="checkbox" name="import_attachments" value="1">
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="eltd-page-form-section">
								<div class="eltd-field-desc">
									<input type="submit" class="btn btn-primary btn-sm " value="<?php esc_html_e('Import', 'albergo'); ?>" name="import" id="eltd-import-demo-data" />
								</div>
								<div class="eltd-section-content">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-12">
												<div class="eltd-import-load"><span><?php esc_html_e('The import process may take some time. Please be patient.', 'albergo') ?> </span><br />
													<div class="eltd-progress-bar-wrapper html5-progress-bar">
														<div class="progress-bar-wrapper">
															<progress id="progressbar" value="0" max="100"></progress>
														</div>
														<div class="progress-value">0%</div>
														<div class="progress-bar-message">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="eltd-page-form-section eltd-import-button-wrapper">
								<div class="alert alert-warning">
									<strong><?php esc_html_e('Important notes:', 'albergo') ?></strong>
									<ul>
										<li><?php esc_html_e('Please note that import process will take time needed to download all attachments from demo web site.', 'albergo'); ?></li>
										<li> <?php esc_html_e('If you plan to use shop, please install WooCommerce before you run import.', 'albergo')?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>