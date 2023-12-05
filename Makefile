build:
	docker compose -f docker/docker-compose.yml build
	docker compose -f docker/docker-compose.yml up -d
up:
	docker compose -f docker/docker-compose.yml up

down:
	docker compose -f docker/docker-compose.yml down