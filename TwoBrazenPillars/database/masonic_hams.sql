BEGIN TRANSACTION;

       DROP TABLE IF EXISTS hams;
	 CREATE TABLE IF NOT EXISTS hams (
	              ix SERIAL,
	       call_sign TEXT,
		     country TEXT,
		      handle TEXT,
	        location TEXT,
		     comment TEXT,
		      e_mail TEXT,
			   added TIMESTAMP WITH TIME ZONE DEFAULT clock_timestamp(),
			 dropped TIMESTAMP WITH TIME ZONE DEFAULT NULL,
         PRIMARY KEY (ix)
	 );




  \echo -n '   20: hams: '
	 INSERT INTO hams
	 (call_sign, country, handle, location, e_mail, comment) VALUES
     (NULL,   'US', 'Leonard', NULL, NULL, NULL),
     (NULL,  'US',  'Louis', 'Knoxville, TN', NULL, NULL),
     (NULL,  'US',  'Terry', 'Elizabethton, TN', NULL, NULL),
     ('AB4Y', 'US', 'Charles', 'Bowling Green, KY', NULL, NULL),
     ('AB9SP', 'US', 'Pete','Evansville, IN',NULL, NULL),
     ('AI6KO', 'US', 'Alan','Vista, CA', NULL, NULL),
     ('K0HTF', 'US', 'Tom - “Doc”, KYGCH','Algona, IA   EL 50511  IRLP  7793','k0htf@arrl.net', NULL),
     ('K3SP', 'US', 'Jack, P. G. M.', 'Freeland, MD','mwgm0708@comcast.net', NULL),
     ('K4SHL', 'US', 'Scott','Warsaw, KY', NULL, NULL),
     ('K6RAL', 'US', 'Thomas','HANOVER, MA', NULL, NULL),
     ('K6RVX', 'US', 'Mark','Pacific Grove, CA','MarkBurger@IlleVisum.com', NULL),
     ('K7JV', 'US', 'James, P. G. M.', 'Boise, ID', NULL, NULL),
     ('K7URT', 'US', 'Kurt','Bellingham, Washington', NULL, NULL),
     ('K8JWJ', 'US', 'Joe','Charleston, WV', NULL, NULL),
     ('KA2MKM', 'US', 'Greg','Queens, New York City, NY', NULL, NULL),
     ('KB0RCI', 'US', 'Richard','Fremont, CA.', NULL, NULL),
     ('KB4CLD', 'US', 'Ernest','Florence, AL', NULL, NULL),
     ('KC4ZBQ', 'US', 'Pat','Pooler, GA', NULL, NULL),
     ('KC6VAJ', 'US', 'Alfred','Lincoln, CA', NULL, NULL),
     ('KD5ZC', 'US', 'Morris','Delray Beach, FL & Frisco, TX', NULL, NULL),
     ('KD6JQO', 'US', 'Richard','Winnetka, CA', NULL, NULL),
     ('KE4F', 'US', 'Ron, P. M.', 'Ft. Lauderdale, FL', NULL, NULL),
     ('KE6ASK', 'US', 'Mark','Annapolis, MD', NULL, NULL),
     ('KE6SKP', 'US', 'Robert','San Bernardino, CA', NULL, NULL),
     ('KF4WM', 'US', 'Jack','Altamonte Springs, FL', NULL, NULL),
     ('KF6UXT', 'US', 'Alberto','Sylmar, CA', NULL, NULL),
     ('KG4VHV', 'US', 'John','Lebanon, OH', NULL, NULL),
     ('KG5BJF', 'US', 'Robert','El Paso, TX', NULL, NULL),
     ('KG7TLX', 'US', 'John','Boise Valley', NULL, NULL),
     ('KI4KID', 'US', 'Marion','Palm Beach Garden, FL', NULL, NULL),
     ('KK4PAB', 'US', 'Joseph','Hampton, VA', NULL, NULL),
     ('KK4ZNS', 'US', 'Steve','Mt. Gilead, NC', NULL, NULL),
     ('KK5GG', 'US', 'James','Winter Park, FL', NULL, NULL),
     ('KW4MN', 'US', 'Charles','Abingdon, VA', NULL, NULL),
     ('KZ5AJ', 'US', 'Henry','Hemphill, TX', NULL, '(Also Panama call  HP1HFS)'),
     ('KZ7I', 'US', 'Len','Hastings, MN', NULL, NULL),
     ('N0BHC', 'US', 'Bob','Savage, MN', NULL, NULL),
     ('N4ESS', 'US', 'Rich','Zephyrhills, FL','n4ess@tampabay.rr.com', NULL),
     ('N4OIY', 'US', 'Patterson, Jay','Herndon, VA', NULL, NULL),
     ('N4OIY', 'US', 'Jay  (Patterson)','House of the Temple in Washington, DC', NULL, NULL),
     ('N4RER', 'US', 'Peter','Fairfax, VA', NULL, NULL),
     ('N4WQH', 'US', 'Michael','Chesapeake, VA', NULL, NULL),
     ('N7FNN', 'US', 'D  R','Kennewick, WA', NULL, NULL),
     ('NM0I', 'US', 'Jerry','Woodbury, MN', NULL, NULL),
     ('NW7N', 'US', 'Jason','Cheyenne, WY', NULL, NULL),
     ('SP9F', 'PL', 'Flavio','Poland', NULL, NULL),
     ('W0DPK', 'US', 'Dave','Marion, IA', NULL, NULL),
     ('W0JRM', 'US', 'Rob','Centerville, IA', NULL, NULL),
     ('W0PS', 'US', 'Jay','St. Peters, MO', NULL, NULL),
     ('W1KMU (EX)', 'US', 'Frederick','MA', NULL, NULL),
     ('W1MER', 'US', 'Mark','Mars Hill, ME', NULL, NULL),
     ('W4IPA', 'US', 'Richard','Pensacola, FL', NULL, NULL),
     ('W7JIS', 'US', 'Theodore','Clyde, NC','stercor@gmail.com', NULL),
     ('W7KFC', 'US', 'Tom, P. M.','Benson, AZ', NULL, NULL),
     ('W7RFT', 'US', 'Dick','Florence, OR','richard_candy@msn.com', NULL),
     ('WA3QED', 'US', 'James','Hatfield, PA', NULL, NULL),
     ('WX7HX', 'US', 'Robert','Odenton, MD', NULL, NULL),
     ('WH6EZJ', 'US', 'Michael','Oahu, Hawaii','mawright@hawaii.edu', NULL);








  \echo -n '   90: new hams: '
	 INSERT INTO hams
	 (call_sign, added, country, handle, location, e_mail, comment) VALUES
	 ('N4TW',    '2017-02-12', 'US', 'David Sargent', NULL, NULL,
'I’ve been lurking in the background and reading so I finally decided to add myself to the pile up!  My Lodge Memberships remain in SC and have been a brother for more than 45 years, was licensed as NT4W while residing in SC, and a Life Member or the ARRL. I have lived in Annapolis, Maryland area for well over 30 years.  I am now retired and enjoying the hobby more than ever. 73'),
	('KM4DXH',  '2017-02-12', 'US', 'Warren',        'Marshville, NC', 'WarrenLundsford@gmail.com',
'This is KM4DXH, Warren, Marshville NC'),
	('N2EFU',   '2017-02-12', 'US', 'Jay',           'Matthews, NC',   'jgarbus@carolina.rr.com',
'Jay, Matthews, NC 28105, Mint Hill NC Lodge 742 and Mt Vernon VA Lodge 219, Scotttish Rite Alexandria VA'),
	('AC8VQ',   '2017-02-12', 'US', 'Tim',           'South Point, OH', NULL, NULL),
	('KB1PO',   '2017-02-13', 'US', 'Bruce', 'Mount Olive, NJ', 'kblpo@sbcglobal.net',
'Bruce Robbins, KB1PO (originally WD0GNA) , Mount Olive New Jersey , Secy St John’s Lodge No 1 (NJ) and Past Master Nunda Logde No 169 (IL) , email: kb1po@sbcglobal.net'),
	('K4ZRP',   '2017-02-13', 'US', 'Lou', NULL, NULL,
'Lou Devillon, K4ZRP, Lenoir City, TN.  Past Master Union Lodge No. 38, Kingston, TN.  Union Lodge web page:  www.union38.org. Join us for the 46th Annual Cave Degree. August 19,2017.');

COMMIT;
