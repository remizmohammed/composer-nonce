# composer-nonce
This is a Custom Composer package which mirror the functionality of wordpress core wp_nonce_* methods.

To use this package in your composer project,

type below command at root directory,

```
composer require remizmohammed/composer-nonce "@dev"
```
Please note: Since this package uses wordpress functions,it works in composer wordpress installations only. We are updating this package to work in isolations.

To call nonce functions from your theme, try below example.

To get nonce field in form,
```
use remizmohammed\ComposerNonce\Wpnonce;
$nonce = new Wpnonce();
$nonce->getNonceField();
```
this returns hidden nonce field with default field name and refere field.
you can pass parameters similar to the wp_nonce_field( );

To get nonce in URL.
```
use remizmohammed\ComposerNonce\Wpnonce;
$nonce = new Wpnonce();
$nonce->getNonceUrl( $actionurl );
```
this returns the url with nonce field appended to the URL.