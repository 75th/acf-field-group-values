<?php
/**
 * Class Get_All_Custom_Field_Meta_Test
 *
 * @package     TimJensen\ACF\Tests
 * @author      Tim Jensen <tim@timjensen.us>
 * @license     GNU General Public License 2.0+
 * @link        https://www.timjensen.us
 * @since       2.1.2
 */

namespace TimJensen\ACF\Tests;

/**
 * Class Get_All_Custom_Field_Meta_Test
 *
 * @package TimJensen\ACF\Tests
 */
class Get_All_Custom_Field_Meta_Test extends TestCase {

	/**
	 * Holds an instance of \TimJensen\ACF\Field_Group_Values.
	 *
	 * @var \TimJensen\ACF\Field_Group_Values
	 */
	protected $instance;

	/**
	 * Test setup
	 */
	public function setUp() {
		parent::setUp();

		$this->instance = new \TimJensen\ACF\Field_Group_Values( $this->post_id, $this->config, $this->clone_fields );
	}

	/**
	 * Test that the old config format (pre 2.0) throws a PHP warning but still returns correct values.
	 */
	public function test_old_config_format_returns_correct_values() {
		$this->expectException( \PHPUnit\Framework\Error\Warning::class );

		$this->assertEquals(
			get_all_custom_field_meta( $this->post_id, $this->config, $this->clone_fields ),
			get_all_custom_field_meta( $this->post_id, $this->config['fields'], $this->clone_fields )
		);
	}

	/**
	 * Test that the convenience function get_all_custom_field_meta returns the same result as calling
	 * the class directly.
	 */
	public function test_function_and_class_return_same_result() {
		$this->assertEquals(
			$this->instance->get_results(),
			get_all_custom_field_meta( $this->post_id, $this->config, $this->clone_fields )
		);
	}
}
