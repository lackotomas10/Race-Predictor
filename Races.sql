CREATE TABLE IF NOT EXISTS races(
    id INTEGER PRIMARY KEY AUTOINCREMENT, --automaticky přidá id každému závodu
    jmeno TEXT NOT NULL,
    datum DATE NOT NULL,
    lokace TEXT NOT NULL,
    vzdalenost REAL NOT NULL,
    startovne INTEGER NOT NULL,

);