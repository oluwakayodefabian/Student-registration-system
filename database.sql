Database Name: student_registration_system


CREATE TABLE `students` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `first_name` varchar(255) NOT NULL,
 `surname` varchar(255) NOT NULL,
 `username` varchar(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 `gender` varchar(255) NOT NULL,
 `image` varchar(255) NOT NULL,
 `phone_num` varchar(255) NOT NULL,
 `password` text NOT NULL,
 `date_of_birth` varchar(255) NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4