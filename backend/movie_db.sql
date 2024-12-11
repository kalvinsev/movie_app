-- Create the database
CREATE DATABASE IF NOT EXISTS movie_db;
USE movie_db;

-- Create Directors table
CREATE TABLE IF NOT EXISTS Directors (
    DirectorID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    BirthDate DATE,
    Biography TEXT
);

-- Create Movies table
CREATE TABLE IF NOT EXISTS Movies (
    MovieID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(200) NOT NULL,
    Genre VARCHAR(100),
    ReleaseYear INT,
    DirectorID INT,
    FOREIGN KEY (DirectorID) REFERENCES Directors(DirectorID) ON DELETE CASCADE
);

-- Insert some sample data into Directors
INSERT INTO Directors (Name, BirthDate, Biography) VALUES
('Steven Spielberg', '1946-12-18', 'Famous director known for movies like Jaws, E.T., Jurassic Park.'),
('Christopher Nolan', '1970-07-30', 'Director known for films like Inception, The Dark Knight, Dunkirk.');

-- Insert some sample data into Movies
INSERT INTO Movies (Title, Genre, ReleaseYear, DirectorID) VALUES
('Jurassic Park', 'Sci-Fi', 1993, 1),
('Jaws', 'Thriller', 1975, 1),
('Inception', 'Sci-Fi', 2010, 2),
('The Dark Knight', 'Action', 2008, 2);
