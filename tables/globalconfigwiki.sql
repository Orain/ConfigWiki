CREATE TABLE globalconfigwiki (
	name varchar(255) PRIMARY KEY,
	description varchar(1023),
	locked boolean,
	default_value varchar(511)
) /*$wgDBTableOptions*/;

