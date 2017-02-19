 --  \echo '• ‘’“”″ … - ‒ – — ÄÆäåáæCcỆệéệMmNnñÖöôπßτÜüVvXx½

BEGIN TRANSACTION;

     SELECT 'Start: ', clock_timestamp();

       DROP TABLE IF EXISTS sex CASCADE;          -- PostgreSQL
     CREATE TABLE IF NOT EXISTS sex (
               ix SERIAL,
              sex TEXT,    -- Birth
      PRIMARY KEY (sex)
 );
     INSERT INTO sex
     (sex) VALUES
     ('M'),
     ('F');


       DROP TABLE IF EXISTS gender CASCADE;          -- PostgreSQL
     CREATE TABLE IF NOT EXISTS gender (
               ix SERIAL,
           gender TEXT,    -- Identity
      PRIMARY KEY (gender)
 );
     INSERT INTO gender
     (gender) VALUES
     ('M'),
     ('F');


       DROP TABLE IF EXISTS who CASCADE;             -- PostgreSQL
     CREATE TABLE IF NOT EXISTS who (
               ix SERIAL,
          who_key TEXT             DEFAULT NULL,
       random_key TEXT             DEFAULT random_string(32),
     select_count INTEGER          DEFAULT 0,
      name_prefix TEXT             DEFAULT NULL,
       first_name TEXT             DEFAULT NULL,
      middle_name TEXT             DEFAULT NULL,
        last_name TEXT             DEFAULT NULL,
      name_suffix TEXT             DEFAULT NULL,
   preferred_name TEXT             DEFAULT NULL, -- Like for mailing.
    familiar_name TEXT             DEFAULT NULL, -- What we call him.
         nickname TEXT             DEFAULT NULL,
              sex TEXT             DEFAULT NULL,
           gender TEXT             DEFAULT NULL,
          fgcolor TEXT             DEFAULT NULL,
          bgcolor TEXT             DEFAULT NULL,
      PRIMARY KEY (random_key),
      FOREIGN KEY (sex)
                  REFERENCES sex(sex),
      FOREIGN KEY (gender)
                  REFERENCES gender(gender),
           UNIQUE (ix)
   );






     \echo    '   80: Created the who table.'

/*
     \echo -n '  90: AA: '
     INSERT INTO who
     (first_name,    middle_name,       last_name,           sex, gender) VALUES
     ('Theodore',    'Michael',         'Rolle',             'M', 'M'),
     ('Lytehouse',   'Giuseppe',        'Madonna',           'M', 'M'),
     ('E',           'C',               'Boyd',              'M', 'M'),
     ('Carol',       NULL,              'Hill',              'F', 'F'),
     ('Hiromi',      NULL,              'Nii',               'F', 'F'),
     ('Hiromi',      'Heather',         'Nii-Parker',        'F', 'F'),
     ('Heather',     'Lynn',            'Johnston',          'F', 'F'),
     ('Cindy',       'Gavin',           'Nelson',            'F', 'F'),
     ('Corey',       NULL,              'Weiman',            'F', 'F'),
     ('Mandy',       NULL,              'McNeese',           'F', 'F'),
     ('Jill',        NULL,              'Deginerro',         'F', 'F'),
     ('Lindsey',     'Rae',             'Kerivan',           'M', 'M'),
     ('Julia',       'M',               'McDermott',         'F', 'F'),
     ('Catherine',   NULL,              'King',              'F', 'F'),
     ('Dusty',       NULL,              'Bailey',            'M', 'M'),
     ('Krzystof',    NULL,              'Krzyzak',           'M', 'M'),
     ('Jim',         NULL,              'Yarbrough',         'M', 'M'),
     ('Angela',      NULL,              'Anderson',          'F', 'F'),
     ('Kassie',      NULL,              'Judge',             'F', 'F'),
     ('Brian',       NULL,              'Mattis',            'M', 'M'),
     ('Jonathan',    NULL,              'Theisen',           'M', 'M'),
     ('Ashley',      NULL,              'Wright',            'F', 'F'),
     ('Teresa',      'Rutledge-Emmons', 'Gunn',              'F', 'F'),
     ('Jennifer',    'Garcia',          'Speedling',         'F', 'F'),
     ('Steven',      NULL,              'Joseph',            'M', 'M'),
     ('Donly',       'Ford',            'Thangkhiew',        'M', 'M'),
     ('Tracy',       'York',            'Luttrell',          'F', 'F'),
     ('Heidi',       NULL,              'Brightman',         'F', 'F'),
     ('Brandon',     'Maxwell',         'Bozeman',           'M', 'M'),
     ('Jay',         NULL,              'Pilarczyk',         'M', 'M'),
     ('Tracey',      NULL,              'Johnson',           'F', 'F'),
     ('Jacki',       NULL,              'Alexandrou',        'F', 'F'),
     ('Molly',       'Schatz',          'Nekut',             'F', 'F'),
     ('Reuben',      NULL,              'Ramirez',           'M', 'M'),
     ('Sovan',       NULL,              'Chatterjee',        'M', 'M'),
     ('Anna',        NULL,              'Kowalski',          'F', 'F'),
     ('Sally',       'Slucher',         'DuGan',             'F', 'F'),
     ('Erik',        NULL,              'Shepard',           'M', 'M'),
     ('Maryann',     NULL,              'Spiteri',           'F', 'F'),
     ('Hazeal',      NULL,              'Cain',              'F', 'F'),
     ('Katrina',     'Sherii',          'Jonesx',            'F', 'F'),
     ('Joy',         NULL,              'Barnum',            'F', 'F'),
     ('Bill',        'Mac',             'McDaniel',          'M', 'M'),
     ('Thomas',      NULL,              'Bürgermeister',     'M', 'M'),
     ('Cortney',     NULL,              'Daniels',           'F', 'F'),
     ('Kari',        'Tamsen',          'Hogue',             'F', 'F'),
     ('Brian',       NULL,              'Van Wyckhouse',     'M', 'M'),
     ('Robyn',       NULL,              'Mattfield',         'F', 'F'),
     ('Becky',       'Woods',           'Scott',             'F', 'F'),
     ('Tanya',       'Maria',           'Forconi',           'F', 'F'),
     ('Beth',        NULL,              'Buchanan',          'F', 'F'),
     ('Brittany',    NULL,              'Knafler',           'F', 'F'),
     ('Catherine',   NULL,              'King',              'F', 'F'),
     ('Maria',       NULL,              'Valeria',           'F', 'F'),
     ('Cara',        NULL,              'Gentile',           'F', 'F'),
     ('John',        'Matthew',         'Cox',               'M', 'M'),
     ('Jennifer',    NULL,              'Slater',            'F', 'F'),
     ('James',       NULL,              'Serafine',          'M', 'M'),
     ('Ray',         NULL,              'Mace',              'M', 'M'),
     ('Tony',        NULL,              'Stiegel',           'M', 'M'),
     ('Mike',        NULL,              'Smorschok',         'M', 'M'),
     ('Andrew',      NULL,              'Belen',             'M', 'M'),
     ('Jamey',       NULL,              'Prine',             'M', 'M'),
     ('Peter',       NULL,              'Morris',            'M', 'M'),
     ('Mike',        NULL,              'Hayabusa',          'M', 'M'),
     ('Noah',        NULL,              'Oettel',            'M', 'M'),
     ('Michael',     NULL,              'Beamon',            'M', 'M'),
     ('Jeffrey',     NULL,              'Cooke',             'M', 'M'),
     ('Monica',      NULL,              'Bernard-Solace',    'F', 'F'),
     ('Steve',       'Andrew',          'Marsden',           'M', 'M'),
     ('Clovis',      'Ndoleriire',      'Ategeka',           'F', 'F'), -- YYYY-05-17
     ('Amanda',      'Ludwig',          'Boyd',              'F', 'F'),
     ('Roger',       NULL,              'Cantrell',          'M', 'M'),
     ('Kimberly',    NULL,              'Stanfield',         'F', 'F'),
     ('Amanda',      NULL,              'Randin',            'F', 'F'),
     ('Veronica',    'Bell',            'Cullen',            'F', 'F'),
     ('April',       'Bronwyn Redmond', 'England',           'F', 'F'),
     ('Marianne',    NULL,              'Ferrel',            'F', 'F'),
     ('Jessica',     NULL,              'Lyn',               'F', 'F'),
     ('Rose',        NULL,              'Tafoya',            'F', 'M'),
     ('Josh',        NULL,              'Maki',              'M', 'M');
--    first_name     middle_name        last_name            sex  gender

     SELECT 'INSERTed who records', clock_timestamp();





 --  These statements must go after all are added.

     \echo -n '  170: who: Mass update of first_name to familiar_name: '
     UPDATE who
        SET familiar_name = first_name
      WHERE familiar_name IS NULL;






     \echo -n '  180: who: Mass update of nickname to familiar_name: '
     UPDATE who
        SET nickname=familiar_name
      WHERE nickname IS NULL;
*/

COMMIT;
