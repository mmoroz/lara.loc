up: docker-up
down: docker-down
build: docker-build
tests: docker-tests
assets: docker-assets

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-build:
	docker-compose build

docker-tests:
	docker-compose exec app php vendor/bin/pest
docker-assets:
	docker-compose exec node npm run build
