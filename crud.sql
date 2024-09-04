CREATE TABLE `PRODUCTS` (
    `ID` int NOT NULL AUTO_INCREMENT,
    `Name` varchar(255) NOT NULL,
    `Description` varchar(255) NOT NULL,
    `Price` decimal(10, 2) NOT NULL,
    `Quantity` int NOT NULL,
    `ToCreate` datetime NOT NULL,
    `ToUpdate` datetime NOT NULL,
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
