<?php
/**
 * Internationalisation file for SpamBlacklist extension.
 *
 * @addtogroup Extensions
*/

/**
 * Prepare extension messages
 *
 * @return array
 */
function efSpamBlacklistMessages() {
	$messages = array(

'en' => array(
	'spam-whitelist' => '
 #<!-- leave this line exactly as it is --> <pre> 
# Syntax is as follows: 
#   * Everything from a "#" character to the end of the line is a comment
#   * Every non-blank line is a regex fragment which will only match hosts inside URLs

 #</pre> <!-- leave this line exactly as it is -->',
)

);

return $messages;
}
