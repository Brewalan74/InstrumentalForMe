CREATE DATABASE IF NOT EXISTS `MOCODO_INSTRUMENTALFORME` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `MOCODO_INSTRUMENTALFORME`;

CREATE TABLE `PROFILE` (
  `profile_code` VARCHAR(42),
  `certificate` VARCHAR(42),
  `presentation` VARCHAR(42),
  `avatar` VARCHAR(42),
  `is_teacher` VARCHAR(42),
  `user_code` VARCHAR(42),
  PRIMARY KEY (`profile_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `HAS_CERTIFICATE` (
  `certificate_code` VARCHAR(42),
  `profile_code` VARCHAR(42),
  PRIMARY KEY (`certificate_code`, `profile_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CERTIFICATE` (
  `certificate_code` VARCHAR(42),
  `name` VARCHAR(42),
  PRIMARY KEY (`certificate_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `INSTRUMENT` (
  `instrument_code` VARCHAR(42),
  `name` VARCHAR(42),
  `decsription` VARCHAR(42),
  `picture` VARCHAR(42),
  PRIMARY KEY (`instrument_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `TEACH/LEARN` (
  `type_code` VARCHAR(42),
  `profile_code` VARCHAR(42),
  PRIMARY KEY (`type_code`, `profile_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `STUDENT` (
  ,
  PRIMARY KEY ()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `LESSON` (
  `appointment` VARCHAR(42),
  `status` VARCHAR(42),
  `email_student` VARCHAR(42),
  `student_message` VARCHAR(42),
  `teacher_message` VARCHAR(42),
  `instrument_code` VARCHAR(42),
  PRIMARY KEY (`appointment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `MUSIC_STYLE` (
  `type_code` VARCHAR(42),
  `name` VARCHAR(42),
  PRIMARY KEY (`type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `USER` (
  `user_code` VARCHAR(42),
  `email` VARCHAR(42),
  `password` VARCHAR(42),
  `firstname` VARCHAR(42),
  `lastname` VARCHAR(42),
  PRIMARY KEY (`user_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
CREATE TABLE `IS` (
  `user_code` VARCHAR(42),
  PRIMARY KEY (`user_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

CREATE TABLE `TEACHER` (
  ,
  PRIMARY KEY ()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `PROFILE` ADD FOREIGN KEY (`user_code`) REFERENCES `USER` (`user_code`);
ALTER TABLE `HAS_CERTIFICATE` ADD FOREIGN KEY (`profile_code`) REFERENCES `PROFILE` (`profile_code`);
ALTER TABLE `HAS_CERTIFICATE` ADD FOREIGN KEY (`certificate_code`) REFERENCES `CERTIFICATE` (`certificate_code`);
ALTER TABLE `TEACH/LEARN` ADD FOREIGN KEY (`profile_code`) REFERENCES `PROFILE` (`profile_code`);
ALTER TABLE `TEACH/LEARN` ADD FOREIGN KEY (`type_code`) REFERENCES `MUSIC_STYLE` (`type_code`);
ALTER TABLE `LESSON` ADD FOREIGN KEY (`instrument_code`) REFERENCES `INSTRUMENT` (`instrument_code`);
ALTER TABLE `IS` ADD FOREIGN KEY (`user_code`) REFERENCES `USER` (`user_code`);