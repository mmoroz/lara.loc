up: docker-up
down: docker-down
build: docker-build
tests: docker-tests

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-build:
	docker-compose build

docker-tests:
	docker-compose exec app php vendor/bin/phpunit