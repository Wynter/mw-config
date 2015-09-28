<?php

// Set up extensions for use on wikis that are not global
if ( $wmgUseAdminLinks ) {
	require_once( "$IP/extensions/AdminLinks/AdminLinks.php" );
}

if ( $wmgUseBabel ) {
	require_once( "$IP/extensions/Babel/Babel.php" );
	require_once( "$IP/extensions/cldr/cldr.php" );
}

if ( $wmgUseCharInsert ) {
	require_once( "$IP/extensions/CharInsert/CharInsert.php" );
}

if ( $wmgUseCollapsibleVector ) {
	wfLoadExtension( 'CollapsibleVector' );
}

if ( $wmgUseCreateWiki ) {
	require_once( "$IP/extensions/CreateWiki/CreateWiki.php" );
	$wgCreateWikiSQLfiles = $wmgCreateWikiSQLfiles;
}

if ( $wmgUseDynamicPageList ) {
	require_once( "$IP/extensions/DynamicPageList/DynamicPageList.php" );
}

if ( $wmgUseEchoThanks ) {
	require_once( "$IP/extensions/Echo/Echo.php" );
	require_once( "$IP/extensions/Thanks/Thanks.php" );
}

if ( $wmgUseFlow ) {
	require_once( "$IP/extensions/Flow/Flow.php" );
	$wgGroupPermissions['bureaucrat']['flow-create-board'] = true;
	$wgFlowOccupyNamespaces = $wmgFlowOccupyNamespaces;
	$wgFlowParsoidURL = 'http://parsoid1.miraheze.org:8142';
	$wgFlowParsoidPrefix = "$wgDBname";

	if ( isset( $wgConf->settings['wmgPrivateWiki'][$wgDBname] ) ) {
		$wgFlowParsoidForwardCookies = true;
	}
}

if ( $wmgUseImageMap ) {
	wfLoadExtension( 'ImageMap' );
}

if ( $wmgUseInputBox ) {
	wfLoadExtension( 'InputBox' );
}

if ( $wmgUseMultiUpload ) {
	require_once( "$IP/extensions/MultiUpload/MultiUpload.php" );
}

if ( $wmgUsePopups ) {
        require_once( "$IP/extensions/PageImages/PageImages.php" );
        require_once( "$IP/extensions/Popups/Popups.php" );
        require_once( "$IP/extensions/TextExtracts/TextExtracts.php" );
}

if ( $wmgUseScribunto ) {
	require_once( "$IP/extensions/Scribunto/Scribunto.php" );
}

if ( $wmgUseSocialProfile ) {
	require_once( "$IP/extensions/SocialProfile/SocialProfile.php" );
}

if ( $wmgUseSubpageFun ) {
	require_once( "$IP/extensions/SubpageFun/SubpageFun.php" );
}

if ( $wmgUseSyntaxHighlight ) {
	wfLoadExtension( 'SyntaxHighlight_GeSHi' );
}

if ( $wmgUseTabsCombination ) {
	require_once( "$IP/extensions/Tabber/Tabber.php" );
	require_once( "$IP/extensions/Tabs/Tabs.php" );
}

if ( $wmgUseTemplateSandbox ) {
	wfLoadExtension( 'TemplateSandbox' );
}

if ( $wmgUseTranslate ) {
	require_once( "$IP/extensions/UniversalLanguageSelector/UniversalLanguageSelector.php" );
	require_once( "$IP/extensions/Translate/Translate.php" );
	$wgGroupPermissions['sysop']['pagetranslation'] = true;
	$wgGroupPermissions['sysop']['translate-import'] = true;
	$wgGroupPermissions['sysop']['translate-manage'] = true;
	$wgGroupPermissions['*']['translate'] = true;
	$wgGroupPermissions['user']['translate-messagereview'] = true;
	$wgGroupPermissions['translate-proofr']['translate-messagereview'] = false;
	$wgAddGroups['translate-proofr'] = false;
	// unset this unused group already
	unset( $wgGroupPermissions['translate-proofr'] );
	$wgTranslateBlacklist = $wmgTranslateBlacklist;
	$wgTranslateTranslationServices = $wmgTranslateTranslationServices;
	require_once( "/srv/mediawiki/config/TranslateConfigHack.php" );
}

if ( $wmgUseTimedMediaHandler ) {
	require_once( "$IP/extensions/MwEmbedSupport/MwEmbedSupport.php" );
	require_once( "$IP/extensions/TimedMediaHandler/TimedMediaHandler.php" );
	$wgFFmpeg2theoraLocation = false;
}

if ( $wmgUseTitleKey ) {
	require_once( "$IP/extensions/TitleKey/TitleKey.php" );
}

if ( $wmgUseVisualEditor ) {
	require_once( "$IP/extensions/VisualEditor/VisualEditor.php" );
	$wgVisualEditorParsoidURL = 'http://parsoid1.miraheze.org:8142';
	$wgVisualEditorParsoidPrefix = "$wgDBname";

	if ( isset( $wgConf->settings['wmgPrivateWiki'][$wgDBname] ) ) {
		$wgVisualEditorParsoidForwardCookies = true;
	}

	$wgDefaultUserOptions['visualeditor-enable'] = 1;
	
	// Load TemplateData
	wfLoadExtension( 'TemplateData' );
}

if ( $wmgUseWikiEditor ) {
	wfLoadExtension( 'WikiEditor' );
	wfLoadExtension( 'CodeEditor' );
	$wgDefaultUserOptions['usebetatoolbar'] = 1;
	$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;
	$wgCodeEditorEnableCore = true;
}

// Permission variables
if ( $wmgDisableAnonEditing ) {
	$wgGroupPermissions['*']['edit'] = false;
	$wgGroupPermissions['*']['createpage'] = false;
}
