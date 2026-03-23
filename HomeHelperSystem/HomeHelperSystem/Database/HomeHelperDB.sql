USE HomeHelperDB;

CREATE TABLE Users (
    Id INT PRIMARY KEY IDENTITY,
    Username NVARCHAR(50),
    Password NVARCHAR(100),
    FirstName NVARCHAR(50),
    LastName NVARCHAR(50),
    Role NVARCHAR(20)
);

CREATE TABLE Locations (
    Id INT PRIMARY KEY IDENTITY,
    Name NVARCHAR(100),
    Address NVARCHAR(200),
    ClientId INT
);

CREATE TABLE Tasks (
    Id INT PRIMARY KEY IDENTITY,
    Name NVARCHAR(100),
    Description NVARCHAR(MAX),
    Deadline DATETIME,
    Budget DECIMAL(10,2),
    Category NVARCHAR(50),
    Status NVARCHAR(50),
    ClientId INT,
    LocationId INT,
    HousekeeperId INT,
    ReviewDate DATETIME,
    ImagePath NVARCHAR(200)
);