<?php
/**
 * Plugin Name: Members: Unfiltered HTML capability
 * Description: This mu-plugin allows you to add the `unfiltered_html` capability to a role in a multisite install.
 * Version:     1.0.0
 * Author:      required
 * Author URI:  https://required.com/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * This is a mu-plugin because the Members plugin doesn't use the `plugins_loaded` action.
 *
 * @package MembersUnfilteredHtml
 */

namespace Required\MembersUnfilteredHtml;

// Do nothing if unfiltered HTML is explicitly disallowed.
if ( defined( 'DISALLOW_UNFILTERED_HTML' ) && DISALLOW_UNFILTERED_HTML ) {
	return;
}

// Disables the default hidden caps filter.
add_filter( 'members_remove_hidden_caps', '__return_false' );

/**
 * Removes all hidden capabilities excluding the 'unfiltered_html' capability.
 *
 * @see members_remove_hidden_caps()
 *
 * @param array $caps Array of hidden capabilities.
 * @return array Array of hidden capabilities without 'unfiltered_html'.
 */
function remove_hidden_caps( $caps ) {
	$hidden_caps = members_get_hidden_caps();

	// Remove 'unfiltered_html' capability.
	$key = array_search( 'unfiltered_html', $hidden_caps );
	if ( $key ) {
		unset( $hidden_caps[ $key ] );
	}

	return array_diff( $caps, $hidden_caps );
}
add_filter( 'members_get_capabilities', __NAMESPACE__ . '\remove_hidden_caps' );

/**
 * Adds the 'unfiltered_html' capability back to the capabilities.
 *
 * 'unfiltered_html' gets removed if DISALLOW_UNFILTERED_HTML is defined or if
 * the current user is not a super admin in a multisite install.
 *
 * @param array  $caps User's actual capabilities.
 * @param string $cap  Capability name.
 * @return array Actual capabilities for meta capability.
 */
function add_unfiltered_html_cap( $caps, $cap ) {
	if ( 'unfiltered_html' === $cap ) {
		unset( $caps );
		$caps[] = $cap;
	}

	return $caps;
}
add_filter( 'map_meta_cap', __NAMESPACE__ . '\add_unfiltered_html_cap', 10, 2 );
