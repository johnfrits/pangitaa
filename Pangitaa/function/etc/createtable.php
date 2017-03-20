<?php require_once 'connection.php'; ?>

<?php 




$sql = $con->query(
"CREATE TABLE `coordinates` (
  `esh_id` bigint(20) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

$sql = $con->query(
"CREATE TABLE `establishment` (
  `esh_id` bigint(20) NOT NULL,
  `owner_id` bigint(20) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `street_address` varchar(150) NOT NULL,
  `route` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `business_phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `Status` varchar(20) NOT NULL DEFAULT 'TBD'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

$sql = $con->query(
"CREATE TABLE `profile` (
  `userID` bigint(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `telephone_number` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;");

$sql = $con->query(
"CREATE TABLE `user` (
  `userID` bigint(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(300) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=ascii;");




$sql = $con->query(
"ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);");
$sql = $con->query(
"ALTER TABLE `coordinates`
  ADD PRIMARY KEY (`esh_id`);");

$sql = $con->query(
"ALTER TABLE `establishment`
  ADD PRIMARY KEY (`esh_id`);");

$sql = $con->query(
"ALTER TABLE `profile`
  ADD PRIMARY KEY (`userID`);");

$sql = $con->query(
"ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);");


$sql = $con->query(
"ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

$sql = $con->query(
"ALTER TABLE `coordinates`
  MODIFY `esh_id` bigint(20) NOT NULL AUTO_INCREMENT");

$sql = $con->query(
"ALTER TABLE `establishment`
  MODIFY `esh_id` bigint(20) NOT NULL AUTO_INCREMENT");

$sql = $con->query(
"ALTER TABLE `profile`
  MODIFY `userID` bigint(20) NOT NULL AUTO_INCREMENT");

$sql = $con->query(
"ALTER TABLE `user`
  MODIFY `userID` bigint(20) NOT NULL AUTO_INCREMENT;");

?>
