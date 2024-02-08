CREATE TABLE `user_register` (
  `user_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
)

CREATE TABLE `reviews` (
  `review_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` varchar(200) NOT NULL,
  `rating` varchar(10) NOT NULL
) 


CREATE TABLE `reservation` (
  `reservation_id` int NOT NULL,
  `user_id` int NOT NULL,
  `reservation_date` date NOT NULL
)




CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
)

CREATE TABLE `image_gallery` (
  `image_id` int NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `title` varchar(50) NOT NULL,
  `admin_id` int NOT NULL
)