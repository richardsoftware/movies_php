DROP DATABASE IF EXISTS movies_php;
CREATE DATABASE movies_php;
USE movies_php;

CREATE TABLE IF NOT EXISTS peliculas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    ano_estreno INT NOT NULL,
    genero VARCHAR(100) NOT NULL,
    director VARCHAR(255),
    actores VARCHAR(255),
    sinopsis VARCHAR(255),
    rating DOUBLE,
    poster VARCHAR(255)
    );
    
    
INSERT INTO peliculas (titulo, ano_estreno, genero, director, actores, sinopsis, rating, poster) VALUES
('Rocky', 1976, 'Drama, Sport', 'Frank Darabont', 'Sylvester Stallone, Talia Shire, Burt Young', 'Un boxeador de poca monta de Filadelfia tiene una oportunidad supremamente rara de pelear contra el campeón mundial de peso pesado en una pelea en la que se esfuerza por llegar hasta el final por su autoestima.', 8.2, 'https://m.media-amazon.com/images/M/MV5BNTBkMjg2MjYtYTZjOS00ODQ0LTg0MDEtM2FiNmJmOGU1NGEwXkEyXkFqcGdeQXVyMjUzOTY1NTc@._V1_SX300.jpg'),
('Muchachos, la película de la gente', 2023, 'Documentary, Sport', 'Jesus Braceras', 'Guillermo Francella', 'The celebrations for the title of the Argentine National Team in the World Cup in Qatar 2022, through videos of Argentines around the world and unpublished material of the party in the streets.', 8.0, 'https://m.media-amazon.com/images/M/MV5BNjM2YWI1MmYtMTc0NS00N2Q4LWFhNzEtNDQzYmYyMWYwYTAzXkEyXkFqcGdeQXVyOTE1NDQ5OA@@._V1_SX300.jpg'),
('Messi', 2014, 'Documentary, Biography, Sport', 'Álex de la Iglesia', 'Lionel Messi, Johan Cruijff, Kike Domínguez', 'Lionel Messi from early life to international stardom.', 7.2, 'https://m.media-amazon.com/images/M/MV5BZDA1NDdkM2UtM2M2ZS00NzJjLTk4YmQtNDhlYjM2MWVlOWE5XkEyXkFqcGdeQXVyMTA0MjU0Ng@@._V1_SX300.jpg'),
('Tyson', 2008, 'Documentary, Biography, Sport', 'James Toback', 'Mike Tyson, Mills Lane, Trevor Berbick', 'A mixture of original interviews, archival footage, and photographs sheds light on the life experiences of Mike Tyson.', 7.4, 'https://m.media-amazon.com/images/M/MV5BMzU0NjM1MTQzN15BMl5BanBnXkFtZTcwMTE3MTA0Mg@@._V1_SX300.jpg');

    
SELECT * FROM peliculas; 