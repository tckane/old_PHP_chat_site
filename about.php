<?php



$ses = $_GET["ses"];


if ($ses != "")
{
include('./scripts/ses.php');
}
include('./scripts/header.php');
include('./scripts/session.php');
include('./scripts/config.php');
include('./scripts/functions.php');
include('./scripts/main.php');



if ($act == "about")
{

if ($bwmode == "off") $subtite = "<img src=\"../scripts/phoenix.php?string=$sitename%20Help&amp;login=$login\" alt=\"$sitename Help\" />";
else $subtite = "<b><big>$sitename Help</big></b>";



echo "<p class=\"break\">$subtite$inboxes</p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Everything you need to know about $sitename.</big></b></p>
<p class=\"breakforum\" style=\"text-align: center;\">";

if ($group < 3) echo"<b><big>$hyl <a href=\"./about.php?ses=$ses&amp;act=admin\">Administration Help</a> $hyl</big></b><br/>";

echo"<b><big>$hyl <a href=\"./about.php?ses=$ses&amp;act=rules\">Community Rules</a> $hyl</big></b><br/>";
echo "<b><big>$hyl <a href=\"./chat/index.php?ses=$ses&amp;act=about\">Chat</a>$hyl</big></b><br/>
<b><big>$hyl <a href=\"./forum/forums.php?ses=$ses&amp;act=about\">Message Boards</a>$hyl</big></b><br/>
<b><big>$hyl <a href=\"./blog/viewer.php?ses=$ses&amp;act=about\">Blogs</a>$hyl</big></b><br/>
<b><big>$hyl <a href=\"./about.php?ses=$ses&amp;act=currency\">Level, Score &amp; Credits</a>$hyl</big></b><br/>
<b><big>$hyl <a href=\"./friends/index.php?ses=$ses&amp;act=about\">Friends List</a>$hyl</big></b><br/>
<b><big>$hyl <a href=\"./imgstor/index.php?ses=$ses&amp;act=about\">Photo Albums</a>$hyl</big></b><br/>
<b><big>$hyl <a href=\"./mail/index.php?ses=$ses&amp;act=about\">Mailbox</a>$hyl</big></b><br/>
<b><big>$hyl <a href=\"./gallery.php?ses=$ses&amp;act=about\">Members Gallery</a>$hyl</big></b><br/>
<b><big>$hyl <a href=\"./extras/sicn.php?ses=$ses\">Icon List</a>$hyl</big></b><br/>
<b><big>$hyl <a href=\"./extras/lettercodes.php?ses=$ses\">Letter Icons</a>$hyl</big></b><br/>
<b><big>$hyl <a href=\"./forum/formatting.php?ses=$ses&amp;act=about\">BB Code$hyl</big></b></p><p class=\"break\">
    $hyback <a href=\"./mainmenu.php?ses=$ses\">back</a></p></body></html>";
exit;

}





if ($act == "rules")
{

if ($bwmode == "off") $subtite = "<img src=\"../scripts/phoenix.php?string=Community%20Rules&amp;login=$login\" alt=\"$sitename Help\" />";
else $subtite = "<b><big>Community Rules</big></b>";

echo "<p class=\"break\" style=\"text-align: center;\">
$subtite$inboxes</p>
<p class=\"breakforum\">
<b>1 &#8226; You must not harass other users of this site, this includes but is not limited to:</b><br/>
--<i>Persistant unwanted contact.</i><br/>
--<i>Posting of user's personal details.</i><br/>
--<i>Repeated registration of new usernames so as to bypass the ignore feature.</i><br/><br/>

<b>2 &#8226; You must not flood the database, this can include:</b><br/>
--<i>Sending many of the same message to the same user.</i><br/>
--<i>Posting the same topic repeatedly.</i><br/>
--<i>Registering lots of names when you really don't need them.</i><br/><br/>

<b>3 &#8226; Do not hack the site, this means:</b><br/>
--<i>Do not post links to a php/asp etc web page with the intention of snarfing a user's Session ID so as to login as that user.</i><br/>
--<i>Do not bookmark verious pages on the site and edit them trying to find 'admin tools' and such like, this is not big or clever and it doesn't work here.</i><br/>
--<i>Do not send us a DDoS attack, we really don't need it.</i><br/><br/>

<b>4 &#8226; You must not use this site to break any laws, examples are:</b><br/>
--<i>Uploading illegal pornography such as underage or animal sex.</i><br/>
--<i>Breaching copyright by uploading protected music, images or films.</i><br/>
--<i>Using the site to organise controversial protests, terrorist attacks, paedophile rings or other crime syndicates.</i></p>

<p class=\"breakforum\" style=\"text-align: center;\">
<b>That's it really.<br/>You play nice and we play nice.<br/>You play dirty, you get deleted.</b><br/>
<i>if you have questions or need help with any aspect of $sitename, feel free to send a message to <a href=\"./mail/index.php?ses=$ses&amp;senduser=$PHNAME&amp;act=presetuser\">$PHNAME</a>.</i>

</p><p class=\"break\">
    $hyback <a href=\"./mainmenu.php?ses=$ses\">back</a></p></body></html>";
exit;


}





if ($act == "admin")
{

$subtite = "<img src=\"../scripts/phoenix.php?string=Administration%20Help&amp;login=$login\" alt=\"Administration Help\" />";
echo "<p class=\"break\" style=\"text-align: center;\">
$subtite$inboxes</p>
<p class=\"breakforum\" style=\"text-align: center;\"><small><a href=\"./about.php?ses=$ses&amp;act=about\">help menu</a></small></p>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Everything you need to know about administration.</big></b></p>
<p class=\"breakforum\">
<big><u><b>Admin Option Locations</b></u></big> - The main location for these is on a user's profile. If you click on a user's name their profile appears, directly below their name is the &quot;dropdown&quot; that you'll see mentioned, this is a list similar to the Shortcuts menu with a Go button, this list contains options relevent to that user and as such, all actions performed here will only affect that user.<br/>
A secondary set of administration options is located within Options &amp; Settings while feature-specific options reside within that feature, these are as follows:<br/>
- <b>Shoutbox</b> [clean shoutbox]<br/>
- <b>Chat</b> [clean chat]<br/>
- <b>file exchanger</b> [delete file]<br/>
- <b>message boards</b> [move topic, lock topic, make topic sticky, delete topic]<br/><br/>

<big><u><b>&quot;Dropdown&quot; Options</b></u></big> - The options available on the dropdown (as mentioned above) are as follows:<br/>
- <b>Boot User</b> [ends a user's current session, user has to login again, used as a warning]<br/>
- <b>Impose Ban</b> [stops a user being able to use their account]<br/>
- <b>Lift Ban</b> [undoes the above action, only appears if user is banned]<br/>
- <b>Score &amp; Credits</b> [this can be used to edit a user's credits and their score, can be used to penalise cheaters or reward a good deed, such as inviting all their friends off another site or finding and reporting bugs]
- <b>Restrict User</b> [disallows access to chat, forums, shoutbox, profiles &amp; friends lists.<br/>
- <b>Lift Restriction</b> [undoes above action, only appears if user is restricted]<br/>
- <b>Promote To Admin</b> [makes the user admin, only appears to administrators with 'higher' status]<br/>
- <b>Demote To User</b> [undoes above action, only appears if user is currently admin, again, 'higher' status is required to perform this function]<br/>
- <b>Wash User</b> [this removes everything the user has ever done on $sitename including all textual insertions to the database &amp; any photographs uploaded, only appears to administrators with 'higher' status]<br/>
- <b>Login As User</b> [this allows you to access the user account, this should only be used for testing purposes, available only to 'higher' admins]<br/>
- <b>Delete User</b> [this does everything 'wash' does and also removes the user account, should only be used to clear dead accounts, only available to 'higher' admin]<br/><br/>

<big><u><b>Administration in 'Options &amp; Settings'</b></u></big> - The options available this menu are as follows:<br/>
- <b>Banned Users</b> [a list of currently banned users]<br/>
- <b>Add &amp; Delete Site Icons</b> [does exactly what it says on the tin, please keep them small (phone friendly) and only use .gif images]<br/>
- <b>Mail All Members</b> [this will send the specified mail message to every single member]<br/>
- <b>Members List</b> [a comprehensive list of all members]<br/>
- <b>Front Page Message</b> [edits the message text shown on the front page]<br/><br/>

<big><u><b>Higher Administration</b></u></big> - This appears in 'Options &amp; Settings' just below 'Administration'. The options available this menu are as follows:<br/>
- <b>Signup</b> [controls the flow of new users, you can allow unhindered access (open), require email verification(email) or close signup completely (closed)]<br/>
- <b>Interval</b> [control how long users appear 'online' after becoming idle, default is 15 minutes]<br/>
- <b>Delete Users</b> [a list of users with the option to delete them, does not include administrators]<br/>
- <b>Change A Username</b> [can be used to change a member's login name, this will also rename all of their content &amp; photographs but it will NOT change their email address if they have set one up with us, this means that if you change a name from BobTheBlob to ClungeAmbler, his email address will remain bobtheblob@$sitename.co.uk - if you change a name, please post it in the Administration Forum]<br/>
- <b>Add/Edit/Delete Forums/Categories</b> [these options can be used to rearrange the message boards, add new ones, edit their names and delete them. This system is still in it's infancy, before the forums were hard coded, as a 'beta' product it is not without it's flaws, currently you cannot use foreight characters (russian text etc) and you cannot change the Running Order (move forums up or down on the list)<br/>
- <b>Add/Delete Member Titles</b> [here you can set the member titles below user's names when they reach a certain Score, you can also set the required score for each title. do NOT set the same score for multiple titles or add duplicates]<br/><br/>


<big><u><b>Eligibility</b></u></big> - An 'eligible' user is a user whom administration tasks can be performed upon, this is all users except those with 'higher' status, so any administrators without 'higher' status can also be modified. Normal users do not get 'higher' status and it can only be added to an administrator's account by $PHNAME. Two administrators with 'higher' status cannot affect each other.<br/><br/>


<big><u><b>Administration Forum</b></u></big> - This appears in the message boards, you should post all ban notifications here, if you need help, post it here, anything to do with the running of the site that you think doesn't fit in 'This Site' category, then it goes in here.<br/><br/>



<big><u><b>Logging, Mail Shadow Copy &amp; The Protection Of Children</b></u></big> - Everything an administrator does is recorded in the 'zero log', most 'normal user' actions are logged here aswell such as photo uploads, mail messages, successful logins unsuccessful logins &amp; password reminder requests. In addition to this, a Shadow Copy of the entire private mail system is kept alongside the original, the Shadow Copy cannot be edited or deleted by anyone.<br/>
These logs are kept by me for a number of reasons, i'll explain with a few simple scenarios:<br/>
- A number of users have been banned, the admin responsibe denies doing so but his name is all over it - a quick look in the log clearly shows two different IP addresses and two different mobile phones, turns out the Admin used a weak password.<br/>
- An admin has gone rogue and is deleting users left and right, the log hits a certain number of entries and alerts me, the admin inquestion is deleted and a database backup is restored.<br/>
- I am contacted by police in regards to a missing person, the last accessed address in their phone was $sitename, i am able to hand over the entire log and shadow copy with minimal fuss.<br/>
- A sick individual is uploading child porn or attempting to groom children for sex, i'm able to garner his IP address and other details and put in a phone call to the police.<br/><br/>


<big><u><b>Administration Expectations</b></u></big> - As an administrator of $sitename you are expected to conduct yourself with a certain level of decorum; you do not start fights, you defuse them. you try to help users, not ridicule them. you check the admin forum once in a while, try to spam if you have time, use a good password &amp; if you spot a bug, let me know, even if you think i'm having a bad day, i don't bite heads off, they taste awful.<br/><br/>



</p><hr/><p class=\"break\">
    $hyback <a href=\"index.php?ses=$ses&amp;user=$user\">back</a><br/>
    $hyback <a href=\"../mainmenu.php?ses=$ses\">main menu</a></p></body></html>";
exit;


}












if ($act == "changelog")
{

echo "<p class=\"break\"><b><big>History of $sitename</big></b></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>$sitename history &amp; changelog.</big></b></p>
<p class=\"breakforum\">
<b>October 28th 2010</b> - <i>A 'Score &amp; Rank' system was added, users acrue points by chatting, sending mail, posting topics and by other means; a corresponding 'league table' was added, this replaces the now removed 'extras' menu.</i><br/><br/>
<b>October 27th 2010</b> - <i>Some new icons &amp; a new logo were created. Extras menu was removed - 'dating', 'quiz' and the 'hangman' game are no longer available. Replaced with the 'user rank' system.</i><br/><br/>
<b>October 26th 2010</b> - <i>Friends list fixed and improved - new requests are now delivered via the 'updates' system.</i><br/><br/>
<b>October 25th 2010</b> - <i>Shortcuts improved - now fully scalable & more evenly distributed.</i><br/><br/>
<b>September 15th 2010</b> - <i>Chat completed - users can now create their own private or public rooms as well as use publically available rooms & invite others to chat via pop message.</i><br/><br/>
<b>September 12th 2010</b> - <i>Members Gallery was augmented with a filter '[show only female] [show only male]'.</i><br/><br/>
<b>September 6th 2010</b> - <i>Cookie based login removed due to compatibility issues, will maybe reintroduce it when ALL mobile phone browsers handle cookies properly.</i><br/><br/>
<b>August 15th 2010</b> - <i>The site was badly and repeatedly hacked by people claiming to be from 'zeewap.net', SQL injections and XSS (cross site scripting) was used in the attacks (cookies played no part).
 This has been mitigated by a new 'cleaner' script i have created, all user submitted data is now scrubbed upon submission.</i><br/><br/>
<b>July 22nd 2010</b> - <i>Cookie based login introduced - this should improve security and the overall speediness of the site in general.</i><br/><br/>
<b>May 4th 2010</b> - <i>Users can now link to topics in the forum and are able to get updates on topics they're interested in.</i><br/><br/>
<b>May 2nd 2010</b> - <i>Main menu redisigned, users now get more info in one place without having to dig for it.</i><br/><br/>
<b>April 20th 2010</b> - <i>Taking a break from updating the site during moving house and trying to get a new internet connection set up.</i><br/><br/>
<b>April 17th 2010</b> - <i>Minor bug fixes before moving house, option to backup database with mobile phone added to keep user data safe.</i><br/><br/>
<b>April 15th 2010</b> - <i>Search function added to File Exchanger, files are now easier to find.</i><br/><br/>
<b>April 12th 2010</b> - <i>MP3 ID Tags now utilised in File Exchanger; Artist, Album Title, Cover Art, Track Title, Song Length in minutes and Audio Quality in kbps now displayed with all music tracks for ease of use and asthetic appeal.</i><br/><br/>
<b>April 9th 2010</b> - <i>Banner Exchange system launched, site owners can now advertise their site free of charge. Wap Search directory updated.</i><br/><br/>
<b>April 5th 2010</b> - <i>User validation option removed, replaced with Email Verification whereby user must click link to activate account - better.</i><br/><br/>
<b>March 30th 2010</b> - <i>Option to link to blogs from forums, messages etc added, 4 new themes added.</i><br/><br/>
<b>March 21st 2010</b> - <i>Option to remove one's self from Members Gallery added.</i><br/><br/>
<b>March 20th 2010</b> - <i>Help Menu updated to add new features' topics &amp; Members Gallery created.</i><br/><br/>
<b>March 14th 2010</b> - <i>Profiles redisigned cosmetically.</i><br/><br/>
<b>March 11th 2010</b> - <i>Pop Messages created, users can now send instant messages to other members anywhere on the site, the option to turn this off or restrict to just friends was also added.</i><br/><br/>
<b>March 6th 2010</b> - <i>Shortcuts added for ease of navigation as requested by a member.</i><br/><br/>
<b>March 5th 2010</b> - <i>Users now have free email@phoenixchat.co.uk addresses, with attachments supported. Email client is in Beta stage.</i><br/><br/>
<b>March 4th 2010</b> - <i>Added option for users to edit or delete their own posts in the forums.</i><br/><br/>
<b>March 2nd 2010</b> - <i>User 'ID Cards' created for profiles, users can link to these externally via url or internally via Forum Link codes.</i><br/><br/>
<b>March 1st 2010</b> - <i>Created 'Help' section for users to find out how things work.</i><br/><br/>
<b>February 29th 2010</b> - <i>Added 'advanced' option for posting messages so as to remove 'upload' and 'smilies' boxes unless users want them.</i><br/><br/>
<b>February 21st 2010</b> - <i>Site officially reopened, spamming ensues, recieved threats from other site owners who are unhappy with my return.</i><br/><br/>
<b>February 19th 2010</b> - <i>Uploaded site onto the internet for final testing, fixed header redirect issue for login.</i><br/><br/>
<b>February 14th 2010</b> - <i>Added 'header redirect' to forums, messaging, blogs etc to make site faster to use and to tackle forum flooding by bad users.</i><br/><br/>
<b>February 11th 2010</b> - <i>Improved user 'ignore' feature, improved loading speeds sitewide, redesigned 'options' with seperate headings for ease of use, added function for users to link to photos in forums as well as upload photos directly into forums, messages, blogs etc.</i><br/><br/>
<b>February 8rd 2010</b> - <i>Made blogs better, added more functions to Profiles such as blogs, photos, friends and the option for users to turn off seperate features or disable the whole profile.</i><br/><br/>
<b>February 7th 2010</b> - <i>Redesigned layout of site, made colour schemes more modern and fixed user selectable themes, added user's profile pictures to friends list and online list, redesigned forums and removed back/next links and replaced with numerical page links.</i><br/><br/>
<b>February 5th 2010</b> - <i>Added user's 'photo albums', repaired lots of errors left during wml/html conversion, fixed error caused by switching off 'register globals'.</i><br/><br/>
<b>February 3rd 2010</b> - <i>Removed user forums, nokia logo maker (now redundant) image editor, dct3 &amp; 4 unlocker and other useless things, stripped site back to bare bones.</i><br/><br/>
<b>February 2nd 2010</b> - <i>Unzipped the old site to bring it back to life, set up hosting, repurchased domain 'phoenixchat.co.uk' and went looking for old administrators.</i><br/><br/>

<b>[break]</b><br/><br/>
<b>January 12th 2006</b> - <i>Site closed completely due to the fact that i'd had a new baby to look after and some ongoing issues with troublesome users.</i><br/><br/>
<b>December 9th 2005</b> - <i>User Validation added to keep out troublesome users, this impacted on the site's userbase, effectively killing it.</i><br/><br/>
<b>October 8th 2005</b> - <i>Security issues in profiles admin options plugged, phantom (blank) user issue plugged.</i><br/><br/>
<b>September 28th 2005</b> - <i>Copy of WML site sold to 'betoken.co.uk' for &#163;40.</i><br/><br/>
<b>July 22nd 2005</b> - <i>Free to edit and distribute version of Phoenixchat created and made available, uploaded to sourceforge and various free scripts sites.</i><br/><br/>
<b>May 12th 2005</b> - <i>WapSearch directory added, uploader, nokia logo maker, dct3 &amp; 4 unlocker added, image editor added.</i><br/><br/>
<b>April 5th 2005</b> - <i>'WaaWaamp.co.uk' closed, reopened as 'Phoenixchat.co.uk', site rebranded and colour schemes changed.</i><br/><br/>
<b>March 29th 2005</b> - <i>Site converted to xHTML from WML, WML site kept for older phones.</i><br/><br/>
<b>January 19th 2005</b> - <i>'Formatting Codes' updated and renamed to 'BB Code'</i><br/><br/>
<b>January 7th 2005</b> - <i>'user forums' feature added, 'ignore users' feature added, administration options moved to profiles, 'avatar' setting removed, TMAX and PMAX settings for topics and replies per page merged into one setting 'max items per page'</i><br/><br/>
<b>November 27th 2004</b> - <i>Friends List added, 'user icons' feature removed.</i><br/><br/>
<b>November 1st 2004</b> - <i>Minor changes made to the script, site renamed to 'WaaWaamp.co.uk' and launched.</i><br/><br/>
<b>October 16th 2004</b> - <i>WML script for 'distortedmind.net' given to me by MGBen (aka Ben Jones) because he had a baby on the way and just didn't have time for it anymore.</i><br/><br/>



</p><hr/><p class=\"break\">
    $hyback <a href=\"./index.php?ses=$ses\">back</a></p></body></html>";
exit;
}









if ($act == "credits")
{

echo "<p class=\"break\"><b><big>Thank Yous</big></b></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>Massive thanks to the following people.</big></b></p>
<p class=\"breakforum\">

<b>Ben Jones</b> - <i>This fella gave me the original script, distortedmind.net, it was in wml and it was pretty basic but without it, this site would never have come into existance, he's a bit of a god botherer but i owe most of my knowledge of PHP &amp; mySQL to him.</i><br/><br/>

<b>Nikki Jones</b> - <i>One of our administrators, she's been keeping order on $sitename since 2004.</i><br/><br/>

<b>Grant aka Miffy</b> - <i>Another of our administrators, he's still kickin' about somewhere...</i><br/><br/>

<b>Wayne Klowde</b> - <i>Another of our administrators, he kept order between 2004 and 2006.</i><br/><br/>

<b>Phoenixx</b> - <i>Another of our administrators, he brings people in and brings to my attention all manner of errors and issues that i'd never have spotted on my own.</i><br/><br/>

<b>Wap Weirdos</b> - <i>Various hackers, wannabe hackers and troublemakers - without them we wouldn't have some of the best security and anti-flood systems on wap.</i><br/><br/>

<b>Wapoc</b> - <i>The &quot;constructive criticism&quot; of the users of wapoc stopped us befalling to the same fate as every other site on wap - Bandwidth destroying animated gif explosion (where you end up scrolling down a massive page of images just to get to the meat and potatoes of a wap site).</i><br/><br/>

<b><a href=\"http://thelandbeforetime.org\">TheLandBeforeTime.org</a></b> - <i>For allowing us to use their icons and being really nice about it.</i><br/><br/>

<b>Anyone who links to us</b> - <i>This includes all the sites who use our Banner Exchange and WapSearch Directory.</i><br/><br/>



<b>Left Anyone Out?</b> - <i><a href=\"./sendmail.php\">let us know!</a></i>


</p><hr/><p class=\"break\">
    $hyback <a href=\"./index.php?ses=$ses\">back</a></p></body></html>";
exit;
}













if ($act == "currency")
{

$titlex = urlencode("Level, Score & Credits");

$scorecreditsimg = urlencode("Score & Credits");



echo "<p class=\"break\"><img src=\"./scripts/phoenix.php?string=$titlex&amp;login=$login\"/></p><hr/>
<p class=\"breakforum\" style=\"text-align: center;\"><b><big>What are these things?<br/>What do they mean?</big></b></p>
<p class=\"breakforum\">
<b>Level</b> - This is determined by your Score, it is a representation of how long you've been a member and how much you have contributed to the community as a whole.<br/><br/>
<b>Score</b> - Almost everything you do on $sitename earns you points, these points go towards your level, think of it like the 'experience points' you get when playing a roleplaying game, the more points you get, the higher your level.<br/><br/>
<b>Credits</b> - Actions that earn you points, also earn you credits. These credits can be used to purchase items on the site, for now the credits aren't really worth a whole lot as this system is still new and under construction but soon you'll be able to spend your credits on various new features and other things.</p>
<p class=\"break\"><img src=\"./scripts/phoenix.php?string=$scorecreditsimg&amp;login=$login\"/></p>
<p class=\"breakforum\" style=\"text-align: center;\"><b>Your score is the same as a score you'd get playing a game, like Sonic the hedgehog, everything you do will earn you points, these vary depending on the action.<br/>
For every action you will also earn credits, these are like digital money if you like. Below is a list of actions and what each action earns you.</b></p>





<p class=\"break\" style=\"text-align: center;\"><img src=\"./scripts/phoenix.php?string=Message%20Boards&amp;login=$login\"/></p>


<table class=\"breakforum\" style=\"width: 100%;\">
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>New Topic</b></small></td><td style=\"width: 50%;\"><small>10 Points &amp; 5 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>Reply</b></small></td><td style=\"width: 50%;\"><small>5 Points &amp; 3 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>New Poll</b></small></td><td style=\"width: 50%;\"><small>10 Points &amp; 5 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>Vote</b></small></td><td style=\"width: 50%;\"><small>5 Points &amp; 3 Credits..</small></td></tr>
</table>


<p class=\"break\" style=\"text-align: center;\"><img src=\"./scripts/phoenix.php?string=Chat&amp;login=$login\"/></p>


<table class=\"breakforum\" style=\"width: 100%;\">
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>Message</b></small></td><td style=\"width: 50%;\"><small>10 Points &amp; 5 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>Invite</b></small></td><td style=\"width: 50%;\"><small>10 Points &amp; 5 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>New Room</b></small></td><td style=\"width: 50%;\"><small>15 Points &amp; 7 Credits.</small></td></tr>
</table>



<p class=\"break\" style=\"text-align: center;\"><img src=\"./scripts/phoenix.php?string=Mailbox&amp;login=$login\"/></p>

<table class=\"breakforum\" style=\"width: 100%;\">
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>Read Mail</b></small></td><td style=\"width: 50%;\"><small>4 Points &amp; 2 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>Send Mail</b></small></td><td style=\"width: 50%;\"><small>10 Points &amp; 5 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>Send Email</b></small></td><td style=\"width: 50%;\"><small>15 Points &amp; 7 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>Send POP</b></small></td><td style=\"width: 50%;\"><small>10 Points &amp; 5 Credits.</small></td></tr>
</table>


<p class=\"break\" style=\"text-align: center;\"><img src=\"./scripts/phoenix.php?string=Everything%20Else&amp;login=$login\"/></p>

<table class=\"breakforum\" style=\"width: 100%;\">
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>New Blog</b></small></td><td style=\"width: 50%;\"><small>10 Points &amp; 5 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>New Photo Upload</b></small></td><td style=\"width: 50%;\"><small>20 Points &amp; 10 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>New File Upload</b></small></td><td style=\"width: 50%;\"><small>10 Points &amp; 5 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>First Ever Visit</b></small></td><td style=\"width: 50%;\"><small>40 Points &amp; 20 Credits</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>Daily Login Bonus</b></small></td><td style=\"width: 50%;\"><small>4 Points &amp; 2 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>100 Visits To Your Profile</b></small></td><td style=\"width: 50%;\"><small>100 Points &amp; 50 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>500 Visits To Your Profile</b></small></td><td style=\"width: 50%;\"><small>250 Points &amp; 125 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>1000 Visits To Your Profile</b></small></td><td style=\"width: 50%;\"><small>500 Points &amp; 250 Credits.</small></td></tr>

<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>10 Gifts On Your Profile</b></small></td><td style=\"width: 50%;\"><small>100 Points &amp; 50 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>20 Gifts On Your Profile</b></small></td><td style=\"width: 50%;\"><small>300 Points &amp; 150 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>30 Gifts On Your Profile</b></small></td><td style=\"width: 50%;\"><small>400 Points &amp; 200 Credits.</small></td></tr>
<tr style=\"text-align: left;\"><td style=\"width: 50%;\"><small><b>40 Gifts On Your Profile</b></small></td><td style=\"width: 50%;\"><small>500 Points &amp; 250 Credits.</small></td></tr>
</table>





<p class=\"breakforum\" style=\"text-align: center;\"><b>Any user caught cheating will lost ALL of his points AND credits immediately!</b></p>
<hr/><p class=\"break\">
    $hyback <a href=\"./mainmenu.php?ses=$ses\">back</a></p></body></html>";
exit;
}











if ($act == "features" || $act == "")
{

echo "<p class=\"break\">
<b><big>About $sitename</big></b></p>
<p class=\"breakforum\" style=\"text-align: center;\"><b>
$sitename is a mobile community with a difference - unlike all the others, we're not a copy of 47 other copies, we're unique &amp; we're here to flick 'em all away!<br/><br/>
Members of $sitename can use the following features to interact with friends &amp; strangers alike.</b></p>
<p class=\"breakforum\">
<b>&#8226; <span style=\"text-decoration: underline;\">Photo albums</span> -</b> you can store a virtually unlimited amount of photos on your $sitename account all sorted into albums which you can share publically or lock privately, you can also link to them from afar with no restrictions.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Email</span> -</b> Get your own email@phoenixchat.co.uk &amp; have your email delivered right into your $sitename mailbox with our fully featured email client or get them elsewhere with the convenience of pop3 goodness.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">The File Exchanger</span> -</b> Unlike most sites with a 'file swap' facility, ours is full of free music &amp; useful stuff - not men's penises! - you can also use it to store files for linkage from a remote location, this facility is also available to non members.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Your Blog</span> -</b> Your own personal window to shout out of; tell the world your thoughts &amp; read the thoughts of others.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Your Profile</span> -</b> Unlike the crappy profiles on <i>other</i> sites which just show you a picture &amp; tell you someone's post count, your $sitename profile is fully customizable so you can share as much or as little about yourself as you like with optional chunks that can be added or removed such as your photos, friends, blogs &amp; forum topics.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Updates</span> -</b> If someone comments on your profile, photos or your blog or responds to you in the forum you are kept up to date right on the main menu, no need to go trawling for those replies ever again!<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Pop Messages</span> -</b> If your in a hurry &amp; don't fancy sending a mailbox message or indeed an email you can POP someone right from your friends list!<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Friends List</span> -</b> Keep track of all of your friends in one place &amp; get access to extra features such as Private Photos &amp; Pop Messages.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Message Boards</span> -</b> We have probably the best message boards available on a mobile phone. Not only can you attach photos &amp; [BB Code] to all your messages but you can also create &amp; vote on polls, edit your own messages to fix mistakes &amp; even delete your messages if you change your mind all with speed &amp; convenience.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Configurability</span> -</b> You can change every aspect of your $sitename experience, from blocking pop messages, mail messages or those annoying stalkers to turning off your profile, selecting a different colour scheme or even the size of screen text &amp; the layout of the menus.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Privacy Guarantee</span> -</b> You can turn off all messaging services, your profile &amp; block users from contacting you, so if your a lurker who just likes to watch, you're catered for!<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">BB Code</span> -</b> You can spice up your messages, blogs, forum posts, chatroom lines &amp; your profile with icons, colourful text effects &amp; more.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Low Bandwidth Mode</span> -</b> Got a slow phone on a slow network? No problem, flick this switch &amp; you can run a stripped down version of the site for faster browsing.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Fight The Power</span> -</b> Unlike EVERY other community on wap, we don't ban you for posting links to other wap sites, we won't censor your writings or force you to fill in your profile, we want things to be as relaxed &amp; easy going as possible!.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Intuitive Help</span> -</b> Not only do we have helpful administrators &amp; a specific message board for all your questions, we also have a fully furnished Help section which explains every single feature of the site &amp; how they work.<br/>
<br/><b>&#8226; <span style=\"text-decoration: underline;\">Just one more thing</span> -</b> Did we mention that this is ALL FREE?
</p>
<p class=\"breakforum\" style=\"text-align: center;\">
<b>If this sounds like the kind of community you want to be part of, <a href=\"./register.php\">join us</a> now!</b>
</p>
<hr/>
<p class=\"break\">$hyback <a href=\"./index.php\">Go Back</a></p></body></html>";

}




?>