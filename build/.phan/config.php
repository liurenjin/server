<?php
/**
 * This configuration will be read and overlaid on top of the
 * default configuration. Command line arguments will be applied
 * after this file is read.
 *
 * @see src/Phan/Config.php
 * See Config for all configurable options.
 */
return [
	// A list of directories that should be parsed for class and
	// method information. After excluding the directories
	// defined in exclude_analysis_directory_list, the remaining
	// files will be statically analyzed for errors.
	//
	// Thus, both first-party and third-party code being used by
	// your application should be included in this list.
	'directory_list' => [
		'build/.phan/stubs',
		'3rdparty',
		'lib/composer',
		'themes',
		'lib/',
		'apps/',
		'core/',
		'ocs/',
		'ocs-provider/',
		'settings/',
		'tests/lib/Util/User',
	],

	// A directory list that defines files that will be excluded
	// from static analysis, but whose class and method
	// information should be included.
	//
	// Generally, you'll want to include the directories for
	// third-party code (such as "vendor/") in this list.
	//
	// n.b.: If you'd like to parse but not analyze 3rd
	//       party code, directories containing that code
	//       should be added to the `directory_list` as
	//       to `exclude_analysis_directory_list`.
	"exclude_analysis_directory_list" => [
		'3rdparty',
		'lib/composer',
		'apps/admin_audit/tests',
		'apps/comments/tests',
		'apps/dav/tests',
		'apps/encryption/tests',
		'apps/federatedfilesharing/tests',
		'apps/federation/tests',
		'apps/files/tests',
		'apps/files_external/3rdparty',
		'apps/files_external/tests',
		'apps/files_sharing/composer',
		'apps/files_sharing/tests',
		'apps/files_trashbin/tests',
		'apps/files_versions/tests',
		'apps/lookup_server_connector/tests',
		'apps/oauth2/tests',
		'apps/provisioning_api/tests',
		'apps/sharebymail/tests',
		'apps/systemtags/tests',
		'apps/testing/tests',
		'apps/theming/tests',
		'apps/twofactor_backupcodes/tests',
		'apps/updatenotification/tests',
		'apps/user_ldap/tests',
		'apps/workflowengine/tests',
	],

	// The number of processes to fork off during the analysis
	// phase.
	'processes' => 10,

	// Backwards Compatibility Checking. This is slow
	// and expensive, but you should consider running
	// it before upgrading your version of PHP to a
	// new version that has backward compatibility
	// breaks.
	'backward_compatibility_checks' => false,

	// Run a quick version of checks that takes less
	// time at the cost of not running as thorough
	// an analysis. You should consider setting this
	// to true only when you wish you had more issues
	// to fix in your code base.
	'quick_mode' => true,

	// If enabled, check all methods that override a
	// parent method to make sure its signature is
	// compatible with the parent's. This check
	// can add quite a bit of time to the analysis.
	'analyze_signature_compatibility' => false,

	// The minimum severity level to report on. This can be
	// set to Issue::SEVERITY_LOW, Issue::SEVERITY_NORMAL or
	// Issue::SEVERITY_CRITICAL. Setting it to only
	// critical issues is a good place to start on a big
	// sloppy mature code base.
	'minimum_severity' => 10,

	// If true, missing properties will be created when
	// they are first seen. If false, we'll report an
	// error message if there is an attempt to write
	// to a class property that wasn't explicitly
	// defined.
	'allow_missing_properties' => true,

	// Allow null to be cast as any type and for any
	// type to be cast to null. Setting this to false
	// will cut down on false positives.
	'null_casts_as_any_type' => true,

	// Allow null to be cast as any array-like type (Requires 0.9.3+)
	// This is an incremental step in migrating away from null_casts_as_any_type.
	// If null_casts_as_any_type is true, this has no effect.
	'null_casts_as_array' => false,

	// Allow any array-like type to be cast to null. (Requires 0.9.3+)
	// This is an incremental step in migrating away from null_casts_as_any_type.
	// If null_casts_as_any_type is true, this has no effect.
	'array_casts_as_null' => false,

	// If enabled, scalars (int, float, bool, true, false, string, null)
	// are treated as if they can cast to each other.
	'scalar_implicit_cast' => true,

	// If this has entries, scalars (int, float, bool, true, false, string, null)
	// are allowed to perform the casts listed.
	// E.g. ['int' => ['float', 'string'], 'float' => ['int'], 'string' => ['int'], 'null' => ['string']]
	// allows casting null to a string, but not vice versa.
	// (subset of scalar_implicit_cast)
	// (Requires 0.9.3+)
	'scalar_implicit_partial' => [],

	// If true, seemingly undeclared variables in the global
	// scope will be ignored. This is useful for projects
	// with complicated cross-file globals that you have no
	// hope of fixing.
	'ignore_undeclared_variables_in_global_scope' => true,

	// Add any issue types (such as 'PhanUndeclaredMethod')
	// to this black-list to inhibit them from being reported.
	'suppress_issue_types' => [
		// 'PhanUndeclaredMethod',
	],

	// If empty, no filter against issues types will be applied.
	// If this white-list is non-empty, only issues within the list
	// will be emitted by Phan.
	'whitelist_issue_types' => [
		// 'PhanAccessMethodPrivate',
	],

	// A list of plugin files to execute
	'plugins' => [
		'build/.phan/plugins/SqlInjectionCheckerPlugin.php',
	],
];
