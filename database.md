Table 1 : Yayomi Premathilaka  Table Name : user_register 

CREATE TABLE `user_register` (
  `user_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


Table 2 : Ravindu Dhananjaya  Table Name : reviews

CREATE TABLE `reviews` (
  `review_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `review` varchar(100) NOT NULL,
  `rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



Table 3 : Soorya rasandi   Table Name : reservation

CREATE TABLE `reservation` (
  `reservation_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `check_in_date` date NOT NULL,
  `num_guests` int NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


Table 4 : Ruwani Rangika  Table Name : admin

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


Table 5 : Ruwani Rangika  Table Name : image_gallery

CREATE TABLE `image_gallery` (
  `image_id` int NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `admin_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
