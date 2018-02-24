<?php
/**
 * Class Field_Group_Values_Test
 *
 * @package     TimJensen\ACF\Tests
 * @author      Tim Jensen <tim@timjensen.us>
 * @license     GNU General Public License 2.0+
 * @link        https://www.timjensen.us
 * @since       2.1.2
 */

namespace TimJensen\ACF\Tests;

use TimJensen\ACF\Field_Group_Values;

/**
 * Class Field_Group_Values_Test
 *
 * @package TimJensen\ACF\Tests
 */
class Field_Group_Values_Test extends TestCase {

	/**
	 * Holds an instance of Field_Group_Values.
	 *
	 * @var Field_Group_Values
	 */
	protected $instance;

	/**
	 * ACF group field config
	 *
	 * @var array
	 */
	protected $group_field;

	/**
	 * ACF repeater field config
	 *
	 * @var array
	 */
	protected $repeater_field;

	/**
	 * ACF flexible content field config
	 *
	 * @var array
	 */
	protected $flexcontent_field;

	/**
	 * ACF clone field config
	 *
	 * @var array
	 */
	protected $clone_field;

	/**
	 * Test setup
	 */
	public function setUp() {
		parent::setUp();

		$this->instance = new Field_Group_Values(
			$this->post_id,
			$this->config,
			$this->clone_fields
		);

		$this->group_field       = $this->config['fields'][0];
		$this->repeater_field    = $this->config['fields'][1];
		$this->flexcontent_field = $this->config['fields'][2];
		$this->clone_field       = $this->config['fields'][3];
	}

	/**
	 * Tests get_all_field_group_values().
	 */
	public function test_get_all_field_group_values() {
		$this->instance->get_all_field_group_values( $this->instance->config );

		$expected_keys = [
			'group',
			'repeater',
			'flexcontent',
			'clone',
		];

		array_walk( $expected_keys, function( $expected_key ) {
			$this->assertArrayHasKey( $expected_key, $this->instance->results );
		} );
	}

	/**
	 * Tests get_flexible_content_field_values().
	 */
	public function test_get_flexible_content_field_values() {

	}

	/**
	 * Tests get_clone_field_values().
	 */
	public function test_get_clone_field_values() {

	}

	/**
	 * Tests get_clone_field_config().
	 */
	public function test_get_clone_field_config() {

	}

	/**
	 * Tests get_group_field_values().
	 */
	public function test_get_group_field_values() {
		$this->assertArrayNotHasKey( $this->group_field['name'], $this->instance->results );

		$this->get_protected_method_result( [
			$this->group_field,
			'',
			'',
		] );

		$this->assertArrayHasKey( $this->group_field['name'], $this->instance->results );
	}

	/**
	 * Tests get_repeater_field_values().
	 */
	public function test_get_repeater_field_values() {
		$this->assertArrayNotHasKey( $this->repeater_field['name'], $this->instance->results );

		$this->get_protected_method_result( [
			$this->repeater_field,
			'',
			1,
		] );

		$this->assertArrayHasKey( $this->repeater_field['name'], $this->instance->results );
	}

	/**
	 * Tests get_results().
	 */
	public function test_get_results() {

	}
}
