SELECT ix,who_key,random_key FROM sobriety WHERE who_key IN ('1942-05-16Rolle', '1900-01-01Boyd', '1989-05-06Madonna', '1961-11-19Hill');

\c masonry ted
SELECT ix,who_key,sex,gender,random_key FROM who WHERE who_key IN ('1942-05-16Rolle', '1900-01-01Boyd', '1989-05-06Madonna', '1961-11-19Hill');