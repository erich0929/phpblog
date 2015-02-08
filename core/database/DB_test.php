<?php
	define ('BASEPATH', './core/');
	define ('APPPATH', './');
	define ('DEBUG_MODE', TRUE);

	require_once (BASEPATH.'Commons.php');

	$params = array ();
	$params ['username'] = 'admin';
	$params ['password'] = '2642805';
	$params ['hostname'] = '192.168.10.101';
	$params ['database'] = 'test';
	$params ['dbdriver'] = 'mysql';
	$params ['char_set'] = 'utf8';
	$params ['dbcollat'] = 'utf8_general_ci';

	require_once (BASEPATH.'/database/DB_driver.php');
	require_once (BASEPATH.'/database/drivers/mysqli_driver.php');
	require_once (APPPATH.'/mappers/ArticleMapper.php');
	require_once (APPPATH . '/mappers/TableListMapper.php');

	$driverName = 'HG_mysqli_driver';
	$db_driver = new $driverName ($params);
	$db_driver -> initialize ();
	//$articleMapper = new ArticleMapper ($db_driver);
	//$articles = $articleMapper -> getArticles ();
	//print_r ($articles);
	//$article = array ("name" => "erich0929", "title" => "test article", "content" => "some content");
	//$articleMapper -> insertArticle ($article);

	//echo 'Query count : '. count ($articles). "\n";
	//echo $db_driver -> platform () . "\n";
	//$result_id = $db_driver -> query ('select * from board');

	//$tableListMapper = new TableListMapper ($db_driver);
	//print_r ($tableListMapper -> getTableList ());

	$articleMapper = new ArticleMapper ($db_driver);
	/*for ($i = 0; $i < 100; $i++) {
	$article = array ();
	$article ['tableName'] = 'Bussiness Management';
	$article ['author'] = 'erich0929@' . $i;
	$article ['title'] = 'economy article' . $i;
	$article ['content'] = 'ial of a given pattern, or process a number of instances of it that can vary from a precise equality to a very general similarity of the pattern. The pattern sequence itself is an expression that is a statement in a language designed specifically to represent prescribed targets in the most concise and flexible way to direct the automation of <a href=\"/wiki/Text_processing\" title=\"Text processing\">text processing</a> of general text files, specific textual forms, or of random input strings.</p> <p>A very simple use of a regular expression would be to locate the same word spelled two different ways in a text editor, for example the regular expression <span class=\"mw-geshi pcre source-pcre\">seriali<span class=\"sy2\">[</span>sz<span class=\"sy2\">]</span>e</span> matches both \"serialise\" and \"serialize\". A <a href=\"/wiki/Wildcard_character\" title=\"Wildcard character\">wildcard</a> match can also achieve this, but wildcard matches differ from regular expressions in that wildcards are more limited in what they can pattern (having fewer metacharacters and a simple language-base). A usual context of <a href=\"/wiki/Wildcard_character\" title=\"Wildcard character\">wildcard characters</a> is in <a href=\"/wiki/Glob_(programming)\" title=\"Glob (programming)\">globbing</a> similar names in a list of files, whereas regular expressions are usually employed in applications that pattern-match text strings in general. For example, the regexp <span class=\"nowrap\"><span class=\"mw-geshi pcre source-pcre\"><span class=\"sy3\">^</span><span class=\"sy2\">[</span> <span class=\"co14\">\t</span><span class=\"sy2\">]</span><span class=\"sy4\">+</span><span class=\"sy2\">|[</span> <span class=\"co14\">\t</span><span class=\"sy2\">]</span><span class=\"sy4\">+</span><span class=\"sy3\">$</span></span></span> matches excess whitespace at the beginning or end of a line. An advanced regexp used to match any numeral is <span class=\"mw-geshi pcre source-pcre\"><span class=\"sy3\">^</span><span class=\"sy2\">[</span><span class=\"sy4\">+</span>-<span class=\"sy2\">]</span><span class=\"sy4\">?</span><span class=\"sy1\">(</span><span class=\"co14\">\d</span><span class=\"sy4\">+</span><span class=\"co14\">\.</span><span class=\"sy4\">?</span><span class=\"co14\">\d</span><span class=\"sy4\">*</span><span class=\"sy2\">|</span><span class=\"co14\">\.</span><span class=\"co14\">\d</span><span class=\"sy4\">+</span><span class=\"sy1\">)(</span><span class=\"sy2\">[</span>eE<span class=\"sy2\">][</span><span class=\"sy4\">+</span>-<span class=\"sy2\">]</span><span class=\"sy4\">?</span><span class=\"co14\">\d</span><span class=\"sy4\">+</span><span class=\"sy1\">)</span><span class=\"sy4\">?</span><span class=\"sy3\">$</span></span>. See <i><a href=\"#Examples\">Examples</a></i> for more examples.</p> <div class=\"thumb tright\"> <div class=\"thumbinner\" style=\"width:222px;\"><a href=\"/wiki/File:Thompson-kleene-star.svg\" class=\"image\"><img alt=\"\" src=\"//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Thompson-kleene-star.svg/220px-Thompson-kleene-star.svg.png\" width=\"220\" height=\"110\" class=\"thumbimage\" srcset=\"//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Thompson-kleene-star.svg/330px-Thompson-kleene-star.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Thompson-kleene-star.svg/440px-Thompson-kleene-star.svg.png 2x\" data-file-width=\"503\" data-file-height=\"251\" /></a> <div class=\"thumbcaption\"> <div class=\"magnify\"><a href=\"/wiki/File:Thompson-kleene-star.svg\" class=\"internal\" title=\"Enlarge\"></a></div> <a href=\"/wiki/Thompson%27s_construction_algorithm\" title=\"Thompsons construction algorithm\">Translating</a> the <a href=\"/wiki/Kleene_star\" title=\"Kleene star\">Kleene star</a> \"<span style=\"color:#800000\"><i>s</i></span>*\": \"zero or more of <span style=\"color:#800000\"><i>s</i></span>\".</div> </div> </div> <p>A <b>regular expression processor</b> <a href=\"/wiki/Thompson%27s_construction_algorithm\" title=\"Thompsons construction algorithm\">translates</a> a regular expression into a <a href=\"/wiki/Nondeterministic_finite_automaton\" title=\"Nondeterministic finite automaton\">nondeterministic finite automaton</a> (NFA), which is then <a href=\"/wiki/Powerset_construction\" title=\"Powerset construction\">made deterministic</a> and <a href=\"/wiki/Deterministic_finite_automaton#Formal_definition\" title=\"Deterministic finite automaton\">run</a> on the target text string to recognize substrings that match the regular expression. The picture shows the NFA scheme <i>N</i>(<i>s</i><span class=\"mw-geshi pcre source-pcre\"><span class=\"sy4\">*</span></span>) obtained from the regex <i>s</i><span class=\"mw-geshi pcre source-pcre\"><span class=\"sy4\">*</span></span>, where <i>s</i> denotes a simpler regex in turn, which has already been <a href=\"/wiki/Recursion_(computer_science)\" title=\"Recursion (computer science)\">recursively</a> translated to the NFA <i>N</i>(<i>s</i>).</p> <p>Regular expressions are so useful in computing that the various systems to specify regular expressions have evolved to provide both a <i>basic</i> and <i>extended</i> standard for the grammar and syntax; <i>modern</i> regular expressions heavily augment the standard. Regular expression processors are found in several <a href=\"/wiki/Search_engine\" title=\"Search engine\" class=\"mw-redirect\">search engines</a>, search and replace dialogs of several <a href=\"/wiki/Word_processor\" title=\"Word processor\">word processors</a> and <a href=\"/wiki/Text_editor\" title=\"Text editor\">text editors</a>, and in the command lines of <a href=\"/wiki/Category:Unix_text_processing_utilities\" title=\"Category:Unix text processing utilities\">text processing utilities</a>, such as <a href=\"/wiki/Sed\" title=\"Sed\">sed</a> and <a href=\"/wiki/AWK\" title=\"AWK\">AWK</a>.</p> <p>Many <a href=\"/wiki/Programming_language\" title=\"Programming language\">programming languages</a> provide regular expression capabilities, some built-in, for example <a href=\"/wiki/Perl_language_structure#Regular_expressions\" title=\"Perl language structure\">Perl</a>, <a href=\"/wiki/JavaScript\" title=\"JavaScript\">JavaScript</a>, <a href=\"/wiki/Ruby_(programming_language)\" title=\"Ruby (programming language)\">Ruby</a>, <a href=\"/wiki/AWK\" title=\"AWK\">AWK</a>, and <a href=\"/wiki/Tcl\" title=\"Tcl\">Tcl</a>, and others via a <a href=\"/wiki/Standard_library\" title=\"Standard library\">standard library</a>, for example <a href=\"/wiki/.NET_Framework\" title=\".NET Framework\">.NET languages</a>, <a href=\"/wiki/Java_(programming_language)\" title=\"Java (programming language)\">Java</a>, <a href=\"/wiki/Python_(programming_language)\" title=\"Python (programming language)\">Python</a> and <a href=\"/wiki/C%2B%2B\" title=\"C++\">C++</a> (since <a href=\"/wiki/C%2B%2B11\" title=\"C++11\">C++11</a>). Most other languages offer regular expressions via a library.</p> <p></p><div id=\"toc\" class=\"toc\"><div id=\"toctitle\"><h2>Contents</h2>' ;
	$articleMapper -> insertArticle ($article);
}*/
	$articles = $articleMapper -> getArticleByAritcleIdWithTableNameAndDate ('Bussiness Management', array (2015,2,3), 7);
	print_r ($articles);
	$db_driver -> _close ();
?>