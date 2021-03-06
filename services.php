<?php

include_once('framework_ajax.php');

echo '<header class="" id="overview">
	<h1>Status der IT-Systeme</h1>
	<p class="lead">Den aktuellen Status der IT-Systeme kann man jederzeit hier nachtesten:</p>
	<div class="subnav">
		<ul class="nav nav-pills">	
			<li><a href="#bund">BundesIT</a></li>
			<li><a href="#other">Sonstige IT</a></li>
			<li><a href="#land">HessenIT</a></li>
		</ul>
	</div>
	</header>
	<section id="bund">
    <div class="page-header">
      <h1>Bundes-IT <small>Systeme, die vom Bundesverband betrieben werden</small></h1>
    </div>
    <div class="row">
      <div class="span14">';

echo '<h2>Wiki <small>wiki.piratenpartei.de</small></h2>';
assertStatusEQ("http://wiki.piratenpartei.de", "301");
assertStatusEQ("http://wiki.piratenpartei.de/Hauptseite", "200");
assertStatusEQ("https://wiki.piratenpartei.de/Hauptseite", "200");
assertTitleEQ("http://wiki.piratenpartei.de/Hauptseite", "Hauptseite – Piratenwiki");


echo '<h2>Mailinglisten <small>news.piratenpartei.de</small></h2>';

assertStatusEQ("http://news.piratenpartei.de", "200");
assertStatusEQ("https://news.piratenpartei.de", "200");
assertTitleEQ("https://news.piratenpartei.de", "Sync-Forum Piratenpartei Deutschland");

assertStatusEQ("https://service.piratenpartei.de/listinfo", 200);
assertTitleEQ("https://service.piratenpartei.de/listinfo", " Mailinglisten auf service.piratenpartei.de");

assertPortUp("news.piratenpartei.de", 119);


echo '<h2>Pads <small>piratenpad.de</small></h2>';

assertStatusEQ("http://hessen.piratenpad.de", "302");
assertStatusEQ("https://hessen.piratenpad.de", "302");
assertStatusEQ("http://hessen-it.piratenpad.de", "302");
assertStatusEQ("https://hessen-it.piratenpad.de", "302");


echo '<h2>Liquid Feedback (Bundesinstanz) <small>lqfb.piratenpartei.de</small></h2>';
assertStatusEQ("https://lqfb.piratenpartei.de", "200");
assertStatusEQ("http://lqfb.piratenpartei.de", "301");
assertTitleEQ("https://lqfb.piratenpartei.de", "LiquidFeedback in der Piratenpartei Deutschland");


echo '<h2>Jabber <small>jabber.piratenpartei.de</small></h2>';

assertPortUp("jabber.piratenpartei.de", 5222);
assertPortUp("jabber.piratenpartei.de", 5269);
assertPortUp("jabber.piratenpartei.de", 5223);


echo '
      </div><!-- /span14 -->
    </div><!-- /row -->
  </section>

  <section id="other">
    <div class="page-header">
      <h1>Sonstige IT <small>Systeme, die von anderen Landesverbänden betrieben werden</small></h1>
    </div>
    <div class="row">
      <div class="span14">';


echo '<h2>Mumble <small>mumble.piratenpartei-nrw.de</small></h2>';

assertPortUp("mumble.piratenpartei-nrw.de", 64738);

echo '<h2>Brandenburg-Mumble <small>mumble.piratenpartei-nrw.de</small></h2>';

assertPortUp("mumble.piratenbrandenburg.de", 64738);

echo '
      </div><!-- /span14 -->
    </div><!-- /row -->
  </section>

  <section id="land">
    <div class="page-header">
      <h1>HessenIT <small>Systeme, die vom Landesverband betrieben werden</small></h1>
    </div>
    <div class="row">
      <div class="span14">';

echo '<h2>Hosts <small>*.pph0.de</small></h2>';

assertPortUp('pph1.pph0.de', 22);
assertPortUp('pph2.pph0.de', 22);
assertPortUp('pph3.pph0.de', 22);
assertPortUp('pph4.pph0.de', 22);

echo '<h2>Website <small>piratenpartei-hessen.de</small></h2>';

assertStatusEQ("http://www.piratenpartei-hessen.de", "200");

assertRedirectionEQ('http://piraten-hessen.de', 'http://www.piratenpartei-hessen.de/');
assertRedirectionEQ('http://piratenpartei-hessen.de', 'http://www.piratenpartei-hessen.de/');

assertRedirectionEQ('https://piratenpartei-hessen.de', 'http://www.piratenpartei-hessen.de/');
assertRedirectionEQ('https://piraten-hessen.de', 'http://www.piratenpartei-hessen.de/');
assertStatusEQ('https://www.piratenpartei-hessen.de', '200');
assertRedirectionEQ('https://www.piraten-hessen.de', 'http://www.piratenpartei-hessen.de/');

assertTitleEQ("http://www.piratenpartei-hessen.de", "Piratenpartei Hessen | Klarmachen zum Ändern!");


echo '<h2>E-Mail <small>mailx.piratenpartei-hessen.de</small></h2>';

// web mail
assertStatusEQ("http://webmail.piratenpartei-hessen.de", "302");
assertStatusEQ("https://webmail.piratenpartei-hessen.de", "200");
assertRedirectionEQ("http://webmail.piratenpartei-hessen.de", "https://roundcube.piratenpartei-hessen.de/");

assertPortUp("pop3.piratenpartei-hessen.de", 110);
assertPortUp("imap.piratenpartei-hessen.de", 143);
assertPortUp("smtp.piratenpartei-hessen.de", 25);
assertPortUp("smtp.piratenpartei-hessen.de", 465);

echo '<h2>Telkoserver <small>sip.piratenpartei-hessen.de</small></h2>';

assertStatusEQ('https://sip.piratenpartei-hessen.de/cgi-bin/meetmeadmin.cgi', '401');
assertStatusEQ("http://sip.piratenpartei-hessen.de:8000/", "200");
assertStatusEQ("http://sip.piratenpartei-hessen.de:8000/admin/", "401");
assertStatusEQ("http://sip.piratenpartei-hessen.de:8000/status.xsl", "200");
assertPortUp("udp://sip.piratenpartei-hessen.de", 5060);

echo '<h2>OTRS <small>intern.piratenpartei-hessen.de</small></h2>';

assertStatusEQ("https://intern.piratenpartei-hessen.de/otrs/index.pl", "200");

echo '<h2>Lime Survey <small>limesurvey.piratenpartei-hessen.de</small></h2>';

assertStatusEQ("https://limesurvey.piratenpartei-hessen.de/", "200");

echo '<h2>Mailman <small>lists.piratenpartei-hessen.de</small></h2>';

assertStatusEQ("http://lists.piratenpartei-hessen.de/cgi-bin/mailman/listinfo", "200");
assertRedirectionEQ("http://lists.piratenpartei-hessen.de/", "http://lists.piratenpartei-hessen.de/cgi-bin/mailman/listinfo");

echo '<h2>vMB <small>vote.piratenpartei-hessen.de</small></h2>';

assertStatusEQ("https://vote.piratenpartei-hessen.de/", "200");
assertRedirectionEQ("http://vote.piratenpartei-hessen.de", "https://vote.piratenpartei-hessen.de/");

echo '<h2>LQFB (Hessen-Instanz) <small>lqfb.piratenpartei-hessen.de</small></h2>';

assertStatusEQ("https://lqfb.piratenpartei-hessen.de/", "303");
assertStatusEQ("http://lqfb.piratenpartei-hessen.de/", "303");
assertStatusEQ("https://lqfb.piratenpartei-hessen.de/area/list.html", "200");

echo '<h2>Redmine (Test-Instanz) <small>redmine.piratenpartei-hessen.de</small></h2>';

assertStatusEQ('http://redmine.piratenpartei-hessen.de', '200');

echo '
      </div><!-- /span14 -->
    </div><!-- /row -->
  </section>
';
