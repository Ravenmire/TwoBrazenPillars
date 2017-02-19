       DROP TABLE IF EXISTS library_associations;
	 CREATE TABLE IF NOT EXISTS library_associations (
	              ix SERIAL,
				  id TEXT,
				name TEXT,
				 url TEXT,
		 PRIMARY KEY (id),
			  UNIQUE (ix)
	 );










	\echo -n '   20: library_associations: '
	INSERT INTO library_associations
	(id,         name,                                                 url) VALUES
	('GLAZ',     'Memorial Library and Museum, Grand Lodge of Arizona','http://www.arizonamasonry.org/GLL/grand_lodge_of_arizona_library.htm'),
	('MLMA',     'Masonic Library & Museum Association',               'http://www.masoniclibraries.org'),
	('AASR,SJ',  'Scottish Rite, Southern Jurisdiction',               'https://scottishrite.org/headquarters/library/');
