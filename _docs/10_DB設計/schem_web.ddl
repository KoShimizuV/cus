CREATE TABLE `cus_qa` (
 `id` int(10) NOT NULL auto_increment,
 `title` varchar(100) default NULL,
 `qu` text,
 `ans` text,
 `correct_cnt` int(5) NOT NULL default '0',
 `uncorrect_cnt` int(5) NOT NULL default '0',
 `category` varchar(100) default NULL,
 `src` varchar(255) default NULL,
 `del_flg` tinyint(1) NOT NULL default '0',
 `created` datetime NOT NULL default '0000-00-00 00:00:00',
 `modified` timestamp(14) NOT NULL,
 PRIMARY KEY  (`id`)
) TYPE=MyISAM


CREATE TABLE `cus_qas_tags` (
  `qa_id` int(10) not null default 0,
  `tag_id` varchar(100) default NULL,
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` timestamp(14) NOT NULL,
  PRIMARY KEY  (`qa_id`,`tag_id`)
)


CREATE TABLE `cus_tags` (
  `id` int(10) NOT NULL auto_increment,
  `title` varchar(100) default NULL,
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) ;

insert into cus_tags (id, title) values (1, 'TOEIC600');
insert into cus_tags (id, title) values (2, 'Finance');
insert into cus_tags (id, title) values (3, 'Java');
select * from cus_tags;
