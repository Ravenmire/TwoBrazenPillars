BEGIN TRANSACTION;

				DROP TABLE IF EXISTS sobriety;
			  CREATE TABLE IF NOT EXISTS sobriety (
						ix SERIAL,
				random_key TEXT,  -- Set from the who table.
			 sobriety_date TIMESTAMP WITH TIME ZONE,
	   personal_adjustment NUMERIC DEFAULT 0,
				  question TEXT    DEFAULT NULL,
					answer TEXT    DEFAULT NULL,
					   url TEXT    DEFAULT NULL,
					e_mail TEXT    DEFAULT NULL,
					 notes TEXT    DEFAULT NULL,
				permission TEXT    DEFAULT 'No',    -- Permission given to publish.
					 added TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
			   FOREIGN KEY (random_key)
						   REFERENCES who(random_key),
				  --UNIQUE (random_key),
					UNIQUE (ix)
			  );

/*
	 \echo -n '   40: sobriety table: '
	INSERT INTO sobriety
	(my_key,  sobriety_date,    permission, url,                                                              personal_adjustment, notes) VALUES
	(DEFAULT, '2011-08-24',     'Yes',      'https://www.facebook.com/carol.hill.3597',                       DEFAULT, NULL),
	(DEFAULT, '2013-03-09',     'Yes',      DEFAULT,                                                          DEFAULT, NULL),
  -- Correlates with who.sql from here on.
	(DEFAULT, '2016-10-12',     'Yes',      'https://www.facebook.com/hiromi.nii.54',                         '1',     NULL),
  --(DEFAULT,     '2016-10-12',     'Yes',      'https://www.facebook.com/heather.niiparker',                     '1',     NULL),
	(DEFAULT, '2016-08-11',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT,  NULL,            DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT,  NULL,            DEFAULT,    'https://www.facebook.com/cindy.g.nelson.9',                      DEFAULT, NULL),
	(DEFAULT, '2016-09-20',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-10-09',     DEFAULT,    'https://www.facebook.com/profile.php?id=100008484761377',        DEFAULT, NULL),
	(DEFAULT, '2016-10-09',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '1993-10-14',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-09-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '1983-04-12',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, NULL,             DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '1993-10-16',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2015-09-16',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-10-07',     DEFAULT,    'https://www.facebook.com/kassie.derby',                          DEFAULT, NULL),
	(DEFAULT, '2010-05-30',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-07-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-04-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, NULL,             DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-09-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-10-11',     DEFAULT,    'https://www.facebook.com/steven.joseph.10004694',                DEFAULT, NULL),
	(DEFAULT, NULL,             DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, NULL,             DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-10-12',     DEFAULT,    'https://www.facebook.com/heidi.brightman.3',                     DEFAULT, NULL),
	(DEFAULT, '2016-07-04',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-08-20',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-08-15',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-02-15',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-09-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2015-01-03',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-10-17',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-10-17',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-10-17',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-05-17',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2005-10-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2013-07-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-10-17',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-07-20',     DEFAULT,    'https://www.facebook.com/profile.php?id=100013217703728',        DEFAULT, NULL),
	(DEFAULT, '2015-10-22',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2014-01-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2014-06-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2015-12-19',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2014-05-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-09-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-09-10',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2014-02-06',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-09-02',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-04-19',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-07-13',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-09-19',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2009-10-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '1998-10-19',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2015-10-19',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-09-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2015-10-18',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2014-10-19',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '1998-10-19',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2015-04-19',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2015-05-19',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2015-03-19',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2015-03-19',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-08-21',     DEFAULT,    DEFAULT,                                                          DEFAULT, NULL),
	(DEFAULT, '2016-07-13',     'Yes',      'https://www.facebook.com/michael.beamon.52',                     DEFAULT, NULL),
	(DEFAULT, '2008-10-21',     DEFAULT,    'https://www.facebook.com/jeffrey.cooke.aka',                     DEFAULT, NULL),
	(DEFAULT, '1986-10-21',     DEFAULT,    'https://www.facebook.com/tony.stiegel.1',                        DEFAULT, NULL),
	(DEFAULT, '2015-02-21',     DEFAULT,    'https://www.facebook.com/monicabernardsolace',                   DEFAULT, NULL),
	(DEFAULT, '2016-10-19',     DEFAULT,    'https://www.facebook.com/clovis.n.ategeka',                      DEFAULT, NULL),
	(DEFAULT, '2016-09-07',     DEFAULT,    'https://www.facebook.com/amandaholladay',                        DEFAULT, NULL),
	(DEFAULT, '1994-10-21',     DEFAULT,    'https://www.facebook.com/roger.cantrell',                        DEFAULT, NULL),
	(DEFAULT, '2014-11-07',     DEFAULT,    'https://www.facebook.com/bb4heels',                              DEFAULT, NULL),
	(DEFAULT, '2016-10-24',     'Yes',      'https://www.facebook.com/veronica.cullen.10',                    DEFAULT, NULL),
	(DEFAULT, '2016-01-10',     'Yes',      'https://www.facebook.com/steve.a.marsden',                       DEFAULT, NULL),
	(DEFAULT, '2016-10-18',     'Yes',      'https://www.facebook.com/josh.maki.77',                          DEFAULT, NULL),
	(DEFAULT, '2016-11-20',     'Yes',      'https://www.facebook.com/marianne.ferrel',                       DEFAULT, NULL),
	(DEFAULT, '2016-04-28',     'Yes',      'https://www.facebook.com/jessica.vanbelleghem.39',               DEFAULT, NULL),
	(DEFAULT, '2016-12-01',     DEFAULT,    'https://www.facebook.com/rose.tafoya.37',                        DEFAULT, NULL),
	(DEFAULT, '1986-02-03',     'Yes',      'https://www.facebook.com/stercor',                               DEFAULT, NULL);
--  my_key,   who_key,                       sobriety_date,    permission, facebook_page,                                                    personal_adjustment, notes)

UPDATE sobriety s SET random_key=(SELECT w.random_key FROM who w WHERE s.who_key=w.who_key) WHERE s.random_key IS NULL;
\echo 'Updated sobriety.random_key.'

ALTER TABLE sobriety ADD PRIMARY KEY (random_key);
\echo 'Added random_key as the PRIMARY KEY to the sobriety table.'
*/

COMMIT;
