 \connect masonry
    SELECT organization_key,
           affiliation_key,
           jurisdiction_key,
           lodge_key,
           meeting_time,
           record
      FROM record
     WHERE organization_key = 'Masonry'
       AND affiliation_key  = 'CGMNA'
       AND jurisdiction_key = 'OR'
       AND lodge_key='146'
 --    AND to_char(meeting_time, 'YYYY-MM-DD') = '1911-04-04';
  ORDER BY meeting_time DESC
     LIMIT 1
     ;
