# CRM

![Database Migration](https://github.com/minkhant1999/crm/workflows/Database%20Migration/badge.svg)

## Installation

### Database

#### Connection
Create `database.sqlite` file in root directory to use `SQLite3` database connection

#### Migration
```sh
 $  php migrate.php
```

#### Fake Users
```sh
                 #qty #id
 $  php seed.php  20   0
```

#### Query Table
```sh
                     #log   #query_string
 $  php migrate.php  true   "SELECT * FROM user WHERE user_id=30"
```

### Run on Development Server

```sh
 $  php -S localhost:8000 -t view
```


