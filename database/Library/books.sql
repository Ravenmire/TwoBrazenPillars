 BEGIN TRANSACTION;

           DROP TABLE IF EXISTS author CASCADE;
	 CREATE TABLE IF NOT EXISTS author (
	           ix SERIAL,
	         name TEXT,
	  PRIMARY KEY (name),
		   UNIQUE (ix)
	 );








 \echo -n '   20: author table: '
	 INSERT INTO author
	 (name) VALUES
	 ('Research Lodge of Oregon No. 198'),
	 ('Grand Lodge of Oregon'),
	 ('Albert Pike');






           DROP TABLE IF EXISTS books;
	 CREATE TABLE IF NOT EXISTS books (
	              ix SERIAL,
	      random_key TEXT DEFAULT random_string(32),
		   title TEXT,
	     short_title TEXT,
	          author TEXT,
	       publisher TEXT,
          lccn_permalink TEXT,
    	        marc_xml TEXT,
          copyright_date TEXT,
	         version TEXT,
	         edition TEXT,
	         isbn_13 TEXT,
	         isbn_10 TEXT,
	         comment TEXT,
	     FOREIGN KEY (author)
	                 REFERENCES author(name),
	          UNIQUE (ix)
	 );









 \echo -n '   60: books: '
	 INSERT INTO books
	 (isbn_13,         isbn_10,      lccn_permalink,                  short_title,        author,                             copyright_date, marc_xml) VALUES
	 (NULL,            NULL,         NULL,                            'Volume IV',        'Research Lodge of Oregon No. 198', '1982',         NULL),
	 ('9781605320137', '1605320137', 'https://lccn.loc.gov/50058146', 'Morals and Dogma', 'Albert Pike', '1950',
'<record><leader>00852cam a2200229u  4500</leader><controlfield tag="001">8835635</controlfield><controlfield tag="005">20080212181050.0</controlfield><controlfield tag="008">821204n        wvuac         000 0 eng  </controlfield><datafield tag="906" ind1=" " ind2=" "><subfield code="a">0</subfield><subfield code="b">cbc</subfield><subfield code="c">premunv</subfield><subfield code="d">u</subfield><subfield code="e">ncip</subfield><subfield code="f">19</subfield><subfield code="g">y-gencatlg</subfield></datafield><datafield tag="035" ind1=" " ind2=" "><subfield code="9">(DLC)   50058146</subfield></datafield><datafield tag="010" ind1=" " ind2=" "><subfield code="a">   50058146 </subfield></datafield><datafield tag="040" ind1=" " ind2=" "><subfield code="a">DLC</subfield><subfield code="c">CarP</subfield><subfield code="d">DLC</subfield></datafield><datafield tag="050" ind1="0" ind2="0"><subfield code="a">HS767</subfield><subfield code="b">.P64 1950</subfield></datafield><datafield tag="100" ind1="1" ind2=" "><subfield code="a">Pike, Albert,</subfield><subfield code="d">1809-1891,</subfield><subfield code="e">comp.</subfield></datafield><datafield tag="245" ind1="1" ind2="0"><subfield code="a">Morals and dogma of the Ancient and Accepted Scottish Rite of Freemasonry,</subfield></datafield><datafield tag="250" ind1=" " ind2=" "><subfield code="a">[New and rev. ed.]</subfield></datafield><datafield tag="260" ind1=" " ind2=" "><subfield code="a">Charleston,</subfield><subfield code="b">A -- M -- 5632 [1950]</subfield></datafield><datafield tag="300" ind1=" " ind2=" "><subfield code="a">v, 861 p.</subfield><subfield code="b">illus., port.</subfield><subfield code="c">24 cm.</subfield></datafield><datafield tag="610" ind1="2" ind2="0"><subfield code="a">Freemasons.</subfield></datafield><datafield tag="710" ind1="2" ind2=" "><subfield code="a">Freemasons.</subfield><subfield code="b">United States.</subfield><subfield code="b">Scottish Rite.</subfield><subfield code="b">Supreme Council for the Southern Jurisdiction.</subfield></datafield><datafield tag="700" ind1="1" ind2=" "><subfield code="a">Hugo, Trevanion William,</subfield><subfield code="d">1848-1923. [from old catalog]</subfield></datafield><datafield tag="991" ind1=" " ind2=" "><subfield code="b">c-GenColl</subfield><subfield code="h">HS767</subfield><subfield code="i">.P64 1950</subfield><subfield code="t">Copy 1</subfield><subfield code="w">PREM</subfield></datafield></record>
');
