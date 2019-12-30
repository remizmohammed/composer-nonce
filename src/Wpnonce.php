<?php
/**
* WPnonce contains properties and methods of wordpress wp_nonce functions.
*/

namespace remizmohammed\ComposerNonce;

use remizmohammed\ComposerNonce\Nonce;

class Wpnonce extends Nonce
{

	/**
	 * Returns wordpress nonce hidden field to use as security token for forms.
	 * @param int|string action name, optional parameter,Default value = -1
	 * @param string nonce field name, optional parameter,Default value = _wpnonce
	 * @param boolean Whether to set referer field, optional parameter,Default value = true
	 * @param boolean Whether to return hidden field, optional parameter,Default value = true
	 */
	public function getNonceField( $action = -1, $name = '_wpnonce', $referer = true, $echo = true ) 
	{
		$name        = esc_attr( $name );
		$nonce_field = '<input type="hidden" id="' . $name . '" name="' . $name . '" value="' . $this->createNonce( $action ) . '" />';

		if ( $referer ) {
			$nonce_field .= wp_referer_field( false );
		}

		if ( $echo ) {
			echo $nonce_field;
		}

		return $nonce_field;
	}

	/**
	 * Retrieve URL with nonce added to URL query.
	 * @param string     $actionurl URL to add nonce action.
	 * @param int|string $action    Optional. Nonce action name. Default -1.
	 * @param string     $name      Optional. Nonce name. Default '_wpnonce'.
	 * @return string Escaped URL with nonce action added.
	 */
	public function getNonceUrl( $actionurl, $action = -1, $name = '_wpnonce' ) 
	{
		$actionurl = str_replace( '&amp;', '&', $actionurl );
		return esc_html( add_query_arg( $name, $this->createNonce( $action ), $actionurl ) );
	}
}