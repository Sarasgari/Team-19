--TEST--
The right events are emitted in the right order for a test that runs code which triggers E_USER_DEPRECATED
--FILE--
<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = '--debug';
$_SERVER['argv'][] = __DIR__ . '/_files/DeprecatedFeatureTest.php';

require __DIR__ . '/../../bootstrap.php';

(new PHPUnit\TextUI\Application)->run($_SERVER['argv']);
--EXPECTF--
PHPUnit Started (PHPUnit %s using %s)
Test Runner Configured
Event Facade Sealed
Test Suite Loaded (2 tests)
Test Runner Started
Test Suite Sorted
Test Runner Execution Started (2 tests)
Test Suite Started (PHPUnit\TestFixture\Event\DeprecatedFeatureTest, 2 tests)
Test Preparation Started (PHPUnit\TestFixture\Event\DeprecatedFeatureTest::testDeprecatedFeature)
Test Prepared (PHPUnit\TestFixture\Event\DeprecatedFeatureTest::testDeprecatedFeature)
Test Triggered Deprecation (PHPUnit\TestFixture\Event\DeprecatedFeatureTest::testDeprecatedFeature, unknown if issue was triggered in first-party code or third-party code) in %s:%d
message
Test Triggered Deprecation (PHPUnit\TestFixture\Event\DeprecatedFeatureTest::testDeprecatedFeature, unknown if issue was triggered in first-party code or third-party code, suppressed using operator) in %s:%d
message
Test Passed (PHPUnit\TestFixture\Event\DeprecatedFeatureTest::testDeprecatedFeature)
Test Finished (PHPUnit\TestFixture\Event\DeprecatedFeatureTest::testDeprecatedFeature)
Test Preparation Started (PHPUnit\TestFixture\Event\DeprecatedFeatureTest::testDeprecatedSuppressedErrorGetLast)
Test Prepared (PHPUnit\TestFixture\Event\DeprecatedFeatureTest::testDeprecatedSuppressedErrorGetLast)
Test Triggered Deprecation (PHPUnit\TestFixture\Event\DeprecatedFeatureTest::testDeprecatedSuppressedErrorGetLast, unknown if issue was triggered in first-party code or third-party code, suppressed using operator) in %s:%d
message
Test Passed (PHPUnit\TestFixture\Event\DeprecatedFeatureTest::testDeprecatedSuppressedErrorGetLast)
Test Finished (PHPUnit\TestFixture\Event\DeprecatedFeatureTest::testDeprecatedSuppressedErrorGetLast)
Test Suite Finished (PHPUnit\TestFixture\Event\DeprecatedFeatureTest, 2 tests)
Test Runner Execution Finished
Test Runner Finished
PHPUnit Finished (Shell Exit Code: 0)
