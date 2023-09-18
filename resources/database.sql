
CREATE TABLE `mitre_students` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `info` varchar(50) NOT NULL,
  `s_o_r` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_num` varchar(50) NOT NULL,
  `whatsApp_num` varchar(50) NOT NULL,
  `church` varchar(255) NOT NULL,
  `spiritual` varchar(255) NOT NULL,
  `calling` varchar(255) NOT NULL,
  `into_call` varchar(255) NOT NULL,
  `prìor_attended` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `lang_speak` varchar(255) NOT NULL,
  `lang_write` varchar(255) NOT NULL,
  `litracy` varchar(50) NOT NULL,
  `academics` varchar(50) NOT NULL,
  `discipler` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `mitre_students`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mitre_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;















