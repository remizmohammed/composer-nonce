<?php
/**
* Nonce class contains abstact methods which can be extends.
*/

namespace remizmohammed\ComposerNonce;

abstract class Nonce
{

	abstract protected function getNonceField( $action , $name, $referer , $echo  );
	abstract protected function getNonceUrl( $actionurl, $action, $name  );   

	/**
	 * Creates a cryptographic token tied to a specific action, user, user session,
	 * and window of time.
	 *
	 * @param string|int $action Scalar value to add context to the nonce.
	 * @return string The token.
	 */
	public function createNonce( $action = -1 ) {
		$user = wp_get_current_user();
		$uid  = (int) $user->ID;
		if ( ! $uid ) {
			/** This filter is documented in wp-includes/pluggable.php */
			$uid = apply_filters( 'nonce_user_logged_out', $uid, $action );
		}

		$token = wp_get_session_token();
		$i     = wp_nonce_tick();

		return substr( wp_hash( $i . '|' . $action . '|' . $uid . '|' . $token, 'nonce' ), -12, 10 );
	}

}	