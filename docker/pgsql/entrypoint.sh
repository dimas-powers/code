#!/bin/bash

# Create _test DB for testing
set -e

psql -v ON_ERROR_STOP=1 --username code --dbname code <<-EOSQL
    CREATE USER code;
    CREATE DATABASE code;
    GRANT ALL PRIVILEGES ON DATABASE code TO code;
EOSQL
