<?php

namespace remizmohammed\ComposerNonce;

class Index
{
	public function createNonceField()
	{
		return 123345656;
	}

	public function createNonceUrl($url, $postWithId, $nonceName = "my_nonce")
	{	
		$action = "";
		$field = "<input type='hidden' name='".$nonceName."' value='".wp_create_nonce( $action )."'>";
		return $field;
	}
}