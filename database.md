Table 1 : Yayomi Premathilaka  Table Name : user_register 

CREATE TABLE `user_register` (
  `user_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `primary key` (user_id),
  
)

Table 2 : Ravindu Dhananjaya  Table Name : reviews

CREATE TABLE `reviews` (
  `review_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` varchar(200) NOT NULL,
  `rating` varchar(10) NOT NULL,

  `foreign key`(user_id) references user_register(user_id)
) 


Table 3 : Soorya rasandi   Table Name : reservation

CREATE TABLE `reservation` (
  `reservation_id` int NOT NULL,
  `user_id` int NOT NULL,
  `reservation_date` date NOT NULL,

)


Table 4 : Ruwani Rangika  Table Name : admin

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
)


Table 5 : Ruwani Rangika  Table Name : image_gallery

CREATE TABLE `image_gallery` (
  `image_id` int NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `title` varchar(50) NOT NULL,
  `admin_id` int NOT NULL
)