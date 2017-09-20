<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'WPC_Subtotal_Ex_Discount_Condition' ) ) {

	class WPC_Subtotal_Ex_Discount_Condition extends WPC_Condition {

		public function __construct() {
			$this->name        = __( 'Subtotal ex. discounts', 'wpc-conditions' );
			$this->slug        = __( 'subtotal_ex_discount', 'wpc-conditions' );
			$this->group       = __( 'Cart', 'wpc-conditions' );
			$this->description = __( 'Compared against the order subtotal excluding discounts', 'wpc-conditions' );

			parent::__construct();
		}

		public function get_value( $value ) {
			return str_replace( ',', '.', $value );
		}

		public function get_compare_value() {
			$subtotal = WC()->cart->subtotal;
			$discount = WC()->cart->get_cart_discount_total();
			return  $subtotal - $discount;
		}

	}

}