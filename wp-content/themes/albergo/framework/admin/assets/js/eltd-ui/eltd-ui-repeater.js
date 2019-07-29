(function($){
    $(document).ready(function() {
 	    eltdRepeater.rowRepeater.init();
 	    eltdRepeater.rowInnerRepeater.init();
	    eltdInitSortable();
    });

	var eltdRepeater = function() {
		var repeaterHolder = $('.eltd-repeater-wrapper'),
			numberOfRows;

		var rowRepeater = function() {

			var addNewRow = function(holder) {
				var $addButton = holder.find('.eltd-repeater-add a');
				var templateName = holder.find('.eltd-repeater-wrapper-inner').data('template');
				var $repeaterContent = holder.find('.eltd-repeater-wrapper-inner');
				var repeaterTemplate = wp.template('eltd-repeater-template-' + templateName);

				$addButton.on('click', function(e) {
					e.preventDefault();
					e.stopPropagation();

					var $row = $(repeaterTemplate({
						rowIndex: getLastRowIndex(holder) + 1 || 0
					}));

					$repeaterContent.append($row);
					var new_holder = $row.find('.eltd-repeater-inner-wrapper');
					eltdRepeater.rowInnerRepeater.addNewRowInner(new_holder);
					eltdRepeater.rowInnerRepeater.removeRowInner(new_holder);
					eltdInitSortable();
					eltdUIAdmin.eltdInitSwitch();
					eltdUIAdmin.eltdInitMediaUploader();
					eltdUIAdmin.eltdInitColorpicker();
					eltdUIAdmin.eltdInitDatePicker();
					eltdUIAdmin.eltdSelect2();
					//eltdDependencyAdmin.eltdReInitOptionsDependency();
					eltdTinyMCE($row, numberOfRows);
					numberOfRows += 1;
				});
			};

			var removeRow = function(holder) {

				var repeaterContent = holder.find('.eltd-repeater-wrapper-inner');
				repeaterContent.on('click', '.eltd-clone-remove', function(e) {
					e.preventDefault();
					e.stopPropagation();

					if(!window.confirm('Are you sure you want to remove this section?')) {
						return;
					}

					var $rowParent = $(this).parents('.eltd-repeater-fields-holder');
					$rowParent.remove();

					decrementNumberOfRows();

				});
			};

			var getLastRowIndex = function(holder) {
				var $repeaterContent = holder.find('.eltd-repeater-wrapper-inner');
				var $lastRow = $repeaterContent.find('.eltd-repeater-fields-holder').last();

				if(typeof $lastRow === 'undefined') {
					return false;
				}

				return $lastRow.data('index');
			};

			var decrementNumberOfRows = function() {
				if(numberOfRows <= 0) {
					return;
				}

				numberOfRows -= 1;
			}
			var setNumberOfRows = function(holder) {
				numberOfRows =  holder.find('.eltd-repeater-fields-holder').length;

			}
			var getNumberOfRows = function() {
				return numberOfRows;
			}

			return {
				init: function() {
					var repeaterHolder = $('.eltd-repeater-wrapper');

					repeaterHolder.each(function(){
						setNumberOfRows($(this));
						addNewRow($(this));
						removeRow($(this));
					});
				},
				numberOfRows: getNumberOfRows
			}
		}();

		var rowInnerRepeater = function() {
			var repeaterInnerHolder = $('.eltd-repeater-inner-wrapper');


			var addNewRowInner = function(holder) {

				//var repeaterInnerContent = holder.find('.eltd-repeater-inner-wrapper-inner');
				var templateInnerName = holder.find('.eltd-repeater-inner-wrapper-inner').data('template');
				var rowInnerTemplate = wp.template('eltd-repeater-inner-template-' + templateInnerName);
				holder.on('click', '.eltd-inner-clone', function(e) {

					e.preventDefault();
					e.stopPropagation();

					var $clickedButton = $(this);
					var $parentRow = $clickedButton.parents('.eltd-repeater-fields-holder').first();

					var parentIndex = $parentRow.data('index');

					var $rowInnerContent = $clickedButton.parent().prev();

					var lastRowInnerIndex = $parentRow.find('.eltd-repeater-inner-fields-holder').last().data('index');

					lastRowInnerIndex = typeof lastRowInnerIndex !== 'undefined' ? lastRowInnerIndex : -1;

					var $repeaterInnerRow = $(rowInnerTemplate({
						rowIndex: parentIndex,
						rowInnerIndex: lastRowInnerIndex + 1
					}));

					$rowInnerContent.append($repeaterInnerRow);
					eltdInitSortable();
					eltdUIAdmin.eltdInitSwitch();
					eltdUIAdmin.eltdInitMediaUploader();
					eltdUIAdmin.eltdInitColorpicker();
					eltdUIAdmin.eltdInitDatePicker();
					eltdUIAdmin.eltdSelect2();
					eltdDependencyAdmin.eltdReInitOptionsDependency();
					//not calling tinyMCE for inner repeater for now
					// eltdTinyMCE($repeaterInnerRow, lastRowInnerIndex);
				});
			};

			var removeRowInner = function(holder) {
				var repeaterInnerContent = holder.find('.eltd-repeater-inner-wrapper-inner');
				repeaterInnerContent.on('click', '.eltd-clone-inner-remove', function(e) {
					e.preventDefault();
					e.stopPropagation();

					if(!confirm('Are you sure you want to remove section?')) {
						return;
					}

					var $removeButton = $(this);
					var $parent = $removeButton.parents('.eltd-repeater-inner-fields-holder');

					$parent.remove();
				});
			};

			return {
				init: function() {
					var repeaterInnerHolder = $('.eltd-repeater-inner-wrapper');
					repeaterInnerHolder.each(function(){
						addNewRowInner($(this));
						removeRowInner($(this));
					});

				},
				addNewRowInner:addNewRowInner,
				removeRowInner:removeRowInner
			}
		}();

		return {
			rowRepeater: rowRepeater,
			rowInnerRepeater: rowInnerRepeater
		}
	}();

	function eltdInitSortable() {
		$('.eltd-repeater-wrapper-inner.sortable').sortable();
		$('.eltd-repeater-inner-wrapper-inner.sortable').sortable();
	}


	function eltdTinyMCE(row, numberOfRows){
		var newTextAreaHtml = row.find('.wp-editor-area');
		var contentTinyMce = $('#wp-content-wrap .wp-editor-area');

		if (newTextAreaHtml.length){

			//old row variables
			var oldID = contentTinyMce.attr('id'),
				oldContainer = contentTinyMce.parents('.wp-editor-wrap'),
				oldIframeHeight = oldContainer.find('iframe').height(),
				oldSwitcherButtons = oldContainer.find('button.wp-switch-editor');

			//new row variables
			var textareaID = newTextAreaHtml.attr('id').replace('textarea_index','textarea_index_'+numberOfRows),
			    textareaClasses = newTextAreaHtml.attr('class'),
			    textareaName = newTextAreaHtml.attr('name'),
			    textareaHolder = newTextAreaHtml.parents('.eltd-page-form-section').first(),
			    children = textareaHolder.find('[id*=textarea_index]'),
			    thisEditorContainer = newTextAreaHtml.parents(".wp-editor-container"),
			    editorTools;

			//trigger click on tinymc button so cloned row can catch properties
			if (oldContainer.hasClass('html-active')) {
			    oldSwitcherButtons.first().trigger('click');
			}

			//change all children indexes for clone row
			children.each(function (e){
				var thisChild = $(this),
					thisButtons = thisChild.find('button');

				thisChild.attr('id', thisChild.attr('id').replace('textarea_index','textarea_index_'+numberOfRows)); // change id - first row will have 0 as the last char
			});

			//empty container to enable new tinymc code to add
			thisEditorContainer.empty();

			//add new textarea
			$('<textarea/>', {
			    id: textareaID,
			    class: textareaClasses,
			    name: textareaName
			}).appendTo(thisEditorContainer);

			setTimeout(function () {
				//add tinymce
			    tinymce.execCommand( 'mceAddEditor', true, textareaID );

				//change attributes for editor tools (add media and switcher)
			    editorTools = thisEditorContainer.siblings('.wp-editor-tools');

			    if (editorTools.length){
			    	var mediaButton = editorTools.find('button.insert-media'),
			    		switchButton = editorTools.find('button.wp-switch-editor');

			    	mediaButton.attr('data-editor',mediaButton.data('editor').replace('textarea_index','textarea_index_'+numberOfRows)); //change html attribute
			    	mediaButton.data('editor',mediaButton.data('editor').replace('textarea_index','textarea_index_'+numberOfRows)); //this works for media but not for switch buttons

			    	switchButton.each(function () {
			    		var thisSwitch = $(this);
			    		
						thisSwitch.attr('data-wp-editor-id',thisSwitch.data('wp-editor-id').replace('textarea_index','textarea_index_'+numberOfRows));
			    	});
			    }

			    //add QuickTags
			    tinyMCEPreInit.qtInit[textareaID] =JSON.parse(JSON.stringify(tinyMCEPreInit.qtInit[oldID]));
			    tinyMCEPreInit.qtInit[textareaID].id = textareaID;

			    // make the editor area visible
			    newTextAreaHtml.addClass('wp-editor-area').show();

			    // initialize quicktags
			    new QTags(textareaID);
			    QTags._buttonsInit();

			    // force the editor to start at its defined mode.
			    switchEditors.go(textareaID, tinyMCEPreInit.mceInit[oldID].mode);
			}, 300);
		}
	}

})(jQuery);
