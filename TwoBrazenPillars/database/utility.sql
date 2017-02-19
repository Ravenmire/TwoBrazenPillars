 -- utility.sql
 
     BEGIN TRANSACTION;

       DROP TABLE IF EXISTS     utility;
     CREATE TABLE IF NOT EXISTS utility (
               ix SERIAL,                                  --   1
       random_key TEXT NOT NULL DEFAULT random_string(32), --   2
              key TEXT NOT NULL,                           --   3
             host TEXT NOT NULL,                           --   4
        site_name TEXT NOT NULL,                           --   5
            title TEXT NOT NULL,                           --   6
           slogan TEXT NOT NULL,                           --   7
        newuserid TEXT NOT NULL,                           --   8
      newuserpass TEXT NOT NULL,                           --   9
    min_clearance TEXT NOT NULL,                           --  10
        hash_algo TEXT NOT NULL,                           --  11
            stage TEXT NOT NULL REFERENCES stage(stage),   --  12
          bgcolor TEXT NOT NULL,                           --  13
          fgcolor TEXT NOT NULL,                           --  14
   status_msg_lim NUMERIC,                                 --  15
           UNIQUE (host),
      PRIMARY KEY (key)
       );
       ALTER TABLE utility OWNER TO ted;
       \echo    '   26: Created the utility table.'



     \echo -n '   30: utility table: '
     INSERT INTO utility(
               ix,                                         --   1
              key,                                         --   2
       random_key,                                         --   3
             host,                                         --   4
        site_name,                                         --   5
            title,                                         --   6
	   slogan,                                         --   7
        newuserid,                                         --   8
      newuserpass,                                         --   9
    min_clearance,                                         --  10
        hash_algo,                                         --  11
            stage,                                         --  12
          bgcolor,                                         --  13
          fgcolor,                                         --  14
   status_msg_lim) VALUES                                  --  15

     ( DEFAULT,                                            --  1 utility ix
       'RPi',                                              --  2 key
	random_string(32),                                 --  3 random_key
       'rpi',                                              --  4 host
       'North Carolina Mason',                             --  5 site_name
       'North Carolina Mason',                             --  6 title
	'…',                                               --  7 slogan
       'EA',                                               --  8 New userid.
       'First Degree',                                     --  9 New user password.
       '3',                                                -- 10 Default security level.
       'whirlpool',                                        -- 11 hashing algorithm.
       'Production',                                       -- 12 stage table
       'hsla(189,  9%, 70%, 1.00)',                        -- 13 Background color. #D9EEF2
       'hsla(  0,  0%,  0%, 1.00)',                        -- 14 Foreground (text) color.
       10 --Rpi                                            -- 15 Maximum number of status messages.
     ),
     ( DEFAULT,                                            --  1 utility ix
       'ncmason.us',                                       --  2 key
	random_string(32),                                 --  3 random_key
       'NCMason.us',                                       --  4 host
       'North Carolina Mason',                             --  5 site_name
       'North Carolina Mason',                             --  6 title
	'…',                                               --  7 slogan
       'EA',                                               --  8 New userid.
       'First Degree',                                     --  9 New user password.
       '3',                                                -- 10 Default security level.
       'whirlpool',                                        -- 11 hashing algorithm.
       'Production',                                       -- 12 stage table
       'hsla(189,  9%, 70%, 1.00)',                        -- 13 Background color. #D9EEF2
       'hsla(  0,  0%,  0%, 1.00)',                        -- 14 Foreground (text) color.
       10                                                  -- 15 Maximum number of status messages.
     ),
     ( DEFAULT,                                            --  1 Utility ix
       'ncmason.no-ip.org',                                --  2 key
	random_string(32),                                 --  3 random_key
       'NCMason.no-ip.org',                                --  4 host
       'North Carolina Mason',                             --  5 site_name
       'North Carolina Mason (EXPERIMENTAL)',              --  6 title
	'…',                                               --  7 slogan
       'EA',                                               --  8 New userid.
       'First Degree',                                     --  9 New user password.
       '3',                                                -- 10 Default security level.
       'whirlpool',                                        -- 11 hashing algorithm.
       'experimental',                                     -- 12 stage
       '#D9EEF2',                                          -- 13 Background color.
       'hsla(  0,  0%,  0%, 1.00)',                        -- 14 Foreground (text) color.
       10                                                  -- 15 Maximum number of status messages.
     ),
     ( DEFAULT,                                            --  1 Utility ix
       'twobrazenpillars.org',                             --  2 key
	random_string(32),                                 --  3 random_key
       'TwoBrazenPillars.org',                             --  4 host
       'Two Brazen Pillars',                               --  5 site_name
       'Two Brazen Pillars',                               --  6 title
	'“…serving as repositories for the archives…”',    --  7 slogan
       'EA',                                               --  8 New userid.
       'First Degree',                                     --  9 New user password.
       '3',                                                -- 10 Default security level.
       'whirlpool',                                        -- 11 hashing algorithm.
       'experimental',                                     -- 12 stage
       'hsla(210,  80%,  16%,  1.00)',                     -- 13 Background color.
       'hsla(  0,   0%, 100%,  1.00)',                     -- 14 Foreground (text) color.
       10                                                  -- 15 Maximum number of status messages.
     ),
     ( DEFAULT,                                            --  1 Utility ix
       'onlyamong.us',                                     --  2 key
	random_string(32),                                 --  3 random_key
       'OnlyAmong.us',                                     --  4 host
       'OnlyAmong.US',                                     --  5 site_name
       'Only Among Us',                                    --  6 title
	'…',                                               --  7 slogan
       'NewUser',                                          --  8 New userid.
       'password',                                         --  9 New user password.
       '3',                                                -- 10 Default security level.
       'whirlpool',                                        -- 11 hashing algorithm.
       'Production',                                       -- 12 stage
       '#D9EEF2',                                          -- 13 Background color.
       'hsla(  0,  0%,  0%, 1.00)',                        -- 14 Foreground (text) color.
       10                                                  -- 15 Maximum number of status messages.
     ),
     ( DEFAULT,                                            --  1 Utility ix
       'CrystalGold',                                      --  2 key
	random_string(32),                                 --  3 random_key
       'CrystalGold.no-ip.org',                            --  4 host
       'Crystal Gold',                                     --  5 site_name
       'Crystal Gold',                                     --  6 title
	'…',                                               --  7 slogan
       'NewUser',                                          --  8 New userid.
       'password',                                         --  9 New user password.
       '3',                                                -- 10 Default security level.
       'whirlpool',                                        -- 11 hashing algorithm.
       'Test',                                             -- 12 stage
       '#D9EEF2',                                          -- 12 Background color.
       'hsla(  0,  0%,  0%, 1.00)',                        -- 13 Foreground (text) color.
       10                                                  -- 14 Maximum number of status messages.
     );

     COMMIT;
