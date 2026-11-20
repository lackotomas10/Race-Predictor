CREATE TABLE IF NOT EXISTS runners(
    id INTEGER PRIMARY KEY AUTOINCREMENT, --automaticky přidá id každému závodníkovi
    jmeno TEXT NOT NULL,
    zavod TEXT NOT NULL,
    startcislo INTEGER NOT NULL

);