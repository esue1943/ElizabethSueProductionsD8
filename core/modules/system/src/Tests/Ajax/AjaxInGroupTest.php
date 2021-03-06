<?php

/**
 * @file
 * Contains \Drupal\system\Tests\Ajax\AjaxInGroupTest.
 */

namespace Drupal\system\Tests\Ajax;

use Drupal\Core\Ajax\DataCommand;

/**
 * Tests that form elements in groups work correctly with AJAX.
 *
 * @group Ajax
 */
class AjaxInGroupTest extends AjaxTestBase {
  protected function setUp() {
    parent::setUp();

    $this->drupalLogin($this->drupalCreateUser(array('access content')));
  }

  /**
   * Submits forms with select and checkbox elements via Ajax.
   */
  function testSimpleAjaxFormValue() {
    $this->drupalGet('/ajax_forms_test_get_form');
    $this->assertText('Test group');
    $this->assertText('AJAX checkbox in a group');

    $this->drupalPostAjaxForm(NULL, ['checkbox_in_group' => TRUE], 'checkbox_in_group');
    $this->assertText('Test group');
    $this->assertText('AJAX checkbox in a group');
    $this->assertText('AJAX checkbox in a nested group');
    $this->assertText('Another AJAX checkbox in a nested group');
  }
}
