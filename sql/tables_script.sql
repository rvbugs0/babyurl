Create table tbl_url_mapping (
	code Bigint NOT NULL AUTO_INCREMENT,
	long_link Varchar(1000) NOT NULL,
	short_link Varchar(100) NOT NULL,
	click_count Bigint,
	link_suffix Varchar(20) NOT NULL,
	UNIQUE (short_link),
	UNIQUE (link_suffix),
 Primary Key (code)) ENGINE = InnoDB;
