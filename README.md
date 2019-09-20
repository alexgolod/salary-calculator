# Salary Calculator(Coding test)
It calculates employees salary by predefined rules in concrete country

## Requirements
`docker`, `docker-compose`

## Run the application
This step will run docker containers, install composer dependencies, create database, run migrations, load the fixtures.
```bash
git clone git@github.com:alexgolod/salary-calculator.git
cd salary-calculator
docker-compose up
```
Get calculation result:
http://localhost:3080/salary/calculate

## Test the application
Run tests
```bash
./test
```
