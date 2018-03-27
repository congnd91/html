# WordPress : http://127.0.0.1:4001/wordpress MySQL database backup
#
# Generated: Tuesday 12. August 2014 09:22 UTC
# Hostname: localhost
# Database: `wordpress`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `wp_commentmeta`
# --------------------------------------------------------


#
# Delete any existing table `wp_commentmeta`
#

DROP TABLE IF EXISTS `wp_commentmeta`;


#
# Table structure of table `wp_commentmeta`
#

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

#
# Data contents of table wp_commentmeta (0 records)
#

#
# End of data contents of table wp_commentmeta
# --------------------------------------------------------

# WordPress : http://127.0.0.1:4001/wordpress MySQL database backup
#
# Generated: Tuesday 12. August 2014 09:22 UTC
# Hostname: localhost
# Database: `wordpress`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `wp_commentmeta`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `wp_comments`
# --------------------------------------------------------


#
# Delete any existing table `wp_comments`
#

DROP TABLE IF EXISTS `wp_comments`;


#
# Table structure of table `wp_comments`
#

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 ;

#
# Data contents of table wp_comments (65 records)
#
 
INSERT INTO `wp_comments` VALUES (1, 1, 'Mr WordPress', '', 'http://wordpress.org/', '', '2012-10-02 22:12:12', '2012-10-02 22:12:12', 'Hi, this is a comment.<br />To delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (2, 5, 'Dan Philibin', 'dan@danphilibin.com', 'http://wpcandy.com', '207.255.235.40', '2008-09-17 17:16:35', '2008-09-17 22:16:35', 'Here is a non-admin comment.

It has multiple lines, some <code>code</code>, and a bit more text.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (3, 32, 'admin', 'hey@wpcoder.com', 'http://', '207.255.235.40', '2008-09-17 17:14:05', '2008-09-17 22:14:05', 'Howdy! This is an admin comment.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (4, 32, 'Dan Philibin', 'dan@danphilibin.com', 'http://wpcandy.com', '207.255.235.40', '2008-09-17 17:16:01', '2008-09-17 22:16:01', 'Here is a non-admin comment.

It has multiple lines, some <code>code</code>, and a bit more text.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (5, 35, 'admin', 'hey@wpcoder.com', 'http://', '207.255.235.40', '2008-09-17 17:14:02', '2008-09-17 22:14:02', 'Howdy! This is an admin comment.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (6, 37, 'Dan Philibin', 'dan@danphilibin.com', 'http://wpcandy.com', '207.255.235.40', '2008-09-17 17:17:42', '2008-09-17 22:17:42', 'Here is a non-admin comment.

It has multiple lines, some <code>code</code>, and a bit more text.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (7, 37, 'Dan Philibin', 'dan@danphilibin.com', 'http://wpcandy.com', '207.255.235.40', '2008-09-17 17:18:11', '2008-09-17 22:18:11', 'Here is a non-admin comment.

It has multiple lines, some <code>code</code>, and a bit more text. Alternating content so I don\'t get caught spamming ;)', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (8, 39, 'admin', 'hey@wpcoder.com', 'http://', '207.255.235.40', '2008-09-17 17:13:58', '2008-09-17 22:13:58', 'Howdy! This is an admin comment.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (9, 43, 'Dan Philibin', 'dan@danphilibin.com', 'http://wpcandy.com', '207.255.235.40', '2008-09-17 17:19:27', '2008-09-17 22:19:27', 'Here is a non-admin comment.

It has multiple lines, some <code>code</code>, and a bit more text.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (10, 45, 'admin', 'hey@wpcoder.com', 'http://', '207.255.235.40', '2008-09-17 17:13:55', '2008-09-17 22:13:55', 'Howdy! This is an admin comment.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (11, 45, 'Dan Philibin', 'dan@danphilibin.com', 'http://wpcandy.com', '207.255.235.40', '2008-09-17 17:19:42', '2008-09-17 22:19:42', 'Here is a non-admin comment.

It has multiple lines, some <code>code</code>, and a bit more text.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (12, 53, 'Mr WordPress', '', 'http://wordpress.org/', '', '2008-09-17 16:53:25', '2008-09-17 21:53:25', 'Hi, this is a comment.<br />To delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (13, 53, 'admin', 'hey@wpcoder.com', 'http://', '207.255.235.40', '2008-09-17 17:13:50', '2008-09-17 22:13:50', 'Howdy! This is an admin comment.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (14, 57, 'admin', 'hey@wpcoder.com', 'http://', '207.255.235.40', '2008-09-17 17:13:35', '2008-09-17 22:13:35', 'Howdy! This is an admin comment.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (15, 57, 'Dan Philibin', 'dan@danphilibin.com', 'http://wpcandy.com', '207.255.235.40', '2008-09-17 17:20:13', '2008-09-17 22:20:13', 'Here is a non-admin comment.

It has multiple lines, some <code>code</code>, and a bit more text.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (16, 155, 'Anon', 'anon@example.com', '', '59.167.157.3', '2007-09-04 10:49:28', '2007-09-04 00:49:28', 'Anonymous comment.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (17, 155, 'tellyworthtest2', 'tellyworth+test2@gmail.com', '', '59.167.157.3', '2007-09-04 10:49:03', '2007-09-04 00:49:03', 'Contributor comment.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (18, 155, 'John Doe', 'example@example.org', 'http://example.org', '59.167.157.3', '2007-09-04 10:48:51', '2007-09-04 17:48:51', 'Author comment.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (19, 1148, 'John Doe', 'example@example.org', 'http://example.org/', '59.167.157.3', '2012-09-03 10:18:04', '2012-09-03 17:18:04', '<h2>Headings</h2>
<h1>Header one</h1>
<h2>Header two</h2>
<h3>Header three</h3>
<h4>Header four</h4>
<h5>Header five</h5>
<h6>Header six</h6>
<h2>Blockquotes</h2>
Single line blockquote:
<blockquote>Stay hungry. Stay foolish.</blockquote>
Multi line blockquote with a cite reference:
<blockquote>People think focus means saying yes to the thing you\'ve got to focus on. But that\'s not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I\'m actually as proud of the things we haven\'t done as the things I have done. Innovation is saying no to 1,000 things. <cite>Steve Jobs - Apple Worldwide Developers\' Conference, 1997</cite></blockquote>
<h2>Tables</h2>
<table>
<tbody>
<tr>
<th>Employee</th>
<th class="views">Salary</th>
<th></th>
</tr>
<tr class="odd">
<td><a href="http://example.org/" rel="nofollow">John Saddington</a></td>
<td>$1</td>
<td>Because that\'s all Steve Job\' needed for a salary.</td>
</tr>
<tr class="even">
<td><a href="http://example.org/" rel="nofollow">Tom McFarlin</a></td>
<td>$100K</td>
<td>For all the blogging he does.</td>
</tr>
<tr class="odd">
<td><a href="http://example.org/" rel="nofollow">Jared Erickson</a></td>
<td>$100M</td>
<td>Pictures are worth a thousand words, right? So Tom x 1,000.</td>
</tr>
<tr class="even">
<td><a href="http://example.org/" rel="nofollow">Chris Ames</a></td>
<td>$100B</td>
<td>With hair like that?! Enough said...</td>
</tr>
</tbody>
</table>
<h2>Definition Lists</h2>
<dl><dt>Definition List Title</dt><dd>Definition list division.</dd><dt>Startup</dt><dd>A startup company or startup is a company or temporary organization designed to search for a repeatable and scalable business model.</dd><dt>#dowork</dt><dd>Coined by Rob Dyrdek and his personal body guard Christopher "Big Black" Boykins, "Do Work" works as a self motivator, to motivating your friends.</dd><dt>Do It Live</dt><dd>I\'ll let Bill O\'Reilly will <a title="We\'ll Do It Live" href="https://www.youtube.com/watch?v=O_HyZ5aW76c" rel="nofollow">explain</a> this one.</dd></dl>
<h2>Unordered Lists (Nested)</h2>
<ul>
	<li>List item one
<ul>
	<li>List item one
<ul>
	<li>List item one</li>
	<li>List item two</li>
	<li>List item three</li>
	<li>List item four</li>
</ul>
</li>
	<li>List item two</li>
	<li>List item three</li>
	<li>List item four</li>
</ul>
</li>
	<li>List item two</li>
	<li>List item three</li>
	<li>List item four</li>
</ul>
<h2>Ordered List (Nested)</h2>
<ol>
	<li>List item one
<ol>
	<li>List item one
<ol>
	<li>List item one</li>
	<li>List item two</li>
	<li>List item three</li>
	<li>List item four</li>
</ol>
</li>
	<li>List item two</li>
	<li>List item three</li>
	<li>List item four</li>
</ol>
</li>
	<li>List item two</li>
	<li>List item three</li>
	<li>List item four</li>
</ol>
<h2>HTML Tags</h2>
These supported tags come from the WordPress.com code <a title="Code" href="http://en.support.wordpress.com/code/" rel="nofollow">FAQ</a>.

<strong>Address Tag</strong>

<address>1 Infinite Loop
Cupertino, CA 95014
United States</address><strong>Anchor Tag (aka. Link)</strong>

This is an example of a <a title="Apple" href="http://apple.com" rel="nofollow">link</a>.

<strong>Abbreviation Tag</strong>

The abbreviation <abbr title="Seriously">srsly</abbr> stands for "seriously".

<strong>Acronym Tag</strong>

The acronym <acronym title="For The Win">ftw</acronym> stands for "for the win".

<strong>Big Tag</strong>

These tests are a <big>big</big> deal, but this tag is no longer supported in HTML5.

<strong>Cite Tag</strong>

"Code is poetry." --<cite>Automattic</cite>

<strong>Code Tag</strong>

You will learn later on in these tests that <code>word-wrap: break-word;</code> will be your best friend.

<strong>Delete Tag</strong>

This tag will let you <del>strikeout text</del>, but this tag is no longer supported in HTML5 (use the <code>&lt;strike&gt;</code> instead).

<strong>Emphasize Tag</strong>

The emphasize tag should <em>italicize</em> text.

<strong>Insert Tag</strong>

This tag should denote <ins>inserted</ins> text.

<strong>Keyboard Tag</strong>

This scarcely known tag emulates <kbd>keyboard text</kbd>, which is usually styled like the <code>&lt;code&gt;</code> tag.

<strong>Preformatted Tag</strong>

This tag styles large blocks of code.
<pre>.post-title {
  margin: 0 0 5px;
  font-weight: bold;
  font-size: 38px;
  line-height: 1.2;
}</pre>

<strong>Quote Tag</strong>

<q>Developers, developers, developers...</q> --Steve Ballmer

<strong>Strong Tag</strong>

This tag shows <strong>bold<strong> text.</strong></strong>

<strong>Subscript Tag</strong>

Getting our science styling on with H<sub>2</sub>O, which should push the "2" down.

<strong>Superscript Tag</strong>

Still sticking with science and Isaac Newton\'s E = MC<sup>2</sup>, which should lift the 2 up.

<strong>Teletype Tag</strong>

This rarely used tag emulates <tt>teletype text</tt>, which is usually styled like the <code>&lt;code&gt;</code> tag.

<strong>Variable Tag</strong>

This allows you to denote <var>variables</var>.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (20, 1148, 'Anonymous User', 'fake@email.com', '', '67.3.69.40', '2013-03-11 23:45:54', '2013-03-12 04:45:54', 'This user it trying to be anonymous.


    They used a fake email, so there should be no <a href="http://gravatar.com/" title="Gravatar" rel="nofollow">Gravatar</a> associated with it.
    They did not speify a website, so there should be no link to it in the comment.
', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (21, 1148, 'Jane Doe', 'example@example.org', 'http://example.org/', '204.54.106.1', '2013-03-12 13:17:35', '2013-03-12 20:17:35', 'Comments? I love comments!', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (22, 1148, 'John Doe', 'example@example.org', 'http://example.org', '24.126.245.62', '2013-03-14 07:53:26', '2013-03-14 14:53:26', 'These tests are amazing!', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (23, 1148, 'John Doe', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 07:56:46', '2013-03-14 14:56:46', 'Author Comment.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (24, 1148, 'John Doe', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 07:57:01', '2013-03-14 14:57:01', 'Comment Depth 01', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (25, 1148, 'Jane Bloggs', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 08:01:21', '2013-03-14 15:01:21', 'Comment Depth 02', 0, '1', '', '', 24, 0) ; 
INSERT INTO `wp_comments` VALUES (26, 1148, 'Fred Bloggs', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 08:02:06', '2013-03-14 15:02:06', 'Comment Depth 03', 0, '1', '', '', 25, 0) ; 
INSERT INTO `wp_comments` VALUES (27, 1148, 'Fred Bloggs', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 08:03:22', '2013-03-14 15:03:22', 'Comment Depth 04', 0, '1', '', '', 26, 0) ; 
INSERT INTO `wp_comments` VALUES (28, 1148, 'Joe Bloggs', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 08:10:29', '2013-03-14 15:10:29', 'Comment Depth 05

Also an author comment.', 0, '1', '', '', 27, 0) ; 
INSERT INTO `wp_comments` VALUES (29, 1148, 'Jane Bloggs', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 08:12:16', '2013-03-14 15:12:16', 'Comment Depth 06', 0, '1', '', '', 28, 0) ; 
INSERT INTO `wp_comments` VALUES (30, 1148, 'Joe Bloggs', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 08:12:58', '2013-03-14 15:12:58', 'Comment Depth 07', 0, '1', '', '', 29, 0) ; 
INSERT INTO `wp_comments` VALUES (31, 1148, 'Jane Bloggs', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 08:13:42', '2013-03-14 15:13:42', 'Comment Depth 08', 0, '1', '', '', 30, 0) ; 
INSERT INTO `wp_comments` VALUES (32, 1148, 'Joe Bloggs', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 08:14:13', '2013-03-14 15:14:13', 'Comment Depth 09', 0, '1', '', '', 31, 0) ; 
INSERT INTO `wp_comments` VALUES (33, 1148, 'John Doe', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 08:14:47', '2013-03-14 15:14:47', 'Comment Depth 10

Also an author comment.', 0, '1', '', '', 32, 0) ; 
INSERT INTO `wp_comments` VALUES (34, 1148, 'Jane Doe', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 09:56:43', '2013-03-14 09:56:43', 'Image comment.

', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (35, 1148, 'John Doe', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 11:23:24', '2013-03-14 18:23:24', 'We are totally going to blog about these tests!', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (36, 1148, 'John Doe', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 11:27:54', '2013-03-14 18:27:54', 'We use these tests all the time! Killer stuff!', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (37, 1148, 'Jane Doe', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 11:30:33', '2013-03-14 18:30:33', 'Thanks for all the comments, everyone!', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (38, 1149, 'Ping 1 &laquo; What&#8217;s a tellyworth?', '', 'http://tellyworth.wordpress.com/2007/11/21/ping-1/', '72.232.101.12', '2007-11-21 11:31:12', '2007-11-21 01:31:12', '[...] Trackback test. [...]', 0, '1', '', 'pingback', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (39, 1149, 'Ping 2 with a much longer title than the previous ping, which was called Ping 1 &laquo; What&#8217;s a tellyworth?', '', 'http://tellyworth.wordpress.com/2007/11/21/ping-2-with-a-much-longer-title-than-the-previous-ping-which-was-called-ping-1/', '72.232.101.12', '2007-11-21 11:35:47', '2007-11-21 01:35:47', '[...] Another trackback test.  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec hendrerit gravida nisi. Praesent libero odio, tincidunt nec, fringilla et, mollis ut, ipsum. Proin a lacus quis nisi pulvinar bibendum. Donec massa justo, dapibus at, imperdiet vestibulum, dapibus in, leo. Donec pretium tellus in dui. Phasellus tristique aliquet justo. Donec sodales. Nulla urna mi, molestie ac, malesuada sit amet, sagittis id, lacus. Mauris auctor leo ac justo. Proin convallis. Nulla eleifend dictum mi. Donec at lectus. Integer augue sapien, ornare vitae, rhoncus quis, rhoncus sed, sapien. Nunc mattis diam sodales diam.Etiam porttitor, ante sed varius semper, ante arcu rutrum tortor, at luctus nunc urna id nibh. Fusce sodales. Integer sed ligula. Donec posuere, nibh aliquet auctor congue, augue est porttitor odio, imperdiet facilisis tortor urna vel mauris. Pellentesque pretium, lorem non pellentesque varius, elit diam ultrices mi, sed posuere sapien lectus sed mi. Donec vestibulum urna. Donec gravida elit et enim. Ut dignissim neque ut erat. Morbi tincidunt nunc vitae lorem. Morbi rhoncus mi. Praesent facilisis tincidunt enim. Ut pulvinar. Suspendisse potenti. Vivamus turpis odio, porta at, malesuada in, iaculis eget, odio. Aenean faucibus, urna quis congue dignissim, orci tellus ornare leo, eget viverra ante ipsum sit amet magna. Suspendisse mattis nunc at justo. Nullam malesuada lobortis lorem. Morbi ultricies. Nam risus erat, sagittis ut, tristique rhoncus, luctus id, ante. Maecenas ac dui. [...]', 0, '1', '', 'pingback', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (40, 1149, 'Ping 4 &laquo; What&#8217;s a tellyworth?', '', 'http://tellyworth.wordpress.com/2007/11/21/ping-4/', '72.232.101.12', '2007-11-21 11:39:25', '2007-11-21 01:39:25', '[...] Another short one. [...]', 0, '1', '', 'pingback', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (41, 1149, 'Ping 3 &laquo; What&#8217;s a tellyworth?', '', 'http://tellyworth.wordpress.com/2007/11/21/ping-3/', '72.232.101.12', '2007-11-21 11:38:22', '2007-11-21 01:38:22', '[...] Just a short one. [...]', 0, '1', '', 'pingback', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (42, 1149, 'John Doe', 'example@example.org', 'http://example.org/', '146.214.103.251', '2010-06-11 15:27:04', '2010-06-11 22:27:04', 'This is a comment amongst pingbacks and trackbacks.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (43, 1168, 'Jane Doe', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 11:56:08', '2013-03-14 18:56:08', 'This comment should not be visible until the password is entered.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (44, 1170, 'John Doe', 'example@example.org', 'http://example.org/', '24.126.245.62', '2013-03-14 12:35:07', '2013-03-14 19:35:07', 'Having no content in the post should have no adverse effects on the layout or functionality.', 0, '1', '', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (45, 13, 'hdhdkjh', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 11:49:29', '2014-04-28 11:49:29', 'adhlkadjlkajd', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (46, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:10:25', '2014-04-28 13:10:25', 'a comment', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (47, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:11:25', '2014-04-28 13:11:25', 'a reply', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 17, 0) ; 
INSERT INTO `wp_comments` VALUES (48, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:21:09', '2014-04-28 13:21:09', 'a new reply', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 47, 0) ; 
INSERT INTO `wp_comments` VALUES (49, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:21:32', '2014-04-28 13:21:32', 'one more', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 48, 0) ; 
INSERT INTO `wp_comments` VALUES (50, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:21:56', '2014-04-28 13:21:56', 'a new', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 47, 0) ; 
INSERT INTO `wp_comments` VALUES (51, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:22:21', '2014-04-28 13:22:21', 'fff', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 49, 0) ; 
INSERT INTO `wp_comments` VALUES (52, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:23:02', '2014-04-28 13:23:02', 'ddd', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (53, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:23:53', '2014-04-28 13:23:53', 'more than one', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (54, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:38:42', '2014-04-28 13:38:42', 'gtt', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (55, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:41:29', '2014-04-28 13:41:29', 'tralala', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (56, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:57:40', '2014-04-28 13:57:40', 'dddddfwf', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (57, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:58:58', '2014-04-28 13:58:58', 'hfkhfhf', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (58, 155, 'admin', 'maniuni@gmail.com', '', '127.0.0.1', '2014-04-28 13:59:13', '2014-04-28 13:59:13', 'laasst', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 0) ; 
INSERT INTO `wp_comments` VALUES (59, 155, 'admin', 'admin@localhost.local', '', '127.0.0.1', '2014-04-29 13:32:47', '2014-04-29 13:32:47', 'fff', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 1) ; 
INSERT INTO `wp_comments` VALUES (60, 155, 'admin', 'admin@localhost.local', '', '127.0.0.1', '2014-04-29 13:34:08', '2014-04-29 13:34:08', 'dshrh', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 18, 1) ; 
INSERT INTO `wp_comments` VALUES (61, 155, 'admin', 'admin@localhost.local', '', '127.0.0.1', '2014-04-29 13:38:20', '2014-04-29 13:38:20', 'comment from author', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 49, 1) ; 
INSERT INTO `wp_comments` VALUES (62, 155, 'admin', 'admin@localhost.local', '', '127.0.0.1', '2014-04-30 07:03:18', '2014-04-30 07:03:18', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е навлязъл и в публикуването на електронни издания като е запазен почти без промяна. Популяризиран е през 60те години на 20ти век със издаването на Letraset листи, съдържащи Lorem Ipsum пасажи, популярен е и в наши дни във софтуер за печатни издания като Aldus PageMaker, който включва различни версии на Lorem Ipsum.', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 1) ; 
INSERT INTO `wp_comments` VALUES (63, 155, 'admin', 'admin@localhost.local', '', '127.0.0.1', '2014-04-30 09:27:14', '2014-04-30 09:27:14', 'jkhfhkjf', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 60, 1) ; 
INSERT INTO `wp_comments` VALUES (64, 1148, 'admin', 'admin@localhost.local', '', '127.0.0.1', '2014-05-08 11:29:18', '2014-05-08 11:29:18', 'http://bavotasan.com/2009/how-to-add-nested-comments-to-your-wordpress-theme/', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 37, 1) ; 
INSERT INTO `wp_comments` VALUES (65, 1148, 'admin', 'admin@localhost.local', '', '127.0.0.1', '2014-05-08 11:31:17', '2014-05-08 11:31:17', 'http://hogash-demo.com/files/kallyaswp_desc/d1_01.jpg', 0, '1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', '', 0, 1) ;
#
# End of data contents of table wp_comments
# --------------------------------------------------------

# WordPress : http://127.0.0.1:4001/wordpress MySQL database backup
#
# Generated: Tuesday 12. August 2014 09:22 UTC
# Hostname: localhost
# Database: `wordpress`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `wp_commentmeta`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `wp_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `wp_links`
# --------------------------------------------------------


#
# Delete any existing table `wp_links`
#

DROP TABLE IF EXISTS `wp_links`;


#
# Table structure of table `wp_links`
#

CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ;

#
# Data contents of table wp_links (7 records)
#
 
INSERT INTO `wp_links` VALUES (1, 'http://codex.wordpress.org/', 'Documentation', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '') ; 
INSERT INTO `wp_links` VALUES (2, 'http://wordpress.org/news/', 'WordPress Blog', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', 'http://wordpress.org/news/feed/') ; 
INSERT INTO `wp_links` VALUES (3, 'http://wordpress.org/support/', 'Support Forums', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '') ; 
INSERT INTO `wp_links` VALUES (4, 'http://wordpress.org/extend/plugins/', 'Plugins', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '') ; 
INSERT INTO `wp_links` VALUES (5, 'http://wordpress.org/extend/themes/', 'Themes', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '') ; 
INSERT INTO `wp_links` VALUES (6, 'http://wordpress.org/support/forum/requests-and-feedback', 'Feedback', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '') ; 
INSERT INTO `wp_links` VALUES (7, 'http://planet.wordpress.org/', 'WordPress Planet', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '') ;
#
# End of data contents of table wp_links
# --------------------------------------------------------

# WordPress : http://127.0.0.1:4001/wordpress MySQL database backup
#
# Generated: Tuesday 12. August 2014 09:22 UTC
# Hostname: localhost
# Database: `wordpress`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `wp_commentmeta`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `wp_comments`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `wp_links`
# --------------------------------------------------------
# --------------------------------------------------------
# Table: `wp_options`
# --------------------------------------------------------


#
# Delete any existing table `wp_options`
#

DROP TABLE IF EXISTS `wp_options`;


#
# Table structure of table `wp_options`
#

CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2228 DEFAULT CHARSET=utf8 ;

#
# Data contents of table wp_options (234 records)
#
 
INSERT INTO `wp_options` VALUES (1, 'siteurl', 'http://127.0.0.1:4001/wordpress', 'yes') ; 
INSERT INTO `wp_options` VALUES (2, 'blogname', 'Purple Modena', 'yes') ; 
INSERT INTO `wp_options` VALUES (3, 'blogdescription', 'A simple, light theme in shades of purple that supports Google Chrome, Safari 5.1, Opera, Firefox and Internet Explorer 8+.', 'yes') ; 
INSERT INTO `wp_options` VALUES (4, 'users_can_register', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (5, 'admin_email', 'admin@localhost.local', 'yes') ; 
INSERT INTO `wp_options` VALUES (6, 'start_of_week', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (7, 'use_balanceTags', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (8, 'use_smilies', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (9, 'require_name_email', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (10, 'comments_notify', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (11, 'posts_per_rss', '10', 'yes') ; 
INSERT INTO `wp_options` VALUES (12, 'rss_use_excerpt', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (13, 'mailserver_url', 'mail.example.com', 'yes') ; 
INSERT INTO `wp_options` VALUES (14, 'mailserver_login', 'login@example.com', 'yes') ; 
INSERT INTO `wp_options` VALUES (15, 'mailserver_pass', 'password', 'yes') ; 
INSERT INTO `wp_options` VALUES (16, 'mailserver_port', '110', 'yes') ; 
INSERT INTO `wp_options` VALUES (17, 'default_category', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (18, 'default_comment_status', 'open', 'yes') ; 
INSERT INTO `wp_options` VALUES (19, 'default_ping_status', 'open', 'yes') ; 
INSERT INTO `wp_options` VALUES (20, 'default_pingback_flag', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (285, 'db_upgraded', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (22, 'posts_per_page', '5', 'yes') ; 
INSERT INTO `wp_options` VALUES (23, 'date_format', 'F j, Y', 'yes') ; 
INSERT INTO `wp_options` VALUES (24, 'time_format', 'g:i a', 'yes') ; 
INSERT INTO `wp_options` VALUES (25, 'links_updated_date_format', 'F j, Y g:i a', 'yes') ; 
INSERT INTO `wp_options` VALUES (29, 'comment_moderation', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (30, 'moderation_notify', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (31, 'permalink_structure', '/%postname%/', 'yes') ; 
INSERT INTO `wp_options` VALUES (32, 'gzipcompression', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (33, 'hack_file', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (34, 'blog_charset', 'UTF-8', 'yes') ; 
INSERT INTO `wp_options` VALUES (35, 'moderation_keys', '', 'no') ; 
INSERT INTO `wp_options` VALUES (36, 'active_plugins', 'a:13:{i:0;s:35:"backupwordpress/backupwordpress.php";i:1;s:19:"akismet/akismet.php";i:2;s:23:"debug-bar/debug-bar.php";i:3;s:23:"developer/developer.php";i:4;s:9:"hello.php";i:5;s:19:"jetpack/jetpack.php";i:6;s:49:"log-deprecated-notices/log-deprecated-notices.php";i:7;s:33:"monster-widget/monster-widget.php";i:8;s:35:"simply-show-ids/simply-show-ids.php";i:9;s:27:"theme-check/theme-check.php";i:10;s:41:"wordpress-importer/wordpress-importer.php";i:11;s:31:"wp-migrate-db/wp-migrate-db.php";i:12;s:43:"wp-native-dashboard/wp-native-dashboard.php";}', 'yes') ; 
INSERT INTO `wp_options` VALUES (37, 'home', 'http://127.0.0.1:4001/wordpress', 'yes') ; 
INSERT INTO `wp_options` VALUES (38, 'category_base', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (39, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes') ; 
INSERT INTO `wp_options` VALUES (40, 'advanced_edit', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (41, 'comment_max_links', '2', 'yes') ; 
INSERT INTO `wp_options` VALUES (42, 'gmt_offset', '3', 'yes') ; 
INSERT INTO `wp_options` VALUES (43, 'default_email_category', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (44, 'recently_edited', 'a:4:{i:0;s:91:"G:\\InstantWP_4.3.1\\iwpserver\\htdocs\\wordpress/wp-content/themes/purple-modena/functions.php";i:2;s:87:"G:\\InstantWP_4.3.1\\iwpserver\\htdocs\\wordpress/wp-content/themes/purple-modena/style.css";i:3;s:84:"G:\\InstantWP_4.3.1\\iwpserver\\htdocs\\wordpress/wp-content/plugins/akismet/akismet.php";i:4;s:0:"";}', 'no') ; 
INSERT INTO `wp_options` VALUES (45, 'template', 'twentyfourteen', 'yes') ; 
INSERT INTO `wp_options` VALUES (46, 'stylesheet', 'twentyfourteen', 'yes') ; 
INSERT INTO `wp_options` VALUES (47, 'comment_whitelist', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (48, 'blacklist_keys', '', 'no') ; 
INSERT INTO `wp_options` VALUES (49, 'comment_registration', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (50, 'html_type', 'text/html', 'yes') ; 
INSERT INTO `wp_options` VALUES (51, 'use_trackback', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (52, 'default_role', 'subscriber', 'yes') ; 
INSERT INTO `wp_options` VALUES (53, 'db_version', '27916', 'yes') ; 
INSERT INTO `wp_options` VALUES (54, 'uploads_use_yearmonth_folders', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (55, 'upload_path', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (56, 'blog_public', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (57, 'default_link_category', '2', 'yes') ; 
INSERT INTO `wp_options` VALUES (58, 'show_on_front', 'page', 'yes') ; 
INSERT INTO `wp_options` VALUES (59, 'tag_base', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (60, 'show_avatars', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (61, 'avatar_rating', 'G', 'yes') ; 
INSERT INTO `wp_options` VALUES (62, 'upload_url_path', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (63, 'thumbnail_size_w', '150', 'yes') ; 
INSERT INTO `wp_options` VALUES (64, 'thumbnail_size_h', '150', 'yes') ; 
INSERT INTO `wp_options` VALUES (65, 'thumbnail_crop', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (66, 'medium_size_w', '300', 'yes') ; 
INSERT INTO `wp_options` VALUES (67, 'medium_size_h', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (68, 'avatar_default', 'gravatar_default', 'yes') ; 
INSERT INTO `wp_options` VALUES (71, 'large_size_w', '1024', 'yes') ; 
INSERT INTO `wp_options` VALUES (72, 'large_size_h', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (73, 'image_default_link_type', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (74, 'image_default_size', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (75, 'image_default_align', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (76, 'close_comments_for_old_posts', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (77, 'close_comments_days_old', '14', 'yes') ; 
INSERT INTO `wp_options` VALUES (78, 'thread_comments', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (79, 'thread_comments_depth', '10', 'yes') ; 
INSERT INTO `wp_options` VALUES (80, 'page_comments', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (81, 'comments_per_page', '5', 'yes') ; 
INSERT INTO `wp_options` VALUES (82, 'default_comments_page', 'newest', 'yes') ; 
INSERT INTO `wp_options` VALUES (83, 'comment_order', 'asc', 'yes') ; 
INSERT INTO `wp_options` VALUES (84, 'sticky_posts', 'a:1:{i:0;i:1241;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (85, 'widget_categories', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (86, 'widget_text', 'a:2:{i:2;a:3:{s:5:"title";s:15:"Contact details";s:4:"text";s:82:"1407, Sofia
29 Atanas Dukov Str. 
tel. 02/9321 708
email: irantonova@actavis.bg";s:6:"filter";b:1;}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (87, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (88, 'uninstall_plugins', 'a:2:{s:49:"log-deprecated-notices/log-deprecated-notices.php";a:2:{i:0;s:14:"Deprecated_Log";i:1;s:12:"on_uninstall";}s:30:"lightbox-plus/lightboxplus.php";s:12:"UninstallLBP";}', 'no') ; 
INSERT INTO `wp_options` VALUES (89, 'timezone_string', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (91, 'embed_size_w', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (92, 'embed_size_h', '600', 'yes') ; 
INSERT INTO `wp_options` VALUES (93, 'page_for_posts', '703', 'yes') ; 
INSERT INTO `wp_options` VALUES (94, 'page_on_front', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (95, 'default_post_format', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (96, 'initial_db_version', '21707', 'yes') ; 
INSERT INTO `wp_options` VALUES (97, 'wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:62:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (98, '_transient_random_seed', 'ac2db477864d9d43a0195d8352a329a1', 'yes') ; 
INSERT INTO `wp_options` VALUES (99, 'widget_search', 'a:3:{i:2;a:1:{s:5:"title";s:0:"";}i:4;a:1:{s:5:"title";s:6:"search";}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (100, 'widget_recent-posts', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:12:"Recent posts";s:6:"number";i:5;s:9:"show_date";b:1;}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (101, 'widget_recent-comments', 'a:3:{i:1;a:0:{}i:2;a:2:{s:5:"title";s:15:"recent comments";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (102, 'widget_archives', 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:8:"archives";s:5:"count";i:0;s:8:"dropdown";i:1;}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (103, 'widget_meta', 'a:3:{i:4;a:1:{s:5:"title";s:8:"Мета";}i:5;a:1:{s:5:"title";s:4:"Meta";}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (104, 'sidebars_widgets', 'a:9:{s:9:"sidebar-1";a:1:{i:0;s:9:"monster-3";}s:19:"wp_inactive_widgets";a:15:{i:0;s:10:"archives-2";i:1;s:8:"search-4";i:2;s:14:"recent-posts-2";i:3;s:17:"recent-comments-2";i:4;s:11:"tag_cloud-2";i:5;s:10:"nav_menu-2";i:6;s:16:"akismet_widget-2";i:7;s:9:"monster-9";i:8;s:7:"links-2";i:9;s:6:"meta-5";i:10;s:9:"monster-4";i:11;s:9:"monster-5";i:12;s:9:"monster-6";i:13;s:9:"monster-7";i:14;s:9:"monster-8";}s:18:"orphaned_widgets_1";a:3:{i:0;s:6:"text-2";i:1;s:8:"search-2";i:2;s:10:"calendar-2";}s:18:"orphaned_widgets_2";a:0:{}s:18:"orphaned_widgets_3";a:0:{}s:18:"orphaned_widgets_4";a:1:{i:0;s:7:"pages-2";}s:18:"orphaned_widgets_5";a:1:{i:0;s:6:"meta-4";}s:18:"orphaned_widgets_6";a:0:{}s:13:"array_version";i:3;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (613, 'category_children', 'a:9:{i:3;a:2:{i:0;i:6;i:1;i:7;}i:5;a:1:{i:0;i:8;}i:7;a:1:{i:0;i:9;}i:19;a:1:{i:0;i:62;}i:51;a:1:{i:0;i:73;}i:73;a:1:{i:0;i:74;}i:52;a:5:{i:0;i:75;i:1;i:76;i:2;i:77;i:3;i:78;i:4;i:79;}i:40;a:1:{i:0;i:80;}i:77;a:1:{i:0;i:81;}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2059, '_transient_timeout_60a2a6055c07c12d947a45fc1fbb5cce', '1405672751', 'no') ; 
INSERT INTO `wp_options` VALUES (2060, '_transient_60a2a6055c07c12d947a45fc1fbb5cce', 'O:8:"stdClass":21:{s:4:"name";s:11:"Theme-Check";s:4:"slug";s:11:"theme-check";s:7:"version";s:10:"20131213.1";s:6:"author";s:47:"<a href="http://pross.org.uk">Pross, Otto42</a>";s:14:"author_profile";s:30:"//profiles.wordpress.org/pross";s:12:"contributors";a:2:{s:5:"pross";s:30:"//profiles.wordpress.org/pross";s:6:"Otto42";s:31:"//profiles.wordpress.org/otto42";}s:8:"requires";s:3:"3.0";s:6:"tested";s:5:"3.8.3";s:13:"compatibility";a:1:{s:5:"3.9.1";a:2:{s:10:"20121211.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}s:10:"20131213.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}}s:6:"rating";d:97.400000000000005684341886080801486968994140625;s:11:"num_ratings";i:166;s:7:"ratings";a:5:{i:5;i:149;i:4;i:13;i:3;i:3;i:2;i:1;i:1;i:0;}s:10:"downloaded";i:297915;s:12:"last_updated";s:10:"2013-12-13";s:5:"added";s:10:"2010-11-10";s:8:"homepage";s:27:"http://pross.org.uk/plugins";s:8:"sections";a:4:{s:11:"description";s:550:"<p>The theme check plugin is an easy way to test your theme and make sure it\'s up to spec with the latest <a href="http://codex.wordpress.org/Theme_Review">theme review</a> standards. With it, you can run all the same automated testing tools on your theme that WordPress.org uses for theme submissions.</p>

<p>The tests are run through a simple admin menu and all results are displayed at once. This is very handy for theme developers, or anybody looking to make sure that their theme supports the latest WordPress theme standards and practices.</p>";s:9:"changelog";s:4426:"<h4>20131213.1</h4>

<ul>
<li>Corrected errors not being displayed by the plugin and it incorrectly giving a "pass" result to everything.</li>
</ul>

<h4>20131212.1</h4>

<ul>
<li>Updated for 3.8</li>
<li>Most files have changed for better I18N support, so the language files were removed temporarily until translation can be redone.</li>
</ul>

<h4>20121211.1</h4>

<ul>
<li>Updated for 3.5</li>
<li>Remove Paypal button.</li>
</ul>

<h4>20110805.1</h4>

<ul>
<li>TimThumb checks removed.</li>
<li>Proper i18n loading. Fixes <a href="http://bit.ly/ouD5Ke" rel="nofollow">http://bit.ly/ouD5Ke</a>.</li>
<li>Screenshot now previewed in results, with filesize and dimensions.</li>
</ul>

<h4>20110602.2</h4>

<ul>
<li>New file list functions hidden folders now detectable.</li>
<li>Better fopen checks.</li>
<li>TimThumb version bump</li>
</ul>

<h4>20110602.1</h4>

<ul>
<li>DOS/UNIX line ending style checks are now a requirement for proper theme uploading.</li>
<li>Timthumb version bump</li>
<li>Several fixes reported by GaryJ</li>
<li>3.2 deprecated functions added</li>
</ul>

<h4>20110412.1</h4>

<ul>
<li>Fix regex\'s</li>
<li>Added check for latest footer injection hack.</li>
<li>Fix tags check to use new content function correctly</li>
<li>Sync of all changes made for wporg uploader theme-check.</li>
<li>Updated checks post 3.1. added screenshot check to svn.</li>
<li>Fix links check to not return a false failure in some cases</li>
<li>rm one of the checks that causes problems on wporg uploader (and which is also unnecessary)</li>
<li>Move unneeded functions out of checkbase into main.php.</li>
<li>Minor formatting changes only (spacing and such)</li>
<li>Add check for wp_link_pages() + fix eval() check</li>
</ul>

<h4>20110219.2</h4>

<ul>
<li>Merged new UI props Gua Bob <a href="http://guabob.com/">1</a> </li>
<li>Last tested theme is always pre-selected in the themes list.</li>
<li>Fixed php error in admin_menu.php</li>
</ul>

<h4>20110219.1</h4>

<ul>
<li>See <a href="https://github.com/Pross/theme-check/commits/">commit log</a> for changes.</li>
</ul>

<h4>20110201.2</h4>

<ul>
<li>UI bug fixes <a href="http://bit.ly/ff7amN">forum post</a> props Mamaduka.</li>
<li>Textdomain checks for twentyten and no domain.</li>
<li>Fix div not closing props Mamaduka.</li>
</ul>

<h4>20110201.1</h4>

<ul>
<li>i18n working</li>
<li>sr_RS de_DE ro_RO langs props Daniel Tara and Emil Uzelac.</li>
<li>Child theme support added, checks made against parent AND child at runtime.</li>
<li>Trac formatting button added for reviewers.</li>
</ul>

<h4>20101228.3</h4>

<ul>
<li>Last revision for 3.1 (hopefully)</li>
<li>Chips suggestion of checking for inclusion of searchform.php ( not
perfect yet, need more examples to look for ).</li>
<li>add_theme_page is required, all others flagged and displayed with line
numbers.</li>
<li>&#60;?= detected properly, short tags outputted with line umbers.</li>
<li>Mostly internationalized, needs translations now.</li>
<li>Bug fixes.</li>
</ul>

<h4>20101228.2</h4>

<ul>
<li>Added menu checking.</li>
<li>ThemeURI AuthourURI added to results.</li>
<li>Lots of small fixes.</li>
<li>Started translation.</li>
</ul>

<h4>20101228.1</h4>

<ul>
<li>Fix embed_defaults filter check and stylesheet file data check.</li>
</ul>

<h4>20101226.1</h4>

<ul>
<li>Whole system redesign to allow easier synching with WordPress.org uploader. Many other additions/subtractions/changes as well.</li>
<li>WordPress 3.1 guidelines added, to help theme authors ensure compatibility for upcoming release.</li>
</ul>

<h4>20101110.7</h4>

<ul>
<li>Re-added malware.php checks for fopen and file_get_contents (INFO)</li>
<li>fixed a couple of undefined index errors.</li>
</ul>

<h4>20101110.4_r2</h4>

<ul>
<li>Fixed Warning: Wrong parameter count for stristr()</li>
</ul>

<h4>20101110.4_r1</h4>

<ul>
<li>Added <code>echo</code> to suggested.php</li>
</ul>

<h4>20101110.4</h4>

<ul>
<li>Fixed deprecated function call to get_plugins()</li>
</ul>

<h4>20101110.3</h4>

<ul>
<li>Fixed undefined index.</li>
</ul>

<h4>20101110.2</h4>

<ul>
<li>Missing <code>&#60;</code> in main.php</li>
<li>Added conditional checks for licence.txt OR Licence tags in style.css</li>
<li>UI improvements.</li>
</ul>

<h4>20101110.1</h4>

<ul>
<li>Date fix!</li>
</ul>

<h4>10112010_r1</h4>

<ul>
<li>Fixed hardcoded links check. Added FAQ</li>
</ul>

<h4>10112010</h4>

<ul>
<li>First release.</li>
</ul>";s:3:"faq";s:1666:"<h4>What\'s with the version numbers?</h4>

<p>The version number is the date of the revision of the <a href="http://codex.wordpress.org/Theme_Review">guidelines</a> used to create it.</p>

<h4>Why does it flag something as bad?</h4>

<p>It\'s not flagging "bad" things, as such. The theme check is designed to be a non-perfect way to test for compliance with the <a href="http://codex.wordpress.org/Theme_Review">Theme Review</a> guidelines. Not all themes must adhere to these guidelines. The purpose of the checking tool is to ensure that themes uploaded to the central <a href="http://wordpress.org/extend/themes/">WordPress.org theme repository</a> meet the latest standards of WordPress themes and will work on a wide variety of sites.</p>

<p>Many sites use customized themes, and that\'s perfectly okay. But themes that are intended for use on many different kinds of sites by the public need to have a certain minimum level of capabilities, in order to ensure proper functioning in many different environments. The Theme Review guidelines are created with that goal in mind.</p>

<p>This theme checker is not perfect, and never will be. It is only a tool to help theme authors, or anybody else who wants to make their theme more capable. All themes submitted to WordPress.org are hand-reviewed by a team of experts. The automated theme checker is meant to be a useful tool only, not an absolute system of measurement.</p>

<p>This plugin does not decide the guidelines used. Any issues with particular theme review guidelines should be discussed on the <a href="http://lists.wordpress.org/mailman/listinfo/theme-reviewers">Theme Reviewers mailing list</a>.</p>";s:11:"other_notes";s:1147:"<h3>Other Notes</h3>
<h4>How to enable trac formatting</h4>

<p>The Theme Review team use this plugin while reviewing themes and copy/paste the output into trac tickets, the trac system has its own markup language.
To enable trac formatting in Theme-Check you need to define a couple of variables in wp-config.php:
<em>TC_PRE</em> and <em>TC_POST</em> are used as a ticket header and footer.
Examples:</p>

<pre><code>define( &#039;TC_PRE&#039;, &#039;Theme Review:[[br]]
- Themes should be reviewed using &#34;define(\\&#039;WP_DEBUG\\&#039;, true);&#34; in wp-config.php[[br]]
- Themes should be reviewed using the test data from the Theme Checklists (TC)
-----
&#039; );</code></pre>

<pre><code>define( &#039;TC_POST&#039;, &#039;Feel free to make use of the contact details below if you have any questions,
comments, or feedback:[[br]]
[[br]]
* Leave a comment on this ticket[[br]]
* Send an email to the Theme Review email list[[br]]
* Use the #wordpress-themes IRC channel on Freenode.&#039; );</code></pre>

<p>If <strong>either</strong> of these two vars are defined a new trac tickbox will appear next to the <em>Check it!</em> button.</p>";}s:17:"short_description";s:126:"A simple and easy way to test your theme for all the latest WordPress standards and practices. A great theme development tool!";s:13:"download_link";s:64:"http://downloads.wordpress.org/plugin/theme-check.20131213.1.zip";s:4:"tags";a:12:{s:5:"check";s:5:"check";s:7:"checker";s:7:"checker";s:9:"guideline";s:9:"guideline";s:6:"review";s:6:"review";s:8:"template";s:8:"template";s:4:"test";s:4:"test";s:5:"theme";s:5:"theme";s:4:"tool";s:4:"tool";s:6:"upload";s:6:"upload";s:8:"uploader";s:8:"uploader";s:9:"wordpress";s:9:"wordpress";s:12:"wordpressorg";s:13:"wordpress.org";}s:11:"donate_link";N;}', 'no') ; 
INSERT INTO `wp_options` VALUES (106, 'logged_in_key', 'w_JTTa+Qx9`MM3vr~VL*(^M7tk/nEIB#&FLnz1{V9Ckm3/q._m2j(&4&-;N^>Mp)', 'yes') ; 
INSERT INTO `wp_options` VALUES (107, 'logged_in_salt', '?7DQKJ>AgDCyL;{94WSdxkyf--2k>!Mr?d>}5g$`U.y8D/d0O6X+`~!MZu|76iu=', 'yes') ; 
INSERT INTO `wp_options` VALUES (108, 'auth_key', 'Gwuy8P`2*_,Mtz,hxIplx+7A_<?vH2 =wP$X kw*#L8_3;MlfD`mt#Y0(6t2cTe+', 'yes') ; 
INSERT INTO `wp_options` VALUES (109, 'auth_salt', 'y.3t+|LzEImjjy*^:]{R$6ei9#S97{L;U+Q2OWrGs=I{v}#bK6:pyQ~ NJayBK-3', 'yes') ; 
INSERT INTO `wp_options` VALUES (110, 'cron', 'a:9:{i:1407188669;a:1:{s:30:"wp_scheduled_auto_draft_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1407190334;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1407190339;a:1:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}i:1407628800;a:1:{s:19:"hmbkp_schedule_hook";a:1:{s:32:"61a45f8e0e711228d9f0aa04271d0a05";a:3:{s:8:"schedule";s:12:"hmbkp_weekly";s:4:"args";a:1:{s:2:"id";s:9:"default-2";}s:8:"interval";i:604800;}}}i:1407835621;a:1:{s:20:"jetpack_clean_nonces";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}}i:1407872220;a:1:{s:20:"wp_maybe_auto_update";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1407873600;a:1:{s:19:"hmbkp_schedule_hook";a:1:{s:32:"887abd106b36605fbb285d0dec9f47ac";a:3:{s:8:"schedule";s:11:"hmbkp_daily";s:4:"args";a:1:{s:2:"id";s:9:"default-1";}s:8:"interval";i:86400;}}}i:1577880018;a:1:{s:19:"publish_future_post";a:1:{s:32:"53e45760b4285163a94322f2b432f7d3";a:2:{s:8:"schedule";b:0;s:4:"args";a:1:{i:0;i:1153;}}}}s:7:"version";i:2;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (284, 'link_manager_enabled', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (155, 'recently_activated', 'a:1:{s:28:"wp-example-content/magic.php";i:1406108118;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2224, '_site_transient_timeout_theme_roots', '1407837122', 'yes') ; 
INSERT INTO `wp_options` VALUES (2225, '_site_transient_theme_roots', 'a:13:{s:7:"modelun";s:7:"/themes";s:13:"purple-modena";s:7:"/themes";s:20:"responsive-bootstrap";s:7:"/themes";s:15:"starkers-master";s:7:"/themes";s:11:"sumi-shoshi";s:7:"/themes";s:12:"twentyeleven";s:7:"/themes";s:20:"twentyfourteen-child";s:7:"/themes";s:14:"twentyfourteen";s:7:"/themes";s:15:"twentyten-child";s:7:"/themes";s:9:"twentyten";s:7:"/themes";s:14:"twentythirteen";s:7:"/themes";s:18:"twentytwelve-child";s:7:"/themes";s:12:"twentytwelve";s:7:"/themes";}', 'yes') ; 
INSERT INTO `wp_options` VALUES (119, 'dashboard_widget_options', 'a:4:{s:25:"dashboard_recent_comments";a:1:{s:5:"items";i:5;}s:24:"dashboard_incoming_links";a:5:{s:4:"home";s:31:"http://127.0.0.1:4001/wordpress";s:4:"link";s:107:"http://blogsearch.google.com/blogsearch?scoring=d&partner=wordpress&q=link:http://127.0.0.1:4001/wordpress/";s:3:"url";s:140:"http://blogsearch.google.com/blogsearch_feeds?scoring=d&ie=utf-8&num=10&output=rss&partner=wordpress&q=link:http://127.0.0.1:4001/wordpress/";s:5:"items";i:10;s:9:"show_date";b:0;}s:17:"dashboard_primary";a:7:{s:4:"link";s:26:"http://wordpress.org/news/";s:3:"url";s:31:"http://wordpress.org/news/feed/";s:5:"title";s:14:"WordPress Blog";s:5:"items";i:2;s:12:"show_summary";i:1;s:11:"show_author";i:0;s:9:"show_date";i:1;}s:19:"dashboard_secondary";a:7:{s:4:"link";s:28:"http://planet.wordpress.org/";s:3:"url";s:33:"http://planet.wordpress.org/feed/";s:5:"title";s:20:"Other WordPress News";s:5:"items";i:5;s:12:"show_summary";i:0;s:11:"show_author";i:0;s:9:"show_date";i:0;}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (120, 'nonce_key', 'n@QkHTPhTgVEgs3$* k|pgY!jK2bwY$R`cT:Dt/w>E9mm{U3 bUzl.Tdkc$NL0qA', 'yes') ; 
INSERT INTO `wp_options` VALUES (121, 'nonce_salt', '0Ib UM_{BY61@ 42V?~|le@N{8>*<d#Sn<uiQ%*0ys4)H IT&t;>Vnry$nyLgk%E', 'yes') ; 
INSERT INTO `wp_options` VALUES (2222, '_transient_timeout_feed_mod_c338a64000c51ebf6963bece9325ec30', '1407878519', 'no') ; 
INSERT INTO `wp_options` VALUES (2223, '_transient_feed_mod_c338a64000c51ebf6963bece9325ec30', '1407835319', 'no') ; 
INSERT INTO `wp_options` VALUES (2226, '_site_transient_update_core', 'O:8:"stdClass":4:{s:7:"updates";a:1:{i:0;O:8:"stdClass":10:{s:8:"response";s:7:"upgrade";s:8:"download";s:65:"https://downloads.wordpress.org/release/bg_BG/wordpress-3.9.2.zip";s:6:"locale";s:5:"bg_BG";s:8:"packages";O:8:"stdClass":5:{s:4:"full";s:65:"https://downloads.wordpress.org/release/bg_BG/wordpress-3.9.2.zip";s:10:"no_content";b:0;s:11:"new_bundled";b:0;s:7:"partial";b:0;s:8:"rollback";b:0;}s:7:"current";s:5:"3.9.2";s:7:"version";s:5:"3.9.2";s:11:"php_version";s:5:"5.2.4";s:13:"mysql_version";s:3:"5.0";s:11:"new_bundled";s:3:"3.8";s:15:"partial_version";s:0:"";}}s:12:"last_checked";i:1407835351;s:15:"version_checked";s:5:"3.9.2";s:12:"translations";a:0:{}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2227, '_site_transient_update_plugins', 'O:8:"stdClass":3:{s:12:"last_checked";i:1407835352;s:8:"response";a:3:{s:19:"akismet/akismet.php";O:8:"stdClass":6:{s:2:"id";s:2:"15";s:4:"slug";s:7:"akismet";s:6:"plugin";s:19:"akismet/akismet.php";s:11:"new_version";s:5:"3.0.1";s:3:"url";s:38:"https://wordpress.org/plugins/akismet/";s:7:"package";s:56:"https://downloads.wordpress.org/plugin/akismet.3.0.1.zip";}s:19:"jetpack/jetpack.php";O:8:"stdClass":6:{s:2:"id";s:5:"20101";s:4:"slug";s:7:"jetpack";s:6:"plugin";s:19:"jetpack/jetpack.php";s:11:"new_version";s:5:"3.1.1";s:3:"url";s:38:"https://wordpress.org/plugins/jetpack/";s:7:"package";s:56:"https://downloads.wordpress.org/plugin/jetpack.3.1.1.zip";}s:30:"lightbox-plus/lightboxplus.php";O:8:"stdClass":6:{s:2:"id";s:4:"4129";s:4:"slug";s:13:"lightbox-plus";s:6:"plugin";s:30:"lightbox-plus/lightboxplus.php";s:11:"new_version";s:3:"2.7";s:3:"url";s:44:"https://wordpress.org/plugins/lightbox-plus/";s:7:"package";s:60:"https://downloads.wordpress.org/plugin/lightbox-plus.2.7.zip";}}s:12:"translations";a:0:{}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (1621, 'widget_akismet_widget', 'a:3:{i:1;a:0:{}i:2;a:1:{s:5:"title";s:12:"Spam Blocked";}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2031, '_transient_timeout_103f0b8c468584873b74243cf802ee10', '1405672741', 'no') ; 
INSERT INTO `wp_options` VALUES (2032, '_transient_103f0b8c468584873b74243cf802ee10', 'O:8:"stdClass":21:{s:4:"name";s:9:"Debug Bar";s:4:"slug";s:9:"debug-bar";s:7:"version";s:5:"0.8.1";s:6:"author";s:51:"<a href="http://wordpress.org/">wordpressdotorg</a>";s:14:"author_profile";s:30:"//profiles.wordpress.org/westi";s:12:"contributors";a:6:{s:15:"wordpressdotorg";s:40:"//profiles.wordpress.org/wordpressdotorg";s:4:"ryan";s:29:"//profiles.wordpress.org/ryan";s:5:"westi";s:30:"//profiles.wordpress.org/westi";s:11:"koopersmith";s:36:"//profiles.wordpress.org/koopersmith";s:5:"duck_";s:30:"//profiles.wordpress.org/duck_";s:15:"mitchoyoshitaka";s:40:"//profiles.wordpress.org/mitchoyoshitaka";}s:8:"requires";s:3:"3.1";s:6:"tested";s:5:"3.6.1";s:13:"compatibility";a:1:{s:5:"3.9.1";a:1:{s:5:"0.8.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}}s:6:"rating";d:95;s:11:"num_ratings";i:108;s:7:"ratings";a:5:{i:5;i:96;i:4;i:7;i:3;i:0;i:2;i:0;i:1;i:5;}s:10:"downloaded";i:112210;s:12:"last_updated";s:10:"2013-05-15";s:5:"added";s:10:"2010-11-04";s:8:"homepage";s:46:"http://wordpress.org/extend/plugins/debug-bar/";s:8:"sections";a:3:{s:11:"description";s:457:"<p>Adds a debug menu to the admin bar that shows query, cache, and other helpful debugging information.</p>

<p>A must for developers!</p>

<p>When WP_DEBUG is enabled it also tracks PHP Warnings and Notices to make them easier to find.</p>

<p>When SAVEQUERIES is enabled the mysql queries are tracked and displayed.</p>

<p>Add a PHP/MySQL console with the <a href="http://wordpress.org/extend/plugins/debug-bar-console/">Debug Bar Console plugin</a>.</p>";s:12:"installation";s:31:"<p>Use automatic installer.</p>";s:9:"changelog";s:1253:"<h4>0.8.1</h4>

<p>Minor security fix.</p>

<h4>0.8</h4>

<p>WordPress 3.3 compatibility
UI refresh
Removed jQuery UI requirement
Full screen by default
New debug-bar query parameter to show on page load
Removed display cookies
JavaScript error tracking (disabled by default)</p>

<h4>0.7</h4>

<p>Made compatible with PHP &#60; 5.2.0
CSS Tweaks
Load JavaScript in Footer
Fixed display issues for WP_Query debug on CPT archives pages
SQL/DB error tracking</p>

<h4>0.6</h4>

<p>Added maximize/restore button
Added cookie to keep track of debug bar state
Added post type information to WP_Query tab
Bug fix where bottom of page was obscured in the admin</p>

<h4>0.5</h4>

<p>New UI
Backend rewritten with a class for each panel
Many miscellaneous improvements</p>

<h4>0.4.1</h4>

<p>Compatibility updates for trunk</p>

<h4>0.4</h4>

<p>Added DB Version information
Updated PHP Warning and Notice tracking so that multiple different errors on the same line are tracked
Compatibility updates for trunk</p>

<h4>0.3</h4>

<p>Added WordPress Query infomation
Added Request parsing information</p>

<h4>0.2</h4>

<p>Added PHP Notice / Warning tracking when WP_DEBUG enabled
Added deprecated function usage tracking</p>

<h4>0.1</h4>

<p>Initial Release</p>";}s:17:"short_description";s:100:"Adds a debug menu to the admin bar that shows query, cache, and other helpful debugging information.";s:13:"download_link";s:57:"http://downloads.wordpress.org/plugin/debug-bar.0.8.1.zip";s:4:"tags";a:1:{s:5:"debug";s:5:"debug";}s:11:"donate_link";N;}', 'no') ; 
INSERT INTO `wp_options` VALUES (2033, '_transient_timeout_7ad44baf8bca84dd8f894b8b9c38295d', '1405672742', 'no') ; 
INSERT INTO `wp_options` VALUES (2034, '_transient_7ad44baf8bca84dd8f894b8b9c38295d', 'O:8:"stdClass":21:{s:4:"name";s:17:"Debug Bar Console";s:4:"slug";s:17:"debug-bar-console";s:7:"version";s:3:"0.3";s:6:"author";s:47:"<a href="http://darylkoop.com/">koopersmith</a>";s:14:"author_profile";s:29:"//profiles.wordpress.org/koop";s:12:"contributors";a:1:{s:11:"koopersmith";s:36:"//profiles.wordpress.org/koopersmith";}s:8:"requires";s:3:"3.1";s:6:"tested";s:5:"3.4.2";s:13:"compatibility";a:12:{s:3:"3.1";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:3;i:2;i:3;}}s:5:"3.1.3";a:1:{s:3:"0.2";a:3:{i:0;i:0;i:1;i:2;i:2;i:0;}}s:5:"3.2.1";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:3;i:2;i:3;}}s:3:"3.3";a:1:{s:3:"0.2";a:3:{i:0;i:0;i:1;i:1;i:2;i:0;}}s:5:"3.3.1";a:2:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}s:3:"0.3";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.3.2";a:1:{s:3:"0.3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.4";a:1:{s:3:"0.3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.4.2";a:1:{s:3:"0.3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.6";a:1:{s:3:"0.3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.7";a:1:{s:3:"0.3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.8";a:1:{s:3:"0.3";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.8.1";a:1:{s:3:"0.3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}}s:6:"rating";d:89.3999999999999914734871708787977695465087890625;s:11:"num_ratings";i:19;s:7:"ratings";a:5:{i:5;i:15;i:4;i:2;i:3;i:0;i:2;i:0;i:1;i:2;}s:10:"downloaded";i:26492;s:12:"last_updated";s:10:"2012-03-18";s:5:"added";s:10:"2011-01-15";s:8:"homepage";s:54:"http://wordpress.org/extend/plugins/debug-bar-console/";s:8:"sections";a:3:{s:11:"description";s:157:"<p>Adds a PHP/MySQL console to the debug bar. Requires the <a href="http://wordpress.org/extend/plugins/debug-bar/">Debug Bar plugin</a> (v0.5 or later).</p>";s:12:"installation";s:130:"<p>Install the <a href="http://wordpress.org/extend/plugins/debug-bar/">Debug Bar plugin</a>.</p>

<p>Use automatic installer.</p>";s:9:"changelog";s:264:"<h4>0.3</h4>

<p>Added syntax highlighting using the CodeMirror text editor.
Explicit PHP/SQL modes.
UI changes to reflect updated debug bar UI.</p>

<h4>0.2</h4>

<p>Improvements to MySQL detection and display.
Bug fixes.</p>

<h4>0.1</h4>

<p>Initial Release</p>";}s:17:"short_description";s:73:"Adds a PHP/MySQL console to the debug bar. Requires the debug bar plugin.";s:13:"download_link";s:63:"http://downloads.wordpress.org/plugin/debug-bar-console.0.3.zip";s:4:"tags";a:3:{s:7:"console";s:7:"console";s:5:"debug";s:5:"debug";s:9:"developer";s:9:"developer";}s:11:"donate_link";N;}', 'no') ; 
INSERT INTO `wp_options` VALUES (2035, '_transient_timeout_1fbb1f267fb1d61082ffbe5ac16cc4aa', '1405672743', 'no') ; 
INSERT INTO `wp_options` VALUES (2036, '_transient_1fbb1f267fb1d61082ffbe5ac16cc4aa', 'O:8:"stdClass":21:{s:4:"name";s:14:"Debug Bar Cron";s:4:"slug";s:14:"debug-bar-cron";s:7:"version";s:5:"0.1.2";s:6:"author";s:70:"<a href="http://github.com/tollmanz">Zack Tollman, Helen Hou-Sandi</a>";s:14:"author_profile";s:33:"//profiles.wordpress.org/tollmanz";s:12:"contributors";a:3:{s:8:"tollmanz";s:33:"//profiles.wordpress.org/tollmanz";s:5:"helen";s:30:"//profiles.wordpress.org/helen";s:4:"10up";s:29:"//profiles.wordpress.org/10up";}s:8:"requires";s:3:"3.3";s:6:"tested";s:5:"trunk";s:13:"compatibility";a:7:{s:3:"3.3";a:1:{s:3:"0.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.3.1";a:2:{s:3:"0.1";a:3:{i:0;i:100;i:1;i:3;i:2;i:3;}s:5:"0.1.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.3.2";a:1:{s:3:"0.1";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.4.1";a:1:{s:5:"0.1.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.4.2";a:1:{s:5:"0.1.2";a:3:{i:0;i:67;i:1;i:3;i:2;i:2;}}s:5:"3.5.2";a:1:{s:5:"0.1.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.6";a:1:{s:5:"0.1.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}}s:6:"rating";d:100;s:11:"num_ratings";i:9;s:7:"ratings";a:5:{i:5;i:9;i:4;i:0;i:3;i:0;i:2;i:0;i:1;i:0;}s:10:"downloaded";i:21942;s:12:"last_updated";s:10:"2013-12-28";s:5:"added";s:10:"2012-03-29";s:8:"homepage";s:27:"http://github.com/tollmanz/";s:8:"sections";a:5:{s:11:"description";s:535:"<p>Debug Bar Cron adds information about WP scheduled events to a new panel in the Debug Bar. This plugin is an extension for
Debug Bar and thus is dependent upon Debug Bar being installed for it to work properly.</p>

<p>Once installed, you will have access to the following information:</p>

<ul>
<li>Number of scheduled events</li>
<li>If cron is currently running</li>
<li>Time of next event</li>
<li>Current time</li>
<li>List of custom scheduled events</li>
<li>List of core scheduled events</li>
<li>List of schedules</li>
</ul>";s:12:"installation";s:444:"<ol>
<li>Install Debug Bar if not already installed (<a href="http://wordpress.org/extend/plugins/debug-bar/" rel="nofollow">http://wordpress.org/extend/plugins/debug-bar/</a>)</li>
<li>Upload the <code>debug-bar-cron</code> folder to the <code>/wp-content/plugins/</code> directory</li>
<li>Activate the plugin through the \'Plugins\' menu in WordPress</li>
<li>View the WP schedule events information in the "Cron" panel in Debug Bar</li>
</ol>";s:11:"screenshots";s:274:"<ol>
	<li>
		<a href=\'//s.w.org/plugins/debug-bar-cron/screenshot-1.png?r=0\' title=\'Click to view full-size screenshot 1\'><img src=\'//s.w.org/plugins/debug-bar-cron/screenshot-1.png?r=0\' alt=\'debug-bar-cron screenshot 1\' /></a>
		<p>The Debug Bar Cron panel</p>
	</li>
</ol>";s:9:"changelog";s:614:"<h4>0.1.3</h4>

<ul>
<li>Fixed \'Array to string conversion\' error when Cron job arguments are in a multi-dimensional array - props <a href="http://profiles.wordpress.org/jrf">Jrf</a>, <a href="http://profiles.wordpress.org/ethitter">ethitter</a>, and <a href="http://profiles.wordpress.org/mintindeed">mintindeed</a>.</li>
<li>Fixed a number of HTML validation errors - props <a href="http://profiles.wordpress.org/jrf">Jrf</a>.</li>
</ul>

<h4>0.1.2</h4>

<ul>
<li>Added indicators for missed events</li>
</ul>

<h4>0.1.1</h4>

<ul>
<li>Readme updates</li>
</ul>

<h4>0.1</h4>

<ul>
<li>Initial release</li>
</ul>";s:3:"faq";s:63:"<h4>Is debugging cron easier with this plugin?</h4>

<p>Yes</p>";}s:17:"short_description";s:97:"Debug Bar Cron adds a new panel to Debug Bar that displays information about WP scheduled events.";s:13:"download_link";s:62:"http://downloads.wordpress.org/plugin/debug-bar-cron.0.1.3.zip";s:4:"tags";a:2:{s:4:"cron";s:4:"cron";s:9:"debug-bar";s:9:"debug bar";}s:11:"donate_link";s:20:"http://wordpress.org";}', 'no') ; 
INSERT INTO `wp_options` VALUES (2037, '_transient_timeout_586babf78dd2ddffe1f09307810c9d78', '1405672744', 'no') ; 
INSERT INTO `wp_options` VALUES (2038, '_transient_586babf78dd2ddffe1f09307810c9d78', 'O:8:"stdClass":21:{s:4:"name";s:18:"Debug-Bar-Extender";s:4:"slug";s:18:"debug-bar-extender";s:7:"version";s:3:"0.5";s:6:"author";s:66:"<a href="http://hitchhackerguide.com">Thorsten Ott, Automattic</a>";s:14:"author_profile";s:29:"//profiles.wordpress.org/tott";s:12:"contributors";a:2:{s:4:"tott";s:29:"//profiles.wordpress.org/tott";s:10:"automattic";s:35:"//profiles.wordpress.org/automattic";}s:8:"requires";s:3:"3.1";s:6:"tested";s:5:"3.2.1";s:13:"compatibility";a:12:{s:3:"3.1";a:2:{s:3:"0.1";a:3:{i:0;i:50;i:1;i:2;i:2;i:1;}s:3:"0.2";a:3:{i:0;i:50;i:1;i:2;i:2;i:1;}}s:5:"3.1.1";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.2.1";a:2:{s:3:"0.3";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}s:3:"0.5";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.3";a:1:{s:3:"0.5";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.3.1";a:1:{s:3:"0.5";a:3:{i:0;i:0;i:1;i:1;i:2;i:0;}}s:5:"3.3.2";a:1:{s:3:"0.5";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.4.1";a:1:{s:3:"0.5";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.5";a:1:{s:3:"0.5";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.5.1";a:1:{s:3:"0.5";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.6";a:1:{s:3:"0.5";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.8";a:1:{s:3:"0.5";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.8.1";a:1:{s:3:"0.5";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}}s:6:"rating";d:87.2000000000000028421709430404007434844970703125;s:11:"num_ratings";i:22;s:7:"ratings";a:5:{i:5;i:15;i:4;i:4;i:3;i:1;i:2;i:0;i:1;i:2;}s:10:"downloaded";i:23792;s:12:"last_updated";s:10:"2011-09-02";s:5:"added";s:10:"2011-03-02";s:8:"homepage";s:55:"http://wordpress.org/extend/plugins/debug-bar-extender/";s:8:"sections";a:4:{s:11:"description";s:415:"<p>This plugins adds more features to the debug-bar and is mainly aimed at developers who like to debug their code or want to measure runtimes to find glitches in their code.
It also allows lookup of variables by adding simple code snippets in your source.</p>

<p>Please note that this plugin should be used solely for debugging or on a development environment and is not intended for use in a production site.</p>";s:11:"screenshots";s:917:"<ol>
	<li>
		<a href=\'//s.w.org/plugins/debug-bar-extender/screenshot-1.jpg?r=0\' title=\'Click to view full-size screenshot 1\'><img src=\'//s.w.org/plugins/debug-bar-extender/screenshot-1.jpg?r=0\' alt=\'debug-bar-extender screenshot 1\' /></a>
		<p>Settings screen to enable/disable various features.</p>
	</li>
	<li>
		<a href=\'//s.w.org/plugins/debug-bar-extender/screenshot-2.jpg?r=0\' title=\'Click to view full-size screenshot 2\'><img src=\'//s.w.org/plugins/debug-bar-extender/screenshot-2.jpg?r=0\' alt=\'debug-bar-extender screenshot 2\' /></a>
		<p>Profiler output showing the runtimes between default checkpoints.</p>
	</li>
	<li>
		<a href=\'//s.w.org/plugins/debug-bar-extender/screenshot-3.jpg?r=0\' title=\'Click to view full-size screenshot 3\'><img src=\'//s.w.org/plugins/debug-bar-extender/screenshot-3.jpg?r=0\' alt=\'debug-bar-extender screenshot 3\' /></a>
		<p>Lookup of various default variables</p>
	</li>
</ol>";s:9:"changelog";s:1464:"<h4>Version 0.5</h4>

<ul>
<li>added filters to control settings <code>debugbarextender_default_settings</code>, <code>debugbarextender_default_checkpoint_actions</code></li>
<li>added wrapper functions <code>dbgx_checkpoint( $note = \'\' )</code> and <code>dbgx_trace_var( $value, $var_name = false )</code> for easier access to debugging functions.</li>
<li>added new setting option to allow control of some settings via $_GET parameters in the urls. Allows dbgx_use_error_log, dbgx_track_default_vars, dbgx_add_default_checkpoints to be added as query strings in order to enable respective features. Combinations are possible - for example: /wp-admin/options-general.php?page=debug-bar-extender&#38;dbgx_use_error_log=1&#38;dbgx_add_default_checkpoints=1&#38;dbgx_track_default_vars=1 </li>
<li>added new setting option to enable a admin bar menu with shortcuts to this urls</li>
</ul>

<h4>Version 0.4</h4>

<ul>
<li>Moving style enqueuing to init hook. We don\'t want to be doing it wrong <a href="http://core.trac.wordpress.org/changeset/18556" rel="nofollow">http://core.trac.wordpress.org/changeset/18556</a></li>
</ul>

<h4>Version 0.3</h4>

<ul>
<li>Fixed conflicting enqueueing which should fix issues with Debug Console plugin. Thanks to AaronCampbell and Westi</li>
</ul>

<h4>Version 0.2</h4>

<ul>
<li>fixed: prevent filters which have same names as actions to fail.</li>
</ul>

<h4>Version 0.1</h4>

<ul>
<li>Initial version of this plugin.</li>
</ul>";s:11:"other_notes";s:4635:"<h3>Requirements</h3>
<p>This plugin requires <a href="http://wordpress.org/extend/plugins/debug-bar">the debug-bar plugin &#62;0.5</a> and a developers\' brain to work correctly.</p>
<h3>Usage</h3>
<h4>Usage example to debug the loop of a theme</h4>

<p>Add your checkpoints in the index.php or any other template file as shown below.</p>

<pre><code>&#60;?php if (have_posts()) : ?&#62;

&#60;?php Debug_Bar_Extender::instance()-&#62;checkpoint(&#039;loop start&#039;); ?&#62;

&#60;?php while (have_posts()) : the_post(); ?&#62;

&#60;?php Debug_Bar_Extender::instance()-&#62;trace_var( $post ); ?&#62;

&#60;?php Debug_Bar_Extender::instance()-&#62;checkpoint(&#039;loop1&#039;); ?&#62;

&#60;div &#60;?php post_class() ?&#62; id=&#34;post-&#60;?php the_ID(); ?&#62;&#34;&#62;
&#60;?php //before_post(); ?&#62;
&#60;h2&#62;&#60;a href=&#34;&#60;?php the_permalink() ?&#62;&#34; rel=&#34;bookmark&#34; title=&#34;&#60;?php printf(__(&#039;Permanent Link to %s&#039;, &#039;kubrick&#039;), the_title_attribute(&#039;echo=0&#039;)); ?&#62;&#34;&#62;&#60;?php the_title(); ?&#62;&#60;/a&#62;&#60;/h2&#62;
&#60;small&#62;&#60;?php the_time(get_option(&#039;date_format&#039;)) ?&#62; by &#60;?php the_author() ?&#62;&#60;/small&#62;
&#60;div class=&#34;entry&#34;&#62;
&#60;?php the_content(__(&#039;Read the rest of this entry &#38;raquo;&#039;, &#039;kubrick&#039;)); ?&#62;
&#60;/div&#62;
&#60;p class=&#34;postmetadata&#34;&#62;&#60;?php the_tags(__(&#039;Tags:&#039;, &#039;kubrick&#039;) . &#039; &#039;, &#039;, &#039;, &#039;&#60;br /&#62;&#039;); ?&#62; &#60;?php printf(__(&#039;Posted in %s&#039;, &#039;kubrick&#039;), get_the_category_list(&#039;, &#039;)); ?&#62; &#124; &#60;?php edit_post_link(__(&#039;Edit&#039;, &#039;kubrick&#039;), &#039;&#039;, &#039; &#124; &#039;); ?&#62; &#60;?php comments_popup_link(__(&#039;No Comments &#187;&#039;, &#039;kubrick&#039;), __(&#039;1 Comment &#187;&#039;, &#039;kubrick&#039;), __(&#039;% Comments &#187;&#039;, &#039;kubrick&#039;)); ?&#62;&#60;/p&#62;
&#60;?php after_post(); ?&#62;
&#60;/div&#62;

&#60;?php Debug_Bar_Extender::instance()-&#62;checkpoint(&#039;loop2&#039;); ?&#62;

&#60;?php endwhile; ?&#62;

&#60;?php Debug_Bar_Extender::instance()-&#62;checkpoint(&#039;loop end&#039;); ?&#62;

&#60;div class=&#34;navigation&#34;&#62;
&#60;div class=&#34;alignleft&#34;&#62;&#60;?php next_posts_link(__(&#039;&#38;laquo; Older Entries&#039;, &#039;kubrick&#039;)) ?&#62;&#60;/div&#62;
&#60;div class=&#34;alignright&#34;&#62;&#60;?php previous_posts_link(__(&#039;Newer Entries &#38;raquo;&#039;, &#039;kubrick&#039;)) ?&#62;&#60;/div&#62;
&#60;/div&#62;
&#60;?php else : ?&#62;</code></pre>
<h3>Advanced usage</h3>
<p>Looking at the source of the debug-bar-extender.php you will notice that there are various filters to control the default settings. This is useful when you are working on a multisite install and want to use the debug bar without having to adjust the settings every time. Here\'s an example of how settings enforced by a php file in mu-plugins/ could look like</p>

<pre><code>add_filter( &#039;debugbarextender_default_settings&#039;, &#039;my_debug_bar_extender_settings&#039; );
// enforce debug bar settings
function my_debug_bar_extender_settings( $default_settings ) {
    $default_settings = array(
            &#039;enable_profiler&#039;             =&#62; 1,
            &#039;enable_variable_lookup&#039;      =&#62; 1,
            &#039;track_default_vars&#039;          =&#62; 0,
            &#039;add_default_checkpoints&#039;     =&#62; 1,
            &#039;savequeries_debugmode_enable&#039;    =&#62; 1,
            &#039;use_error_log&#039;                   =&#62; 0,
            &#039;allow_url_settings&#039;          =&#62; 1,
            &#039;enable_admin_bar_menu&#039;           =&#62; 1,
    );
    return $default_settings;
}

add_filter( &#039;debugbarextender_default_checkpoint_actions&#039;, &#039;my_debug_bar_extender_checkpoints&#039; );
// initiate some default checkpoints
function my_debug_bar_extender_checkpoints( $default_checkpoints ) {
    $default_checkpoints = array(
                    &#039;muplugins_loaded&#039;,
                    &#039;wp_head&#039;,
                    &#039;wp_footer&#039;,
                    &#039;loop_start&#039;,
                    &#039;loop_end&#039;,
                    &#039;shutdown&#039;,
    );
    return $default_checkpoints;
}</code></pre>
<h3>Wishlist</h3>
<p>This is a work in progress, so feel free to pass by on <a href="http://hitchhackerguide.com/wordpress-plugins/debug-bar-extender/">our plugin page</a> and leave us
your suggestions in the comments.</p>";}s:17:"short_description";s:118:"Extends the debug-bar plugin with additional tabs to measure runtimes between checkpoints and lookup variable content.";s:13:"download_link";s:60:"http://downloads.wordpress.org/plugin/debug-bar-extender.zip";s:4:"tags";a:3:{s:5:"debug";s:5:"debug";s:9:"debug-bar";s:9:"debug bar";s:11:"development";s:11:"development";}s:11:"donate_link";s:27:"http://hitchhackerguide.com";}', 'no') ; 
INSERT INTO `wp_options` VALUES (2039, '_transient_timeout_0e09669bc4eb6aa3ee6183997a4a0d96', '1405672745', 'no') ; 
INSERT INTO `wp_options` VALUES (2040, '_transient_0e09669bc4eb6aa3ee6183997a4a0d96', 'O:8:"stdClass":21:{s:4:"name";s:23:"Rewrite Rules Inspector";s:4:"slug";s:23:"rewrite-rules-inspector";s:7:"version";s:5:"1.2.1";s:6:"author";s:65:"<a href="http://automattic.com/">Daniel Bachhuber, Automattic</a>";s:14:"author_profile";s:40:"//profiles.wordpress.org/danielbachhuber";s:12:"contributors";a:3:{s:15:"danielbachhuber";s:40:"//profiles.wordpress.org/danielbachhuber";s:10:"automattic";s:35:"//profiles.wordpress.org/automattic";s:8:"tmoorewp";s:33:"//profiles.wordpress.org/tmoorewp";}s:8:"requires";s:3:"3.1";s:6:"tested";s:5:"3.5.2";s:13:"compatibility";a:8:{s:5:"3.3.1";a:1:{s:3:"1.0";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.3.2";a:1:{s:3:"1.0";a:3:{i:0;i:100;i:1;i:4;i:2;i:4;}}s:5:"3.4.1";a:2:{s:3:"1.0";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}s:3:"1.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.4.2";a:2:{s:3:"1.0";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}s:3:"1.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.5.1";a:1:{s:3:"1.2";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:3:"3.6";a:1:{s:3:"1.2";a:3:{i:0;i:0;i:1;i:1;i:2;i:0;}}s:5:"3.7.1";a:1:{s:5:"1.2.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.9";a:1:{s:5:"1.2.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}}s:6:"rating";d:100;s:11:"num_ratings";i:18;s:7:"ratings";a:5:{i:5;i:18;i:4;i:0;i:3;i:0;i:2;i:0;i:1;i:0;}s:10:"downloaded";i:33712;s:12:"last_updated";s:10:"2013-09-24";s:5:"added";s:10:"2012-05-09";s:8:"homepage";s:60:"http://wordpress.org/extend/plugins/rewrite-rules-inspector/";s:8:"sections";a:3:{s:11:"description";s:720:"<p>A straightforward WordPress admin tool for inspecting your rewrite rules. View a listing of all your rewrite rules, see which rewrite rules match a given URL (and the priorites they match in), or filter by different sources of rewrite rules. Perform a soft flush of your rewrite rules to regenerate them.</p>

<p>Originally developed for <a href="http://vip.wordpress.com/">WordPress.com VIP</a>-hosted clients, we thought it would be useful for development environments, etc. too. Feel free to <a href="https://github.com/Automattic/Rewrite-Rules-Inspector/">fork the plugin in Github</a> &#8212; pull requests are always welcome. Hit us with feedback, questions, bug reports, and feature requests in the forums.</p>";s:11:"screenshots";s:685:"<ol>
	<li>
		<a href=\'//s.w.org/plugins/rewrite-rules-inspector/screenshot-1.jpg?r=0\' title=\'Click to view full-size screenshot 1\'><img src=\'//s.w.org/plugins/rewrite-rules-inspector/screenshot-1.jpg?r=0\' alt=\'rewrite-rules-inspector screenshot 1\' /></a>
		<p>See which rewrite rules match a given URL (and the priorites they match in)</p>
	</li>
	<li>
		<a href=\'//s.w.org/plugins/rewrite-rules-inspector/screenshot-2.jpg?r=0\' title=\'Click to view full-size screenshot 2\'><img src=\'//s.w.org/plugins/rewrite-rules-inspector/screenshot-2.jpg?r=0\' alt=\'rewrite-rules-inspector screenshot 2\' /></a>
		<p>Error message appears if rewrite rules are missing in the database</p>
	</li>
</ol>";s:9:"changelog";s:917:"<h4>1.2.1 (Sept. 19, 2013)</h4>

<ul>
<li>Fix for strict standards error in declaration of Rewrite_Rules_Inspector_List_Table::single_row(). props @simonhampel</li>
</ul>

<h4>1.2 (Jan. 16, 2013)</h4>

<ul>
<li>Modify the rewrite rule source with a filter. Props <a href="https://github.com/jeremyfelt">jeremyfelt</a></li>
</ul>

<h4>1.1 (Sept. 25, 2012)</h4>

<ul>
<li>Support for route matching when WordPress lives in a subdirectory. Props <a href="https://github.com/dbernar1">dbernar1</a></li>
<li>Display a success message after you\'ve flushed your rewrite rules</li>
</ul>

<h4>1.0 (May 9, 2012)</h4>

<ul>
<li>Initial public release!</li>
<li>View a listing of all your rewrite rules</li>
<li>See which rewrite rules match a given URL (and the priorites they match in)</li>
<li>Filter by different sources of rewrite rules</li>
<li>Error message appears if rewrite rules are missing in the database</li>
</ul>";}s:17:"short_description";s:70:"Straightforward WordPress admin tool for inspecting your rewrite rules";s:13:"download_link";s:71:"http://downloads.wordpress.org/plugin/rewrite-rules-inspector.1.2.1.zip";s:4:"tags";a:2:{s:13:"rewrite-rules";s:13:"rewrite rules";s:5:"tools";s:5:"tools";}s:11:"donate_link";N;}', 'no') ; 
INSERT INTO `wp_options` VALUES (2201, '_transient_timeout_feed_mod_b9388c83948825c1edaef0d856b7b109', '1407186382', 'no') ; 
INSERT INTO `wp_options` VALUES (2202, '_transient_feed_mod_b9388c83948825c1edaef0d856b7b109', '1407143182', 'no') ; 
INSERT INTO `wp_options` VALUES (2205, '_transient_timeout_dash_4077549d03da2e451c8b5f002294ff51', '1407186382', 'no') ; 
INSERT INTO `wp_options` VALUES (2206, '_transient_dash_4077549d03da2e451c8b5f002294ff51', '<div class="rss-widget"><ul><li><a class=\'rsswidget\' href=\'http://wordpress.org/news/2014/07/wordpress-4-0-beta-2/\'>WordPress 4.0 Beta 2</a> <span class="rss-date">July 18, 2014</span><div class="rssSummary">WordPress 4.0 Beta 2 is now available for download and testing. This is software still in development, so we don’t recommend that you run it on a production site. To get the beta, try the WordPress Beta Tester plugin (you’ll want “bleeding edge nightlies”). Or you can download the beta here (zip). For more of what’s new in version 4.0, check out […]</div></li></ul></div><div class="rss-widget"><ul><li><a class=\'rsswidget\' href=\'http://wptavern.com/wordpress-tip-disable-the-toolbar-on-a-per-user-role-basis?utm_source=rss&#038;utm_medium=rss&#038;utm_campaign=wordpress-tip-disable-the-toolbar-on-a-per-user-role-basis\' title=\'The WordPress toolbar is shown by default to all users, but administration screen links aren’t always useful for everyone. For example, on most sites the subscriber user role is very limited and doesn’t require access to the backend. Disable Toolbar is a new plugin that gives administrators the ability to turn the toolbar off on the frontend, based on user r\'>WPTavern: WordPress Tip: Disable the Toolbar on a Per-User-Role Basis</a></li><li><a class=\'rsswidget\' href=\'http://wordpress.tv/2014/08/03/aaron-holbrook-introduction-to-ides-and-debugging/\' title=\'\'>WordPress.tv: Aaron Holbrook: Introduction to IDEs and Debugging</a></li><li><a class=\'rsswidget\' href=\'http://wordpress.tv/2014/08/03/rebecca-gill-solutions-before-development-creating-wordpress-products-that-actually-sell/\' title=\'\'>WordPress.tv: Rebecca Gill: Solutions Before Development – Creating WordPress Products That Actually Sell</a></li></ul></div><div class="rss-widget"><ul><li class=\'dashboard-news-plugin\'><span>Popular Plugin:</span> <a href=\'http://wordpress.org/plugins/captcha/\' class=\'dashboard-news-plugin-link\'>Captcha</a>&nbsp;<span>(<a href=\'plugin-install.php?tab=plugin-information&amp;plugin=captcha&amp;_wpnonce=545f13cecc&amp;TB_iframe=true&amp;width=600&amp;height=800\' class=\'thickbox\' title=\'Captcha\'>Install</a>)</span></li></ul></div>', 'no') ; 
INSERT INTO `wp_options` VALUES (2189, '_site_transient_timeout_browser_6f55f024304e069ddbc86244a599bc9b', '1407747551', 'yes') ; 
INSERT INTO `wp_options` VALUES (2190, '_site_transient_browser_6f55f024304e069ddbc86244a599bc9b', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:12:"31.0.1650.57";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (346, 'a8c_developer', 'a:1:{s:12:"project_type";s:11:"wporg-theme";}', 'yes') ; 
INSERT INTO `wp_options` VALUES (379, 'log_deprecated_notices', 'a:2:{s:11:"last_viewed";s:19:"2014-07-11 11:38:44";s:10:"db_version";i:4;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2175, 'theme_mods_modelun', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1407147728;s:4:"data";a:7:{s:19:"wp_inactive_widgets";a:15:{i:0;s:10:"archives-2";i:1;s:8:"search-4";i:2;s:14:"recent-posts-2";i:3;s:17:"recent-comments-2";i:4;s:11:"tag_cloud-2";i:5;s:10:"nav_menu-2";i:6;s:16:"akismet_widget-2";i:7;s:9:"monster-9";i:8;s:7:"links-2";i:9;s:6:"meta-5";i:10;s:9:"monster-4";i:11;s:9:"monster-5";i:12;s:9:"monster-6";i:13;s:9:"monster-7";i:14;s:9:"monster-8";}s:4:"blog";a:1:{i:0;s:9:"monster-3";}s:9:"portfolio";a:3:{i:0;s:6:"text-2";i:1;s:8:"search-2";i:2;s:10:"calendar-2";}s:4:"page";a:0:{}s:14:"footer-sidebar";a:0:{}s:18:"orphaned_widgets_1";a:1:{i:0;s:7:"pages-2";}s:18:"orphaned_widgets_2";a:1:{i:0;s:6:"meta-4";}}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2212, '_transient_is_multi_author', '0', 'yes') ; 
INSERT INTO `wp_options` VALUES (2177, 'simplecorp', 'a:66:{s:8:"sc_clogo";s:81:"http://127.0.0.1:4001/wordpress/wp-content/themes/modelun/library/images/logo.png";s:13:"sc_clogo_text";s:10:"SimpleCorp";s:14:"sc_colorscheme";s:0:"";s:26:"sc_custom_shortcut_favicon";s:0:"";s:17:"sc_showpageheader";s:1:"1";s:16:"sc_pageheaderurl";s:87:"http://127.0.0.1:4001/wordpress/wp-content/themes/modelun/library/images/pageheader.jpg";s:19:"sc_customtypography";s:1:"1";s:18:"sc_headingfontlink";s:103:"&lt;link href=\\\'http://fonts.googleapis.com/css?family=Dosis\\\' rel=\\\'stylesheet\\\' type=\\\'text/css\\\'&gt;";s:18:"sc_headingfontface";s:34:"font-family: \\\'Dosis\\\', sans-serif";s:12:"sc_blurbhome";s:1:"1";s:8:"sc_blurb";s:170:"Welcome to Our Small Agency. We specialize in <strong>Web Design</strong> and <strong>Development</strong>. Check out our outstanding portfolio, and get in touch with Us!";s:14:"sc_homecontent";s:1:"1";s:20:"sc_homecontent1title";s:16:"Awesome Features";s:15:"sc_homecontent1";s:111:"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.";s:18:"sc_homecontent1img";s:105:"http://127.0.0.1:4001/wordpress/wp-content/themes/modelun/library/images/sampleimages/featured-img-01.png";s:18:"sc_homecontent1url";s:1:"#";s:20:"sc_homecontent2title";s:21:"Browser Compatibility";s:15:"sc_homecontent2";s:111:"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.";s:18:"sc_homecontent2img";s:105:"http://127.0.0.1:4001/wordpress/wp-content/themes/modelun/library/images/sampleimages/featured-img-02.png";s:18:"sc_homecontent2url";s:1:"#";s:20:"sc_homecontent3title";s:23:"Works on Mobile Devices";s:15:"sc_homecontent3";s:111:"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.";s:18:"sc_homecontent3img";s:105:"http://127.0.0.1:4001/wordpress/wp-content/themes/modelun/library/images/sampleimages/featured-img-03.png";s:18:"sc_homecontent3url";s:1:"#";s:20:"sc_homecontent4title";s:18:"Full Documentation";s:15:"sc_homecontent4";s:111:"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.";s:18:"sc_homecontent4img";s:105:"http://127.0.0.1:4001/wordpress/wp-content/themes/modelun/library/images/sampleimages/featured-img-04.png";s:18:"sc_homecontent4url";s:1:"#";s:16:"sc_portfoliohome";s:1:"1";s:21:"sc_portfoliohometitle";s:29:"Some of Our Featured Projects";s:27:"sc_portfoliohomebuttontitle";s:19:"View full portfolio";s:25:"sc_portfoliohomebuttonurl";s:1:"#";s:16:"sc_displayslider";s:0:"";s:12:"sc_slidertag";s:0:"";s:13:"sc_slidertype";s:4:"flex";s:15:"sc_slidereffect";s:5:"slide";s:23:"sc_slideranimationspeed";s:3:"500";s:18:"sc_sliderpausetime";s:4:"3000";s:12:"sc_authorbox";s:1:"1";s:19:"sc_portfoliofilters";s:7:"regular";s:24:"sc_portfolioitemsperpage";s:1:"6";s:18:"sc_contact_address";s:53:"75 Ninth Avenue 2nd and 4th Floors New York, NY 10011";s:16:"sc_contact_phone";s:15:"+1 212-565-0000";s:14:"sc_contact_fax";s:15:"+1 212-565-0000";s:16:"sc_contact_email";s:17:"info@yoursite.com";s:14:"sc_contact_map";s:0:"";s:10:"sc_twitter";s:0:"";s:11:"sc_facebook";s:0:"";s:13:"sc_googleplus";s:0:"";s:10:"sc_dribble";s:0:"";s:8:"sc_vimeo";s:0:"";s:8:"sc_skype";s:0:"";s:11:"sc_linkedin";s:0:"";s:12:"sc_pinterest";s:0:"";s:6:"sc_rss";s:1:"1";s:9:"sc_extrss";s:0:"";s:13:"sc_enablemeta";s:1:"1";s:18:"sc_metadescription";s:69:"full functionable, premium wordpress theme solution for your website.";s:15:"sc_metakeywords";s:108:"proffesional wordpress theme, flexible wordpress theme, wordpress all in one theme, premium wordpress theme ";s:15:"sc_revisitafter";s:1:"2";s:14:"sc_enablerobot";s:1:"1";s:11:"sc_metabots";s:0:"";s:16:"sc_metagooglebot";s:0:"";s:19:"sc_footer_copyright";s:105:"&copy; Copyright 2012 SimpleCorp by <a href=\\\'http://www.site5.com\\\'>Site5.com</a>. All Rights Reserved. ";s:8:"sc_stats";s:0:"";s:11:"sc_css_code";s:0:"";}', 'yes') ; 
INSERT INTO `wp_options` VALUES (916, 'jetpack_activated', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (917, 'jetpack_options', 'a:4:{s:7:"version";s:16:"2.9.3:1397217664";s:11:"old_version";s:16:"2.9.3:1397217664";s:28:"fallback_no_verify_ssl_certs";i:0;s:9:"time_diff";i:0;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (919, 'jetpack_log', 'a:3:{i:0;a:4:{s:4:"time";i:1397217672;s:7:"user_id";i:1;s:7:"blog_id";b:0;s:4:"code";s:8:"register";}i:1;a:4:{s:4:"time";i:1399552028;s:7:"user_id";i:1;s:7:"blog_id";b:0;s:4:"code";s:8:"register";}i:2;a:4:{s:4:"time";i:1399552307;s:7:"user_id";i:1;s:7:"blog_id";b:0;s:4:"code";s:8:"register";}}', 'no') ; 
INSERT INTO `wp_options` VALUES (926, 'lightboxplus_options', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (1723, 'theme_mods_sumi-shoshi', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1404204115;s:4:"data";a:8:{s:19:"wp_inactive_widgets";a:4:{i:0;s:9:"monster-4";i:1;s:9:"monster-5";i:2;s:9:"monster-6";i:3;s:9:"monster-7";}s:18:"orphaned_widgets_1";a:2:{i:0;s:9:"monster-3";i:1;s:7:"pages-2";}s:18:"orphaned_widgets_2";a:4:{i:0;s:6:"meta-4";i:1;s:6:"text-2";i:2;s:8:"search-2";i:3;s:10:"calendar-2";}s:18:"orphaned_widgets_3";a:5:{i:0;s:8:"search-4";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:9:"monster-8";}s:18:"orphaned_widgets_4";a:3:{i:0;s:9:"monster-9";i:1;s:16:"akismet_widget-2";i:2;s:7:"links-2";}s:18:"orphaned_widgets_5";a:1:{i:0;s:10:"nav_menu-2";}s:18:"orphaned_widgets_6";a:1:{i:0;s:6:"meta-5";}s:18:"orphaned_widgets_7";a:1:{i:0;s:11:"tag_cloud-2";}}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (871, 'auto_core_update_notified', 'a:4:{s:4:"type";s:7:"success";s:5:"email";s:21:"admin@localhost.local";s:7:"version";s:5:"3.9.2";s:9:"timestamp";i:1407835354;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2195, '_transient_timeout_feed_867bd5c64f85878d03a060509cd2f92c', '1407186381', 'no') ; 
INSERT INTO `wp_options` VALUES (1730, 'theme_mods_starkers-master', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1404109864;s:4:"data";a:8:{s:19:"wp_inactive_widgets";a:4:{i:0;s:9:"monster-4";i:1;s:9:"monster-5";i:2;s:9:"monster-6";i:3;s:9:"monster-7";}s:18:"orphaned_widgets_1";a:2:{i:0;s:9:"monster-3";i:1;s:7:"pages-2";}s:18:"orphaned_widgets_2";a:4:{i:0;s:6:"meta-4";i:1;s:6:"text-2";i:2;s:8:"search-2";i:3;s:10:"calendar-2";}s:18:"orphaned_widgets_3";a:5:{i:0;s:8:"search-4";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:9:"monster-8";}s:18:"orphaned_widgets_4";a:3:{i:0;s:9:"monster-9";i:1;s:16:"akismet_widget-2";i:2;s:7:"links-2";}s:18:"orphaned_widgets_5";a:1:{i:0;s:10:"nav_menu-2";}s:18:"orphaned_widgets_6";a:1:{i:0;s:6:"meta-5";}s:18:"orphaned_widgets_7";a:1:{i:0;s:11:"tag_cloud-2";}}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2220, '_transient_timeout_feed_c338a64000c51ebf6963bece9325ec30', '1407878519', 'no') ; 
INSERT INTO `wp_options` VALUES (2221, '_transient_feed_c338a64000c51ebf6963bece9325ec30', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"


";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:57:"
	
	
	
	
	
	
		
		
	


	
	
	
		
		
		
		
		
		
		
		
		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:3:{s:0:"";a:9:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:11:"ThemeShaper";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:22:"http://themeshaper.com";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:24:"Shaping WordPress Themes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:13:"lastBuildDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 12 Aug 2014 03:29:07 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:2:"en";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:9:"generator";a:1:{i:0;a:5:{s:4:"data";s:21:"http://wordpress.com/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:5:"cloud";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:5:{s:6:"domain";s:15:"themeshaper.com";s:4:"port";s:2:"80";s:4:"path";s:17:"/?rsscloud=notify";s:17:"registerProcedure";s:0:"";s:8:"protocol";s:9:"http-post";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:5:"image";a:1:{i:0;a:6:{s:4:"data";s:11:"
		
		
		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:3:{s:3:"url";a:1:{i:0;a:5:{s:4:"data";s:115:"http://1.gravatar.com/blavatar/d444e67375d022ca42f4266011555f8c?s=96&d=http%3A%2F%2Fs2.wp.com%2Fi%2Fbuttonw-com.png";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:11:"ThemeShaper";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:22:"http://themeshaper.com";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}s:4:"item";a:10:{i:0;a:6:{s:4:"data";s:62:"
		
		
		
		
		
				
		
		
		

		
		
				
			
		
	
		
		

		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:6:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:16:"Sass comes to _s";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"http://themeshaper.com/2014/08/11/sass-comes-to-_s/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:60:"http://themeshaper.com/2014/08/11/sass-comes-to-_s/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 11 Aug 2014 17:59:19 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:4:{i:0;a:5:{s:4:"data";s:17:"Theme Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:4:"Sass";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:11:"underscores";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:3;a:5:{s:4:"data";s:2:"_s";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:30:"http://themeshaper.com/?p=5640";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:440:"I&#8217;m pleased to announce that you can now get Sass rolled into _s by simply checking the box on Underscores.me. &#8230; <a href="http://themeshaper.com/2014/08/11/sass-comes-to-_s/" class="more-link">Continue reading <span class="meta-nav">&#8594;</span></a><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5640&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Tammie Lister";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2326:"<p>I&#8217;m pleased to announce that you can now get Sass rolled into <code>_s</code> by simply checking the box on <a href="http://underscores.me/">Underscores.me</a>. The community has driven this change through pull requests and forks.</p>
<p>It&#8217;s taken a little while, but we wanted to do it right. As with the rest of Underscores, we wanted to keep it as simple as possible, offering any extra scripting with a checkbox option rather than imposing it on all developers. Not everyone compiles or uses Sass the same, so <code>_s</code> shouldn&#8217;t force anyone to follow one path or another. In this sense, the Sass provided takes a pure approach, not requiring Compass or any other scripts.</p>
<p>Worth noting along with this addition is that the Github version of <code>_s</code> is now purely for development. We strongly recommend only using <a href="http://underscores.me/">Underscores.me</a> to download <code>_s</code>, going forward.</p>
<p>Just like with <code>_s</code> itself, the Sass it uses will probably change and evolve with time. What is in place now is a structure, a starting point. Any issues, or requests can be posted on <a href="https://github.com/Automattic/_s/issues">Github</a>, and you can even roll your own using a fork. Just like <code>_s</code> is your theme&#8217;s starting point, you can take the Sass in any direction you want.</p>
<p>I hope you are excited as I am to see Sass in <code>_s</code>! I’d like to thank the following people – without them this would not have been possible. As this was a Github project, here are their Github usernames: <a href="https://github.com/gregrickaby">@gregrickaby</a> <a href="https://github.com/bradp">@bradp</a> <a href="https://github.com/hugobaeta">@hugobaeta</a> <a href="https://github.com/obenland">@obenland</a> <a href="https://github.com/sabreuse">@sabreuse</a> <a href="https://github.com/MichaelArestad">@MichaelArestad</a> <a href="https://github.com/jacklenox">@jacklenox</a> and <a href="https://github.com/karmatosed">myself</a>. I look forward to seeing what things people build and where they take Sass in <code>_s</code>.</p><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5640&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:56:"http://themeshaper.com/2014/08/11/sass-comes-to-_s/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"5";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:29:"http://search.yahoo.com/mrss/";a:2:{s:9:"thumbnail";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:1:{s:3:"url";s:76:"http://themeshaper.files.wordpress.com/2014/08/2014-08-11-at-18-13.png?w=150";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"content";a:2:{i:0;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:76:"http://themeshaper.files.wordpress.com/2014/08/2014-08-11-at-18-13.png?w=150";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:19:"Sass in underscores";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:82:"http://1.gravatar.com/avatar/d36d2c1821af9249b69ff7f5ed60529b?s=96&d=identicon&r=G";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:10:"karmatosed";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}i:1;a:6:{s:4:"data";s:58:"
		
		
		
		
		
				

		
		
				
			
		
	
		

		

		

		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:6:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:53:"Adaption, Bosco &amp; Isola – Three New Free Themes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://themeshaper.com/2014/07/21/adaption-bosco-isola/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:64:"http://themeshaper.com/2014/07/21/adaption-bosco-isola/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 21 Jul 2014 18:43:11 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:6:"Themes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:30:"http://themeshaper.com/?p=5600";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:461:"A trio of themes from Automattic designers has launched in the WordPress.org Theme Directory. Designed by Tammie Lister, Adaption has &#8230; <a href="http://themeshaper.com/2014/07/21/adaption-bosco-isola/" class="more-link">Continue reading <span class="meta-nav">&#8594;</span></a><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5600&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Kathryn P.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2299:"<p>A trio of themes from Automattic designers has launched in the WordPress.org Theme Directory.</p>
<p>Designed by <a href="http://diaryofawebsite.com/">Tammie Lister</a>, <strong><a href="http://wordpress.org/themes/adaption">Adaption</a></strong> has a bold, contemporary, vibe. It features full-width images, two widget areas, and an optional third column.</p>
<div id="attachment_5602" style="width: 484px" class="wp-caption aligncenter"><a href="https://themeshaper.files.wordpress.com/2014/07/adaption-ss.png"><img class="imgborder wp-image-5602 size-large" src="http://themeshaper.files.wordpress.com/2014/07/adaption-ss.png?w=474&#038;h=355" alt="Adaption" width="474" height="355" /></a><p class="wp-caption-text">Adaption</p></div>
<p>Looking for an uncluttered single-column theme with strong typography? Check out <strong><a href="http://wordpress.org/themes/bosco">Bosco</a>,</strong> crafted by <a href="http://www.fklein.info/">Frank Klein.</a></p>
<div id="attachment_5601" style="width: 484px" class="wp-caption aligncenter"><a href="https://themeshaper.files.wordpress.com/2014/07/bosco-ss.jpg"><img class="imgborder wp-image-5601 size-large" src="http://themeshaper.files.wordpress.com/2014/07/bosco-ss.jpg?w=474&#038;h=247" alt="Bosco" width="474" height="247" /></a><p class="wp-caption-text">Bosco</p></div>
<p><strong><a href="http://wordpress.org/themes/isola">Isola</a></strong> was inspired by a “less is more” philosophy and influenced by mobile design patterns. This minimalist theme was designed by <a href="http://noscope.com">Joen Asmussen,</a> with web development by <a href="http://carolinethemes.com/">Caroline Moore</a>.</p>
<div id="attachment_5603" style="width: 484px" class="wp-caption aligncenter"><a href="https://themeshaper.files.wordpress.com/2014/07/isola-ss.png"><img class="imgborder wp-image-5603 size-large" src="http://themeshaper.files.wordpress.com/2014/07/isola-ss.png?w=474&#038;h=355" alt="Isola" width="474" height="355" /></a><p class="wp-caption-text">Isola</p></div>
<p>All three themes are responsive, and look gorgeous on devices both small and large.</p><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5600&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:60:"http://themeshaper.com/2014/07/21/adaption-bosco-isola/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:29:"http://search.yahoo.com/mrss/";a:1:{s:7:"content";a:4:{i:0;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:82:"http://2.gravatar.com/avatar/88ff758a54124a679af2e4cdaae8ba62?s=96&d=identicon&r=G";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:9:"kathrynwp";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:68:"http://themeshaper.files.wordpress.com/2014/07/adaption-ss.png?w=474";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:8:"Adaption";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:65:"http://themeshaper.files.wordpress.com/2014/07/bosco-ss.jpg?w=474";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:5:"Bosco";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:65:"http://themeshaper.files.wordpress.com/2014/07/isola-ss.png?w=474";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:5:"Isola";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}i:2;a:6:{s:4:"data";s:57:"
		
		
		
		
		
				

		
		
				
			
		
	
		
		

		

		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:6:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:10:"Meet Kelly";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:45:"http://themeshaper.com/2014/06/19/meet-kelly/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:54:"http://themeshaper.com/2014/06/19/meet-kelly/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 19 Jun 2014 17:23:09 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:6:"Themes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:30:"http://themeshaper.com/?p=5588";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:475:"Kelly, a colorful personal-blogging theme designed by Automattic&#8217;s Kelly Hoffman, is now available for download from the WordPress.org Theme Directory. &#8230; <a href="http://themeshaper.com/2014/06/19/meet-kelly/" class="more-link">Continue reading <span class="meta-nav">&#8594;</span></a><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5588&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Kathryn P.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:1033:"<p><em>Kelly,</em> a colorful personal-blogging theme designed by Automattic&#8217;s <a href="http://kellychoffman.wordpress.com/">Kelly Hoffman,</a> is now available for download from the <a href="https://wordpress.org/themes/kelly">WordPress.org Theme Directory.</a> Here&#8217;s how Kelly explains the creative inspiration for her namesake:</p>
<blockquote><p>I really wanted to keep it simple but fun, which is why I went with bold splashes of color and large type. I went with the complementary color palate of reddish orange and green as a fun reference to my red hair and green eyes.</p></blockquote>
<p><a href="http://themeshaper.files.wordpress.com/2014/06/kelly.gif"><img class="aligncenter size-medium wp-image-5591" src="http://themeshaper.files.wordpress.com/2014/06/kelly.gif?w=300&#038;h=225" alt="Kelly" width="300" height="225" /></a></p><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5588&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:50:"http://themeshaper.com/2014/06/19/meet-kelly/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:29:"http://search.yahoo.com/mrss/";a:2:{s:9:"thumbnail";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:1:{s:3:"url";s:62:"http://themeshaper.files.wordpress.com/2014/06/kelly.gif?w=150";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"content";a:3:{i:0;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:62:"http://themeshaper.files.wordpress.com/2014/06/kelly.gif?w=150";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:5:"Kelly";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:82:"http://2.gravatar.com/avatar/88ff758a54124a679af2e4cdaae8ba62?s=96&d=identicon&r=G";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:9:"kathrynwp";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:62:"http://themeshaper.files.wordpress.com/2014/06/kelly.gif?w=300";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:5:"Kelly";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}i:3;a:6:{s:4:"data";s:63:"
		
		
		
		
		
				
		
		

		
		
				
			
		
	
		
		

		

		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:6:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:38:"Customizing Jetpack’s Sharing module";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:70:"http://themeshaper.com/2014/05/30/customizing-jetpacks-sharing-module/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:79:"http://themeshaper.com/2014/05/30/customizing-jetpacks-sharing-module/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 30 May 2014 16:30:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:3:{i:0;a:5:{s:4:"data";s:10:"Theme Tips";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:7:"Jetpack";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:10:"sharedaddy";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:30:"http://themeshaper.com/?p=5572";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:450:"One of my favorite feature in Jetpack is sharing, but if you are a theme designer/developer like me, it can &#8230; <a href="http://themeshaper.com/2014/05/30/customizing-jetpacks-sharing-module/" class="more-link">Continue reading <span class="meta-nav">&#8594;</span></a><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5572&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Thomas Guillot";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2920:"<p>One of my favorite feature in <a href="http://jetpack.me/">Jetpack</a> is <a href="http://jetpack.me/support/sharing/">sharing</a>, but if you are a theme designer/developer like me, it can be really frustrating trying to customize it.</p>
<p>By adding a simple filter to <code>functions.php</code> or <code>inc/jetpack.php</code> if your theme is based on <a href="http://underscores.me/">_s</a>, you can actually avoid the Sharedaddy stylesheet from being enqueued.</p>
<pre class="brush: php; title: ; notranslate">
/**
 * Remove Jetpack\'s sharing script.
 */
function _s_remove_sharedaddy_script() {
	remove_action( \'wp_head\', \'sharing_add_header\', 1 );
}
add_action( \'template_redirect\', \'_s_remove_sharedaddy_script\' );
</pre>
<p>Now you can add you own custom CSS without worrying about multiple levels like <code>.site-main .entry-content &gt; .sharedaddy .sd-title</code>, or having to use <code>!important</code> to overwrite the Sharedaddy stylesheet.</p>
<p>If you want to go a bit further, you can use some jQuery/Javascript. For example, if you want to create a link that, when you click on it, toggles the sharing buttons:</p>
<p>1) Let&#8217;s add some CSS to hide the div:</p>
<pre class="brush: css; title: ; notranslate">
.sd-sharing-enabled:not(#jp-post-flair) {
	display: none;
}
</pre>
<p>2) Then create some (very basic) jQuery to do the magic:</p>
<pre class="brush: jscript; title: ; notranslate">
/*
 * Create a toggle button for sharedaddy.
 */
function sharedaddy_toggle() {

	// Create toggle button
	$( \'.sd-sharing-enabled:not(#jp-post-flair)\' ).each( function() {
		$( this ).before( \'&lt;a class=&quot;sharedaddy-sharing&quot;&gt;Toggle Button&lt;/a&gt;\' );
	} );
	
	// Click to open
	$( \'.entry-content\' ).on( \'click\', \'.sharedaddy-sharing\', function() {
		$( this ).next( \'.sd-sharing-enabled\' ).toggle();
	} );
	
}
</pre>
<p><em>Make sure you load the function after the window is loaded <strong>and</strong> after a post-load (for Infinite Scroll).</em></p>
<p>3) Ta-da!<br />
<img class="alignnone size-full wp-image-5574" src="http://themeshaper.files.wordpress.com/2014/05/sharedaddy-toggle.gif?w=474" alt="Sharedaddy toggle"   /></p>
<p>You can do the same with the Related Posts module or Likes module like so:</p>
<pre class="brush: php; title: ; notranslate">
/**
 * Remove Jetpack\'s related-posts and likes scripts.
 */
function _s_remove_jetpack_scripts() {
	wp_dequeue_style( \'jetpack_related-posts\' );
	wp_dequeue_style( \'jetpack_likes\' );
}
add_action( \'wp_enqueue_scripts\', \'_s_remove_jetpack_scripts\' );
</pre>
<p><em>Be aware that the Likes module isn&#8217;t fully customizable because the buttons are located in an iframe.</em></p>
<p>Have fun!</p><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5572&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:75:"http://themeshaper.com/2014/05/30/customizing-jetpacks-sharing-module/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"5";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:29:"http://search.yahoo.com/mrss/";a:2:{s:9:"thumbnail";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:1:{s:3:"url";s:82:"http://themeshaper.files.wordpress.com/2014/05/sharedaddy-featured-image.jpg?w=150";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"content";a:3:{i:0;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:82:"http://themeshaper.files.wordpress.com/2014/05/sharedaddy-featured-image.jpg?w=150";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:10:"Sharedaddy";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:82:"http://2.gravatar.com/avatar/edda6f87ac9aec0c8464e1b2f1298790?s=96&d=identicon&r=G";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:13:"thomasguillot";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:68:"http://themeshaper.files.wordpress.com/2014/05/sharedaddy-toggle.gif";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:17:"Sharedaddy toggle";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}i:4;a:6:{s:4:"data";s:69:"
		
		
		
		
		
				

		
		
				
			
		
	
		
		

		

		

		

		

		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:6:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:38:"Spring Theme Launches on WordPress.org";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"http://themeshaper.com/2014/05/29/spring-theme-launches/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:65:"http://themeshaper.com/2014/05/29/spring-theme-launches/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 29 May 2014 14:05:37 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:6:"Themes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:30:"http://themeshaper.com/?p=5560";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:458:"Over the last few months, Automattic has released a half-dozen new free themes in the WordPress.org theme directory, ranging from &#8230; <a href="http://themeshaper.com/2014/05/29/spring-theme-launches/" class="more-link">Continue reading <span class="meta-nav">&#8594;</span></a><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5560&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Kathryn P.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2968:"<p>Over the last few months, Automattic has released a half-dozen new free themes in the <a href="http://wordpress.org/themes/">WordPress.org theme directory,</a> ranging from stylish personal blogging themes to photo-intensive portfolio themes.</p>
<p>Meet the class of 2014:</p>
<p>Designed by Automattic&#8217;s <a href="http://www.danhauk.com/">Dan Hauk,</a> <a href="http://wordpress.org/themes/pictorico">Pictorico</a> is a snazzy portfolio theme with large featured images and a classy post slider.</p>
<p><a href="https://themeshaper.files.wordpress.com/2014/05/pictorico-ss.png"><img class="aligncenter wp-image-5562 size-large" src="https://themeshaper.files.wordpress.com/2014/05/pictorico-ss.png?w=474&#038;h=355" alt="Pictorico" width="474" height="355" /></a></p>
<p><a href="http://carolinethemes.com/">Caroline Moore</a> launched three flexible blog-oriented themes of her own design: <a href="http://wordpress.org/themes/fictive">Fictive,</a> as well as <a href="http://wordpress.org/themes/quadra">Quadra</a> and <a href="http://wordpress.org/themes/circa">Circa,</a> both child themes of <a href="http://wordpress.org/themes/hexa">Hexa.</a> All take attractive advantage of post formats, with charming use of colorful geometric icons throughout.</p>
<p><a href="https://themeshaper.files.wordpress.com/2014/05/hexa-circa-quadra.jpg"><img class="aligncenter size-full wp-image-5569" src="https://themeshaper.files.wordpress.com/2014/05/hexa-circa-quadra.jpg?w=474&#038;h=387" alt="Hexa Circa Quadra" width="474" height="387" /></a></p>
<p><a href="http://wordpress.org/themes/tonal">Tonal</a> is <a href="http://diaryofawebsite.com/">Tammie Lister</a>&#8216;s debut solo theme in the WordPress.org directory. Tonal&#8217;s graceful, minimalist look also comes with a bonus: change the site&#8217;s background color to a shade of your liking and the theme automatically adjusts the typography to ensure your text stays clean and readable.</p>
<p><a href="https://themeshaper.files.wordpress.com/2014/05/tonal-ss.jpg"><img class="aligncenter size-full wp-image-5564" src="https://themeshaper.files.wordpress.com/2014/05/tonal-ss.jpg?w=474&#038;h=355" alt="Tonal" width="474" height="355" /></a></p>
<p>Musicians have been taking full advantage of <a href="http://wordpress.org/themes/singl">Singl</a>&#8216;s strong, contemporary vibe. Crafted by <a href="http://thomasguillot.com/">Thomas Guillot,</a> it serves its creative niche with polish and panache.</p>
<p><a href="https://themeshaper.files.wordpress.com/2014/05/singl-homepage.png"><img class="aligncenter size-full wp-image-5565" src="https://themeshaper.files.wordpress.com/2014/05/singl-homepage.png?w=474&#038;h=440" alt="Singl" width="474" height="440" /></a></p>
<p>We hope you enjoy our Spring Collection!</p><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5560&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:61:"http://themeshaper.com/2014/05/29/spring-theme-launches/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:29:"http://search.yahoo.com/mrss/";a:2:{s:9:"thumbnail";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:1:{s:3:"url";s:75:"http://themeshaper.files.wordpress.com/2014/05/pictorico-featured.png?w=150";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"content";a:6:{i:0;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:75:"http://themeshaper.files.wordpress.com/2014/05/pictorico-featured.png?w=150";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:9:"Pictorico";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:82:"http://2.gravatar.com/avatar/88ff758a54124a679af2e4cdaae8ba62?s=96&d=identicon&r=G";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:9:"kathrynwp";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:70:"https://themeshaper.files.wordpress.com/2014/05/pictorico-ss.png?w=474";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:9:"Pictorico";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:69:"https://themeshaper.files.wordpress.com/2014/05/hexa-circa-quadra.jpg";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:17:"Hexa Circa Quadra";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:60:"https://themeshaper.files.wordpress.com/2014/05/tonal-ss.jpg";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:5:"Tonal";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:66:"https://themeshaper.files.wordpress.com/2014/05/singl-homepage.png";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:5:"Singl";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}i:5;a:6:{s:4:"data";s:59:"
		
		
		
		
		
				
		
		

		
		
				
			
		
	
		
		

		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:6:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:37:"Granting Commit Access to Underscores";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:60:"http://themeshaper.com/2014/04/22/commit-access-underscores/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:69:"http://themeshaper.com/2014/04/22/commit-access-underscores/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 22 Apr 2014 15:01:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:3:{i:0;a:5:{s:4:"data";s:9:"Community";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:11:"underscores";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:2:"_s";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:30:"http://themeshaper.com/?p=5532";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:471:"With Underscores&#8217; growing popularity and continuing maturation as an open source project, we decided to take the next step and open &#8230; <a href="http://themeshaper.com/2014/04/22/commit-access-underscores/" class="more-link">Continue reading <span class="meta-nav">&#8594;</span></a><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5532&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:19:"Konstantin Obenland";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:1948:"<p>With Underscores&#8217; growing popularity and continuing maturation as an open source project, we decided to take the next step and open up commit access to contributors outside of Automattic. Please join me in congratulating <a href="https://github.com/philiparthurmoore">Philip Arthur Moore</a> on becoming the first external committer to an Automattic project on GitHub.</p>
<p>Philip has been a fairly easy choice as we obviously know him well here at Automattic. He was with us for over three years and a driving factor in everything theme related during his time with us. But more importantly, he continues to care about Underscores and contribute in discussions and patches, and we know about his theme development skills and passion for world class themes.</p>
<p>We’re much more conservative with our Underscores goals and dreams than most people wanting to contribute, so it is important to us that committers share these values and understand where we see the project headed. We have no doubt that that is the case with Philip, who helped shaping Underscores from the day it started. Andrew Nacin recently published <a href="http://nacin.com/2014/02/07/how-wordpress-chooses-committers/">a post about how the WordPress project chooses committers</a>, and while WordPress and Underscores are vastly different open source projects, there is still a lot to take away from it—especially around the qualities of a great contributor—that also applies to this project.</p>
<p>Underscores just recently celebrated its second birthday. It has become an integral part of many projects, not only at Automattic, but for theme developers all over the world. So we&#8217;re exited to have Philip back in a leading role and continue this journey with us!</p><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5532&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:65:"http://themeshaper.com/2014/04/22/commit-access-underscores/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:29:"http://search.yahoo.com/mrss/";a:2:{s:9:"thumbnail";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:1:{s:3:"url";s:68:"http://themeshaper.files.wordpress.com/2013/10/underscores.png?w=150";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"content";a:2:{i:0;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:68:"http://themeshaper.files.wordpress.com/2013/10/underscores.png?w=150";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:11:"underscores";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:82:"http://2.gravatar.com/avatar/2370ea5912750f4cb0f3c51ae1cbca55?s=96&d=identicon&r=G";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:8:"obenland";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}i:6;a:6:{s:4:"data";s:52:"
		
		
		
		
		
				
		
		

		
		
				
			
		
	
		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:6:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:24:"Underscores on WP Tavern";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"http://themeshaper.com/2014/04/02/underscores-wp-tavern/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:65:"http://themeshaper.com/2014/04/02/underscores-wp-tavern/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 02 Apr 2014 21:15:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:3:{i:0;a:5:{s:4:"data";s:17:"Theme Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:11:"underscores";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:2:"_s";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:30:"http://themeshaper.com/?p=5514";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:474:"Delve into the Underscores starter theme in Jeff Chandler&#8217;s WP Tavern interview with Automattic code wrangler Konstantin Obenland. Find out &#8230; <a href="http://themeshaper.com/2014/04/02/underscores-wp-tavern/" class="more-link">Continue reading <span class="meta-nav">&#8594;</span></a><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5514&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Kathryn P.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:606:"<p>Delve into the Underscores starter theme in Jeff Chandler&#8217;s <a href="http://wptavern.com/introduction-to-underscores-a-wordpress-starter-theme-with-konstantin-obenland">WP Tavern interview</a> with Automattic code wrangler Konstantin Obenland. Find out how it&#8217;s meant to be used in theme development and how to contribute to the project, and explore a sampling of the outstanding sites built using Underscores.</p><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5514&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:61:"http://themeshaper.com/2014/04/02/underscores-wp-tavern/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:29:"http://search.yahoo.com/mrss/";a:1:{s:7:"content";a:1:{i:0;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:82:"http://2.gravatar.com/avatar/88ff758a54124a679af2e4cdaae8ba62?s=96&d=identicon&r=G";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:9:"kathrynwp";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}i:7;a:6:{s:4:"data";s:72:"
		
		
		
		
		
				
		
		
		
		

		
		
				
			
		
		
		
		
		
		

		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:8:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:32:"HTML5 Galleries in WordPress 3.9";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:67:"http://themeshaper.com/2014/03/04/html5-galleries-in-wordpress-3-9/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:76:"http://themeshaper.com/2014/03/04/html5-galleries-in-wordpress-3-9/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 04 Mar 2014 19:15:17 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:5:{i:0;a:5:{s:4:"data";s:17:"Theme Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:4:"core";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:11:"development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:3;a:5:{s:4:"data";s:9:"wordpress";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:4;a:5:{s:4:"data";s:2:"_s";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:30:"http://themeshaper.com/?p=5493";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:452:"With the new release of WordPress will come the ability to declare support for HTML5 markup in galleries. Once a &#8230; <a href="http://themeshaper.com/2014/03/04/html5-galleries-in-wordpress-3-9/" class="more-link">Continue reading <span class="meta-nav">&#8594;</span></a><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5493&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:19:"Konstantin Obenland";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2256:"<p>With the new release of WordPress will come <a href="https://core.trac.wordpress.org/changeset/27302">the ability to declare support for HTML5 markup in galleries</a>. Once a theme declared support, the definition list elements will be replaced by <code>&lt;figure&gt;</code> and <code>&lt;figcaption&gt;</code> for better semantics.</p>
<p>If you decide to not only adopt this new feature but also maintain backwards compatibility, then there are two ways to achieve that:</p>
<ol>
<li>Style not only the new HTML5 elements, but also add CSS selectors for the traditional definition list elements. <a href="https://github.com/Automattic/_s/commit/5de96cdb729f3cfc21c117df2a298f49e7408d0b">This is the route we chose for <code>_s</code></a> to keep it as simple as possible.</li>
<li>Filter the shortcode attributes and override the tag parameters. Since the <code>shortcode_atts_gallery</code> filter was introduced in 3.6, you&#8217;ll be backwards compatible with the latest two versions.</li>
</ol>
<p><span id="more-5493"></span>The callback to override the tag parameters could look something like this:</p>
<pre class="brush: php; title: ; notranslate">
/**
 * Replaces definition list elements with their appropriate HTML5 counterparts.
 *
 * @param array $atts The output array of shortcode attributes.
 * @return array HTML5-ified gallery attributes.
 */
function prefix_gallery_atts( $atts ) {
	$atts[\'itemtag\']    = \'figure\';
	$atts[\'icontag\']    = \'div\';
	$atts[\'captiontag\'] = \'figcaption\';

	return $atts;
}
add_filter( \'shortcode_atts_gallery\', \'prefix_gallery_atts\' );
</pre>
<p>This second way of adding backwards compatibility has the added benefit that it also adds forward compatibility, as you&#8217;re able to use HTML5 markup for galleries <strong>now</strong>, even before WordPress 3.9 will be released in April.</p>
<p>Please keep in mind that <a href="https://core.trac.wordpress.org/changeset/27396">WordPress  will no long output its default gallery styles by default</a>, when HTML5 support for galleries has been added.</p><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5493&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:72:"http://themeshaper.com/2014/03/04/html5-galleries-in-wordpress-3-9/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:2:"21";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:28:"http://www.georss.org/georss";a:1:{s:5:"point";a:1:{i:0;a:5:{s:4:"data";s:17:"0.000000 0.000000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://www.w3.org/2003/01/geo/wgs84_pos#";a:2:{s:3:"lat";a:1:{i:0;a:5:{s:4:"data";s:8:"0.000000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"long";a:1:{i:0;a:5:{s:4:"data";s:8:"0.000000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:29:"http://search.yahoo.com/mrss/";a:2:{s:9:"thumbnail";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:1:{s:3:"url";s:61:"http://themeshaper.files.wordpress.com/2014/02/swag.jpg?w=150";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"content";a:2:{i:0;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:61:"http://themeshaper.files.wordpress.com/2014/02/swag.jpg?w=150";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:4:"Swag";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:82:"http://2.gravatar.com/avatar/2370ea5912750f4cb0f3c51ae1cbca55?s=96&d=identicon&r=G";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:8:"obenland";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}i:8;a:6:{s:4:"data";s:109:"
		
		
		
		
		
				
		
		
		
		

		
		
				
			
		
	
		
		

		

		

		

		

		

		

		

		

		

		

		

		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:6:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:40:"Behind the Design of the Forefront theme";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:75:"http://themeshaper.com/2014/02/25/behind-the-design-of-the-forefront-theme/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:84:"http://themeshaper.com/2014/02/25/behind-the-design-of-the-forefront-theme/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 25 Feb 2014 10:00:38 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:5:{i:0;a:5:{s:4:"data";s:6:"Design";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:6:"Themes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:17:"Behind the Design";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:3;a:5:{s:4:"data";s:8:"Featured";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:4;a:5:{s:4:"data";s:9:"Forefront";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:30:"http://themeshaper.com/?p=5429";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:466:"If you&#8217;ve read my previous articles you&#8217;ll recognize the title of this post. For those of you who are new, &#8230; <a href="http://themeshaper.com/2014/02/25/behind-the-design-of-the-forefront-theme/" class="more-link">Continue reading <span class="meta-nav">&#8594;</span></a><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5429&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Takashi Irie";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:11594:"<p>If you&#8217;ve read <a href="http://themeshaper.com/tag/behind-the-design/" target="_blank">my previous articles</a> you&#8217;ll recognize the title of this post. For those of you who are new, these are my thoughts behind the themes I&#8217;ve designed. This time, I’d like to talk about Forefront — a responsive <em>Business</em> theme.</p>
<p><span id="more-5429"></span></p>
<ul>
<li><a href="http://forefrontdemo.wordpress.com/?demo" target="_blank">Demo</a></li>
<li><a href="http://theme.wordpress.com/themes/forefront/" target="_blank">Activate it for your WordPress.com site</a></li>
<li><a href="https://creativemarket.com/automattic/21385-Forefront" target="_blank">Download from Creative Market for your self-hosted WordPress site</a></li>
</ul>
<p><strong>MAIN FEATURES</strong></p>
<ul>
<li>Custom page templates</li>
<li>Jetpack testimonials ready</li>
<li>Jetpack Social Links ready</li>
<li>Flexible widget areas</li>
<li>Support for flexible Custom Header, and a Custom Background</li>
<li>Responsive design</li>
<li>Accessible tab-able navigation</li>
</ul>
<p><strong>Custom Page Templates</strong></p>
<p>More often than not, for a business or an organization, websites are more <em>sites</em> than <em>blogs</em>. What I mean by that is that pages are more important than posts that are only used for news items or press releases in what are often called <em>brochure sites</em>.</p>
<p>For that reason, I’ve included three extra page templates for this theme–Front Page, Grid Page, and Full Width.</p>
<p><strong>1. Front Page Template</strong></p>
<p><img class="alignnone size-full wp-image-5433" alt="forefront-front-page" src="http://themeshaper.files.wordpress.com/2014/02/forefront-front-page.jpg?w=474&#038;h=923" width="474" height="923" /></p>
<p>As the name suggests, this template is perfect for the front page and it will turn a blog into a <em>site</em>. The page title and the content can be used as a “call to action” that sits on a featured image which is typically an image of a service or a product. This powerful combination helps visitors act on their designed desired action.</p>
<p>What does every “call to action” need? Yes, a button! Forefront has two custom CSS classes that turn a link into a button: <code>button</code>, and <code>button-minimal</code>.</p>
<p>For example,</p>
<pre class="brush: xml; title: ; notranslate">
&lt;a class=&quot;button&quot; href=&quot;http://yourgroovydomain.com&quot;&gt;Button&lt;/a&gt;
</pre>
<p>this makes a link look this:</p>
<p><img class="alignnone  wp-image-5480" alt="button" src="http://themeshaper.files.wordpress.com/2014/02/button.png?w=236&#038;h=71" width="236" height="71" /></p>
<pre class="brush: xml; title: ; notranslate">
&lt;a class=&quot;button-minimal&quot; href=&quot;http://yourgroovydomain.com&quot;&gt;Button&lt;/a&gt;
</pre>
<p>And this makes a link look this:</p>
<p><img class="alignnone  wp-image-5479" alt="button-minimal" src="http://themeshaper.files.wordpress.com/2014/02/button-minimal.png?w=237&#038;h=71" width="237" height="71" /></p>
<p>Why custom CSS classes? What about shortcodes? We’ve seen so many themes that provide shortcodes for buttons but that’s a bad move. <a href="http://justintadlock.com/archives/2011/05/02/dealing-with-shortcode-madness" target="_blank">Justin Tadlock summarized the issue</a> and it’s a must-read if you&#8217;re a theme designer.</p>
<p>Below the call to action or hero area, there are two optional widget areas. Since the width of each widget is dynamic depending on the number of widgets in each area, it&#8217;ll always look great.</p>
<p>Below the widget areas, the template displays randomly chosen two testimonials. I’ll get to testimonials in a minute. <span class=\'wp-smiley emoji emoji-smile\' title=\':)\'>:)</span></p>
<p><strong>2. Grid Page Template</strong></p>
<p><img class="alignnone size-full wp-image-5435" alt="forefront-grid" src="http://themeshaper.files.wordpress.com/2014/02/forefront-grid.jpg?w=474&#038;h=632" width="474" height="632" /></p>
<p>Another typical need for a business site is a page that showcases services, case studies, or team members. The Grid Page Template is designed for that. It displays its child pages with their featured images, titles, and excerpts. Using page hierarchy is much easier and intuitive for site owners than custom page meta or anything else.</p>
<p><strong>3. Full Width Page Template</strong></p>
<p><img class="alignnone size-full wp-image-5434" alt="forefront-full-width" src="http://themeshaper.files.wordpress.com/2014/02/forefront-full-width.jpg?w=474&#038;h=438" width="474" height="438" /></p>
<p>Lastly, a full width, no sidebar page is handy when you choose to embed a map or even a showreel.</p>
<p><strong>Testimonials</strong></p>
<p>Testimonials from happy customers are important to include on a business site to establish trust and encourage potential customers.</p>
<p>Forefront uses a custom post type, Testimonials which is available for <a href="http://jetpack.me/" target="_blank">Jetpack</a> powered sites. It provides an intuitive way for users to input testimonials. And they&#8217;re portable between themes that support the testimonial post type with Jetpack.</p>
<p>Making your theme support the testimonial CPT is as easy as adding support for post thumbnails.</p>
<pre class="brush: php; title: ; notranslate">
function theme_name_testimonial() {
	add_theme_support( \'jetpack-testimonial\' );
}
add_action( \'after_setup_theme\', theme_name_testimonial );
</pre>
<p>The only thing left is to create an archive template for the CPT, <code>archive-jetpack-testimonial.php</code>. Of course, you can display them anywhere in the template with a query. We’ll publish a small tutorial for the CPT here soon.</p>
<p><a href="http://themeshaper.files.wordpress.com/2014/02/forefront-testimonial.png"><img class="size-full wp-image-5442  alignnone" alt="forefront-testimonial" src="http://themeshaper.files.wordpress.com/2014/02/forefront-testimonial.png?w=474&#038;h=226" width="474" height="226" /></a></p>
<p><strong>Social Links</strong></p>
<p>Forefront is ready to take advantage of <a href="http://jetpack.me/support/social-links/" target="_blank">the Social Links module in Jetpack</a>. The module lets you choose profile links for your theme’s social media integration from selected services connected to <a href="http://jetpack.me/support/publicize/" target="_blank">the Publicize setting</a>.</p>
<p><strong>OTHER DESIGN DECISIONS</strong></p>
<p><strong>Grid</strong></p>
<p>I&#8217;ve designed Forefront with the grid that comprises 60px columns and 30px gutters. I took the <a href="http://framelessgrid.com/" target="_blank">Frameless</a> approach by <a href="http://www.jonikorpi.com/" target="_blank">Joni Korpi</a> — just like  <a href="http://themeshaper.com/2013/04/09/behind-the-design-of-the-ryu-theme/" target="_blank">Ryu</a> — so that all elements on a page remain in balanced proportion on all screen sizes.</p>
<p><a href="http://themeshaper.files.wordpress.com/2014/02/forefront-responsive.gif"><img class="alignnone size-full wp-image-5463" alt="forefront-responsive" src="http://themeshaper.files.wordpress.com/2014/02/forefront-responsive.gif?w=474&#038;h=916" width="474" height="916" /></a></p>
<p><strong>Typeface</strong></p>
<p>For this theme, I chose a popular humanist sans-serif typeface family, <a href="http://www.google.com/fonts/specimen/Open+Sans" target="_blank">Open Sans</a>. It’s designed by Steve Matteson who also designed the popular typeface, Droid Sans. Not only does the typeface supports extensive character sets, it has a wide variety of weights. This allows fine-tuned typography on the theme.</p>
<div id="attachment_5451" style="width: 484px" class="wp-caption aligncenter"><a href="http://themeshaper.files.wordpress.com/2014/02/font-weights1-2.jpg"><img class="size-full wp-image-5451 " alt="font-weights@1-2" src="http://themeshaper.files.wordpress.com/2014/02/font-weights1-2.jpg?w=474&#038;h=127" width="474" height="127" /></a><p class="wp-caption-text">Click to enlarge</p></div>
<p>See the screenshot of a text widget above (click to enlarge). Between A and B, for the heading and the paragraph, each type setting is exactly the same. The only difference between the two is that A has a light background, B has a dark background used in the footer widget area. Despite having the same settings, individual letters, especially the heading , are fuzzier and they appear to be too close to each other on the dark background. This is so-called halation effect impairs the legibility of the text. The effect will vary depending on your screen but chances are most of people are not using HiDPI screen yet.</p>
<p>The wide variety of weights comes handy here. To reduce the effect, I decreased font weight for each and increased letter spacing. As you can see in C, letters are much clearer and crisp. A simple rule of thumb is that light color text on dark background needs to be wider apart and lighter in weight than the opposite.</p>
<p><strong>Color Palette</strong></p>
<p style="text-align:center;"><img class=" wp-image-5450 aligncenter" alt="color-pallet" src="http://themeshaper.files.wordpress.com/2014/02/color-pallet1.jpg?w=342&#038;h=42" width="342" height="42" /></p>
<p>I chose green for links and buttons for Forefront. In general, green can represent wealth, growth, renewal, and stability. I thought it was a great choice for a business site. Other than that green, the rest of the colors used are shades of grey but they all have a hint of green so that the whole page looks less dull. Following <a href="http://ianstormtaylor.com/design-tip-never-use-black/" target="_blank">Ian Storm Taylor’s advice</a>, the amount of green I added was proportional to the darkness of the grey. So in Photoshop’s color picker, the color pallet looks like this:</p>
<p style="text-align:center;"><img class="wp-image-5447 aligncenter" alt="color-picker" src="http://themeshaper.files.wordpress.com/2014/02/color-picker1.jpg?w=260&#038;h=260" width="260" height="260" /></p>
<p><strong>Overlapped Featured Image</strong></p>
<p>Much like I did with Further and Twenty Fourteen, I made a blog post overlap with a featured image with a negative offset in Forefront too. It’s a simple idea but it creates visual tension and it enhances the connectivity between a featured image and a post at the same time.</p>
<p><img class="alignnone size-full wp-image-5436" alt="post" src="http://themeshaper.files.wordpress.com/2014/02/post.jpg?w=474&#038;h=417" width="474" height="417" /></p>
<p><strong>Tab-able Dropdown Menu</strong></p>
<p>Accessibility is also an important factor for a business site. In this theme, every item in the dropdown menu for larger screens is keyboard accessible so that user can go through each item with a tab key. You can learn how it&#8217;s done from the Twenty Fourteen theme too.</p>
<hr />
<p>I hope you can take something to think about as you design your next WordPress theme. A business theme can be as simple as Forefront. It doesn&#8217;t need to be bloated with custom post types and shortcodes. Keep them out of a theme. Focus on design and providing better plugin integration.</p>
<p>More detailed documentation for Forefront is available on <a href="http://forefronttheme.com" target="_blank">forefronttheme.com</a>.</p><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5429&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:80:"http://themeshaper.com/2014/02/25/behind-the-design-of-the-forefront-theme/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:29:"http://search.yahoo.com/mrss/";a:2:{s:9:"thumbnail";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:1:{s:3:"url";s:81:"http://themeshaper.files.wordpress.com/2014/02/forefront-featured-image.jpg?w=150";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"content";a:13:{i:0;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:81:"http://themeshaper.files.wordpress.com/2014/02/forefront-featured-image.jpg?w=150";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:24:"forefront-featured-image";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:82:"http://2.gravatar.com/avatar/56bae6e12bf9305a0852753e0f557489?s=96&d=identicon&r=G";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:10:"iamtakashi";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:71:"http://themeshaper.files.wordpress.com/2014/02/forefront-front-page.jpg";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:20:"forefront-front-page";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:57:"http://themeshaper.files.wordpress.com/2014/02/button.png";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:6:"button";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:65:"http://themeshaper.files.wordpress.com/2014/02/button-minimal.png";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"button-minimal";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:65:"http://themeshaper.files.wordpress.com/2014/02/forefront-grid.jpg";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"forefront-grid";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:71:"http://themeshaper.files.wordpress.com/2014/02/forefront-full-width.jpg";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:20:"forefront-full-width";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:72:"http://themeshaper.files.wordpress.com/2014/02/forefront-testimonial.png";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:21:"forefront-testimonial";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:71:"http://themeshaper.files.wordpress.com/2014/02/forefront-responsive.gif";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:20:"forefront-responsive";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:66:"http://themeshaper.files.wordpress.com/2014/02/font-weights1-2.jpg";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:16:"font-weights@1-2";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:10;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:64:"http://themeshaper.files.wordpress.com/2014/02/color-pallet1.jpg";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:12:"color-pallet";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:11;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:64:"http://themeshaper.files.wordpress.com/2014/02/color-picker1.jpg";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:12:"color-picker";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:12;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:55:"http://themeshaper.files.wordpress.com/2014/02/post.jpg";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:4:"post";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}i:9;a:6:{s:4:"data";s:53:"
		
		
		
		
		
				

		
		
				
			
		
	
		
		

		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:6:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:22:"Tell Us What You Think";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:48:"http://themeshaper.com/2014/02/19/take-our-poll/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:57:"http://themeshaper.com/2014/02/19/take-our-poll/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 19 Feb 2014 18:28:37 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:9:"Site News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:30:"http://themeshaper.com/?p=5419";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:407:"Take our poll and let us know what sort of content you\'d like to read on ThemeShaper in 2014.  <a href="http://themeshaper.com/2014/02/19/take-our-poll/" class="more-link">Continue reading <span class="meta-nav">&#8594;</span></a><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5419&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:10:"Kathryn P.";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:1119:"<p>We’d love to know what sort of content you&#8217;d like to read on ThemeShaper in 2014. Take our quick poll and let us know!</p>
<a name="pd_a_7812992"></a>
<div class="PDS_Poll" id="PDI_container7812992" data-settings="{&quot;url&quot;:&quot;http:\\/\\/static.polldaddy.com\\/p\\/7812992.js&quot;}" style="display:inline-block;"></div>
<div id="PD_superContainer"></div>
<noscript><a href="http://polldaddy.com/poll/7812992">Take Our Poll</a></noscript><script type=\'text/javascript\'>
(function(d,c,j){if(!d.getElementById(j)){var pd=d.createElement(c),s;pd.id=j;pd.src=\'http://s1.wp.com/wp-content/mu-plugins/shortcodes/js/polldaddy-shortcode.js\';s=d.getElementsByTagName(c)[0];s.parentNode.insertBefore(pd,s);}  else if(typeof jQuery !==\'undefined\')jQuery(d.body).trigger(\'pd-script-load\');}(document,\'script\',\'pd-polldaddy-loader\'));
</script>
<p><strong>Thank you to everyone who took the poll, we appreciate your feedback.</strong></p><img alt="" border="0" src="http://pixel.wp.com/b.gif?host=themeshaper.com&#038;blog=45531309&#038;post=5419&#038;subd=themeshaper&#038;ref=&#038;feed=1" width="1" height="1" />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:53:"http://themeshaper.com/2014/02/19/take-our-poll/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"4";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:29:"http://search.yahoo.com/mrss/";a:2:{s:9:"thumbnail";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:1:{s:3:"url";s:66:"http://themeshaper.files.wordpress.com/2014/02/hands-up1.jpg?w=150";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"content";a:2:{i:0;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:66:"http://themeshaper.files.wordpress.com/2014/02/hands-up1.jpg?w=150";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:8:"hands up";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:7:"
			
		";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"url";s:82:"http://2.gravatar.com/avatar/88ff758a54124a679af2e4cdaae8ba62?s=96&d=identicon&r=G";s:6:"medium";s:5:"image";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:29:"http://search.yahoo.com/mrss/";a:1:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:9:"kathrynwp";s:7:"attribs";a:1:{s:0:"";a:1:{s:4:"type";s:4:"html";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:3:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:4:"href";s:28:"http://themeshaper.com/feed/";s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:4:{s:3:"rel";s:6:"search";s:4:"type";s:37:"application/opensearchdescription+xml";s:4:"href";s:30:"http://themeshaper.com/osd.xml";s:5:"title";s:11:"ThemeShaper";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:2;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:2:{s:3:"rel";s:3:"hub";s:4:"href";s:37:"http://themeshaper.com/?pushpress=hub";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:44:"http://purl.org/rss/1.0/modules/syndication/";a:2:{s:12:"updatePeriod";a:1:{i:0;a:5:{s:4:"data";s:6:"hourly";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:15:"updateFrequency";a:1:{i:0;a:5:{s:4:"data";s:1:"1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:10:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Tue, 12 Aug 2014 09:21:58 GMT";s:12:"content-type";s:23:"text/xml; charset=UTF-8";s:8:"x-hacker";s:108:"If you\'re reading this, you should visit automattic.com/jobs and apply to join the fun, mention this header.";s:15:"x-frame-options";s:10:"SAMEORIGIN";s:10:"x-pingback";s:33:"http://themeshaper.com/xmlrpc.php";s:13:"last-modified";s:29:"Tue, 12 Aug 2014 03:29:07 GMT";s:4:"x-nc";s:11:"HIT dfw 188";s:10:"connection";s:5:"close";s:3:"via";s:17:"HTTP/1.1 proxy453";}s:5:"build";s:14:"20140210131038";}', 'no') ; 
INSERT INTO `wp_options` VALUES (2218, '_transient_doing_cron', '1407835308.4747600555419921875000', 'yes') ; 
INSERT INTO `wp_options` VALUES (1790, 'location_children', 'a:0:{}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2176, 'optionsframework', 'a:2:{s:2:"id";s:10:"simplecorp";s:12:"knownoptions";a:1:{i:0;s:10:"simplecorp";}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2041, '_transient_timeout_846f5de80330c339e0b52d7cf2338c18', '1405672746', 'no') ; 
INSERT INTO `wp_options` VALUES (2042, '_transient_846f5de80330c339e0b52d7cf2338c18', 'O:8:"stdClass":21:{s:4:"name";s:22:"Log Deprecated Notices";s:4:"slug";s:22:"log-deprecated-notices";s:7:"version";s:3:"0.2";s:6:"author";s:44:"<a href="http://nacin.com/">Andrew Nacin</a>";s:14:"author_profile";s:30:"//profiles.wordpress.org/nacin";s:12:"contributors";a:1:{s:5:"nacin";s:30:"//profiles.wordpress.org/nacin";}s:8:"requires";s:3:"3.0";s:6:"tested";s:5:"3.6.1";s:13:"compatibility";a:20:{s:3:"3.0";a:7:{s:8:"0.1-beta";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}s:10:"0.1-beta-2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}s:10:"0.1-beta-3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}s:10:"0.1-beta-9";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}s:8:"0.1-RC-1";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}s:7:"0.1-RC2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}s:7:"0.1-RC3";a:3:{i:0;i:100;i:1;i:3;i:2;i:3;}}s:5:"3.0.1";a:1:{s:7:"0.1-RC3";a:3:{i:0;i:67;i:1;i:3;i:2;i:2;}}s:5:"3.0.4";a:1:{s:7:"0.1-RC3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.1";a:2:{s:7:"0.1-RC3";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}s:7:"0.2-RC1";a:3:{i:0;i:100;i:1;i:3;i:2;i:3;}}s:5:"3.1.1";a:1:{s:7:"0.2-RC1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.1.2";a:1:{s:7:"0.2-RC1";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.1.3";a:1:{s:7:"0.2-RC1";a:3:{i:0;i:100;i:1;i:3;i:2;i:3;}}s:5:"3.2.1";a:1:{s:7:"0.2-RC1";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:3:"3.3";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.3.1";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:6;i:2;i:6;}}s:5:"3.3.2";a:1:{s:3:"0.2";a:3:{i:0;i:50;i:1;i:2;i:2;i:1;}}s:3:"3.4";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.5";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.5.1";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.5.2";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:3:"3.6";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.6.1";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.7.1";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.8";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.9";a:1:{s:3:"0.2";a:3:{i:0;i:0;i:1;i:1;i:2;i:0;}}}s:6:"rating";d:98.400000000000005684341886080801486968994140625;s:11:"num_ratings";i:37;s:7:"ratings";a:5:{i:5;i:34;i:4;i:3;i:3;i:0;i:2;i:0;i:1;i:0;}s:10:"downloaded";i:29649;s:12:"last_updated";s:10:"2013-03-08";s:5:"added";s:10:"2010-06-27";s:8:"homepage";s:59:"http://wordpress.org/extend/plugins/log-deprecated-notices/";s:8:"sections";a:4:{s:11:"description";s:809:"<p>This plugin logs the usage of deprecated files, functions, and function arguments. It identifies where the deprecated functionality is being used and offers the alternative if available.</p>

<p>This is a plugin for developers. WP_DEBUG is not needed, though its general usage is strongly recommended. Deprecated notices normally exposed by WP_DEBUG will be logged instead.</p>

<p>This plugin also logs incorrect function usage, which WordPress started reporting in 3.1.</p>

<p>Please report any bugs to plugins at <a href="http://andrewnacin.com/">andrewnacin.com</a>, or find me in IRC #wordpress-dev or @<a href="http://twitter.com/nacin">nacin</a> on Twitter.</p>

<p>This is young software. It works, but there\'s a lot left on the todo (check out the Other Notes tab). Have an idea? Let me know.</p>";s:12:"installation";s:862:"<p>For an automatic installation through WordPress:</p>

<ol>
<li>Go to the \'Add New\' plugins screen in your WordPress admin area</li>
<li>Search for \'Log Deprecated Notices\'</li>
<li>Click \'Install Now\' and activate the plugin</li>
<li>View the log in the \'Tools\' menu, under \'Deprecated Calls\'</li>
</ol>

<p>For a manual installation via FTP:</p>

<ol>
<li>Upload the <code>log-deprecated-notices</code> directory to the <code>/wp-content/plugins/</code> directory</li>
<li>Activate the plugin through the \'Plugins\' screen in your WordPress admin area</li>
</ol>

<p>To upload the plugin through WordPress, instead of FTP:</p>

<ol>
<li>Upload the downloaded zip file on the \'Add New\' plugins screen (see the \'Upload\' tab) in your WordPress admin area and activate.</li>
</ol>

<p>This plugin is will remove log entries when it is uninstalled and deleted.</p>";s:11:"screenshots";s:285:"<ol>
	<li>
		<a href=\'//s.w.org/plugins/log-deprecated-notices/screenshot-1.png?r=0\' title=\'Click to view full-size screenshot 1\'><img src=\'//s.w.org/plugins/log-deprecated-notices/screenshot-1.png?r=0\' alt=\'log-deprecated-notices screenshot 1\' /></a>
		<p>Log screen.</p>
	</li>
</ol>";s:11:"other_notes";s:643:"<h3>Ideas</h3>
<p>These are the various things on the @todo:</p>

<ul>
<li>Plugin identification. Also, an unobstrusive note on plugins page next to said plugins.</li>
<li>Perhaps the ability to auto-purge the log.</li>
<li>Ability to filter on file or plugin in which the deprecated functionality is used.</li>
<li>Offer some kind of better multisite support.</li>
</ul>

<p>Want to add something here? I\'m all ears. plugins at <a href="http://andrewnacin.com/">andrewnacin.com</a> or @<a href="http://twitter.com/nacin">nacin</a> on Twitter.</p>

<p>I will prioritize these tasks based on feedback, so let me know what you\'d like to see.</p>";}s:17:"short_description";s:135:"Logs the usage of deprecated files, functions, and function arguments, and identifies where the deprecated functionality is being used.";s:13:"download_link";s:68:"http://downloads.wordpress.org/plugin/log-deprecated-notices.0.2.zip";s:4:"tags";a:6:{s:5:"admin";s:5:"admin";s:10:"deprecated";s:10:"deprecated";s:9:"developer";s:9:"developer";s:8:"e_notice";s:8:"E_NOTICE";s:7:"logging";s:7:"logging";s:8:"wp_debug";s:8:"WP_DEBUG";}s:11:"donate_link";N;}', 'no') ; 
INSERT INTO `wp_options` VALUES (466, 'widget_pages', 'a:2:{i:2;a:3:{s:5:"title";s:16:"Страници";s:6:"sortby";s:10:"post_title";s:7:"exclude";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (1618, '_site_transient_timeout_poptags_40cd750bba9870f18aada2478b24840a', '1401970151', 'yes') ; 
INSERT INTO `wp_options` VALUES (1619, '_site_transient_poptags_40cd750bba9870f18aada2478b24840a', 'a:40:{s:6:"widget";a:3:{s:4:"name";s:6:"widget";s:4:"slug";s:6:"widget";s:5:"count";s:4:"4463";}s:4:"post";a:3:{s:4:"name";s:4:"Post";s:4:"slug";s:4:"post";s:5:"count";s:4:"2778";}s:6:"plugin";a:3:{s:4:"name";s:6:"plugin";s:4:"slug";s:6:"plugin";s:5:"count";s:4:"2683";}s:5:"admin";a:3:{s:4:"name";s:5:"admin";s:4:"slug";s:5:"admin";s:5:"count";s:4:"2196";}s:5:"posts";a:3:{s:4:"name";s:5:"posts";s:4:"slug";s:5:"posts";s:5:"count";s:4:"2110";}s:7:"sidebar";a:3:{s:4:"name";s:7:"sidebar";s:4:"slug";s:7:"sidebar";s:5:"count";s:4:"1756";}s:6:"google";a:3:{s:4:"name";s:6:"google";s:4:"slug";s:6:"google";s:5:"count";s:4:"1553";}s:7:"twitter";a:3:{s:4:"name";s:7:"twitter";s:4:"slug";s:7:"twitter";s:5:"count";s:4:"1513";}s:8:"comments";a:3:{s:4:"name";s:8:"comments";s:4:"slug";s:8:"comments";s:5:"count";s:4:"1465";}s:6:"images";a:3:{s:4:"name";s:6:"images";s:4:"slug";s:6:"images";s:5:"count";s:4:"1449";}s:4:"page";a:3:{s:4:"name";s:4:"page";s:4:"slug";s:4:"page";s:5:"count";s:4:"1401";}s:9:"shortcode";a:3:{s:4:"name";s:9:"shortcode";s:4:"slug";s:9:"shortcode";s:5:"count";s:4:"1340";}s:5:"image";a:3:{s:4:"name";s:5:"image";s:4:"slug";s:5:"image";s:5:"count";s:4:"1308";}s:8:"facebook";a:3:{s:4:"name";s:8:"Facebook";s:4:"slug";s:8:"facebook";s:5:"count";s:4:"1157";}s:3:"seo";a:3:{s:4:"name";s:3:"seo";s:4:"slug";s:3:"seo";s:5:"count";s:4:"1116";}s:5:"links";a:3:{s:4:"name";s:5:"links";s:4:"slug";s:5:"links";s:5:"count";s:4:"1096";}s:9:"wordpress";a:3:{s:4:"name";s:9:"wordpress";s:4:"slug";s:9:"wordpress";s:5:"count";s:3:"999";}s:7:"gallery";a:3:{s:4:"name";s:7:"gallery";s:4:"slug";s:7:"gallery";s:5:"count";s:3:"955";}s:6:"social";a:3:{s:4:"name";s:6:"social";s:4:"slug";s:6:"social";s:5:"count";s:3:"955";}s:7:"widgets";a:3:{s:4:"name";s:7:"widgets";s:4:"slug";s:7:"widgets";s:5:"count";s:3:"789";}s:3:"rss";a:3:{s:4:"name";s:3:"rss";s:4:"slug";s:3:"rss";s:5:"count";s:3:"782";}s:5:"pages";a:3:{s:4:"name";s:5:"pages";s:4:"slug";s:5:"pages";s:5:"count";s:3:"781";}s:6:"jquery";a:3:{s:4:"name";s:6:"jquery";s:4:"slug";s:6:"jquery";s:5:"count";s:3:"769";}s:5:"email";a:3:{s:4:"name";s:5:"email";s:4:"slug";s:5:"email";s:5:"count";s:3:"766";}s:5:"media";a:3:{s:4:"name";s:5:"media";s:4:"slug";s:5:"media";s:5:"count";s:3:"703";}s:4:"ajax";a:3:{s:4:"name";s:4:"AJAX";s:4:"slug";s:4:"ajax";s:5:"count";s:3:"678";}s:5:"video";a:3:{s:4:"name";s:5:"video";s:4:"slug";s:5:"video";s:5:"count";s:3:"662";}s:10:"javascript";a:3:{s:4:"name";s:10:"javascript";s:4:"slug";s:10:"javascript";s:5:"count";s:3:"651";}s:7:"content";a:3:{s:4:"name";s:7:"content";s:4:"slug";s:7:"content";s:5:"count";s:3:"619";}s:10:"buddypress";a:3:{s:4:"name";s:10:"buddypress";s:4:"slug";s:10:"buddypress";s:5:"count";s:3:"610";}s:5:"photo";a:3:{s:4:"name";s:5:"photo";s:4:"slug";s:5:"photo";s:5:"count";s:3:"592";}s:4:"link";a:3:{s:4:"name";s:4:"link";s:4:"slug";s:4:"link";s:5:"count";s:3:"583";}s:4:"feed";a:3:{s:4:"name";s:4:"feed";s:4:"slug";s:4:"feed";s:5:"count";s:3:"579";}s:5:"login";a:3:{s:4:"name";s:5:"login";s:4:"slug";s:5:"login";s:5:"count";s:3:"579";}s:6:"photos";a:3:{s:4:"name";s:6:"photos";s:4:"slug";s:6:"photos";s:5:"count";s:3:"568";}s:8:"category";a:3:{s:4:"name";s:8:"category";s:4:"slug";s:8:"category";s:5:"count";s:3:"532";}s:7:"youtube";a:3:{s:4:"name";s:7:"youtube";s:4:"slug";s:7:"youtube";s:5:"count";s:3:"525";}s:4:"spam";a:3:{s:4:"name";s:4:"spam";s:4:"slug";s:4:"spam";s:5:"count";s:3:"524";}s:8:"security";a:3:{s:4:"name";s:8:"security";s:4:"slug";s:8:"security";s:5:"count";s:3:"510";}s:5:"share";a:3:{s:4:"name";s:5:"Share";s:4:"slug";s:5:"share";s:5:"count";s:3:"507";}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (1656, 'theme_mods_twentytwelve-child', 'a:2:{i:0;b:0;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1402907566;s:4:"data";a:8:{s:19:"wp_inactive_widgets";a:4:{i:0;s:9:"monster-4";i:1;s:9:"monster-5";i:2;s:9:"monster-6";i:3;s:9:"monster-7";}s:9:"sidebar-1";a:1:{i:0;s:9:"monster-8";}s:9:"sidebar-2";a:1:{i:0;s:12:"categories-2";}s:9:"sidebar-3";a:1:{i:0;s:8:"search-3";}s:18:"orphaned_widgets_1";a:1:{i:0;s:6:"meta-5";}s:18:"orphaned_widgets_2";a:1:{i:0;s:7:"links-2";}s:18:"orphaned_widgets_3";a:2:{i:0;s:9:"monster-3";i:1;s:7:"pages-2";}s:18:"orphaned_widgets_4";a:4:{i:0;s:6:"meta-4";i:1;s:6:"text-2";i:2;s:8:"search-2";i:3;s:10:"calendar-2";}}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (974, '_site_transient_timeout_browser_a9c2a4a09c221fe1242bcc57ffac16b0', '1398329825', 'yes') ; 
INSERT INTO `wp_options` VALUES (975, '_site_transient_browser_a9c2a4a09c221fe1242bcc57ffac16b0', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:13:"34.0.1847.116";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (1340, 'jetpack_register', 'WwgHvgxP4BQkXMJfYpL42Yn7KhZzQ4QM:Mh0QwJdkNLWAWbUwtdD3LxOonGiGFhFK:1399552907', 'yes') ; 
INSERT INTO `wp_options` VALUES (1337, '_transient_timeout_jetpack_https_test', '1399638429', 'no') ; 
INSERT INTO `wp_options` VALUES (1338, '_transient_jetpack_https_test', '1', 'no') ; 
INSERT INTO `wp_options` VALUES (344, 'theme_mods_twentyten-child', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:0:{}s:16:"sidebars_widgets";a:2:{s:4:"time";i:1392113216;s:4:"data";a:7:{s:19:"wp_inactive_widgets";a:0:{}s:19:"primary-widget-area";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:21:"secondary-widget-area";N;s:24:"first-footer-widget-area";N;s:25:"second-footer-widget-area";N;s:24:"third-footer-widget-area";N;s:25:"fourth-footer-widget-area";N;}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (294, 'theme_mods_twentyten', 'a:7:{i:0;b:0;s:16:"background_color";s:6:"f1f1f1";s:16:"background_image";s:0:"";s:17:"background_repeat";s:6:"repeat";s:21:"background_position_x";s:4:"left";s:21:"background_attachment";s:5:"fixed";s:16:"sidebars_widgets";a:2:{s:4:"time";i:1398683663;s:4:"data";a:8:{s:9:"sidebar-1";a:1:{i:0;s:9:"monster-3";}s:21:"in-header-widget-area";a:3:{i:0;s:6:"text-2";i:1;s:8:"search-2";i:2;s:10:"calendar-2";}s:19:"wp_inactive_widgets";a:0:{}s:19:"sidebar-widget-area";a:2:{i:0;s:6:"text-3";i:1;s:9:"monster-2";}s:24:"first-footer-widget-area";a:1:{i:0;s:14:"recent-posts-4";}s:25:"second-footer-widget-area";a:1:{i:0;s:7:"pages-2";}s:24:"third-footer-widget-area";a:1:{i:0;s:6:"meta-4";}s:25:"fourth-footer-widget-area";a:1:{i:0;s:10:"archives-3";}}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (292, 'theme_mods_twentythirteen', 'a:3:{i:0;b:0;s:16:"header_textcolor";s:6:"220e10";s:16:"sidebars_widgets";a:2:{s:4:"time";i:1400056451;s:4:"data";a:7:{s:19:"wp_inactive_widgets";a:11:{i:0;s:10:"calendar-2";i:1;s:7:"links-2";i:2;s:6:"meta-5";i:3;s:8:"search-3";i:4;s:12:"categories-2";i:5;s:9:"monster-3";i:6;s:9:"monster-4";i:7;s:9:"monster-5";i:8;s:9:"monster-6";i:9;s:9:"monster-7";i:10;s:9:"monster-8";}s:18:"orphaned_widgets_1";a:2:{i:0;s:6:"text-2";i:1;s:8:"search-2";}s:18:"orphaned_widgets_2";a:0:{}s:18:"orphaned_widgets_3";a:0:{}s:18:"orphaned_widgets_4";a:1:{i:0;s:7:"pages-2";}s:18:"orphaned_widgets_5";a:1:{i:0;s:6:"meta-4";}s:18:"orphaned_widgets_6";a:0:{}}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (162, 'theme_mods_twentyeleven', 'a:8:{s:16:"header_textcolor";s:3:"000";s:16:"background_color";s:6:"f1f1f1";s:16:"background_image";s:0:"";s:17:"background_repeat";s:6:"repeat";s:21:"background_position_x";s:4:"left";s:21:"background_attachment";s:5:"fixed";s:18:"nav_menu_locations";a:1:{s:7:"primary";i:0;}s:16:"sidebars_widgets";a:2:{s:4:"time";i:1398683438;s:4:"data";a:8:{s:9:"sidebar-1";a:1:{i:0;s:9:"monster-3";}s:21:"in-header-widget-area";a:3:{i:0;s:6:"text-2";i:1;s:8:"search-2";i:2;s:10:"calendar-2";}s:19:"wp_inactive_widgets";a:0:{}s:19:"sidebar-widget-area";a:2:{i:0;s:6:"text-3";i:1;s:9:"monster-2";}s:24:"first-footer-widget-area";a:1:{i:0;s:14:"recent-posts-4";}s:25:"second-footer-widget-area";a:1:{i:0;s:7:"pages-2";}s:24:"third-footer-widget-area";a:1:{i:0;s:6:"meta-4";}s:25:"fourth-footer-widget-area";a:1:{i:0;s:10:"archives-3";}}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (163, 'current_theme', 'Twenty Fourteen', 'yes') ; 
INSERT INTO `wp_options` VALUES (164, 'theme_mods_twentytwelve', 'a:8:{i:0;b:0;s:16:"header_textcolor";s:3:"444";s:16:"background_color";s:6:"e6e6e6";s:16:"background_image";s:0:"";s:17:"background_repeat";s:6:"repeat";s:21:"background_position_x";s:4:"left";s:21:"background_attachment";s:5:"fixed";s:16:"sidebars_widgets";a:2:{s:4:"time";i:1392118564;s:4:"data";a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (165, 'theme_switched', '', 'yes') ; 
INSERT INTO `wp_options` VALUES (166, 'twentyeleven_theme_options', 'a:3:{s:12:"color_scheme";s:5:"light";s:10:"link_color";s:7:"#1b8be0";s:12:"theme_layout";s:15:"content-sidebar";}', 'yes') ; 
INSERT INTO `wp_options` VALUES (403, 'theme_mods_wordpress-from-static', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:17;s:9:"secondary";i:18;}s:16:"sidebars_widgets";a:2:{s:4:"time";i:1396530182;s:4:"data";a:8:{s:18:"orphaned_widgets_1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:19:"wp_inactive_widgets";a:0:{}s:21:"in-header-widget-area";a:2:{i:0;s:6:"text-2";i:1;s:8:"search-3";}s:19:"sidebar-widget-area";a:2:{i:0;s:14:"recent-posts-3";i:1;s:6:"meta-3";}s:24:"first-footer-widget-area";a:1:{i:0;s:14:"recent-posts-4";}s:25:"second-footer-widget-area";a:1:{i:0;s:7:"pages-2";}s:24:"third-footer-widget-area";a:1:{i:0;s:6:"meta-4";}s:25:"fourth-footer-widget-area";a:1:{i:0;s:10:"archives-3";}}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (170, 'wp-native-dashboard', 'O:8:"stdClass":8:{s:7:"version";s:3:"1.0";s:9:"installed";b:0;s:21:"enable_login_selector";s:1:"1";s:24:"enable_profile_extension";s:1:"1";s:24:"enable_language_switcher";b:0;s:24:"enable_adminbar_switcher";s:1:"1";s:24:"translate_front_adminbar";s:1:"1";s:21:"cleanup_on_deactivate";b:0;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (305, 'theme_mods_responsive-bootstrap', 'a:3:{i:0;b:0;s:18:"nav_menu_locations";a:0:{}s:16:"sidebars_widgets";a:2:{s:4:"time";i:1392041679;s:4:"data";a:2:{s:19:"wp_inactive_widgets";a:0:{}s:18:"orphaned_widgets_1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}}}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2045, '_transient_timeout_f0d589c7156b0e0856756ca6ccec75e3', '1405672747', 'no') ; 
INSERT INTO `wp_options` VALUES (2046, '_transient_f0d589c7156b0e0856756ca6ccec75e3', 'O:8:"stdClass":21:{s:4:"name";s:14:"Monster Widget";s:4:"slug";s:14:"monster-widget";s:7:"version";s:3:"0.3";s:6:"author";s:47:"<a href="http://automattic.com/">Automattic</a>";s:14:"author_profile";s:35:"//profiles.wordpress.org/automattic";s:12:"contributors";a:2:{s:10:"automattic";s:35:"//profiles.wordpress.org/automattic";s:7:"mfields";s:32:"//profiles.wordpress.org/mfields";}s:8:"requires";s:5:"3.2.0";s:6:"tested";s:5:"3.5.2";s:13:"compatibility";a:1:{s:5:"3.9.1";a:1:{s:3:"0.3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}}s:6:"rating";d:100;s:11:"num_ratings";i:17;s:7:"ratings";a:5:{i:5;i:17;i:4;i:0;i:3;i:0;i:2;i:0;i:1;i:0;}s:10:"downloaded";i:24100;s:12:"last_updated";s:10:"2013-01-05";s:5:"added";s:10:"2012-05-15";s:8:"homepage";N;s:8:"sections";a:5:{s:11:"description";s:339:"<p>The Monster widget consolidates all 13 core widgets into a single widget enabling theme developers to create multiple instances with ease. It has been created to save time during theme development and review by minimizing the steps needed to populate a sidebar with widgets. The Monster widget is not designed for use in production.</p>";s:12:"installation";s:1067:"<p>This plugin can be installed directly from your site.</p>

<ol>
<li>Log in and navigate to Plugins &#8594; Add New.</li>
<li>Type "Monster Widget" into the Search input and click the "Search Widgets" button.</li>
<li>Locate the Monster Widget in the list of search results and click "Install Now".</li>
<li>Click the "Activate Plugin" link at the bottom of the install screen.</li>
<li>Navigate to Appearance &#8594; Widgets and <a href="http://codex.wordpress.org/WordPress_Widgets#Activate_Widgets">create a new instance</a>.</li>
</ol>

<p>It can also be installed manually.</p>

<ol>
<li><a href="http://wordpress.org/extend/plugins/monster-widget/">Download</a> the plugin from WordPress.org.</li>
<li>Unzip the package and move to your plugins directory.</li>
<li>Log into WordPress and navigate to the "Plugins" screen.</li>
<li>Locate "Monster Widget" in the list and click the "Activate" link.</li>
<li>Navigate to Appearance &#8594; Widgets and <a href="http://codex.wordpress.org/WordPress_Widgets#Activate_Widgets">create a new instance</a>.</li>
</ol>";s:11:"screenshots";s:901:"<ol>
	<li>
		<a href=\'//s.w.org/plugins/monster-widget/screenshot-1.png?r=0\' title=\'Click to view full-size screenshot 1\'><img src=\'//s.w.org/plugins/monster-widget/screenshot-1.png?r=0\' alt=\'monster-widget screenshot 1\' /></a>
		<p>The Monster widget will appear in your list of available widgets.</p>
	</li>
	<li>
		<a href=\'//s.w.org/plugins/monster-widget/screenshot-2.png?r=0\' title=\'Click to view full-size screenshot 2\'><img src=\'//s.w.org/plugins/monster-widget/screenshot-2.png?r=0\' alt=\'monster-widget screenshot 2\' /></a>
		<p>Drag it to a widget area to create an instance.</p>
	</li>
	<li>
		<a href=\'//s.w.org/plugins/monster-widget/screenshot-3.png?r=0\' title=\'Click to view full-size screenshot 3\'><img src=\'//s.w.org/plugins/monster-widget/screenshot-3.png?r=0\' alt=\'monster-widget screenshot 3\' /></a>
		<p>View your site and see that all core widgets are displayed!</p>
	</li>
</ol>";s:9:"changelog";s:760:"<h4>v0.3 - January 5th, 2013</h4>

<ul>
<li>Added test photograph by directly to the plugin. Thanks to <a href="http://profiles.wordpress.org/rarst">Rarst</a> for the bug report.</li>
<li>Add a really long select element to the text widget. See <a href="https://github.com/Automattic/_s/pull/99">_s issue #99</a>.</li>
<li>Add a smiley to the image caption.</li>
<li>Remove the "pipe test".</li>
<li>Bump version number.</li>
<li>Update Changelog.</li>
</ul>

<h4>v0.2 - October 18th, 2012</h4>

<ul>
<li>Create custom cache key for the Recent Posts widget.</li>
<li>Only add the Links widget when it has been registered.</li>
<li>Bump version number.</li>
<li>Update Changelog.</li>
</ul>

<h4>v0.1 - May 12th, 2012</h4>

<ul>
<li>Original Release.</li>
</ul>";s:3:"faq";s:321:"<h4>Why was the pipe test removed in version 0.3</h4>

<p>A couple members of the Theme Team at Automattic had a discussion about the relevance of this test and we came to the conclusion that it is rather unnatural. Moving forward it would be best to only include markup and data that best represent actual use cases.</p>";}s:17:"short_description";s:94:"Provides a quick and easy method of adding all core widgets to a sidebar for testing purposes.";s:13:"download_link";s:56:"http://downloads.wordpress.org/plugin/monster-widget.zip";s:4:"tags";a:3:{s:5:"debug";s:5:"debug";s:17:"theme-development";s:17:"theme development";s:6:"widget";s:6:"widget";}s:11:"donate_link";N;}', 'no') ; 
INSERT INTO `wp_options` VALUES (2047, '_transient_timeout_997c4a3fd8e5afd2fc13de02ba22951e', '1405672748', 'no') ; 
INSERT INTO `wp_options` VALUES (2048, '_transient_997c4a3fd8e5afd2fc13de02ba22951e', 'O:8:"stdClass":21:{s:4:"name";s:14:"User Switching";s:4:"slug";s:14:"user-switching";s:7:"version";s:3:"0.9";s:6:"author";s:57:"<a href="https://johnblackbourn.com/">John Blackbourn</a>";s:14:"author_profile";s:36:"//profiles.wordpress.org/johnbillion";s:12:"contributors";a:1:{s:11:"johnbillion";s:36:"//profiles.wordpress.org/johnbillion";}s:8:"requires";s:3:"3.1";s:6:"tested";s:5:"3.9.1";s:13:"compatibility";a:1:{s:5:"3.9.1";a:1:{s:3:"0.9";a:3:{i:0;i:100;i:1;i:4;i:2;i:4;}}}s:6:"rating";d:99.3999999999999914734871708787977695465087890625;s:11:"num_ratings";i:113;s:7:"ratings";a:5:{i:5;i:111;i:4;i:1;i:3;i:1;i:2;i:0;i:1;i:0;}s:10:"downloaded";i:161207;s:12:"last_updated";s:10:"2014-05-01";s:5:"added";s:10:"2009-03-05";s:8:"homepage";s:59:"https://johnblackbourn.com/wordpress-plugin-user-switching/";s:8:"sections";a:5:{s:11:"description";s:2512:"<p>This plugin allows you to quickly swap between user accounts in WordPress at the click of a button. You\'ll be instantly logged out and logged in as your desired user. This is handy for test environments where you regularly log out and in between different accounts, or for adminstrators who need to switch between multiple accounts.</p>

<h4>Features</h4>

<ul>
<li>Switch user: Instantly switch to any user account from the <em>Users</em> screen.</li>
<li>Switch back: Instantly switch back to your originating account.</li>
<li>Switch off: Log out of your account but retain the ability to instantly switch back in again.</li>
<li>It\'s completely secure (see the <em>Security</em> section below).</li>
<li>Compatible with WordPress, WordPress Multisite, BuddyPress and bbPress.</li>
</ul>

<h4>Security</h4>

<ul>
<li>Only users with the ability to edit other users can switch user accounts. By default this is only Administrators on single site installs, and Super Admins on Multisite installs.</li>
<li>Passwords are not (and cannot be) revealed.</li>
<li>Implements WordPress\' nonce security system, meaning only those who intend to switch users can switch.</li>
<li>Full support for administration over SSL (if applicable).</li>
</ul>

<h4>Usage</h4>

<ol>
<li>Visit the <em>Users</em> menu in WordPress and you\'ll see a <em>Switch To</em> link next to each user.</li>
<li>Click this and you will immediately switch into that user account.</li>
<li>You can switch back to your originating account via the <em>Switch back</em> link on each dashboard screen or in your profile menu in the WordPress toolbar.</li>
</ol>

<p>See the <a href="http://wordpress.org/plugins/user-switching/faq/">FAQ</a> for information about the <em>Switch Off</em> feature.</p>

<h4>Translations Included</h4>

<ul>
<li>العربية (Arabic)</li>
<li>中文 (Chinese Simplified)</li>
<li>Fran&#231;ais (French)</li>
<li>Deutsch (German)</li>
<li>עִבְרִית (Hebrew)</li>
<li>Bahasa Indonesia (Indonesian)</li>
<li>日本語 (Japanese)</li>
<li>Lietuvių kalba (Lithuanian)</li>
<li>فارسی (Persian)</li>
<li>Polski (Polish)</li>
<li>Portugu&#234;s do Brasil (Brazilian Portuguese)</li>
<li>Русский (Russian)</li>
<li>Slovenčina (Slovak)</li>
<li>Espa&#241;ol (Spanish)</li>
</ul>

<p>Thanks to translations by Hassan Hisham, Tunghsiao Liu, Fx B&#233;nard, Ralph Stenzel, Rami Y, Yusuke Hayasaki, Tommixoft, Amin Ab, Bartosz Arendt, Raphael Mendon&#231;a, R J, Max Samael, Eko Ikhyar, and Marcelo Pedra!</p>";s:12:"installation";s:523:"<p>If you have the <a href="http://wordpress.org/plugins/developer/">WordPress Developer plugin</a> installed then User Switching is a one-click install from the Tools -&#62; Developer screen.</p>

<p>Alternatively, you can install this plugin directly from your WordPress dashboard:</p>

<ol>
<li>Go to the <em>Plugins</em> menu and click <em>Add New</em>.</li>
<li>Search for <em>User Switching</em>.</li>
<li>Click <em>Install Now</em> next to the <em>User Switching</em> plugin.</li>
<li>Activate the plugin.</li>
</ol>";s:11:"screenshots";s:528:"<ol>
	<li>
		<a href=\'//ps.w.org/user-switching/assets/screenshot-1.png?rev=879537\' title=\'Click to view full-size screenshot 1\'>			<img src=\'//ps.w.org/user-switching/assets/screenshot-1.png?rev=879537\' alt=\'user-switching screenshot 1\' />
		</a>		<p></p>
	</li>
	<li>
		<a href=\'//ps.w.org/user-switching/assets/screenshot-2.png?rev=879537\' title=\'Click to view full-size screenshot 2\'>			<img src=\'//ps.w.org/user-switching/assets/screenshot-2.png?rev=879537\' alt=\'user-switching screenshot 2\' />
		</a>		<p></p>
	</li>
</ol>";s:9:"changelog";s:4665:"<h4>0.9</h4>

<ul>
<li>Minor fixes for the <code>login_redirect</code> filter.</li>
<li>Increase the specificity of the <code>switch_to_old_user</code> and <code>switch_off</code> nonces.</li>
</ul>

<h4>0.8.9</h4>

<ul>
<li>French translation by Fx B&#233;nard.</li>
<li>Hebrew translation by Rami Y.</li>
<li>Indonesian translation by Eko Ikhyar.</li>
<li>Portuguese translation by Raphael Mendon&#231;a.</li>
</ul>

<h4>0.8.8</h4>

<ul>
<li>Spanish Translation by Marcelo Pedra.</li>
<li>User Switching is now a network-only plugin when used on Multisite.</li>
</ul>

<h4>0.8.7</h4>

<ul>
<li>Respect the <code>secure_logged_in_cookie</code> and <code>login_redirect</code> filters.</li>
</ul>

<h4>0.8.6</h4>

<ul>
<li>Correctly encode the <code>redirect_to</code> parameter in the login screen message.</li>
</ul>

<h4>0.8.5</h4>

<ul>
<li>Add a \'Switch To\' link to bbPress profile screens.</li>
</ul>

<h4>0.8.4</h4>

<ul>
<li>Revert a change in 0.8.3 which switched to using the <code>login_init</code> hook. This hook is fired too late.</li>
</ul>

<h4>0.8.3</h4>

<ul>
<li>Switch to storing data in cookies as JSON instead of PHP-serialized.</li>
<li>Show admin notices on all possible admin screens.</li>
<li>Tweak the redirect location for BuddyPress user profiles.</li>
<li>Change the textdomain in the plugin to match the plugin slug (required for language packs in WordPress core).</li>
</ul>

<h4>0.8.2</h4>

<ul>
<li>Russian translation by R J.</li>
</ul>

<h4>0.8.1</h4>

<ul>
<li>Japanese translation by Yusuke Hayasaki.</li>
</ul>

<h4>0.8</h4>

<ul>
<li>Nested switching and switching back is now supported (capability permitting). Switch, switch again, switch back, switch back!</li>
<li>Fix for BuddyPress 1.7 member profile pages. Props nat0n.</li>
<li>Updated Arabic translation by Hassan Hisham.</li>
<li>A little code refactoring and improving, completed inline docs.</li>
</ul>

<h4>0.7.1</h4>

<ul>
<li>Arabic translation by Hassan Hisham.</li>
<li>Minor code tweaks.</li>
</ul>

<h4>0.7</h4>

<ul>
<li>Always show a \'Switch back\' link in the footer when the admin toolbar isn\'t showing.</li>
<li>More intuitive redirecting after switching.</li>
</ul>

<h4>0.6.3</h4>

<ul>
<li>Lithuanian translation by Tommixoft.</li>
</ul>

<h4>0.6.2</h4>

<ul>
<li>Polish translation by Bartosz Arendt.</li>
</ul>

<h4>0.6.1</h4>

<ul>
<li>Slovak translation by Max Samael.</li>
</ul>

<h4>0.6</h4>

<ul>
<li>More intuitive redirecting after switching.</li>
<li>Avoid a BuddyPress bug preventing Switch To buttons from appearing.</li>
<li>Added a template function: <code>current_user_switched()</code> which lets you know if the current user switched into their account.</li>
<li>Added some hooks: <code>switch_to_user</code>, <code>switch_back_user</code> and <code>switch_off_user</code>, fired when appropriate.</li>
</ul>

<h4>0.5.2</h4>

<ul>
<li>Farsi (Persian) translation by Amin Ab.</li>
<li>Display switch back links in Network Admin and login screen.</li>
<li>Avoid a BuddyPress bug preventing Switch To buttons from appearing.</li>
</ul>

<h4>0.5.1.2</h4>

<ul>
<li>German translation by Ralph Stenzel.</li>
</ul>

<h4>0.5.1.1</h4>

<ul>
<li>Chinese Simplified translation by Sparanoid.</li>
</ul>

<h4>0.5.1</h4>

<ul>
<li>Toolbar tweaks for WordPress 3.3.</li>
</ul>

<h4>0.5</h4>

<ul>
<li>New "Switch off" function: Log out and log instantly back in again when needed (see the FAQ).</li>
</ul>

<h4>0.4.1</h4>

<ul>
<li>Support for upcoming changes to the admin bar in WordPress 3.3.</li>
</ul>

<h4>0.4</h4>

<ul>
<li>Add some extended support for BuddyPress.</li>
<li>Add some extended support for Multisite.</li>
<li>Fix a permissions problem for users with no privileges.</li>
<li>Fix a PHP warning when used as a mu-plugin (thanks Scribu).</li>
</ul>

<h4>0.3.2</h4>

<ul>
<li>Fix the \'Switch back to\' menu item in the WordPress admin bar (WordPress 3.1+).</li>
<li>Fix a formatting issue on the user profile page.</li>
</ul>

<h4>0.3.1</h4>

<ul>
<li>Prevent admins switching to multisite super admin accounts.</li>
</ul>

<h4>0.3</h4>

<ul>
<li>Adds an admin bar menu item (WordPress 3.1+) for switching back to the user you switched from.</li>
</ul>

<h4>0.2.2</h4>

<ul>
<li>Respect the current \'Remember me\' setting when switching users.</li>
<li>Redirect to home page instead of admin screen if the user you\'re switching to has no privileges.</li>
</ul>

<h4>0.2.1</h4>

<ul>
<li>Edge case bugfix to prevent \'Switch back to...\' message appearing when it shouldn\'t.</li>
</ul>

<h4>0.2</h4>

<ul>
<li>Functionality for switching back to user you switched from.</li>
</ul>

<h4>0.1</h4>

<ul>
<li>Initial release.</li>
</ul>";s:3:"faq";s:2320:"<h4>What does "Switch off" mean?</h4>

<p>Switching off logs you out of your account but retains your user ID in an authorisation cookie so you can switch straight back without having to log in again manually. It\'s akin to switching to no user, and being able to switch back.</p>

<p>The <em>Switch Off</em> link can be found in your profile menu in the WordPress toolbar. Once you\'ve switched off you\'ll see a <em>Switch back</em> link in the footer of your site.</p>

<h4>Does this plugin work with WordPress Multisite?</h4>

<p>Yes, and you\'ll also be able to switch users from the Users screen in Network Admin.</p>

<h4>Does this plugin work with BuddyPress?</h4>

<p>Yes, and you\'ll also be able to switch users from member profile screens and the member listing screen.</p>

<h4>Does this plugin work with bbPress?</h4>

<p>Yes, and you\'ll also be able to switch users from member profile screens.</p>

<h4>Does this work as a mu-plugin?</h4>

<p>Yes, but you\'ll need to install <code>user-switching.php</code> into the root of your <code>mu-plugins</code> directory, not in the <code>user-switching</code> subdirectory. This is a restriction of WordPress.</p>

<h4>What capability does a user need in order to switch accounts?</h4>

<p>A user needs the <code>edit_users</code> capability in order to switch user accounts. By default only Administrators have this capability, and with Multisite enabled only Super Admins have this capability.</p>

<h4>Can regular admins on Multisite installs switch accounts?</h4>

<p>No. This can be enabled though by installing the <a href="https://github.com/johnbillion/user-switching-for-regular-admins">User Switching for Regular Admins</a> plugin.</p>

<h4>Are any plugin hooks called when users switch accounts?</h4>

<p>Yes. When a user switches to another account, the <code>switch_to_user</code> hook is called with the new and old user IDs passed as parameters.</p>

<p>When a user switches back to their original account, the <code>switch_back_user</code> hook is called with the new (original) and old user IDs passed as parameters. Note that the old user ID can be boolean false if the user is switching back after they\'ve been switched off.</p>

<p>When a user switches off, the <code>switch_off_user</code> hook is called with the old user ID as a parameter.</p>";}s:17:"short_description";s:53:"Instant switching between user accounts in WordPress.";s:13:"download_link";s:60:"http://downloads.wordpress.org/plugin/user-switching.0.9.zip";s:4:"tags";a:10:{s:7:"bbpress";s:7:"bbPress";s:6:"become";s:6:"become";s:10:"buddypress";s:10:"buddypress";s:9:"developer";s:9:"developer";s:19:"fast-user-switching";s:19:"fast user switching";s:9:"multisite";s:9:"multisite";s:8:"profiles";s:8:"profiles";s:15:"user-management";s:15:"user management";s:14:"user-switching";s:14:"user switching";s:5:"users";s:5:"users";}s:11:"donate_link";N;}', 'no') ; 
INSERT INTO `wp_options` VALUES (2203, '_transient_timeout_plugin_slugs', '1407229582', 'no') ; 
INSERT INTO `wp_options` VALUES (2204, '_transient_plugin_slugs', 'a:17:{i:0;s:19:"akismet/akismet.php";i:1;s:35:"backupwordpress/backupwordpress.php";i:2;s:23:"debug-bar/debug-bar.php";i:3;s:39:"debug-bar-console/debug-bar-console.php";i:4;s:23:"developer/developer.php";i:5;s:9:"hello.php";i:6;s:19:"jetpack/jetpack.php";i:7;s:30:"lightbox-plus/lightboxplus.php";i:8;s:49:"log-deprecated-notices/log-deprecated-notices.php";i:9;s:33:"monster-widget/monster-widget.php";i:10;s:35:"simply-show-ids/simply-show-ids.php";i:11;s:27:"theme-check/theme-check.php";i:12;s:41:"wordpress-importer/wordpress-importer.php";i:13;s:35:"wordpress-reset/wordpress-reset.php";i:14;s:28:"wp-example-content/magic.php";i:15;s:31:"wp-migrate-db/wp-migrate-db.php";i:16;s:43:"wp-native-dashboard/wp-native-dashboard.php";}', 'no') ; 
INSERT INTO `wp_options` VALUES (1033, '_site_transient_timeout_browser_2a45585bf6fbca9e24972054edb9a714', '1398435874', 'yes') ; 
INSERT INTO `wp_options` VALUES (1034, '_site_transient_browser_2a45585bf6fbca9e24972054edb9a714', 'a:9:{s:8:"platform";s:7:"Windows";s:4:"name";s:6:"Chrome";s:7:"version";s:12:"31.0.1650.63";s:10:"update_url";s:28:"http://www.google.com/chrome";s:7:"img_src";s:49:"http://s.wordpress.org/images/browsers/chrome.png";s:11:"img_src_ssl";s:48:"https://wordpress.org/images/browsers/chrome.png";s:15:"current_version";s:2:"18";s:7:"upgrade";b:0;s:8:"insecure";b:0;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2057, '_transient_timeout_080361cf5e29a468c75be8425ae9cc1a', '1405672750', 'no') ; 
INSERT INTO `wp_options` VALUES (2058, '_transient_080361cf5e29a468c75be8425ae9cc1a', 'O:8:"stdClass":21:{s:4:"name";s:16:"Theme Test Drive";s:4:"slug";s:16:"theme-test-drive";s:7:"version";s:5:"2.8.4";s:6:"author";s:65:"<a href="http://www.prelovac.com/vladimir/">Vladimir Prelovac</a>";s:14:"author_profile";s:37:"//profiles.wordpress.org/lancewillett";s:12:"contributors";a:1:{s:9:"freediver";s:34:"//profiles.wordpress.org/freediver";}s:8:"requires";s:3:"2.3";s:6:"tested";s:5:"3.5.2";s:13:"compatibility";a:1:{s:5:"3.9.1";a:1:{s:5:"2.8.4";a:3:{i:0;i:100;i:1;i:3;i:2;i:3;}}}s:6:"rating";d:79.400000000000005684341886080801486968994140625;s:11:"num_ratings";i:171;s:7:"ratings";a:5:{i:5;i:107;i:4;i:24;i:3;i:3;i:2;i:2;i:1;i:35;}s:10:"downloaded";i:307119;s:12:"last_updated";s:10:"2013-03-14";s:5:"added";s:10:"2008-02-12";s:8:"homepage";s:67:"http://www.prelovac.com/vladimir/wordpress-plugins/theme-test-drive";s:8:"sections";a:6:{s:11:"description";s:730:"<p>Theme Test Drive Wordpress plugin allows you to safely test drive any theme on your blog as administrator, while visitors still use the default one.</p>

<p>It happens completely transparent and they will not even notice you run a different theme for yourself.</p>

<p>Best part is you can even set the testing theme options (if it has them) in the Admin panel while you are testing the theme.</p>

<p>You can also preview any theme by adding "?theme=xxx" to your blog URL. For example <a href="http://www.myblog.com/?theme=Default" rel="nofollow">http://www.myblog.com/?theme=Default</a></p>

<p>Plugin by Vladimir Prelovac.</p>

<p>Managing Multiple WordPress sites? Check out <a href="https://managewp.com">ManageWP</a>.</p>";s:12:"installation";s:476:"<ol>
<li><p>Upload the whole plugin folder to your /wp-content/plugins/ folder.</p></li>
<li><p>Go to the Plugins page and activate the plugin.</p></li>
<li><p>Use the Options page to set the theme you want to test drive.</p></li>
</ol>

<p>The selected theme will be visible only to blog administrator.</p>

<p>Other visitors of the blog will always see the default theme.</p>

<p>Note: if you use WP-Cache plugin, you might need to disable it (or setup to exclude pages)</p>";s:11:"screenshots";s:304:"<ol>
	<li>
		<a href=\'//s.w.org/plugins/theme-test-drive/screenshot-1.png?r=0\' title=\'Click to view full-size screenshot 1\'><img src=\'//s.w.org/plugins/theme-test-drive/screenshot-1.png?r=0\' alt=\'theme-test-drive screenshot 1\' /></a>
		<p>Admin panel for installing and previewing themes</p>
	</li>
</ol>";s:9:"changelog";s:1109:"<h4>2.8.4</h4>

<ul>
<li>Removed the versionc hecking code</li>
<li>WP 3.5.1 compatible</li>
</ul>

<h4>2.8.3</h4>

<ul>
<li>Update for compatibility to WordPress 3.4.1 by replacing deprecated calls (thanks Lance Willett!)</li>
<li>Use new WP_Theme API for loading themes and getting theme information</li>
<li>Fix PHP warnings</li>
</ul>

<h4>2.8.2</h4>

<ul>
<li>WordPress 3.2 compatibility</li>
</ul>

<h4>2.8.1</h4>

<ul>
<li>Reverted the admin capabilities so the user can see the options panel for theme being previewed </li>
</ul>

<h4>2.8</h4>

<ul>
<li>Added a patch for theme and stylesheet filters that sometimes caused problems with user capabilities</li>
</ul>

<h4>2.7.4</h4>

<ul>
<li>WordPress 2.8 compatibilty</li>
</ul>

<h4>2.7.3</h4>

<ul>
<li>Fixed the problem with access level update</li>
</ul>

<h4>2.7</h4>

<ul>
<li>WP 2.7 cleanup and security update</li>
</ul>

<h4>2.5</h4>

<ul>
<li>Easy theme installation: Install your themes using a built in installer</li>
<li>Ability to use folder name as well as "?theme=xxx" paramter for instant preview (thanks Michael Stewart!)</li>
</ul>";s:3:"faq";s:644:"<h4>How do I correctly use this plugin?</h4>

<p>Go to Admin Panel, Design, Theme Test Drive. Select the theme you want to preview and click enable.</p>

<p>Additionally you may click on any of the instant preview links, or wait for a preview thumbnail to generate.</p>

<h4>Can I suggest an feature for the plugin?</h4>

<p>Of course, visit <a href="http://www.prelovac.com/vladimir/wordpress-plugins/theme-test-drive#comments">Theme Test Drive Home Page</a></p>

<h4>I love your work, are you available for hire?</h4>

<p>Yes I am, visit my <a href="http://www.prelovac.com/vladimir/services">WordPress Services</a> page to find out more.</p>";s:11:"other_notes";s:1658:"<h3>Credits</h3>
<p>Some of the functions of Theme Test Drive plugin came from other plugins. So I can at least thank these people:</p>

<ul>
<li><a href="http://boren.nu/" title="Ryan Boren">Ryan Boren</a> for his <a href="http://dev.wp-plugins.org/wiki/ThemeSwitcher" title="Theme Switcher">Theme Switcher</a> plugin</li>
<li><a href="http://andufo.com" title="Andres Santos">Andres Santos</a> for his <a href="http://andufo.com/proyectos/plugins/wp-websnapr&#34;" title="wp-websnapr">wp-websnapr</a> plugin</li>
<li><a href="http://www.deliciousdays.com/" title="Oliver">Oliver</a> for his <a href="http://www.deliciousdays.com/cforms-plugin" title="cforms II">cforms II</a> plugin</li>
<li><a href="http://www.plaintxt.org/" title="Scott">Scott</a> for his excellent readme.txt file</li>
<li><a href="http://www.websnapr.com" title="WebSnapr">WebSnapr</a> folks for their service</li>
</ul>

<p>Thanks.</p>
<h3>License</h3>
<p>This file is part of Theme Test Drive.</p>

<p>Theme Test Drive is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.</p>

<p>Theme Test Drive is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.</p>

<p>You should have received a copy of the GNU General Public License along with Theme Test Drive. If not, see <a href="http://www.gnu.org/licenses/">http://www.gnu.org/licenses/</a>.</p>";}s:17:"short_description";s:84:"Safely test drive any theme as an administrator, while visitors use the default one.";s:13:"download_link";s:58:"http://downloads.wordpress.org/plugin/theme-test-drive.zip";s:4:"tags";a:4:{s:5:"admin";s:5:"admin";s:4:"test";s:4:"test";s:5:"theme";s:5:"theme";s:6:"themes";s:6:"themes";}s:11:"donate_link";s:74:"https://www.networkforgood.org/donation/MakeDonation.aspx?ORGID2=920155875";}', 'no') ; 
INSERT INTO `wp_options` VALUES (2053, '_transient_timeout_4947213529bbc3de384c86be41e3df60', '1405672749', 'no') ; 
INSERT INTO `wp_options` VALUES (2054, '_transient_4947213529bbc3de384c86be41e3df60', 'O:8:"stdClass":21:{s:4:"name";s:21:"Regenerate Thumbnails";s:4:"slug";s:21:"regenerate-thumbnails";s:7:"version";s:5:"2.2.4";s:6:"author";s:55:"<a href="http://www.viper007bond.com/">Viper007Bond</a>";s:14:"author_profile";s:37:"//profiles.wordpress.org/viper007bond";s:12:"contributors";a:1:{s:12:"Viper007Bond";s:37:"//profiles.wordpress.org/viper007bond";}s:8:"requires";s:3:"2.8";s:6:"tested";s:5:"3.9.1";s:13:"compatibility";a:1:{s:5:"3.9.1";a:1:{s:5:"2.2.4";a:3:{i:0;i:100;i:1;i:6;i:2;i:6;}}}s:6:"rating";d:90.19999999999998863131622783839702606201171875;s:11:"num_ratings";i:414;s:7:"ratings";a:5:{i:5;i:331;i:4;i:39;i:3;i:5;i:2;i:1;i:1;i:38;}s:10:"downloaded";i:1284274;s:12:"last_updated";s:10:"2014-04-01";s:5:"added";s:10:"2008-08-28";s:8:"homepage";s:68:"http://www.viper007bond.com/wordpress-plugins/regenerate-thumbnails/";s:8:"sections";a:4:{s:11:"description";s:571:"<p>Regenerate Thumbnails allows you to regenerate the thumbnails for your image attachments. This is very handy if you\'ve changed any of your thumbnail dimensions (via Settings -&#62; Media) after previously uploading images or have changed to a theme with different featured post image dimensions.</p>

<p>You can either regenerate the thumbnails for all image uploads, individual image uploads, or specific multiple image uploads.</p>

<p>See the <a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/screenshots/">screenshots tab</a> for more details.</p>";s:12:"installation";s:184:"<ol>
<li>Go to your admin area and select Plugins -&#62; Add new from the menu.</li>
<li>Search for "Regenerate Thumbnails".</li>
<li>Click install.</li>
<li>Click activate.</li>
</ol>";s:11:"screenshots";s:1004:"<ol>
	<li>
		<a href=\'//s.w.org/plugins/regenerate-thumbnails/screenshot-1.png?r=0\' title=\'Click to view full-size screenshot 1\'><img src=\'//s.w.org/plugins/regenerate-thumbnails/screenshot-1.png?r=0\' alt=\'regenerate-thumbnails screenshot 1\' /></a>
		<p>The plugin at work regenerating thumbnails</p>
	</li>
	<li>
		<a href=\'//s.w.org/plugins/regenerate-thumbnails/screenshot-2.png?r=0\' title=\'Click to view full-size screenshot 2\'><img src=\'//s.w.org/plugins/regenerate-thumbnails/screenshot-2.png?r=0\' alt=\'regenerate-thumbnails screenshot 2\' /></a>
		<p>You can resize single images by hovering over their row in the Media Library</p>
	</li>
	<li>
		<a href=\'//s.w.org/plugins/regenerate-thumbnails/screenshot-3.png?r=0\' title=\'Click to view full-size screenshot 3\'><img src=\'//s.w.org/plugins/regenerate-thumbnails/screenshot-3.png?r=0\' alt=\'regenerate-thumbnails screenshot 3\' /></a>
		<p>You can resize specific multiples images using the checkboxes and the "Bulk Actions" dropdown</p>
	</li>
</ol>";s:9:"changelog";s:3893:"<h4>Version 2.2.4</h4>

<ul>
<li>Better AJAX response error handling in the JavaScript. This should fix a long-standing bug in this plugin. Props Hew Sutton.</li>
</ul>

<h4>Version 2.2.3</h4>

<ul>
<li>Make the capability required to use this plugin filterable so themes and other plugins can change it. Props <a href="http://jacksonwhelan.com/">Jackson Whelan</a>.</li>
</ul>

<h4>Version 2.2.2</h4>

<ul>
<li>Don\'t check the nonce until we\'re sure that the action called was for this plugin. Fixes lots of "Are you sure you want to do this?" error messages.</li>
</ul>

<h4>Version 2.2.1</h4>

<ul>
<li>Fix the bottom bulk action dropdown. Thanks Stefan for pointing out the issue!</li>
</ul>

<h4>Version 2.2.0</h4>

<ul>
<li>Changes to the Bulk Action functionality were made shortly before the release of WordPress 3.1 which broke the way I implemented the specific multiple image regeneration feature. This version adds to the Bulk Action menu using Javascript as that\'s the only way to do it currently.</li>
</ul>

<h4>Version 2.1.3</h4>

<ul>
<li>Move the <code>error_reporting()</code> call in the AJAX handler to the beginning so that we\'re more sure that no PHP errors are outputted. Some hosts disable usage of <code>set_time_limit()</code> and calling it was causing a PHP warning to be outputted.</li>
</ul>

<h4>Version 2.1.2</h4>

<ul>
<li>When regenerating all images, newest images are done first rather than the oldest.</li>
<li>Fixed a bug with regeneration error reporting in some browsers. Thanks to pete-sch for reporting the error.</li>
<li>Supress PHP errors in the AJAX handler to avoid sending an invalid JSON response. Thanks to pete-sch for reporting the error.</li>
<li>Better and more detailed error reporting for when <code>wp_generate_attachment_metadata()</code> fails.</li>
</ul>

<h4>Version 2.1.1</h4>

<ul>
<li>Clean up the wording a bit to better match the new features and just be easier to understand.</li>
<li>Updated screenshots.</li>
</ul>

<h4>Version 2.1.0</h4>

<p>Lots of new features!</p>

<ul>
<li>Thanks to a lot of jQuery help from <a href="http://borisschapira.com/">Boris Schapira</a>, a failed image regeneration will no longer stop the whole process.</li>
<li>The results of each image regeneration is now outputted. You can easily see which images were successfully regenerated and which failed. Was inspired by a concept by Boris.</li>
<li>There is now a button on the regeneration page that will allow you to abort resizing images for any reason. Based on code by Boris.</li>
<li>You can now regenerate single images from the Media page. The link to do so will show up in the actions list when you hover over the row.</li>
<li>You can now bulk regenerate multiple from the Media page. Check the boxes and then select "Regenerate Thumbnails" form the "Bulk Actions" dropdown. WordPress 3.1+ only.</li>
<li>The total time that the regeneration process took is now displayed in the final status message.</li>
<li>jQuery UI Progressbar version upgraded.</li>
</ul>

<h4>Version 2.0.3</h4>

<ul>
<li>Switch out deprecated function call.</li>
</ul>

<h4>Version 2.0.2</h4>

<ul>
<li>Directly query the database to only fetch what the plugin needs (the attachment ID). This will reduce the memory required as it\'s not storing the whole row for each attachment.</li>
</ul>

<h4>Version 2.0.1</h4>

<ul>
<li>I accidentally left a <code>check_admin_referer()</code> (nonce check) commented out.</li>
</ul>

<h4>Version 2.0.0</h4>

<ul>
<li>Recoded from scratch. Now uses an AJAX request per attachment to do the resizing. No more PHP maximum execution time errors or anything like that. Also features a pretty progress bar to let the user know how it\'s going.</li>
</ul>

<h4>Version 1.1.0</h4>

<ul>
<li>WordPress 2.7 updates -- code + UI. Thanks to jdub and Patrick F.</li>
</ul>

<h4>Version 1.0.0</h4>

<ul>
<li>Initial release.</li>
</ul>";}s:17:"short_description";s:76:"Allows you to regenerate your thumbnails after changing the thumbnail sizes.";s:13:"download_link";s:63:"http://downloads.wordpress.org/plugin/regenerate-thumbnails.zip";s:4:"tags";a:2:{s:9:"thumbnail";s:9:"thumbnail";s:10:"thumbnails";s:10:"thumbnails";}s:11:"donate_link";s:35:"http://www.viper007bond.com/donate/";}', 'no') ; 
INSERT INTO `wp_options` VALUES (2055, '_transient_timeout_b5acd041b405b0b35ef1638cadce62f9', '1405672750', 'no') ; 
INSERT INTO `wp_options` VALUES (2056, '_transient_b5acd041b405b0b35ef1638cadce62f9', 'O:8:"stdClass":21:{s:4:"name";s:15:"Simply Show IDs";s:4:"slug";s:15:"simply-show-ids";s:7:"version";s:5:"1.3.3";s:6:"author";s:41:"<a href="http://sivel.net">Matt Martz</a>";s:14:"author_profile";s:30:"//profiles.wordpress.org/sivel";s:12:"contributors";a:1:{s:5:"sivel";s:30:"//profiles.wordpress.org/sivel";}s:8:"requires";s:3:"3.0";s:6:"tested";s:5:"3.0.5";s:13:"compatibility";a:1:{s:5:"3.9.1";a:1:{s:5:"1.3.3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}}s:6:"rating";d:99;s:11:"num_ratings";i:39;s:7:"ratings";a:5:{i:5;i:38;i:4;i:0;i:3;i:1;i:2;i:0;i:1;i:0;}s:10:"downloaded";i:46562;s:12:"last_updated";s:10:"2010-06-26";s:5:"added";s:10:"2009-02-03";s:8:"homepage";s:43:"http://sivel.net/wordpress/simply-show-ids/";s:8:"sections";a:5:{s:11:"description";s:756:"<p>Simply shows the ID of Posts, Pages, Media, Links, Categories, Tags and Users in the admin tables for easy access. Very lightweight.</p>

<p>A common complaint about the edit posts, pages, media, links, categories, tags and users pages is that there is no easy way to see the ID of the specific item. This plugin will add a new column titled \'ID\' that will display each items ID.</p>

<p>IDs for categories, tags and users will only display when using WordPress 2.8 or newer.</p>

<p>This plugin is very simplistic and thus very lightweight. To facilitate the need of a lightweight alternative to other plugins of its type this plugin was created.</p>

<p>Props to <a href="http://flushinc.com/">Joel Fisher</a> for getting me moving on this plugin.</p>";s:12:"installation";s:290:"<ol>
<li>Upload the <code>simply-show-ids</code> folder to the <code>/wp-content/plugins/</code> directory or install directly through the plugin installer.</li>
<li>Activate the plugin through the \'Plugins\' menu in WordPress or by using the link provided by the plugin installer</li>
</ol>";s:11:"screenshots";s:268:"<ol>
	<li>
		<a href=\'//s.w.org/plugins/simply-show-ids/screenshot-1.png?r=0\' title=\'Click to view full-size screenshot 1\'><img src=\'//s.w.org/plugins/simply-show-ids/screenshot-1.png?r=0\' alt=\'simply-show-ids screenshot 1\' /></a>
		<p>Edit Posts Page</p>
	</li>
</ol>";s:9:"changelog";s:803:"<h4>1.3.3 (2010-06-25):</h4>

<ul>
<li>More WordPress 3.0 improvements</li>
<li>Increase minimum required WordPress version to 3.0</li>
</ul>

<h4>1.3.2 (2010-05-12):</h4>

<ul>
<li>Fix conflict with other plugins that add custom columns, props Jeremy Hou</li>
</ul>

<h4>1.3.1 (2010-04-04):</h4>

<ul>
<li>Fix incompatibilities with WordPress version prior to 3.0</li>
</ul>

<h4>1.3 (2010-04-04):</h4>

<ul>
<li>Add support to show IDs on comments and custom taxonomies</li>
</ul>

<h4>1.2 (2009-06-08):</h4>

<ul>
<li>Add support for WordPress 2.8 to show IDs for categories, tags and users.</li>
</ul>

<h4>1.1 (2009-02-05):</h4>

<ul>
<li>Increase the width of the new column to 50px from 20px to support longer IDs</li>
</ul>

<h4>1.0 (2009-02-04):</h4>

<ul>
<li>Initial Public Release</li>
</ul>";s:11:"other_notes";s:369:"<h3>Upgrade</h3>
<ol>
<li>Use the plugin updater in WordPress or...</li>
<li>Delete the previous <code>simply-show-ids</code> folder from the <code>/wp-content/plugins/</code> directory</li>
<li>Upload the new <code>simply-show-ids</code> folder to the <code>/wp-content/plugins/</code> directory</li>
</ol>
<h3>Usage</h3>
<ol>
<li>Just install and activate.</li>
</ol>";}s:17:"short_description";s:114:"Simply shows the ID of Posts, Pages, Media, Links, Categories, Tags and Users in the admin tables for easy access.";s:13:"download_link";s:63:"http://downloads.wordpress.org/plugin/simply-show-ids.1.3.3.zip";s:4:"tags";a:12:{s:5:"admin";s:5:"admin";s:8:"category";s:8:"category";s:2:"id";s:2:"id";s:3:"ids";s:3:"ids";s:5:"links";s:5:"links";s:5:"media";s:5:"media";s:4:"page";s:4:"page";s:4:"post";s:4:"Post";s:4:"show";s:4:"show";s:6:"simply";s:6:"simply";s:3:"tag";s:3:"tag";s:4:"user";s:4:"user";}s:11:"donate_link";s:23:"http://sivel.net/donate";}', 'no') ; 
INSERT INTO `wp_options` VALUES (2049, '_transient_timeout_d0f128e51a1b7efcba602994d97f5cf8', '1405672749', 'no') ; 
INSERT INTO `wp_options` VALUES (2050, '_transient_d0f128e51a1b7efcba602994d97f5cf8', 'O:8:"stdClass":21:{s:4:"name";s:9:"Pig Latin";s:4:"slug";s:8:"piglatin";s:7:"version";s:3:"0.1";s:6:"author";s:50:"<a href="http://nikolay.bg/">Nikolay Bachiyski</a>";s:14:"author_profile";s:35:"//profiles.wordpress.org/nbachiyski";s:12:"contributors";a:1:{s:10:"nbachiyski";s:35:"//profiles.wordpress.org/nbachiyski";}s:8:"requires";s:3:"2.7";s:6:"tested";s:5:"2.9.2";s:13:"compatibility";a:5:{s:5:"3.1.3";a:1:{s:3:"0.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.3.1";a:1:{s:3:"0.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.4";a:1:{s:3:"0.1";a:3:{i:0;i:0;i:1;i:1;i:2;i:0;}}s:3:"3.6";a:1:{s:3:"0.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.8";a:1:{s:3:"0.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}}s:6:"rating";d:100;s:11:"num_ratings";i:6;s:7:"ratings";a:5:{i:5;i:6;i:4;i:0;i:3;i:0;i:2;i:0;i:1;i:0;}s:10:"downloaded";i:8245;s:12:"last_updated";s:10:"2009-06-30";s:5:"added";s:10:"2009-06-30";s:8:"homepage";s:45:"http://wordpress.org/extend/plugins/piglatin/";s:8:"sections";a:3:{s:11:"description";s:464:"<p>Checking if all the strings in your plugin or theme are translatable can be a tedious task. Pig Latin helps you
by translating all messages to <a href="http://en.wikipedia.org/wiki/Pig_Latin">Pig Latin</a>. For example <em>Edit  Pages</em> is translated to <em>Editay agesPay</em>.</p>

<p>Text in Pig Latin is both noticeably different than English and readable. This way you can spot strings, which aren\'t translatable, while the interface is stil usable.</p>";s:12:"installation";s:341:"<p>This section describes how to install the plugin and get it working.</p>

<ol>
<li>Unzip <code>piglatin-x.x.zip</code></li>
<li>Upload the <code>piglatin</code> directory (not its contents, the whole directory) to <code>/wp-content/plugins/</code></li>
<li>Activate the plugin through the <code>Plugins</code> menu in WordPress</li>
</ol>";s:9:"changelog";s:49:"<h4>0.1</h4>

<ul>
<li>Initial release</li>
</ul>";}s:17:"short_description";s:74:"Overrides the current language and translates all messages into Pig Latin.";s:13:"download_link";s:54:"http://downloads.wordpress.org/plugin/piglatin.0.1.zip";s:4:"tags";a:8:{s:4:"i18n";s:4:"i18n";s:8:"piglatin";s:8:"piglatin";s:6:"plugin";s:6:"plugin";s:7:"plugins";s:7:"plugins";s:5:"theme";s:5:"theme";s:6:"themes";s:6:"themes";s:11:"translation";s:11:"translation";s:12:"translations";s:12:"translations";}s:11:"donate_link";N;}', 'no') ; 
INSERT INTO `wp_options` VALUES (2051, '_transient_timeout_8029daca0ab4439dcea4264a4e898365', '1405672749', 'no') ; 
INSERT INTO `wp_options` VALUES (2052, '_transient_8029daca0ab4439dcea4264a4e898365', 'O:8:"stdClass":21:{s:4:"name";s:10:"RTL Tester";s:4:"slug";s:10:"rtl-tester";s:7:"version";s:5:"1.0.4";s:6:"author";s:98:"<a href="http://blog.yoavfarhi.com">Yoav Farhi</a>, <a href="http://automattic.com">Automattic</a>";s:14:"author_profile";s:30:"//profiles.wordpress.org/yoavf";s:12:"contributors";a:2:{s:10:"automattic";s:35:"//profiles.wordpress.org/automattic";s:5:"yoavf";s:30:"//profiles.wordpress.org/yoavf";}s:8:"requires";s:3:"3.1";s:6:"tested";s:5:"3.8.3";s:13:"compatibility";a:14:{s:5:"2.9.2";a:1:{s:3:"0.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.1";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.1.1";a:2:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}s:5:"1.0.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.1.2";a:1:{s:3:"0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.3.1";a:1:{s:5:"1.0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.3.2";a:2:{s:5:"1.0.1";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}s:5:"1.0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.4";a:1:{s:5:"1.0.2";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.4.1";a:1:{s:5:"1.0.2";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.4.2";a:1:{s:5:"1.0.2";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.5.1";a:1:{s:5:"1.0.3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.5.2";a:1:{s:5:"1.0.3";a:3:{i:0;i:100;i:1;i:2;i:2;i:2;}}s:5:"3.7.1";a:2:{s:5:"1.0.3";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}s:5:"1.0.4";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:5:"3.8.1";a:1:{s:5:"1.0.4";a:3:{i:0;i:100;i:1;i:1;i:2;i:1;}}s:3:"3.9";a:1:{s:5:"1.0.4";a:3:{i:0;i:100;i:1;i:3;i:2;i:3;}}}s:6:"rating";d:91.599999999999994315658113919198513031005859375;s:11:"num_ratings";i:19;s:7:"ratings";a:5:{i:5;i:16;i:4;i:1;i:3;i:0;i:2;i:1;i:1;i:1;}s:10:"downloaded";i:17346;s:12:"last_updated";s:10:"2013-12-04";s:5:"added";s:10:"2010-04-29";s:8:"homepage";s:47:"http://wordpress.org/extend/plugins/rtl-tester/";s:8:"sections";a:3:{s:11:"description";s:208:"<p>This plugin adds a button to the admin bar that allow super admins to switch the text direction of the site. It can be used to test WordPress themes and plugins with Right To Left (RTL) text direction.</p>";s:12:"installation";s:23:"<p>Upload, Activate</p>";s:9:"changelog";s:426:"<h4>1.0.4</h4>

<p>Bug fix</p>

<h4>1.0.3</h4>

<p>Prevent a notice when no direction has been set.</p>

<h4>1.0.2</h4>

<p>Cleanup, bug fix</p>

<h4>1.0.1</h4>

<p>Activate RTL/LTR via the admin bar. Settings are per user, for admins only.</p>

<h4>0.2</h4>

<p>No more hooks - sets the text_direction variable on load.
Probably the simplest, yet useful, plugin in the repository :)</p>

<h4>0.1</h4>

<p>Initial version.</p>";}s:17:"short_description";s:41:"Test your themes and plugins in RTL mode.";s:13:"download_link";s:58:"http://downloads.wordpress.org/plugin/rtl-tester.1.0.4.zip";s:4:"tags";a:2:{s:3:"rtl";s:3:"rtl";s:7:"testing";s:7:"testing";}s:11:"donate_link";N;}', 'no') ; 
INSERT INTO `wp_options` VALUES (338, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:"auto_add";a:0:{}}', 'yes') ; 
INSERT INTO `wp_options` VALUES (2191, '_transient_timeout_feed_ac0b00fe65abe10e0c5b588f3ed8c7ca', '1407186379', 'no') ; 
INSERT INTO `wp_options` VALUES (2192, '_transient_feed_ac0b00fe65abe10e0c5b588f3ed8c7ca', 'a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"


";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:51:"
	
	
	
	
	
	
		
		
	
	
		
		
		
		
		
		
		
		
		
	";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:3:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:14:"WordPress News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:25:"http://wordpress.org/news";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:14:"WordPress News";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:13:"lastBuildDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 18 Jul 2014 21:15:58 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:5:"en-US";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:9:"generator";a:1:{i:0;a:5:{s:4:"data";s:42:"http://wordpress.org/?v=4.0-beta2-20140801";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:10:{i:0;a:6:{s:4:"data";s:45:"
		
		
		
		
		
				
		

		
		
				
			
		
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:20:"WordPress 4.0 Beta 2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/news/2014/07/wordpress-4-0-beta-2/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:64:"http://wordpress.org/news/2014/07/wordpress-4-0-beta-2/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 18 Jul 2014 21:15:35 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3261";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:374:"WordPress 4.0 Beta 2 is now available for download and testing. This is software still in development, so we don’t recommend that you run it on a production site. To get the beta, try the WordPress Beta Tester plugin (you’ll want “bleeding edge nightlies”). Or you can download the beta here (zip). For more of what’s new in version 4.0, check out [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:15:"Helen Hou-Sandi";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:1738:"<p>WordPress 4.0 Beta 2 is now available for download and testing. This is software still in development, so we don’t recommend that you run it on a production site. To get the beta, try the <a href="http://wordpress.org/extend/plugins/wordpress-beta-tester/">WordPress Beta Tester</a> plugin (you’ll want “bleeding edge nightlies”). Or you can <a href="http://wordpress.org/wordpress-4.0-beta2.zip">download the beta here</a> (zip).</p>
<p>For more of what’s new in version 4.0, <a href="http://wordpress.org/news/2014/07/wordpress-4-0-beta-1/">check out the Beta 1 blog post</a>. Some of the changes in Beta 2 include:</p>
<ul>
<li>Further refinements for the the plugin installation and media library experiences.</li>
<li>Updated TinyMCE, which now includes better indentation for lists and the restoration of the color picker.</li>
<li>Cookies are now tied to a session internally, so if you have trouble logging in, <a href="https://core.trac.wordpress.org/ticket/20276">#20276</a> may be the culprit.</li>
<li>Various bug fixes (there were <a href="https://core.trac.wordpress.org/log?rev=29228&amp;stop_rev=29060&amp;limit=200">nearly 170 changes</a> since last week).</li>
</ul>
<p>If you think you’ve found a bug, you can post to the <a href="http://wordpress.org/support/forum/alphabeta">Alpha/Beta area</a> in the support forums. Or, if you’re comfortable writing a bug report, <a href="http://core.trac.wordpress.org/">file one on the WordPress Trac</a>. There, you can also find <a href="http://core.trac.wordpress.org/tickets/major">a list of known bugs</a> and <a href="http://core.trac.wordpress.org/query?status=closed&amp;group=component&amp;milestone=4.0">everything we’ve fixed</a>.</p>
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:60:"http://wordpress.org/news/2014/07/wordpress-4-0-beta-2/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:45:"
		
		
		
		
		
				
		

		
		
				
			
		
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:20:"WordPress 4.0 Beta 1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/news/2014/07/wordpress-4-0-beta-1/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:64:"http://wordpress.org/news/2014/07/wordpress-4-0-beta-1/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 10 Jul 2014 10:17:41 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3248";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:329:"WordPress 4.0 Beta 1 is now available! This software is still in development, so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 4.0, try the WordPress Beta Tester plugin (you’ll want “bleeding edge nightlies”). Or you can [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:15:"Helen Hou-Sandi";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:4025:"<p>WordPress 4.0 Beta 1 is now available!</p>
<p><strong>This software is still in development,</strong> so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 4.0, try the <a href="http://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester</a> plugin (you’ll want “bleeding edge nightlies”). Or you can <a href="https://wordpress.org/wordpress-4.0-beta1.zip">download the beta here</a> (zip).</p>
<p>4.0 is due out next month, but to get there, we need your help testing what we&#8217;ve been working on:</p>
<ul>
<li><strong>Previews of <a href="http://codex.wordpress.org/Embeds">embedding via URLs</a></strong> in the visual editor and the &#8220;Insert from URL&#8221; tab in the media modal. Try pasting a URL (such as a <a href="http://wordpress.tv/">WordPress.tv</a> or YouTube video) onto its own line in the visual editor. (<a href="https://core.trac.wordpress.org/ticket/28195">#28195</a>, <a href="https://core.trac.wordpress.org/ticket/15490">#15490</a>)</li>
<li>The <strong>Media Library</strong> now has a &#8220;grid&#8221; view in addition to the existing list view. Clicking on an item takes you into a modal where you can see a larger preview and edit information about that attachment, and you can navigate between items right from the modal without closing it. (<a href="https://core.trac.wordpress.org/ticket/24716">#24716</a>)</li>
<li>We&#8217;re freshening up the <strong>plugin install experience</strong>. You&#8217;ll see some early visual changes as well as more information when searching for plugins and viewing details. (<a href="https://core.trac.wordpress.org/ticket/28785">#28785</a>, <a href="https://core.trac.wordpress.org/ticket/27440">#27440</a>)</li>
<li><strong>Selecting a language</strong> when you run the installation process. (<a href="https://core.trac.wordpress.org/ticket/28577">#28577</a>)</li>
<li>The <strong>editor</strong> intelligently resizes and its top and bottom bars pin when needed. Browsers don&#8217;t like to agree on where to put things like cursors, so if you find a bug here, please also let us know your browser and operating system. (<a href="https://core.trac.wordpress.org/ticket/28328">#28328</a>)</li>
<li>We&#8217;ve made some improvements to how your keyboard and cursor interact with <strong>TinyMCE views</strong> such as the gallery preview. Much like the editor resizing and scrolling improvements, knowing about your setup is particularly important for bug reports here. (<a href="https://core.trac.wordpress.org/ticket/28595">#28595</a>)</li>
<li><strong>Widgets in the Customizer</strong> are now loaded in a separate panel. (<a href="https://core.trac.wordpress.org/ticket/27406">#27406</a>)</li>
<li>We&#8217;ve also made some changes to some <strong>formatting</strong> functions, so if you see quotes curling in the wrong direction, please file a bug report.</li>
</ul>
<p><strong>If you think you’ve found a bug</strong>, you can post to the <a href="http://wordpress.org/support/forum/alphabeta">Alpha/Beta area</a> in the support forums. We’d love to hear from you! If you’re comfortable writing a reproducible bug report, <a href="https://make.wordpress.org/core/reports/">file one on the WordPress Trac</a>. There, you can also find <a href="http://core.trac.wordpress.org/tickets/major">a list of known bugs</a> and <a href="http://core.trac.wordpress.org/query?status=closed&amp;group=component&amp;milestone=4.0">everything we’ve fixed</a> so far.</p>
<p><strong>Developers:</strong> Never fear, we haven&#8217;t forgotten you. There&#8217;s plenty for you, too &#8211; more on that in upcoming posts. In the meantime, check out the <a href="http://make.wordpress.org/core/2014/07/08/customizer-improvements-in-4-0/#customizer-panels">API for panels in the Customizer</a>.</p>
<p>Happy testing!</p>
<p><em>Plugins, editor</em><br />
<em>Media, things in between</em><br />
<em>Please help look for bugs</em></p>
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:60:"http://wordpress.org/news/2014/07/wordpress-4-0-beta-1/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:42:"
		
		
		
		
		
				

		
		
				
			
		
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:35:"WordPress 3.9.1 Maintenance Release";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:50:"http://wordpress.org/news/2014/05/wordpress-3-9-1/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:59:"http://wordpress.org/news/2014/05/wordpress-3-9-1/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 08 May 2014 18:40:58 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3241";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:385:"After three weeks and more than 9 million downloads of WordPress 3.9, we&#8217;re pleased to announce that WordPress 3.9.1 is now available. This maintenance release fixes 34 bugs in 3.9, including numerous fixes for multisite networks, customizing widgets while previewing themes, and the updated visual editor. We&#8217;ve also made some improvements to the new audio/video [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Andrew Nacin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:3077:"<p>After three weeks and more than 9 million downloads of <a title="WordPress 3.9 “Smith”" href="http://wordpress.org/news/2014/04/smith/">WordPress 3.9</a>, we&#8217;re pleased to announce that WordPress 3.9.1 is now available.</p>
<p>This maintenance release fixes 34 bugs in 3.9, including numerous fixes for multisite networks, customizing widgets while previewing themes, and the updated visual editor. We&#8217;ve also made some improvements to the new audio/video playlists feature and made some adjustments to improve performance. For a full list of changes, consult the <a href="https://core.trac.wordpress.org/query?milestone=3.9.1">list of tickets</a> and the <a href="https://core.trac.wordpress.org/log/branches/3.9?rev=28353&amp;stop_rev=28154">changelog</a>.</p>
<p>If you are one of the millions already running WordPress 3.9, we&#8217;ve started rolling out automatic background updates for 3.9.1. For sites <a href="http://wordpress.org/plugins/background-update-tester/">that support them</a>, of course.</p>
<p><a href="http://wordpress.org/download/">Download WordPress 3.9.1</a> or venture over to <strong>Dashboard → Updates</strong> and simply click &#8220;Update Now.&#8221;</p>
<p>Thanks to all of these fine individuals for contributing to 3.9.1: <a href="http://profiles.wordpress.org/jorbin">Aaron Jorbin</a>, <a href="http://profiles.wordpress.org/nacin">Andrew Nacin</a>, <a href="http://profiles.wordpress.org/azaozz">Andrew Ozz</a>, <a href="http://profiles.wordpress.org/rzen">Brian Richards</a>, <a href="http://profiles.wordpress.org/ehg">Chris Blower</a>, <a href="http://profiles.wordpress.org/jupiterwise">Corey McKrill</a>, <a href="http://profiles.wordpress.org/danielbachhuber">Daniel Bachhuber</a>, <a href="http://profiles.wordpress.org/ocean90">Dominik Schilling</a>, <a href="http://profiles.wordpress.org/feedmeastraycat">feedmeastraycat</a>, <a href="http://profiles.wordpress.org/gcorne">Gregory Cornelius</a>, <a href="http://profiles.wordpress.org/helen">Helen Hou-Sandi</a>, <a href="http://profiles.wordpress.org/imath">imath</a>, <a href="http://profiles.wordpress.org/avryl">Janneke Van Dorpe</a>, <a href="http://profiles.wordpress.org/jeremyfelt">Jeremy Felt</a>, <a href="http://profiles.wordpress.org/johnbillion">John Blackbourn</a>, <a href="http://profiles.wordpress.org/obenland">Konstantin Obenland</a>, <a href="http://profiles.wordpress.org/lancewillett">Lance Willett</a>, <a href="http://profiles.wordpress.org/m_i_n">m_i_n</a>, <a href="http://profiles.wordpress.org/clorith">Marius Jensen</a>, <a href="http://profiles.wordpress.org/markjaquith">Mark Jaquith</a>, <a href="http://profiles.wordpress.org/dimadin">Milan Dinić</a>, <a href="http://profiles.wordpress.org/celloexpressions">Nick Halsey</a>, <a href="http://profiles.wordpress.org/pavelevap">pavelevap</a>, <a href="http://profiles.wordpress.org/wonderboymusic">Scott Taylor</a>, <a href="http://profiles.wordpress.org/SergeyBiryukov">Sergey Biryukov</a>, and <a href="http://profiles.wordpress.org/westonruter">Weston Ruter</a>.</p>
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/news/2014/05/wordpress-3-9-1/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:42:"
		
		
		
		
		
				

		
		
				
			
		
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:25:"WordPress 3.9 “Smith”";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:40:"http://wordpress.org/news/2014/04/smith/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:49:"http://wordpress.org/news/2014/04/smith/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 16 Apr 2014 18:33:44 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3154";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:411:"Version 3.9 of WordPress, named &#8220;Smith&#8221; in honor of jazz organist Jimmy Smith, is available for download or update in your WordPress dashboard. This release features a number of refinements that we hope you&#8217;ll love. A smoother media editing experience Improved visual editing The updated visual editor has improved speed, accessibility, and mobile support. You can paste into the [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:14:"Matt Mullenweg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:23298:"<p>Version 3.9 of WordPress, named &#8220;Smith&#8221; in honor of jazz organist <a href="http://en.wikipedia.org/wiki/Jimmy_Smith_(musician)">Jimmy Smith</a>, is available <a href="http://wordpress.org/download/">for download</a> or update in your WordPress dashboard. This release features a number of refinements that we hope you&#8217;ll love.</p>
<embed src="//v0.wordpress.com/player.swf?v=1.03" type="application/x-shockwave-flash" width="640" height="360" wmode="direct" seamlesstabbing="true" allowfullscreen="true" allowscriptaccess="always" overstretch="true" flashvars="guid=sAiXhCfV&amp;isDynamicSeeking=true" title=""></embed>
<h2 class="about-headline-callout" style="text-align: center">A smoother media editing experience</h2>
<div>
<p><img class="alignright wp-image-3168" src="//wordpress.org/news/files/2014/04/editor1-300x233.jpg" alt="editor" width="228" height="177" /></p>
<h3>Improved visual editing</h3>
<p>The updated visual editor has improved speed, accessibility, and mobile support. You can paste into the visual editor from your word processor without wasting time to clean up messy styling. (Yeah, we’re talking about you, Microsoft Word.)</p>
</div>
<div style="clear: both"></div>
<div>
<p><img class="alignright wp-image-3170" src="//wordpress.org/news/files/2014/04/image1-300x233.jpg" alt="image" width="228" height="178" /></p>
<h3>Edit images easily</h3>
<p>With quicker access to crop and rotation tools, it’s now much easier to edit your images while editing posts. You can also scale images directly in the editor to find just the right fit.</p>
</div>
<div style="clear: both"></div>
<div>
<p><img class="alignright wp-image-3187" src="//wordpress.org/news/files/2014/04/dragdrop1-300x233.jpg" alt="dragdrop" width="228" height="178" /></p>
<h3>Drag and drop your images</h3>
<p>Uploading your images is easier than ever. Just grab them from your desktop and drop them in the editor.</p>
</div>
<div style="clear: both"></div>
<hr />
<h2 style="text-align: center">Gallery previews</h2>
<p><img class="aligncenter size-full wp-image-3169" src="//wordpress.org/news/files/2014/04/gallery1.jpg" alt="gallery" width="980" height="550" /></p>
<p>Galleries display a beautiful grid of images right in the editor, just like they do in your published post.</p>
<hr />
<h2 style="text-align: center">Do more with audio and video</h2>

<a href=\'http://wordpress.org/news/files/2014/04/AintMisbehavin.mp3\'>Ain\'t Misbehavin\'</a>
<a href=\'http://wordpress.org/news/files/2014/04/DavenportBlues.mp3\'>Davenport Blues</a>
<a href=\'http://wordpress.org/news/files/2014/04/JellyRollMorton-BuddyBoldensBlues.mp3\'>Buddy Bolden\'s Blues</a>
<a href=\'http://wordpress.org/news/files/2014/04/Johnny_Hodges_Orchestra-Squaty_Roo-1941.mp3\'>Squaty Roo</a>
<a href=\'http://wordpress.org/news/files/2014/04/Louisiana_Five-Dixie_Blues-1919.mp3\'>Dixie Blues</a>
<a href=\'http://wordpress.org/news/files/2014/04/WolverineBlues.mp3\'>Wolverine Blues</a>

<p>Images have galleries; now we’ve added simple audio and video playlists, so you can showcase your music and clips.</p>
<hr />
<h2 style="text-align: center">Live widget and header previews</h2>
<div style="width: 692px; max-width: 100%;" class="wp-video"><!--[if lt IE 9]><script>document.createElement(\'video\');</script><![endif]-->
<video class="wp-video-shortcode" id="video-3154-1" width="692" height="448" preload="metadata" controls="controls"><source type="video/mp4" src="//wordpress.org/news/files/2014/04/widgets.mp4?_=1" /><a href="//wordpress.org/news/files/2014/04/widgets.mp4">//wordpress.org/news/files/2014/04/widgets.mp4</a></video></div>
<p>Add, edit, and rearrange your site’s widgets right in the theme customizer. No “save and surprise” — preview your changes live and only save them when you’re ready.</p>
<p>The improved header image tool also lets you upload, crop, and manage headers while customizing your theme.</p>
<hr />
<h2 style="text-align: center">Stunning new theme browser</h2>
<p><img class="aligncenter size-full wp-image-3172" src="//wordpress.org/news/files/2014/04/theme1.jpg" alt="theme" width="1003" height="558" /><br />
Looking for a new theme should be easy and fun. Lose yourself in the boundless supply of free WordPress.org themes with the beautiful new theme browser.</p>
<hr />
<h2 style="text-align: center">The Crew</h2>
<p>This release was led by <a href="http://nacin.com/">Andrew Nacin</a> and <a href="http://www.getsource.net/">Mike Schroder</a>, with the help of these fine individuals. There are 267 contributors with props in this release, a new high:</p>
<p><a href="http://profiles.wordpress.org/aaroncampbell">Aaron D. Campbell</a>, <a href="http://profiles.wordpress.org/jorbin">Aaron Jorbin</a>, <a href="http://profiles.wordpress.org/kawauso">Adam Harley</a>, <a href="http://profiles.wordpress.org/adamsilverstein">Adam Silverstein</a>, <a href="http://profiles.wordpress.org/adelval">adelval</a>, <a href="http://profiles.wordpress.org/ajay">Ajay</a>, <a href="http://profiles.wordpress.org/akeda">Akeda Bagus</a>, <a href="http://profiles.wordpress.org/xknown">Alex Concha</a>, <a href="http://profiles.wordpress.org/tellyworth">Alex Shiels</a>, <a href="http://profiles.wordpress.org/aliso">Alison Barrett</a>, <a href="http://profiles.wordpress.org/collinsinternet">Allan Collins</a>, <a href="http://profiles.wordpress.org/sabreuse">Amy Hendrix (sabreuse)</a>, <a href="http://profiles.wordpress.org/afercia">Andrea Fercia</a>, <a href="http://profiles.wordpress.org/nacin">Andrew Nacin</a>, <a href="http://profiles.wordpress.org/norcross">Andrew Norcross</a>, <a href="http://profiles.wordpress.org/azaozz">Andrew Ozz</a>, <a href="http://profiles.wordpress.org/rarst">Andrey "Rarst" Savchenko</a>, <a href="http://profiles.wordpress.org/andykeith">Andy Keith</a>, <a href="http://profiles.wordpress.org/andy">Andy Skelton</a>, <a href="http://profiles.wordpress.org/atimmer">Anton Timmermans</a>, <a href="http://profiles.wordpress.org/aubreypwd">Aubrey Portwood</a>, <a href="http://profiles.wordpress.org/barry">Barry</a>, <a href="http://profiles.wordpress.org/toszcze">Bartosz Romanowski</a>, <a href="http://profiles.wordpress.org/bassgang">bassgang</a>, <a href="http://profiles.wordpress.org/bcworkz">bcworkz</a>, <a href="http://profiles.wordpress.org/empireoflight">Ben Dunkle</a>, <a href="http://profiles.wordpress.org/neoxx">Bernhard Riedl</a>, <a href="http://profiles.wordpress.org/bigdawggi">bigdawggi</a>, <a href="http://profiles.wordpress.org/bobbravo2">Bob Gregor</a>, <a href="http://profiles.wordpress.org/bobbingwide">bobbingwide</a>, <a href="http://profiles.wordpress.org/bradt">Brad Touesnard</a>, <a href="http://profiles.wordpress.org/bradparbs">bradparbs</a>, <a href="http://profiles.wordpress.org/bramd">bramd</a>, <a href="http://profiles.wordpress.org/kraftbj">Brandon Kraft</a>, <a href="http://profiles.wordpress.org/brasofilo">brasofilo</a>, <a href="http://profiles.wordpress.org/bravokeyl">bravokeyl</a>, <a href="http://profiles.wordpress.org/bpetty">Bryan Petty</a>, <a href="http://profiles.wordpress.org/cgaffga">cgaffga</a>, <a href="http://profiles.wordpress.org/chiragswadia">Chirag Swadia</a>, <a href="http://profiles.wordpress.org/chouby">Chouby</a>, <a href="http://profiles.wordpress.org/ehg">Chris Blower</a>, <a href="http://profiles.wordpress.org/cmmarslender">Chris Marslender</a>, <a href="http://profiles.wordpress.org/c3mdigital">Chris Olbekson</a>, <a href="http://profiles.wordpress.org/chrisscott">Chris Scott</a>, <a href="http://profiles.wordpress.org/chriseverson">chriseverson</a>, <a href="http://profiles.wordpress.org/chrisguitarguy">chrisguitarguy</a>, <a href="http://profiles.wordpress.org/cfinke">Christopher Finke</a>, <a href="http://profiles.wordpress.org/ciantic">ciantic</a>, <a href="http://profiles.wordpress.org/antorome">Comparativa de Bancos</a>, <a href="http://profiles.wordpress.org/cojennin">Connor Jennings</a>, <a href="http://profiles.wordpress.org/corvannoorloos">Cor van Noorloos</a>, <a href="http://profiles.wordpress.org/corphi">Corphi</a>, <a href="http://profiles.wordpress.org/cramdesign">cramdesign</a>, <a href="http://profiles.wordpress.org/danielbachhuber">Daniel Bachhuber</a>, <a href="http://profiles.wordpress.org/redsweater">Daniel Jalkut (Red Sweater)</a>, <a href="http://profiles.wordpress.org/dannydehaan">Danny de Haan</a>, <a href="http://profiles.wordpress.org/koop">Daryl Koopersmith</a>, <a href="http://profiles.wordpress.org/eightface">Dave Kellam (eightface)</a>, <a href="http://profiles.wordpress.org/dpe415">DaveE</a>, <a href="http://profiles.wordpress.org/davidakennedy">David A. Kennedy</a>, <a href="http://profiles.wordpress.org/davidanderson">David Anderson</a>, <a href="http://profiles.wordpress.org/davidmarichal">David Marichal</a>, <a href="http://profiles.wordpress.org/denis-de-bernardy">Denis de Bernardy</a>, <a href="http://profiles.wordpress.org/dd32">Dion Hulse</a>, <a href="http://profiles.wordpress.org/ocean90">Dominik Schilling</a>, <a href="http://profiles.wordpress.org/dougwollison">Doug Wollison</a>, <a href="http://profiles.wordpress.org/drewapicture">Drew Jaynes</a>, <a href="http://profiles.wordpress.org/drprotocols">DrProtocols</a>, <a href="http://profiles.wordpress.org/dustyf">Dustin Filippini</a>, <a href="http://profiles.wordpress.org/eatingrules">eatingrules</a>, <a href="http://profiles.wordpress.org/plocha">edik</a>, <a href="http://profiles.wordpress.org/eliorivero">Elio Rivero</a>, <a href="http://profiles.wordpress.org/enej">enej</a>, <a href="http://profiles.wordpress.org/ericlewis">Eric Andrew Lewis</a>, <a href="http://profiles.wordpress.org/ericmann">Eric Mann</a>, <a href="http://profiles.wordpress.org/evarlese">Erica Varlese</a>, <a href="http://profiles.wordpress.org/ethitter">Erick Hitter</a>, <a href="http://profiles.wordpress.org/ejdanderson">Evan Anderson</a>, <a href="http://profiles.wordpress.org/fahmiadib">Fahmi Adib</a>, <a href="http://profiles.wordpress.org/fboender">fboender</a>, <a href="http://profiles.wordpress.org/frank-klein">Frank Klein</a>, <a href="http://profiles.wordpress.org/garyc40">Gary Cao</a>, <a href="http://profiles.wordpress.org/garyj">Gary Jones</a>, <a href="http://profiles.wordpress.org/pento">Gary Pendergast</a>, <a href="http://profiles.wordpress.org/genkisan">genkisan</a>, <a href="http://profiles.wordpress.org/soulseekah">Gennady Kovshenin</a>, <a href="http://profiles.wordpress.org/georgestephanis">George Stephanis</a>, <a href="http://profiles.wordpress.org/grahamarmfield">Graham Armfield</a>, <a href="http://profiles.wordpress.org/vancoder">Grant Mangham</a>, <a href="http://profiles.wordpress.org/gcorne">Gregory Cornelius</a>, <a href="http://profiles.wordpress.org/tivnet">Gregory Karpinsky (@tivnet)</a>, <a href="http://profiles.wordpress.org/hakre">hakre</a>, <a href="http://profiles.wordpress.org/hanni">hanni</a>, <a href="http://profiles.wordpress.org/helen">Helen Hou-Sandí</a>, <a href="http://profiles.wordpress.org/ippetkov">ippetkov</a>, <a href="http://profiles.wordpress.org/ipstenu">Ipstenu (Mika Epstein)</a>, <a href="http://profiles.wordpress.org/jdgrimes">J.D. Grimes</a>, <a href="http://profiles.wordpress.org/jackreichert">Jack Reichert</a>, <a href="http://profiles.wordpress.org/_jameslee">jameslee</a>, <a href="http://profiles.wordpress.org/avryl">Janneke Van Dorpe</a>, <a href="http://profiles.wordpress.org/janrenn">janrenn</a>, <a href="http://profiles.wordpress.org/jaycc">JayCC</a>, <a href="http://profiles.wordpress.org/jeffsebring">Jeff Sebring</a>, <a href="http://profiles.wordpress.org/jenmylo">Jen Mylo</a>, <a href="http://profiles.wordpress.org/jeremyfelt">Jeremy Felt</a>, <a href="http://profiles.wordpress.org/jesin">Jesin A</a>, <a href="http://profiles.wordpress.org/jayjdk">Jesper Johansen (jayjdk)</a>, <a href="http://profiles.wordpress.org/jnielsendotnet">jnielsendotnet</a>, <a href="http://profiles.wordpress.org/jartes">Joan Artes</a>, <a href="http://profiles.wordpress.org/joedolson">Joe Dolson</a>, <a href="http://profiles.wordpress.org/joehoyle">Joe Hoyle</a>, <a href="http://profiles.wordpress.org/johnbillion">John Blackbourn</a>, <a href="http://profiles.wordpress.org/johnjamesjacoby">John James Jacoby</a>, <a href="http://profiles.wordpress.org/johnpbloch">John P. Bloch</a>, <a href="http://profiles.wordpress.org/johnregan3">John Regan</a>, <a href="http://profiles.wordpress.org/duck_">Jon Cave</a>, <a href="http://profiles.wordpress.org/jond3r">Jonas Bolinder (jond3r)</a>, <a href="http://profiles.wordpress.org/joostdevalk">Joost de Valk</a>, <a href="http://profiles.wordpress.org/shelob9">Josh Pollock</a>, <a href="http://profiles.wordpress.org/joshuaabenazer">Joshua Abenazer</a>, <a href="http://profiles.wordpress.org/jstraitiff">jstraitiff</a>, <a href="http://profiles.wordpress.org/juliobox">Julio Potier</a>, <a href="http://profiles.wordpress.org/kopepasah">Justin Kopepasah</a>, <a href="http://profiles.wordpress.org/justinsainton">Justin Sainton</a>, <a href="http://profiles.wordpress.org/kadamwhite">K.Adam White</a>, <a href="http://profiles.wordpress.org/trepmal">Kailey (trepmal)</a>, <a href="http://profiles.wordpress.org/kasparsd">Kaspars</a>, <a href="http://profiles.wordpress.org/ryelle">Kelly Dwan</a>, <a href="http://profiles.wordpress.org/kerikae">kerikae</a>, <a href="http://profiles.wordpress.org/kworthington">Kevin Worthington</a>, <a href="http://profiles.wordpress.org/kpdesign">Kim Parsell</a>, <a href="http://profiles.wordpress.org/kwight">Kirk Wight</a>, <a href="http://profiles.wordpress.org/kitchin">kitchin</a>, <a href="http://profiles.wordpress.org/klihelp">klihelp</a>, <a href="http://profiles.wordpress.org/knutsp">Knut Sparhell</a>, <a href="http://profiles.wordpress.org/kovshenin">Konstantin Kovshenin</a>, <a href="http://profiles.wordpress.org/obenland">Konstantin Obenland</a>, <a href="http://profiles.wordpress.org/drozdz">Krzysiek Drozdz</a>, <a href="http://profiles.wordpress.org/lancewillett">Lance Willett</a>, <a href="http://profiles.wordpress.org/leewillis77">Lee Willis</a>, <a href="http://profiles.wordpress.org/lpointet">lpointet</a>, <a href="http://profiles.wordpress.org/ldebrouwer">Luc De Brouwer</a>, <a href="http://profiles.wordpress.org/spmlucas">Lucas Karpiuk</a>, <a href="http://profiles.wordpress.org/lkwdwrd">Luke Woodward</a>, <a href="http://profiles.wordpress.org/mark8barnes">Mark Barnes</a>, <a href="http://profiles.wordpress.org/markjaquith">Mark Jaquith</a>, <a href="http://profiles.wordpress.org/markoheijnen">Marko Heijnen</a>, <a href="http://profiles.wordpress.org/marventus">Marventus</a>, <a href="http://profiles.wordpress.org/iammattthomas">Matt (Thomas) Miklic</a>, <a href="http://profiles.wordpress.org/mjbanks">Matt Banks</a>, <a href="http://profiles.wordpress.org/matt">Matt Mullenweg</a>, <a href="http://profiles.wordpress.org/mboynes">Matthew Boynes</a>, <a href="http://profiles.wordpress.org/mdbitz">Matthew Denton</a>, <a href="http://profiles.wordpress.org/mattheu">Matthew Haines-Young</a>, <a href="http://profiles.wordpress.org/mattonomics">mattonomics</a>, <a href="http://profiles.wordpress.org/mattyrob">mattyrob</a>, <a href="http://profiles.wordpress.org/matveb">Matías Ventura</a>, <a href="http://profiles.wordpress.org/maxcutler">Max Cutler</a>, <a href="http://profiles.wordpress.org/mcadwell">mcadwell</a>, <a href="http://profiles.wordpress.org/melchoyce">Mel Choyce</a>, <a href="http://profiles.wordpress.org/meloniq">meloniq</a>, <a href="http://profiles.wordpress.org/michael-arestad">Michael Arestad</a>, <a href="http://profiles.wordpress.org/michelwppi">Michel - xiligroup dev</a>, <a href="http://profiles.wordpress.org/mcsf">Miguel Fonseca</a>, <a href="http://profiles.wordpress.org/gradyetc">Mike Burns</a>, <a href="http://profiles.wordpress.org/mikehansenme">Mike Hansen</a>, <a href="http://profiles.wordpress.org/mikemanger">Mike Manger</a>, <a href="http://profiles.wordpress.org/mikeschinkel">Mike Schinkel</a>, <a href="http://profiles.wordpress.org/dh-shredder">Mike Schroder</a>, <a href="http://profiles.wordpress.org/mikecorkum">mikecorkum</a>, <a href="http://profiles.wordpress.org/mitchoyoshitaka">mitcho (Michael Yoshitaka Erlewine)</a>, <a href="http://profiles.wordpress.org/batmoo">Mohammad Jangda</a>, <a href="http://profiles.wordpress.org/morganestes">Morgan Estes</a>, <a href="http://profiles.wordpress.org/mor10">Morten Rand-Hendriksen</a>, <a href="http://profiles.wordpress.org/Nao">Naoko Takano</a>, <a href="http://profiles.wordpress.org/alex-ye">Nashwan Doaqan</a>, <a href="http://profiles.wordpress.org/nendeb55">nendeb55</a>, <a href="http://profiles.wordpress.org/celloexpressions">Nick Halsey</a>, <a href="http://profiles.wordpress.org/nicolealleyinteractivecom">Nicole Arnold</a>, <a href="http://profiles.wordpress.org/nikv">Nikhil Vimal (NikV)</a>, <a href="http://profiles.wordpress.org/nivijah">Nivi Jah</a>, <a href="http://profiles.wordpress.org/nofearinc">nofearinc</a>, <a href="http://profiles.wordpress.org/nunomorgadinho">Nuno Morgadinho</a>, <a href="http://profiles.wordpress.org/olivm">olivM</a>, <a href="http://profiles.wordpress.org/jbkkd">Omer Korner</a>, <a href="http://profiles.wordpress.org/originalexe">OriginalEXE</a>, <a href="http://profiles.wordpress.org/oso96_2000">oso96_2000</a>, <a href="http://profiles.wordpress.org/patricknami">patricknami</a>, <a href="http://profiles.wordpress.org/pbearne">Paul Bearne</a>, <a href="http://profiles.wordpress.org/djpaul">Paul Gibbs</a>, <a href="http://profiles.wordpress.org/paulwilde">Paul Wilde</a>, <a href="http://profiles.wordpress.org/pavelevap">pavelevap</a>, <a href="http://profiles.wordpress.org/westi">Peter Westwood</a>, <a href="http://profiles.wordpress.org/philiparthurmoore">Philip Arthur Moore</a>, <a href="http://profiles.wordpress.org/mordauk">Pippin Williamson</a>, <a href="http://profiles.wordpress.org/nprasath002">Prasath Nadarajah</a>, <a href="http://profiles.wordpress.org/prettyboymp">prettyboymp</a>, <a href="http://profiles.wordpress.org/raamdev">Raam Dev</a>, <a href="http://profiles.wordpress.org/rachelbaker">Rachel Baker</a>, <a href="http://profiles.wordpress.org/mauryaratan">Ram Ratan Maurya</a>, <a href="http://profiles.wordpress.org/ramonchiara">ramonchiara</a>, <a href="http://profiles.wordpress.org/ounziw">Rescuework Support</a>, <a href="http://profiles.wordpress.org/rhyswynne">Rhys Wynne</a>, <a href="http://profiles.wordpress.org/ricardocorreia">Ricardo Correia</a>, <a href="http://profiles.wordpress.org/theorboman">Richard Sweeney</a>, <a href="http://profiles.wordpress.org/iamfriendly">Richard Tape</a>, <a href="http://profiles.wordpress.org/richard2222">richard2222</a>, <a href="http://profiles.wordpress.org/rickalee">Ricky Lee Whittemore</a>, <a href="http://profiles.wordpress.org/miqrogroove">Robert Chapin</a>, <a href="http://profiles.wordpress.org/robmiller">robmiller</a>, <a href="http://profiles.wordpress.org/rodrigosprimo">Rodrigo Primo</a>, <a href="http://profiles.wordpress.org/romaimperator">romaimperator</a>, <a href="http://profiles.wordpress.org/roothorick">roothorick</a>, <a href="http://profiles.wordpress.org/ruudjoyo">Ruud Laan</a>, <a href="http://profiles.wordpress.org/ryan">Ryan Boren</a>, <a href="http://profiles.wordpress.org/rmccue">Ryan McCue</a>, <a href="http://profiles.wordpress.org/salcode">Sal Ferrarello</a>, <a href="http://profiles.wordpress.org/otto42">Samuel Wood (Otto)</a>, <a href="http://profiles.wordpress.org/sandyr">Sandeep</a>, <a href="http://profiles.wordpress.org/scottlee">Scott Lee</a>, <a href="http://profiles.wordpress.org/coffee2code">Scott Reilly</a>, <a href="http://profiles.wordpress.org/wonderboymusic">Scott Taylor</a>, <a href="http://profiles.wordpress.org/greglone">ScreenfeedFr</a>, <a href="http://profiles.wordpress.org/scribu">scribu</a>, <a href="http://profiles.wordpress.org/sdasse">sdasse</a>, <a href="http://profiles.wordpress.org/bootsz">Sean Butze</a>, <a href="http://profiles.wordpress.org/seanchayes">Sean Hayes</a>, <a href="http://profiles.wordpress.org/nessworthy">Sean Nessworthy</a>, <a href="http://profiles.wordpress.org/sergeybiryukov">Sergey Biryukov</a>, <a href="http://profiles.wordpress.org/shahpranaf">shahpranaf</a>, <a href="http://profiles.wordpress.org/shaunandrews">Shaun Andrews</a>, <a href="http://profiles.wordpress.org/shinichin">ShinichiN</a>, <a href="http://profiles.wordpress.org/pross">Simon Prosser</a>, <a href="http://profiles.wordpress.org/simonwheatley">Simon Wheatley</a>, <a href="http://profiles.wordpress.org/siobhan">Siobhan</a>, <a href="http://profiles.wordpress.org/siobhyb">Siobhan Bamber (siobhyb)</a>, <a href="http://profiles.wordpress.org/sirzooro">sirzooro</a>, <a href="http://profiles.wordpress.org/solarissmoke">solarissmoke</a>, <a href="http://profiles.wordpress.org/sonjanyc">sonjanyc</a>, <a href="http://profiles.wordpress.org/spencerfinnell">Spencer Finnell</a>, <a href="http://profiles.wordpress.org/piontkowski">Spencer Piontkowski</a>, <a href="http://profiles.wordpress.org/stephcook22">stephcook22</a>, <a href="http://profiles.wordpress.org/netweb">Stephen Edgar</a>, <a href="http://profiles.wordpress.org/stephenharris">Stephen Harris</a>, <a href="http://profiles.wordpress.org/sbruner">Steve Bruner</a>, <a href="http://profiles.wordpress.org/stevenkword">Steven Word</a>, <a href="http://profiles.wordpress.org/miyauchi">Takayuki Miyauchi</a>, <a href="http://profiles.wordpress.org/tanner-m">Tanner Moushey</a>, <a href="http://profiles.wordpress.org/tlovett1">Taylor Lovett</a>, <a href="http://profiles.wordpress.org/tbrams">tbrams</a>, <a href="http://profiles.wordpress.org/tobiasbg">TobiasBg</a>, <a href="http://profiles.wordpress.org/tomauger">Tom Auger</a>, <a href="http://profiles.wordpress.org/willmot">Tom Willmot</a>, <a href="http://profiles.wordpress.org/topher1kenobe">Topher</a>, <a href="http://profiles.wordpress.org/topquarky">topquarky</a>, <a href="http://profiles.wordpress.org/zodiac1978">Torsten Landsiedel</a>, <a href="http://profiles.wordpress.org/toru">Toru</a>, <a href="http://profiles.wordpress.org/wpsmith">Travis Smith</a>, <a href="http://profiles.wordpress.org/umeshsingla">Umesh Kumar</a>, <a href="http://profiles.wordpress.org/undergroundnetwork">undergroundnetwork</a>, <a href="http://profiles.wordpress.org/varunagw">VarunAgw</a>, <a href="http://profiles.wordpress.org/wawco">wawco</a>, <a href="http://profiles.wordpress.org/westonruter">Weston Ruter</a>, <a href="http://profiles.wordpress.org/wokamoto">wokamoto</a>, <a href="http://profiles.wordpress.org/xsonic">xsonic</a>, <a href="http://profiles.wordpress.org/yoavf">Yoav Farhi</a>, <a href="http://profiles.wordpress.org/yurivictor">Yuri Victor</a>, <a href="http://profiles.wordpress.org/zbtirrell">Zach Tirrell</a>, and <a href="http://profiles.wordpress.org/vanillalounge">Ze Fontainhas</a>. Also thanks to <a href="http://michaelpick.wordpress.com/">Michael Pick</a> for producing the release video.</p>
<p>If you want to follow along or help out, check out <a href="http://make.wordpress.org/">Make WordPress</a> and our <a href="http://make.wordpress.org/core/">core development blog</a>. Thanks for choosing WordPress. See you soon for version 4.0!</p>
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:45:"http://wordpress.org/news/2014/04/smith/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:45:"
		
		
		
		
		
				
		

		
		
				
			
		
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:33:"WordPress 3.9 Release Candidate 2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:68:"http://wordpress.org/news/2014/04/wordpress-3-9-release-candidate-2/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:77:"http://wordpress.org/news/2014/04/wordpress-3-9-release-candidate-2/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 15 Apr 2014 09:47:36 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3151";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:356:"The second release candidate for WordPress 3.9 is now available for testing. If you haven&#8217;t tested 3.9 yet, you&#8217;re running out of time! We made about five dozen changes since the first release candidate, and those changes are all helpfully summarized in our weekly post on the development blog. Probably the biggest fixes are to live [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Andrew Nacin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2273:"<p>The second release candidate for WordPress 3.9 is now available for testing.</p>
<p>If you haven&#8217;t tested 3.9 yet, you&#8217;re running out of time! We made about five dozen changes since the <a title="WordPress 3.9 Release Candidate" href="//wordpress.org/news/2014/04/wordpress-3-9-release-candidate/">first release candidate</a>, and those changes are all helpfully summarized <a href="//make.wordpress.org/core/?p=10237">in our weekly post</a> on the development blog. Probably the biggest fixes are to live widget previews and the new theme browser, along with some extra TinyMCE compatibility and some RTL fixes.</p>
<p><strong>Plugin authors:</strong> Could you test your plugins against 3.9, and if they&#8217;re compatible, make sure they are marked as tested up to 3.9? It only takes a few minutes and this really helps make launch easier. Be sure to follow along the core development blog; we&#8217;ve been posting <a href="//make.wordpress.org/core/tag/3-9-dev-notes/">notes for developers for 3.9</a>. (For example: <a href="//make.wordpress.org/core/2014/04/15/html5-galleries-captions-in-wordpress-3-9/">HTML5</a>, <a href="//make.wordpress.org/core/2014/04/14/symlinked-plugins-in-wordpress-3-9/">symlinks</a>, <a href="//make.wordpress.org/core/2014/04/07/mysql-in-wordpress-3-9/">MySQL</a>, <a href="//make.wordpress.org/core/2014/04/11/plupload-2-x-in-wordpress-3-9/">Plupload</a>.)</p>
<p>To test WordPress 3.9 RC2, try the <a href="//wordpress.org/extend/plugins/wordpress-beta-tester/">WordPress Beta Tester</a> plugin (you’ll want “bleeding edge nightlies”). Or you can <a href="//wordpress.org/wordpress-3.9-RC2.zip">download the release candidate here</a> (zip). If you’d like to learn more about what’s new in WordPress 3.9, visit the nearly complete About screen in your dashboard (<strong><img src="//i0.wp.com/core.svn.wordpress.org/branches/3.6/wp-content/themes/twentyten/images/wordpress.png?w=692" alt="" width="16" height="16" /> → About</strong> in the toolbar) and also check out <a title="WordPress 3.9 Beta 1" href="//wordpress.org/news/2014/03/wordpress-3-9-beta-1/">the Beta 1 post</a>.</p>
<p><em>This is for testing,</em><br />
<em>so not recommended for<br />
production sites—yet.</em></p>
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:73:"http://wordpress.org/news/2014/04/wordpress-3-9-release-candidate-2/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:42:"
		
		
		
		
		
				

		
		
				
			
		
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:35:"WordPress 3.8.3 Maintenance Release";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:50:"http://wordpress.org/news/2014/04/wordpress-3-8-3/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:59:"http://wordpress.org/news/2014/04/wordpress-3-8-3/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 14 Apr 2014 19:29:13 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:1:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3145";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:338:"WordPress 3.8.3 is now available to fix a small but unfortunate bug in the WordPress 3.8.2 security release. The &#8220;Quick Draft&#8221; tool on the dashboard screen was broken in the 3.8.2 update. If you tried to use it, your draft would disappear and it wouldn&#8217;t save. While we doubt anyone was writing a novella using [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Andrew Nacin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2339:"<p>WordPress 3.8.3 is now available to fix a small but unfortunate bug in the <a title="WordPress 3.8.2 Security Release" href="http://wordpress.org/news/2014/04/wordpress-3-8-2/">WordPress 3.8.2 security release</a>.</p>
<p>The &#8220;Quick Draft&#8221; tool on the dashboard screen was broken in the 3.8.2 update. If you tried to use it, your draft would disappear and it wouldn&#8217;t save. While we doubt anyone was writing a novella using this tool, <em>any</em> loss of content is unacceptable to us.</p>
<p>We recognize how much trust you place in us to safeguard your content, and we take this responsibility very seriously. We&#8217;re sorry we let you down.</p>
<p>We&#8217;ve all lost words we&#8217;ve written before, like an email thanks to a cat on the keyboard or a term paper to a blue screen of death. Over the last few WordPress releases, we&#8217;ve made a number of improvements to features like autosaves and revisions. With revisions, an old edit can always be restored. We&#8217;re trying our hardest to save your content somewhere even if your power goes out or your browser crashes. We even monitor your internet connection and prevent you from hitting that &#8220;Publish&#8221; button at the exact moment the coffee shop Wi-Fi has a hiccup.</p>
<p>It&#8217;s <em>possible</em> that the quick draft you lost last week is still in the database, and just hidden from view. As an added complication, these &#8220;discarded drafts&#8221; normally get deleted after seven days, and it&#8217;s already been six days since the release. If we were able to rescue your draft, you&#8217;ll see it on the &#8220;All Posts&#8221; screen after you update to 3.8.3. (We&#8217;ll also be pushing 3.8.3 out as a background update, so you may just see a draft appear.)</p>
<p>So, if you tried to jot down a quick idea last week, I hope WordPress has recovered it for you. Maybe it&#8217;ll turn into that novella.</p>
<p><a href="http://wordpress.org/download/">Download WordPress 3.8.3</a> or click &#8220;Update Now&#8221; on Dashboard → Updates.</p>
<p><em>This affected version 3.7.2 as well, so we&#8217;re pushing a 3.7.3 to these installs, but we&#8217;d encourage you to update to the latest and greatest.</em></p>
<hr />
<p><em>Now for some good news:<br />
WordPress 3.9 is near.<br />
Expect it this week</em></p>
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/news/2014/04/wordpress-3-8-3/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:45:"
		
		
		
		
		
				
		

		
		
				
			
		
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:31:"WordPress 3.9 Release Candidate";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:66:"http://wordpress.org/news/2014/04/wordpress-3-9-release-candidate/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:75:"http://wordpress.org/news/2014/04/wordpress-3-9-release-candidate/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 08 Apr 2014 21:05:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3129";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:338:"As teased earlier, the first release candidate for WordPress 3.9 is now available for testing! We hope to ship WordPress 3.9 next week, but we need your help to get there. If you haven’t tested 3.9 yet, there’s no time like the present. (Please, not on a production site, unless you’re adventurous.) To test WordPress 3.9 [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Andrew Nacin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2967:"<p><a href="//wordpress.org/news/2014/04/wordpress-3-8-2/">As teased earlier</a>, the first release candidate for WordPress 3.9 is now available for testing!</p>
<p>We hope to ship WordPress 3.9 <em>next week</em>, but we need your help to get there. If you haven’t tested 3.9 yet, there’s no time like the present. (Please, not on a production site, unless you’re adventurous.)</p>
<p>To test WordPress 3.9 RC1, try the <a href="//wordpress.org/extend/plugins/wordpress-beta-tester/">WordPress Beta Tester</a> plugin (you’ll want “bleeding edge nightlies”). Or you can <a href="//wordpress.org/wordpress-3.9-RC1.zip">download the release candidate here</a> (zip). If you’d like to learn more about what’s new in WordPress 3.9, visit the work-in-progress About screen in your dashboard (<strong><img src="//i0.wp.com/core.svn.wordpress.org/branches/3.6/wp-content/themes/twentyten/images/wordpress.png?w=692" alt="" width="16" height="16" /> → About</strong> in the toolbar) and check out <a title="WordPress 3.9 Beta 1" href="//wordpress.org/news/2014/03/wordpress-3-9-beta-1/">the Beta 1 post</a>.</p>
<p><strong>Think you’ve found a bug? </strong>Please post to the <a href="//wordpress.org/support/forum/alphabeta/">Alpha/Beta area in the support forums</a>. If any known issues come up, you’ll be able to <a href="//core.trac.wordpress.org/report/5">find them here</a>.</p>
<p><strong>If you&#8217;re a plugin author</strong>, there are two important changes in particular to be aware of:</p>
<ul>
<li>TinyMCE received a major update, to version 4.0. Any editor plugins written for TinyMCE 3.x might require some updates. (If things broke, we&#8217;d like to hear about them so we can make adjustments.) For more, see TinyMCE&#8217;s <a href="http://www.tinymce.com/wiki.php/Tutorial:Migration_guide_from_3.x">migration guide</a> and <a href="http://www.tinymce.com/wiki.php/api4:index">API documentation</a>, and the notes on the <a href="//make.wordpress.org/core/2014/01/18/tinymce-4-0-is-in-core/">core development blog</a>.</li>
<li>WordPress 3.9 now uses the MySQLi Improved extension for sites running PHP 5.5. Any plugins that made direct calls to <code>mysql_*</code> functions will experience some problems on these sites. For more information, see the notes on the <a href="//make.wordpress.org/core/2014/04/07/mysql-in-wordpress-3-9/">core development blog</a>.</li>
</ul>
<p>Be sure to follow along the core development blog, where we will be continuing to post <a href="//make.wordpress.org/core/tag/3-9-dev-notes/">notes for developers for 3.9</a>. (For example, read <a href="//make.wordpress.org/core/2014/03/27/masonry-in-wordpress-3-9/">this</a> if you are using Masonry in your theme.) And please, please update your plugin&#8217;s <em>Tested up to</em> version in the readme to 3.9 before April 16.</p>
<p><em>Release candidate<br />
This haiku&#8217;s the easy one<br />
3.9 is near</em></p>
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:71:"http://wordpress.org/news/2014/04/wordpress-3-9-release-candidate/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:45:"
		
		
		
		
		
				
		

		
		
				
			
		
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:32:"WordPress 3.8.2 Security Release";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:50:"http://wordpress.org/news/2014/04/wordpress-3-8-2/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:59:"http://wordpress.org/news/2014/04/wordpress-3-8-2/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 08 Apr 2014 19:04:44 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Security";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3124";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:355:"WordPress 3.8.2 is now available. This is an important security release for all previous versions and we strongly encourage you to update your sites immediately. This releases fixes a weakness that could let an attacker force their way into your site by forging authentication cookies. This was discovered and fixed by Jon Cave of the WordPress [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Andrew Nacin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2272:"<p>WordPress 3.8.2 is now available. This is an important security release for all previous versions and we strongly encourage you to update your sites immediately.</p>
<p>This releases fixes a weakness that could let an attacker force their way into your site by forging authentication cookies. This was discovered and fixed by <a href="http://joncave.co.uk/">Jon Cave</a> of the WordPress security team.</p>
<p>It also contains a fix to prevent a user with the Contributor role from improperly publishing posts. Reported by <a href="http://edik.ch/">edik</a>.</p>
<p>This release also fixes nine bugs and contains three other security hardening changes:</p>
<ul>
<li>Pass along additional information when processing pingbacks to help hosts identify potentially abusive requests.</li>
<li>Fix a low-impact SQL injection by trusted users. Reported by <a href="http://www.dxw.com/">Tom Adams</a> of dxw.</li>
<li>Prevent possible cross-domain scripting through Plupload, the third-party library WordPress uses for uploading files. Reported by <a href="http://szgru.website.pl/">Szymon Gruszecki</a>.</li>
</ul>
<p>We appreciated <a href="http://codex.wordpress.org/FAQ_Security">responsible disclosure</a> of these security issues directly to our security team. For more information on all of the changes, see the <a href="http://codex.wordpress.org/Version_3.8.2">release notes</a> or consult <a href="https://core.trac.wordpress.org/log/branches/3.8?rev=28057&amp;stop_rev=27024">the list of changes</a>.</p>
<p><a href="http://wordpress.org/download/">Download WordPress 3.8.2</a> or venture over to <strong>Dashboard → Updates</strong> and simply click &#8220;Update Now.&#8221;</p>
<p>Sites that support automatic background updates will be updated to WordPress 3.8.2 within 12 hours. If you are still on WordPress 3.7.1, you will be updated to 3.7.2, which contains the same security fixes as 3.8.2. We don&#8217;t support older versions, so please update to 3.8.2 for the latest and greatest.</p>
<p>Already testing WordPress 3.9? The first release candidate is <a href="https://wordpress.org/wordpress-3.9-RC1.zip">now available</a> (zip) and it contains these security fixes. Look for a full announcement later today; we expect to release 3.9 next week.</p>
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/news/2014/04/wordpress-3-8-2/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:45:"
		
		
		
		
		
				
		

		
		
				
			
		
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:20:"WordPress 3.9 Beta 3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/news/2014/03/wordpress-3-9-beta-3/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:64:"http://wordpress.org/news/2014/03/wordpress-3-9-beta-3/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 29 Mar 2014 13:15:10 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3106";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:373:"The third (and maybe last) beta of WordPress 3.9 is now available for download. Beta 3 includes more than 200 changes, including: New features like live widget previews and the new theme installer are now more ready for prime time, so check &#8216;em out. UI refinements when editing images and when working with media in the editor. We&#8217;ve also brought [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Andrew Nacin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:2668:"<p>The third (and maybe last) beta of WordPress 3.9 is now available for download.</p>
<p>Beta 3 includes more than 200 <a href="https://core.trac.wordpress.org/log?rev=27850&amp;stop_rev=27639&amp;limit=300">changes</a>, including:</p>
<ul>
<li>New features like live widget previews and the new theme installer are now more ready for prime time, so check &#8216;em out.</li>
<li>UI refinements when editing images and when working with media in the editor. We&#8217;ve also brought back some of the advanced display settings for images.</li>
<li>If you want to test out audio and video playlists, the links will appear in the media manager once you&#8217;ve uploaded an audio or video file.</li>
<li>For theme developers, we&#8217;ve added HTML5 caption support (<a class="reopened ticket" title="task (blessed): HTML5 captions (reopened)" href="https://core.trac.wordpress.org/ticket/26642">#26642</a>) to match the new gallery support (<a class="closed ticket" title="enhancement: HTML5 Galleries (closed: fixed)" href="https://core.trac.wordpress.org/ticket/26697">#26697</a>).</li>
<li>The formatting function that turns straight quotes into smart quotes (among other things) underwent some changes to drastically speed it up, so let us know if you see anything weird.</li>
</ul>
<p><strong>We need your help</strong>. We&#8217;re still aiming for an April release, which means the next week will be critical for identifying and squashing bugs. If you&#8217;re just joining us, please see <a href="https://wordpress.org/news/2014/03/wordpress-3-9-beta-1/">the Beta 1 announcement post</a> for what to look out for.</p>
<p><strong>If you think you’ve found a bug</strong>, you can post to the <a href="http://wordpress.org/support/forum/alphabeta">Alpha/Beta area</a> in the support forums, where friendly moderators are standing by. <b>Plugin developers</b><strong>,</strong> if you haven&#8217;t tested WordPress 3.9 yet, now is the time — and be sure to update the &#8220;tested up to&#8221; version for your plugins so they&#8217;re listed as compatible with 3.9.</p>
<p><strong>This software is still in development,</strong> so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 3.9, try the <a href="http://wordpress.org/extend/plugins/wordpress-beta-tester/">WordPress Beta Tester</a> plugin (you’ll want “bleeding edge nightlies”). Or you can <a href="http://wordpress.org/wordpress-3.9-beta3.zip">download the beta here</a> (zip).</p>
<p><em>WordPress 3.9<br />
Let&#8217;s make the date official<br />
It&#8217;s April 16</em></p>
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:60:"http://wordpress.org/news/2014/03/wordpress-3-9-beta-3/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:45:"
		
		
		
		
		
				
		

		
		
				
			
		
		";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:5:{s:0:"";a:7:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:20:"WordPress 3.9 Beta 2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:55:"http://wordpress.org/news/2014/03/wordpress-3-9-beta-2/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:64:"http://wordpress.org/news/2014/03/wordpress-3-9-beta-2/#comments";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 20 Mar 2014 05:01:25 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"category";a:2:{i:0;a:5:{s:4:"data";s:11:"Development";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}i:1;a:5:{s:4:"data";s:8:"Releases";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:33:"http://wordpress.org/news/?p=3101";s:7:"attribs";a:1:{s:0:"";a:1:{s:11:"isPermaLink";s:5:"false";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:309:"WordPress 3.9 Beta 2 is now available for testing! We&#8217;ve made more than a hundred changes since Beta 1, but we still need your help if we&#8217;re going to hit our goal of an April release. For what to look out for, please head on over to the Beta 1 announcement post. Some of the changes in [&#8230;]";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:12:"Andrew Nacin";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:40:"http://purl.org/rss/1.0/modules/content/";a:1:{s:7:"encoded";a:1:{i:0;a:5:{s:4:"data";s:1901:"<p>WordPress 3.9 Beta 2 is now available for testing!</p>
<p>We&#8217;ve made more than a hundred <a href="https://core.trac.wordpress.org/log?rev=27639&amp;stop_rev=27500&amp;limit=200">changes</a> since Beta 1, but we still need your help if we&#8217;re going to hit our goal of an April release. For what to look out for, please head on over to <a href="https://wordpress.org/news/2014/03/wordpress-3-9-beta-1/">the Beta 1 announcement post</a>. Some of the changes in Beta 2 include:</p>
<ul>
<li>Rendering of embedded audio and video players directly in the visual editor.</li>
<li>Visual and functional improvements to the editor, the media manager, and theme installer.</li>
<li>Various bug fixes to TinyMCE, the software behind the visual editor.</li>
<li>Lots of fixes to widget management in the theme customizer.</li>
</ul>
<p>As always,<strong> if you think you’ve found a bug</strong>, you can post to the <a href="http://wordpress.org/support/forum/alphabeta">Alpha/Beta area</a> in the support forums. Or, if you’re comfortable writing a reproducible bug report, <a href="https://make.wordpress.org/core/reports/">file one on the WordPress Trac</a>. There, you can also find <a href="http://core.trac.wordpress.org/tickets/major">a list of known bugs</a> and <a href="http://core.trac.wordpress.org/query?status=closed&amp;group=component&amp;milestone=3.9">everything we’ve fixed</a> so far.</p>
<p><strong>This software is still in development,</strong> so we don’t recommend you run it on a production site. Consider setting up a test site just to play with the new version. To test WordPress 3.9, try the <a href="http://wordpress.org/extend/plugins/wordpress-beta-tester/">WordPress Beta Tester</a> plugin (you’ll want “bleeding edge nightlies”). Or you can <a href="http://wordpress.org/wordpress-3.9-beta2.zip">download the beta here</a> (zip).</p>
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:36:"http://wellformedweb.org/CommentAPI/";a:1:{s:10:"commentRss";a:1:{i:0;a:5:{s:4:"data";s:60:"http://wordpress.org/news/2014/03/wordpress-3-9-beta-2/feed/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:38:"http://purl.org/rss/1.0/modules/slash/";a:1:{s:8:"comments";a:1:{i:0;a:5:{s:4:"data";s:1:"0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}s:27:"http://www.w3.org/2005/Atom";a:1:{s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:0:"";s:7:"attribs";a:1:{s:0:"";a:3:{s:4:"href";s:31:"http://wordpress.org/news/feed/";s:3:"rel";s:4:"self";s:4:"type";s:19:"application/rss+xml";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:44:"http://purl.org/rss/1.0/modules/syndication/";a:2:{s:12:"updatePeriod";a:1:{i:0;a:5:{s:4:"data";s:6:"hourly";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:15:"updateFrequency";a:1:{i:0;a:5:{s:4:"data";s:1:"1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";a:8:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Mon, 04 Aug 2014 09:06:18 GMT";s:12:"content-type";s:23:"text/xml; charset=UTF-8";s:10:"x-pingback";s:36:"http://wordpress.org/news/xmlrpc.php";s:13:"last-modified";s:29:"Fri, 18 Jul 2014 21:15:58 GMT";s:4:"x-nc";s:11:"HIT lax 249";s:10:"connection";s:5:"close";s:3:"via";s:17:"HTTP/1.1 proxy453";}s:5:"build";s:14:"20140210131038";}', 'no') ; 
INSERT INTO `wp_options` VALUES (998, 'can_compress_scripts', '1', 'yes') ; 
INSERT INTO `wp_options` VALUES (999, 'widget_calendar', 'a:3:{i:1;a:0:{}i:2;a:1:{s:5:"title";s:8:"Calendar";}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (1000, 'widget_links', 'a:3:{i:1;a:0:{}i:2;a:7:{s:6:"images";i:1;s:4:"name";i:1;s:11:"description";i:1;s:6:"rating";i:1;s:7:"orderby";s:4:"name";s:8:"category";i:0;s:5:"limit";i:5;}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (1001, 'widget_tag_cloud', 'a:3:{i:1;a:0:{}i:2;a:2:{s:5:"title";s:4:"Tags";s:8:"taxonomy";s:8:"post_tag";}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (1002, 'widget_nav_menu', 'a:3:{i:1;a:0:{}i:2;a:2:{s:5:"title";s:4:"Menu";s:8:"nav_menu";i:191;}s:12:"_multiwidget";i:1;}', 'yes') ; 
INSERT INTO `wp_options` VALUES (1003, 'widget_monster', 'a:9:{i:1;a:0:{}i:3;a:0:{}i:4;a:0:{}i:5;a:0:{}i:6;a:0:{}i:7;a:0:{}i:8;a:0:{}i:9;a:0:{}s:12:"_multiwidget";i:1;}', 'yes') ;