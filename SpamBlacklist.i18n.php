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
	'spam-blacklist' => '
 # External URLs matching this list will be blocked when added to a page.
 # This list affects only this wiki; refer also to the global blacklist.
 # For documentation see http://www.mediawiki.org/wiki/Extension:SpamBlacklist
 #<!-- leave this line exactly as it is --> <pre> 
#
# Syntax is as follows: 
#   * Everything from a "#" character to the end of the line is a comment
#   * Every non-blank line is a regex fragment which will only match hosts inside URLs

 #</pre> <!-- leave this line exactly as it is -->',
	'spam-whitelist' => '
 #<!-- leave this line exactly as it is --> <pre> 
# External URLs matching this list will *not* be blocked even if they would
# have been blocked by blacklist entries.
#
# Syntax is as follows: 
#   * Everything from a "#" character to the end of the line is a comment
#   * Every non-blank line is a regex fragment which will only match hosts inside URLs

 #</pre> <!-- leave this line exactly as it is -->',
)

);

return $messages;
}
