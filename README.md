### Web Development Project

### Collaborators:
- Nacim AIT KHELIFA
- Asmae NOUFOUSSI

### Project Description
This project involves the creation of a website that allows users to browse anime description pages, share their opinions, and manage their watchlist. Users can register, log in, search for anime, and manage their comments.

### Installation and Running
1. **Creating the Database:**
   - If the database is deleted, recreate it with the command:
     ```bash
     touch base.db
     ```
   - Connect to localhost (see below) and uncomment the sections in `create.php` that contain the insertion of admin accounts and the insertion of data into the anime table.

2. **Connecting to Localhost:**
   - Start the local server with the command:
     ```bash
     php -d extension=$(pwd)/pdo_sqlite.so -S localhost:8000
     ```
   - Open your browser and navigate to:
     ```
     http://localhost:8000/site.php
     ```
For more info the project's report is available in the directory.

