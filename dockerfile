FROM mysql:latest

ENV MYSQL_ROOT_PASSWORD = "898026"
ENV MYSQL_DATABASE = "dbfinal"
ENV MYSQL_USER = root
ENV MYSQL_PASSWORD = "898026"


EXPOSE 3306
COPY ./my-custom.cnf /etc/mysql/conf.d/
