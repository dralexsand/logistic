Project init

```
git clone git@github.com:dralexsand/logistic.git

cd logistic/backend
cp .env.example .env
cd ..
cd app
cp .env.example .env

docker-compose up --build -d

docker exec -it intelogis_backend bash
composer update

php artisan migrate
php artisan db:seed

```

SQL

```
Database: postgres:14.5
sample SQL dump in folder named sql
```

API

```
List companies, sorted by price, date

http://127.0.0.1:8088/api/delivery?sourceKladr=0401100900000&targetKladr=4402200005000&weight=5.1

Result:
{
    "data": {
        "fast": [
            {
                "company": "Brakus-Gislason",
                "price": 22293335.17,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Champlin-Spencer",
                "price": 24813805.39,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Pouros, O'Conner and Rosenbaum",
                "price": 29355654.34,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "DuBuque, Sauer and Schinner",
                "price": 37144506.47,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Lesch PLC",
                "price": 108473871.95,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Gottlieb LLC",
                "price": 120630647.2,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Runolfsdottir-Fadel",
                "price": 122803556.62,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Wuckert Group",
                "price": 127817157.56,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Ryan PLC",
                "price": 139386424.18,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Pouros, Wisoky and Cummings",
                "price": 154041274.52,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Reinger, Kris and Herman",
                "price": 162581090.66,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Ward, Carter and Hansen",
                "price": 165576512.18,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Stroman-Kuhlman",
                "price": 169586985.74,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Kulas-Flatley",
                "price": 174730885.62,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Rosenbaum, Frami and Spencer",
                "price": 185344432.74,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Johnson-Jacobson",
                "price": 186740783.72,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Ortiz, McGlynn and Rutherford",
                "price": 192995423.94,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Quigley-Prohaska",
                "price": 197221414.28,
                "date": "2024-10-11",
                "error": "false"
            },
            {
                "company": "Mertz, Hansen and Mills",
                "price": 204309909.58,
                "date": "2024-10-11",
                "error": "false"
            }
        ],
        "slow": [
            {
                "company": "Pouros, O'Conner and Rosenbaum",
                "price": 26176127.4,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "DuBuque, Sauer and Schinner",
                "price": 28357471.35,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Champlin-Spencer",
                "price": 30538815.3,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Brakus-Gislason",
                "price": 32720159.25,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Lesch PLC",
                "price": 104704509.6,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Wuckert Group",
                "price": 111248541.45,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Runolfsdottir-Fadel",
                "price": 111248541.45,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Pouros, Wisoky and Cummings",
                "price": 117792573.3,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Gottlieb LLC",
                "price": 126517949.1,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Rosenbaum, Frami and Spencer",
                "price": 141787356.75,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Johnson-Jacobson",
                "price": 146150044.65,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Ortiz, McGlynn and Rutherford",
                "price": 154875420.45,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Kulas-Flatley",
                "price": 157056764.4,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Quigley-Prohaska",
                "price": 157056764.4,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Ryan PLC",
                "price": 159238108.35,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Mertz, Hansen and Mills",
                "price": 170144828.1,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Reinger, Kris and Herman",
                "price": 178870203.9,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Stroman-Kuhlman",
                "price": 205046331.3,
                "date": "2031-01-09",
                "error": "false"
            },
            {
                "company": "Ward, Carter and Hansen",
                "price": 211590363.15,
                "date": "2031-01-09",
                "error": "false"
            }
        ]
    },
    "success": true
}

Get specific company

http://127.0.0.1:8088/api/delivery_by_id?sourceKladr=0401100900000&targetKladr=4402200005000&weight=5.1&id=7

Result:
{
    "data": {
        "fast": [
            {
                "company": "Wuckert Group",
                "price": 127817157.56,
                "date": "2024-10-11",
                "error": "false"
            }
        ],
        "slow": [
            {
                "company": "Wuckert Group",
                "price": 111248541.45,
                "date": "2031-01-09",
                "error": "false"
            }
        ]
    },
    "success": true
}

OR

{
    "error": "Error code sourceKladr",
    "success": false
}

OR

{
    "error": "Error code targetKladr",
    "success": false
}


Transport Api resource point

GET http://127.0.0.1:8088/api/transports

Result - list

GET http://127.0.0.1:8088/api/transports/7

Result:

{
    "data": {
        "id": 7,
        "company": "Wuckert Group",
        "price": "861.7",
        "coefficient": "5.1"
    },
    "success": true
}

OR

{
    "error": "Transport not found",
    "success": false
}

POST http://127.0.0.1:8088/api/transports

Payload:
{
    "company": "Hewlett-Packards",
    "price": "917",
    "coefficient": "8.1"
}

Result:
{
    "data": {
        "company": "Hewlett-Packards",
        "price": "917",
        "coefficient": "8.1"
    },
    "success": true
}

PUT http://127.0.0.1:8088/api/transports/21

Result:

{
    "data": {
        "id": 19,
        "company": "Hewlett-Packard",
        "price": "913",
        "coefficient": "8.2"
    },
    "success": true
}

OR

{
    "error": "Transport not found",
    "success": false
}

```