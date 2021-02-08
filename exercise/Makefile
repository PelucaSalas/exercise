############################
####      Variables     ####
############################
export PROJECT_NAME := trainingsPublic
export CURRENT_PATH := $(shell pwd)
export PHP_CONTAINER := php-fpm

DOCKER_COMPOSE=docker-compose

############################
####     Docker Dev     ####
############################
dev: docker-build docker-up composer-install logs

enter:
	@${DOCKER_COMPOSE} exec ${PHP_CONTAINER} bash

docker-up:
	@${DOCKER_COMPOSE} up -d ${SERVICE}

docker-build:
	@${DOCKER_COMPOSE} build ${SERVICE}

docker-restart:
	@${DOCKER_COMPOSE} restart ${SERVICE}

docker-exec:
	@${DOCKER_COMPOSE} exec ${SERVICE} ${CMD}

nodev:
	@${DOCKER_COMPOSE} down --remove-orphans

logs:
	@${DOCKER_COMPOSE} logs -f ${SERVICE}

restart: nodev dev

composer-install:
	php composer.phar install

composer-update:
	php composer.phar update

############################
####        Tests       ####
############################

tests: php-tests

php-tests:
	@${DOCKER_COMPOSE} exec ${PHP_CONTAINER} bash -c "/var/www/project/vendor/bin/phpunit -v -c /var/www/project/phpunit.xml --stop-on-failure"
test:
ifndef CLASS
	$(error You must pass at least the CLASS parameter. Example: make test CLASS=<path> [TEST=<function_name>])
else
	$(eval CLASS_FILTER=$(subst app/,,${CLASS}))
endif
ifdef TEST
	$(eval TEST_FILTER=$(if $(filter-out TEST,$(TEST)),--filter="$(TEST)",""))
endif
	@${DOCKER_COMPOSE} exec ${PHP_CONTAINER} bash -c "/var/www/project/vendor/bin/phpunit -v -c /var/www/project/phpunit.xml" ${CLASS_FILTER} ${TEST_FILTER}