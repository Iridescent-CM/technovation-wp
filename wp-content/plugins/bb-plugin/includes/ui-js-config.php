<script>
<?php
	
echo 'FLBuilderConfig = ' . json_encode( apply_filters('fl_builder_ui_js_config', array(
	'ajaxNonce'                     => wp_create_nonce( 'fl_ajax_update' ),
	'colorPresets'                  => FLBuilderModel::get_color_presets(),
	'customImageSizeTitles'         => apply_filters( 'image_size_names_choose', array() ),
	'debug'                         => ( defined( 'WP_DEBUG' ) && WP_DEBUG ),
	'enabledTemplates'              => 'core',
	'help'                          => FLBuilderModel::get_help_button_settings(),
	'homeUrl'                       => home_url(),
	'isRtl'                         => is_rtl(),
	'isUserTemplate'                => false,
	'lite'                          => true === FL_BUILDER_LITE,
	'modSecFix'                     => ( defined( 'FL_BUILDER_MODSEC_FIX' ) && FL_BUILDER_MODSEC_FIX ),
	'newUser'                       => FLBuilderModel::is_new_user(),
	'postId'                        => $post_id,
	'postStatus'                    => get_post_status(),
	'postType'                      => get_post_type(),
	'simpleUi'                      => $simple_ui ? true : false,
	'upgradeUrl'                    => FLBuilderModel::get_upgrade_url( array( 'utm_medium' => ( true === FL_BUILDER_LITE ? 'bb-lite' : 'bb-demo' ), 'utm_source' => 'builder-ui', 'utm_campaign' => ( true === FL_BUILDER_LITE ? 'top-panel-cta' : 'demo-cta' ) ) ),
	'userCanEditGlobalTemplates'    => current_user_can( FLBuilderModel::get_global_templates_editing_capability() ),
	'userCanPublish'                => current_user_can('publish_posts'),
	'userTemplateType'              => FLBuilderModel::get_user_template_type(),
	'googleFontsUrl'				=> apply_filters( 'fl_builder_google_fonts_domain', '//fonts.googleapis.com/' ) . 'css?family='
) ) ) . ';';

echo 'FLBuilderStrings = ' . json_encode( apply_filters('fl_builder_ui_js_strings', array(
	'actionsLightboxTitle' => esc_attr__('What would you like to do?', 'fl-builder'),
	'alreadySaved' => esc_attr_x( '%s is already a saved preset.', '%s is the preset hex color code.', 'fl-builder' ),
	'audioSelected' => esc_attr__('Audio File Selected', 'fl-builder'),
	'audiosSelected' => esc_attr__('Audio Files Selected', 'fl-builder'),
	'cancel' => esc_attr__('Cancel', 'fl-builder'),
	'changeTemplate' => esc_attr__('Change Template', 'fl-builder'),
	'changeTemplateMessage' => esc_attr__('Warning! Changing the template will replace your existing layout. Do you really want to do this?', 'fl-builder'),
	'colorPresets' => esc_attr__( 'Color Presets', 'fl-builder' ),
	'colorPicker' => esc_attr__( 'Color Picker', 'fl-builder' ),
	'column' => esc_attr__('Column', 'fl-builder'),
	'contentSliderSelectLayout' => esc_attr__('Please select either a background layout or content layout before submitting.', 'fl-builder'),
	'countdownDateisInThePast' => esc_attr__( 'Error! Please enter a date that is in the future.', 'fl-builder' ),
	'deleteAccount' => esc_attr__('Remove Account', 'fl-builder'),
	'deleteAccountWarning' => esc_attr__('Are you sure you want to remove this account? Other modules that are connected to it will be affected.', 'fl-builder'),
	'deleteColumnMessage' => esc_attr__('Do you really want to delete this column?', 'fl-builder'),
	'deleteFieldMessage' => esc_attr__('Do you really want to delete this item?', 'fl-builder'),
	'deleteModuleMessage' => esc_attr__('Do you really want to delete this module?', 'fl-builder'),
	'deleteRowMessage' => esc_attr__('Do you really want to delete this row?', 'fl-builder'),
	'deleteTemplate' => esc_attr__('Do you really want to delete this template?', 'fl-builder'),
	'deleteGlobalTemplate' => esc_attr__('WARNING! You are about to delete a global template that may be linked to other pages. Do you really want to delete this template and unlink it?', 'fl-builder'),
	'discard' => esc_attr__('Discard Changes and Exit', 'fl-builder'),
	'discardMessage' => esc_attr__('Do you really want to discard these changes? All of your changes that are not published will be lost.', 'fl-builder'),
	'done' => esc_attr__('Done', 'fl-builder'),
	'draft' => esc_attr__('Save Changes and Exit', 'fl-builder'),
	'duplicate' => esc_attr__( 'Duplicate', 'fl-builder' ),
	'duplicateLayout' => esc_attr_x('Duplicate Layout', 'Duplicate page/post action label.', 'fl-builder'),
	'editGlobalSettings' => esc_attr__('Global Settings', 'fl-builder'),
	'editLayoutSettings' => esc_attr__('Layout CSS / Javascript', 'fl-builder'),
	'emptyMessage' => esc_attr__('Drop a row layout or module to get started!', 'fl-builder'),
	'enterValidDay' => esc_attr__( 'Error! Please enter a valid day.', 'fl-builder' ),
	'enterValidMonth' => esc_attr__( 'Error! Please enter a valid month.', 'fl-builder' ),
	'enterValidYear' => esc_attr__( 'Error! Please enter a valid year.', 'fl-builder' ),
	'errorMessage' => esc_attr__('Beaver Builder caught the following JavaScript error. If Beaver Builder is not functioning as expected the cause is most likely this error. Please help us by disabling all plugins and testing Beaver Builder while reactivating each to determine if the issue is related to a third party plugin.', 'fl-builder'),
	'fullSize' => esc_attr__('Full Size', 'fl-builder'),
	'getHelp' => esc_attr__('Get Help', 'fl-builder'),
	'globalErrorMessage' => __('"{message}" on line {line} of {file}.', 'fl-builder'),
	'insert' => esc_attr__('Insert', 'fl-builder'),
	'large' => esc_attr__('Large', 'fl-builder'),
	'manageTemplates' => esc_attr__('Manage Templates', 'fl-builder'),
	'medium' => esc_attr__('Medium', 'fl-builder'),
	'module' => esc_attr__('Module', 'fl-builder'),
	'moduleTemplateSaved' => esc_attr__('Module Saved!', 'fl-builder'),
	'move' => esc_attr__('Move', 'fl-builder'),
	'newColumn' => esc_attr__('New Column', 'fl-builder'),
	'newRow' => esc_attr__('New Row', 'fl-builder'),
	'noneColorSelected' => esc_attr__( 'Please enter a color first.', 'fl-builder' ),
	'noPresets' => esc_attr__( 'Add a color preset first.', 'fl-builder' ),
	'noResultsFound' => esc_attr__('No results found.', 'fl-builder'),
	'noSavedRows' => esc_attr__('No saved rows found.', 'fl-builder'),
	'noSavedModules' => esc_attr__('No saved modules found.', 'fl-builder'),
	'ok' => esc_attr__( 'OK', 'fl-builder' ),
	'photoPage' => esc_attr__('Photo Page', 'fl-builder'),
	'photoSelected' => esc_attr__('Photo Selected', 'fl-builder'),
	'photosSelected' => esc_attr__('Photos Selected', 'fl-builder'),
	'placeholder' => esc_attr__( 'Paste color here...', 'fl-builder' ),
	'pleaseWait' => esc_attr__('Please Wait...', 'fl-builder'),
	'presetAdded' => esc_attr_x( '%s added to presets!', '%s is the preset hex color code.', 'fl-builder' ),
	'publish' => esc_attr__('Publish Changes', 'fl-builder'),
	'remove' => esc_attr__('Remove', 'fl-builder'),
	'removePresetConfirm' => esc_attr__( 'Are you sure?', 'fl-builder' ),
	'row' => esc_attr__('Row', 'fl-builder'),
	'rowSettings' => esc_attr__('Row Settings', 'fl-builder'),
	'rowTemplateSaved' => esc_attr__('Row Saved!', 'fl-builder'),
	'saveCoreTemplate' => esc_attr__('Save Core Template', 'fl-builder'),
	'saveTemplate' => esc_attr__('Save Template', 'fl-builder'),
	'selectAudio' => esc_attr__('Select Audio', 'fl-builder'),
	'selectPhoto' => esc_attr__('Select Photo', 'fl-builder'),
	'selectPhotos' => esc_attr__('Select Photos', 'fl-builder'),
	'selectVideo' => esc_attr__('Select Video', 'fl-builder'),
	'submitForReview' => esc_attr__('Submit for Review', 'fl-builder'),
	'subscriptionModuleAccountError' => esc_attr__('Please select an account before saving.', 'fl-builder'),
	'subscriptionModuleConnectError' => esc_attr__('Please connect an account before saving.', 'fl-builder'),
	'subscriptionModuleListError' => esc_attr__('Please select a list before saving.', 'fl-builder'),
	'subscriptionModuleTagsError' => esc_attr__('Please enter at least one tag before saving.', 'fl-builder'),
	'takeHelpTour' => esc_attr__('Take a Tour', 'fl-builder'),
	'templateAppend' => esc_attr__('Append New Layout', 'fl-builder'),
	'templateReplace' => esc_attr__('Replace Existing Layout', 'fl-builder'),
	'templateSaved' => esc_attr__('Template Saved!', 'fl-builder'),
	'thumbnail' => esc_attr__('Thumbnail', 'fl-builder'),
	'tourNext' => esc_attr__('Next', 'fl-builder'),
	'tourEnd' => esc_attr__('Get Started', 'fl-builder'),
	'tourTemplatesTitle' => esc_attr__('Choose a Template', 'fl-builder'),
	'tourTemplates' => esc_attr__('Get started by choosing a layout template to customize, or build a page from scratch by selecting the blank layout template.', 'fl-builder'),
	'tourAddRowsTitle' => esc_attr__('Add Rows', 'fl-builder'),
	'tourAddRows' => esc_attr__('Add multi-column rows, adjust spacing, add backgrounds and more by dragging and dropping row layouts onto the page.', 'fl-builder'),
	'tourAddContentTitle' => esc_attr__('Add Content', 'fl-builder'),
	'tourAddContent' => esc_attr__('Add new content by dragging and dropping modules or widgets into your row layouts or to create a new row layout.', 'fl-builder'),
	'tourEditContentTitle' => esc_attr__('Edit Content', 'fl-builder'),
	'tourEditContent' => esc_attr__('Move your mouse over rows, columns or modules to edit and interact with them.', 'fl-builder'),
	'tourEditContent2' => esc_attr__('Use the action buttons to perform actions such as moving, editing, duplicating or deleting rows, columns and modules.', 'fl-builder'),
	'tourAddContentButtonTitle' => esc_attr__('Add More Content', 'fl-builder'),
	'tourAddContentButton' => esc_attr__('Use the Add Content button to open the content panel and add new row layouts, modules or widgets.', 'fl-builder'),
	'tourTemplatesButtonTitle' => esc_attr__('Change Templates', 'fl-builder'),
	'tourTemplatesButton' => esc_attr__('Use the Templates button to pick a new template or append one to your layout. Appending will insert a new template at the end of your existing page content.', 'fl-builder'),
	'tourToolsButtonTitle' => esc_attr__('Helpful Tools', 'fl-builder'),
	'tourToolsButton' => esc_attr__('The Tools button lets you save a template, duplicate a layout, edit the settings for a layout or edit the global settings.', 'fl-builder'),
	'tourDoneButtonTitle' => esc_attr__('Publish Your Changes', 'fl-builder'),
	'tourDoneButton' => esc_attr__("Once you're finished, click the Done button to publish your changes, save a draft or revert back to the last published state.", 'fl-builder'),
	'tourFinishedTitle' => esc_attr__("Let's Get Building!", 'fl-builder'),
	'tourFinished' => esc_attr__("Now that you know the basics, you're ready to start building! If at any time you need help, click the help icon in the upper right corner to access the help menu. Happy building!", 'fl-builder'),
	'unloadWarning' => esc_attr__('The settings you are currently editing will not be saved if you navigate away from this page.', 'fl-builder'),
	'viewKnowledgeBase' => esc_attr__('View the Knowledge Base', 'fl-builder'),
	'validateRequiredMessage' => esc_attr__('This field is required.', 'fl-builder'),
	'visitForums' => esc_attr__('Contact Support', 'fl-builder'),
	'watchHelpVideo' => esc_attr__('Watch the Video', 'fl-builder'),
	'welcomeMessage' => esc_attr__('Welcome! It looks like this might be your first time using the builder. Would you like to take a tour?', 'fl-builder'),
	'yesPlease' => esc_attr__('Yes Please!', 'fl-builder')
) ) ) . ';';

FLBuilderFonts::js();

?>
</script>
