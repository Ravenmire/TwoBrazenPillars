 -- • ˈˌ ‘’“”″ … - ‒ – — ÄÆäåáæCcỆệéệMmNnñÖöôπßτÜüVvXx½τπ⚥þÞɞɷ
 -- 〃real DITTO MARK (U+3003)
 -- ″ DOUBLE PRIME    (U+2033) ″
 -- record.sql
 -- Stress marks ˈˌ follow the stressed sylable.
 \echo 'Input file may be /Passport/Masonry/record.sql'

            DROP TABLE IF EXISTS record;
          CREATE TABLE record (
                    ix SERIAL,
      organization_key TEXT NOT NULL, -- REFERENCES lodge(organization_key),
       affiliation_key TEXT NOT NULL, -- REFERENCES lodge(affiliation_key),
      jurisdiction_key TEXT NOT NULL, -- REFERENCES lodge(affiliation_key),
             lodge_key TEXT NOT NULL, -- REFERENCES lodge(lodge_key_),
          meeting_time TIMESTAMP WITH TIME ZONE NOT NULL,
          meeting_type TEXT NOT NULL,
         record_source TEXT NOT NULL,
              preamble TEXT NOT NULL,
                record TEXT NOT NULL,
           PRIMARY KEY (affiliation_key, jurisdiction_key, lodge_key, meeting_time),
            UNIQUE (ix)
 );
 \echo    '   24: CREATEd the record TABLE'

 \i '/MostSpace/Masonry/NC/Grand Lodge/Constituent Lodges/Clyde 453/Record/record.sql'
 \i '/MostSpace/Masonry/OR/Grand Lodge/Constituent Lodges/Estacada 146/Record/record.sql'
